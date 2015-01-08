<?php
// vim: set ai ts=4 sw=4 ft=php:
class Conferences implements BMO {
	private $module = 'Conferences';
	public function __construct($freepbx = null) {
		if ($freepbx == null) {
			throw new Exception("Not given a FreePBX Object");
		}

		$this->FreePBX = $freepbx;
		$this->db = $freepbx->Database;
		$this->astman = $this->FreePBX->astman;
	}

	public function doConfigPageInit($page) {
	}

	public function install() {
		//Migrate bad option
		$confs = $this->listConferences();
		foreach($confs as $conf) {
			$conf = $this->getConference($conf[0]);
			$optselect = strpos($conf['options'], "i");
			if($optselect) {
				$conf['options'] = str_replace("i","I",$conf['options']);
				$this->updateConferenceSettingById($conf['exten'],'options',$conf['options']);
			}
		}
	}
	public function uninstall() {

	}
	public function backup(){

	}
	public function restore($backup){

	}

	/**
	 * Update Conference Dial Plan Options
	 * @param {int} $room  The conference room to update
	 * @param {string} $key   The keyword of the setting to change
	 * @param {string} $value The value of the setting
	 */
	public function updateConferenceOptionById($room,$key,$value) {
		$o = $this->getConference($room);
		$key = explode('#',$key);
		$key = $key[1];
		$options = $o['options'];
		$len = strlen($options);
		if(empty($value) && strpos($options,$key) >= 0) {
			$options = str_replace($key,'',$options);
			if($len-1 != strlen($options)) {
				throw new Exception('Something Bad Happened');
			}
		} elseif(!empty($value) && strpos($options,$key) === false) {
			$options = $options . $key;
			if($len+1 != strlen($options)) {
				throw new Exception('Something Bad Happened');
			}
		}

		$sql = 'UPDATE meetme SET options = ? WHERE exten = ?';
		$sth = $this->db->prepare($sql);
		$sth->execute(array($options,$room));
		$this->astman->database_put('CONFERENCE/'.$room,'options',$options);
	}

	/**
	 * Update Conference Setting
	 * @param {int} $room  The conference room to update
	 * @param {string} $key   The keyword of the setting to change ("description","userpin","adminpin","options","joinmsg_id","music","users")
	 * @param {string} $value The value of the setting
	 */
	public function updateConferenceSettingById($room,$key,$value) {
		$valid = array("description","userpin","adminpin","options","joinmsg_id","music","users");
		if(!in_array($key,$valid)) {
			return false;
		}
		$sql = 'UPDATE meetme SET '.$key.' = ? WHERE exten = ?';
		$sth = $this->db->prepare($sql);
		$sth->execute(array($value,$room));
		if($key != 'description' && $key != 'joinmsg_id') {
			$this->astman->database_put('CONFERENCE/'.$room,$key,$value);
		} elseif($key == 'joinmsg_id') {
			$recording = $this->FreePBX->Recordings->getFilenameById($value);
			$this->astman->database_put('CONFERENCE/'.$room,'joinmsg',(!empty($recording) ? $recording : ''));
		}
	}

	/**
	 * Add Conference Room
	 * @param {int} $room            The room number to create
	 * @param {string} $name            The description of the room
	 * @param {int} $userpin         The user Pin to login to the room
	 * @param {int} $adminpin        The admin pin for the room
	 * @param {string} $options         Options for the room
	 * @param {int} $joinmsg_id		The recording to play on join
	 * @param {string} $music        MOH to play on hold
	 * @param {int} $users
	 */
	public function addConference($room,$name,$userpin,$adminpin,$options,$joinmsg_id = null,$music = '',$users = 0) {
		$sql = "INSERT INTO meetme (exten,description,userpin,adminpin,options,joinmsg_id,music,users) values (?,?,?,?,?,?,?,?)";
		$sth = $this->db->prepare($sql);
		try {
			$sth->execute(array($room,$name,$userpin,$adminpin,$options,$joinmsg_id,$music,$users));
			$this->astman->database_put('CONFERENCE/'.$room,'userpin',$userpin);
			$this->astman->database_put('CONFERENCE/'.$room,'adminpin',$adminpin);
			$this->astman->database_put('CONFERENCE/'.$room,'options',$options);
			$this->astman->database_put('CONFERENCE/'.$room,'music',$music);
			$this->astman->database_put('CONFERENCE/'.$room,'users',$users);
			$recording = $this->FreePBX->Recordings->getFilenameById($joinmsg_id);
			$this->astman->database_put('CONFERENCE/'.$room,'joinmsg',(!empty($recording) ? $recording : ''));
		} catch(\Exception $e) {
			return false;
		}
		return true;
	}

	/**
	 * Delete a Conference
	 * @param {int} $room The room number
	 */
	public function deleteConference($room) {
		$sql = "DELETE FROM meetme WHERE exten = ?";
		$sth = $this->db->prepare($sql);
		try {
			$sth->execute(array($room));
			$this->astman->database_deltree('CONFERENCE/'.$room);
		} catch(\Exception $e) {
			return false;
		}
		return true;
	}

	/**
	 * Gets a All information about a Conference
	 * @param {int} $room The room number
	 *
	 */
	public function getConference($room) {
		$sql = "SELECT exten,options,userpin,adminpin,description,joinmsg_id,music,users FROM meetme WHERE exten = ?";
		$sth = $this->db->prepare($sql);
		try {
			$sth->execute(array($room));
			$ret = $sth->fetch(PDO::FETCH_ASSOC);
			$asettings = $this->astman->database_show('CONFERENCE/'.$room);
			foreach($ret as $key => $value) {
				if($key == 'description') {
					continue;
				} elseif($key == 'joinmsg_id') {
					$recording = $this->FreePBX->Recordings->getFilenameById($value);
					$this->astman->database_put('CONFERENCE/'.$room,'joinmsg',(!empty($recording) ? $recording : ''));
					continue;
				}
				if(!isset($asettings['/CONFERENCE/'.$room.'/'.$key])) {
					$this->astman->database_put('CONFERENCE/'.$room,$key,$value);
				} elseif($asettings['/CONFERENCE/'.$room.'/'.$key] != $value) {
					$this->updateConferenceSettingById($room,$key,$asettings['/CONFERENCE/'.$room.'/'.$key]);
				}
			}
			//Divergent information, sync from the master which is Asterisk Manager
			foreach($asettings as $family => $value) {
				$parts = explode("/",$family);
				$key = $parts[3];
				if((!isset($ret[$key]) || $key == 'description') && $key != 'joinmsg') {
					$this->astman->database_del("CONFERENCE/".$room,$key);
				}
			}
		} catch(\Exception $e) {
			return false;
		}
		return $ret;
	}

	/**
	 * List all active conferences for the current logged in user
	 * @return array Array of conferences
	 */
	public function listConferences() {
		$sql = "SELECT exten,description FROM meetme ORDER BY exten";
		$sth = $this->db->prepare($sql);
		try {
			$sth->execute();
			$results = $sth->fetchAll(PDO::FETCH_ASSOC);
		} catch(\Exception $e) {
			return false;
		}
		foreach($results as $result){
			// check to see if we are in-range for the current AMP User.
			if (isset($result['exten']) && checkRange($result['exten'])){
				// return this item's dialplan destination, and the description
				$extens[] = array($result['exten'],$result['description']);
			}
		}
		if (isset($extens)) {
			return $extens;
		} else {
			return null;
		}
	}
}

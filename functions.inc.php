<?php /* $Id$ */
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }

// extend extensions class.
// This example is about as simple as it gets
class conferences_conf {
	// return the filename to write
	function get_filename() {
		return "meetme_additional.conf";
	}
	function addMeetme($room, $userpin, $adminpin='') {
		$this->_meetmes[$room] = $userpin.($adminpin != '' ? ','.$adminpin : '');
	}
	// return the output that goes in the file
	function generateConf() {
		$output = "";
		if (isset($this->_meetmes) && is_array($this->_meetmes)) {
			foreach (array_keys($this->_meetmes) as $meetme) {
				$output .= 'conf => '.$meetme.",".$this->_meetmes[$meetme]."\n";
			}
		}
		return $output;
	}
}

// returns a associative arrays with keys 'destination' and 'description'
function conferences_destinations() {
	//get the list of meetmes
	$results = conferences_list();

	// return an associative array with destination and description
	if (isset($results)) {
		foreach($results as $result){
			$extens[] = array('destination' => 'ext-meetme,'.$result['0'].',1', 'description' => $result['1']." <".$result['0'].">");
		}
		return $extens;
	} else {
		return null;
	}
}

function conferences_getdest($exten) {
	return array('ext-meetme,'.$exten.',1');
}

function conferences_getdestinfo($dest) {
	global $active_modules;

	if (substr(trim($dest),0,11) == 'ext-meetme,') {
		$exten = explode(',',$dest);
		$exten = $exten[1];
		$thisexten = conferences_get($exten);
		if (empty($thisexten)) {
			return array();
		} else {
			//$type = isset($active_modules['announcement']['type'])?$active_modules['announcement']['type']:'setup';
			return array('description' => sprintf(_("Conference Room %s : %s"),$exten,$thisexten['description']),
			             'edit_url' => 'config.php?display=conferences&extdisplay='.urlencode($exten),
					);
		}
	} else {
		return false;
	}
}

function conferences_recordings_usage($recording_id) {
	global $active_modules;

	$results = sql("SELECT `exten`, `description` FROM `meetme` WHERE `joinmsg_id` = '$recording_id'","getAll",DB_FETCHMODE_ASSOC);
	if (empty($results)) {
		return array();
	} else {
		foreach ($results as $result) {
			$usage_arr[] = array(
				'url_query' => 'config.php?display=conferences&extdisplay='.urlencode($result['exten']),
				'description' => sprintf(_("Conference: %s"),$result['description']),
			);
		}
		return $usage_arr;
	}
}

/* 	Generates dialplan for conferences
	We call this with retrieve_conf
*/
function conferences_get_config($engine) {
	global $ext, $conferences_conf, $version, $amp_conf, $astman;
	
	$ast_ge_162 = version_compare($version, '1.6.2', 'ge');
	
	switch($engine) {
		case "asterisk":
			$ext->addInclude('from-internal-additional','ext-meetme');
			$contextname = 'ext-meetme';
			if(is_array($conflist = conferences_list())) {

				$ast_ge_14 = version_compare($version, "1.4","ge");
				
				// Start the conference
				if ($ast_ge_14) {
					$ext->add($contextname, 'STARTMEETME', '', new ext_execif('$["${MEETME_MUSIC}" != ""]','Set','CHANNEL(musicclass)=${MEETME_MUSIC}'));
				} else {
					$ext->add($contextname, 'STARTMEETME', '', new ext_execif('$["${MEETME_MUSIC}" != ""]','SetMusicOnHold','${MEETME_MUSIC}'));
				}
				$ext->add($contextname, 'STARTMEETME', '', new ext_setvar('GROUP(meetme)','${MEETME_ROOMNUM}'));
				$ext->add($contextname, 'STARTMEETME', '', new ext_gotoif('$[${MAX_PARTICIPANTS} > 0 && ${GROUP_COUNT(${MEETME_ROOMNUM}@meetme)}>${MAX_PARTICIPANTS}]','MEETMEFULL,1'));
				$ext->add($contextname, 'STARTMEETME', '', new ext_meetme('${MEETME_ROOMNUM}','${MEETME_OPTS}','${PIN}'));

				$ext->add($contextname, 'STARTMEETME', '', new ext_hangup(''));

				//meetme full
				$ext->add($contextname, 'MEETMEFULL', '', new ext_playback('im-sorry&conf-full&goodbye'));
				$ext->add($contextname, 'MEETMEFULL', '', new ext_hangup(''));
				
				// hangup for whole context
				$ext->add($contextname, 'h', '', new ext_hangup(''));
				
				foreach($conflist as $item) {
					$room = conferences_get(ltrim($item['0']));
					
					$roomnum = ltrim($item['0']);
					$roomoptions = $room['options'];
					if ($ast_ge_14) {
						$roomoptions = str_replace('i','I',$roomoptions);
					}
					if (!$ast_ge_14) {
						$roomoptions = str_replace('o','',$roomoptions);
						$roomoptions = str_replace('T','',$roomoptions);
					}
					$roomuserpin = $room['userpin'];
					$roomadminpin = $room['adminpin'];
					$roomusers = $room['users'];
					if(isset($room['music']) && $room['music'] !='' && $room['music']!='inherit') {
						$music = $room['music'];
					} else {
						$music='${MOHCLASS}'; // inherit channel moh class
					}
					if (isset($room['joinmsg_id']) && $room['joinmsg_id'] != '') {
						$roomjoinmsg = recordings_get_file($room['joinmsg_id']);
					} else {
						$roomjoinmsg = '';
					}
					
					// Add optional hint
					if ($amp_conf['USEDEVSTATE']) {
						$ext->addHint($contextname, $roomnum, "MeetMe:".$roomnum);
					}
					// entry point
					$ext->add($contextname, $roomnum, '', new ext_macro('user-callerid'));
					$ext->add($contextname, $roomnum, '', new ext_setvar('MEETME_ROOMNUM',$roomnum));
					$ext->add($contextname, $roomnum, '', new ext_setvar('MAX_PARTICIPANTS', $roomusers));
					$ext->add($contextname, $roomnum, '', new ext_setvar('MEETME_MUSIC',$music));
          $ext->add($contextname, $roomnum, '', new ext_gosub('1','s','sub-record-check',"conf,$roomnum," . (strstr($room['options'],'r') !== false ? 'always' : 'never')));
					$ext->add($contextname, $roomnum, '', new ext_gotoif('$["${DIALSTATUS}" = "ANSWER"]',($roomuserpin == '' && $roomadminpin == '' ? 'USER' : 'READPIN')));	
					$ext->add($contextname, $roomnum, '', new ext_answer(''));
					$ext->add($contextname, $roomnum, '', new ext_wait(1));
					
					// Deal with PINs -- if exist
					if ($roomuserpin != '' || $roomadminpin != '') {
						$ext->add($contextname, $roomnum, '', new ext_setvar('PINCOUNT','0'));
						$ext->add($contextname, $roomnum, 'READPIN', new ext_read('PIN','enter-conf-pin-number'));
						
						// userpin -- must do always, otherwise if there is just an adminpin
						// there would be no way to get to the conference !
						$ext->add($contextname, $roomnum, '', new ext_gotoif('$[x${PIN} = x'.$roomuserpin.']','USER'));

						// admin pin -- exists
						if ($roomadminpin != '') {
							$ext->add($contextname, $roomnum, '', new ext_gotoif('$[x${PIN} = x'.$roomadminpin.']','ADMIN'));
						}

						// pin invalid
						$ext->add($contextname, $roomnum, '', new ext_setvar('PINCOUNT','$[${PINCOUNT}+1]'));
						$ext->add($contextname, $roomnum, '', new ext_gotoif('$[${PINCOUNT}>3]', "h"));
						$ext->add($contextname, $roomnum, '', new ext_playback('conf-invalidpin'));
						$ext->add($contextname, $roomnum, '', new ext_goto('READPIN'));
						
						// admin mode -- only valid if there is an admin pin
						if ($roomadminpin != '') {
							$ext->add($contextname, $roomnum, 'ADMIN', new ext_setvar('MEETME_OPTS','aA'.str_replace('m','',$roomoptions)));
							if ($roomjoinmsg != '') {  // play joining message if one defined
								$ext->add($contextname, $roomnum, '', new ext_playback($roomjoinmsg));
							}
							$ext->add($contextname, $roomnum, '', new ext_goto('STARTMEETME,1'));							
						}
					}
					
					// user mode
					$ext->add($contextname, $roomnum, 'USER', new ext_setvar('MEETME_OPTS',$roomoptions));
					if ($roomjoinmsg != '') {  // play joining message if one defined
						$ext->add($contextname, $roomnum, '', new ext_playback($roomjoinmsg));
					}
					$ext->add($contextname, $roomnum, '', new ext_goto('STARTMEETME,1'));
					
					// add meetme config
					$conferences_conf->addMeetme($room['exten'],$room['userpin'],$room['adminpin']);
				}
			}

		break;
	}
}

function conferences_check_extensions($exten=true) {
	$extenlist = array();
	if (is_array($exten) && empty($exten)) {
		return $extenlist;
	}
	$sql = "SELECT exten, description FROM meetme ";
	if (is_array($exten)) {
		$sql .= "WHERE exten in ('".implode("','",$exten)."')";
	}
	$sql .= " ORDER BY exten";
	$results = sql($sql,"getAll",DB_FETCHMODE_ASSOC);

	foreach ($results as $result) {
		$thisexten = $result['exten'];
		$extenlist[$thisexten]['description'] = _("Conference: ").$result['description'];
		$extenlist[$thisexten]['status'] = 'INUSE';
		$extenlist[$thisexten]['edit_url'] = 'config.php?display=conferences&extdisplay='.urlencode($thisexten);
	}
	return $extenlist;
}

//get the existing meetme extensions
function conferences_list() {
	$results = sql("SELECT exten,description FROM meetme ORDER BY exten","getAll",DB_FETCHMODE_ASSOC);
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

function conferences_get($account){
  global $db;
	//get all the variables for the meetme
	$results = sql("SELECT exten,options,userpin,adminpin,description,joinmsg_id,music,users FROM meetme WHERE exten = '".$db->escapeSimple($account)."'","getRow",DB_FETCHMODE_ASSOC);
	return $results;
}

function conferences_del($account){
	global $db;
	$results = sql("DELETE FROM meetme WHERE exten = '".$db->escapeSimple($account)."'","query");
}

function conferences_add($account,$name,$userpin,$adminpin,$options,$joinmsg_id=null,$music='',$users=0){
	global $active_modules;
	global $db;
	$account    = $db->escapeSimple($account);
	$name       = $db->escapeSimple($name);
	$userpin    = $db->escapeSimple($userpin);
	$adminpin   = $db->escapeSimple($adminpin);
	$options    = $db->escapeSimple($options);
	$joinmsg_id = $db->escapeSimple($joinmsg_id);
	$music      = $db->escapeSimple($music);
	$users      = $db->escapeSimple($users);
	$results = sql("INSERT INTO meetme (exten,description,userpin,adminpin,options,joinmsg_id,music,users) values (\"$account\",\"$name\",\"$userpin\",\"$adminpin\",\"$options\",\"$joinmsg_id\",\"$music\",\"$users\")");
}
?>

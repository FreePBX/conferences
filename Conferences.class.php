<?php
// vim: set ai ts=4 sw=4 ft=php:
if(!function_exists('conferences_get')) {
	include(__DIR__.'/functions.inc.php');
}
class Conferences implements BMO {
	private $module = 'Conferences';
	public function __construct($freepbx = null) {
		if ($freepbx == null) {
			throw new Exception("Not given a FreePBX Object");
		}

		$this->FreePBX = $freepbx;
		$this->db = $freepbx->Database;
	}

	public function doConfigPageInit($page) {
	}

	public function install() {

	}
	public function uninstall() {

	}
	public function backup(){

	}
	public function restore($backup){

	}
	public function genConfig() {

	}

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
	}

	public function updateConferenceSettingById($room,$key,$value) {
		$valid = array("description","userpin","adminpin","options","joinmsg_id","music","users");
		if(!in_array($key,$valid)) {
			return false;
		}
		$sql = 'UPDATE meetme SET '.$key.' = ? WHERE exten = ?';
		$sth = $this->db->prepare($sql);
		$sth->execute(array($value,$room));
	}
	public function addConference($room,$name,$userpin,$adminpin,$options,$joinmsg_id=null,$music='',$users=0) {
		return conferences_add($room,$name,$userpin,$adminpin,$options,$joinmsg_id,$music,$users);
	}

	public function deleteConference($room) {
		conferences_del($roomt);
	}
	public function getConference($room) {
		return conferences_get($room);
	}
}

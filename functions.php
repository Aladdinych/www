<?php

if(!defined("BASE_PATH"))
	define("BASE_PATH", realpath(dirname(realpath(__FILE__)) ) . DIRECTORY_SEPARATOR);
require('db.php');

function includes($module,$params=array()){
	if(file_exists(BASE_PATH.$module)){
		ob_start();
		foreach($params as $_key=>$_value){
			${$_key} = $_value;
		}
		require(BASE_PATH.$module);
		$ret=ob_get_contents();
		ob_end_clean();
		return $ret;
	}
	return false;
}

function CheckLogin($login, $pass) {
	global $db;
	session_start();
	$resuser = $db->query('select * from tr_users Where login=\''.$login.'\' ') or die('error!');
	$row = $resuser->fetch_assoc();

	$ress = (($row['login'] == $login) && password_verify($pass,$row['password']));

	return ($ress);
}

?>
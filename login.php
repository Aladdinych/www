<?php
require_once('functions.php');
session_start();
if($_GET['do'] == 'login'){

	if (!isset($_SESSION['login'])) {
	    $login = $_POST['login'];
	    $pass = $_POST['password'];
 
		if(count($_POST) <= 0){
				$result['result'] = 'error';
				$result['message'] = 'Укажите логин пользователя и пароль';
		}
		else {
			$chk = CheckLogin($login, $pass);
		        if ($chk){
				$_SESSION['login'] = $login;
				$_SESSION['name'] = $name;
				$result['result'] = 'success';
			}
			else{
				$result['result'] = 'error';
				$result['message'] = 'Неверный логин пользователя или пароль';
			}
		}
		$res = json_encode($result);
		echo $res;

	}
}
elseif($_GET['do'] == 'logout'){
	unset($_SESSION['login']);
	unset($_SESSION['user']);
	$result['result'] = 'success';
	$result['message'] = '';
	$res = json_encode($result);
	echo $res;
}


?>
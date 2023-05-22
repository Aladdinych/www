<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'tree_demo');
define('DB_USER', 'mysql'); 
define('DB_PASS', 'mysql'); 


///--- Подключаемся к БД сразу
if(!isset($db))
	$db=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) { 
   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 

$db->query("SET NAMES 'utf8'");

?>
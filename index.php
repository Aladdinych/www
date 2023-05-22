<?php
global $db;
require('db.php');
require('functions.php');

$title = 'Tree test';
$metadescription = 'Tree test';
$metakeywords = 'Tree test';

session_start();

if(isset($_SESSION['login'])){
	$content=includes('templates/admin_page.php');
}else{
	$content=includes('templates/main_page.php');
}

require('templates/index_page.php');
?>
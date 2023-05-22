<?php
if(!defined("BASE_PATH"))
	define("BASE_PATH", realpath(dirname(realpath(__FILE__)) ) . DIRECTORY_SEPARATOR);

require_once('db.php');
require_once('tree.php');


$data = file_get_contents('php://input');
if(isset($data))
	$data = json_decode($data,true);

if($_GET['do'] == 'gettreedata'){
	$res = $db->query('select aa.*, bb.name as parentname from `tr_tree` aa LEFT JOIN tr_tree bb ON aa.parent = bb.id Where aa.id='.$data['id'].' ') or die('error!');
	$row = $res->fetch_assoc();

	echo json_encode(array('result' => 'success','data' => $row));
}
elseif($_GET['do'] == 'save'){
	if($_POST['mode'] == 'edit'){
		$sql = 'UPDATE `tr_tree` SET name = "'.$_POST['name'].'", description = "'.$_POST['description'].'", parent = '.$_POST['pcat'].' WHERE id='.$_POST['id'];
		$db->query($sql);
	}elseif($_POST['mode'] == 'add'){
		$sql = 'INSERT INTO `tr_tree` SET name = "'.$_POST['name'].'", description = "'.$_POST['description'].'", parent = '.$_POST['pcat'];
		$db->query($sql);
	}
        header('Location: /');

}
elseif($_GET['do'] == 'delitem'){
	if($data['id']){
		require_once(BASE_PATH.'/tree.php');
		$ctree = new cTree(1);
		$ids=$ctree->getListChilds($data['id']);
		$sql = 'DELETE FROM `tr_tree` WHERE id IN('.$ids.')';
		$db->query($sql);
	}
	echo json_encode(array('result' => 'success','data' => $data));
}

?>
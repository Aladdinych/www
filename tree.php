<?php
class cTree{

public $tree;
public $parentslist;

function __construct($expand = 0){
	$this->parentslist = $this->getTreeData($expand);
	$this->tree = $this->buildTree($this->parentslist,0);

}

private function getTreeData($expand=0) {
	global $db;
	$sql = 'SELECT * FROM `tr_tree` ORDER BY parent,id';
	$res = $db->query($sql);
	if(!$res) return;
	$rows = $res->fetch_all(MYSQLI_ASSOC);

	$tmptree = array();
	foreach($rows as $row){
		$row['expand'] = $expand;
		$tmptree[intval($row['parent'])][] = $row;
	}
	return $tmptree;
}

private function buildTree($branches,$root,$level=0){
	$ctree = array();
	if (is_array($branches) && isset($branches[$root])) {
		foreach($branches[$root] as $item){
			$item['level'] = $level;
			$item['childs'] = $this->buildTree($branches, intval($item['id']),$level+1);
			$ctree[] = $item;
		}
		return $ctree;
	} else {
		return null;
	}	

}

public function getDomBranch($ctree,$level=0,$parent=null){
        return includes('templates/tree_tpl.php',array('ctree' => $ctree, 'level' => $level, 'parent' => $parent, 'treeobj' => $this));
}

public function getDomTree(){
	return $this->getDomBranch($this->tree);
}

public function getListChilds($id){
	$ids = array();
	$clist = array();
	array_unshift($ids,$id);
	while(count($ids)>0){
		$idx = array_pop($ids);
		array_push($clist,$idx);
		if(!empty($this->parentslist[$idx]))
			foreach($this->parentslist[$idx] as $id_){
				array_unshift($ids,$id_['id']);
			}
	}
	return implode(',',$clist);
}

}
?>
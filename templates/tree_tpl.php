<?php
$dpad = 7;
$pd = ($level > 0) ? ($dpad + $dpad*$level) : 0;
?>
<ul class="simple-tree" <?if($parent){?>id="ul_<?=$parent['id']?>"<?}?> <?if($parent){?>style="<?if(!$parent['expand']){?>display:none;<?}?>"<?}?> data-level="<?=$level;?>">
<?foreach($ctree as $item){?>
	<li <?if($item['active']){?>class="active"<?}?> <?if($level > 0){?>style="padding-left:<?=$pd;?>px;"<?}?>>
		<?if($item['childs']){?>
			<span class="btn-ex" data-id="<?=$item['id'];?>">+</span>
		<?}else{?>
			<span class="btn-ab">&nbsp;</span>
		<?}?>
		<a href="#" class="tree-item" data-id="<?=$item['id'];?>" data-descr="<?=$item['description'];?>"><?=$item['name'];?></a>
		<?=($item['childs']) ? $treeobj->getDomBranch($item['childs'],$level+1,$item) : '';?>
	</li>
<?}?>
</ul>


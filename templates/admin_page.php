<?php
session_start();
if(!isset($_SESSION['login']))
	header('Location: /');

require_once(BASE_PATH.'/tree.php');
$ctree = new cTree(1);

?>

<div class="wrap">
	<h1>Admin page</h1>
	<div class="simple-section">
		<button class="logout" id="logout">Выйти</button>
	</div>
	<div class="simple-section">
		<div class="simple-tree-cont">
<?= $ctree->getDomTree();?>
		</div>
	</div>
</div>

<div class="ndbox-wrap ndbox-tools" id="ndbox-wrap-1" style="display:none; max-width: 100%;z-index:1000;">
	<div class="ndbox-close ndbox-clickclose" id="ndbox-close"></div>
	<div class="ndbox-inner" id="ndbox-1" style="padding:0px">
		<button type="button" class="btnt but-add" id="but-add" title="Добавить"> </button>
		<button type="button" class="btnt but-remove" id="but-remove" title="Удалить"></button>
		<button type="button" class="btnt but-edit" id="but-edit" title="Редактировать"> </button>
	</div>
</div>


<div class="ndbox-over ndbox-clickclose" id="ndbox-over-2" style="display:none;">
	<div class="ndbox-wrap ndbox-pan" id="ndbox-wrap-2" style="display:block;width: 750px; max-width: 100%; margin-top: 30px; margin-bottom: 20px;">
		<div class="ndbox-inner" id="ndbox-2">
		<form action="/tr_ajax.php?do=save" method="POST" id="treeedit"  enctype="multipart/form-data">
		<input type="hidden" name="id" value="">
		<input type="hidden" name="mode" value="">
		<div class="form-group">
			<div class="form mess"></div>
			<div class="form">
				<label class="required">Наименование:</label>
				<input name="name" value="<?=$name;?>" placeholder="Наименование" required="" autocomplete="name" type="text">
			</div>
			<div class="form">
				<label>Описание:</label>
				<input name="description" value="<?=$description;?>" placeholder="Описание"  autocomplete="description" type="text">
			</div>
			<div class="form mb-0">
				<label>Переместить узел:</label>
				<div class="form">
					<div class="form" style="margin-top:20px;">
						<label class="radio">
							<input id="delivery-1" name="addtype" value="1" data-type="0" type="radio">Сделать дочерним для
						</label>
						<div class="add-tree">
						<input type="text" name="inpcat" class="treeinp" value="<?=$itemname?>" style="width:230px;margin-left:10px;margin-top:-7px;" readonly >
						<input type="hidden" name="pcat" value="<?=$parent_id?>">
						<button type="button" class="treebut" id="treebut" style="margin-top:-7px;">></button>
						<div class="treewrap" id="treewrap" style="top:27px;right:0px;"><?=$ctree->getDomTree();?></div>
						</div>
					</div>
					<div class="form">
						<label class="radio">
							<input id="delivery-2" name="addtype" value="2" data-type="0" type="radio">В корень дерева
						</label>
					</div>
				</div>
			</div>
			<div class="form form-center">
				<button type="reset" class="btn btn-cancel cancel" id="btn-cancel">Отменить</button>
				<button type="submit" class="btn btn-submit submit" id="btn-submit" style="margin-left:20px;">Сохранить</button>
			</div>
		</div>
		</form>
		</div>
	</div>
</div>

<script src="/js/scripta.js"  type="text/javascript"></script>

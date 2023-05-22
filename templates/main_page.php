<?php
require_once(BASE_PATH.'/tree.php');
$ctree = new cTree(0);

?>
<div class="wrap">
	<h1>Simple page</h1>
	<div class="simple-section">
		<button class="login" id="login">Войти</button>
	</div>
	<div class="simple-section">
		<div class="simple-tree-cont">
<?= $ctree->getDomTree();?>
		</div>
		<div class="ndbox-over ndbox-clickclose" id="simple-over">
			<div class="ndbox-wrap ndbox-pan" id="ndbox-wrap-1">
				<div class="ndbox-close" id="ndbox-close"></div>
				<div class="ndbox-inner simple-inner" id="simple-box">

				</div>
			</div>
		</div>
	</div>
</div>

<?=includes('/templates/login_form.php');?>

<script src="/js/script.js"  type="text/javascript"></script>

<?php

?>
<div class="pan-over" id="pan-over"><div class="login-wrap">	
	<h3>Вход на сайт</h3>
	<div class="logclose" onclick="document.getElementById('pan-over').style.display='none';"><img src="/img/delete16.png"></div>
	<div class="block-body">
		<form action="" id="loginform" method="post">
			<div class="form mb-0">
				<div class="forml mess"><span style="color:red;" id="mess"></span></div>
				<div class="forml">
					<input name="login" placeholder="Логин пользователя" required="" type="text" value="">
				</div>
				<div class="forml">
					<input name="password" placeholder="Пароль" required="" type="password">
				</div>
				<div class="forml">
					<button type="submit" class="btn btn-primary btn-block">Войти</button>
				</div>
			</div>
		</form>
	</div>
</div></div>

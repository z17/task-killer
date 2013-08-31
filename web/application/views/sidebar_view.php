<div id="sidebar">
	<div class="block1">
	<?php if (isset($data['user']))
	{
	?>
		<div class="block1title">Личный кабинет</div>
		<div class="block1content">
			<p class="balans">Ваш баланс: <span style="color:#000;"><?=$data['user']['balance']?></span></p>
			<div class="prlink">
				<li><a href="/pay">Пополнить баланс »</a></li>
				<li><a href="#">Заказанные задачи »</a></li>
				<li><a href="/order">Заказать задачу »</a></li><li><a href="solve.php">Выполнить задание »</a></li>
				<li><a href="/profile">Профиль »</a></li>
				<div style="margin-top:50px; text-align:right;"><a href="/profile/exit">Выход</a></div>
			</div>
		</div>
	<?php
	}
	else
	{ ?>
		<div class="block1title">Войти в систему</div>
		<div class="block1content">
			<form action="/login" method="post" name="mf">
				<div class="login">логин:
						<div class="login1">
							<input class="loginField" name="login" type="text" style="width:100%;">
						</div>
						пароль:
						<div class="login1">
							<input class="loginField" name="password" type="password" style="width:100%">
						</div>
					
				</div>
				<div class="loginbut">
					<a href="forgot.php">Забыли пароль?</a>
					<input class="loginButton" type="submit" value="">
					<input type="text" name="fl" value="true" hidden=""/>
					<br>
					<a href="register">Регистрация</a>
				</div>
			</form>
		</div>
	<?php } ?>
	</div>
</div>
<?php
if ($data['login'] == false)
{
	?>
	<div class="loginProfile">
		<h2>Войти в систему</h2>
		<form action="/login" method="post">
		<table width="100%" cellspacing="0" border="0">
			<tr>
				<td class="loginput">
					логин:<br>
					<input class="loginField" type="text" name="login">
				</td>
				<td class="loginput">
					пароль:<br>
					<input class="loginField" type="password" name="password">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="loginbut">
					<input class="loginButton" name="sbm" type="submit" value="">
					<input type="text" name="fl" value="true" hidden>
					<br>
					<a href="">Забыли пароль?</a> | 
					<a href="prereg.php">Регистрация</a>
				</td>
			</tr>
		</table>

		</form>
	</div>
	<?php
}
else
{
?>
<div class="block1title">Профиль</div>
	<table style="width:100%;">
    <tbody>
      <tr>
        <td style="width:33%;">
          <p class="balans">
            Ваш баланс:									
            <big style="font-weight: 400; color:#000;"><?=$data['user']['balance']?></big>
          </p>
          <div class="prlink">
			<li><a href="/pay">Пополнить баланс »</a></li>
			<li><a href="/moneyback">Снять деньги »</a></li><br>
			<li><a href="#">Заказанные задачи (3) »</a></li>
			<li><a href="order">Оформить заказ »</a></li>
			<li><a href="solve">Выполнить задание »</a></li>
          </div>
        </td>
        <td style="width:34%;">
          <div class="prinfo">
            <p>
              Логин: 
              <b><?=$data['user']['login']?></b>
            </p>
            <p>
              Email: 
              <b><?=$data['user']['email']?></b>
            </p>
			 <p>
              Имя: 
              <b><?=$data['user']['name']?></b>
            </p>
			<p>
              Регистрация:
              <b><?=$data['user']['dateregister']?></b>
            </p>
            <p>
              <li><a href="/profile/edit">Редактировать профиль</a></li>
            </p>
          </div>
        </td>
        <td style="width:33%;">
          <div class="prlink">
            <p class="balans">Реферальная система</p>
            <p class="balans">(в разработке)</p>
            <p>
				Приглашайте новых людей на сайт и получайте 10% прибыли от их заказов!<br>
				<li><a href="/referalsystem.php">Подробнее »</a></li>
				<li><a href="/referals.php">Ваши рефералы »</a></li>
            </p>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
<?php
}
?>

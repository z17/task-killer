<?php
	if (isset($data['message']))
	{
			echo "<p class=\"bluetext\">".$data['message']."</p>";
	}
	if (isset($data['error']))
	{
			echo "<p class=\"redtext\">".$data['error']."</p>";
	}
?>
<?php
if ($data['message'] != "Вход выполнен" and $data['message'] != "Вы уже авторизованы") {
?>
<form action="/login" method="post">
<table width="100%" cellspacing="10px" border="0px">
  <tbody>
    <tr>
      <td>Введите логин</td>
      <td>
        <div class="login1">
          <input type="text" name="login" size="20" value="<?=$data['login']?>">
        </div>
      </td>
    </tr>
    <tr>
      <td>Введите пароль</td>
      <td>
        <div class="login1">
          <input type="password" name="password" size="20">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="Отправить">
		<input type="text" name="fl" value="true" hidden>
      </td>
    </tr>
  </tbody>
</table>
</form>
<?php } ?>
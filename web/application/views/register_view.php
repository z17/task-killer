<?=$data['message']?><br>
<?php
	if (isset($data['errors']))
	{
	  foreach($data['errors'] as $error)
		{
			echo "<li class=\"redtext\">".$error."</li>";
		}
	}
?>
<?php
if ($data['message'] != "Регистрация прошла успешно") // плохой способ, но пока что будет так
{
?>
<form action="/register" method="post">
<table width="100%" cellspacing="10px" border="0px">
  <tbody>
    <tr>
      <td>Логин:</td>
      <td style="width:600px;">
        <span id="user"></span>
        <div class="login1">
          <input type="text" name="login" value="<?=$data['login']?>">
        </div>
      </td>
    </tr>
    <tr>
      <td>Пароль:</td>
      <td>
        <div class="login1">
          <input type="password" name="password">
        </div>
      </td>
    </tr>
	<tr>
     <td>e-mail:</td>
      <td>
        <div class="login1">
          <input type="text" name="email"  value="<?=$data['email']?>">
        </div>
      </td>
    </tr>
	<tr>
     <td>Имя:</td>
      <td>
        <div class="login1">
          <input type="text" name="name"  value="<?=$data['name']?>">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="Зарегестрироваться">
		<input type="text" name="fl" value="true" hidden>
      </td>
    </tr>
  </tbody>
</table>
</form>
<?php } ?>
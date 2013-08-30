<?=$data['message']?>
<?php
	if (isset($data['errors']))
	{
	  foreach($data['errors'] as $error)
		{
			echo "<li class=\"redtext\">".$error."</li>";
		}
	}	
?>
<form action="/profile/edit" method="post">
<table width="100%" cellspacing="10px" border="0px">
  <tbody>
    <tr>
      <td>Новое имя:</td>
      <td style="width:600px;">
        <span id="user"></span>
        <div class="login1">
          <input type="text" name="newName">
        </div>
      </td>
    </tr>
    <tr>
      <td>Новый пароль:</td>
      <td>
        <div class="login1">
          <input type="password" name="newPassword">
        </div>
      </td>
    </tr>
	<tr>
      <td>Старый пароль:</td>
      <td>
        <div class="login1">
          <input type="password" name="password">
        </div>
      </td>
    </tr>
	<tr>
     <td>Новый e-mail:</td>
      <td>
        <div class="login1">
          <input type="text" name="newEmail">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="Редактировать">
		<input type="text" name="fl" value="true" hidden>
      </td>
    </tr>
  </tbody>
</table>
</form>
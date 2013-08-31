<?=$data['message']?>
<?php
	if (isset($data['errors']))
	{
	  foreach($data['errors'] as $error)
		{
			echo "<li class=\"redtext\">".$error."</li>";
		}
	}?><br><br>
<form action="/solve/additem" method="POST">
	<table border="0">
		<tr>
			<td style="width:150px; padding:1px;">Название предмета:</td>
			<td style="width:250px; padding:1px;"> <input type="text" name="name"></td>
		</tr>
		<tr>
			<td style="width:150px; padding:1px;">Цена:</td>
			<td style="width:250px; padding:1px;"><input type="text" name="price"></td>
		</tr>
	</table>
	<input type="submit" value="Отправить">
	<input type="text" name="fl" value="true" hidden>
</form>
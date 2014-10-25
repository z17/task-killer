<?=$data['message']?>
<?php
	if (isset($data['errors']))
	{
	  foreach($data['errors'] as $error)
		{
			echo "<li class=\"redtext\">".$error."</li>";
		}
	}?><br><br>
<form action="/moneyback" method="POST">
	<table border="0">
		<tr>
			<td style="width:150px; padding:1px;">Сумма выплаты:</td>
			<td style="width:250px; padding:1px;"> <input type="text" name="outSum"> рублей</td>
		</tr>
		<tr>
			<td style="width:150px; padding:1px;">WMR кошелёк:</td>
			<td style="width:250px; padding:1px;"><input type="text" name="wmr"></td>
		</tr>
	</table>
	<input type="submit" value="Отправить">
	<input type="text" name="fl" value="true" hidden>
</form>
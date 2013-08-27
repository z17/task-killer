<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
$css = array(LocCss()."main.css");
head("Рефералы пользователя", null, 23, $css, null);
?>
<h2>Ваши рефералы</h2>
<table cellpadding="0" cellspacing="0" class="reftable">
	<tr>
		<td>Ник</td>
		<td>Уровень реферала</td>
		<td>Дата регистрации</td>
		<td>Общий доход от реферала</td>
	</tr>
	<tr>
		<td colspan="4"><em>У вас нет рефералов</em></td>
	</tr>
</table>
<p>
Реферальную ссылку можно получить на <a href="/referalsystem.php" title="Реферальная система">этой</a> странице.
</p>
<?php
footer(2, null);
?>
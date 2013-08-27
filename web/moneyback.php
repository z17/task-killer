<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
$css = array(LocCss()."main.css");
head("Заказ выплаты", null, 2, $css, null);
?>

<h1>Вывести деньги</h1>
<p>Выплаты возможны не чаще одного раза в неделю на ваш WMR кошелёк.<br>Минимальная сумма выплаты - 15 рублей.</p>
<?php 
if ((isset($_SESSION["login"])) && (isset($_SESSION["pwd"])))
{
	$base = GetBase(LocUsers().$_SESSION["login"].".txt");
	$money = GetMoney($base);
	if ($money >= 15)
	{
		echo   "
		<form action=\"http://task-killer.ru/moneybackmail.php\" method=\"POST\">\n
		<table border=\"0\">
		<tr>
			<td style=\"width:150px; padding:1px;\">Сумма выплаты:</td>
			<td style=\"width:250px; padding:1px;\"> <input type=\"text\" name=\"OutSum\"> рублей</td>
		</tr>
		<tr>
			<td style=\"width:150px; padding:1px;\">WMR кошелёк:</td>
			<td style=\"width:250px; padding:1px;\"><input type=\"text\" name=\"WMR\"> </td>
		</tr>
		</table>
		<input type=\"submit\" value=\"Оплатить\">\n
		</form>\n";
	}
	else
	{
		echo "На вашем балансе недостаточно денег для выплаты";
	}
}
else
{
	echo "<p>Авторизируйтесь или зарегестрируйтесь.</p>";
}
?>

<?php
footer(2, null);
?>
<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
$css = array(LocCss()."main.css");
head("Заказ выплаты", null, 2, $css, null);

if ((isset($_SESSION["login"])) && (isset($_SESSION["pwd"])))
{
	$base = GetBase(LocUsers().$_SESSION["login"].".txt");
	$money = GetMoney($base);
	$sum = $_POST['OutSum'];
	$WMR = $_POST['WMR'];
	$login = $_SESSION["login"];
	if ($sum > $money)
	{
		echo   "<p>У Вас на счету недостаточно средств для вывода $sum рублей.</p>";
	}
	else
	{
		$to = 'support@task-killer.ru';
		$subject = 'Вывод денег';
		$headers = 'From: support@task-killer.ru' . "\r\n" . 'Content-type: text/html; charset=UTF-8';		
		$message = "Запрос на вывод денег\r\n WMR: $WMR\r\n Сумма:$sum \r\n Пользователь: $login\r\n\r\n-----------\r\nПисьмо сгенерировано автоматически, отвечать на него не следует.";
		mail($to, $subject, $message, $headers); 
		echo "Запрос на выплату на кошелёк $WMR выслан успешно, деньги будут перечислены вам в течении 3-х дней.";
	}
}
else
{
	echo "<p>Авторизируйтесь или зарегестрируйтесь.</p>";
}

footer(2, null);
?>
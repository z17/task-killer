<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."cookie.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."error.php");
include_once(LocPhp()."mail.php");
function PrintEmpty()
{
	echo "<p><h2>Добро пожаловать на страницу восстановления пароля!</h2></p>
<form action=\"forgot.php\" method=\"post\" name=\"mf\">
<table width=\"100%\" border=\"0px\">
<tr><td>Введите логин</td><td><input type=\"text\" name=\"login\" size=\"30\"></td></tr>
<tr><td><input type=\"submit\"></td></tr>
</table>
</form>";
}
$css = array(LocCss()."main.css");
$pagenum = 11;
head("Восстановление пароля", null, $pagenum, $css, null);
$login = $_POST["login"];
if (!isset($_POST["login"]) || (empty($_POST["login"])))
{
	PrintEmpty();
	footer($pagenum, null);
	exit();
}
$path = GetUsersPathByLogin($login);
if (!file_exists($path))
{
	echo "<font color=\"red\">Пользователь с логином $login не числится в нашей базе данных.</font>";
	PrintEmpty();
	footer($pagenum, null);
	exit();
}
$user = GetBase(GetUsersPathByLogin($login));
$topic = "Восстановление пароля";
$msg = "<html><head></head><body>Добрый день!<br><br>Письмо отправлено автоматически с целью восстановления Вашего пароля. Ваш пароль: ".GetPwd($user)."<br><br>".GetSign();
SendMail(GetEmail($user), $topic, $msg);
echo "<font color=\"green\">Вам на почту было выслано письмо, содержащее пароль от Вашего аккаунта.</font>";
footer($pagenum, null);
?>
<?php
include_once("Base/Php/loc.php");
//include_once(LocPhp()."main.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."check.php");
$css = array(LocCss()."main.css");
$js = array(LocJs()."checklogin.js");
session_start();
if (isset($_SESSION["login"]) || (isset($_SESSION["pwd"])))
{
	header("Location: profile.php");
	exit();
}	
$login = $_POST["login"]; $pwd = $_POST["pwd"];
if (CheckLogin($login)!=0) { header("Location: login.php?error=".CheckLogin($login)); exit(); }
if (CheckPwd($pwd)!=0) { header("Location: login.php?error=".CheckPwd($pwd)); exit(); }
$path = LocUsers()."$login.txt";
if (!file_exists($path))
{
	header("Location: login.php?error=5");
	exit();
	//head("Авторизация", null, 0, $css, $js);
	//echo "Пользователя с данным ";
	//echo "Чтобы вернуться к странице авторизации, перейдите по <a href=\"login.php\">ссылке.</a>";
	//footer();
}
$user = GetBase($path);
if ($pwd!=GetPwd($user))
{
	header("Location: login.php?error=3");
	exit();
}	
session_start();
$_SESSION["login"] = $login; $_SESSION["pwd"] = $pwd; $_SESSION["type"] = Gethtype($user);
header("Location: profile.php");
?>
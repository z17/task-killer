<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."cookie.php");
include_once(LocPhp()."io.php");
$error = $_GET["error"]; $pos = $_GET["pos"]; //if pos==-1 { output error mesage before form } if pos==1 { output position - after form }
if (!isset($_GET["error"])) { $error = 0; }
if (!isset($_GET["pos"])) { $pos = 1; }
$css = array(LocCss()."main.css");
$js = array(LocJs()."checklogin.js");
head("Авторизация", null, 7, $css, $js);
if ($pos==-1) { echo Error($error); }
?>
<form action="startsession.php" onsubmit="return FullCheck(); " method="post">
<table width="100%" cellspacing="10px" border="0px">
<tr><td>Введите логин</td><td><div class="login1"><input type="text" name="login" size="20"></div></td></tr>
<tr><td>Введите пароль</td><td><div class="login1"><input type="password" name="pwd" size="20"></div></td></tr>
<tr><td><input type="submit" value="Отправить"></td></tr>
</table>
</form>
<?php
if ($pos==1)
{
	echo Error($error);
}
footer(7, null);
?>
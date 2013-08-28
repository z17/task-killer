<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."io.php");
$css = array(LocCss()."main.css");
$js = array(LocJs()."check.js", LocJs()."checkreg.js", LocJs()."usrexists.js");
if (isset($_SESSION["login"]) || (isset($_SESSION["pwd"])))
{
	header("Location: profile.php");
	exit();
}
head("Регистрация", null, 9, $css, $js);
function Reg0($type)
{
	echo "<form action=\"adduser.php\" name=\"mf\" method=\"post\" onSubmit=\"return FullCheck()\" target=\"myframe\">
<input type=\"hidden\" name=\"type\" value=\"0\">
<table width=\"100%\" cellspacing=\"10px\" border=\"0px\">
<tr>
	<td>Логин</td>
    <td style=\"width:400px;\"><span id=\"user\"></span><div class=\"login1\"><input type=\"text\" name=\"login\" onchange=\"Usr();\"/></div></td>
	
</tr>
<tr>
	<td>Пароль</td>
    <td><div class=\"login1\"><input type=\"password\" name=\"pwd\"/></div></td>
</tr>
<tr>
	<td>Адрес электронной почты</td>
    <td><div class=\"login1\"><input type=\"text\" name=\"email\"></div></td>
</tr>

<tr>
    <td><input type=\"submit\" value=\"Отправить\"></td>
</tr>
</table>
</form>";
echo GetMyFrame();
}
function GetMyFrame()
{
	return "<iframe name=\"myframe\" width=\"600px\" frameborder=\"0\">Ваш браузер не поддерживает фреймовую структуру.</iframe>";
}
function Reg10($type)
{
	$a = GetBase(LocInfo()."SubName.txt");
	$b = GetBase(LocInfo()."SubValue.txt");
	echo "<form action=\"adduser.php\" name=\"mf\" method=\"post\" onSubmit=\"return FullCheck()\" target=\"myframe\">
<input type=\"hidden\" name=\"type\" value=\"10\">
<table width=\"100%\" cellspacing=\"10px\" border=\"0px\">
<tr>
	<td>Логин</td>
    <td style=\"width:400px;\"><span id=\"user\"></span><div class=\"login1\"><input type=\"text\" name=\"login\" onchange=\"Usr();\"/></div></td>
</tr>
<tr>
	<td>Ваш новый пароль</td>
    <td><div class=\"login1\"><input type=\"password\" name=\"pwd\"/></div></td>
</tr>
<tr>
	<td>Выданный пароль</td>
	<td><div class=\"login1\"><input type=\"password\" name=\"keypwd\"></div></td>
</tr>
<tr>
	<td>Адрес электронной почты</td>
    <td><div class=\"login1\"><input type=\"text\" name=\"email\"></div></td>
</tr>
<tr>
	<td>Предметы</td>
	<td>";
	for ($i=0; $i<count($a); $i++)
	{
		echo "<input type=\"checkbox\" name=\"subj[]\" value=\"$b[$i]\">$a[$i]<br>";
	}
	echo "</td>
</tr>
<tr>
    <td><input type=\"submit\" value=\"Отправить\"></td>
</tr>
</table>
</form>";
echo GetMyFrame();
}
$type = $_GET["type"];
if (!isset($type)) { $type = 0; }
if ($type==0) { Reg0($type); }
if ($type==10) { Reg10($type); }
?>
<?php
footer(9, null);
?>
<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."solvepage.php");
include_once(LocPhp()."subj.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."info.php");
include_once(LocPhp()."error.php");
session_start();
if (!isset($_SESSION["login"]) || (!isset($_SESSION["pwd"])))
{
	header("Location: login.php?error=15&pos=-1");
	exit();
}
if (GetUserLevel($_SESSION["login"])<1)
{
	header("Location: outerror.php?error=25");
	exit();
}
$resp = $_GET["resp"];
if (($resp<0) || ($resp>2) || (!isset($resp)))
{
	$resp = 0;
}
head(array(), array(LocCss()."solver.css"), array());
echo "Выберите задание, от которго вы намерены отказаться.<br>";
echo "<form name=\"mf\" method=\"post\" action=\"areject.php\" target=\"_self\">\n<input type=\"hidden\" name=\"slogin\" value=\"".$_SESSION["login"]."\">";
$user = GetBase(GetUsersPathByLogin($_SESSION["login"]));
$subjects = explode(" ", GetSubj($user));
$tasks = explode(" ", GetActiveSubj($user));
for ($i=0; $i<count($subjects); $i++)
{
	$tmp = GetBase(LocLists()."List$subjects[$i].txt");
	$amounts[] = count($tmp); 
}	
if ($tasks[0]=="0")
{
	$out = "<font color=\"green\">За вами не числится ни одного задания.</font>";
}
else
{	
	for ($i=0; $i<count($tasks); $i++)
	{
		$out.= "<input type=\"radio\" name=\"ind\" value=\"$tasks[$i]\" onchange=\"javascript: mf.submit(); \" />$tasks[$i]";
	}
}
echo $out;
echo "</form>";
if ($resp==1)
{
	echo "<font color=\"green\">Вы успешно отказались от задания.<br></font>";
}
else if ($resp==2)
{

}
echo "";
footer(array(1, $amounts));
?>
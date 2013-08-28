<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."solvepage.php");
include_once(LocPhp()."subj.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."info.php");
include_once(LocPhp()."error.php");
include_once(LocPhp()."compare.php");
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
function AddTask($ind, $sname, $values)
{
	$path = LocPaid()."Ord$ind";
	$p = $path."/Ord$ind.txt";
	$a = GetBase($p);
	$subj = GetSubjByValue($sname, $values, $a[2]);
	$time = CalcT(date("d.m.Y"), date("H:i"), $a[7], $a[8]);
	$out = "<div class=\"task\"><div style=\"float:left;\">Предмет: $subj($ind)</div><div style=\"float:right;\">";
	if ($time<1) { $out.= "<font color=\"red\">Срок выполнения: до $a[7] $a[8]</font></div><div class=\"clear\"></div>"; }
	else { $out.= "Срок выполнения: до $a[7] $a[8]</div><div class=\"clear\"></div>"; }
	if (file_exists($path."/Text.txt"))
	{
		$out.= "<div class=\"linetask\"></div><div>";
		$out.= PrintFile($path."/Text.txt");
		$out.= "</div>";
	}
	$dir= @opendir($path);
	while ($f=readdir($dir))
	{
		if (($f!=".") && ($f!=".."))
		{
			$q = explode(".", $f);
			if ($q[count($q)-1]!="txt") { $photo[] = $f; }
		}
	}
	closedir($dir);
	$out.= "<div>";
	for ($i=0; $i<count($photo); $i++)
	{
		$out.= "<a href=\"download.php?path=".LocPaid()."Ord$ind/$photo[$i]\">Скачать</a> условие задания.<br>";
	}
	$out.= "</div>";
	$out.= "<input type=\"radio\" name=\"ind\" value=\"$ind\" onchange=\"javascript: mf.submit(); \">";
	$out.= "<div class=\"more\"><a href=\"#\" title=\"Взять на решение\">Подробнее >></a></div></div>";
	echo $out;
}
function PrintFile($path)
{
	$a = file($path); $s = "";
	foreach ($a as $x) { $s.= $x; }
	return $s;
}
$args = array(); $css = array(LocCss()."solver.css"); $js = array();
head($args, $css, $js);
$sname = GetBase(LocInfo()."SubName.txt");
$values = GetBase(LocInfo()."SubValue.txt");
$mode = $_GET["mode"];
$user = GetBase(GetUsersPathByLogin($_SESSION["login"]));
$subjects = explode(" ", GetSubj($user));
$ttasks = explode(" ", GetActiveSubj($user));
if ($ttasks[0]=="0") { $tasks = array(); }
else { $tasks = $ttasks; }
for ($i=0; $i<count($subjects); $i++)
{
	if (file_exists(LocLists()."List$subjects[$i].txt"))
	{
		$tmp = GetBase(LocLists()."List$subjects[$i].txt");
		$amounts[] = count($tmp);
	}
}
if (count($amounts)==0)
{
	echo "<font color=\"red\">Нет ни одного доступного задания.</font>";
	footer(array(1, array()));
	exit();
}
if (count($tasks)>=GetMaxTask())
{
	echo "<font color=\"green\">Вы не можете выбирать задачи до тех пор, пока не сдадите в cистему хотя бы одну задачу.</font>";
	footer(array(1, $amounts));
	exit();
}
if (!isset($_GET["mode"]))
{
	$mode = 0;
	for ($i=0; $i<count($subjects); $i++)
	{
		if ($amounts[$i]!=0) { $mode = $subjects[$i]; break; }
	}
}
for ($i=0; $i<count($subjects); $i++)
{
	if ($mode==$subjects[$i]) { $bool = true; break; }
}
if ((!$bool) || ($mode==0)) { $mode = $subjects[0]; }
echo "<div align=\"center\">".GetSubjByValue($sname, $values, $mode)."</div>";
/*$dir= @opendir(LocPaid());
while ($f=readdir($dir))
{
	if (($f!=".") && ($f!=".."))
	{ 
		$orders[] = intval(substr($f, 3, strlen($f)-1));
	}
}
closedir($dir);
*/
echo "<form name=\"mf\" method=\"post\" action=\"distribute.php\" target=\"_self\">\n<input type=\"hidden\" name=\"slogin\" value=\"".$_SESSION["login"]."\">";
/*for ($i=0; $i<count($orders); $i++)
{
	AddTask($orders[$i], $sname, $values);
}*/
$lists = GetBase(LocLists()."List$mode.txt");
if (count($lists)==0)
{
	echo "<font color=\"red\">Нет ни одного доступного задания.</font>";
}
for ($i=0; $i<count($lists); $i++)
{
	AddTask($lists[$i], $sname, $values);
}	
echo "</form>";

footer(array(1, $amounts));
?>

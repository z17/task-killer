<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."solvepage.php");
include_once(LocPhp()."info.php");
include_once(LocPhp()."error.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."mail.php");
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
$ind = $_POST["ind"]; $login = $_POST["login"];
if (!isset($ind) || (empty($ind)))
{
	header("Location: sendsolution.php?resp=29");
	exit();
}		
$path = LocSolutions()."Ord$ind";
if ($_FILES["f"]["size"]==0)
{
	header("Location: sendsolution.php?resp=30");
	exit();
}
mkdir($path, 0777);
if ($_FILES["f"]["error"]==0 && $_FILES["f"]["size"]>0)
{
	$q = explode(".", $_FILES["f"]["name"]);
	$p = $path."/file.".$q[count($q)-1];
	if (@move_uploaded_file($_FILES["f"]["tmp_name"], $p)) { }
}
$user = GetBase(GetUsersPathByLogin($login));
$user[NGetSolved()] = intval($user[NGetSolved()])+1;
$q = explode(" ", GetActiveSubj($user)); $q1 = "";
for ($i=0; $i<count($q); $i++)
{
	if ($q[$i]!=$ind) { $q1.= $q[$i]." "; }
}
$q1 = trim($q1);
if ($q1=="") { $q1 = "0"; }
$user[NGetActiveSubj()] = $q1;
WriteBase($user, GetUsersPathByLogin($login));
//mkdir(LocCompleted()."$Ord$ind", 0777);
CutDir(LocSolving()."Ord$ind", LocCompleted()."Ord$ind");
$base = GetBase(LocCompleted()."Ord$ind/Ord$ind.txt");
$u = GetBase(LocUsers().$base[0].".txt");
$dir= @opendir(LocSolutions()."Ord$ind");
while ($f=readdir($dir))
{
	if (($f!=".") && ($f!=".."))//it doesn't work! out: Ord5/0
	{ 
		$orders[] = $f;
	}
}
closedir($dir);
$dir= @opendir(LocCompleted()."Ord$ind");
while ($f=readdir($dir))
{
	if (($f!=".") && ($f!=".."))//it doesn't work! out: Ord5/0
	{ 
		$q = explode(".", $f);
		if ($q[count($q)-1]!="txt")
		{
			$cs[] = $f;
		}
	}
}
closedir($dir);
$txt = GetBase(LocCompleted()."Ord$ind/Text.txt");
$ps = "";
for ($i=0; $i<count($txt); $i++)
{
	$ps.= $txt[$i]." ";
}
$msg = "<html><head></head><body>Добрый день!<br><br>Заказ №$ind успешно выполнен!<br><br>";
if ($ps=="")
{
	$msg.= "Словесная формулировка условия не прилагалась.<br>";
}
else
{
	$msg.= "Условие задачи в словесной формулировке: $ps<br>";
}
if (count($cs)==0)
{
	$msg.= "Изображение к условию задачи не прилагалось.<br>";
}
else
{
	$msg.= "Чтобы скачать изображение, прилагаемое к условию задания, перейдите по <a href=\"http://www.task-killer.ru/".LocCompleted()."Ord$ind/".$cs[0]."\">этой</a> ссылке.<br><br>";
}	
$msg.= "Чтобы скачать решение задания, перейдите по <a href=\"http://www.task-killer.ru/".LocSolutions()."Ord$ind/".$orders[0]."\">этой</a> ссылке.<br><br>Если у Вас имеются вопросы или претензии по решению, обращайтесь в службу поддержки Task-Killer.<br><br>".GetSign();
SendMail(GetEmail($u), "Задание №$ind выполнено", $msg);
header("Location: sendsolution.php?resp=1");
//Send me mail that (login) solved task.
?>
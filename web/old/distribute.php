<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."info.php");
include_once(LocPhp()."error.php");
include_once(LocPhp()."mail.php");
$ind = $_POST["ind"]; $slogin = $_POST["slogin"];
$newpath = LocSolving()."Ord$ind";
$user = GetBase(GetUsersPathByLogin($slogin));
$q = explode(" ", GetActiveSubj($user));
if (count($q)>=GetMaxTask())
{
	header("Location: solve.php");
	exit();
}
CutDir(LocPaid()."Ord$ind", LocSolving()."Ord$ind");
$newpath1 = $newpath."/Ord$ind.txt";
$base = GetBase($newpath1);
$base[3] = $slogin;//points to the person
WriteBase($base, $newpath1);
$a = GetBase(LocSolving()."Ord$ind/Text.txt");
$topic = "Заказ №$ind";
$dir= @opendir($newpath);
while ($f=readdir($dir))
{
	if (($f!=".") && ($f!=".."))
	{
		$q = explode(".", $f);
		if ($q[count($q)-1]!="txt") { $photo[] = $f; }
	}
}
closedir($dir);
if (GetActiveSubj($user)=="0") { $user[NGetActiveSubj()] = $ind; }
else { $user[NGetActiveSubj()].= " $ind"; }
WriteBase($user, GetUsersPathByLogin($slogin));
DelLink($base[2], $ind);
$msg = "<html><head></head><body>Добрый день!<br><br>Вы взялись за решение заказа №$ind.<br>";
if (count($a)==0) { $msg.= "Словесная формулировка отсутствует.<br>"; }
else
{
	$msg.= "Словесная формулировка:<br><hr>";
	foreach ($a as $x) { $msg.= $x; }
	$msg.= "<hr><br>";
}
if (count($photo)==0) { $msg.= "Изображение не прилагалось.<br>"; }
else
{
	$msg.= "Чтобы скачать условие задания, перейдите по <a href=\"dowload.php?path=\"".LocSolving()."Ord$ind/$photo[0]\">ссылке</a>.<br>";	
}
$msg.= GetSign();
$email = GetEmail($user);
SendMail($email, $topic, $msg);//Sends mail to solver (slogin) with links to download task
header("Location: solve.php");
?>
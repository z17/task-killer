<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."info.php");
include_once(LocPhp()."error.php");
include_once(LocPhp()."mail.php");
$ind = $_POST["ind"]; $slogin = $_POST["slogin"];
$newpath = LocPaid()."Ord$ind";
$user = GetBase(GetUsersPathByLogin($slogin));
CutDir(LocSolving()."Ord$ind", LocPaid()."Ord$ind");
$q = explode(" ", $user[9]);
if (count($q)==0)
{
	echo Error(24);
	exit();
}
for ($i=0; $i<count($q)-1; $i++)
{
	$q1[] = $q[$i];
}
$newpath.= "/Ord$ind.txt";
WriteBase($q1, $newpath);
//Отправка письма мне, что slogin слюлил.
$base = GetBase($newpath);
$base[3] = "0";
WriteBase($base, $newpath);

?>
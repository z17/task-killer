<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."subj.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."info.php");
include_once(LocPhp()."error.php");
include_once(LocPhp()."appsort.php");
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
$ind = $_POST["ind"];
$newpath = LocPaid()."Ord$ind";
$user = GetBase(GetUsersPathByLogin($_SESSION["login"]));
$q = explode(" ", GetActiveSubj($user));
CutDir(LocSolving()."Ord$ind", $newpath);
if (count($q)==0)
{
	echo Error(24);
	exit();
}
$newpath.= "/Ord$ind.txt"; $q1 = "";
for ($i=0; $i<count($q); $i++)
{
	if ($q[$i]!=$ind) { $q1.= $q[$i]." "; }
}
$q1 = trim($q1);
if ($q1=="") { $q1 = "0"; }
$user[NGetActiveSubj()] = $q1;
WriteBase($user, GetUsersPathByLogin($_SESSION["login"]));
$base = GetBase($newpath);
$base[3] = "0";
WriteBase($base, $newpath);
AppendList(LocLists()."List$base[2].txt", $ind);
header("Location: reject.php?resp=1");
?>
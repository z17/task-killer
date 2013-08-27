<?php
function GetBase($path)
{
	if (!file_exists($path)) { echo Error(1); }
	$a = file($path);
	for ($i=0; $i<count($a); $i++) { $a[$i] = trim($a[$i]); }
	return ($a);
}
function GetByNum($a, $num)
{
	if (($num>=count($a)) || ($num<0)) { echo Error(2); }
	return ($a[$num]);
}
function WriteBase($a, $path)
{
	//if (!file_exists($path)) { Error(1); }
	$s = "";
	for ($i=0; $i<count($a); $i++) { $s .= $a[$i]."\n"; }
	@$f = fopen($path, "w") or die("Error");
	flock($f, 2); 
	fwrite($f, trim($s));
	flock($f, 3);
	fclose($f);
}
function Append($path, $x)
{
	if (!file_exists($path))
	{
		@$fl = fopen($path, "w+") or die("Error");
		flock($fl, 2); $s = fwrite($fl, $x); flock($fl, 3); fclose($fl); unset($fl);
	}
	else
	{
		@$fl = fopen($path, "r") or die("Error");
		flock($fl, 1); $s = fread($fl, 100); flock($fl, 3); fclose($fl); unset($fl);
		@$f = fopen ($path, "a+") or die("Error");
		flock($f, 2);
		if (trim($s)=="") { fwrite ($f, $x); }
		else {	fwrite($f, "\n".$x); }
		flock($f, 3);
		fclose($f);
	}
}
function CopyDir($from, $to)
{
	mkdir($to, 0755);
	$dir= @opendir($from);
	while ($f=readdir($dir))
	{
		if (($f!=".") && ($f!=".."))
		{
			copy($from."/$f", $to."/$f");			
		}
	}
	closedir($dir);
}
function CutDir($from, $to)
{
	mkdir($to, 0755);
	$dir= @opendir($from);
	while ($f=readdir($dir))
	{
		if (($f!=".") && ($f!=".."))
		{
			copy($from."/$f", $to."/$f");	
			unlink($from."/$f");		
		}
	}
	closedir($dir);
	rmdir($from);
}
function DelLink($subj, $ord)
{
	include_once("loc.php");
	$path = LocLists()."List$subj.txt";
	$base = GetBase($path);
	for ($i=0; $i<count($base); $i++)
	{
		if (intval($base[$i])!=$ord)
		{
			$newbase[] = $base[$i];
		}
	}
	WriteBase($newbase, $path);
}
//The following functions work for O(1)
function NGethtype() { return 0; }
function NGetLogin() { return 1; }
function NGetPwd() { return 2; }
function NGetEmail() { return 3; }
function NGetAccount() { return 4; }
function NGetMoney() { return 5; }
function NGetOrders() { return 6; }
function NGetSubj() { return 7; }
function NGetotype() { return 8; }
function NGetSolved() { return 9; }
function NGetActiveSubj() { return 10; }
function NGetAll() { return 11; }
function Gethtype($a) { return GetByNum($a, NGethtype()); }
function GetLogin($a) { return GetByNum($a, NGetLogin()); }
function GetPwd($a) { return GetByNum($a, NGetPwd()); }
function GetEmail($a) { return GetByNum($a, NGetEmail()); }
function GetAccount($a) { return GetByNum($a, NGetAccount()); }
function GetMoney($a) { return GetByNum($a, NGetMoney()); }
function GetOrders($a) { return GetByNum($a, NGetOrders()); }//return string value
function GetSubj($a) { return GetByNum($a, NGetSubj()); }//return string value
function Getotype($a) { return GetByNum($a, NGetotype()); }
function GetSolved($a) { return GetByNum($a, NGetSolved()); }
function GetActiveSubj($a) { return GetByNum($a, NGetActiveSubj()); }
function GetAll($a) { return GetByNum($a, NGetAll()); }
//
?>
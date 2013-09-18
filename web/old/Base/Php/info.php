<?php
function GetEncoding() { return ("UTF-8"); }
function GetCompEmail() { return ("george.kraychik@gmail.com"); }
function GetCompPhone() { return ("+79119850550"); }
function GetMyEmail() { return ("george.kraychik@gmail.com"); }
function GetMyPhone() { return ("+79119850550"); }
function GetCompVkontakte() { return ""; }
function GetCompICQ() { return "256870"; }
function GetMaxTask() { return (2); }
function GetUserLevel($login)
{
	include_once("io.php");
	include_once("loc.php");
	$user = GetBase(GetUsersPathByLogin($login));
	$x = Gethtype($user);
	return (($x-($x%10))/10);
}
?>
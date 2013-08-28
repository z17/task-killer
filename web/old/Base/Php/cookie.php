<?php
function SetCook($name, $value)
{
	setcookie ($name, $value);
}
function GetCookValue($name)
{
	return $_COOKIE[$name];
}
function ClearCook($name)
{
	$_COOKIE[$name] = "";
}
function IsCookSet($name)
{
	if (!isset($_COOKIE[$name])) { return false; }
	else { return true; }
}
function GetConstLoginName()
{
	return "login";
}
function GetConstPwdName()
{
	return "pwd";
}
?>
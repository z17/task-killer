<?php
function GetPassword()
{
	return ("difficultpassword");
}
function GetTmpPassword($path)
{
	@$f = fopen($path, "r") or die("Error reading TmpPassword");
	flock($f, 1); $s = fread($f, 400); flock($f, 3);
	fclose($f); unset($f);
	return $s;
}
function GetRandomPassword()
{
	$a = array('q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','1','2','3','4','5','6','0','8','9','7','z','x','c','v','b','n','m','_','%','!','#','Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M');
	$n = 12; $s = "";
	for ($i=0; $i<$n; $i++)
	{
		$x = mt_rand(0, count($a)-1);
		$s .= $a[$x];
	}
	return $s;
}
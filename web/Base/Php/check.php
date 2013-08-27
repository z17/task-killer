<?php
include_once("compare.php");
function CheckLogin($login)
{
	if (strlen($login)<3) { return 6; }
	if (strlen($login)>20) { return 7; }
	if (!preg_match('/^([A-Za-z0-9])+$/', $login, $a)) { return 8; }
	return (0);
}
function CheckPwd($pwd)
{
	if (strlen($pwd)<5) { return 9; }
	if (strlen($pwd)>30) { return 10; }
	return (0);
}	
function CheckEmail($email)
{
	if (strlen($email)==0) { return (11); }
	if (!preg_match('/^([a-z0-9_\.\-]+@([a-z0-9\-]+\.)+[a-z]{2,4})$/is', $email, $a))
	{
		return (12);
	}
	return (0);
}
function CheckFio($name)
{
	$name = trim($name);
	$q = explode(" ", $name);
	if (count($q)==3) { return true; }
	else return false;
}
function CheckD($d)
{
	$q = explode(".", $d);
	if (!checkdate(intval($q[1]), intval($q[0]), intval($q[2])))
	{
		return (16);
	}
	return (0);
}
function CheckT($t)
{
	$q = explode(":", $t);
	$x[0] = intval(GoodNum($q[0])); $x[1] = intval(GoodNum($q[1]));
	if (($x[0]>23) || ($x[1]>59)) { return (17); }
	else { return (0); }

}
function CheckNum($n)
{
	settype($n, "string");
	if (!preg_match('/^([0-9]+)$/is', $n, $arr))
	{
		return (false);
	}
	else
	{
		return (true);
	}
}
function CheckPhone($phone)
{
	if (((strlen($phone)==12) && ($phone[0]=="+")) || ((strlen($phone)==11) && ($phone[0]!="+")) || ((strlen($phone)==7) && ($phone[0]!="+")))
	{
		if (!preg_match("/^([\+0-9][0-9]+)$/is", $phone))
		{
			return (false);
		}
		else { return (true); }
	}
	else { return false; }
}
function CheckAccount($account)
{
	return (0);
}
function CheckRefCode($code)
{
	return (0);
}
function Devide($x, $y)
{
	return (($x-$x%$y)/$y);
}
function CheckSubjTopic($subj, $topic)
{
	for ($i=0; $i<count($topic); $i++)
	{
		$b = false;
		for ($j=0; $j<count($subj); $j++)
		{
			if (Devide($topic[$i], 10)==Devide($subj[$j], 10))
			{
				$b = true; break;
			}
		}
		if (!$b) { break; }
	}
	return $b;
}
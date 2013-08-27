<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."password.php");
include_once(LocPhp()."error.php");
include_once(LocPhp()."check.php");
include_once(LocPhp()."mail.php");
$type = $_POST["type"]; $login = $_POST["login"]; $keypwd = $_POST["keypwd"]; $pwd = $_POST["pwd"]; $email = $_POST["email"]; $account = $_POST["account"];
if (!isset($type)) { $type = 0; }
$bool = false;
$res = CheckLogin($login);
if ($res!=0) { $bool = true; echo Error($res); }
$res = CheckPwd($pwd);
if ($res!=0) { $bool = true; echo Error($res); }
$res = CheckEmail($email);
if ($res!=0) { $bool = true; echo Error($res); }
$res = CheckAccount($account);
if ($res!=0) { $bool = true; echo Error($res); }
if ($bool) { exit(); }
if (file_exists(LocUsers()."$login.txt"))
{
	echo Error(13);
	exit();
}	
$c = GetBase(LocInfo()."TmpPwd.txt");
if ($type==10)//for solvers
{
	if ($c[0]!=$keypwd) { echo Error(3); exit(); }
	$c[0] = GetRandomPassword();
	WriteBase($c, LocInfo()."TmpPwd.txt");
}
if (($type>=10) && ($type<=19)) { SendMail(GetMyEmail(), "Новый пароль", $c[0]); }//Sends mail to me with new TmpPassword
//$base = array($type, $login, $pwd, $email, $account, "0", "0");
$base = array($type, $login, $pwd, $email, "0", "0", "0");
$path = LocUsers()."$login.txt";
if ($type==10)
{
	$subj = $_POST["subj"]; $s = "";
	$res = CheckPwd($keypwd);
	if ($res!=0) { echo Error($res); exit(); }
	if (!isset($_POST["subj"]) || ($subj==""))
	{
		echo Error(14);
		exit();
	}
	foreach ($subj as $x) { $s .= $x." "; }
	$s = trim($s);
	$base[] = $s;
	$base[] = 0; $base[] = 0; $base[] = 0; $base[] = 0;
}
WriteBase($base, $path);
if ($type==0) { Append(LocInfo()."UserList.txt", $login); }
else if ($type==10) { Append(LocInfo()."SolverList.txt", $login); }
$msg = "<html><head></head><body>Добрый день!<br><br>Вы успешно зарегистрировались в системе Task-Killer.<br><br>Ваш логин: ".GetLogin($base)."<br>Ваш пароль: ".GetPwd($base)."<br><br>".GetSign();
SendMail(GetEmail($base), "Регистрация", $msg);
echo "<font color=\"green\">Вы успешно зарегистрированы. На Ваш адрес электронной почты были высланы ваш логин и пароль.</font>";
?>
<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."check.php");
include_once(LocPhp()."appsort.php");
include_once(LocPhp()."mail.php");
$ldate = $_POST["ldate"]; $ltime = $_POST["ltime"]; $sum = $_POST["sum"]; $subj = $_POST["subj"]; $task = $_POST["task"]; $code = $_POST["code"];
if (!isset($_SESSION["login"]) || (!isset($_SESSION["pwd"])))
{
	header("Location: login.php?error=15?pos=-1");
	exit();
}
$login = $_SESSION["login"]; $type = $_SESSION["type"];
$res = CheckD($ldate);
if ($res!=0) { echo Error($res); exit(); }
$res = CheckT($ltime);
if ($res!=0) { echo Error($res); exit(); }
if (CalcT(GetD(), GetT(), $ldate, $ltime)<GetMinTime()) { echo Error(22); exit(); }
if (!isset($_POST["subj"])) { echo Error(18); exit(); }
$res = CheckRefCode($code);
if ($res!=0) { echo Error($res); }
$b = GetBase(LocInfo()."SubValue.txt");
$c = GetBase(LocInfo()."SubPrice.txt");
for ($i=0; $i<count($b); $i++)
{
	if ($b[$i]==$subj) { break; }
}
if ($sum!=$c[$i]) { echo Error(20); exit(); }//Необходимо отправить письмо мне с уведомлением о критической ошибке системы.
if (($_FILES["f"]["size"]==0) && (empty($_POST["task"]))) { echo Error(21); exit(); }

//
$b = GetBase(LocInfo()."OrdNum.txt");
$num = $b[0] + 1; $b[0] = $num;
WriteBase($b, LocInfo()."OrdNum.txt");
$path = LocPaid()."Ord$num";
mkdir($path, 0777);
if ($_FILES["f"]["error"]==0 && $_FILES["f"]["size"]>0)
{
	$q = explode(".", $_FILES["f"]["name"]);
	$p = $path."/file.".$q[count($q)-1];
	if (@move_uploaded_file($_FILES["f"]["tmp_name"], $p)) { }
}
$path1 = $path;
$path = $path."/Ord$num.txt";
$a = array($login, $type, $subj, 0, $sum, GetD(), GetT(), $ldate, $ltime);
WriteBase($a, $path);
$path = $path1."/Text.txt";
$a = array($task);
WriteBase($a, $path);
$user = GetBase(LocUsers()."$login.txt");
if ($user[NGetOrders()]=="0") { $user[NGetOrders()] = $num; }
else { $user[NGetOrders()].= " $num"; }
WriteBase($user, LocUsers()."$login.txt");
SendMail("gik06@yandex.ru", "Новое задание", "<html><head></head><body>Новый заказ!<br><br>Логин: $login<br>Предмет: $subj<br>Срок выполнения: $ldate $ltime</body></html>");
AppendList(LocLists()."List$subj.txt", $num); 
echo "<font color=\"green\">Ваш заказ был принят. Спасибо за то, что пользуетесь нашим сервисом.</font>";
?>
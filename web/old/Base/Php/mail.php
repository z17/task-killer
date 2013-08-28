<?php
include_once("info.php");
function GetHeader()
{
	//$s = "Content-Type: text/html; charset=".GetEncoding()."\r\nFrom: ".GetCompEmail();
	$s = "Content-Type: text/html; charset=".GetEncoding()."\r\nFrom: ".GetFrom()." <".GetCompEmail().">";
	//$s = "Content-Type: text/html; charset=".GetEncoding()."\r\n";
	return ($s);
}
function GetFrom()
{
	$from = "Служба поддержки Task-Killer";
	return (Encode($from));
}
function Encode($s)
{
	return ("=?".GetEncoding()."?B?".base64_encode($s)."?=");
}
function SendMail($email, $tema, $msg)
{
	mail($email, Encode($tema), $msg, GetHeader());
}
function GetContact()
{
	return (GetCompEmail()."<br>".GetCompPhone());
}
function GetSign()
{
	$s = "С уважением,<br>Служба поддержки Task-Killer.<br><a href=\"http://www.task-killer.ru/\">http://www.task-killer.ru/</a><br>Контактный телефон: ".GetCompPhone()."<br>";
	$s.= "Адрес электронной почты: ".GetCompEmail()."</body></html>";
	return ($s);
}
?>
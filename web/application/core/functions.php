<?php
function translit($filename) 
{ 
	$transsimvol = array( 
	"А"=>"a","Б"=>"b","В"=>"v","Г"=>"g", 
	"Д"=>"d","Е"=>"e","Ж"=>"zh","З"=>"z","И"=>"i", 
	"Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n", 
	"О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t", 
	"У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch", 
	"Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"y","Ь"=>"", 
	"Э"=>"e","Ю"=>"yu","Я"=>"ya", 
	"а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d", 
	"е"=>"e","ж"=>"j","з"=>"z","и"=>"i","й"=>"y", 
	"к"=>"k","л"=>"l","м"=>"m","н"=>"n","о"=>"o", 
	"п"=>"p","р"=>"r","с"=>"s","т"=>"t","у"=>"u", 
	"ф"=>"f","х"=>"h","ц"=>"ts","ч"=>"ch","ш"=>"sh", 
	"щ"=>"sch","ъ"=>"","ы"=>"y","ь"=>"","э"=>"e", 
	"ю"=>"yu","я"=>"ya",
	" "=>"_"
	); 
	return strtr($filename,$transsimvol); 
}  
function getPostTime($str)
{
	$str = substr($str, 11, -3);
	return $str;
}
function getPostDate($str)
{
	$str = substr($str, 0, -9);
	return $str;
}


function sendmail($to, $subject, $message) 
{ 
	$mailheaders = "Content-type:text/html; charset=utf-8\r\n"; 
//	$name =  base64_encode(iconv('UTF-8', 'CP1251', $name));		для русских заголовков
//	$mailheaders .= "From: =?CP1251?B?".$name."?= <noreply@".$_SERVER['HTTP_HOST'].">\r\n"; 
	$mailheaders .= "From: Task-killer <noreply@".$_SERVER['HTTP_HOST'].">\r\n"; 
	$mailheaders .= "Reply-To: noreply@".$_SERVER['HTTP_HOST']."\r\n"; 
	mail($to, $subject, $message, $mailheaders);
}  


// Генерация случайной строки (юзаю для напоминания пароля)
function random_string($length) {
   $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   $chars_length = (strlen($chars) - 1);   
   $string = $chars{rand(0, $chars_length)};   
	for ($i = 1; $i < $length; $i = strlen($string))
	{
		$random = $chars{rand(0, $chars_length)};
		if ($random != $string{$i - 1}) $string .= $random;
	}
	return $string;
}

<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."io.php");
$id = intval($_POST['InvId']); // получаем номер транзакции
$login = "z-17";
$sum = $_POST['OutSum'];
$pass2 = "frw523pbr";
$Shp_login = $_POST['Shp_login'];

$SignatureValue1 = strtolower($_POST['SignatureValue']);
$SignatureValue2 = strtolower(md5("$sum:$id:$pass2:Shp_login=$Shp_login"));
$file = fopen("Base/Pay/idpay.txt","r");
$fileid = (int)fread ($file,100)+1;
fclose($fileid);
if ($fileid != $id)
{
// проверка на существование такого номера платежа
 echo "ERR: invalid id";
 exit();
}

if ( $SignatureValue1 != $SignatureValue2 ) 
{
 // не совпадает подпись
 echo "ERR: invalid signature";
 exit();
}
// увеличение на 1 номера платежа 
$file = fopen("Base/Pay/idpay.txt","w+") or die("Error");
flock($file, LOCK_EX); 
fwrite($file, $id); 
flock($file, LOCK_UN); 
fclose($file);
// запись в базу о платеже
$file = fopen("Base/Pay/stats.txt","a+") or die("Error");
$s = "$id $Shp_login $sum\n";
flock($file, LOCK_EX); 
fwrite($file, $s); 
flock($file, LOCK_UN); 
fclose($file);

// добавление суммы $sum на счёт пользователя, сделавшего перевод
//$file = fopen("Base/Users/$Shp_login.txt","r+") or die("Error");
//flock($file, LOCK_EX); 
//$num = 5;
//fseek($file, $num); // доделать перемещение на 5 позиций, а не символов!
//$balanc = (int)fread ($file,100);
//$balanc = $balanc+$sum;
$pol = file("Base/Users/$Shp_login.txt");
$pol[5] = $pol[5] + $sum;
file_put_contents("Base/Users/$Shp_login.txt", $pol);
//fseek($file, $num);
//fwrite($file, $balanc); 
//flock($file, LOCK_UN); 
//fclose($file);

echo "OK" . $id;
exit();
?>
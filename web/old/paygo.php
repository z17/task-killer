<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
$css = array(LocCss()."main.css");
head("Пополнить счёт", null, 20, $css, null);

$out_summ = $_POST['OutSum'];
echo "<h2>Пополнить счёт</h2>\n";
if ($out_summ != null)
{
echo "Вы собираетесь пополнить баланс на $out_summ руб.";

//достаём id платежа
$file = fopen("Base/Pay/idpay.txt","r");
$inv_id = (int)fread ($file,100)+1;
fclose($stats);
//
$mrh_login = "z-17";
$mrh_pass1 = "fmq153oer";
$inv_desc = "Пополнение пользовательского счёта на task-killer.ru";
$login = $_SESSION["login"];
$culture = "ru";
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_login=$login");
// для реального режима измените action формы на \"https://merchant.roboxchange.com/Index.aspx\"

echo   "<form action=\"https://merchant.roboxchange.com/Index.aspx\" method=\"POST\">\n
   <input type=\"hidden\" name=\"MrchLogin\" value=\"$mrh_login\">\n
   <input type=\"hidden\" name=\"OutSum\" value=\"$out_summ\">\n
   <input type=\"hidden\" name=\"InvId\" value=\"$inv_id\">\n
   <input type=\"hidden\" name=\"Desc\" value=\"$inv_desc\">\n
   <input type=\"hidden\" name=\"SignatureValue\" value=\"$crc\">\n
   <input type=\"hidden\" name=\"Shp_login\" value=\"$login\">\n
   <input type=\"hidden\" name=\"Culture\" value=\"$culture\">\n
   <input type=\"submit\" value=\"Подтвердить\"> <a href=\"http://task-killer.ru/pay.php\"><button type=\"button\">Вернуться</button></a>\n
   </form>\n";
   }
else
{
echo "Ошибка! <a href=\"http://task-killer.ru/pay.php\">Вернуться</a>";
}
?>

<?php
footer(2, null);
?>

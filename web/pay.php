<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."io.php");
$css = array(LocCss()."main.css");
head("Пополнить счёт", null, 20, $css, null);

echo "<h2>Пополнить счёт</h2>\n";
if ((isset($_SESSION["login"])) && (isset($_SESSION["pwd"])))
{
echo "<p>Введите сумму в рублях, на которую вы хотите пополнить ваш счёт</p>";
// для реального режима измените action формы на \"https://merchant.roboxchange.com/Index.aspx\"
echo   "<form action=\"http://task-killer.ru/paygo.php\" method=\"POST\">\n
   <input type=\"text\" name=\"OutSum\">\n
   <input type=\"submit\" value=\"Оплатить\">\n
   </form>\n";
}
else
{
echo "<p>Авторизируйтесь или зарегестрируйтесь для пополнения баланса</p>";
}

?>
<?php
footer(2, null);
?>
<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
$css = array(LocCss()."main.css");
head("Пополнить счёт", null, 20, $css, null);
?>
<?php
$sum = floatval($_POST['OutSum']);
echo "Ваш счёт в системе task-killer.ru был успешно пополнен. <br>Сумма: $sum руб.";
?>


<?php
footer(2, null);
?>
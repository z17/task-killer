﻿<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
$css = array(LocCss()."main.css");
head("Информация об оплате", null, 2, $css, null);
?>
<h1 align="center">Информация об оплате</h1>
<p>Все услуги сайта <a href="http://task-killer.ru">task-killer.ru</a> могут быть оплачены при помощи сервиса Robokassa</p>
<p>Для этого Вам достаточно:
<ul>
<li>Зарегестрироваться на сайте task-killer.ru и авторизироваться на нём.</li>
<li>Зайти на <a href="/pay.php" title="Пополнить баланс">страницу</a> пополнения баланса.</li>
<li>Ввести необходимую сумму в рублях и нажмите "оплатить".</li>
<li>На следующей странице проверить сумму платежа и нажать "подтвердить.</li>
<li>На открывшийся странице сервиса Robokassa выбрать удобный способ оплаты и воспользоваться им.</li>
<li>После успешного проведения платежа сумма сразу же будет зачислена на Ваш Баланс.</li>
</ul>
</p>

<?php
footer(2, null);
?>
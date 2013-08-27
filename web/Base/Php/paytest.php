<?php
$sumpay = $_POST["sumpay"];

// регистрационная информация (логин, пароль #1)
$mrh_login = "demo";
$mrh_pass1 = "Morbid11";

// номер заказа
$inv_id = 0;

// описание заказа
$inv_desc = "Пополнение пользовательского счёта task-killer.ru";

// сумма заказа
$out_summ = $sum;

// тип товара
$shp_item = 1;

// предлагаемая валюта платежа
$in_curr = "WMR";

// язык
$culture = "ru";

// кодировка
$encoding = "utf-8";

// формирование подписи
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

// HTML-страница с кассой
print "<html><script language=JavaScript ".
      "src='https://merchant.roboxchange.com/Handler/MrchSumPreview.ashx?".
      "MrchLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id&IncCurrLabel=$in_curr".
      "&Desc=$inv_desc&SignatureValue=$crc&Shp_item=$shp_item".
      "&Culture=$culture&Encoding=$encoding'></script></html>";



?>
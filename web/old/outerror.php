<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."error.php");
$error = $_GET["error"];
if (!isset($_GET["error"])) { $error = 26; }
head("Ошибка", null, 10, array(LocCss()."main.css"), null);
echo Error($error);
footer(10, null);
?>
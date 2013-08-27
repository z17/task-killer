<?php
include_once("Base/Php/loc.php");
$s = $_GET["login"].".txt";
if (!isset($_GET["login"])) { echo -1; exit; }
if (!file_exists(LocUsers().$s)) { echo -1; }
else { echo 1; }
?>
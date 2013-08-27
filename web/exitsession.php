<?php
session_start();
unset($_SESSION["login"]); unset($_SESSION["pwd"]);
session_destroy();
header("Location: index.php");
?>
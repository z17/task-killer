<?php
function Get($p)
{
	if (!file_exists($p)) { echo "Ошибка скачивания. Нехватка параметров. Обратитесь в службу поддержки Remoted Assistant."; }
	$q = explode("/", $p);
	$size = filesize($p);
	header("Content-Type: application");
	header("Content-Length: $size");
	header("Content-Disposition: Attachment; FileName=\"".$q[count($q)-1]."\"");
	readfile($p);
}
$path = $_GET["path"];
Get($path);
?>
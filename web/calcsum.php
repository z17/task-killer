<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."io.php");
$b = GetBase(LocInfo()."SubValue.txt");
$c = GetBase(LocInfo()."SubPrice.txt");
function CalcS($t, $q)
{
	return $q;
}
if ((!isset($_GET["n"])) || (!isset($_GET["t"])) || (!isset($_GET["subj"]))) { echo 0; }
else if (($_GET["n"]<0) || ($_GET["t"]<=0)) { echo 0; }
else
{
	$p = 0;
	for ($i=0; $i<count($b); $i++)
	{
		if ($b[$i]==$_GET["subj"]) { $p = $c[$i]; break; }
	}
	echo CalcS($_GET["t"], $p);
}
?>
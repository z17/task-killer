<?php
include_once("io.php");
function GetValueBySub($a, $b, $s)
{
	for ($i=0; $i<count($a); $i++)
	{
		if ($a[$i]==$s) { return ($b[$i]); }
	}
	return (-1);
}
function GetSubjByValue($a, $b, $x)
{
	for ($i=0; $i<count($b); $i++)
	{
		if ($b[$i]==$x) { return ($a[$i]); }
	}
	return (-1);
}
?>
<?php
include_once("main.php");
include_once("io.php");
include_once("compare.php");
function GetTm($num, $fd, $ft)
{
	$path = LocPaid()."Ord$num/Ord$num.txt";//or LocUnpaid()
	$a = GetBase($path);
	return (CalcT($fd, $ft, $a[7], $a[6]));	
}
function AppendList($path, $num)
{
	if (!file_exists($path))
	{
		@$f = fopen($path, "w") or die("Fatal Error in AddTask");
		flock($f, 2); fwrite($f, $num); flock($f, 3); unset($f);
		exit();
	}
	$fd = GetD(); $ft = GetT();
	$a = GetBase($path);
	for ($i=0; $i<count($a); $i++)
	{
		if (GetTm($num, $fd, $ft)<GetTm($a[$i], $fd, $ft))
		{
			break;
		}
	}
	for ($j=0; $j<$i; $j++) { $b[] = $a[$j]; }
	$b[] = $num;
	for ($j=$i; $j<count($a); $j++)
	{
		$b[] = $a[$j];
	}
	WriteBase($b, $path);
}
?>
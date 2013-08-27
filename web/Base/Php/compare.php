<?php
function Compare($fd, $ld)
{
	$q = explode(".", $fd); $p = explode(".", $ld);
	$q[0] = GoodNum($q[0]); $p[0] = GoodNum($p[0]); $q[1] = GoodNum($q[1]); $p[1] = GoodNum($p[1]);
	$x = GetDays($q); $y = GetDays($p);
	if ($x<$y) { return (-1); }
	else if ($x==$y) { return (0); }
	else return (1);
}
function CalcT($fd, $ft, $ld, $lt)
{
	$q = explode(".", $fd); $p = explode(".", $ld);
	//$a = array("1" => 31, "2"=>28,"3"=>31,"4"=>30,"5"=>31,"6"=>30,"7"=>31,"8"=>31,"9"=>30,"10"=>31,"11"=>30,"12"=>31);
	//$a = array("1" => 31, "2"=>59,"3"=>90,"4"=>120,"5"=>151,"6"=>181,"7"=>212,"8"=>243,"9"=>273,"10"=>304,"11"=>334,"12"=>365);
	$q[0] = GoodNum($q[0]); $p[0] = GoodNum($p[0]); $q[1] = GoodNum($q[1]); $p[1] = GoodNum($p[1]);
	$x = GetDays($q); $y = GetDays($p);
	$q = explode(":", $ft); $p = explode(":", $lt);
	$g = (intval($q[0])*60+intval($q[1]))/1440; $h = (intval($p[0])*60+intval($p[1]))/1440;
	return ($y-$x-$g+$h);
}
function GoodNum($x)
{
	if (substr($x, 0, 1)=="0") { return (substr($x, 1, 1)); }
	else { return ($x); }
}
function GetDays($d)
{
	$x = 0;
	for ($i=2010; $i<intval($d[2]); $i++)
	{
		$x+=DaysInYear($i);
	}
	if (intval($d[2])%4==0) 
	{
		$a = array("1" => 31, "2"=>60,"3"=>91,"4"=>121,"5"=>152,"6"=>182,"7"=>213,"8"=>244,"9"=>274,"10"=>305,"11"=>335,"12"=>366);
		$b = array("1" => 31, "2"=>29,"3"=>31,"4"=>30,"5"=>31,"6"=>30,"7"=>31,"8"=>31,"9"=>30,"10"=>31,"11"=>30,"12"=>31);
	 }
	else
	{
		$a = array("1" => 31, "2"=>59,"3"=>90,"4"=>120,"5"=>151,"6"=>181,"7"=>212,"8"=>243,"9"=>273,"10"=>304,"11"=>334,"12"=>365);
		$b = array("1" => 31, "2"=>28,"3"=>31,"4"=>30,"5"=>31,"6"=>30,"7"=>31,"8"=>31,"9"=>30,"10"=>31,"11"=>30,"12"=>31);
	}
	$x+=$a[intval($d[1])]+intval($d[0])-$b[$d[1]];
	return ($x);
}		
function DaysInYear($y)
{
	if (intval($y)%4==0) { return(366); }
	else return (365);
}
?>
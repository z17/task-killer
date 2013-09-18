<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."io.php");
$css = array(LocCss()."main.css");
head("Цены", null, 4, $css, null);
$a = GetBase(LocInfo()."SubName.txt");
$b = GetBase(LocInfo()."SubPrice.txt");
?>
<h1 align="center">Цены</h1>
<p>
<li>Вы можете отправить заказ на решение только в том случае, если у Вас достаточно средств на счету системы Task-Killer.</li>
<li>Стоимость решения 1 задачи зависит от предмета и сроков её решения. Деньги с Вашего счёта будут списаны автоматически после выполнения Вашего заказа.</li>
<li>Пополнить свой счёт Вы можете любым способом, на <a href="/pay.php">этой</a> странице.</li>
<li>Цены представлены в рублях</li>
<br>
<?php
$names = GetBase(LocInfo()."SubName.txt");
$prices = GetBase(LocInfo()."SubPrice.txt");
$percents = GetBase(LocInfo()."Percent.txt");
$out = "<table class=\"pricetable\" cellspacing=\"0px\"><tr><td></td><td>1 день</td><td>2 дня</td><td>3 дня</td><td>4 дня</td><td>5 дней</td><td>Более 5 дней</td>";
for ($i=0; $i<count($names); $i++)
{
	$out.= "<tr><td class=\"pricetd\">$names[$i]</td>";
	for ($j=0; $j<count($percents); $j++)
	{
		$out.= "<td align=\"center\">".(floor($prices[$i]*$percents[$j]/100))."</td>";	
	}
	$out.= "</tr>";
}
$out.= "</table>";
echo $out;
footer(4, null);
?>
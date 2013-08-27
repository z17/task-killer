<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."info.php");
include_once(LocPhp()."io.php");
include_once(LocPhp()."error.php");
session_start();
if (!isset($_SESSION["login"]) || (!isset($_SESSION["pwd"])))
{
	header("Location: login.php?error=15&pos=-1");
	exit();
}
if (GetUserLevel($_SESSION["login"])<1)
{
	/*include_once("main.php");
	include_once("error.php");
	head("Нехватка прав", null, 10, array(LocCss()."main.css"), null);
	echo Error(25);
	footer(10, null);
	exit();*/
	header("Location: outerror.php?error=25");
	exit();
}
include_once(LocPhp()."solvepage.php");
$args = array(); $css = array(LocCss()."solver.css"); $js = array();
head($args, $css, $js);
$resp = $_GET["resp"];
if (!isset($_GET["resp"])) { $resp = 0; }
$user = GetBase(GetUsersPathByLogin($_SESSION["login"]));
$q = explode(" ", GetActiveSubj($user));
?>
<form action="asendsolution.php" method="post" enctype="multipart/form-data" target="_self">
<input type="hidden" name="login" value="<?php echo $_SESSION["login"]; ?>">
<table width="100%">
<tr><td>Введите номер заказа</td>
<td>
	<?php
	if ((count($q)==0) || ($q[0]=="0"))
	{
		echo "<font color=\"green\">За вами не числится никаких &quot;активно-решаемых&quot; заданий.</font>";
	}
	else
	{
		for ($i=0; $i<count($q); $i++)
		{
			echo "<input type=\"radio\" name=\"ind\" value=\"$q[$i]\">$q[$i]\n";
		}
	}
	?>
</td></tr>
<tr><td><input type="file" name="f"></td></tr>
<tr><td><input type="submit" value="Отправить"></td></tr>
</table>
</form>
<?php
if ($resp==1)
{
	echo "<font color=\"green\">Задача успешно сдана.</font><br>";
}
else if ($resp>=2)
{
	echo Error($resp);
}
footer(null);
?>
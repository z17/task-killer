<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."io.php");
$css = array(LocCss()."main.css");
$js = array(LocJs()."checkorder.js", LocJs()."check.js", LocJs()."calc.js");
//$js = array();
if (!isset($_SESSION["login"]) || (!isset($_SESSION["pwd"])))
{
	header("Location: login.php?error=15&pos=-1");
	exit();
}
head("Оформление заказа", null, 3, $css, $js);
?>
<form action="addtask.php" name="mf" method="post" enctype="multipart/form-data" onSubmit="return FullCheck()" target="myframe">
<table width="100%" cellspacing="10px" border="0px">
<tr>
	<td>Дата, к которой должен быть выполнен заказ*</td>
    <td><div align="left">
      <input type="text" name="ldate" size="10" onchange= "Calc(path);"/>
    </div></td>
</tr>
<tr>
  <td>Время, к которому должен быть выполнен заказ*</td>
  <td><div align="left">
    <input type="text" name="ltime" size="10" onchange="Calc(path);"/>
  </div></td>
</tr>
<!--
<tr>
	<td>Тип работы*</td>
    <td>
    	<input type="radio" name="ttype" value="1" />Решение задач<br />
    </td>
</tr>
-->
<tr>
	<td>Предмет*</td>
    <td><div align="left">
      <?php
		$a = GetBase(LocInfo()."SubName.txt");
		$b = GetBase(LocInfo()."SubValue.txt");
		for ($i=0; $i<count($a); $i++)
		{
			echo "<input type=\"radio\" name=\"subj\" onclick=\"Calc(path);\" value=\"$b[$i]\"/>$a[$i]<br />\n";
		}
	?>
    </div></td>
</tr>
<!--<tr>
	<td>Введите код</td>
    <td><input type="text" name="code" size="10" /></td>
</tr>-->
<tr>
	<td>Стоимость</td>
    <td><div align="left">
      <input type="hidden" name="sum" />
      <font color="green"><span id="sum"></span>&nbsp;руб.</font></div></td>
</tr>
<tr>
	<td>Условие задачи в словесной форме</td>
    <td><div align="left">
      <textarea name="task" cols="30" rows="6"></textarea>
    </div></td>
</tr>
<tr>
	<td><input type="file" name="f" /></td>
</tr>
<tr>
	<td><input type="submit" value="Отправить" /></td>
</tr>
</table>
</form>
<iframe name="myframe" width="100%" height="200px" frameborder="0">
Ваш броузер не поддерживает фреймы.
</iframe>
<script language="javascript">
<!--
sum.innerHTML = "0"; 
<?php echo "var fdate = \"".date("d.m.Y")."\";"; ?>
<?php echo "var ftime = \"".date("H:i")."\";"; ?>
<?php echo "var path = \"calcsum.php\";"; ?>
mf.ldate.value = fdate; mf.ltime.value = ftime;
//mf.ldate.style.color = "#999999";
//stcolor = mf.ldate.style.color;
//mf.ldate.style.fontStyle = "italic";
//mf.ltime.style.color = stcolor;
//mf.ltime.style.fontStyle = "italic"; mf.ltime.style.borderStyle = "solid";
</script>
<?php
footer(3, null);
?>
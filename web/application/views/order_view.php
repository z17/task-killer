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
<tr>
	<td>Предмет*</td>
    <td><div align="left">
	выбор предмета
	 </div></td>
</tr>
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
<?php
	if (isset($data['errors']))
	{
	  foreach($data['errors'] as $error)
		{
			echo "<li class=\"redtext\">".$error."</li>";
		}
	}
?>
<form action="/order" method="post" enctype="multipart/form-data">
<table width="100%" cellspacing="10px" border="0px" class="orderTable">
<tr>
	<td>
		Дата, к которой должен быть выполнен заказ*
		<p class="moreInfo">К концу указанной даты ваш заказ будет гарантированно выполнен<br>Формат даты 25-06-2003</p>	
	</td>
    <td>
      <input type="text" name="date" size="10"/>
	</td>
</tr>
<tr>
	<td>Предмет*</td>
    <td>
	<select name="itemId">
		<?php 
		foreach ($data['items'] as $item)
		{
			echo "<option value=\"".$item['id']."\">";
			echo $item['name'];
			echo "</option>";
		}
		?>
	</select>
	</td>
</tr>
<tr>
	<td>Стоимость</td>
    <td>
      <input type="hidden" name="price" />
      <font color="green"><span id="sum"></span>&nbsp;руб.</font>
	</td>
</tr>
<tr>
	<td>Условие задачи в словесной форме</td>
    <td>
      <textarea name="task" cols="30" rows="6"></textarea>
	</td>
</tr>
<tr>
	<td>
		Фотографии задачи
		<p class="moreInfo">Вы можете прикрепить одну или несколько фотографий условия задачи<br>jpg, png или gif</p>
	</td>
	<td>		
		<p><input type="file" name="file0" /></p>
		<p><input type="file" name="file1" /></p>
		<p><input type="file" name="file2" /></p>
	</td>
</tr>
<tr>
	<td>		
		<input type="text" name="fl" value="true" hidden>
		<input type="submit" value="Отправить" />	
	</td>
</tr>
</table>
</form>
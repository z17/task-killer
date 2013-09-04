<h1 align="center">Цены</h1>
<p>
<li>Вы можете отправить заказ на решение только в том случае, если у Вас достаточно средств на счету системы Task-Killer.</li>
<li>Стоимость решения 1 задачи зависит от предмета и сроков её решения. Деньги с Вашего счёта будут списаны автоматически после выполнения Вашего заказа.</li>
<li>Пополнить свой счёт Вы можете любым способом, на <a href="/pay">этой</a> странице.</li>
<li>Цены представлены в рублях</li>
<br>
<table class="pricetable" cellspacing="0px">
  <tbody>
    <tr style="text-align:center;">
      <td></td>
      <td>1 день</td>
      <td>2 дня</td>
      <td>3 дня</td>
      <td>4 дня</td>
      <td>5 дней</td>
      <td>Более 5 дней</td>
    </tr>
	<?php
	foreach ($data['price'] as $item)
	{
		echo "<tr>";
		echo "<td class=\"pricetd\">".$item['name']."</td>";
		echo "<td>".$item['price'] * 2 ."</td>";
		echo "<td>".$item['price'] * 1.8 ."</td>";
		echo "<td>".$item['price'] * 1.6 ."</td>";
		echo "<td>".$item['price'] * 1.4 ."</td>";
		echo "<td>".$item['price']."</td>";
		echo "<td>".$item['price'] * 0.8 ."</td>";
		echo "</tr>";
	}
	?>
</tbody>
</table>
<div class="task"><?php	echo "<h2>".$data['task']['name_item']."</h2>";	if (!empty($data['task']['text']))	{		echo "<p>".$data['task']['text']."</p>";	}?>	<div class="task-info">		<p>Стоимость: <?=$data['task']['price']?> руб.</p>		<p>Дата подачи: <?=$data['task']['time_start']?> </p>		<p>Срок выполнения: <?=$data['task']['time_end']?> </p>		<p>Осталось примерно: <?=$data['task']['time_left']?> дней </p>		<p>		<?php			if($data['task']['file1'] != NULL)			{				echo '<a href="'.$data['task']['file1'].'" target="_blank"><img src="'.$data['task']['file1'].'" alt="" class="task-img"></a>';			}			if($data['task']['file2'] != NULL)			{				echo '<a href="'.$data['task']['file2'].'" target="_blank"><img src="'.$data['task']['file2'].'" alt="" class="task-img"></a>';			}			if($data['task']['file3'] != NULL)			{				echo '<a href="'.$data['task']['file3'].'" target="_blank"><img src="'.$data['task']['file3'].'" alt="" class="task-img"></a>';			}		?>		</p>		<b>Управление:</b>		<ul>			<li><a href="#">Выполнить</a></li>			<li><a href="#">Сообщить об ошибке</a></li>		</ul>	</div>	</div>
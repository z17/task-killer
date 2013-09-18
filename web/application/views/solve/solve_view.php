<?php
foreach ($data['tasks'] as $task)
{
	?>
	<div class="task">
	<?php
		echo "<h2>".$task['name_item']."</h2>";
		if (!empty($task['text']))
		{
			echo "<p>".$task['text']."</p>";
		}
	?>
		<div class="task-info">
			<span>Стоимость: <?=$task['price']?> руб.</span>
			<span>Дата подачи: <?=$task['time_start']?> </span>
			<span>Срок выполнения: <?=$task['time_end']?> </span>
			<span><a href="/solve/task/<?=$task['id']?>">Подробнее »</a></span>
		</div>
	</div>
	<?php
}
?>
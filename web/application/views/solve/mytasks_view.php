<?php
foreach ($data['tasks'] as $task)
{
	if ($task['performed'])
		$performed = 'performed';
	else
		$performed = '';
	
	?>
	<div class="task <?=$performed?>">
	<?php
		echo "<h2>".$task['name_item']."</h2>";
		if (!empty($task['text']))
		{
			echo "<p>".$task['text'].'... <a href="/solve/task/'.$task['id'].'">Читать далее</a></p>';
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
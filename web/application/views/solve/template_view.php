<!DOCTYPE html>
<html>
<head>
<title><?=$data['title']?> - Task-killer</title>
<link href="/css/solve.css" type="text/css" rel="stylesheet">
<link href="/css/style.css" type="text/css" rel="stylesheet">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
	<div id="middle">	
	<div id="leftc">
		<!-- header -->
		<div id="header">
			<a href="/solve">Task-killer.ru</a>
		</div>
		<!-- /header -->
		<!-- content -->		
		<div id="content">
		<?php include_once 'application/views/'.$content_view; ?>
		</div>
		<!-- /content -->
		<!-- footer -->
			<div id="footer">	
			<div class="footerl">support@task-killer.ru<br>+7 951 123 45 67"</div>
			<div class="footerr">Task-Killer.ru © 2011-2013</div>
			</div>
		<!-- /footer -->
	</div>
	<!-- sidebar -->
	<div id="sidebar">	
		<div class="prof">
			<a href="/">Главная</a>  |<a href="/profile" title="Профиль">Профиль</a> | <a href="/exit" title="Выход">Выход</a>
		</div>
		<div class="block">	
			<div class="blocktitle">Задания</div>
			<div class="blockcontent"></div>
		</div>
		<div class="block">			
			<div class="blocktitle">Статистика</div>
			<div class="blockcontent">
				Выполнено задач: 0<br>
				Рейтинг: 0/0
			</div>
		</div>
		<div class="block">			
			<div class="blocktitle">Действия</div>
			<div class="blockcontent">
			<li><a href="/solve">Просмотр всех заданий</a></li>
			<li><a href="/solve/mytasks">Просмотр моих заданий</a></li>
			<li><a href="#">Сдать задачу</a></li>
			<li><a href="#">Отказаться</a></li>
			<li><a href="/solve/additem">Добавить предмет</a></li>
			</div>
		</div>
		</div>
	<!-- /sidebar -->
	<div class="clear"></div>
</div>
</body>
</html>
<?php
include_once("io.php");
function head($args, $css, $js)
{
	$s = "<html><head><title>Task-killer.ru</title>";
	for ($i=0; $i<count($css); $i++)
	{
		$s.= "<link rel = \"stylesheet\" href= \"$css[$i]\" />\n"; 
	}
	$s.= "</head>
	<body>
	<div id=\"middle\">	
	<div id=\"leftc\">
		<!-- header -->
			<div id=\"header\">
			</div>
		<!-- /header -->
		<!-- content -->		
			<div id=\"content\">";
	echo $s;
}
function footer($args)
{
	$sname = GetBase(LocInfo()."SubName.txt");
	$values = GetBase(LocInfo()."SubValue.txt");
	$user = GetBase(GetUsersPathByLogin($_SESSION["login"]));
	$subjects = explode(" ", GetSubj($user));
	$amounts = $args[1];
	$s = "</div>
		<!-- /content -->
		<!-- footer -->
			<div id=\"footer\">	
			<div class=\"footerl\">".GetCompEmail()."<br>".GetCompPhone()."</div>
			<div class=\"footerr\">Task-Killer.ru © 2011</div>
			</div>
		<!-- /footer -->
	</div>
	<!-- sidebar -->
	<div id=\"sidebar\">	
		<div class=\"prof\">
			<a href=\"profile.php\" title=\"Профиль\">Профиль</a>|<a href=\"exitsession.php\" title=\"Выход\">Выход</a>
		</div>";
		if ($args[0]==1)
		{
		$s.= "<div class=\"block\">	
			<div class=\"blocktitle\">Задания</div>
			<img src=\"".LocSolverImg()."line.png\"><br>
			<div class=\"blockcontent\">";
			if (count($amounts)>0)
			{
				for ($i=0; $i<count($subjects); $i++)
				{
					$s.= "<li><a href=\"solve.php?mode=$subjects[$i]\">".GetSubjByValue($sname, $values, $subjects[$i])."($amounts[$i])</a></li>";
				}
			}
			$s.= "</div>
			<img src=\"".LocSolverImg()."line.png\">
		</div>";
		}
		$s.= "<div class=\"block\">			
			<div class=\"blocktitle\">Статистика</div>
			<img src=\"".LocSolverImg()."line.png\"><br>
			<div class=\"blockcontent\">
				Выполнено задач: ".GetSolved($user)."<br>
				Рейтинг: ".GetSolved($user)."/".GetAll($user)."
			</div>
			<img src=\"".LocSolverImg()."line.png\">
		</div>";
		$s.= "<div class=\"block\">			
			<div class=\"blocktitle\">Действия</div>
			<img src=\"".LocSolverImg()."line.png\"><br>
			<div class=\"blockcontent\">
			<li><a href=\"solve.php\">Просмотр заданий</a></li>
			<li><a href=\"sendsolution.php\">Сдать задачу</a></li>
			<li><a href=\"reject.php\">Отказаться</a></li>
			</div>
			<img src=\"".LocSolverImg()."line.png\">
		</div>";			
	$s.= "</div>
	<!-- /sidebar -->
	<div class=\"clear\"></div>
</div>
</body>
</html>";
echo $s;
}
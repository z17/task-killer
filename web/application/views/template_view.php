<?php
if (!isset($data['navkac'])) 
{ $data['navkac'] = '';}
?>
<!DOCTYPE html>
<html>
<head>
<title><?=$data['title']?> - Task-killer</title>
<link href="/css/main.css" type="text/css" rel="stylesheet">
<link href="/css/style.css" type="text/css" rel="stylesheet">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<div id="wrapper" align="center">
		<div id="header" >	
			<div id="logo"></div>			
			<div id="nav">
				<div class="navk" <?php if ($data['navkac']==='main') { ?> id="navkac" <?php }?>><a class="navk1" href="/" title="Главная">Главная</a></div>
				<div class="navk" <?php if ($data['navkac']==='about') { ?> id="navkac" <?php }?>><a class="navk1" href="/about" title="О нас">О нас</a></div>
				<div class="navk" <?php if ($data['navkac']==='order') { ?> id="navkac" <?php }?>><a class="navk1" href="/order" title="Заказать">Заказать</a></div>
				<div class="navk" <?php if ($data['navkac']==='price') { ?> id="navkac" <?php }?>><a class="navk1" href="/price" title="Цены">Цены</a></div>
				<div class="navk" <?php if ($data['navkac']==='contacts') { ?> id="navkac" <?php }?>><a class="navk1" href="/contacts" title="Контакты">Контакты</a></div>
				<div class="navk" <?php if ($data['navkac']==='profile') { ?> id="navkac" <?php }?>><a class="navk1" href="/profile" title="Профиль">Профиль</a></div>
			</div> 
			<div id="screen1"><img src="/img/screen.gif" alt=""></div>
		</div>
	<div id="middle">
		<div id="content">
			<div class="text">
				<?php include_once 'application/views/'.$content_view; ?>
			</div>
		</div>
		<div id="sidebar"> 
			<?php include_once 'application/views/sidebar_view.php'?>
		</div>
		<div id="clear"></div>
	</div>
	<div id="footer">
		<div class="footertextr">		
			Copyright task-killer.ru © 2011-2013<br>support@task-killer.ru
		</div>
		<div class="footertextl">	
			<a href="/about/rules" title="Информация об оплате">Информация об оплате</a><br>
			<!-- begin WebMoney Transfer : attestation label --> 
			<a href="https://passport.webmoney.ru/asp/certview.asp?wmid=215923770047" rel="nofollow" target="_blank"><img SRC="http://www.webmoney.ru/img/icons/88x31_wm_v_blue_on_white_ru.png" title="215923770047" border="0"></a>
			<!-- end WebMoney Transfer : attestation label -->
			<a href="http://www.webmoney.ru" rel="nofollow" target=_blank><img SRC="http://www.webmoney.ru/img/icons/88x31_wm_blue_on_white_ru.png" title="WebMoney" border="0"></a>

		</div>		
	</div>
</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="../js/ajax.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
</body>
</html>
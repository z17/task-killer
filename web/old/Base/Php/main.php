<?php
include_once("loc.php");
include_once("info.php");
include_once("error.php");
include_once("io.php");
session_start();
function head($title, $meta, $page, $css, $js)
{
	$s = "<html><head><title>".$title."</title>\n";
	$s .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=\"".GetEncoding()."\">\n";
	if (isset($css))
	{
		foreach ($css as $x) { $s.= "<link type=\"text/css\" rel=\"stylesheet\" href=\"".$x."\">\n"; }
	}
	if (isset($js)) 
	{
		for ($i=0; $i<count($js); $i++)
		{
			$s.= "<script language=\"javascript\" src=\"".$js[$i]."\"></script>\n";
		}
	}
	$s.= "<script type=\"text/javascript\">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26321534-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
		</head>\n<body>\n";

	$s .= "<div id=\"wrapper\" align=\"center\">
		<div id=\"header\" >	
			<div id=\"logo\"></div>		
			
		<div id=\"nav\">";
				$s.=PB(Eq($page, 1), "/", "Главная");
				$s.=PB(Eq($page, 2), "/about.php", "О нас");
				$s.=PB(Eq($page, 3), "/order.php", "Заказать");
				$s.=PB(Eq($page, 4), "/price.php", "Цены");
				$s.=PB(Eq($page, 5), "/contacts.php", "Контакты");
				$s.=PB(Eq($page, 6), "/profile.php", "Профиль");
		
	$s .=	"</div><div id=\"banner\"></div>
		</div>
	<div id=\"middle\" align=\"center\">";	
			if ($page==6) { $s.= "<div id=\"contentprofile\"><div class=\"text\">"; }
			else { 	$s.= "<div id=\"content\"><div class=\"text\">"; }
	echo $s;
}
function Eq($page1, $page2)
{
	if ($page1==$page2) { return 1; }
	else { return 0; }
}
function PB($mode, $href, $name)//$mode: if == 0 { out -> disactive btn }; if == 1 { out -> active(green) btn}
{
	if ($mode==0)
	{
		return "<div class=\"navk\"><a class=\"navk1\" href=\"$href\" title=\"$name\">$name</a></div>";
	}
	else if ($mode==1)//gets green button; need to rewrite
	{
		return "<div class=\"navk\" id=\"navkac\"><a class=\"navk1\" href=\"$href\" title=\"$name\">$name</a></div>";
	}
}
function GetFooterMode($page)
{
	if ($page==6) { return (0); }
	if ($page==7) { return (0); }
	if ($page==9) { return (0); }
	if ((isset($_SESSION["login"])) && (isset($_SESSION["pwd"])))
	{
		return 2;//if user is being logged in
	}
	else { return (1); }//otherwise
}
function GetRForm($mode, $type)
{
	if ($mode==1)
	{
		return "<div class=\"block1\">
				<div class=\"block1title\">Войти в систему</div>
				<div class=\"block1content\">
					<div class=\"login\">
						логин:
						<form action=\"startsession.php\" method=\"post\" name=\"mf\">
						<div class=\"login1\">
							<input class=\"loginField\" id=\"loginEnterToSite\" name=\"login\" type=\"text\" name=\"login\" size=\"20\" style=\"width:100%;\" maxlength=\"50\">
						</div>
						пароль:
						<div class=\"login1\">
							<input class=\"loginField\" id=\"passwordEnterToSite\" name=\"pwd\" type=\"password\" name=\"pwd\" size=\"20\" style=\"width:100%\" maxlength=\"15\">
						</div>	
					</div>
					<div class=\"loginbut\"><a href=\"forgot.php\">Забыли пароль?</a> <input class=\"loginButton\" name=\"sbm\" type=\"submit\" value=\"\" >
					<br><a href=\"prereg.php\">Регистрация</a></form>
					</div>
				</div>
			</div>";
	}
	else if ($mode==2)
	{
		$base = GetBase(LocUsers().$_SESSION["login"].".txt");
		$money = GetMoney($base);
		$str = "<div class=\"block1\">
				<div class=\"block1title\">Личный кабинет</div>
				<div class=\"block1content\">
					<p class=\"balans\">Ваш баланс: <span style=\"color:#000;\">$money рублей</span></p>
					<div class=\"prlink\">
						<li><a href=\"#\">Пополнить баланс »</a></li>
						<li><a href=\"#\">Заказанные задачи »</a></li>
						<li><a href=\"order.php\">Заказать задачу »</a></li>";
						if ($type==1) { 
						$str.= "<li><a href=\"solve.php\">Выполнить задание »</a></li>"; }
						$str.= "<li><a href=\"profile.php\">Профиль »</a></li>
						<div align=\"right\" style=\"margin-top:55px;\"><a href=\"exitsession.php\">Выход</a></div>
					</div>
				</div>
			</div>";
			return $str;
	}
	else if ($mod3==0) { return ""; }
}
function footer($page, $mode)
{
	$s = "</div>
		</div>";
		
	if ($page==6) {  }
			else { 	$s.= "<div id=\"sidebar\"> ";
		$type = -1;
		if (isset($_SESSION["login"]))
		{
			$user = GetBase(LocUsers().$_SESSION["login"].".txt");
			$type = Gethtype($user);
		}
		$s .=GetRForm(GetFooterMode($page), ($type-($type%10))/10);
		
		$s .= "</div>";}
	$s .= "<div id=\"clear\"></div>
	</div>
	<div id=\"footer\">
		<div class=\"footertextr\">		
			Copyright task-killer.ru © 2011<br>support@task-killer.ru
		</div>
		<div class=\"footertextl\">	
			<a href=\"/rules.php\" title=\"Информация об оплате\">Информация об оплате</a><br>
			<!-- begin WebMoney Transfer : attestation label --> 
			<a href=\"https://passport.webmoney.ru/asp/certview.asp?wmid=215923770047\" rel=\"nofollow\" target=_blank><IMG SRC=\"http://www.webmoney.ru/img/icons/88x31_wm_v_blue_on_white_ru.png\" title=\"215923770047\" border=\"0\"></a>
			<!-- end WebMoney Transfer : attestation label -->
			<a href=\"http://www.webmoney.ru\" rel=\"nofollow\" target=_blank><IMG SRC=\"http://www.webmoney.ru/img/icons/88x31_wm_blue_on_white_ru.png\" title=\"WebMoney\" border=\"0\"></a>

		</div>		
	</div>
</div>
</body>
</html>";
	echo $s;
}
function GetD()
{
	return date("d.m.Y");
}

function GetT()
{
	return date("H:i");
}
function GetMinTime() { return (1); }
?>
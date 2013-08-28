<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."main.php");
include_once(LocPhp()."io.php");
$css = array(LocCss()."main.css");
head("Профиль", null, 6, $css, null);
if ((isset($_SESSION["login"])) && (isset($_SESSION["pwd"])))
{
	$base = GetBase(LocUsers().$_SESSION["login"].".txt");
	$money = GetMoney($base);
	$login = $_SESSION["login"];
	$type = Gethtype($base);
	 $type = ($type-($type%10))/10;
	if (($type==0) || ($type==1)) { 
	echo "<div class=\"block1title\">Профиль</div>
					<table style=\"width:100%;\">
						<tr>
							<td style=\"width:33%;\">
								<p class=\"balans\">Ваш баланс: 
									<big style=\"font-weight: 400; color:#000;\">$money рублей</big>
								</p>
								<div class=\"prlink\">
									- <a href=\"/pay.php\">Пополнить баланс »</a> <br>
									- <a href=\"/moneyback.php\">Снять деньги »</a><br><br>
									- <a href=\"#\">Заказанные задачи (3) »</a> <br>
									- <a href=\"order.php\">Оформить заказ »</a><br>";
									if ($type==1) { echo "- <a href=\"solve.php\">Выполнить задание »</a>"; }
								echo "</div>
							</td>
							<td style=\"width:34%;\">
							<div class=\"prinfo\">
							<p>Логин: <b>$login</b></p>
							<p>Email: <b>".GetEmail($base)."</b></p>
							<p>- <a href=\"#\">Выслать пароль на почту »</a><br>
							- <a href=\"#\">Редактировать данные »</a></p>
							</div>
							</td>
							<td style=\"width:33%;\"> 
							<div class=\"prlink\">
							<p class=\"balans\">Реферальная система</p>
							<p class=\"balans\">(в разработке)</p>
							<p>Приглашайте новых людей на сайт и получайте 10% прибыли от их заказов!<br>
							- <a href=\"/referalsystem.php\">Подробнее »</a> <br>
							- <a href=\"/referals.php\">Ваши рефералы »</a> 
							</p>	
							</div>
							</td>
							
						</tr>
					</table>	
<div style=\"margin-top:150px\"> </div>					
			</div>";
	}
}
else
{
	echo "<div align=\"center\" style=\"margin-top:20px;\">
								
				<div class=\"block1title\">Войти в систему</div>
				<div class=\"block1content\">
					<div class=\"login\" style=\"width:450px;\">
						<div style=\"float:left\">
						логин:
						<form action=\"startsession.php\" method=\"post\" name=\"mf\">
						<div class=\"login1\">
							<input class=\"loginField\" id=\"loginEnterToSite\" type=\"text\" name=\"login\" size=\"20\" style=\"width:100%;\" maxlength=\"50\">
						</div>
						</div>
						<div style=\"float:right\">
						пароль:
						<div class=\"login1\">
							<input class=\"loginField\" id=\"passwordEnterToSite\" type=\"password\" name=\"pwd\" size=\"20\" style=\"width:100%\" maxlength=\"15\">
						</div>
						</div>
							<div id=\"clear\"></div>

					</div>
					<div class=\"loginbut\"> <input class=\"loginButton\" name=\"sbm\" type=\"submit\" value=\"\" >
					</form>
					<br>
					<a href=\"\">Забыли пароль?</a> |	<a href=\"prereg.php\">Регистрация</a></div>
				</div>
                
			<div style=\"margin-top:150px\"> </div>
			</div>";
}
	
?>
<?php
footer(6, null);
?>
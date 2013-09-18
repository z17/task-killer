function FullCheck()
{
	if (!CheckDate(true)) { return false; }
	if (!CheckTime(true)) { return false; }
	if (!CheckSubj()) { Msg("Не выбрана тематика заданий!"); return false; }
	if (!CheckTask()) { return false; }
	var dt = CalcT(fdate, ftime, mf.ldate.value, mf.ltime.value);
	if (dt<=0) { Msg("Время, к которому должен быть выполнен заказ, не должно быть ранее текущего."); return (false); }
	if ((dt<1) && (dt>0)) { Msg("Минимальный срок решения заказа - 1 день. Укажите более позднюю дату получения заказа."); return false; }
	mf.sum.value = sum.innerHTML;
	//if (!CheckSum()) { Msg("Проверьте корректность ввода даты, времени и тематики заданий. Если все данные введены верно, просьба связаться со службой поддержки."); return false;}
	return true;
}
function CheckSum()
{
	if (mf.sum.value<=0) { return false; }
	return true;
}
function CheckTask()
{
	if ((mf.task.value=="") && (mf.f.value=="")) { Msg("Укажите условие задачи либо в текстовом поле, либо прикрепите 1 изображение."); return false; }
	return true;
}	
function CheckSubj()
{
	var i = 0; var bool = false;
	while ((document.mf.subj[i])!=null)
	{
		if (document.mf.subj[i].checked) { bool = true; break; }
		i++;
	}
	return bool;
}
function CheckDate(opt)
{
	var x = document.mf.ldate;
	if ((x.value=="") || (x.style.color == "#dddddd"))
	{
		if (opt) { Msg("Введите дату"); x.focus(); }
		return (false);
	}
	r = new RegExp("^[0-3]\\d\.[01]\\d\.2\\d\\d\\d$");
	if (!r.test(x.value))
	{
		Msg("Введите корректную дату в формате дд.мм.гггг.\nНапример, 23.05.2012"); x.focus();
		return (false);
	}
	s = new String(x.value); var q = s.split(".");
	if (parseInt(q[2])%4==0) 
	{
		var a = Array(); var b = Array();
		b["1"] = 31; b["2"] = 29; b["3"] = 31; b["4"] = 30; b["5"] = 31; b["6"] = 30; b["7"] = 31; b["8"] = 31; b["9"] = 30;
		b["10"] = 31; b["11"] = 30; b["12"] = 31;		
	}
	else
	{
		var a = Array(); var b = Array();
		b["1"] = 31; b["2"] = 28; b["3"] = 31; b["4"] = 30; b["5"] = 31; b["6"] = 30; b["7"] = 31; b["8"] = 31; b["9"] = 30;
		b["10"] = 31; b["11"] = 30; b["12"] = 31;	
	}
	var d = GoodNum(q[0]); var m = GoodNum(q[1]);
	if ((parseInt(m)>12) || (parseInt(m)<1))
	{
		Msg("Введите корректную дату. Введенного месяца не существует.");
		x.focus();
		return false; }
	if (parseInt(d)>b[m])
	{
		Msg("Введите корректную дату. Такого дня не существует.");
		x.focus();
		return false;
	}
	return (true);
}
function GoodNum(xx)
{
	x = new String(xx);
	if (x.substr(0, 1)=="0") { return (x.substr(1, 1)); }
	else { return (x); }
}
function CheckTime(opt)
{
	var x = document.mf.ltime;
	if ((x.value=="") || (x.style.color == "#dddddd"))
	{
		if (opt) { Msg("Введите время"); x.focus(); }
		return (false);
	}
	r = new RegExp("^[0-2]\\d:[0-5]\\d$");
	if (!r.test(x.value))
	{
		Msg("Введите корректное время в формате чч:мм.\nНапример, 07:45"); x.focus();
		return (false);
	}
	s = new String(x.value); var q = s.split(":");
	if ((parseInt(q[0])>23) || (parseInt(q[1])>59))
	{
		Msg("Введите корректное время"); x.focus();
		return (false);
	}
	if ((q[0]=="24") && (q[1]=="00"))
	{
		Msg("Введите корректное время. 24:00 считается 00:00 следующего дня"); x.focus(); 
		return (false);
	}	
	return (true);
}

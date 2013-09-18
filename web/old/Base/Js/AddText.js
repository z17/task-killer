function MakeMath(s)
{
	if (mf.item("subj", 0).checked)
	{
		document.getElementById("topic").innerHTML = "<input type='checkbox' name='mtopic[]' value='11' onclick='Calc();'>Математика(шк.)<br><input type='checkbox' name='mtopic[]' value='12' onclick='Calc();'>Мат. Анализ<br><input type='checkbox' name='mtopic[]' value='13' onclick='Calc();'>Топология<br><input type='checkbox' name='mtopic[]' value='14' onclick='Calc();'>Дискретная математика<br><input type='checkbox' name='mtopic[]' value='15' onclick='Calc();'>Дифференциальные и разностные уравнения<br><input type='checkbox' name='mtopic[]' value='16' onclick='Calc();'>Теория вероятностей и математической статистики<br><input type='checkbox' name='mtopic[]' value='17' onclick='Calc();'>Алгебра и теория чисел<br>";
		document.getElementById("s1").innerHTML = "Прикрепите задания по математике<br><input type=\"file\" name=\"m1\" onchange=\"AddMathMore(1);\"><br>";
		for (var i=2; i<55; i++)
		{ 
			document.getElementById("br").innerHTML += "<span id=\"s"+i+"\"></span>";
		}
	}
}
function MakePhis()
{
	if (mf.item("subj", 1).checked)
	{
		document.getElementById("topic").innerHTML = "<input type='checkbox' name='mtopic[]' value='11'>Термодинамика<br><input type='checkbox' name='mtopic[]' value='12'>Ядерная физика<br>";
		document.getElementById("s1").innerHTML = "Прикрепите задания по физике<br><input type=\"file\" name=\"m1\" onchange=\"AddMathMore(1);\"><br>";
	}
	for (var i=2; i<55; i++)
	{ 
		document.getElementById("br").innerHTML += "<span id=\"s"+i+"\"></span>";
	}
}
function MakeInf()
{
	if (mf.item("subj", 2).checked)
	{
		document.getElementById("topic").innerHTML = "<input type='checkbox' name='mtopic[]' value='31'>Информатика(шк.)<br><input type='checkbox' name='mtopic[]' value='12'>Лажа 2<br>";
		document.getElementById("s1").innerHTML = "Прикрепите задания по информатике<br><input type=\"file\" name=\"m1\" onchange=\"AddMathMore(1);\"><br>";
	}
	for (var i=2; i<55; i++)
	{ 
		document.getElementById("br").innerHTML += "<span id=\"s"+i+"\"></span>";
	}
}
function AddMathMore(i)
{
	//i++;
	//subject.innerHTML += "<span id=\"s"+i+"\"></span>";
	//document.getElementById("s"+i).innerHTML = "<input type='file' name='m"+i+"' onchange='AddMathMore("+i+");/><br>";
	if (!arr[i])
	{
		arr[i] = true;
		i++;
		document.getElementById("s"+i).innerHTML += "<input type='file' name='m"+i+"' onchange='AddMathMore("+i+");'><br>";
	}
}
function Left(i)
{
	document.getElementById("subject").innerHTML += "<input type=\"file\" name=\"m"+i+"\" onchange=\"AddMathMore("+i+");/><br>";
}
function Calc(path)
{
	if (!CheckSubj()) { return; }
	path += "?n=1&t="+CalcT(fdate, ftime, mf.ldate.value, mf.ltime.value)+ "&subj="+GetSubj();
	CalcSum(path, sum);
}
function GetSubj()
{
	var i = 0; var bool = false;
	while (document.mf.subj[i]!=null)
	{
		if (document.mf.subj[i].checked) { return document.mf.subj[i].value; }
		i++;
	}
	return -1;
}
function IsOk(thing)
{
	if (thing.style.color == "#000000") { return true; }
	else return (false);
}
function CalcT(fdate, ftime, ldate, ltime)
{
	fd = new String(fdate); ft = new String(ftime); ld = new String (ldate); lt = new String(ltime);
	var q = fd.split("."); var p = ld.split(".");
	//$a = array("1" => 31, "2"=>28,"3"=>31,"4"=>30,"5"=>31,"6"=>30,"7"=>31,"8"=>31,"9"=>30,"10"=>31,"11"=>30,"12"=>31);
	//$a = array("1" => 31, "2"=>59,"3"=>90,"4"=>120,"5"=>151,"6"=>181,"7"=>212,"8"=>243,"9"=>273,"10"=>304,"11"=>334,"12"=>365);
	q[0] = GoodNum(q[0]); p[0] = GoodNum(p[0]); q[1] = GoodNum(q[1]); p[1] = GoodNum(p[1]);
	var x = GetDays(q); var y = GetDays(p);
	q1 = ft.split(":"); p1 = lt.split(":");
	var g = (parseInt(q1[0])*60+parseInt(q1[1]))/1440;
	var h = (parseInt(p1[0])*60+parseInt(p1[1]))/1440;
	return (y-x-g+h);
}
function GoodNum(xx)
{
	x = new String(xx);
	if (x.substr(0, 1)=="0") { return (x.substr(1, 1)); }
	else { return (x); }
}
function GetDays(d)
{
	var x = 0; var i = 0;
	for (i=2010; i<parseInt(d[2]); i++)
	{
		x+=DaysInYear(i);
	}
	if (parseInt(d[2])%4==0) 
	{
		var a = Array(); var b = Array();
		a["1"] = 31; a["2"] = 60; a["3"] = 91; a["4"] = 121; a["5"] = 152; a["6"] = 182; a["7"] = 213; a["8"] = 244; a["9"] = 274;
		a["10"] = 305; a["11"] = 335; a["12"] = 366;
		b["1"] = 31; b["2"] = 29; b["3"] = 31; b["4"] = 30; b["5"] = 31; b["6"] = 30; b["7"] = 31; b["8"] = 31; b["9"] = 30;
		b["10"] = 31; b["11"] = 30; b["12"] = 31;		
	}
	else
	{
		var a = Array(); var b = Array();
		a["1"] = 31; a["2"] = 59; a["3"] = 90; a["4"] = 120; a["5"] = 151; a["6"] = 181; a["7"] = 212; a["8"] = 243; a["9"] = 273;
		a["10"] = 304; a["11"] = 334; a["12"] = 365;
		b["1"] = 31; b["2"] = 28; b["3"] = 31; b["4"] = 30; b["5"] = 31; b["6"] = 30; b["7"] = 31; b["8"] = 31; b["9"] = 30;
		b["10"] = 31; b["11"] = 30; b["12"] = 31;	
	}
	x+=a[parseInt(d[1])]+parseInt(d[0])-b[d[1]];
	return (x);
}		
function DaysInYear(y)
{
	if (parseInt(y)%4==0) { return(366); }
	else return (365);
}
function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
function CalcSum(path, thing)
{
	var xmlhttp = getXmlHttp()
	if (xmlhttp==null) { alert("null"); }
	xmlhttp.open('GET', path, true);
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4)
		{
		//alert ("First stage.");
			if(xmlhttp.status == 200)
			{
				//alert(xmlhttp.responseText);
				thing.innerHTML = xmlhttp.responseText;
				//alert(xmlhttp.responseText);
				//return xmlhttp.responseText;
			}
			else
			{
				//alert("Left error");
				return (-1);
			}
		}
	}
	xmlhttp.send(null);
}
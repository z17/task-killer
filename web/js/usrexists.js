function Usr()
{
	if (mf.login.value=="") { user.innerHTML = ""; exit;}
	var path = "userexists.php?login="+mf.login.value;
	UsrExists(path, user);
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
function UsrExists(path, thing)
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
				var res = "";
				if (xmlhttp.responseText=="1") { res = "<font color='red'>Занят</font>"; }
				else { res = "<font color='green'>Свободен</font>"; }
				thing.innerHTML = res;
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
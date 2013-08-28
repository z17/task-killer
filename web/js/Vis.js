function VFocus(thing)
{
	var x = thing.style;
	//x.borderStyle = "solid";
	//alert(x.color);
	//x.borderColor = "#FFCC66";
	if (x.color==stcolor)
	{
		//alert("ok");
		x.color = "#000000";
		//alert(thing.value);
		thing.value = "";
		//alert(thing.value);
		x.fontStyle = "normal";
	}
}
function VBlur(thing)
{
	var x = thing.style;
	//thing.style.borderColor = "#909090";
	if (thing.value=="")
	{
		x.fontStyle = "italic";
		//x.color = stcolor;
		if (thing==mf.ldate)
		{
			thing.value = fdate;
		}
		if (thing==mf.ltime)
		{
			thing.value = ftime;
		}
	}
}
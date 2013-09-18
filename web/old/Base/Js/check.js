function Msg(s) { window.alert(s); }
function CheckNum(x)
{
	if ((x==null) || (x=="")) { return false; }
	r = new RegExp("^[0-9]+$");
	if (!r.test(x))
	{
		return (false);
	}
	return true;
}
function CheckEmail(x)
{
	if ((x==null) || (x=="")) { return false; }
	r = new RegExp("^[a-z0-9_\.\-]+@([a-z0-9\-]+\.)+[a-z]{2,4}$", "i");
	if (!r.test(x))
	{
		return (false);
	}
	return true;
}

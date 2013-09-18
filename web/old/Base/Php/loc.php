<?php
function Loc()
{
	return ("");
}
function LocBase()
{
	return (Loc()."Base/");
}
function LocInfo()
{
	return LocBase()."Info/";
}
function LocPhp()
{
	return (LocBase()."Php/");
}	
function LocCss()
{
	return LocBase()."Css/";
}
function LocJs()
{
	return LocBase()."Js/";
}
function LocUsers()
{
	return LocBase()."Users/";
}
function LocOrders()
{
	return LocBase()."Orders/";
}
function LocCompleted()
{
	return LocOrders()."Completed/";
}
function LocPaid()
{
	return LocOrders()."Paid/";
}
function LocSolving()
{
	return LocOrders()."Solving/";
}
function LocUnpaid()
{
	return LocOrders()."Unpaid/";
}
function LocImg()
{
	return LocBase()."img/";
}
function LocSolverImg()
{
	return LocImg()."solver/";
}
function LocSolutions()
{
	return LocOrders()."Solutions/";
}
function LocLists()
{
	return (LocInfo()."Lists/");
}
function GetUsersPathByLogin($login)
{
	return (LocUsers()."$login.txt");
}
?>
function FullCheck()
{
	if (!CheckLogin()) { return false; }
	if (!CheckPwd()) { return false; }
	return true;
}
function CheckLogin()
{
	x = new String(mf.login.value);
	if (x.length==0) { Msg("Логин не должен быть пустым!"); return false;}
	if (x.length>15) { Msg("Логин должен состоять не более чем из 15 символов!"); return false;}
	r = new RegExp("^\\w+$");
	if (!r.test(x)) { Msg("Логин должен содержать только цифры, латинские буквы и символы подчеркивания!"); return false;}
	return true;
}
function CheckPwd()
{
	s = new String(mf.pwd.value);
	if (s.length==0) { Msg("Введите пароль!"); return false;}
	if (s.length>30) { Msg("Пароль должен содепжать не более 30 символов!"); return false; }
	return true;
}
<?php
class Model_Register extends Model
{
    public function get_data()
    {		
		
		$data['login'] = isset($_POST['login']) ? $_POST['login'] : '';
		$data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
		$data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
		$data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
		$data['fl'] = isset($_POST['fl']) ? $_POST['fl'] : false;
		$data['email'] = trim($data['email']); // убираем пробелы
		if ($data['fl']) 
		{
			$data['errors'] = array();
			 if(!preg_match("/^[a-zA-Z0-9]+$/",$data['login']))
			{
				$str = "Логин может состоять только из букв английского алфавита и цифр";
				array_push($data['errors'],$str);
			}
			if(strlen($data['login']) < 3 or strlen($data['login']) > 20)
			{
				$str = "Логин должен быть не меньше 3-х символов и не больше 20";
				array_push($data['errors'],$str);
			}
			$is_user = $this -> base -> isUser($data['login']);
			if ($is_user)
			{
				$str = "Пользователь с таким логином уже существует";
				array_push($data['errors'],$str);
			}
			if(strlen($data['password']) < 6 or strlen($data['password']) > 20)
			{
				$str = "Пароль должен быть не меньше 6 символов и не больше 20";
				array_push($data['errors'],$str);
			}
			if (!preg_match("/^(?:[a-z0-9]+(?:[-_]?[a-z0-9]+)?@[a-z0-9]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$data['email']))
			{
				$str = "Некорректный e-mail";
				array_push($data['errors'],$str);
			}
			if (is_array($data['errors']))
			{
				// если ошибок нет - регистрируем
				$data['password'] = md5(md5($data['password'].$this->passkey));
				$this -> base -> addUser($data['name'],$data['login'],$data['password'],$data['email']);
				$data['message'] = "Регистрация прошла успешно";				
			}
			else
			{
				$data['message'] = "Ошибка регистрации:";
				
			}
		}
		else	
		{
			$data['message'] = 'Заполните форму регистрации';
		}
		
		$data['title'] = 'Регистрация';
		return $data;
    }
}
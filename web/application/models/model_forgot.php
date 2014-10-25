<?php
class Model_Forgot extends Model
{
    public function get_data()
    {		

		$data['email'] = isset($_POST['email']) ? $_POST['email'] : NULL;	
		$data['fl'] = isset($_POST['fl']) ? $_POST['fl'] : false;	
		$data['email'] = trim($data['email']);
		
		$data['errors'] = array();
		if ($data['fl'])	// если форма отправлена
		{ 
			if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
			{
				$str = "Вы ввели некорректный e-mail";
				array_push($data['errors'],$str);
			}
			elseif ($this -> base -> isUserByEmail($data['email']) == false)
			{			
				$str = "Такого пользователя не существует";
				array_push($data['errors'],$str);
			}
		}
		
		
		$data['message'] = "Введите свой e-mail и мы вышлем вам на почту новый пароль";
		
		if (empty($data['errors']) and $data['fl'])
		{
			$user = $this -> base -> getUserByEmail($data['email']);
			$to = $data['email'];
			$subject = 'New Password';
			$newPass = random_string(10);
			$user['password'] = md5(md5($newPass.$this->passkey));
			$this -> base -> updateUser($user['login'],$user['name'],$user['password'],$user['email']);
			$message = 'Смена пароля<br>Ваш логин: '.$user['login'].'<br> Ваш новый пароль: '.$newPass.'<br>';
			sendmail($to, $subject, $message);
			$data['message'] = 'Новый пароль отправлен на вашу почту';
		}

	
		$data['title'] = "Напомнить пароль";
		return $data;
		
    }
}
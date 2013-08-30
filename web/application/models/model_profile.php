<?php
class Model_Profile extends Model
{
    public function get_data()
    {
		if (!isset($_SESSION['userid']))
		{
			$data['message'] = "Вам необходимо зарегистрироваться или авторизоваться";
			$data['login'] = false;
			$data['title'] = "Профиль";
			return $data;
		}
		$data['login'] = true;
		$userLogin = $_SESSION['userlogin'];
		$data['user'] = $this -> base -> getUser($userLogin);
		$data['user']['dateregister'] = getPostDate($data['user']['dateregister']);
		$data['navkac'] = 'profile';
		$data['title'] = "Профиль";
		return $data;
		
    }
	public function get_edit_data()
    {
		if (!isset($_SESSION['userid']))
		{
			Route::ErrorAccess();
		}	
		$data['message'] = "";		// что бы не был пустым
		$data['newName'] = isset($_POST['newName']) ? $_POST['newName'] : NULL;
		$data['newPassword'] = isset($_POST['newPassword']) ? $_POST['newPassword'] : NULL;
		$data['password'] = isset($_POST['password']) ? $_POST['password'] : NULL;
		$data['newEmail'] = isset($_POST['newEmail']) ? $_POST['newEmail'] : NULL;
		$data['fl'] = isset($_POST['fl']) ? $_POST['fl'] : false;
		$data['newEmail'] = trim($data['newEmail']); // убираем пробелы
		
		$userLogin = $_SESSION['userlogin'];		
		$data['user'] = $this -> base -> getUser($userLogin); // получаем данные пользователя
		
		if ($data['fl']) // если отправили форму
		{
			$data['errors'] = array();
			if(strlen($data['newPassword']) < 6 or strlen($data['newPassword']) > 20)
			{
				$str = "Пароль должен быть не меньше 6 символов и не больше 20";
				array_push($data['errors'],$str);
			}
			if (!preg_match("/^(?:[a-z0-9]+(?:[-_]?[a-z0-9]+)?@[a-z0-9]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$data['newEmail']))
			{
				$str = "Некорректный e-mail";
				array_push($data['errors'],$str);
			}
			if ($data['newName'] == NULL)
			{
				$str = "Имя не установлено";
				array_push($data['errors'],$str);
			}
			$data['password'] = md5(md5($data['password'].$this->passkey));
			if ($data['password'] != $data['user']['password'])
			{
				$str = "Вы ввели неверный пароль";
				array_push($data['errors'],$str);
			}
			if (empty($data['errors']))
			{
				// если ошибок нет - регистрируем
				$data['newPassword'] = md5(md5($data['newPassword'].$this->passkey));
				$this -> base -> updateUser($data['user']['login'],$data['newName'],$data['newPassword'],$data['newEmail']);
				$data['message'] = "Профиль отредактирован";				
			}
			else
			{
				$data['message'] = "Ошибка регистрации:";
				
			}
		}
		
		$data['navkac'] = 'profile';
		$data['title'] = "Редактировать профиль";
		return $data;
		
    }
}
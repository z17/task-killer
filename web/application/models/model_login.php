<?php
class Model_Login extends Model
{
    public function get_data()
    {				
		if (!isset($_SESSION['userid']))
		{
			$data['login'] = isset($_POST['login']) ? $_POST['login'] : '';
			$data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
			$data['fl'] = isset($_POST['fl']) ? $_POST['fl'] : false;
			$data['message'] = '';
			if ($data['fl']) 
			{
				$user = $this -> base -> getUser($data['login']);
				if ($user)
				{
					$data['password'] = md5(md5($data['password'].$this -> passkey));
					if ($data['password'] == $user['password'])
					{
					//	$data['message'] = 'Вход выполнен';
						$_SESSION['userid'] = $user['id'];
						$_SESSION['userlogin'] = $user['login'];
						Route::RedirectToProfile();
					}
					else
					{
						$data['error'] = 'Неправильный логин или пароль';
					}
				}
				else
				{
					$data['error'] = 'Неправильный логин или пароль';
				}			
			}
			else	
			{
				$data['message'] = 'Заполните форму';
			}		
		}
		else
		{
			$data['message'] = "Вы уже авторизованы";
		}
		$data['title'] = 'Авторизация';
		return $data;		
    }
}
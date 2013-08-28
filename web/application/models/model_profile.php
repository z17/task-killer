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
}
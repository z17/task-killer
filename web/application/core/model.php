<?php
class Model
{
	public $base;
	public $passkey;
	public $user;
	public $email;
	public $phone;
	public $icq;
	function __construct()
	{ 
		session_start();
		$this -> base = new Base;
		$file = parse_ini_file("/application/conf.ini");
		$this->passkey = $file['passkey'];
		$this -> email = $file['email'];
		$this -> phone = $file['phone'];
		$this -> icq = $file['icq'];
		if (isset($_SESSION['userid']))
		{
			$userLogin = $_SESSION['userlogin'];
			$this -> user = $this -> base -> getUser($userLogin);
			$this -> user['dateregister'] = getPostDate($this -> user['dateregister']);
		}
	}
    public function get_data()
    {
    }
}
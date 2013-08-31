<?php
class Model
{
	public $base;
	public $passkey;
	public $user;
	function __construct()
	{ 
		session_start();
		$this -> base = new Base;
		$file = parse_ini_file("/application/conf.ini");
		$this->passkey = $file['passkey'];
		if (isset($_SESSION['userid']))
		{
			$userLogin = $_SESSION['userlogin'];
			$this -> user = $this -> base -> getUser($userLogin);
		}
	}
    public function get_data()
    {
    }
}
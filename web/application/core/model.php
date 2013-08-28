<?php
class Model
{
	public $numPosts;
	public $base;
	public $passkey;
	function __construct()
	{ 
		session_start();
		$this -> base = new Base;
		$file = parse_ini_file("/application/conf.ini");
		$this->passkey = $file['passkey'];
	}
    public function get_data()
    {
    }
}
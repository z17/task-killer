<?php
class Base {    
    private $base;
	private $host;
	private $baseName;
	private $user;
	private $login;
	private $pass;
	
    function __construct()
    {
		$file = parse_ini_file("/application/conf.ini");
		$this->host = $file['host'];
		$this->baseName = $file['baseName'];
		$this->user = $file['user'];
		$this -> base = new PDO("mysql:host=".$this->host.";dbname=".$this->baseName, $this->user); 
		$this -> base -> query("set names utf8");		 
    }    
	function isUser($login)
	{
		$sql = 'SELECT COUNT(id) FROM users WHERE login=:login';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$sql -> execute();
		$user = 0;
		$user = $sql -> fetch();
		if ($user['COUNT(id)'] > 0)
			$fl = true;
		else
			$fl = false;
			
		return $fl;
	}
	function getUser($login)
	{
		$sql = 'SELECT id, id_group, name, login, password, email, balance, dateregister FROM users WHERE login=:login';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$sql -> execute();
		$user = $sql -> fetch();
		return $user;
	}
	function addUser($name,$login,$password,$email)
	{
		$id_group = 1;		// по умолчинию группа users
		$balance = 0;		// по умолчанию баланс 0
		$dateregister = date("Y-m-d H:i:s");
		$sql = 'INSERT INTO users (id_group, name, login, password, email, balance, dateregister) 
				VALUES (:id_group, :name, :login, :password, :email, :balance, :dateregister)';
		$sql = $this->base -> prepare($sql);
		$sql -> bindParam (':id_group',$id_group,PDO::PARAM_INT);
		$sql -> bindParam (':name',$name,PDO::PARAM_STR);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$sql -> bindParam (':password',$password,PDO::PARAM_STR);
		$sql -> bindParam (':email',$email,PDO::PARAM_STR);
		$sql -> bindParam (':balance',$balance,PDO::PARAM_INT);
		$sql -> bindParam (':dateregister',$dateregister,PDO::PARAM_STR);
		$a = $sql -> execute();
	}
	function updateUser($login,$name,$password,$email)
	{
		$sql = 'UPDATE users SET name = :name, password = :password, email = :email
				WHERE login = :login';
		$sql = $this->base -> prepare($sql);
		$sql -> bindParam (':name',$name,PDO::PARAM_STR);
		$sql -> bindParam (':password',$password,PDO::PARAM_STR);
		$sql -> bindParam (':email',$email,PDO::PARAM_STR);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$a = $sql -> execute();
	}
}
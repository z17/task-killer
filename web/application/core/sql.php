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
	function isUserByEmail($email)
	{
		$sql = 'SELECT COUNT(id) FROM users WHERE email=:email';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':email',$email,PDO::PARAM_STR);
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
		$sql = 'SELECT * FROM users WHERE login=:login';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':login',$login,PDO::PARAM_STR);
		$sql -> execute();
		$user = $sql -> fetch();
		return $user;
	}
	function getUserByEmail($email)
	{
		$sql = 'SELECT * FROM users WHERE email=:email';
		$sql = $this -> base -> prepare($sql);
		$sql -> bindParam (':email',$email,PDO::PARAM_STR);
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
	function addMoneybacklog($id_user,$sum,$wmr)
	{		
		$time = date("Y-m-d H:i:s");
		$status = false;	// по умолчанию платёж не выполнен
		$sql = 'INSERT INTO moneybacklog (id_user, time, sum, wmr, status) 
				VALUES (:id_user, :time, :sum, :wmr, :status)';
		$sql = $this->base -> prepare($sql);
		$sql -> bindParam (':id_user',$id_user,PDO::PARAM_INT);
		$sql -> bindParam (':time',$time,PDO::PARAM_STR);
		$sql -> bindParam (':sum',$sum,PDO::PARAM_INT);
		$sql -> bindParam (':wmr',$wmr,PDO::PARAM_STR);
		$sql -> bindParam (':status',$status,PDO::PARAM_STR);
		$a = $sql -> execute();
	}
	function addItem($name,$price)
	{		
		$sql = 'INSERT INTO items (name, price) 
				VALUES (:name, :price)';
		$sql = $this->base -> prepare($sql);
		$sql -> bindParam (':name',$name,PDO::PARAM_STR);
		$sql -> bindParam (':price',$price,PDO::PARAM_INT);
		$a = $sql -> execute();
	}
	function getItems()
	{		
		$sql = 'SELECT * FROM items';
		$sql = $this-> base -> prepare($sql);
		$sql -> execute();
		$items = $sql -> fetchAll();
		return $items;
	}
	function getItemById($id)
	{		
		$sql = 'SELECT name FROM items WHERE id = :id';
		$sql = $this-> base -> prepare($sql);		
		$sql -> bindParam (':id',$id);
		$sql -> execute();
		$items = $sql -> fetch();
		return $items['name'];
	}
	function getPrice($id)
	{		
		$sql = 'SELECT price FROM items WHERE id = :id';
		$sql = $this-> base -> prepare($sql);
		$sql -> bindParam (':id',$id,PDO::PARAM_INT);
		$sql -> execute();
		$price = $sql -> fetch();
		$price = $price['price'];	// что бы вернуть не массив, а одно значение цены
		return $price;
	}
	function addTask($id_author,$id_item,$time_end,$text,$file1,$file2,$file3,$price)
	{	
		$status = 'started';	
		$time_start = date("Y-m-d H:i:s");	
		$sql = 'INSERT INTO tasks (id_author, id_item, time_start, time_end, text, file1, file2, file3, price, status)
				VALUES (:id_author, :id_item, :time_start, :time_end, :text, :file1, :file2, :file3, :price, :status)';
		$sql = $this-> base -> prepare($sql);
		$sql -> bindParam (':id_author',$id_author);
		$sql -> bindParam (':id_item',$id_item);
		$sql -> bindParam (':time_start',$time_start);
		$sql -> bindParam (':time_end',$time_end);
		$sql -> bindParam (':text',$text);
		$sql -> bindParam (':file1',$file1);
		$sql -> bindParam (':file2',$file2);
		$sql -> bindParam (':file3',$file3);
		$sql -> bindParam (':price',$price);
		$sql -> bindParam (':status',$status);
		$sql -> execute();
		return $price;
	}
	function getAllActiveTasks()
	{		
		$statusStar = 'started';
		$sql = "SELECT * FROM tasks WHERE status = 'started' ORDER by time_end";
		$sql = $this-> base -> prepare($sql);
		// $sql -> bindParam (':started',$statusStart); почему-то так не работает
		$sql -> execute();
		$tasks = $sql -> fetchAll();
		return $tasks;
	}
}
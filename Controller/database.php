<?php
class Database extends PDO {
	private static $_instance = null;
	
	public function __construct()
	{
		try{
			include_once 'dbconfig.php';
			parent::__construct("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
			
			$query = "SET NAMES UTF8";
			$stmt = $this->prepare($query);
			$stmt->execute();
		}catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public static function getInstance()
	{
		if(!(self::$_instance instanceof Database)){
			self::$_instance = new Database();
		}
		return self::$_instance;
	}
}
?>
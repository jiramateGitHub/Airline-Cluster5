<?php 
date_default_timezone_set('Asia/Bangkok');
include_once('database.php');
class C_Staff{

    private $db;

	public $ID_staff;
	public $Name;
	public $Password_staff;

    function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getID(){
        $query = "SELECT * FROM staff";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$data = NULL;
		if($stmt->rowCount() > 0)
		{
			$i = 0;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$data[$i]['ID_staff'] = $row['ID_staff'];
				$i++;
			}
		}
		return $data;
    }

    public function getPass(){
        $query = "SELECT * FROM staff";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$data = NULL;
		if($stmt->rowCount() > 0)
		{
			$i = 0;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$data[$i]['Password_staff'] = $row['Password_staff'];
				$i++;
			}
		}
		return $data;
    }
    
    public function Login($u, $p){
		try
		{
			if($this instanceof Staff)
			{
				$stmt = $this->db->prepare("SELECT * FROM Staff WHERE Name = :u AND Password_staff = :p");
			
			}
			
			$stmt->bindparam(":u", $u);
			$stmt->bindparam(":p", $p);
			
			$stmt->execute();

			if($stmt->rowCount() == 1)
			{
				$i = 0;
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					
					$data['ID_staff'] = $row['ID_staff'];
					$data['Password_staff'] = $row['Password_staff'];
					
					
					$_SESSION['ID_staff'] = $data['ID_staff'] ;
					$_SESSION['Password_staff'] = $row['Password_staff'];
					
					if($this instanceof Staff)
					{
						$_SESSION['user_type'] = "staff";
					}
				}
				return $data;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

}
?>
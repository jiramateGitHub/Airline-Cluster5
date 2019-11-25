<?php 
date_default_timezone_set('Asia/Bangkok');
include_once('database.php');
class C_Customer{
    private $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }
    function addCustomer($data,$row){
        try
		{
			$stmt = $this->db->prepare("INSERT INTO customer(fname, lname, phone, email) VALUES (:fname , :lname, :phone, :email)");
			$stmt->bindparam(":fname", $data['detail_fname_'.$row.'']);
			$stmt->bindparam(":lname", $data['detail_lname_'.$row.'']);
			$stmt->bindparam(":phone", $data['detail_tel_'.$row.'']);
			$stmt->bindparam(":email", $data['detail_email_'.$row.'']);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
    }
    function getCustomer($data,$row){
        try
		{
			$stmt = $this->db->prepare("SELECT * FROM customer WHERE fname = :fname AND lname = :lname AND phone = :phone AND email = :email ORDER BY ID_customer DESC LIMIT 1");
			$stmt->bindparam(":fname", $data['detail_fname_'.$row.'']);
			$stmt->bindparam(":lname", $data['detail_lname_'.$row.'']);
			$stmt->bindparam(":phone", $data['detail_tel_'.$row.'']);
			$stmt->bindparam(":email", $data['detail_email_'.$row.'']);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result['ID_customer'];
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
    }
}
?>
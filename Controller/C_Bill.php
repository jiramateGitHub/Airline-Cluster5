<?php 
date_default_timezone_set('Asia/Bangkok');
include_once('database.php');
class C_Bill{
    private $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }

    function addBill($id,$price){
        try
		{
			$status = 0;
            $sql = "INSERT INTO bill(ID_reserve, price, date_pay) 
            VALUES (:ID_reserve , :price, :date_pay)";
			$stmt = $this->db->prepare($sql);

			$stmt->bindparam(":ID_reserve", $id);
			$stmt->bindparam(":price", $price);
			$stmt->bindparam(":date_pay", date('Y-m-d'));
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	function updateBill($id){
		$sql = "UPDATE bill SET status = 1 WHERE ID_reserve = :id";
		$query = $this->db->prepare($sql);
		$query->bindparam(":id",$id);
		$query->execute();
		return $query;
	}
}
?>
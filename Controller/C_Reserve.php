<?php 
date_default_timezone_set('Asia/Bangkok');
include_once('database.php');
class C_Reserve{
    private $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }
    function addReserve($data,$seat,$id,$row){
        try
		{
			$status = 0;
            $sql = "INSERT INTO reserve(ID_customer, ID_flight_detail, date_book, date_flight, seat_type ,seat_No) 
            VALUES (:ID_customer , :ID_flight_detail, :date_book, :date_flight, :seat_type, :seat_No)";
			$stmt = $this->db->prepare($sql);

			$stmt->bindparam(":ID_customer", $id[$row]);
			$stmt->bindparam(":ID_flight_detail", $data['id_flight_detail']);
			$stmt->bindparam(":date_book", $data['date_book']);
            $stmt->bindparam(":date_flight", $data['date_flight']);
            $stmt->bindparam(":seat_type", $data['seat_type']);
            $stmt->bindparam(":seat_No", $seat[$row]);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	function getID_Reserve($id,$row){
        try
		{
			$stmt = $this->db->prepare("SELECT * FROM reserve WHERE ID_customer = :id ORDER BY ID_reserve DESC LIMIT 1");
			$stmt->bindparam(":id", $id[$row]);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result['ID_reserve'];
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	function getReserve(){
		$sql = "SELECT *  FROM reserve AS d1
		INNER JOIN customer AS d2
		ON  (d1.ID_customer= d2.ID_customer)
		INNER JOIN bill AS d3
		ON (d1.ID_reserve=d3.ID_reserve)
		ORDER BY d1.date_book,d1.date_flight DESC";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query;
	}
}
?>
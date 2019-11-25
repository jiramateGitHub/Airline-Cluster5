<?php
    date_default_timezone_set('Asia/Bangkok');
    include_once('database.php');
    class C_Flight{
        private $db;
        private $ID_flight;
        private $time_up;
        private $time_down;
        private $date_time;
        private $price;
        private $o_province;
        private $o_airport;
        private $o_airport_th;
        private $d_province;
        private $d_airport;
        private $d_airport_th;

        function __construct()
        {
            $this->db = Database::getInstance();
        }
        
        function index(){
            header("Location:View/home.php");
        }

        function getProvince($type){
            // 1 = Show Province All
            // 2 = Show Province on Flight
            if($type == 1){
                $sql = "SELECT DISTINCT province  FROM airport";
                $query = $this->db->prepare($sql);
                $query->execute();
                while($row = $query->fetch(PDO::FETCH_ASSOC)){ 		
                    echo "<option>".$row['province']."</option>";					
                } 
            }else if($type == 2){
                $sql = "SELECT DISTINCT o_province  FROM  flight";
                $query = $this->db->prepare($sql);
                $query->execute();
                while($row = $query->fetch(PDO::FETCH_ASSOC)){ 		
                    echo "<option>".$row['o_province']."</option>";					
                } 
            }
        }

        function addFlightDetail($data){
            try{
                $o_airport = $data["airport1"];
                $d_airport = $data["airport2"];
                $id_flight = 0;
                $sql1 = "SELECT * FROM flight WHERE o_airport = '$o_airport' AND d_airport =  '$d_airport'";
                $query1 = $this->db->prepare($sql1);
                $query1->execute(); 
                while($row = $query1->fetch(PDO::FETCH_ASSOC)){ 		
                    $id_flight = $row['ID_flight'];					
                 }
                if($id_flight != NULL || $id_flight > 0 ){
                    $sql2 = "INSERT INTO flight_detail(ID_flight,time_up,time_down,date_time,price) VALUES (:idflight,:time_up,:time_down,:dates,:price)";
                    $query2 = $this->db->prepare($sql2);
                    $query2->bindparam(":idflight",$id_flight);
                    $query2->bindparam(":time_up",$data['time_up']);
                    $query2->bindparam(":time_down",$data['time_down']);
                    $query2->bindparam(":dates",$data['date']);
                    $query2->bindparam(":price",$data['price']);
                    $query2->execute();  
                    echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
                }else{
                    echo "<script>alert('0')</script>";
                }
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function addFlight($origin,$destination){
            $aryOrigin; 
            $aryDestination;

            $sql = "SELECT * from airport WHERE ID_airport = $origin";
            $query_origin = $this->db->prepare($sql);
            $query_origin->execute();
            while($r = $query_origin->fetch(PDO::FETCH_ASSOC)){
                $aryOrigin = array(
                    "o_province" => $r['province'],
                    "o_airport" => $r['airport'],
                    "o_airport_th" => $r['airport_th']
                ); 
            }

            $sql = "SELECT * from airport WHERE ID_airport = $destination";
            $query_destination = $this->db->prepare($sql);
            $query_destination->execute();
            while($r2 = $query_destination->fetch(PDO::FETCH_ASSOC)){
                $aryDestination = array(
                    "d_province" => $r2['province'],
                    "d_airport" => $r2['airport'],
                    "d_airport_th" => $r2['airport_th']
                ); 
            }

            
            $sql = "INSERT INTO flight(o_province,o_airport,o_airport_th,d_province,d_airport,d_airport_th) VALUES (:o_province,:o_airport,:o_airport_th,:d_province,:d_airport,:d_airport_th)";
            $query2 = $this->db->prepare($sql);
            $query2->bindparam(":o_province",$aryOrigin['o_province']);
            $query2->bindparam(":o_airport",$aryOrigin['o_airport']);
            $query2->bindparam(":o_airport_th",$aryOrigin['o_airport_th']);
            $query2->bindparam(":d_province",$aryDestination['d_province']);
            $query2->bindparam(":d_airport",$aryDestination['d_airport']);
            $query2->bindparam(":d_airport_th",$aryDestination['d_airport_th']);
            $query2->execute();

            echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
        }

         // แสดง Flight ของวันที่เลือก | oneway_search.php
         function getFlight($origin,$destination,$date){
            $timenow = date('H:i:s');
            $datenow = date('Y-m-d');
            if($datenow >= $date){
                $sql = "SELECT * FROM flight_detail INNER JOIN flight 
                ON flight.ID_flight = flight_detail.ID_flight 
                WHERE flight.o_province = '$origin' AND flight.d_province = '$destination' 
                AND flight_detail.date_time >= '$datenow'
                AND flight_detail.time_up >= '$timenow'
                AND flight_detail.date_time = '$date'
                ORDER BY flight_detail.time_up ASC";
                $query = $this->db->prepare($sql);
                $query->execute();
            }else if($datenow < $date){
                $sql = "SELECT * FROM flight_detail INNER JOIN flight 
                ON flight.ID_flight = flight_detail.ID_flight 
                WHERE flight.o_province = '$origin' AND flight.d_province = '$destination' 
                AND flight_detail.date_time = '$date'
                ORDER BY flight_detail.time_up ASC";
                $query = $this->db->prepare($sql);
                $query->execute();
            }
            return $query;
        }

        function updateFlightDetail($data){
            $sql = "UPDATE flight_detail SET time_up = :time_up , time_down = :time_down, date_time = :date_time, price = :price WHERE ID_flight_detail = :ID_flight_detail";
            $query = $this->db->prepare($sql);
            $query->bindparam(":ID_flight_detail",$data['ID_flight_detail']);
            $query->bindparam(":time_up",$data['time_up']);
            $query->bindparam(":time_down",$data['time_down']);
            $query->bindparam(":date_time",$data['date']);
            $query->bindparam(":price",$data['price']);
            $query->execute();
        }

        function deleteFlight($id){
            $sql = "DELETE FROM flight_detail WHERE ID_flight_detail = :id";
            $query = $this->db->prepare($sql);
            $query->bindparam(":id",$id);
            $query->execute();
            return $query;
        }

        //แสดงรายการข้อมูลเที่ยวบินทั้งหมด
        function getFlight_Detail(){
            $sql = "SELECT * FROM flight_detail,flight WHERE flight_detail.ID_flight = flight.ID_flight ORDER BY date_time,time_up,time_down DESC";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query;
        }

        //ร้องขอข้อมูลในแถวที่ค้นหา ของตาราง flight_detail
        function getID_Flight_Detail($id){
            $sql = "SELECT * FROM flight_detail WHERE ID_flight_detail = '$id' ";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query;
        }

        //ร้องขอข้อมูลในแถวที่ค้นหา ของตาราง flight
        function getID_Flight($id){
            $sql = "SELECT * FROM flight WHERE ID_flight = '$id' ";
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query;
        }
        
        //ค้นหาที่นั่งจาก bill ว่ามีที่ไหนว่างบ้าง
        function get_Seat($id_flight_detail){
            $sql = "SELECT * FROM bill INNER JOIN reserve ON  bill.ID_reserve = reserve.ID_reserve AND reserve.ID_flight_detail = :ID_flight_detail";
            $query = $this->db->prepare($sql);
            $query->bindparam(":ID_flight_detail",$id_flight_detail);
            $query->execute();
            return $query;
        }
    }
/***/
?>
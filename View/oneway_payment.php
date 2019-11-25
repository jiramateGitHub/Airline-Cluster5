<?php 
session_start();
if($_SESSION['seat'] == NULL){
	header('location:home.php');
}

date_default_timezone_set('Asia/Bangkok');
include_once("../Controller/C_Reserve.php");
include_once("../Controller/C_Customer.php");
include_once("../Controller/C_Flight.php");
$C_Reserve = new C_Reserve;
$C_Customer = new C_Customer;
$C_Flight = new C_Flight;
$id_flight_detail = $_SESSION['id_flight_detail'];
$query = $C_Flight->getID_Flight_Detail($id_flight_detail);
$data_flight_detail;

$seat_type = $_SESSION['seat'];
$amount = $_SESSION['amount'];

while($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data_flight_detail = array(
		"ID_flight_detail" => $row['ID_flight_detail'],
		"ID_flight" => $row['ID_flight'],
		"time_up" => $row['time_up'],
		"time_down" => $row['time_down'],
		"date_time" => $row['date_time'],
		"price" => $row['price']
	);
}
$query = $C_Flight->getID_Flight($data_flight_detail['ID_flight']);
$data_flight;
while($row = $query->fetch(PDO::FETCH_ASSOC)){
	$data_flight = array(
		"ID_flight" => $row['ID_flight'],
		"o_province" => $row['o_province'],
		"o_airport" => $row['o_airport'],
		"o_airport_th" => $row['o_airport_th'],
		"d_province" => $row['d_province'],
		"d_airport" => $row['d_airport'],
		"d_airport_th" => $row['d_airport_th']
	);
}

//ประกาศตัวแปร array สำหรับเก็บข้อมูลจาก form รายละเอียดการติดต่อ
$data_contact = array(
    "contact_fname" => $_POST['contact_fname'],
    "contact_lname" => $_POST['contact_lname'],
    "contact_tel" => $_POST['contact_tel'],
    "contact_email" => $_POST['contact_email']
); 

$data_detail; //ประกาศตัวแปร สำหรับเก็บข้อมูลจาก form รายละเอียดผู้เดินทาง
for($i=1;$i<=$amount;$i++){
    $data_detail['detail_fname_'.$i.''] = $_POST['detail_fname_'.$i.''];
    $data_detail['detail_lname_'.$i.''] = $_POST['detail_lname_'.$i.''];
    $data_detail['detail_tel_'.$i.''] = $_POST['detail_tel_'.$i.''];
    $data_detail['detail_email_'.$i.''] = $_POST['detail_email_'.$i.''];
}

$ID_customer; //ประกาศตัวแปร สำหรับเก็บข้อมูล ID ลูกค้า
for($i=1;$i<=$amount;$i++){
    $C_Customer->addCustomer($data_detail,$i); //เพิ่มข้อมูลลูกค้าลงตาราง customer
    $ID_customer[$i] = $C_Customer->getCustomer($data_detail,$i); //get id ลูกค้า่จากตาราง customer
}

//ประกาศตัวแปร สำหรับเก็บข้อมูลใบจอง
$data_reserve = array(
    "id_flight_detail" => $_SESSION['id_flight_detail'],
    "date_book" => date('Y-m-d:H:i:s'),
    "date_flight" => $_SESSION['date_flight'],
    "seat_type" => $_SESSION['seat']
);

$data_reserve_seat_no; //ประกาศตัวแปรสำหรับเก็บข้อมูลที่นั่งของลูกค้า
for($i=1;$i<=$amount;$i++){
    $data_reserve_seat_no[$i]= $_POST['seat_no_'.$i.''];
}
$ID_reserve; //ประกาศตัวแปร สำหรับเก็บข้อมูล ID ใบจอง
for($i=1;$i<=$amount;$i++){
	$C_Reserve->addReserve($data_reserve,$data_reserve_seat_no,$ID_customer,$i); //เพิ่มข้อมูลลูกค้าลงตาราง reserve
	$ID_reserve[$i] = $C_Reserve->getID_Reserve($ID_customer,$i); //get id ลูกค้า่จากตาราง customer
}

for($i=1;$i<=$amount;$i++){
	$_SESSION['id_customer_'.$i.''] = $ID_customer[$i];
}
for($i=1;$i<=$amount;$i++){
	$_SESSION['id_customer_'.$i.''] = $ID_customer[$i];
}
echo $ID_reserve[1];
?>
<html>
<head>
    <title>Cluster 5</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	
	<style>
		
		
		body{
			/* background-attachment:fixed; */
			/* background-image: url("../assets/img/banner-bg5.jpg"); */
			background-size:100%;
			background-position: center;
			height:740px;
			background-color:#fafafa ;
			
		}
		.jumbotron{
			box-shadow: 0px 0px 1px 1px rgba(50,50,50,.2);		
			background: rgba(255, 255, 255,1);
			padding-top : 25px;
			padding-bottom : 25px;
		}
		.flight_form{
			margin-top:20px;
		}
		
		nav{
			margin-top:5px;
			background-color:white;
			box-shadow: 1px 1px 1px 1px rgba(20,20,20,.3);		
			padding-left:50px;
		}
		a{
			color:#8686ff;
		}
		.choose {
			background-color:#f97c00 ;
			color:white;
		}
		.card-header{
			background-color:#ffffff ;
			color:#000000;
			padding-left:13px;
			padding-top:1px;
			padding-bottom:1px;
		}
		.card{
			padding:2px;
			background-color:white;
			margin-bottom:10px;
			box-shadow: 1px 1px 1px 1px rgba(50,50,0,.0);
		}
		
		

	</style>
</head>
<body >
<nav >
    <div class="container">
        <div class="row">
            <div class="col-3">
                <a class="navbar-brand" href="#">
                    <img src="../assets/img/menu.png" width="180" height="60" alt="">
                </a>
            </div>
            <div class="col-6 offset-3">
                <br>
                <h6 class="font-weight-bold" >1.Search — 2.Booking — <font color="blue">3.Payment</font> — 4.E-ticket issued</h6>
            </div>
        </div>
    </div>
</nav>
	<form method="post" action="oneway_complete.php">
    <div class="container">
		<div class="flight_form jumbotron">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h4 class="font-weight-bold">Flight from <?php echo $data_flight['o_province'].' to '. $data_flight['d_province']?></h4>
							<h6><i class="fas fa-plane "></i> <?php echo $data_flight['o_province'].' ('.$data_flight['o_airport'].') → '. $data_flight['d_province'].' ('.$data_flight['o_airport'].')';?>
							<?php echo ' → '.$data_flight_detail['date_time'].' • ผู้ใหญ่ '.$amount.' คน'.' • '.$seat_type;?>
							
							</h6>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-8">
					<div class="card">
						<div class="card-header">	
							<h6 class="font-weight-bold"><i class="far fa-credit-card fa-lg"></i></i></i> ชำระเงิน</h6>
						</div>
						<div class="card-body">	
							<div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">หมายเลขบัตรเครดิต 16 หลัก <i class="fab fa-cc-visa fa-lg"></i> <i class="fab fa-cc-mastercard fa-lg"></i></label>
                                    <input type="text" class="form-control" placeholder="หมายเลขบัตรเครดิต 16 หลัก"required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">ชื่อ - นามสกุล บนบัตร</label>
                                    <input type="text" class="form-control"  placeholder="ชื่อ - นามสกุล"required>
                                </div>
							</div> 
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">วันที่ชำระเงิน</label>
                                    <input type="text" class="form-control"  value="<?php echo date('Y-m-d');?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">CCV/CVV</label>
                                    <input type="text" class="form-control" placeholder="123"required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">วันที่บัตรหมดอายุ</label>
                                    <input type="text" class="form-control" placeholder="12/24"required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">เบอร์โทร</label>
                                    <input type="text" class="form-control" placeholder="+66"required>
                                </div>
                            </div>
						</div> <!-- card body-->
					</div>
				</div>
				<div class="col-4 ">
					<div class="row">
						<div class="col-12 card">
							<div class="card-header">
								<h6 class="font-weight-bold"><i class="fas fa-dollar-sign fa-lg"></i> สรุปราคา</h6>
							</div>
							<div class="card-body">
								
								<?php if($seat_type == "Business"){;?>
									<h6>รวมราคาที่ชำระ THB <?php echo $data_flight_detail['price']+800 .' x '.$amount; ?></h6>	
                                	<h5 class="font-weight-bold" style="color:red;">  THB <?php echo ($data_flight_detail['price']+800)*$amount .' ฿ '; ?></h5>
								<?php }else{ ?>
									<h6>รวมราคาที่ชำระ THB <?php echo $data_flight_detail['price'] .' x '.$amount; ?></h6>	
									<h5 class="font-weight-bold" style="color:red;">  THB <?php echo $data_flight_detail['price']*$amount .' ฿ '; ?></h5>
								<?php } ?>
							</div>
						</div>
					</div> <!-- row -->
					<div class="row">
						<input type="submit" name='btn-next' class='btn btn-block choose' value="ดำเนินการต่อ">
					</div>
					
				</div>
			</div>
			
			<!-- <hr style="border-width: 1px;border-style: inset;"> -->
						
						
		</div> <!-- flight_form -->
    </div> <!-- container--> 

	</form>
</body>
</html>
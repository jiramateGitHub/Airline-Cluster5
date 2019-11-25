<!DOCTYPE html>
<?php
session_start();
include_once("../Controller/C_Flight.php");
$flight = new C_Flight;

$id_flight_detail = $_GET['id_flight_detail'];
$query = $flight->getID_Flight_Detail($id_flight_detail);
$data_flight_detail;
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
$query = $flight->getID_Flight($data_flight_detail['ID_flight']);
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
if($_SESSION['seat'] == NULL){
	header('location:home.php');
}
$seat_type = $_SESSION['seat'];
$amount = $_SESSION['amount'];
$_SESSION['id_flight_detail'] = $id_flight_detail;
$_SESSION['date_flight'] = $data_flight_detail['date_time'];
$_SESSION['price'] = $data_flight_detail['price'];
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
		.navbar-brand{
			margin-left:70px;
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
                <h6 class="font-weight-bold" >1.Search — <font color="blue">2.Booking</font> — 3.Payment — 4.E-ticket issued</h6>
            </div>
        </div>
    </div>
</nav>
	<form method="post" action="oneway_payment.php">
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
							<h6 class="font-weight-bold"><i class="fas fa-book-reader fa-lg"></i></i> ข้อมูลเพิ่มเติม</h6>
						</div>
						<div class="card-body">	
							<div class="row">
								<div class="col-1"><h6><i class="far fa-calendar-alt "></i></h6></div>
								<div class="col-5">
									<h6>วันที่ <?php echo$data_flight_detail['date_time'] ; ?> </h6>
								</div>
							</div>
							<div class="row">
								<div class="col-1"><h6><i class="far fa-clock "></i></h6></div>
								<div class="col-2">
									<h6> <?php echo $data_flight_detail['time_up'] ; ?></h6>
								</div>
								<div class="col-1"><h6>ถึง</h6>	</div>
								<div class="col-2">
									<h6><?php echo $data_flight_detail['time_down'] ; ?></h6>
								</div>
							</div>
							<div class="row">
								<div class="col-1"><h6><i class="fas fa-users "></i></h6></div>
								<div class="col-5">
									<h6>จำนวน <?php echo $amount ; ?> คน | <?php echo $seat_type;?></h6>
								</div>
							</div>
							<?php if($seat_type == "Business"){ ?>
								<div class="row">
									<div class="col-1"><h6><i class="fas fa-utensils"></i></h6></div>
									<div class="col-5">
										<h6>มีอาหารและเครื่องดื่ม</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-1"><h6><i class="fas fa-briefcase"></i></i></h6></div>
									<div class="col-5">
										<h6>สัมภาระ 30 กก.</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-1"><h6><i class="fas fa-plug"></i></h6></div>
									<div class="col-5">
										<h6>ปลั๊กไฟ</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-1"><h6><i class="fas fa-play"></i></h6></div>
									<div class="col-5">
										<h6>ความบันเทิงบนเครื่อง</h6>
									</div>
								</div>
							<?php }else{ ?>
								<div class="row">
									<div class="col-1"><h6><i class="fas fa-utensils"></i></h6></div>
									<div class="col-5">
										<h6>ไม่มีอาหารและเครื่องดื่ม</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-1"><h6><i class="fas fa-briefcase"></i></h6></div>
									<div class="col-5">
										<h6>สัมภาระ 8 กก.</h6>
									</div>
								</div>
							<?php } ?>
								
								

							
							
							
						</div>
					</div>
				</div>
				<div class="col-4 ">
					<div class="row">
						<div class="col-12 card">
							<div class="card-header">
								<h6 class="font-weight-bold"><i class="fas fa-dollar-sign fa-lg"></i> สรุปราคา</h6>
							</div>
							<div class="card-body">
							<?php if( $seat_type == 'Business'){?>
								<p style="color:red;">Business Type + THB 800 ฿ </p>
								<h5>รวมราคาที่ชำระ THB <?php echo $data_flight_detail['price']+800 .' ฿ / คน'; ?></h5>
							<?php }else{ ?>	
								<h5>รวมราคาที่ชำระ THB <?php echo $data_flight_detail['price'] .' ฿ / คน'; ?></h5>
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
	<div class="container"> 
		<div class="flight_form jumbotron">
			<div class='card'>
				<div class="card-header">
					<h6 class="font-weight-bold"><i class="fas fa-pencil-alt"></i> รายละเอียดการติดต่อ </h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<input name="contact_fname" class='form-control'type='text' placeholder="ชื่อจริง"required>
						</div>
						<div class="col-6">
							<input name="contact_lname" class='form-control'type='text' placeholder="นามสกุล"required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-6">
							<input name="contact_tel" class='form-control'type='tel' placeholder="เบอร์มือถือ เช่น 0801234567"required>
						</div>
						<div class="col-6">
							<input name="contact_email" class='form-control'type='email' placeholder="อีเมล์ เช่น email@example.com"required>
						</div>
					</div>
				</div> <!-- card-body -->
			</div> <!-- card -->
		</div> <!-- flight_form -->
    </div> <!-- container--> 

	<div class="container"> 
		<div class="flight_form jumbotron">
		<?php for($i=1;$i<=$amount;$i++){ ?>
			<div class='card'>
				<div class="card-header">
					<h6 class="font-weight-bold"><i class="fas fa-suitcase"></i> รายละเอียดผู้เดินทาง <?php echo $i?></h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<input name= "<?php echo 'detail_fname_'.$i;?>" class='form-control'type='text' placeholder="ชื่อจริง"required><br>
							<input name= "<?php echo 'detail_tel_'.$i;?>" class='form-control'type='tel' placeholder="เบอร์มือถือ เช่น 0801234567"required><br>
						</div>
						<div class="col-6">
							<input name= "<?php echo 'detail_lname_'.$i;?>" class='form-control'type='text' placeholder="นามสกุล"required><br>
							<input name= "<?php echo 'detail_email_'.$i;?>" class='form-control'type='tel' placeholder="อีเมล์ เช่น email@example.com"required><br>
						</div>
					</div>	
					<div class="row">
						<div class="col-6">
							<select name="seat_no_<?php echo $i?>" class="custom-select my-1 mr-sm-2" id="">
								<option selected>เลือกที่นั่ง...</option>
								<?php 
										$busyseat = $flight->get_Seat($id_flight_detail);
										$busyseat_no;
										for($l=1;$l<=50;$l++){
											$busyseat_no[$l] = NULL; //กำหนดค่าว่าง
										}

										while($r = $busyseat->fetch(PDO::FETCH_ASSOC)){
											$busyseat_no[$r['seat_No']] = $r['seat_No'];
										}
										
										for($j=1;$j<=50;$j++){
										if($busyseat_no[$j] != NULL){
											echo "<option  disabled>Seat No. ".$j." (ไม่ว่าง)</option>";
										}else{
											echo "<option value='".$j."'>Seat No. ".$j."</option>";	
										}
								} ?>
							</select>
						</div>

					</div>
				</div>
			</div> <!-- card -->
		<?php } ?>
		</div> <!-- flight_form -->
    </div> <!-- container--> 
	</form>
</body>
</html>
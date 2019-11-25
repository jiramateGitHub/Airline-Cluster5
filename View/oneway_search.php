<!DOCTYPE html>
<?php
include_once("../Controller/C_Flight.php");
session_start();
$flight = new C_Flight;
$origin = $_POST['form1'];
$destination = $_POST['to1'];
$date = $_POST['date1'];
$amount = $_POST['amount1'];
$seat = $_POST['seat1'];
$_SESSION['amount'] = $amount;
$_SESSION['seat'] = $seat;
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
			padding-top : 10px;
			padding-bottom : 10px;
		}
		.flight_form{
			margin-top:20px;
			weight:10px;
		}
		.jumbotron:hover{
			background-color:#f7f7f9
		}
		.card-header{
			background-color:#ffffff ;
			color:#000000;
			padding-top:10px;
			padding-bottom:10px;
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
                <h6 class="font-weight-bold" ><font color="blue">1.Search</font> — 2.Booking — 3.Payment — 4.E-ticket issued</h6>
            </div>
        </div>
    </div>
</nav>
    <div class="container">
		<div class="flight_form card">
		<div class="card-header">
			<div class="row">
				<div class="col-10 offset-1 ">
					<h3><?php echo $origin.' (สนามบินทั้งหมด) <i class="far fa-arrow-alt-circle-right"></i> '.$destination.' (สนามบินทั้งหมด)';?></h3>
				</div>
			</div>

			<div class="row">
				<div class="col-6 offset-1">
					<h6><?php echo $date.' | '.$amount.' Adult | '.$seat;?></h6>
				</div>
				<div class="col offset-2">
					<a href="home.php" class="btn btn-primary" >เปลี่ยนแปลงการค้นหา</a>
				</div>
			</div>
		</div>	
			<div class="card-body">				
						<?php
							$msgnodata = "ไม่พบเที่ยวบินที่ตรงกับความต้องการ";
							$imgnodata = "../assets/img/nodata.png";
							date_default_timezone_set('Asia/Bangkok');
							//$tmp1 = substr($date, 6); //year
							//$tmp2 = substr($date, 0,-8); //mount
							//$tmp3 = substr($date, 3,-5); //day
							//$newdate = $tmp1."-".$tmp3."-".$tmp2;

							$query = $flight->getFlight($origin,$destination,$date);
							if(count($query) > 0){
								$count = 1;
								while($darr = $query->fetch(PDO::FETCH_ASSOC)) {
									echo "<div class='row'>";
										echo "<div class='col-10 offset-1 jumbotron'>";
											//////////////////////////////////////
											echo "<div class='row'>";
												echo "<div class='col-4'";
													echo "<h2>".$darr['time_up']."</h2> ";
												echo "</div>";	
												echo "<div class='col-1'";
													echo "<h4><center><i class='fas fa-angle-double-right fa-lg'></i></center></h4>";
												echo "</div>";	
												echo "<div class='col-4'";
													echo "<h4>".$darr['time_down']."</h4>";
												echo "</div>";	
												echo "<div class='col-3'";
													echo "<h4><center> <font color='#d06800'><i class='fas fa-dollar-sign'></i> Price ".$darr['price']." Bath.</font></center></h4>";
												echo "</div>";
												echo "<div class='col'></div>";
											echo "</div>";		
											//////////////////////////////////////
											echo "<div class='row'>";	
												echo "<div class='col-4'";
													echo "<h4>".$darr['o_airport_th'].' - '.$darr['o_airport']."</h4>";
												echo "</div>";	
												echo "<div class='col-4 offset-1'";
													echo "<h4>".$darr['d_airport_th'].' - '.$darr['d_airport']."</h4>";
												echo "</div>";
												echo "<div class='col-3'>";
													echo "<a href='oneway_booking.php?id_flight_detail=".$darr['ID_flight_detail']."' class='btn btn-block choose'>เลือก</a> ";
												echo "</div>";	
												echo "<div class='col'></div>";
											echo "</div>";	
											//////////////////////////////////////
											echo "<br><a href='#'>Flight Detail</a>";
										echo "</div>  <!-- jumbo -->";
									echo "</div> <!-- row -->";		
									$count++;
									$msgnodata = "";
									$imgnodata = "";
								}
							}
							echo "<div class='row'>";
									echo "<div class='col-sm'></div>";
									echo "<div class='col-sm'>";
										echo "<img src='".$imgnodata."' alt='' width='300' height='180' alt=''>";
									echo '</div>';
									echo "<div class='col-sm'></div>";
							echo '</div>';

							echo "<br>";
							
							echo "<div class='row'>";
								echo "<div class='col-sm'></div>";
								echo "<div class='col-sm'>";
									echo "<h4>".$msgnodata."</h4>";
								echo '</div>';
								echo "<div class='col-sm'></div>";
							echo '</div>';
							
						?>
			</div> <!--card body -->
		</div> <!-- flight_form -->
    </div> <!-- container--> 
	
</body>
</html>
<!DOCTYPE html>
<?php
include_once("../Controller/C_Flight.php");
$flight = new C_Flight;
$origin = $_POST['form1'];
$destination = $_POST['to1'];
$date = $_POST['date1'];
$amount = $_POST['amount1'];
$seat = $_POST['seat1']
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

	<link rel="stylesheet" href="../assets/css/ico.css">
	
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
			background-color:white
			
		}
		.jumbotron{
			box-shadow: 0px 0px 1px 1px rgba(50,50,50,.2);		
			background: rgba(255, 255, 255,1);
			padding-top : 10px;
			padding-bottom : 10px;
		}
		.flight_form{
			margin-top:20px;
		}
		.jumbotron:hover{
			border:solid 1px red;
		}
		

	</style>
</head>
<body >
    <div class="container">
		<div class="flight_form">
			
			<div class="row">
				<div class="col-5 offset-3">
					<h3><?php echo $origin.' <i class="far fa-arrow-alt-circle-right"></i> '.$destination;?></h3>
				</div>
			</div>

			<div class="row">
				<div class="col-5 offset-3">
					<h6><?php echo $date.' | '.$amount.' Adult | '.$seat;?></h6>
				</div>
				<div class="col-">
					<a href="home.php" class="btn btn-warning" >Change search</a>
				</div>
			</div>
			
			<hr style="border-width: 1px;border-style: inset;">
						
						<?php
							$msgnodata = "-- No data --";
							date_default_timezone_set('Asia/Bangkok');
							//$tmp1 = substr($date, 6); //year
							//$tmp2 = substr($date, 0,-8); //mount
							//$tmp3 = substr($date, 3,-5); //day
							//$newdate = $tmp1."-".$tmp3."-".$tmp2;

							$query = $flight->getFlight($origin,$destination,$date);
							if(count($query) > 0){
								$count = 1;
								while($darr = $query->fetch(PDO::FETCH_ASSOC)) {
									echo "<form method='post' action='' name='".$darr['ID_flight_detail']."'>";
									echo "<div class='row'>";
										echo "<div class='col'></div>";
										echo "<div class='col-10 jumbotron'>";
											echo "<div class='row'>";
												echo "<div class='col-3'";
													echo "<h2>".$darr['time_up']."</h2> ";
												echo "</div>";	
												echo "<div class='col-1'";
													echo "<h4><center><i class='fas fa-angle-double-right fa-lg'></i></center></h4>";
												echo "</div>";	
												echo "<div class='col-3'";
													echo "<h4>".$darr['time_down']."</h4>";
												echo "</div>";	
												echo "<div class='col-3 offset-1'";
													echo "<h4><center><i class='fas fa-dollar-sign'></i> Price ".$darr['price']." Bath.</center></h4>";
												echo "</div>";
												echo "<div class='col'></div>";
											echo "</div>";		
											echo "<div class='row'>";	
												echo "<div class='col-3'";
													echo "<h4>".$darr['o_airport_th'].' - '.$darr['o_airport']."</h4>";
												echo "</div>";	
												echo "<div class='col-3 offset-1'";
													echo "<h4>".$darr['d_airport_th'].' - '.$darr['d_airport']."</h4>";
												echo "</div>";
												echo "<div class='col-3 offset-1'>";
													echo "<input type='submit' class='btn btn-warning btn-block' value='Choose'> ";
												echo "</div>";	
												echo "<div class='col'></div>";
											echo "</div>";		
											echo "<br><a href='#'>Flight Detail</a>";
										echo "</div>  <!-- jumbo -->";
										echo "<div class='col'></div>";
									echo "</div> <!-- row -->";
									echo "</form>";			
									$count++;
									$msgnodata = "";
								}
							}
							echo "<div class='row'>";
								echo "<div class='col-12'";
									echo "<h2><center>".$msgnodata."</center></h2>";
								echo '</div>';
							echo '</div>';
						?>
		</div> <!-- flight_form -->
    </div> <!-- container--> 
</body>
</html>
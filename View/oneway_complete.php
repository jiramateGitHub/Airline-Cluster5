<?php 
session_start();
if($_SESSION['seat'] == NULL){
	header('location:home.php');
}

date_default_timezone_set('Asia/Bangkok');
include_once("../Controller/C_Bill.php");
$C_Bill = new C_Bill;
$id;
for($i=1;$i<=$_SESSION['amount'];$i++){
	$id = $_SESSION['id_customer_'.$i.''];
	if($_SESSION['seat'] == "Business"){
		$C_Bill->addBill($id,$_SESSION['price']+800);
	}else{
		$C_Bill->addBill($id,$_SESSION['price']);
	}
}

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
                <h6 class="font-weight-bold" >1.Search — 2.Booking — 3.Payment — <font color="blue">4.E-ticket issued</font></h6>
            </div>
        </div>
    </div>
</nav>
	
<div class="container">
    <div class="flight_form jumbotron">
        <center><h4>Payment Completed <?php echo date('Y-m-d:H:i:s') ?></h4></center>   
		<br> 
		<center><a href="home.php">กลับหน้าแรก</a></center>   
		<div class='row'>
			<div class='col-sm'></div>
			<div class='col-sm'>
				
			</div>
			<div class='col-sm'></div>
		</div>
    </div> <!-- flight_form -->
</div> <!-- container--> 

</body>
</html>
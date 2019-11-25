
<!DOCTYPE html>
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
		h6{
			color:#f97c00;
			font-weight: bold;
		}
		
		body{
			/* background-attachment:fixed; */
			background-image: url("../assets/img/banner-bg5.jpg");
			background-size:100%;
			background-position: center;
			height:740px;
			background-color:white
			
		}
		.rowhead{
			margin-bottom:20px;
		}
		.jumbotron{
			box-shadow: 1px 1px 1px 1px rgba(20,50,50,.5);		
			background: rgba(0, 0, 9,0.6);
			height:350px;
			padding-top:1px;	
			margin-top:170px;
			
		}
		

	</style>
</head>
<body >
<div class="bg">
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-2 jumbotron">
				<div class="row">
					<div class="col-4"></div>
					<div class="col-6">
						<a href="oneway.php" id="btn1">
						<div id="a" class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-red">
							<center><h6>One way</h6></center>
						</div>
						</a>
						<a href="return.php" id="btn2">
						<div id="b" class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">
							<center><h6>Return</h6></>
						</div>
						</a>
					</div> 
					<div class="col"></div>		
				</div>

				<br>

				<section id="content">
					<div id="container" class="w3-container flight" >
						<?php include_once('oneway.php');?>
					</div>
				</section>
			</div> <!-- jumbo -->
			<div class="col-md-6"></div>
		</div>
    </div> <!-- container--> 

</div>

<script src="../assets/js/jq-load-home.js"></script>
<script src="../assets/js/jquery-1.11.0.min.js"></script>
</body>
</html>
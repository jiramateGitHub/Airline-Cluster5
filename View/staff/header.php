<!DOCTYPE html>
<html>
<head>
    <title>Cluster5 - Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="../../assets/js/jquery-1.11.0.min.js"></script>
	<style>
		.container{
			margin-top:20px;
		}
		.btn-primary{
			margin-top:8px;
		}
		.jumbotron{
			box-shadow: 0px 0px 1px 1px rgba(50,50,50,.2);		
			background: rgba(250,255, 255,1);
			padding-top : 10px;
			padding-bottom : 10px;
			
			margin-left:190px;
			margin-right:190px;
		}
		tbody tr:hover{
			background-color: #f0f0f5
		}
		th:hover{
			cursor: pointer;
			background-color: #f0f0f5
			
		}
		
	</style>

<body>
<div class="container">
	<div class="row" >
		<div class="col-3" >
			<a class="navbar-brand" href="#">
				<img src="../../assets/img/cluster5.png" width="50" height="50"  alt="">
				Cluster 5 | Flight Management
			</a>
		</div>
		<div class="col-6 offset-3" >
			<a class="btn btn-primary" href="main.php" style="margin-right:10px;">HOME</a>
			<a class="btn btn-primary" href="add_flight.php" style="margin-right:10px;">Add Flight</a>
			<a class="btn btn-primary" href="add_flight_detail.php" style="margin-right:10px;">Add Flight Detail</a>
			<a class="btn btn-primary" href="update_ticket.php">Update Ticket</a>
			<!-- <a class="btn btn-primary" href="delete_flight.php">Edit Flight</a> -->
			<!-- <a class="btn btn-primary" href="delete_flight.php">Delete Flight</a> -->
		</div>
	</div>
</div>
<hr>
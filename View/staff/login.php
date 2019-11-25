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

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
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

<div class="clearfix"></div>
<div class="container">
	<div class="row">
		<div class="col offset-12">
		<CENTER><img src="../../assets/img/menu.png" alt="cluster5" width="300px" height="125px"></CENTER>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<CENTER><br></CENTER>
			<CENTER><br></CENTER>
			<CENTER><h3 class="form-signin-heading">Please sign in</h3></CENTER>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<br>
		</div>
		<div class="col-4">
			<form action = "main.php" class="form-signin" method="post">
				<h5>ID_Staff : </h5>
				<label for="inputEmail" class="sr-only">ID</label>
				<input type="text" name="ID_staff" class="form-control" placeholder="ID_staff" required autofocus><br>
				<h5>Password : </h5>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password" required><br>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
		</div>
	</div>
</div>
<br>
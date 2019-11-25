<?php
	include_once("../../Controller/C_Flight.php");
    $C_Flight = new C_Flight;
    $Flight_Detail = $C_Flight->getID_Flight_Detail($_GET['id']);
    $Flight_Detail = $Flight_Detail->fetch(PDO::FETCH_ASSOC);
    $Flight = $C_Flight->getID_Flight($Flight_Detail['ID_flight']);
    $Flight = $Flight->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['btn-save'])){
        $data = array(
            "ID_flight_detail" => $Flight_Detail['ID_flight_detail'],
            "time_up" => $_POST['time_up'],
            "time_down" => $_POST['time_down'],
            "date" => $_POST['date'],
            "price" => $_POST['price']
        );
        $C_Flight->updateFlightDetail($data);
        header('location:main.php');
    }
?>
<?php include('header.php');?>
<style>
	td button{
		margin-right:4px;
		weight:6px;
	}
	
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<div class="jumbotron">
<section id="content">
	<div class="container" id="container">
		<center><h2>แก้ไข</h2></center>
		<hr>
		<form method="post" action="edit_flight.php?id=<?php echo $_GET['id']?>">
            <div class="row">
                <div class="col-5 offset-1">
                    <label>Origin Province</label>
                    <input class="form-control" id="province1" name="province1" value="<?php echo $Flight['o_province']; ?>" disabled>
                </div>
                <div class="col-5">
                <label>Origin Airport</label>
                        <input class="form-control" id="airport1" name="airport1" value="<?php echo $Flight['o_airport_th'].' '.$Flight['o_airport']; ?>" disabled>
                               
                </div>
            </div>
            <br>
            <div class="row">   
                <div class="col-5 offset-1">
                    <div class="row">				
                        <div class="col-12">
                            <label>Destination Province</label>  
                            <input class="form-control" id="province2" name="province2" value="<?php echo $Flight['d_province']; ?>"disabled>
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="row">				
                        <div class="col-12">
                        <label>Destination Airport</label>
                            <input class="form-control" id= "airport2" name="airport2" value="<?php echo $Flight['d_airport_th'].' '.$Flight['d_airport']; ?>"disabled>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-5 offset-1">
                    <div class="row">				
                        <div class="col-6">
                            <label>เวลาออกจากต้นทาง</label>	 
                            <input required class="form-control" type="time" value="<?php echo $Flight_Detail['time_up'];?>" name="time_up">
                        </div>
                        <div class="col-6">
                            <label>เวลาถึงปลายทาง</label>
                            <input required class="form-control" type="time" value="<?php echo $Flight_Detail['time_down'];?>" name="time_down" >
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="row">				
                        <div class="col-6">
                            <label>วันที่</label>	 
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $Flight_Detail['date_time'];?>" required> 
                        </div>
                        <div class="col-6">
                            <label>ราคา</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $Flight_Detail['price'];?>"> 
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-1 offset-10">
                    <input name="btn-save" type="submit" class="btn btn-success" value="Save">
                </div>
            </div>
        </form>
	</div>
</section>
</div>
<?php include('footer.php');?>


	
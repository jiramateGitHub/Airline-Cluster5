<?php
    include('header.php');
    include_once("../../Controller/C_Flight.php");
    $flight = new C_Flight;
    if(isset($_POST['btn-save'])){
        $flight->addFlight($_POST['airport1'],$_POST['airport2']);
    }
?>
<div class="jumbotron">
<section id="content">
    <div class="container" id="container">
        <center><h4>Add Flight</h4></center>
        <hr>
        <form method="post" action="add_flight.php">
            <div class="row">
                <div class="col-5 offset-1">
                    <label>Origin</label>
                    <select class="form-control" id="province1" name="province1">
                        <option value="">เลือกจังหวัดต้นทาง</option>
                            <?php $flight->getProvince(1);?>
                    </select>
                </div>
                <div class="col-5">
                    <label>Destination</label>
                    <select class="form-control" id="province2" name="province2">
                        <option value="">เลือกจังหวัดปลายทาง</option>
                            <?php $flight->getProvince(1);?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-5 offset-1">
                    <div class="row">				
                        <div class="col-12">
                            <select class="form-control" id="airport1" name="airport1">
                              <option value="">เลือกสนามบิน</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="row">				
                        <div class="col-12">
                            <select class="form-control" id= "airport2" name="airport2">
                               <option value="">เลือกสนามบิน</option>
                            </select>
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
        <hr>
    </div>
</section>
</div>
<?php include('footer.php');?>
<script>
	$(function(){
		$("#province1").change(function(){
			var pid = $(this).val();
			$.get("select/show_airport.php",{province: pid},function(data){
                $("#airport1").children().remove().end();
                $("#airport1").children().end().append(data);
            });
		});
    });
    $(function(){
		$("#province2").change(function(){
			var pid = $(this).val();
			$.get("select/show_airport.php",{province: pid},function(data){
                $("#airport2").children().remove().end();
                $("#airport2").children().end().append(data);
            });
		});
	});
</script>

<div class="jumbotron">
    <?php 
    include_once('../../Controller/database.php');
    $db = Database::getInstance();
    $sql = "SELECT * FROM flight ORDER BY o_province,d_province;";
    $query = $db->prepare($sql);
    $query->execute();
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">จังหวัดที่ขึ้น</th>
                <th scope="col">สนามบินที่ขึ้น</th>
                <th scope="col"></th>
                <th scope="col">จังหวัดที่ลง</th>
                <th scope="col">สนามบินที่ลง</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row = $query->fetch(PDO::FETCH_ASSOC)){ 		
        echo "<tr>";
        echo "<td>".$row['o_province']."</td>";
        echo "<td>".$row['o_airport_th']."</td>"  ;
        echo "<td>  --->  </td>";
        echo "<td>".$row['d_province']."</td>"	;
        echo "<td>".$row['d_airport_th']."</td>";				
        echo "</tr>";
    } 
    ?>
</div>
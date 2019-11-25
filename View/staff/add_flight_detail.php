<?php
    include('header.php');
    include_once("../../Controller/C_Flight.php");
    $flight = new C_Flight;
    if(isset($_POST['btn-save'])){
        $data = array(
            "airport1" => $_POST['airport1'],
            "airport2" => $_POST['airport2'],
            "time_up" => $_POST['time_up'],
            "time_down" => $_POST['time_down'],
            "date" => $_POST['date'],
            "price" => $_POST['price']
        );
        $flight->addFlightDetail($data);
    }
?>
<div class="jumbotron">
<section id="content">
    <div class="container" id="container">
        <center><h4>Add Flight Detail</h4></center>
        <hr>
        <form method="post" action="add_flight_detail.php">
            <div class="row">
                <div class="col-5 offset-1">
                    <label>Origin Province</label>
                    <select class="form-control" id="province1" name="province1">
                        <option value="">เลือกจังหวัดต้นทาง</option>
                        <?php $flight->getProvince(2);?>
                    </select>
                </div>
                <div class="col-5">
                <label>Origin Airport</label>
                        <select class="form-control" id="airport1" name="airport1">
                               <option value="">เลือกสนามบิน</option>
                        </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-5 offset-1">
                    <div class="row">				
                        <div class="col-12">
                            <label>Destination Province</label>  
                            <select class="form-control" id="province2" name="province2">
                                <option value="">เลือกจังหวัดปลายทาง</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="row">				
                        <div class="col-12">
                        <label>Destination Airport</label>
                            <select class="form-control" id= "airport2" name="airport2">
                                <option value="">เลือกสนามบิน</option>
                            </select>
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
                            <input required class="form-control" type="time" value="00:00" name="time_up">
                        </div>
                        <div class="col-6">
                            <label>เวลาถึงปลายทาง</label>
                            <input required class="form-control" type="time" value="00:00" name="time_down" >
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="row">				
                        <div class="col-6">
                            <label>วันที่</label>	 
                            <input type="date" class="form-control" id="date" name="date" placeholder="ตัวอย่าง 2018-12-12" required> 
                        </div>
                        <div class="col-6">
                            <label>ราคา</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="ระบุราคา"> 
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
            var type = 1;
			$.get("select/show_flight.php",{province: pid,type: type},function(data){
                $("#airport1").children().remove().end();
                $("#airport1").children().end().append(data);
                $("#province2").children().remove().end();
                $("#province2").children().end().append('<option value="">เลือกจังหวัดปลายทาง</option>');
                $("#airport2").children().remove().end();
                $("#airport2").children().end().append('<option value="">เลือกสนามบิน</option>');
            });
		});
    });
    $(function(){
		$("#airport1").change(function(){
            var pid = $(this).val();
            var type = 2;
			$.get("select/show_flight.php",{airport: pid,type: type},function(data){
                $("#province2").children().remove().end();
                $("#province2").children().end().append(data);
            });
		});
    });
    $(function(){
		$("#province2").change(function(){
			var pid = $(this).val();
            var type = 3;
            $.get("select/show_flight.php",{province: pid,type: type},function(data){
                $("#airport2").children().remove().end();
                $("#airport2").children().end().append(data);
            });
		});
    });

</script>
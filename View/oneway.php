<?php
include_once("../Controller/C_Flight.php");
$flight = new C_Flight;
?>

<section id="content">
	<div id="container" class="w3-container flight" >
        <form  method="POST" action="oneway_search.php">
            <div class="row">
                <div class="col"></div>
                <div class="col-3">
                    <h6><i class="fas fa-plane-departure fa-lg"></i> Flying From</h6>
                    <select class="form-control plane-departure" id="oneway_start"  name="form1">
                        <option value="">เลือกต้นทาง</option>
                        <?php echo $flight->getProvince(1); ?>
                    </select>	
                </div>
                <div class="col-3">
                    <h6><i class="fas fa-plane-arrival fa-lg"></i> Flying To</h6>
                    <select  class="form-control" id="oneway_last"  name="to1">
                        <option value="">เลือกปลายทาง</option>
                        <?php $flight->getProvince(1); ?>
                    </select>
                </div>
                <div class="col-3 ">
                    <h6><i class="fas fa-users fa-lg"></i> No. of Passengers</h6>
                    <select class="form-control" id="start" name="amount1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col"></div>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col-3 ">
                <h6><i class="far fa-calendar-alt fa-lg"></i> Departure Date</h6>
                    <input type="date" class="form-control" placeholder="วันที่ออกเดินทาง" name="date1" required>
                </div>
                <div class="col-3 offset-3">
                    <h6><i class="fas fa-chair fa-lg"></i> Seat Class</h6>
                    <select class="form-control" id="start" name="seat1">
                        <option>Economy</option>
                        <option>Business </option>
                    </select>
                </div>
                <div class="col"></div>				
            </div>

            <br>
            
            <div class="row ">
                <div class="col"></div>	
                <div class="col-9">
                    <button type="submit" class="btn btn-warning btn-block text-body" name="search1" style="weight:20px"><i class="fas fa-search"></i> Search Flights</button>
                </div>	
                <div class="col"></div>	
            </div>
        </form>
     </div>
</section>
<script src="../assets/js/jq-load-home.js"></script>
<script src="../assets/js/jquery-1.11.0.min.js"></script>
<?php include('header.php');?>
<?php
	include_once("/Controller/c_main.php");
	$flight = new c_main;
?>
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
		<center><h2>จัดการเที่ยวบิน</h2></center>
		<hr>
		<div class="row">
			<table class="table sortable" >
				<thead>
					<tr>
						<th data-sort="number" scope="col">ลำดับ</th>
						<th data-sort="name" scope="col">สถานที่ขึ้น</th>
						<th data-sort="name" scope="col">สถานที่ลง</th>
						<th data-sort="name" scope="col">เวลาขึ้น</th>
						<th data-sort="duration"scope="col">เวลาลง</th>
						<th data-sort="date" scope="col">วันที่</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$row = $flight->getFlight_Detail();
						$i = 1;
						while($r = $row->fetch(PDO::FETCH_ASSOC)){
							echo "<tr>";
								echo "<td>".$i."</td>";
								echo "<td>".$r['o_province'].' - '.$r['o_airport']."</td>";
								echo "<td>".$r['d_province'].' - '.$r['d_airport']."</td>";
								echo "<td>".$r['time_up']."</td>";
								echo "<td>".$r['time_down']."</td>";
								echo "<td>".$r['date_time']."</td>";
								echo "<td><a href='edit_flight.php?id=".$r['ID_flight_detail']."' role='button' class='btn btn-warning '><i class='fas fa-edit'></i></a>";
								echo '&nbsp;';
								echo "<button onclick=\"set_delete(" . $r['ID_flight_detail'] . ")\" data-toggle='modal' data-target='#delete' type='button' class='btn btn-danger'><i class='far fa-trash-alt'></i></button></td>";
							echo "</tr>";
							$i++;
						}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">ต้องการลบหรือไม่</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-footer">
				<form method="post" action="delete_flight.php">
                    <input type="hidden" id="id_delete" name="delete_id" >
                    <button name="del-btn" type="submit" class="btn btn-primary")>ยืนยัน</button>
					<button type="button" class="btn btn-primary"data-dismiss="modal">ปิด</button>
                </form>		
			</div>
			</div>
		</div>
	</div>
</section>
</div>
<?php include('footer.php');?>
<script>
	function set_delete(id){
	 	document.getElementById("id_delete").value = id;
	}
</script>

	
<?php include('header.php');?>
<?php
    include_once("../../Controller/C_Reserve.php");
    include_once("../../Controller/C_Bill.php");
    $C_Bill = new C_Bill;
    $C_Reserve = new C_Reserve;
    
    if(isset($_POST['del-btn'])){
        $C_Bill->updateBill($_POST['update_id']);
    }
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
		<center><h2>อัพเดทตั๋ว</h2></center>
		<hr>
		<div class="row">
			<table class="table sortable" >
				<thead>
					<tr>
						<th data-sort="number" scope="col">ลำดับ</th>
						<th data-sort="name" scope="col">ชื่อ - นามสกุล</th>
						<th data-sort="name" scope="col">ช่องทางติดต่อ</th>
						<th data-sort="dare" scope="col">เวลาที่จอง</th>
						<th data-sort="number"scope="col">รหัสใบจอง</th>
						<th data-sort="number" scope="col">รหัสเที่ยวบิน</th>
                        <th data-sort="name" scope="col">สถานะตั๋ว</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$row = $C_Reserve->getReserve();
                        $i = 1;
                        
						while($r = $row->fetch(PDO::FETCH_ASSOC)){
                            $date = substr($r['date_book'],0,10);
                            $time = substr($r['date_book'],11,10);
							echo "<tr>";
								echo "<td>".$i."</td>";
								echo "<td>".$r['fname'].' - '.$r['lname']."</td>";
								echo "<td>".$r['phone'].' <br> '.$r['email']."</td>";
								echo "<td>".$date.'<br>'.$time."</td>";
								echo "<td>".$r['ID_reserve']."</td>";
                                echo "<td>".$r['ID_flight_detail']."</td>";
                                if($r['status'] == 0 ){
                                    echo "<td class='font-weight-bold' style='color:red;' >ยังไม่รับ</td>";
                                }else{
                                    echo "<td class='font-weight-bold' style='color:green;'>รับ</td>";
                                }
								echo "<td>";
								echo "<button onclick=\"set_update(" . $r['ID_reserve'] . ")\" data-toggle='modal' data-target='#delete' type='button' class='btn btn-danger'><i class='fas fa-edit'></i></button></td>";
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
				<h5 class="modal-title" id="exampleModalLabel">ต้องการอัพเดทสถานะตั๋วหรือไม่</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-footer">
				<form method="post" action="update_ticket.php">
                    <input type="hidden" id="id_update" name="update_id" >
                    <button name="del-btn" type="submit" class="btn btn-primary">ยืนยัน</button>
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
	function set_update(id){
	 	document.getElementById("id_update").value = id;
	}
</script>

	
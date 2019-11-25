<?php
include_once("../../Controller/C_Flight.php");
$C_Flight = new C_Flight;
if(isset($_POST['del-btn'])){
    $C_Flight->deleteFlight($_POST['delete_id']);
    header('location:main.php');
}
?>
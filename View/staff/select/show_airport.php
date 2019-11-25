<?php
$pro = $_GET['province'];
require_once('../../../Controller/database.php');
$db = Database::getInstance();
$sql = "SELECT * FROM airport WHERE province = '$pro'";
$query = $db->prepare($sql);
$query->execute();
$strOption = null;
while($row=$query->fetch(PDO::FETCH_ASSOC)){
    $strOption.='<option value='.$row['ID_airport'].'>'.$row['airport'].' - '.$row['airport_th'].'</option>';
}
echo $strOption;
?>
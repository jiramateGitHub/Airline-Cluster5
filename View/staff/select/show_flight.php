<?php
require_once('../../../Controller/database.php');
$db = Database::getInstance();
$type = $_GET['type'];
if($type == 1){
    $pro = $_GET['province'];
    $sql = "SELECT DISTINCT o_province,o_airport,o_airport,o_airport_th FROM flight WHERE o_province = '$pro'";
    $query = $db->prepare($sql);
    $query->execute();
    $strOption = null;
    $strOption .="<option value=''>เลือกสนามบิน</option>";
    while($row=$query->fetch(PDO::FETCH_ASSOC)){
        $strOption.='<option value='.$row['o_airport'].'>'.$row['o_airport'].' - '.$row['o_airport_th'].'</option>';
    }
    echo $strOption;
}else if($type == 2){
    $pro = $_GET['airport'];
    $sql = "SELECT DISTINCT o_airport,d_province,d_province  FROM flight WHERE o_airport = '$pro'";
    $query = $db->prepare($sql);
    $query->execute();
    $strOption = null;  
    $strOption .="<option value=''>เลือกจังหวัดปลายทาง</option>";
    while($row=$query->fetch(PDO::FETCH_ASSOC)){
        $strOption.='<option value='.$row['d_province'].'>'.$row['d_province'].'</option>';
    }
    echo $strOption;
}else if($type == 3){
    $pro = $_GET['province'];
    $sql = "SELECT DISTINCT d_province,d_airport,d_airport,d_airport_th FROM flight WHERE d_province = '$pro'";
    $query = $db->prepare($sql);
    $query->execute();
    $strOption = null;
    $strOption .="<option value=''>เลือกสนามบิน</option>";
    while($row=$query->fetch(PDO::FETCH_ASSOC)){
        $strOption.='<option value='.$row['d_airport'].'>'.$row['d_airport'].' - '.$row['d_airport_th'].'</option>';
    }
    echo $strOption;
}
?>
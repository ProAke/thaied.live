<?php
date_default_timezone_set('Asia/Bangkok');
include_once("include/config.inc.php");
$tb1 = 'tb_mail_new26';

$folder='26082564';
$sql = "SELECT * FROM `".$tb1."`";
$query = $conn->query($sql) or die($conn->error);
$i=0;
while($line = $query->fetch_assoc())
{




    if (filter_var($line['email'], FILTER_VALIDATE_EMAIL)) {
        //ถูกต้อง
    } else {
        echo $line['no']." - '".$line['email']."' ไม่ถูกต้อง.<br>";
    }
   //$send_stamp = date('Y-m-d H:i:s');
   
/*

if($line['status']==1){

    $sql2 = "UPDATE `".$tb1."` SET stamp_regis='".$line['stamp_regis']."', deliveryby='".$deliveryby."',status='".$line['status']."', status_json='".$line['status_json']."' WHERE no=".$line['no'];
}else{

    $sql2 = "UPDATE `".$tb1."` SET stamp_regis='".$line['stamp_regis']."', status='".$line['status']."', status_json='".$line['status_json']."' WHERE  no=".$line['no'];


}

if ($conn->query($sql2) === TRUE) {
    echo $line['no']."-".$line['fullname']."-".$line['status_json']."<br>";
}

*/
}
?>
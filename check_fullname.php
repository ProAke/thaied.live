<?php
date_default_timezone_set('Asia/Bangkok');
include_once("include/config.inc.php");

$tb1 = 'tb_mail_new27_resend';

$folder="../cer/".$_GET['fd'];
$from ="2021-09-10";
$to = "2021-09-13";



$sql0 = "SELECT * FROM `".$tb1."` WHERE (`status`='1') AND  `send_stamp` between '".$from."' AND '".$to."'";
$query0 = $conn->query($sql0) or die($conn->error);
$total = $query0->num_rows;
$total = number_format($total);

$start = $_GET['start'];
$end  = $_GET['end'];

if($start==""){

$start=10;
$end = 45000;
}
$mlike =$_GET['f'];

$sql = "SELECT * FROM `".$tb1."` WHERE `fullname` LIKE '%".$mlike."%' AND (`status`='1') AND  `send_stamp` between '".$from."' AND '".$to."' LIMIT ".$start.",".$end;
$query = $conn->query($sql) or die($conn->error);


$i=0;
while($line = $query->fetch_assoc())
{

    $i++;
echo $line['no']." - ".$line['fullname']."<br>";

/*
    if (filter_var($line['email'], FILTER_VALIDATE_EMAIL)) {
        //ถูกต้อง
    } else {
        echo $line['no']." - '".$line['email']."' ไม่ถูกต้อง.<br>";
    }
   //$send_stamp = date('Y-m-d H:i:s');
*/   
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


if($i==0){

    echo "ไม่มีข้อมูลที่ค้นหา =".$mlike;
}

?>
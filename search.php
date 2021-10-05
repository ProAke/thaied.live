<?php 

include_once("include/config.inc.php");



$email = $_GET['email'];


//-----------------------------
$sqla = "SELECT * FROM `tb_mail_new26_resend` WHERE `email`='".$email."'";
$querya = $conn->query($sqla) or die($conn->error);
$totala = $querya->num_rows;


$sqlb = "SELECT * FROM `tb_mail_new27_resend` WHERE `email`='".$email."'";
$queryb = $conn->query($sqlb) or die($conn->error);
$totalb = $queryb->num_rows;

// เทียบส่ง fail01
//-----------------------------
$sql1 = "SELECT * FROM `tb_mail_sendnew` WHERE `email`='".$email."'";
$query1 = $conn->query($sql1) or die($conn->error);
$total1 = $query1->num_rows;


//------------------------------
$sql2 = "SELECT * FROM `tb_mail_sendnew_02` WHERE `email`='".$email."'";
$query2 = $conn->query($sql2) or die($conn->error);
$total2 = $query2->num_rows;

//------------------------------
$sql3 = "SELECT * FROM `tb_mail_sendnew_03` WHERE `email`='".$email."'";
$query3 = $conn->query($sql3) or die($conn->error);
$total3 = $query3->num_rows;
//------------------------------
$sql4 = "SELECT * FROM `tb_mail_sendnew_04` WHERE `email`='".$email."'";
$query4 = $conn->query($sql4) or die($conn->error);
$total4 = $query4->num_rows;
//------------------------------
$sql5 = "SELECT * FROM `tb_mail_sendnew_05` WHERE `email`='".$email."'";
$query5 = $conn->query($sql5) or die($conn->error);
$total5 = $query5->num_rows;
//------------------------------
$sql6 = "SELECT * FROM `tb_mail_sendnew_06` WHERE `email`='".$email."'";
$query6 = $conn->query($sql6) or die($conn->error);
$total6 = $query6->num_rows;
//------------------------------
$sql7 = "SELECT * FROM `tb_mail_sendnew_07` WHERE `email`='".$email."'";
$query7 = $conn->query($sql7) or die($conn->error);
$total7 = $query7->num_rows;
//------------------------------
$sql8 = "SELECT * FROM `tb_mail_sendnew_08` WHERE `email`='".$email."'";
$query8 = $conn->query($sql8) or die($conn->error);
$total8 = $query8->num_rows;
//------------------------------
$sql9 = "SELECT * FROM `tb_mail_sendnew_09` WHERE `email`='".$email."'";
$query9 = $conn->query($sql9) or die($conn->error);
$total9 = $query9->num_rows;
//------------------------------
$sql10 = "SELECT * FROM `tb_mail_sendnew_10` WHERE `email`='".$email."'";
$query10 = $conn->query($sql10) or die($conn->error);
$total10 = $query10->num_rows;
//------------------------------


if($totala>0){
    $linea = $querya->fetch_assoc();
    $no             = $linea['no'];
    $fullname       = $linea['fullname'];
    $status_json    = $linea['status_json'];
    echo "<br>ตรวจพบ วันที่ 26  : ".$no."-".$fullname."-".$email."-".$status_json;
}

if($totalb>0){
    $lineb = $queryb->fetch_assoc();
    $no             = $lineb['no'];
    $fullname       = $lineb['fullname'];
    $status_json    = $lineb['status_json'];    
    echo "<br>ตรวจพบ วันที่ 27  : ".$no."-".$fullname."-".$email."-".$status_json;
}
if($total1>0){
    $line1 = $query1->fetch_assoc();
    $no             = $line1['no'];
    $fullname       = $line1['fullname'];
    $status_json    = $line1['status_json'];    
    echo "<br>ตรวจพบส่่งซ้ำ 1 : ".$no."-".$fullname."-".$email."-".$status_json;
}
if($total2>0){
    $line2 = $query2->fetch_assoc();
    $no             = $line2['no'];
    $fullname       = $line2['fullname'];
    $status_json    = $line2['status_json'];       
    echo "<br>ตรวจพบส่่งซ้ำ 2 : ".$$no."-".$fullname."-".$email."-".$status_json;
}
if($total3>0){
    $line3 = $query3->fetch_assoc();
    $no             = $line3['no'];
    $fullname       = $line3['fullname'];
    $status_json    = $line3['status_json'];   
    echo "<br>ตรวจพบส่่งซ้ำ 3 : ".$no."-".$fullname."-".$email."-".$status_json;
}
if($total4>0){
    $line4 = $query4->fetch_assoc();    
    $no             = $line4['no'];
    $fullname       = $line4['fullname'];
    $status_json    = $line4['status_json'];   
    echo "<br>ตรวจพบส่่งซ้ำ 4 : ".$$no."-".$fullname."-".$email."-".$status_json;
}
if($total5>0){
    $line5 = $query5->fetch_assoc();    
    $no             = $line5['no'];
    $fullname       = $line5['fullname'];
    $status_json    = $line5['status_json'];   
    echo "<br>ตรวจพบส่่งซ้ำ 5 : ".$$no."-".$fullname."-".$email."-".$status_json;
}
if($total6>0){
    $line6 = $query6->fetch_assoc();    
    $no             = $line6['no'];
    $fullname       = $line6['fullname'];
    $status_json    = $line6['status_json'];   
    echo "<br>ตรวจพบส่่งซ้ำ 6 : ".$no."-".$fullname."-".$email."-".$status_json;
}
if($total7>0){
    $line7 = $query7->fetch_assoc();    
    $no             = $line7['no'];
    $fullname       = $line7['fullname'];
    $status_json    = $line7['status_json'];   
    echo "<br>ตรวจพบส่่งซ้ำ 7 : ".$no."-".$fullname."-".$email."-".$status_json;
}
if($total8>0){
    $line8 = $query8->fetch_assoc();    
    $no             = $line8['no'];
    $fullname       = $line8['fullname'];
    $status_json    = $line8['status_json'];   
    echo "<br>ตรวจพบส่่งซ้ำ 8 : ".$$no."-".$fullname."-".$email."-".$status_json;
}
if($total9>0){
    $line9 = $query9->fetch_assoc();    
    $no             = $line9['no'];
    $fullname       = $line9['fullname'];
    $status_json    = $line9['status_json'];   
    echo "<br>ตรวจพบส่่งซ้ำ 9 : ".$no."-".$fullname."-".$email."-".$status_json;
}
if($total10>0){
    $line10 = $query10->fetch_assoc();
    $no             = $line10['no'];
    $fullname       = $line10['fullname'];
    $status_json    = $line10['status_json'];   
    echo "<br>ตรวจพบส่่งซ้ำ 10 : ".$no."-".$fullname."-".$email."-".$status_json;
}

?>
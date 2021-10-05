<?php 

include_once("include/config.inc.php");


//if($_GET['day']=="26"){ $tb1 = 'tb_mail_new26';}
//if($_GET['day']=="27"){ $tb1 = 'tb_mail_new27';}
//$tb1 = 'tb_mail_new27';


$tb1 = 'tb_mail_new26_resend';

$folder="../cer/".$_GET['fd'];
$from ="2021-09-10";
$to = "2021-09-13";

$sql = "SELECT * FROM `".$tb1."` WHERE (`status`='1') AND  `send_stamp` between '".$from."' AND '".$to."'";
$query = $conn->query($sql) or die($conn->error);
$i=0;
while($line = $query->fetch_assoc())
{
$i++;



$email = $line['email'];

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

$sum = $total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9;

if($sum>0){
    $sql10 = "UPDATE `".$tb1."` SET result='1' WHERE id=".$line['id'];
    if ($conn->query($sql10) === TRUE) {
        echo $line['no']."-".$fullname."-อัพเดท<br>\n";
    }

}else{
        echo $line['no']."-".$fullname."-สำเร็จ<br>\n";
}




}



?>
<?php 

include_once("include/config.inc.php");


//if($_GET['day']=="26"){ $tb1 = 'tb_mail_new26';}
//if($_GET['day']=="27"){ $tb1 = 'tb_mail_new27';}
//$tb1 = 'tb_mail_new27';


$tb1 = 'tb_mail_new27_resend';

$folder="../cer/".$_GET['fd'];
$from ="2021-09-10";
$to = "2021-09-13";

$sql = "SELECT * FROM `".$tb1."` WHERE (`status`='1') AND  `send_stamp` between '".$from."' AND '".$to."'";
$query = $conn->query($sql) or die($conn->error);
$total = $query->num_rows;

echo "มีทั้งหมด". $total."คน ดังมีรายชื่อตามนี้ \n<br>";
$i=0;
while($line = $query->fetch_assoc())
{
$i++;
echo $i."-".$line['fullname']."-ผลการส่ง- ".$line['result']."<br>\n";



}



?>
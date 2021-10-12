
<?php error_reporting (E_ALL ^ E_NOTICE);
/*****************************************************************
Created		: 15/06/2020
Author		: JIE'software 
E-mail		: worapot@yahoo.com
server		: www.vpslive.com
PHP Version : 7++
Copyright (C) 2021, VPS Live  , all rights reserved.
*****************************************************************/
date_default_timezone_set('Asia/Bangkok');
include_once("include/config.inc.php");
$tb0 = 'tb_mail_new26_autocrat';
$sql0 = "SELECT * FROM `".$tb0."`";
$query0 = $conn->query($sql0) or die($conn->error);
$i=0;
while($line0 = $query0->fetch_assoc())
{


/*
$tb1 = 'tb_mail_new26';
$folder='26082564';
$sql = "SELECT * FROM `".$tb1."` WHERE (`status`='1') AND (no>= 72636) AND (no<= 72682)";
$query = $conn->query($sql) or die($conn->error);
$i=0;
while($line = $query->fetch_assoc())
{

   $deliveryby ='taximail';
   $send_stamp = date('Y-m-d H:i:s');
   echo $line['no']."-".$line['fullname']."-".$line['status_json']."<br>";



   $sql2 = "UPDATE `".$tb1."` SET active='4' WHERE id=".$line['id'];
if ($conn->query($sql2) === TRUE) {
    
}
*/

}
?>
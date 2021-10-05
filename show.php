<?php 

include_once("include/config.inc.php");


$tb1 = 'tb_mail_new26_resend';
$folder='26082564';

$from ="2021-09-10";
$to = "2021-09-13";

$sql = "SELECT * FROM `".$tb1."` WHERE (`status`='1') AND (`result`!='1') AND `send_stamp` between '".$from."' AND '".$to."'";
//$sql = "SELECT * FROM `".$tb1."` WHERE (`active`='1') AND (`status`='0') AND (no>= ".$_GET['start'].") AND (no<= ".$_GET['end'].")";

$query = $conn->query($sql) or die($conn->error);
$total = $query->num_rows;

    $i=0;
   while($line = $query->fetch_assoc())
    {

        echo $line['no']."-".$fullname."-result==>".$line['result']."<br>\n";

}



?>
<?php
date_default_timezone_set('Asia/Bangkok');
include_once("include/config.inc.php");

$tb1 = 'tb_mail_new26';
$sql = "SELECT * FROM `".$tb1."` WHERE (`active`='0') AND (no>= ".$_GET['start'].") AND (no<= ".$_GET['end'].")";
$query = $conn->query($sql) or die($conn->error);

?>

<?php
while($line = $query->fetch_assoc())
{

if(($line['subtitle']=="") || ($line['fname']=="") || ($line['lname']==""))  {

echo $line['no'].$line['fullname']."<br>";

}else{

   // echo $line['no'].$line['fullname']."<br>";
}





/*
$fullname = trim($line['fullname']);
$sql2 = "UPDATE `".$tb1."` SET fullname='".$fullname."' WHERE id=".$line['id'];
if ($conn->query($sql2) === TRUE) {
    echo $line['no']."-".$line['fullname']."- อัพเดท<br>";
}
*/


//$send_stamp = date('Y-m-d H:i:s');
 
/*
$sql2 = "UPDATE `".$tb1."` SET send_stamp='".$line['send_stamp']."', deliveryby='".$line['deliveryby']."', status='".$line['status']."', status_json='".$line['status_json']."' WHERE no=".$line['no'];

if ($conn->query($sql2) === TRUE) {
    echo $line['no']."-".$line['fullname']."-".$line['status_json']."<br>";
}


$sql2 = "UPDATE `".$tb1."` SET active='4' WHERE no=".$line['no'];

if ($conn->query($sql2) === TRUE) {
    echo $line['no']."-".$line['fullname']<br>";
}

*/
}
?>

</tbody>
                    </table>



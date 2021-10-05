<?php
date_default_timezone_set('Asia/Bangkok');
include_once("include/config.inc.php");

$tb1 = 'tb_mail_new27';
//if($_GET['day']=='26'){$tb1 = 'tb_mail_new26';}


//$sql = "SELECT * FROM `".$tb1."` WHERE (`active`='0') AND (no>= ".$_GET['start'].") AND (no<= ".$_GET['end'].")";
$sql = "SELECT * FROM `".$tb1."` WHERE `status`='0'";
$query = $conn->query($sql) or die($conn->error);

?>
<style>
    table {
  border: 1px solid black;
}
th, td {
  border-bottom: 1px solid #ddd;
}
</style>
<table>
                      <thead>
                        <tr>
                          <th>ลำดับ </th>
                          <th>ชื่อ-สกุล</th>
                          <th>คำนำหน้า</th>
                          <th>ชื่อ</th>
                          <th>สกุล</th>
                          <th>ln1</th>
                          <th>ln1</th>
                          <th>active</th>                             
                          <th>สถานะ</th>                          
                        </tr>
                      </thead>
                      <tbody>

<?php
while($line = $query->fetch_assoc())
{

if(($line['subtitle']=="") || ($line['fname']=="") || ($line['lname']=="") || ($line['ln1']!="") || ($line['ln2']!=""))  {

echo "

<tr>
                   
<td><span>".$line['no']."</span></td>
<td>". $line['fullname']."</td>
<td>". $line['subtitle']."</td>
<td>". $line['fname']."</td>
<td>". $line['lname']."</td>
<td>". $line['ln1']."</td>
<td>". $line['ln2']."</td>
<td>". $line['active']."</td>
<td>". $line['status']."</td>

</tr>
";




}









}
?>

</tbody>
 </table>
                    



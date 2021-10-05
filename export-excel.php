<?php
date_default_timezone_set('Asia/Bangkok');
include_once("include/config.inc.php");

if($_GET['day']=='27082564'){$tb1 = 'tb_mail_new27';}
if($_GET['day']=='26082564'){$tb1 = 'tb_mail_new26';}

//$sql = "SELECT * FROM `".$tb1."` WHERE (no>= ".$_GET['start'].") AND (no<= ".$_GET['end'].")";
$sql = "SELECT * FROM `tb_mail_new26_resend` WHERE (`status_json` LIKE '%2021-09-25%') OR (`status_json` LIKE '%2021-09-26%') ";


//$sql = "SELECT * FROM `".$tb1."`";
$query = $conn->query($sql) or die($conn->error);

?>






<?php
//คำสั่ง connect db เขียนเพิ่มเองนะ


$file = $_GET['day'].".xls";


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Excel</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
<body>


<table>
  <tr>
    <td>No.</td>
    <td>ชื่อ-สกุล</td>
    <td>อีเมล</td>
    <td>Note</td>
    <td>pdf</td>   
    <td>สถานะข้อมูล</td>    
    <td>ส่งโดย</td>
    <td>สถานะการส่ง</td>
    <td>เวลาส่ง</td>
    <td>ข้อมูลส่ง</td>


  </tr>
  <?php
while($line = $query->fetch_assoc())
{


	  $no = $line['no'];
	  $fullname = $line['fullname'];
      $email = $line['email'];
	  $active1 = $line['active'];
      $pdf = $line['pdf'];
      $note = $line['note'];
      $deliveryby = $line['deliveryby'];

      if($active1=='0'){$active='รอ';}
      if($active1=='1'){$active='พร้อม';}
      if($active1=='2'){$active='ข้อมูลไม่ครบ';}
      if($active1=='3'){$active='ข้อมูลมีปัญหา';}     
      if($active1=='4'){$active='ข้อมูลมีปัญหา';}

	  $status1 = $line['status'];
      if($status1=='0'){$status='ไม่ส่ง';}
      if($status1=='1'){$status='ส่งแล้ว';}
      if($status1=='2'){$status='มีปัญหาส่ง';}      
      if($status1=='3'){$status='มีปัญหาส่ง';}            
      if($status1=='4'){$status='มีปัญหาส่ง';}            


	  $send_stamp= $line['send_stamp'];      
      $status_json = $line['status_json'];  

	  echo '<tr>
				<td>'.$no.'</td>
				<td>'.$fullname.'</td>
				<td>'.$email.'</td>              
                <td>'.$note.'</td>
				<td>'.$pdf.'</td>
                <td>'.$active.'</td>    
                <td>'.$deliveryby.'</td>                
                
				<td>'.$status.'</td>
                <td>'.$send_stamp.'</td>                             
				<td>'.$status_json.'</td>
                </tr>';

}                
  ?>
</table>


</body>
</html>
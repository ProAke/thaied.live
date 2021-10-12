
<?php
date_default_timezone_set('Asia/Bangkok');
include_once("../include/config.inc.php");


require 'vendor/autoload.php';
use Mailgun\Mailgun;

$tb1 = 'tb_mail_new27';
$folder='27082564';
$sql = "SELECT * FROM `".$tb1."` WHERE (`active`='1') AND (`status`='0') AND (no>= ".$_GET['start'].") AND (no<= ".$_GET['end'].")";

$query = $conn->query($sql) or die($conn->error);
$total = $query->num_rows;

    $i=0;
   while($line = $query->fetch_assoc())
    {
 if (filter_var($line['email'], FILTER_VALIDATE_EMAIL)) {

$email = $line['email'];
$mg = Mailgun::create('33a3713cd81d8e8cb2918c07139d8ad7-a3c55839-8b773a8f'); // For US servers
$domain = "mg.thaied.live";
$params = array(
  'from'    => 'Education Services <services@thaied.live>',
  'to'      => ''.$line['email'].'',
  'subject' => 'เกียรติบัตรการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16',
  'text'    => 'ขอบคุณสำหรับการร่วมแสดงความคิดเห็น
  สำนักงานเลขาธิการสภาการศึกษา ขอมอบเกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่าท่านได้เข้าร่วมการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16
  นวัตกรรมการศึกษา : กล้าเปลี่ยน สร้างสรรค์ ยกระดับคุณภาพการศึกษาไทย ระหว่างวันที่ 26-27 สิงหาคม พ.ศ. 2564',
  'html'    => '<html><head></head><body>ขอบคุณสำหรับการร่วมแสดงความคิดเห็น<br><br>
  สำนักงานเลขาธิการสภาการศึกษา ขอมอบเกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่าท่านได้เข้าร่วมการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16<br>
  นวัตกรรมการศึกษา : กล้าเปลี่ยน สร้างสรรค์ ยกระดับคุณภาพการศึกษาไทย ระหว่างวันที่ 26-27 สิงหาคม พ.ศ. 2564</body></html>',
  'attachment' => array(
              array(
                  'filePath' => '../cer/'.$folder.'/'.$line['pdf']
            )
        )
    );

# Make the call to the client.
try {

    $mg->messages()->send($domain, $params);
    $deliveryby ='mailgun';
    $send_stamp = date('Y-m-d H:i:s');
    $status_json= "Emails Sent: [To: ".$line['email']."] Delivery API run on mailgun; Timestamp: ".$send_stamp;
    $status =1;
    $sql2 = "UPDATE `".$tb1."` SET deliveryby='".$deliveryby."', send_stamp='".$send_stamp."', status='".$status."', status_json='".$status_json."' WHERE id=".$line['id'];
   if ($conn->query($sql2) === TRUE) {
        echo $line['no']."-".$line['fullname']."-".$status_json."<br>"; 
        $email ="";
        }
   //echo "Message has been sent successfully";
} catch (Exception $e) {
    echo $line['no']."-".$line['fullname']."- ไม่สามารถส่งได้ <br>"; 
}
/////////////////////////
} else {
    //ไม่ถูกต้อง  
    $status_json= "!!Error Emails To: ".$line['email']." is considered invalid.".$send_stamp;
    $status=3;
    $sql2 = "UPDATE `".$tb1."` SET deliveryby='".$deliveryby."', send_stamp='".$send_stamp."', status='".$status."', status_json='".$status_json."' WHERE id=".$line['id'];
    if ($conn->query($sql2) === TRUE) {
        echo $line['no']."-".$line['fullname']."-".$status_json."<br>"; 
        }
}
/////////////////////////
}

if($total>1) {
    echo "ข้อมูลระหว่าง".$_GET['start']." - ".$_GET['end'] .": ". $total;
}else{
    echo "ข้อมูลระหว่าง".$_GET['start']." - ".$_GET['end'] .": ". $total." ไม่มีข้อมูล";

}

?>
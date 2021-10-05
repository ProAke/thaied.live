<?php
date_default_timezone_set('Asia/Bangkok');
include_once("../include/config.inc.php");



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;                               
$mail->isSMTP();            
$mail->Host = "thaied.live";
$mail->SMTPAuth = true;                          
$mail->Username = "services@thaied.live";                 
$mail->Password = "!QJj392536789";                            
$mail->SMTPSecure = "ssl";                           
$mail->Port = 465;                                   
$mail->From = "services@thaied.live";
$mail->FromName = "Education Services";
$mail->isHTML(true);
$mail->CharSet="utf-8";
$mail->ContentType="text/html";
$mail->Subject = "เกียรติบัตรการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16";
$mail->Body = "<html><head></head><body>ขอบคุณสำหรับการร่วมแสดงความคิดเห็น<br><br>
    สำนักงานเลขาธิการสภาการศึกษา ขอมอบเกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่าท่านได้เข้าร่วมการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16<br>
    นวัตกรรมการศึกษา : กล้าเปลี่ยน สร้างสรรค์ ยกระดับคุณภาพการศึกษาไทย ระหว่างวันที่ 26-27 สิงหาคม พ.ศ. 2564</body></html>";
$mail->AltBody = "ขอบคุณสำหรับการร่วมแสดงความคิดเห็น
    สำนักงานเลขาธิการสภาการศึกษา ขอมอบเกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่าท่านได้เข้าร่วมการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16
    นวัตกรรมการศึกษา : กล้าเปลี่ยน สร้างสรรค์ ยกระดับคุณภาพการศึกษาไทย ระหว่างวันที่ 26-27 สิงหาคม พ.ศ. 2564";




$tb1 = 'tb_mail_new26';
$folder='26082564';
$sql = "SELECT * FROM `".$tb1."` WHERE (`active`='1') AND (`status`='0') AND (no>= ".$_GET['start'].") AND (no<= ".$_GET['end'].")";
////////////////////////


$mail->addAttachment('../cer/'.$folder.'/'.$line['pdf']);
$mail->addAddress($line['email'], $line['fullname']);
try {
    $mail->send();
    
	    $deliveryby ='thaiedlive';
       $send_stamp = date('Y-m-d H:i:s');
       $status_json = $line['no']."-".$line['fullname']."- Delivery ".$line['email']."Successfully  by ThaiedLive Time :".$send_stamp;
       $sql2 = "UPDATE `".$tb1."` SET deliveryby='".$deliveryby."', send_stamp='".$send_stamp."', status='1', status_json='".$status_json."' WHERE id=".$line['id'];
       //echo "Message has been sent successfully";
       echo $status_json."<br>";

} catch (Exception $e) {
    echo $line['no']."-".$line['fullname']."- Delivery ".$line['email']." Mailer Error: " . $mail->ErrorInfo;
}


////////////////////////
}
?>

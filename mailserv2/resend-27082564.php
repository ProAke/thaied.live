<?php
date_default_timezone_set('Asia/Bangkok');
include_once("../include/config.inc.php");



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//$nday=$_GET['nday'];
//$tb1 = 'tb_mail_sendnew_'.$nday;
//$folder='resend'.$nday;
//$sql = "SELECT * FROM `".$tb1."` WHERE (`active`='1') AND (`status`='0') AND (no>= ".$_GET['start'].") AND (no<= ".$_GET['end'].")";

$tb1 = 'tb_mail_new27_resend';
$folder='27082564';

$from ="2021-09-10";
$to = "2021-09-13";

$start = $_GET['start'];
$end =  $_GET['end'];
$sql = "SELECT * FROM `".$tb1."` WHERE (`status`='1') AND (`result`!='1') AND `send_stamp` between '".$from."' AND '".$to."' LIMIT ".$start.",".$end;




$query = $conn->query($sql) or die($conn->error);
$total = $query->num_rows;

    $i=0;
   while($line = $query->fetch_assoc())
    {



 if (filter_var($line['email'], FILTER_VALIDATE_EMAIL)) {
            //ถูกต้อง
////////////////////////
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

$mail->addAttachment('../cer/'.$folder.'/'.$line['pdf']);
$mail->addAddress($line['email'], $line['fullname']);




try {
$mail->send();   
        $deliveryby ='thaiedlive';
        $send_stamp = date('Y-m-d H:i:s');
        $status_json= "Emails Sent: [To: ".$line['email']."]; Delivery SMTP run on thaied.live; Timestamp: ".$send_stamp;
        $status =1;
        $sql2 = "UPDATE `".$tb1."` SET result='2', deliveryby='".$deliveryby."', send_stamp='".$send_stamp."', status='".$status."', status_json='".$status_json."' WHERE id=".$line['id'];
       if ($conn->query($sql2) === TRUE) {
            echo $line['no']."-".$line['fullname']."-".$status_json."<br>"; 
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

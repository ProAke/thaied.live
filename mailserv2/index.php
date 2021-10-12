<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "thaied.live";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "services@thaied.live";                 
$mail->Password = "!QJj392536789";                            
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to
$mail->Port = 465;                                   

$mail->From = "services@thaied.live";
$mail->FromName = "worapot";
$mail->addAddress("worapot@outlook.com", "worapot pilabut");

$mail->isHTML(true);
$mail->CharSet="utf-8";
$mail->ContentType="text/html";
$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";
$mail->addAttachment('../cer/26082564/1-ใบเกียรติบัตร-นายอวิรุทธ์​_บุตรน้ำเพชร.pdf');
try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
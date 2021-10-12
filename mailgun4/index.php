
<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;


$mg = Mailgun::create('33a3713cd81d8e8cb2918c07139d8ad7-a3c55839-8b773a8f'); // For US servers
$domain = "mg.thaied.live";
$params = array(
  'from'    => 'Education Services <services@thaied.live>',
  'to'      => 'worapot@outlook.com',
  'subject' => 'เกียรติบัตรการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16',
  'text'    => 'ขอบคุณสำหรับการร่วมแสดงความคิดเห็น
  สำนักงานเลขาธิการสภาการศึกษา ขอมอบเกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่าท่านได้เข้าร่วมการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16
  นวัตกรรมการศึกษา : กล้าเปลี่ยน สร้างสรรค์ ยกระดับคุณภาพการศึกษาไทย ระหว่างวันที่ 26-27 สิงหาคม พ.ศ. 2564',
  'html'    => '<html><head></head><body>ขอบคุณสำหรับการร่วมแสดงความคิดเห็น<br><br>
  สำนักงานเลขาธิการสภาการศึกษา ขอมอบเกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่าท่านได้เข้าร่วมการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16<br>
  นวัตกรรมการศึกษา : กล้าเปลี่ยน สร้างสรรค์ ยกระดับคุณภาพการศึกษาไทย ระหว่างวันที่ 26-27 สิงหาคม พ.ศ. 2564</body></html>',
  'attachment' => array(
              array(
                  'filePath' => '../cer/26082564/1-ใบเกียรติบัตร-นายอวิรุทธ์​_บุตรน้ำเพชร.pdf'
            )
        )
    );

# Make the call to the client.
$result = $mg->messages()->send($domain, $params);

echo $result;





?>
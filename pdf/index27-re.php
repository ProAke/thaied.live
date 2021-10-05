<?php 
include_once("include/config.inc.php");

$tb1 = 'tb_mail_sendnew';
$folder="../cer/resend/".$_GET['fd'];



$sql = "SELECT * FROM `".$tb1."` WHERE (`active`='1') AND (`status`='0') AND  (no>= ".$_GET['start'].") AND (no<= ".$_GET['end'].")";

$query = $conn->query($sql) or die($conn->error);
$i=0;
while($line = $query->fetch_assoc())
{

if($line['lname']!=""){

//------------------------------
$i++;

$fullname = $line['subtitle'].$line['fname']."#".$line['lname'];
require_once __DIR__ . '/vendor/autoload.php';
require_once('THSplitLib/segment.php');
$segment = new Segment();
$mpdf = new \Mpdf\Mpdf(array(
    'format'            => 'A4-L',
    'mode'              => 'utf-8',
    'default_font'      => 'sarabunpsk',
    'default_font_size' => 18,
    'margin_left'       => 4,
    'margin_right'      => 6,
    'margin_top'        => 1,
    'margin_bottom'     => 5,
));
$mpdf->useDictionaryLBR = false;
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('template/e-cer4.pdf', true);


$words = $segment->get_segment_array($fullname);
$text = implode("",$words);

$text2 = str_replace('#', '_', $fullname);
$text = str_replace('#', '&#32;&#32;', $text);
$Contents ='
<div style="font-family: thsarabunpsk;position: absolute;top:41%;left:0px;font-size:28pt;font-weight:bold;text-align:center;width:100%;">'.$text.'</div>
';
$mpdf->WriteHTML($Contents);

$NewFile = $line['no']."-ใบเกียรติบัตร-".$text2;
$mpdf->Output($folder.'/'.$NewFile.'.pdf','F');
//$mpdf->Output();

$sql2 = "UPDATE `".$tb1."` SET active='1', pdf='".$NewFile.".pdf' WHERE id=".$line['id'];
if ($conn->query($sql2) === TRUE) {
    echo $line['no']."-".$fullname."-สำเร็จ<br>\n";
}

}
//----------------------------------------
}



if($i=="0"){
echo "ช่วงนี้ได้สร้างใบประกาศไปแล้ว";
}
?>
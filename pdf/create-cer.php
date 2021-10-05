<?php 
include_once("include/config.inc.php");


$folder="../cer/create";



$fullname = $_GET['f']."#".$_GET['l'];
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

$fullname=str_replace('-', '.', $fullname);
$words = $segment->get_segment_array($fullname);
$text = implode("",$words);

$text2 = str_replace('#', '_', $fullname);
$text = str_replace('*', '.', $text);
$text = str_replace('#', '&#32;&#32;', $text);
$Contents ='
<div style="font-family: thsarabunpsk;position: absolute;top:41%;left:0px;font-size:28pt;font-weight:bold;text-align:center;width:100%;">'.$text.'</div>
';
$mpdf->WriteHTML($Contents);

$NewFile = "ใบเกียรติบัตร-".$text2;
$mpdf->Output($folder.'/'.$NewFile.'.pdf','F');
//$mpdf->Output();

header('Location: https://www.thaied.live/cer/create/'.$NewFile.'.pdf');
exit;
?>
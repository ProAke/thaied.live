<?php 
include_once("include/config.inc.php");

if($_GET['day']=='26'){$tb1 = 'tb_mail_new26';}
if($_GET['day']=='27'){$tb1 = 'tb_mail_new27';}





$folder="../cer/".$_GET['fd'];



?>

 <embed src="docPDF/<?php echo $data[0]; ?>.pdf" type="application/pdf" width="25%" height="100"/>
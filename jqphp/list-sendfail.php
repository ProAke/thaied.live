<?php error_reporting (E_ALL ^ E_NOTICE);
/*****************************************************************
Created		: 15/06/2020
Author		: JIE'software 
E-mail		: worapot@yahoo.com
server		: www.vpslive.com
PHP Version : 5.6
Copyright (C) 2010-2020, JIE'software under Bemine.life , all rights reserved.
*****************************************************************/

include_once("../include/config.inc.php");

for ($i = 0; $i <= 11; $i++) {
if($i>1){
if($i<10){$m="0".$i;}
if($i>9){$m=$i;}
$sql[$i] = "SELECT * FROM `tb_mail_sendnew_".$m."`";

}else{

$sql[$i] = "SELECT * FROM `tb_mail_sendnew`";
}
$query[$i] = $conn->query($sql[$i]) or die($conn->error);
$total[$i] = $query[$i]->num_rows;


$line = $query[$i]->fetch_assoc();

$list=$list.'
<tr>
<td class="w-1">
  '.$i.'
</td>
<td class="td-truncate">
  <div class="text-truncate">
  '.$total[$i].' จำนวนที่ส่งใหม่แล้ว 
  </div>
</td>
<td class="text-nowrap text-muted">'.$line['send_stamp'].'</td>
</tr>
';



}



$table = '
<table class="table table-vcenter">
                      <thead>
                        <tr>
                          <th>SET</th>
                          <th>รายละเอียดส่งซ้ำ</th>
                          <th>วันที่</th>
                        </tr>
                      </thead>
                     <tbody>
                    '. $list.'                        
                    </tbody>
</table>
';
echo $table;
?>
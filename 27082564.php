<?php error_reporting (E_ALL ^ E_NOTICE);
/*****************************************************************
Created		: 15/06/2020
Author		: JIE'software 
E-mail		: worapot@yahoo.com
server		: www.vpslive.com
PHP Version : 7++
Copyright (C) 2010-2020, JIE'software under Bemine.life , all rights reserved.
*****************************************************************/

include_once("./include/config.inc.php");
$tb1 = 'tb_mail_new27';
$folder='27082564';
//$sql = "SELECT * FROM `".$tb1."` WHERE (no>= 1) AND (no<= 95097)";

$url = "https://www.thaied.live/cer/27082564";
$pdffd ="cer/27082564/";


//-----------------------------
$sql0 = "SELECT * FROM `".$tb1."`";
$query0 = $conn->query($sql0) or die($conn->error);
$total = $query0->num_rows;
$total_record = $query0->num_rows;
$total = number_format($total);
//------------------------------

$sql2 = "SELECT * FROM `".$tb1."` WHERE status=0"; // ยังไม่ได้ส่ง
$query2 = $conn->query($sql2) or die($conn->error);
$total2 = $query2->num_rows;
$totalwait = number_format($total2);
//------------------------------
$sql3 = "SELECT * FROM `".$tb1."` WHERE status=1"; // ส่งแล้ว
$query3 = $conn->query($sql3) or die($conn->error);
$total3 = $query3->num_rows;
$totalsend = number_format($total3);
//------------------------------

$sql6 = "SELECT * FROM `".$tb1."` WHERE status=3"; // etc
$query6 = $conn->query($sql6) or die($conn->error);
$total6 = $query6->num_rows;
$totaletc = number_format($total6);
//------------------------------


$sql4 = "SELECT * FROM `".$tb1."` WHERE active=2"; // ชื่อไม่ถูกต้อง
$query4 = $conn->query($sql4) or die($conn->error);
$total4 = $query4->num_rows;
$totalfail = number_format($total4);
//------------------------------

$sql5 = "SELECT * FROM `".$tb1."` WHERE active=0"; // ยังไม่ได้สร้าง pdf
$query5 = $conn->query($sql5) or die($conn->error);
$total5 = $query5->num_rows;
$totalnotpdf = number_format($total5);
//------------------------------

 $perpage = 5000;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
$start = ($page - 1) * $perpage;

$sql = "SELECT * FROM `".$tb1."` limit {$start} , {$perpage}";
$query = $conn->query($sql) or die($conn->error);
$i=0;





?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>รายงานการตรวจเช็คส่งใบเกียรติบัตร - เกียรติบัตรการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16 | วันที่ 27 สิงหาคม 2564 </title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>

  </head>
  <body class="antialiased">
    <div class="wrapper">
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
            เกียรติบัตรการประชุมการวิจัยทางการศึกษาระดับชาติ ครั้งที่ 16 | วันที่ 27 สิงหาคม 2564 
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
            
            </div>
          
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>อ.พี่เอก</div>
                  <div class="mt-1 small text-muted">Education Services</div>
                </div>
              </a>
             
            </div>
          </div>
        </div>
      </header>
      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="./index.php" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link dropdown-toggle" href="26082564.php" role="button" aria-expanded="false" >
                    
                    <span class="nav-link-title">
                     26/08/2564
                    </span>
                  </a>
          
                </li>
                <li class="nav-item ">
                  <a class="nav-link dropdown-toggle" href="27082564.php" role="button" aria-expanded="false" >
                    
                    <span class="nav-link-title">
                     27/08/2564
                    </span>
                  </a>
          
                </li>        
              </ul>
              <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
              <a href="export-excel.php?day=27082564" class="btn btn-primary ms-auto" target='_blank'>
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <line x1="12" y1="5" x2="12" y2="19" />
              <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            Export Excel
          </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->



              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">ยอดทั้งหมด : </h3>
                    <span><b> <?php echo $total;?></b> คน</span>
                  </div>
                  <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                      <div class="text-muted">
                    
                        <div class="mx-2 d-inline-block">
                          <span>ยอดส่งแล้ว : <?php echo $totalsend;?></span> /
                          <span>มีปัญหา: <a href='table27.php'><?php echo $totalwait;?></a></span> /
                          <span>อื่นๆ: <?php echo $totaletc;?></span> /
                          </div>
                        
                      </div>
                      <div class="ms-auto text-muted">
                        <?php  echo "วันนี้".date('d-m-Y H:i:s');?>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <!--th class="w-1">ID</th-->


                          <th class="w-1">ลำดับ 
                          </th>
                          <!--th>วัน/เวลา-กรอกฟอร์ม</th-->
                          <th>ชื่อ-สกุล</th>
                          <th>E-mail</th>
                          <th>PDF</th>
                          <th>สถานะ</th>
                          <th>Mail Delivery</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>


<?php

while($line = $query->fetch_assoc()){
$i++;
$filename = $pdffd.$line['pdf'];
if (file_exists($filename)) {
$filepdf ="<a href='".$url."/".$line['pdf']."' target='_blank'>".$line['pdf']."</a>";
} else {
  $filepdf =$line['pdf'];   
}
?>
                        <!--tr>
                          <td><?php echo $i;?></td-->
                          <td><span class="text-muted"><?php echo $line['no'];?></span></td>
                          <!--td><?php echo $line['stamp_regis'];?></td-->
                          <td>
                            <?php echo $line['fullname'];?>
                          </td>
                          <td>
                          <?php echo $line['email'];?>
                          </td>
                          <td><?php echo $filepdf;?>
                          </td>
                          <td>
                          <?php              
                          if($line['status']=="0"){echo "รอส่ง";}
                          if($line['status']=="1"){echo "ส่งแล้ว";} 
                          //if($line['send_stamp']){echo "/ ".$line['send_stamp'];}                         
                          ?>
                         
                          </td>
                          <td><?php echo $line['deliveryby'];?></td>
                          <td class="text-end">
                          <a href="#" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $line['no'];?>">
                          แก้ไข
                  </a>


    
<div class="modal modal-blur fade" id="modal-<?php echo $line['no'];?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">แก้ไข : <?php echo $line['fullname'];?> : <?php echo $line['no'];?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3"style="text-align: left;">
            <label class="form-label">ชื่อ-สกุล </label>
            <input type="text" class="form-control" name="fullname" placeholder="Your report name" value="<?php echo $line['fullname'];?>">
          </div>
       
         </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3" style="text-align: left;">
                <label class="form-label">คำนำหน้า</label>
                <input type="text"  name="subtitle" class="form-control" value="<?php echo $line['subtitle'];?>"
              </div>
            </div>
       
            <div class="col-lg-4">
              <div style="text-align: left;">
                <label class="form-label">ชื่อ</label>
                <input type="text"  name="fname" class="form-control" value="<?php echo $line['fname'];?>">
              </div>
            </div>

            <div class="col-lg-4">
              <div style="text-align: left;">
                <label class="form-label">นามสกุล</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $line['lname'];?>">
              </div>
            </div>



          </div>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
            <div class="mb-3" style="text-align: left;">
                <label class="form-label">คำนำหน้า</label>
                <input type="text"  name="subtitle" class="form-control" value="<?php echo $line['subtitle'];?>"
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">Reporting period</label>
                <input type="date" class="form-control">
              </div>
            </div>
            <div class="col-lg-12">
              <div>
                <label class="form-label">Additional information</label>
                <textarea class="form-control" rows="3"></textarea>
              </div>
            </div>
          </div>
        </div>


        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <line x1="12" y1="5" x2="12" y2="19" />
              <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            บันทึก
          </a>
        </div>
      </div>
    </div>
  </div>


                          </td>
                        </tr>
                       
<?php }


$total_page = ceil($total_record / $perpage);
?>
                      </tbody>
                    </table>
                  </div>















                  
                  <div class="card-footer d-flex align-items-center">


                  <ul class="pagination m-0 ms-auto">
 <li>
 <a href="?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li class="page-item"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> | </li>
 <?php } ?>
 <li>
 <a href="?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>


                  </div>
                </div>
              </div>







        <footer class="footer footer-transparent d-print-none">
          <div class="container">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  
                  <li class="list-inline-item">
                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                      Sponsor
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2021 Education Servics
                    <a href="." class="link-secondary">Thailand Education Center</a>.
                    All rights reserved.
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">v1.0.0-beta3</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
  </body>
</html>
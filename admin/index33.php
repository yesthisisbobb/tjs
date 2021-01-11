<!DOCTYPE html>

<html lang="en">
<?php
  session_start();
  include("../config.php");
  include("../proses.php");

  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
      return false;
  }

  if($_SESSION["level"] != "admin"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../'.$_SESSION["level"].'/";
             </script>';
        return false;
  }
?>
<?php
include('blank_header.php')
 ?>

 <div class="header-container fixed-top">
     <header class="header navbar navbar-expand-sm">
         <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

         <ul class="navbar-item flex-row">
             <li class="nav-item align-self-center page-heading">
                 <div class="page-header">

                        <h4 class="text-info"> SmartMarbleAndBath </h4>


                 </div>
             </li>
         </ul>

         <ul class="navbar-item flex-row navbar-dropdown">
             <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
             <?php
             if ($_SESSION["username"]==""){
             ?>
                 <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                 </a>
             <?php   } else {?>
               <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <?php
                 $nama=$_SESSION["username"];

                 $sqlp= "SELECT * FROM login where email='$nama'";
                      $queryp = mysqli_query($conn, $sqlp);

                      while($amp = mysqli_fetch_array($queryp)){
                        $gam=$amp['gam'];
                        $namanya=$amp['nama'];
                        $email=$amp['email'];
                        $role=$amp['role'];
                        $divisi=$amp['divisi2'];
                        $divisi2=$amp['divisi'];

                      }
                        ?>

                        <img class="rounded-circle mt-0 ml-0" src="<?php echo $admin_url; ?>/<?php echo $gam; ?>" width="50" height="50">

               </a>
             <?php } ?>
                 <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                     <div class="">
                       <div class="dropdown-item">
                     <p style="color:black;"><b>Welcome, <?php echo strtoupper($namanya); ?>
                     </p></b>
                       </div>
                       <div class="dropdown-item">
                         <p style="color:black;"><b>
                           <?php echo "You are:"." ".strtoupper($role)?>
                     </p></b>
                       </div>
                       <div class="dropdown-item">
                         <p style="color:black;"><b>
                           <?php echo "Status: ".strtoupper($divisi2) ?>
                     </p></b>
                       </div>
                       <div class="dropdown-item">
                         <p style="color:black;"><b>
                           <?php echo strtoupper($divisi); ?>
                     </p></b>
                       </div>
                         <!-- <div class="dropdown-item">
                             <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                         </div> -->
                         <div class="dropdown-item-1">
                             <!-- <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg></a>
                             <a class="" href="../../logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg></a> -->
                             <div class="row">
      <div class="col-sm-6">
                             <a href="#" data-toggle="tooltip" title="INBOX" style="font-family:Digital-7;font-size:20px; text-align: center; color:black;"><i class="fas fa-inbox"></i></a>
</div>
<div class="col-sm-6">
                            <a href="../../logout.php"data-toggle="tooltip1" title="SIGN OUT" style="font-family:Digital-7;font-size:20px; text-align: center; color:black;"><i class="fas fa-sign-out-alt"></i></a>
</div>
</div>
                         </div>

                         <!-- <div class="dropdown-item">
                             <a class="" href="../../logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                         </div> -->
                     </div>
                 </div>
             </li>
         </ul>
     </header>
 </div>
<body class="sidebar-noneoverflow">

    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

      <?php
      include('blank_page.php')
      ?>
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
              <div class="row layout-top-spacing">

                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                      <div class="widget widget-account-invoice-one">

                          <div class="widget-heading">
                              <h5 class="">Stock info</h5>
                          </div>

                          <div class="widget-content">
                              <div class="invoice-box">

                                  <div class="acc-total-info">
                                      <h5>Available Stock</h5>
                                      <?php
                                      $c=0;
                                      $sqla = "SELECT * FROM master_stok";
                                           $querya = mysqli_query($conn, $sqla);
                                           while($ama = mysqli_fetch_array($querya)){
                                             $c=$c+1;

                                           }
                                           ?>
                                      <p class="acc-amount"><?php echo $c; ?> box</p>
                                  </div>

                                  <div class="inv-detail">
                                      <div class="info-detail-1">
                                        <?php
                                        $c1=0;
                                        $sqla1 = "SELECT * FROM master_stok";
                                             $querya1 = mysqli_query($conn, $sqla1);
                                             while($ama1 = mysqli_fetch_array($querya1)){
                                               $c1=$c1+1;
                                             }
                                             ?>

                                      </div>
                                      <div class="info-detail-2">


                                      </div>
                                      <div class="info-detail-3 info-sub">
                                        <div class="info-detail">
                                            <p>Product Group</p>
                                            <!-- <p>$ -0.68</p> -->
                                        </div>
                                        <?php

                                        $sqla3 = "SELECT * FROM master_grup";
                                             $querya3 = mysqli_query($conn, $sqla3);
                                             while($ama3 = mysqli_fetch_array($querya3)){
                                               $nama=$ama3['nama'];
                                               $z=0;
                                             ?>

                                          <div class="info-detail-sub">
                                              <p><?php echo $nama; ?></p>
                                              <?php
                                              $sqla3a = "SELECT * FROM master_stok";
                                                   $querya3a = mysqli_query($conn, $sqla3a);
                                                   while($ama3a = mysqli_fetch_array($querya3a)){
                                                     $nama3=$ama3a['grupname'];
                                                     $sqlgrup= "SELECT * FROM detail_sub_grup where nama='$nama3'";
                                                          $querygrup = mysqli_query($conn, $sqlgrup);
                                                          while($amagrup = mysqli_fetch_array($querygrup)){
                                                            $namagrup=$amagrup['namagrup'];
                                                            $sqlgrup1= "SELECT * FROM master_sub_grup where nama='$namagrup'";
                                                                 $querygrup1 = mysqli_query($conn, $sqlgrup1);
                                                                 while($amagrup1 = mysqli_fetch_array($querygrup1)){
                                                                   $namagrup1=$amagrup1['namagrup'];
                                                                    if ($namagrup1==$nama)
                                                                    {
                                                                      $z=$z+1;
                                                                    }
                                                                 }
                                                   }
                                                 }
                                                   ?>

                                              <p><?php echo $z; ?> Box</p>
                                          </div>

                                        <?php } ?>
                                      </div>
                                  </div>

                                  <div class="inv-action">
                                      <a href="/admin/laporan/l_stok.php" class="btn btn-outline-dark">View Stock</a>
                                      <!-- <a href="" class="btn btn-danger">Transfer</a> -->
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                      <div class="widget widget-account-invoice-one">

                          <div class="widget-heading">
                              <h5 class="">Invoice Information</h5>
                          </div>

                          <div class="widget-content">
                              <div class="invoice-box">
                                <?php
                                $cq=0;
                                $total=0;
                                $sqlq = "SELECT * FROM invdtl";
                                     $queryq = mysqli_query($conn, $sqlq);
                                     while($amq = mysqli_fetch_array($queryq)){

                                       $total=$total+$amq['total'];
                                     }
                                     ?>
                                  <div class="acc-total-info">
                                      <h5>Total Revenue</h5>

                                      <p class="acc-amount">IDR. <?php echo rupiah($total); ?></p>
                                  </div>

                                  <div class="inv-detail">
                                      <div class="info-detail-1">

                                          <p>Today's Quote</p>
                                          <p><?php echo $cq; ?> Quote</p>
                                      </div>
                                      <div class="info-detail-1">

                                          <p align="left">Today's Quote Value</p>
                                          <p><?php echo rupiah($total); ?></p>
                                      </div>
                                      <div class="info-detail-1">

                                          <p>Open Quote</p>
                                          <p><?php echo $cq; ?> Quote</p>
                                      </div>
                                      <div class="info-detail-1">

                                          <p>Close Quote</p>
                                          <p>0 Quote</p>
                                      </div>

                                      <!-- <div class="info-detail-1">

                                          <p>Jakarta</p>
                                          <p>50 Quotation</p>
                                      </div> -->
                                      <!-- <div class="info-detail-3 info-sub"> -->
                                        <!-- <div class="info-detail"> -->
                                            <!-- <p>Quotation/Product Group</p> -->
                                            <!-- <p>$ -0.68</p> -->
                                        <!-- </div> -->


                                          <!-- <div class="info-detail-sub">
                                              <p>TILE </p>
                                              <p>100 Quotation</p>
                                          </div> -->


                                      <!-- </div> -->
                                  </div>

                                  <div class="inv-action">
                                      <a href="" class="btn btn-outline-dark">Summary</a>
                                      <a href="" class="btn btn-danger">Quote Now</a>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                      <div class="widget widget-activity-four">

                          <div class="widget-heading">
                              <h5 class="">Recent Activities</h5>
                          </div>

                          <div class="widget-content">

                              <div class="mt-container mx-auto">
                                  <div class="timeline-line">

                                      <div class="item-timeline timeline-primary">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p><span>SO</span> Received</p>
                                              <span class="badge badge-primary">Completed</span>
                                              <p class="t-time">Just Now</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline timeline-success">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>SO Sent to <a href="javascript:void(0);">Sales Manager</a> and <a href="javascript:void(0);">Admin</a></p>
                                              <span class="badge badge-success">Completed</span>
                                              <p class="t-time">2 min ago</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-danger">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>SO Indent <span>Need Approval</span><a href="javascript:void(0);"> by Pak David</a></p>
                                              <span class="badge badge-danger">Pending</span>
                                              <p class="t-time">14:00</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-dark">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>PO Sent To  <a href="javascript:void(0);">Vendor</a></p>
                                              <span class="badge badge-danger">Pending</span>
                                              <p class="t-time">16:00</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-warning">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>PO Proccessed <a href="javascript:void(0);">By Vendor</a>.</p>
                                              <span class="badge badge-primary">In progress</span>
                                              <p class="t-time">17:00</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-secondary">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>Rebooted Server</p>
                                              <span class="badge badge-success">Completed</span>
                                              <p class="t-time">17:00</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-warning">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>Send contract details to Freelancer</p>
                                              <span class="badge badge-danger">Pending</span>
                                              <p class="t-time">18:00</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-dark">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>Kelly want to increase the time of the project.</p>
                                              <span class="badge badge-primary">In Progress</span>
                                              <p class="t-time">19:00</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-success">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>Server down for maintanence</p>
                                              <span class="badge badge-success">Completed</span>
                                              <p class="t-time">19:00</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-secondary">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>Malicious link detected</p>
                                              <span class="badge badge-warning">Block</span>
                                              <p class="t-time">20:00</p>
                                          </div>
                                      </div>

                                      <div class="item-timeline  timeline-warning">
                                          <div class="t-dot" data-original-title="" title="">
                                          </div>
                                          <div class="t-text">
                                              <p>Rebooted Server</p>
                                              <span class="badge badge-success">Completed</span>
                                              <p class="t-time">23:00</p>
                                          </div>
                                      </div>

                                  </div>
                              </div>

                              <div class="tm-action-btn">
                                  <button class="btn">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                      <div class="widget-two">
                          <div class="widget-content">
                              <div class="w-numeric-value">
                                  <div class="w-content">
                                      <span class="w-value">Daily sales</span>
                                      <span class="w-numeric-title">Go to columns for details.</span>
                                  </div>
                                  <div class="w-icon">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                  </div>
                              </div>
                              <div class="w-chart">
                                  <div id="daily-sales"></div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                      <div class="widget-three">
                          <div class="widget-heading">
                              <h5 class="">Summary</h5>
                          </div>
                          <div class="widget-content">

                              <div class="order-summary">

                                  <div class="summary-list">
                                      <div class="w-icon">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                      </div>
                                      <div class="w-summary-details">

                                          <div class="w-summary-info">
                                              <h6>Income</h6>
                                              <p class="summary-count">$92,600</p>
                                          </div>

                                          <div class="w-summary-stats">
                                              <div class="progress">
                                                  <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                          </div>

                                      </div>

                                  </div>

                                  <div class="summary-list">
                                      <div class="w-icon">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                      </div>
                                      <div class="w-summary-details">

                                          <div class="w-summary-info">
                                              <h6>Profit</h6>
                                              <p class="summary-count">$37,515</p>
                                          </div>

                                          <div class="w-summary-stats">
                                              <div class="progress">
                                                  <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                          </div>

                                      </div>

                                  </div>

                                  <div class="summary-list">
                                      <div class="w-icon">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                      </div>
                                      <div class="w-summary-details">

                                          <div class="w-summary-info">
                                              <h6>Expenses</h6>
                                              <p class="summary-count">$55,085</p>
                                          </div>

                                          <div class="w-summary-stats">
                                              <div class="progress">
                                                  <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                          </div>

                                      </div>

                                  </div>

                              </div>

                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                      <div class="widget widget-chart-two">
                          <div class="widget-heading">
                              <h5 class="">Sales by Category</h5>
                          </div>
                          <div class="widget-content">
                              <div id="chart-2" class=""></div>
                          </div>
                      </div>
                  </div>
</div>

<?php
  function rupiah($angka){

	$hasil_rupiah = "" . number_format($angka,0,',','.');
	return $hasil_rupiah;

}
?>
<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

      <div class="widget widget-account-invoice-one">

          <div class="widget-heading">
              <h5 class="">Invoice</h5>
          </div>
          <?php
          $tota1=0;
          $sqla41= "SELECT * FROM jual";
                 $querya41 = mysqli_query($conn, $sqla41);
                 while($ama41 = mysqli_fetch_array($querya41)){

                   $harga1=$ama41['grand_total'];
                   $tota1=$tota1+$harga1;
                 }
                 ?>
          <div class="widget-content">
              <div class="invoice-box">

                  <div class="acc-total-info">
                      <h5>Unpaid Invoice</h5>

                      <p class="acc-amount"> <?php echo rupiah($tota1); ?> </p>
                  </div>
                </div>
              </div>


        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><div class="th-content">Customer</div></th>

                            <th><div class="th-content">Invoice</div></th>
                            <th><div class="th-content th-heading">Price</div></th>
                            <th><div class="th-content">Status</div></th>
                            <th><div class="th-content">Action</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tota=0;
                    $sqla4= "SELECT * FROM jual";
                           $querya4 = mysqli_query($conn, $sqla4);
                           while($ama4 = mysqli_fetch_array($querya4)){
                             $cartid=$ama4['cart_id'];
                             $userid=$ama4['user_id'];
                             $harga=$ama4['grand_total'];
                             $tota=$tota+$harga;
                           ?>
                        <tr>

                            <td><div class="td-content product-brand"><?php echo $userid; ?></div></td>
                            <td><div class="td-content"><?php echo $cartid; ?></div></td>
                            <td><div class="td-content pricing"><span class=""><?php echo rupiah($harga); ?></span></div></td>
                            <td><div class="td-content"><span class="badge outline-badge-danger">Unpaid</span></div></td>
                            <td><div class="td-content"><span class="badge outline-badge-primary">View</span></div></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

      <div class="widget widget-account-invoice-one">

          <div class="widget-heading">
              <h5 class="">SO Indent</h5>
          </div>
          <?php
          $tota1=0;
          $sqla41= "SELECT * FROM ijual";
                 $querya41 = mysqli_query($conn, $sqla41);
                 while($ama41 = mysqli_fetch_array($querya41)){

                   $harga1=$ama41['grand_total'];
                   $tota1=$tota1+$harga1;
                 }
                 ?>
          <div class="widget-content">
              <div class="invoice-box">

                  <div class="acc-total-info">
                      <h5>SO Indent</h5>

                      <p class="acc-amount"> <?php echo rupiah($tota1); ?> </p>
                  </div>
                </div>
              </div>


        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><div class="th-content">Customer</div></th>

                            <th><div class="th-content">Invoice</div></th>
                            <th><div class="th-content th-heading">Price</div></th>
                            <th><div class="th-content">Status</div></th>
                            <th><div class="th-content">Action</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tota=0;
                    $sqla4= "SELECT * FROM ijual";
                           $querya4 = mysqli_query($conn, $sqla4);
                           while($ama4 = mysqli_fetch_array($querya4)){
                             $cartid=$ama4['cart_id'];
                             $userid=$ama4['user_id'];
                             $harga=$ama4['grand_total'];
                             $tota=$tota+$harga;
                           ?>
                        <tr>

                            <td><div class="td-content product-brand"><?php echo $userid; ?></div></td>
                            <td><div class="td-content"><?php echo $cartid; ?></div></td>
                            <td><div class="td-content pricing"><span class=""><?php echo rupiah($harga); ?></span></div></td>
                            <td><div class="td-content"><span class="badge outline-badge-warning">Down Payment</span></div></td>
                            <td><div class="td-content"><span class="badge outline-badge-primary">View</span></div></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


                <!-- CONTENT AREA -->





                <!-- CONTENT AREA -->
            </div>
          
            <?php include('blank_footer.php');
            ?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
</body>
</html>

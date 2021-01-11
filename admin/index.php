<!DOCTYPE html>

<html lang="en">
<?php
  session_start();
  include("../config.php");

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
 <?php
   function rupiah($angka){

 	$hasil_rupiah = "" . number_format($angka,0,',','.');
 	return $hasil_rupiah;

 }
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
                            <a href="<?=$base_url?>/logout.php"data-toggle="tooltip1" title="SIGN OUT" style="font-family:Digital-7;font-size:20px; text-align: center; color:black;"><i class="fas fa-sign-out-alt"></i></a>
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


</div>


            </div>
            <?php include('blank_footer.php');
            ?>
        </div>
    </div>
</body>
</html>

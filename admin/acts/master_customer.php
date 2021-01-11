<!DOCTYPE html>

<?php
  session_start();
  include("../../config.php");
  include("../../proses.php");
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
<html lang="en">
<script language=javascript>
var objekxhr, objekxhr1;
function cek(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhs.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan;
}

function buatxhr()
{
    if (window.ActiveXObject)

    {
        objectxhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
        else if (window.XMLHttpRequest)
    {
        objekxhr=new XMLHttpRequest();
    }
    else
    {
      alert ("ganti browser anda");
    }
}

function tampilkan()
{

document.getElementById("pg").innerHTML = objekxhr.responseText;

}
</script>
<?php
include('../blank_header.php')
 ?>
 <div class="header-container fixed-top">
     <header class="header navbar navbar-expand-sm">
         <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

         <ul class="navbar-item flex-row">
             <li class="nav-item align-self-center page-heading">
                 <div class="page-header">

                        <h4 class="text-info"> Customer Transaction History <span style="font-size:12px;">Daftar Transaksi Customer(fracts)</span> </h4>


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
                     <p><b>Welcome, <?php echo strtoupper($namanya); ?>
                     </p></b>
                       </div>
                       <div class="dropdown-item">
                         <p><b>
                           <?php echo "Role:"." ".strtoupper($role)?>
                     </p></b>
                       </div>
                       <div class="dropdown-item">
                         <p><b>
                           <?php echo "Division: ".strtoupper($divisi2) ?>
                     </p></b>
                       </div>
                       <div class="dropdown-item">
                         <p><b>
                           <?php echo "Company:".strtoupper($divisi); ?>
                     </p></b>
                       </div>
                         <!-- <div class="dropdown-item">
                             <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                         </div> -->
                         <div class="dropdown-item">
                             <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> Inbox</a>
                         </div>
                         <div class="dropdown-item">
                             <a class="" href="auth_lockscreen.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Lock Screen</a>
                         </div>
                         <div class="dropdown-item">
                             <a class="" href="../../logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                         </div>
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
      include('../blank_page.php')
      ?>
        <!--  BEGIN CONTENT AREA  -->

        <div id="content" class="main-content">

            <div class="layout-px-spacing">
              <div class="row layout-top-spacing">
                <!-- start of content area 1 -->
                  <div id="basic" class="col-lg-12 layout-spacing">
                      <div class="statbox widget box box-shadow">

                                  <div class="col-lg-12 col-12 mx-auto">
                <!-- start of content area 1 -->
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <!-- <th width="1%">No</th> -->

                      <th class="text-nowrap">Internal Code</th>
                      <th class="text-nowrap">Customer Code</th>
                      <th class="text-nowrap">Name</th>
                      <th class="text-nowrap">Address</th>
                      <th class="text-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php
                      $sql = "SELECT * FROM tbl_cust_acts ORDER BY UCode_Cust ASC";
                           $query = mysqli_query($conn, $sql);
                           while($amku = mysqli_fetch_array($query)){
                      ?>
                    <tr class="odd gradeX">


                      <td><?=$amku["UCode_Cust"];?></td>
                      <td><?=$amku["Kode_Cust"];?></td>
                      <td><?=$amku["Nama_Cust"];?></td>
                      <td><?=$amku["Alm_Cust"];?></td>
                      <td class="with-btn" nowrap="">

                        <!-- <a href="master_color.php?aksi=view&no=<?php echo $amku["UCode_Cust"]; ?>" class="btn btn-rounded btn-primary btn-sm" role="button">View</a> -->
                        <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->
                        <button type="button" class="btn btn-primary" value="<?php echo $amku["UCode_Cust"]; ?>" onclick="cek(this.value)">View</button>

                          </td>
                   <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>

              </div>
              <div id="basic" class="col-lg-12 layout-spacing">
                  <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Transaction History</h4> 
                            </div>
                        </div>
                    </div>
                              <div class="col-lg-12 col-12 mx-auto" id="pg">

                              </div>
                  </div>
            </div>
                  <!-- end of content area 1 -->

                  <!-- begin of content area 2 -->





            <!-- end of content area 2 -->

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">Karya Modern</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
                </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
        <!--  END CONTENT AREA  -->
        <?php
        include('../blank_footer.php')
        ?>
        <script src="<?php echo $admin_url; ?>/demo5/assets/js/custom.js"></script>
        <script>
            $('#zero-config').DataTable({
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 5
            });
        </script>
        <script>
            $('#zero-config1').DataTable({
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 5
            });
        </script>
    </div>
</body>
</html>

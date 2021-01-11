<!DOCTYPE html>

<?php
  session_start();
  include("../../config.php");
  // include("../../proses.php");
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
<style>
h4 {
padding-left: 50px;
font-family: Montserrat;
padding-top: 20px;
}
</style>
<html lang="en">


<?php
include('../blank_header.php')
 ?>
 <div class="header-container fixed-top">
 <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row">
            <li class="nav-item align-self-center page-heading">
                <div class="page-header">
                    <h4 class="text-info"> Contact <span style="font-size:12px;">Kontak </span><a href="master_kontak.php?aksi#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4></h4>                    
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


                                  <div  style="overflow-x:auto;" class="col-lg-12 col-12 mx-auto">
                <!-- start of content area 1 -->
                <table id="zero-config" class="cell-border table table-hover">
                  <thead>
                    <tr>
                      <!-- <th width="1%">No</th> -->

                      <!-- <th class="text-nowrap">Date</th> -->

                      <th class="text-wrap" style="text-align:left">Name</th>
                      <th class="text-wrap" style="text-align:left">Company</th>
                      <th class="text-wrap" style="text-align:left">Address</th>
                      <th class="text-nowrap" style="text-align:left">Phone</th>
                      <th class="text-nowrap" style="text-align:left">E - Mail</th>
                      <th class="text-nowrap" style="text-align:left">Label</th>
                      <th class="text-nowrap" style="text-align:left">Owner</th>
                      <th class="text-nowrap" style="text-align:left">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                   <?php
                      $username = $_SESSION["username"];

                      $sql = "SELECT x.id AS kode, x.data_create AS tgl, x.nama AS nama, perusahaan, x.alamat AS alamat, x.telp AS telp, x.email AS email, label, foto, y.nama AS owner_name FROM kontak x 
                                INNER JOIN karyawan y ON idkaryawan = y.id WHERE y.email = '$username'
                                ORDER BY nama ASC";
                           $query = mysqli_query($conn, $sql);
                           while($amku = mysqli_fetch_array($query)){                             
                      ?>
                    <tr class="odd gradeX">
                      <td><?=$amku["nama"];?></td>
                      <td><?=$amku["perusahaan"];?></td>
                      <td><?=$amku["alamat"];?></td>
                      <td><?=$amku["telp"];?></td>
                      <td><?=$amku["email"];?></td>
                      <td>
                        <?php
                        if($amku['label'] == "Customer")
                        {
                          echo "<span class='badge badge-success'>Customer</span>";
                        }
                        else if($amku['label'] == "Hot Lead") 
                        {
                          echo "<span class='badge badge-danger'>Hot Lead</span>";
                        }
                        else
                        {
                          echo "<span class='badge badge-secondary'>Cold Lead</span>";
                        }
                        ?>
                       
                      </td>
                      <td><?=$amku["owner_name"];?></td>


                      <td class="with-btn" nowrap="">
                        <a href="master_kontak.php?aksi=view&no=<?php echo $amku["kode"]; ?>#section2"><i class="fas fa-edit" style="font-size:18px;color:#5DADE2;" data-toggle="tooltip" title="EDIT" ></i></a>
                         <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>"><i class="fas fa-times-circle"  style="font-size:18px;color:#F8C471;"data-toggle="tooltip" title="DISABLE" ></i></a>
                          <a href="proses-master-grup.php?aksi=active&no=<?php echo $amku["id"]; ?>"><i class="fas fa-check-circle" style="font-size:18px;color:#52BE80;"data-toggle="tooltip" title="ENABLE" ></i></i></a>
                        <a href="proses-master-kontak.php?aksi=delete&no=<?php echo $amku["kode"]; ?>"><i class="fas fa-trash" style="font-size:18px;color:#CD6155;"data-toggle="tooltip" title="DELETE" ></i></a>
                          </td>
                   <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>

              </div>

                  <!-- end of content area 1 -->

                  <!-- begin of content area 2 -->


                  <div id="basic" class="col-lg-12 layout-spacing">
                      <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row" id="section2">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 border-bottom border-info 1px">
                                    <h3 class="text-info" style="text-align:left">Add New <span style="font-size:12px;">Tambah Data</span></h4>

                                </div>
                            </div>
                        </div>

                                  <div class="col-lg-12 col-12 mx-auto">
                                    <form class="form-horizontal" method="post" action="proses-master-kontak.php">
                                        <?php
                                            $aksi = $_GET['aksi'];
                                            if ($aksi =="view")
                                            {
                                              $nomerku = $_GET['no'];
                                              $sql = "SELECT * FROM kontak where id='$nomerku'";
                                                  $query = mysqli_query($conn, $sql);
                                                  while($amku = mysqli_fetch_array($query)){
                                                    $tgl =$amku['data_create'];
                                                    $nama =$amku['nama'];
                                                    $perusahaan =$amku['perusahaan'];
                                                    $alamat =$amku['alamat'];
                                                    $telp =$amku['telp'];
                                                    $email =$amku['email'];
                                                    $label =$amku['label'];
                                                    $nom=$amku['id'];
                                                  }
                                        ?>
                                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                                          <!-- begin panel-heading -->

                                          <!-- end panel-heading -->
                                          <!-- begin panel-body -->
                                          <div class="panel-body panel-form">
                                            <div class="container">
                                              <div class="form-group">
                                                <!-- <label class="col-sm-10 control-label">No.</label> -->
                                                <div class="col-sm-2">
                                                   <input type="hidden" class="form-control" id="nom" value="<?php echo $nom; ?>" name="nom">
                                               </div>
                                             </div>
                                             <div class="form-group">
                                               <label class="col-sm-10 control-label">Post Date</label>
                                               <div class="col-sm-4">
                                                 <input type="text" readonly class="form-control" id="nom1" value="<?php echo $tgl; ?>" name="nom1">
                                              </div>
                                            </div>

                                              <div class="form-group">
                                                 <label class="col-sm-10 control-label">Nama</label>
                                                 <div class="col-sm-4">
                                                   <input type="text" class="form-control" id="nama_kontak" value="<?php echo $nama; ?>" name="nama_kontak">
                                                </div>
                                              </div>
                                                <div>
                                                <div class="form-group">
                                                  <label class="col-sm-6 control-label">Perusahaan</label>
                                                <div class="col-sm-6">
                                                <input type="text" class="form-control" id="perusahaan" value="<?php echo $perusahaan; ?>" name="perusahaan">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-6 control-label">Alamat</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="alamat" value="<?php echo $alamat; ?>" name="alamat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-6 control-label">No. Telp</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="telp" value="<?php echo $telp; ?>" name="telp">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-6 control-label">Email</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="email" value="<?php echo $email; ?>" name="email">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                              <select class="form-control" id="label" name="label">
                                                <option><?php echo $label; ?></option>
                                                <option>Customer</option>
                                                <option>Hot Lead</option>
                                                <option>Cold Lead</option>
                                            </select>
                                          </div><br>
                                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                                      <?php } else { ?>

                                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                                          <!-- begin panel-heading -->

                                          <!-- end panel-heading -->
                                          <!-- begin panel-body -->
                                          <div class="panel-body panel-form">
                                            <div class="container"><br>
                                               <div class="form-group">
                                               <label class="col-sm-6 control-label">Name (Nama)</label>
                                   <div class="col-sm-4">                                      
                                     <input type="text" class="form-control" id="nama" name="nama2" placeholder="Name">
                                   </div>
                                 </div>
                                   <div class="form-group">
                                    <label class="col-sm-6 control-label">Company (Perusahaan)</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="perusahaan" name="perusahaan2" placeholder="Company">
                                  </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-6 control-label">Address (Alamat)</label>
                                    <div class="col-sm-8">
                                        <textarea name="alamat2" class="form-control" id="alamat" cols="30" rows="10" placeholder="Jl. ..."></textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-6 control-label">Phone Number (No. Telp)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="telp" name="telp2" placeholder="(+62)">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-6 control-label">Email (Email)</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" id="email" name="email2" placeholder="name@gmail.com">
                                    </div>
                                 </div>
                                <div class="form-group">
                                      <label class="col-sm-6 control-label">Label (Label)</label>
                                      <div class="col-sm-4">
                                        <select class="form-control" id="label" name="label2">
                                          <option>-- Label -- </option>
                                          <option>Customer</option>
                                          <option>Hot Lead</option>
                                          <option>Cold Lead</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">Owner</label>
                                    <div class="col-sm-4">
                                    <?php
                                      $nama=$_SESSION["username"];

                                      $sql2 = "SELECT * FROM karyawan where email='$nama'";
                                          $query2 = mysqli_query($conn, $sql2);
                      
                                          while($data = mysqli_fetch_array($query2)){                                          
                                            $nama = $data['nama'];        
                                            $id = $data['id'];        
                                          }
                                          ?>
                                        <input type="text" class="form-control" id="owner" name="owner2" value="<?php echo ($nama); ?>" disabled>                              
                                        <input type="hidden" class="form-control" id="idkrywn" name="idkrywn" value="<?php echo ($id); ?>">
                                    </div>                                    
                                 </div><br>




<br>
                                      <div class="row">
                                      <div class="col-sm-8">
                                    <button type="submit" name="daftar" value="daftar" class="btn btn-info btn-xl">Submit</button>
                                  </div>
                                </div>
                                <?php
                              }
                                ?>

                                  <br><br>
                                                  </form>
                                                                  </div>
                                                                </div>

                                                                </div>


            <!-- end of content area 2 -->

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">SmartMarbleandBath</a>, All rights reserved.</p>
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
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
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

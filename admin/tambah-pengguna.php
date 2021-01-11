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
include("../header.php");
?>
<body>
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show">
    <div class="material-loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
      </svg>
      <div class="message">Loading...</div>
    </div>
  </div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">
    <?php
    include("../top-menu.php");
    ?>
    <?php
    include("../sidenav-menu.php");
    ?>
    <body>
      <!-- begin #content -->
      <div id="content" class="content">
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item active">Tambah User</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Tambah User Baru</h1>
        <!-- begin panel -->
        <div class="row">
          <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-plugins-1">
              <!-- begin panel-heading -->
              <div class="panel-heading">
                <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                </div>
                <h4 class="panel-title">Tambah User</h4>
              </div>
              <!-- end panel-heading -->
              <!-- begin panel-body -->
              <div class="panel-body panel-form">
                <form action="" method="post" class="form-horizontal form-bordered" >
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">User Name</label>
                        <div class="col-md-8">
                          <div class="input-group" id="">
                            <input class="form-control" type="text" placeholder="Nama Customer Toko" name="username" id="User name" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Password</label>
                        <div class="col-md-8">
                          <div class="input-group" id="">
                            <input class="form-control" type="password" placeholder="Password" name="password" id="Password" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">E-Mail</label>
                        <div class="col-md-8">
                          <div class="input-group" id="">
                            <input class="form-control" type="email" placeholder="E-Mail" name="email" id="Email" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Level</label>
                        <div class="col-md-8">
                          <select class="default-select2 form-control" name="level" id="Level" required>
                            <option disabled selected>-Pilih-</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 m-t-30 m-b-30 text-center">
              <button type="submit" data-click="swal-success" name="tambah_pengguna" class="btn btn-lg btn-primary m-b-30 float-right"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Tambah User</button>
            </div></form>
          </div>
          <!-- end panel -->
          <?php
          include("../footer.php");
          ?>
        </div>
      </body>
    </html>
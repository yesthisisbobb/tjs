
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
<?php
  include("../../header.php");
?>
<!DOCTYPE html>
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
  include("../../top-menu.php");
?>
<?php
  include("../../sidenav-menu.php");
?>
      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item active">Master Data Kategori Gudang</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Data Kategori Gudang</h1>
<button class="btn btn-default btn-sm m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Tambah</button>
     <button class="btn btn-default btn-sm m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Update</button>
<button class="btn btn-default btn-sm m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Hapus</button>

	    <!-- end page-header -->

	    <div id="add_show">
          <div class="row">

            <div class="col-lg-12">
              <!-- begin panel -->
              <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                  <h4 class="panel-title">Master Kategori Gudang</h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body panel-form">
                  <div class="container">
                    <form class="form-horizontal" method="post" action="proses-katgdg.php">

                          <div class="form-group">
                              <label class="col-sm-6 control-label">Divisi</label>
                              <div class="col-sm-6">
                              <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-6 control-label">Keterangan</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="ket" name="ket">
                              </div>
                              </div>
                                  <div class="form-group">
                                      <label class="col-sm-10 control-label">Status</label>
                                      <div class="col-sm-2">
                                        <select class="form-control" id="status" name="status">
                                          <option>Aktif</option>
                                				  <option>Tidak Aktif</option>
                                			</select>
                                    </div>
                                    </div>
                                    <button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button>
                                    <br><br>
                                  </form>
                  </div>
                  </div>
                </div>
              </div>

              <!-- end panel -->



            </div>
          </div>


<!-- begin panel -->



<?php
  include("../../footer.php");
?>
    <script type="text/javascript">
      function myFunction() {
      var element = document.getElementById("add_show");
      element.classList.toggle("hide");
      }
    </script>
</div>
	</body>
    </html>

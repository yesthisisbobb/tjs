
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
          <li class="breadcrumb-item active">Master Data Cabang</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Data Cabang</h1>
<!-- <button class="btn btn-default btn-sm m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Tambah</button>
     <button class="btn btn-default btn-sm m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Update</button>
<button class="btn btn-default btn-sm m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Hapus</button> -->

	    <!-- end page-header -->

	    <div id="add_show">
          <div class="row">

            <div class="col-lg-12">
              <!-- begin panel -->
              <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                  <h4 class="panel-title">Master Cabang</h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body panel-form">
                  <div class="container">
                    <form class="form-horizontal" method="post" action="proses-cabang.php">

                          <div class="form-group">
                              <label class="col-sm-6 control-label">Cabang</label>
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


          <div id="add_show">
              <div class="row">

                <div class="col-lg-12">
                  <!-- begin panel -->
                  <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                    <!-- begin panel-heading -->
                    <div class="panel-heading">
                      <h4 class="panel-title">Master Divisi</h4>
                    </div>
                    <!-- end panel-heading -->
                    <!-- begin panel-body -->
                    <div class="panel-body">
                      <div class="container">
                        <table id="data-table-buttons" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th width="1%">ID</th>
                              <th class="text-nowrap">Nama Cabang</th>
                              <th class="text-nowrap">Keterangan</th>
                              <th class="text-nowrap">Status</th>
                              <th class="text-nowrap">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                               $no = 1;
                               $pg = mysqli_query($conn,"SELECT * FROM cabang ORDER BY kode ASC");
                               $jumlahPengguna = mysqli_num_rows($pg);
                               while ($val = mysqli_fetch_assoc($pg)) {
                            ?>
                            <tr class="odd gradeX">
                              <td width="1%" class="f-s-600 text-inverse"><?=$no;?></td>
                              <td><?=$val["nm_cabang"];?></td>
                              <td><?=$val["keterangan"];?></td>
                              <td><?=$val["status"];?></td>
                              <td class="with-btn" nowrap="">
                                <button class="btn btn-sm btn-primary" onclick="myFunction()" data-toggle="modal"><i class="fas fa-md fa-fw fa-pencil-alt"></i></button>
                                <a href="#modal-dialog" class="btn btn-sm btn-primary" data-toggle="modal"><i class="fab fa-md fa-fw fa-sistrix"></i></a>
                                <a href="#" class="btn btn-sm btn-primary"><i class="far fa-md fa-fw fa-trash-alt"></i></a>
                              </td>
                           <?php $no++; } ?>
                            </tr>
                          </tbody>
                        </table>




                      </div>
                      </div>
                    </div>
                  </div>

                  <!-- end panel -->



                </div>
              </div>




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

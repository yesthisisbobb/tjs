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
      
      
      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item active">Daftar Level User</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Daftar Level User</h1>

<!-- begin panel -->
        <div class="row">
          <!-- begin col-2 -->
          <!-- end col-2 -->
          <!-- begin col-10 -->
          <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
              <!-- begin panel-heading -->
              <div class="panel-heading">
                <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                </div>
                <h4 class="panel-title">List Data User</h4>

              </div>
              <!-- end panel-heading -->
              <!-- begin alert -->
              <!-- end alert -->
              <!-- begin panel-body -->
              <div class="panel-body">
                <table id="data-table-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th width="1%">ID</th>
                      <th class="text-nowrap">Nama</th>
                      <th class="text-nowrap">Email</th>
                      <th class="text-nowrap">Level</th>
                      <th class="text-nowrap">Tgl. Daftar</th>
                      <th class="text-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                       $no = 1;
                       $pg = mysqli_query($conn,"SELECT * FROM login ORDER BY id DESC");
                       $jumlahPengguna = mysqli_num_rows($pg);
                       while ($val = mysqli_fetch_assoc($pg)) {
                    ?>
                    <tr class="odd gradeX">
                      <td width="1%" class="f-s-600 text-inverse"><?=$no;?></td>
                      <td><?=$val["username"];?></td>
                      <td><?=$val["email"];?></td>
                      <td><?=$val["level"];?></td>
                      <td><?=$val["date"];?></td>
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
              <!-- end panel-body -->
            </div>
            <!-- end panel -->
          </div>
          <!-- end col-10 -->
        </div>
        <!-- end panel -->

<?php
  include("../footer.php");
?>
</div>
	</body>
    </html>
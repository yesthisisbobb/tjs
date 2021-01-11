
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
          <li class="breadcrumb-item active">Master Product Type</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Product Type <a href="master_tipe.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>
        <table id="data-table-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->

              <th class="text-nowrap">Group Name</th>
              <th class="text-nowrap">Sub Group Name</th>
                <th class="text-nowrap">Status</th>
              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
              $sql = "SELECT * FROM master_sub_grup ORDER BY id ASC";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">


              <td><?=$amku["namagrup"];?></td>
              <td><?=$amku["nama"];?></td>
              <td><?=$amku["status"];?></td>
              <td class="with-btn" nowrap="">

                <a href="master_sub_grup.php?aksi=view&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-master-subgrup.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-master-subgrup.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="btn btn-success btn btn-sm" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-master-subgrup.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-trash"></i></a>

                  </td>
           <?php } ?>
            </tr>
          </tbody>
        </table>

	    <!-- end page-header -->
      <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
                    <form class="form-horizontal" method="post" action="proses-master-subgrup.php">
                      <?php
                      $aksi=$_GET['aksi'];
                      if ($aksi=="view")
                      {
                        $nomerku=$_GET['no'];
                        $sql = "SELECT * FROM master_sub_grup where id='$nomerku'";
                             $query = mysqli_query($conn, $sql);
                             while($amku = mysqli_fetch_array($query)){
                               $kodep=$amku['kode'];
                               $namag=$amku['namagrup'];
                               $namap=$amku['nama'];
                               $nom=$amku['id'];
                             }
                        ?>
                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                          <!-- begin panel-heading -->
                          <div class="panel-heading">
                            <h4 class="panel-title">View/Update Product Group</h4>
                          </div>
                          <!-- end panel-heading -->
                          <!-- begin panel-body -->
                          <div class="panel-body panel-form">
                            <div class="container">
                              <div class="form-group">
                                <!-- <label class="col-sm-10 control-label">No.</label> -->
                                <div class="col-sm-2">
                                  <input type="hidden" class="form-control" id="nom" value="<?php echo $nom; ?>" name="nom">
                               </div>
                               <div><BR>
                               <ul class="nav nav-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                   <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                 </li>
                                 <li class="nav-item">
                                   <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Finance</a>
                                 </li>

                               </ul>
                               <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 <div class="form-group">
                                     <label class="col-sm-8 control-label">Product Group Code</label>
                                     <div class="col-sm-4">
                                       <select name="kodemastergrup" id="kodemastergrup" class="form-control">
                                         <option><?php echo $namag; ?></option>
                                       <?php
                                         $sql = "SELECT * FROM master_sub_grup";
                                              $query = mysqli_query($conn, $sql);
                                              while($amku = mysqli_fetch_array($query)){

                                             echo '<option>'.$amku['nama'].'</option>';
                                           }
                                         ?>
                                       </select>

                                   </div>
                                   </div>

                                   <div class="form-group">
                                       <label class="col-sm-8 control-label">Product Sub Group Code</label>
                                       <div class="col-sm-4">
                                       <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodep; ?>">
                                     </div>
                                     </div>

                                     <div class="form-group">
                                         <label class="col-sm-4 control-label">Product Sub Group Name</label>
                                         <div class="col-sm-8">
                                         <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $namap; ?>">
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
                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                      <?php } else { ?>

                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                          <!-- begin panel-heading -->
                          <div class="panel-heading">
                            <h4 class="panel-title">Add New Product Type</h4>
                          </div>
                          <!-- end panel-heading -->
                          <!-- begin panel-body -->
                          <div class="panel-body panel-form">
                            <div class="container">
                              <!-- <form class="form-horizontal" method="post" action="proses-perusahaan.php"> -->
                              <div class="form-group">
                                  <label class="col-sm-8 control-label">Product Group Code</label>
                                  <div class="col-sm-6">
                                    <select name="kodemastergrup" id="kodemastergrup" class="form-control">
                                      <option>Nama Grup</option>
                                    <?php
                                      $sql = "SELECT * FROM detail_sub_grup";
                                           $query = mysqli_query($conn, $sql);
                                           while($amku = mysqli_fetch_array($query)){
                                          echo '<option>'.$amku['nama'].'</option>';
                                        }
                                      ?>
                                    </select>

                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-8 control-label">Type Code</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" id="kode" name="kode">
                                  </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">Product Sub Group Name</label>
                                      <div class="col-sm-8">
                                      <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Length</label>
                                        <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nama" name="nama">
                                      </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">Width</label>
                                          <div class="col-sm-4">
                                          <input type="text" class="form-control" id="nama" name="nama">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Height</label>
                                            <div class="col-sm-4">
                                            <input type="text" class="form-control" id="nama" name="nama">
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
                <?php
              }
                ?>

                  <br><br>
                                  </form>
                                </div>
                                </div>
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

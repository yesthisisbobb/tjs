
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
          <li class="breadcrumb-item active">Master Product Sub Category</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Product Sub Category <a href="master_sub_grup.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>
        <table id="data-table-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->

              <th class="text-nowrap">Product Category</th>
              <th class="text-nowrap">Product Sub Category</th>

              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
              $sql = "SELECT * FROM master_sub_grup where status='ACTIVE' ORDER BY id ASC";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">


              <td><?=$amku["namagrup"];?></td>
              <td><?=$amku["nama"];?></td>

              <td class="with-btn" nowrap="">

                <a href="master_sub_grup.php?aksi=view&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-master-subgrup.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="btn btn-primary  btn btn-xs" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-master-subgrup.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="btn btn-primary  btn btn-xs" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-master-subgrup.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="btn btn-primary  btn btn-xs" role="button"><i class="fa fa-trash"></i></a>

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
                            <h4 class="panel-title">View/Update Product Sub Category</h4>
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
                               <div>
                                 <div class="form-group">
                                     <label class="col-sm-8 control-label">Product Category Name</label>
                                     <div class="col-sm-4">
                                       <select name="kodemastergrup" id="kodemastergrup" class="form-control">
                                         <option><?php echo $namag; ?></option>
                                       <?php
                                         $sql = "SELECT * FROM master_grup";
                                              $query = mysqli_query($conn, $sql);
                                              while($amku = mysqli_fetch_array($query)){

                                             echo '<option>'.$amku['nama'].'</option>';
                                           }
                                         ?>
                                       </select>

                                   </div>
                                   </div>

                                   <div class="form-group">
                                       <label class="col-sm-8 control-label">Product Sub Category Code</label>
                                       <div class="col-sm-4">
                                       <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodep; ?>">
                                     </div>
                                     </div>

                                     <div class="form-group">
                                         <label class="col-sm-4 control-label">Product Sub Category Name</label>
                                         <div class="col-sm-8">
                                         <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $namap; ?>">
                                       </div>
                                       </div>
                                             <div class="form-group">
                                                 <label class="col-sm-10 control-label">Status</label>
                                                 <div class="col-sm-2">
                                                   <select class="form-control" id="status" name="status">
                                                     <option>Active</option>
                                                     <option>Inactive</option>
                                                 </select>
                                               </div>
                                               </div>
                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                      <?php } else { ?>

                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                          <!-- begin panel-heading -->
                          <div class="panel-heading">
                            <h4 class="panel-title">Add New Product Sub Category</h4>
                          </div>
                          <br>
                          <!-- end panel-heading -->
                          <!-- begin panel-body -->
                          <div class="panel-body panel-form">
                            <div class="container">
                              <!-- <form class="form-horizontal" method="post" action="proses-perusahaan.php"> -->
                              <div class="form-group">

                                  <div class="col-sm-4">
                                    <select name="kodemastergrup" id="kodemastergrup" class="form-control">
                                      <option>Product Category</option>
                                    <?php
                                      $sql = "SELECT * FROM master_grup";
                                           $query = mysqli_query($conn, $sql);
                                           while($amku = mysqli_fetch_array($query)){
                                          echo '<option>'.$amku['nama'].'</option>';
                                        }
                                      ?>
                                    </select>

                                </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Product Sub Category Code">
                                  </div>
                                  </div>

                                  <div class="form-group">

                                      <div class="col-sm-8">
                                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Product Sub Category Name">
                                    </div>
                                    </div>
                                          <div class="form-group">

                                              <div class="col-sm-2">
                                                <select class="form-control" id="status" name="status">
                                                  <option>-- Status --</option>
                                                  <option>Active</option>
                                                  <option>Inactive</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-sm-6">
                    <button type="submit" name="daftar" value="daftar" class="btn btn-primary">Submit</button>
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

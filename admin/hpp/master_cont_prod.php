
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
          <li class="breadcrumb-item active">Product Unit per Container</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Product Unit per Container <a href="master_cont_prod.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>

	    <!-- end page-header -->
      <table id="data-table-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <!-- <th width="1%">No</th> -->

            <th class="text-nowrap">Detail Sub Group Product</th>
            <th class="text-nowrap">Container Type</th>
            <th class="text-nowrap">Loading Limit</th>
            <th class="text-nowrap">Unit</th>

              <th class="text-nowrap">Status</th>
            <th class="text-nowrap">Action</th>
          </tr>
        </thead>
        <tbody>


          <?php
            $sql = "SELECT * FROM master_cont_prod ORDER BY no";
                 $query = mysqli_query($conn, $sql);
                 while($amku = mysqli_fetch_array($query)){
            ?>
          <tr class="odd gradeX">


            <td><?=$amku["kodeprd"];?></td>
            <td><?=$amku["kode"];?></td>

            <td><?=$amku["ll"];?></td>
            <td><?=$amku["unit"];?></td>
            <td><?=$amku["status"];?></td>
            <td class="with-btn" nowrap="">

              <a href="master_cont_prod.php?aksi=view&no=<?php echo $amku["no"]; ?>" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-pencil-alt"></i></a>
              <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                <a href="proses-cont_prod.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-minus"></i></a>
                <a href="proses-cont_prod.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="btn btn-success btn btn-sm" role="button"><i class="fa fa-check"></i></a>
              <a href="proses-cont_prod.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-trash"></i></a>

                </td>
         <?php } ?>
          </tr>
        </tbody>
      </table>
      <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
                    <form class="form-horizontal" method="post" action="proses-cont_prod.php">
                      <?php
                      $aksi=$_GET['aksi'];
                      if ($aksi=="view")
                      {
                        $nomerku=$_GET['no'];
                        $sql = "SELECT * FROM master_cont_prod where no='$nomerku'";
                             $query = mysqli_query($conn, $sql);
                             while($amku = mysqli_fetch_array($query)){
                               $kodeprd=$amku['kodeprd'];
                               $kode=$amku['kode'];
                               $ll=$amku['ll'];
                               $unit=$amku['unit'];
                               $nom=$amku['no'];
                             }
                        ?>
                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                          <!-- begin panel-heading -->
                          <div class="panel-heading">
                            <h4 class="panel-title">View/Update </h4>
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
                             </div>

                             <div class="form-group">
                               <label class="col-sm-6 control-label">Sub Detail Product Group</label>
                               <div class="col-sm-4">
                               <select name="kodeprd" id="kodeprd" class="form-control">
                                  <option value=<?php echo $kodeprd; ?>><?php echo $kodeprd; ?></option>
                               <?php
                                 $sql = "SELECT * FROM detail_sub_grup";
                                      $query = mysqli_query($conn, $sql);
                                      while($amku = mysqli_fetch_array($query)){
                                     echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                   }
                                 ?>
                               </select>
                             </div>
                           </div>
                           <div class="form-group">
                           <label class="col-sm-6 control-label">Container Type</label>
                           <div class="col-sm-2">
                           <select name="kode" id="kode" class="form-control">
                             <option value=<?php echo $kode; ?>><?php echo $kode; ?></option>
                           <?php
                           $sql = "SELECT * FROM master_cont";
                           $query = mysqli_query($conn, $sql);
                           while($amku = mysqli_fetch_array($query)){
                           echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                           }
                           ?>
                           </select>
                           </div>
                           </div>


                           <div class="form-group">
                            <label class="col-sm-6 control-label">Loading Limit</label>
                            <div class="col-sm-4">
                              <select class="form-control" id="ll" name="ll">
                                <option value=<?php echo $ll; ?>><?php echo $ll; ?></option>
                                <option>Tonnage</option>

                            </select>
                          </div>
                          </div>
                          <div class="form-group">
                           <label class="col-sm-6 control-label">Unit</label>
                           <div class="col-sm-4">
                             <select class="form-control" id="unit" name="unit">
                               <option value=<?php echo $unit; ?>><?php echo $unit; ?></option>
                               <option>M2</option>
                           </select>
                         </div>
                         </div>
                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                      <?php } else { ?>

                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                          <!-- begin panel-heading -->
                          <div class="panel-heading">
                            <h4 class="panel-title">Add New Product Unit / Container</h4>
                          </div>
                          <!-- end panel-heading -->
                          <!-- begin panel-body -->
                          <div class="panel-body panel-form">
                            <div class="container">
                              <!-- <form class="form-horizontal" method="post" action="proses-perusahaan.php"> -->

                              <div class="form-group">
                                <label class="col-sm-6 control-label">Sub Detail Product Group</label>
                                <div class="col-sm-4">
                                <select name="kodeprd" id="kodeprd" class="form-control">
                                  <option>Sub Detail Group</option>
                                <?php
                                  $sql = "SELECT * FROM detail_sub_grup";
                                       $query = mysqli_query($conn, $sql);
                                       while($amku = mysqli_fetch_array($query)){
                                      echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                    }
                                  ?>
                                </select>
                              </div>
                            </div>
                 <div class="form-group">
                   <label class="col-sm-6 control-label">Container Type</label>
                   <div class="col-sm-2">
                   <select name="kode" id="kode" class="form-control">
                     <option>Container Type</option>
                   <?php
                     $sql = "SELECT * FROM master_cont";
                          $query = mysqli_query($conn, $sql);
                          while($amku = mysqli_fetch_array($query)){
                         echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                       }
                     ?>
                   </select>
                 </div>
               </div>
                   <div class="form-group">
                    <label class="col-sm-6 control-label">Loading Limit</label>
                    <div class="col-sm-4">
                      <select class="form-control" id="ll" name="ll">
                        <option>Tonnage</option>

                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                   <label class="col-sm-6 control-label">Unit</label>
                   <div class="col-sm-4">
                     <select class="form-control" id="unit" name="unit">
                       <option>M2</option>
                   </select>
                 </div>
                 </div>
                  <div class="form-group">
                      <label class="col-sm-10 control-label">Status</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="status" name="status">
                          <option>Active</option>
                          <option>InActive</option>
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

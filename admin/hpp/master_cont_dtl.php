
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
          <li class="breadcrumb-item active">Master Capacity of Container</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Capacity of Container <a href="master_cont_dtl.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>

	    <!-- end page-header -->
      <table id="data-table-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <!-- <th width="1%">No</th> -->

            <th class="text-nowrap">Container Type</th>
            <th class="text-nowrap">Standard Tonnage</th>
            <th class="text-nowrap">Standard Volume</th>
              <th class="text-nowrap">Status</th>
            <th class="text-nowrap">Action</th>
          </tr>
        </thead>
        <tbody>


          <?php
            $sql = "SELECT * FROM master_contdtl ORDER BY no";
                 $query = mysqli_query($conn, $sql);
                 while($amku = mysqli_fetch_array($query)){
            ?>
          <tr class="odd gradeX">


            <td><?=$amku["kode"];?></td>
            <td><?=$amku["stc"];?></td>
            <td><?=$amku["svc"];?></td>
            <td><?=$amku["status"];?></td>
            <td class="with-btn" nowrap="">

              <a href="master_cont_dtl.php?aksi=view&no=<?php echo $amku["no"]; ?>" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-pencil-alt"></i></a>
              <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                <a href="proses-cont_dtl.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-minus"></i></a>
                <a href="proses-cont_dtl.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="btn btn-success btn btn-sm" role="button"><i class="fa fa-check"></i></a>
              <a href="proses-cont_dtl.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-trash"></i></a>

                </td>
         <?php } ?>
          </tr>
        </tbody>
      </table>
      <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
                    <form class="form-horizontal" method="post" action="proses-cont_dtl.php">
                      <?php
                      $aksi=$_GET['aksi'];
                      if ($aksi=="view")
                      {
                        $nomerku=$_GET['no'];
                        $sql = "SELECT * FROM master_contdtl where no='$nomerku'";
                             $query = mysqli_query($conn, $sql);
                             while($amku = mysqli_fetch_array($query)){
                               $kodep=$amku['kode'];
                               $stcku=$amku['stc'];
                               $svcku=$amku['svc'];
                               $nom=$amku['no'];
                             }
                        ?>
                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                          <!-- begin panel-heading -->
                          <div class="panel-heading">
                            <h4 class="panel-title">View/Update Container</h4>
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
                           <label class="col-sm-6 control-label">Container Type</label>
                         <div class="col-sm-4">
                         <select name="kode" id="kode" class="form-control">
                           <option value=<?php echo $kodep; ?>><?php echo $kodep; ?></option>
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
                          <label class="col-sm-6 control-label">Standard Tonnage</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="stc" value="<?php echo $stcku; ?>" name="stc">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-6 control-label">Standard Volume</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" id="svc" value="<?php echo $svcku; ?>" name="svc">
                  </div>
                </div>
                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                      <?php } else { ?>

                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                          <!-- begin panel-heading -->
                          <div class="panel-heading">
                            <h4 class="panel-title">Add New Container</h4>
                          </div>
                          <!-- end panel-heading -->
                          <!-- begin panel-body -->
                          <div class="panel-body panel-form">
                            <div class="container">
                              <!-- <form class="form-horizontal" method="post" action="proses-perusahaan.php"> -->

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
                    <label class="col-sm-6 control-label">Standard Tonnage</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" id="stc" name="stc">
                  </div>
                  </div>
                  <div class="form-group">
                   <label class="col-sm-6 control-label">Standard Volume</label>
                   <div class="col-sm-4">
                   <input type="text" class="form-control" id="svc" name="svc">
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

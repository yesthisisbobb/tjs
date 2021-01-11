
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
  <?php
  $kodetjs=$_GET["kode"];
  ?>
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
          <li class="breadcrumb-item active">Shading Stock</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Shading Stock</h1>
        <div class="container">
          <table id="data-table-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <!-- <th width="1%">No</th> -->

                <th class="text-nowrap">Temp Code</th>
                <th class="text-nowrap">TJS Code</th>
                <th class="text-nowrap">Shading</th>
                <th class="text-nowrap">Qty</th>
                <th class="text-nowrap">WH</th>
                <th class="text-nowrap">Action</th>
              </tr>
            </thead>
            <tbody>


              <?php
                $sql = "SELECT * FROM master_shading where kode_stok='$kodetjs'";
                     $query = mysqli_query($conn, $sql);
                     while($amku = mysqli_fetch_array($query)){
                ?>
              <tr class="odd gradeX">

                <td><?=$amku["tempcode"];?></td>
                <td><?=$amku["kode_stok"];?></td>
                <td><?=$amku["kd_shading"];?></td>
                <td><?=$amku["jum"];?></td>
                <td><?=$amku["gudang"];?></td>

                <td class="with-btn" nowrap="">

                  <a href="master_shading_stok.php?aksi=view&kode=<?php echo $kodetjs; ?>&no=<?php echo $amku["no"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-pencil-alt"></i></a>
                  <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                    <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-minus"></i></a>
                    <a href="proses-master-grup.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-check"></i></a>
                  <a href="proses-stok-shading.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-trash"></i></a>

                    </td>
             <?php } ?>
              </tr>
            </tbody>
          </table>
        </div>
	    <!-- end page-header -->
	    <div id="add_show">
          <div class="row">
            <div class="col-sm-12">
              <!-- begin panel -->
              <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                  <h4 class="panel-title">Master Shading Stok </h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->

             <!-- end panel -->

<div class="container">

    <form class="form-horizontal" method="post" action="proses-stok-shading.php">
      <?php
      $aksi=$_GET['aksi'];
      if ($aksi=="view")
      {
        $nomerku=$_GET['no'];
        $sql = "SELECT * FROM master_shading where no='$nomerku'";
             $query = mysqli_query($conn, $sql);
             while($amku = mysqli_fetch_array($query)){
               $tempcode1=$amku['tempcode'];
               $shading1=$amku['kd_shading'];
               $jum=$amku['jum'];
               $temp1=$amku['tempcode'];
               $status=$amku['status'];
               $nom=$amku['no'];
             }

        ?>
              <div class="form-group">
                <!-- <label class="col-sm-10 control-label">No.</label> -->
                <div class="col-sm-2">
                  <input type="hidden" class="form-control" id="nom" value="<?php echo $nom; ?>" name="nom">
               </div>
             </div>

             <div class="form-group">
               <label class="control-label col-sm-8 ">TJS Code </label>
               <div class="col-sm-4">
             <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodetjs; ?>">
           </div>
           </div>

      <hr>

      <div class="form-group">
       <label class="control-label col-sm-8 ">Ventura Temporary Code</label>
       <div class="col-sm-4">
         <select name="tempcode" id="tempcode" class="form-control">
           <option><?php echo $temp1; ?></option>
         <?php
           $sql = "SELECT * FROM tempcode";
                $query = mysqli_query($conn, $sql);
                while($amku = mysqli_fetch_array($query)){
               echo "<option value=".$amku['tempcode'].">".$amku['tempcode']."</option>";
             }
           ?>
         </select>
      </div>
      </div>

       <div class="form-group">
           <label class="control-label col-sm-8 ">Shading Code </label>
           <div class="col-sm-4">
         <input type="text" class="form-control" id="kode_shading" name="kode_shading" value="<?php echo $shading1;?>">
       </div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-8 ">Qty </label>
         <div class="col-sm-4">
       <input type="text" class="form-control" id="jum" name="jum" value="<?php echo $jum;?>">
      </div>
      </div>


       <div class="row">
         <div class=" col-sm-8">
           <div class="form-group">
               <label class="control-label col-sm-8 ">Status</label>
               <div class="col-sm-4">
                 <select class="form-control" id="status" name="status">
                   <option><?php echo $status; ?></option>
                   <option>Active</option>
                   <option>InActive</option>
                   </select>
           </div>
         </div>
         </div>
       </div>
       <div class=" col-sm-8">
         <div class="form-group">

             <div class="col-sm-4">
             <button type="submit" name="daftar1" value="daftar" class="btn btn-default">Update</button> <br><br>
         </div>
       </div>
       </div>
      <?php } else { ?>
          <div class="form-group">
            <label class="control-label col-sm-8 ">TJS Code </label>
            <div class="col-sm-4">
          <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodetjs; ?>">
        </div>
        </div>

<hr>

<div class="form-group">
    <label class="control-label col-sm-8 ">Ventura Temporary Code</label>
    <div class="col-sm-4">
      <select name="tempcode" id="tempcode" class="form-control">
      <?php
        $sql = "SELECT * FROM tempcode";
             $query = mysqli_query($conn, $sql);
             while($amku = mysqli_fetch_array($query)){
            echo "<option value=".$amku['tempcode'].">".$amku['tempcode']."</option>";
          }
        ?>
      </select>
</div>
</div>

    <div class="form-group">
        <label class="control-label col-sm-8 ">Shading Code </label>
        <div class="col-sm-4">
      <input type="text" class="form-control" id="kode_shading" name="kode_shading">
    </div>
  </div>
  <div class="form-group">
      <label class="control-label col-sm-8 ">Qty </label>
      <div class="col-sm-4">
    <input type="text" class="form-control" id="jum" name="jum">
  </div>
</div>


    <div class="row">
      <div class=" col-sm-8">
        <div class="form-group">
            <label class="control-label col-sm-8 ">Status</label>
            <div class="col-sm-4">
              <select class="form-control" id="status" name="status">
                <option>Status</option>
                <option>Active</option>
                <option>InActive</option>
                </select>
        </div>
      </div>
      </div>
    </div>
    <div class=" col-sm-8">
      <div class="form-group">

          <div class="col-sm-4">
          <button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button> <br><br>
      </div>
    </div>
    </div>
    <?php
    }
    ?>

</form>
<script type="text/javascript">
 $(document).ready(function() {
     $('#tempcode').select2();
 });
</script>

</div>
            </div>
          </div>
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

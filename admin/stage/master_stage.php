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
<style>
.bundar {
border-radius: 0.5em;
}
</style>
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
          <li class="breadcrumb-item active">Master Stage</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Stage<a href="master_tipe.php" class="bundar btn btn-info btn btn-sm" role="button">Add</a></h1>

        <table id="data-table-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->


              <th class="text-nowrap">Id.</th>
              <th class="text-nowrap">Stage</th>
              <th class="text-nowrap">Description</th>

                <th class="text-nowrap">Status</th>
              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
              $sql = "SELECT * FROM stage ORDER BY no";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">


              <td><?=$amku["no"];?></td>
              <td><?=$amku["nilai"];?></td>
              <td><?=$amku["ket"];?></td>
              <td><?=$amku["status"];?></td>
              <td class="with-btn" nowrap="">

                <a href="master_tipe.php?aksi=view&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-tipe.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-tipe.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-tipe.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-trash"></i></a>

                  </td>
           <?php } ?>
            </tr>
          </tbody>
        </table>

      <!-- end page-header -->

      <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
              <!-- begin panel -->


  <form class="form-horizontal" method="post" action="proses-stage.php">
                              <?php
                              $aksi=$_GET['aksi'];
                              if ($aksi=="view")
                              {
                                $nomerku=$_GET['no'];
                                $sql = "SELECT * FROM master_tipe where id='$nomerku'";
                                     $query = mysqli_query($conn, $sql);
                                     while($amku = mysqli_fetch_array($query)){
                                       $namag=$amku['kodegrup'];
                                       $kodep=$amku['kode'];
                                       $namap=$amku['nama'];
                                       $shading=$amku['shading'];
                                       $faces=$amku['faces'];
                                       $color=$amku['color'];
                                      $surface=$amku['surface'];
                                      $pattern=$amku['pattern'];
                                      $status=$amku['status'];


                                       $nom=$amku['id'];
                                     }
                                ?>

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
                                         <BR>
                                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                                           <li class="nav-item">
                                             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                           </li>


                                         </ul>
                                         <div class="tab-content" id="myTabContent">
                                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                                                                 <div class="form-group">
                                                                                     <label class="col-sm-8 control-label">Product Group Code <font color="red"><i> *required</i></font></label>
                                                                                     <div class="col-sm-6">
                                                                                       <select name="kodegrup" id="kodegrup" class="form-control">
                                                                                         <option><?php echo $namag; ?></option>
                                                                                       <?php
                                                                                         $sql = "SELECT * FROM detail_sub_grup";
                                                                                              $query = mysqli_query($conn, $sql);
                                                                                              while($amku = mysqli_fetch_array($query)){
                                                                                             echo '<option value='.$amku['nama'].'>'.$amku['nama'].'-'.$amku['hscode'].'</option>';
                                                                                           }
                                                                                         ?>
                                                                                       </select>

                                                                                   </div>
                                                                                   </div>
                                             <div class="form-group">
                                                 <label class="col-sm-8 control-label">Product Type Code</label>
                                                 <div class="col-sm-6">
                                                 <input readonly type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodep; ?>">
                                               </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="col-sm-4 control-label">Product Type Name <font color="red"><i> *required</i></font></label>
                                                   <div class="col-sm-8">
                                                   <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $namap; ?>">
                                                 </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label class="col-sm-10 control-label">Shading</label>
                                                     <div class="col-sm-2">
                                                       <select class="form-control" id="shading" name="shading">
                                                         <option><?php echo $shading; ?></option>
                                                         <option>Yes</option>
                                                         <option>No</option>
                                                     </select>
                                                   </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label class="col-sm-4 control-label">Faces</label>
                                                     <div class="col-sm-4">
                                                     <input type="text" class="form-control" id="faces" name="faces" value="<?php echo $faces; ?>">
                                                       <span><font color="Red">*Leave Empty if no available value</font></span>
                                                   </div>
                                                   </div>
                                                   <div class="form-group">
                                                       <label class="col-sm-4 control-label">Surface</label>
                                                       <div class="col-sm-4">
                                                       <input type="text" class="form-control" id="surface" name="surface" value="<?php echo $surface; ?>">
                                                         <span><font color="Red">*Leave Empty if no available value</font></span>
                                                     </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="col-sm-4 control-label">Colour</label>
                                                         <div class="col-sm-4">
                                                         <input type="text" class="form-control" id="color" name="color" value="<?php echo $color; ?>">
                                                           <span><font color="Red">*Leave Empty if no available value</font></span>
                                                       </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="col-sm-4 control-label">Pattern</label>
                                                           <div class="col-sm-4">
                                                           <input type="text" class="form-control" id="pattern" name="pattern" value="<?php echo $pattern; ?>">
                                                             <span><font color="Red">*Leave Empty if no available value</font></span>
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
                                                  <br>
                                        <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                                                  </div>
                                                   </div>



                                         </div>


                              <?php } else { ?>
                                <!-- 1. BOOTSTRAP v4.0.0         CSS !-->
                                <BR>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                  </li>

                                  <!-- <li class="nav-item">
                                    <a class="nav-link" id="att-tab" data-toggle="tab" href="#att" role="tab" aria-controls="att" aria-selected="false">Attribute</a>
                                  </li> -->

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                                      <hr>
                                      <div class="form-group">
                                          <label class="col-sm-8 control-label">Stage<font color="red"><i> *required</i></font></label>
                                          <div class="col-sm-12">
                                          <input type="text" class="bundar form-control" id="nilai" name="nilai" required>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Description<font color="red"><i> *required</i></font></label>
                                            <div class="col-sm-12">
                                            <input type="text" class="bundar form-control" id="ket" name="ket">

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
                                     <div class="form-group">
                                       <div class="col-sm-2">
                                       </div>
                                        <div class="col-sm-2">
                                     <button type="submit" name="daftar" value="daftar" class="bundar btn btn-info ">Submit</button>
                                   </div>
                                   </div>

                                            </div>




                                        <!-- <div class="tab-pane fade" id="att" role="tabpanel" aria-labelledby="att-tab">

                                  </div> -->

                                </div>







                        <?php
                      }
                        ?>

                          <br><br>
                                  </form>



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

<!DOCTYPE html>

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

<html lang="en">
<style>
h4 {
padding-left: 50px;
font-family: Montserrat;
padding-top: 20px;

}
h4.panelku {
padding-left: 30px;
font-family: Montserrat;
padding-top: 20px;

}


</style>
<html lang="en">

<?php
include('../blank_header.php')
 ?>
 <?php
 global $hal;
 $hal = "exrate";
 include('../blank_subheader.php');
 ?>

 <?php
   function rupiah($angka){

 	$hasil_rupiah = "IDR " . number_format($angka,0,',','.');
 	return $hasil_rupiah;

 }
 ?>
<body class="sidebar-noneoverflow">

    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

      <?php
      include('../blank_page.php')
      ?>
        <!--  BEGIN CONTENT AREA  -->

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
              <div class="row layout-top-spacing">
                <!-- start of content area 1 -->
                  <div id="basic" class="col-lg-12 layout-spacing">
                      <div class="statbox widget box box-shadow">

                                  <div  style="overflow-x:auto;" class="col-lg-12 col-12 mx-auto">
                <!-- start of content area 1 -->
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <!-- <th width="1%">No</th> -->

                      <th class="text-nowrap">Date</th>
                      <th class="text-nowrap">Time</th>
                      <th class="text-nowrap">Division</th>
                      <th class="text-nowrap">Curr</th>
                      <th>Rate</th>
                      <th class="text-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php
                      $sql = "SELECT * FROM master_exrate where status='Active' ORDER BY id ASC";
                           $query = mysqli_query($conn, $sql);
                           while($amku = mysqli_fetch_array($query)){
                             $tgl=$amku["tgl"];
                      ?>
                    <tr class="odd gradeX">

                      <td><?php echo date("d-M", strtotime($tgl));?></td>
                      <td><?php echo date("H:i:sa", strtotime($tgl));?></td>
                      <td><?=$amku["kode"];?></td>
                      <td><?=$amku["cur"];?></td>
                      <td><?=rupiah($amku["price"]);?></td>
                      <td class="with-btn" nowrap="">

                        <a href="master_exrate.php?aksi=view&no=<?php echo $amku["id"]; ?>#section2"><i class="fas fa-edit" style="font-size:18px;color:#5DADE2;" data-toggle="tooltip" title="EDIT" ></i></a>
                        <?php
                        $uk=$_SESSION["username"];
                        $sqluk = "SELECT * FROM login where email='$uk'";
                             $queryuk = mysqli_query($conn, $sqluk);
                             while($amkuuk = mysqli_fetch_array($queryuk)){
                               $divisiuk=$amkuuk["divisi"];
                          }
                          if ($divisiuk=="SUPERUSER")
                          {
                         ?>
                          <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>"><i class="fas fa-times-circle"  style="font-size:18px;color:#F8C471;"data-toggle="tooltip" title="DISABLE" ></i></a>
                          <a href="proses-master-grup.php?aksi=active&no=<?php echo $amku["id"]; ?>"><i class="fas fa-check-circle" style="font-size:18px;color:#52BE80;"data-toggle="tooltip" title="ENABLE" ></i></i></a>
                        <a href="proses-master-grup.php?aksi=delete&no=<?php echo $amku["id"]; ?>"><i class="fas fa-trash" style="font-size:18px;color:#CD6155;"data-toggle="tooltip" title="DELETE" ></i></i></a>
                      <?php } else { ?>
                        <i class="fas fa-times-circle"  style="font-size:18px;color:silver;"data-toggle="tooltip" title="DISABLE" ></i>
                        <i class="fas fa-check-circle" style="font-size:18px;color:silver;"data-toggle="tooltip" title="ENABLE" ></i></i>
                      <i class="fas fa-trash" style="font-size:18px;color:silver;"data-toggle="tooltip" title="DELETE" ></i></i>
                    <?php } ?>
                          </td>
                   <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>

              </div>

                  <!-- end of content area 1 -->

                  <!-- begin of content area 2 -->


                  <div id="basic" class="col-lg-12 layout-spacing">
                      <div class="statbox widget box box-shadow">
                        <?php
                        $aksi=$_GET['aksi'];
                        if ($aksi=="view")
                          {
                        ?>
                            <div class="row" id="section2">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 border-bottom border-info 1px">
                                  <h4 class="panelku" style="color:#5DADE2;">Update <span style="font-size:12px;">Modifikasi Data</span></h4>
                                </div>
                            </div>
                          <?php } else if ($aksi=="") { ?>
                            <div class="row" id="section2">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 border-bottom border-info 1px">
                                  <h4 class="panelku" style="color:#5DADE2;">Add New <span style="font-size:12px;">Tambah Data</span></h4>
                                </div>
                            </div><?php } ?>
  <br>
                                  <div class="col-lg-12 col-12 mx-auto">
                                    <form class="form-horizontal" method="post" action="proses-master-grup.php">
                                      <?php
                                      $aksi=$_GET['aksi'];
                                      if ($aksi=="view")
                                      {
                                        $nomerku=$_GET['no'];
                                        $sql = "SELECT * FROM master_exrate where id='$nomerku'";
                                             $query = mysqli_query($conn, $sql);
                                             while($amku = mysqli_fetch_array($query)){
                                               $tgl=$amku['tgl'];
                                               $kodep=$amku['kode'];
                                               $curp=$amku['cur'];
                                               $pricep=$amku['price'];
                                               $status=$amku['status'];
                                               $nom=$amku['id'];
                                             }
                                        ?>
                                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                                          <!-- begin panel-heading -->

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
                                               <label class="col-sm-10 control-label">Post Date</label>
                                               <div class="col-sm-8">
                                                 <input type="text" readonly class="form-control" id="nom1" value="<?php echo $tgl; ?>" name="nom1">
                                              </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-10 control-label">Division</label>
                                               <div class="col-sm-8">
                                                 <select name="kode" id="kode" class="form-control">
                                                   <option><?php echo $kodep; ?></option>
                                                 <?php
                                                   $sql = "SELECT * FROM master_perusahaan";
                                                        $query = mysqli_query($conn, $sql);
                                                        while($amku = mysqli_fetch_array($query)){
                                                       echo "<option>".$amku['nm_perusahaan']."</option>";
                                                     }
                                                   ?>
                                                 </select>
                                               </div>
                                             </div>
                                             <div class="form-group">
                                                 <label class="col-sm-4 control-label">Buying Rate</label>
                                                 <div class="col-sm-4">
                                                   <select name="buying_cur" id="buying_cur" class="form-control">
                                                  <option><?php echo $curp; ?>
                                                   <?php
                                                     $sql = "SELECT * FROM master_cur";
                                                          $query = mysqli_query($conn, $sql);
                                                          while($amku = mysqli_fetch_array($query)){
                                                         echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                                       }
                                                     ?>
                                                   </select>
                                               </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="col-sm-4 control-label">Buying Rate</label>
                                                   <div class="col-sm-4">
                                                   <input type="text" class="form-control" id="bp" name="bp" value="<?php echo $pricep; ?>">
                                                 </div>
                                                 </div>
                                              <div class="form-group">
                                                  <div class="col-sm-2">
                                                    <select class="form-control" id="status" name="status">
                                                      <option><?php echo $status; ?></option>
                                                      <option>Active</option>
                                                      <option>InActive</option>
                                                  </select>
                                                </div>
                                                </div>
                                                <?php
                                                $uk=$_SESSION["username"];
                                                $sqluk = "SELECT * FROM login where email='$uk'";
                                                     $queryuk = mysqli_query($conn, $sqluk);
                                                     while($amkuuk = mysqli_fetch_array($queryuk)){
                                                       $divisiuk=$amkuuk["divisi"];
                                                  }
                                                  if ($divisiuk=="SUPERUSER")
                                                  {
                                                 ?>
                                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-info">Update</button>
                                  <?php } else { ?>
                                    <button type="submit" name="daftar1" disabled value="daftar1" class="btn btn-info">Update</button>
                                  <?php } ?>
                                      <?php }


                                       else { ?>

                                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                                          <!-- begin panel-heading -->

                                          <!-- end panel-heading -->
                                          <!-- begin panel-body -->
                                          <div class="panel-body panel-form">
                                            <div class="container"><br>
                                 <div class="form-group">
                                   <label class="col-sm-12 control-label">Division (Divisi)</label>
                                   <div class="col-sm-12">

                                     <select name="kode" id="kode" class="form-control">
                                     <?php
                                       $sql = "SELECT * FROM master_perusahaan";
                                            $query = mysqli_query($conn, $sql);
                                            while($amku = mysqli_fetch_array($query)){
                                           echo "<option>".$amku['nm_perusahaan']."</option>";
                                         }
                                       ?>
                                     </select>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Buying Foreign Currency (Mata Uang Asing)</label>
                                     <div class="col-sm-12">
                                       <select name="buying_cur" id="buying_cur" class="form-control">

                                       <?php
                                         $sql = "SELECT * FROM master_cur";
                                              $query = mysqli_query($conn, $sql);
                                              while($amku = mysqli_fetch_array($query)){
                                             echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                           }
                                         ?>
                                       </select>
                                   </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="col-sm-12 control-label">Exchange Rate to IDR (Konversi ke IDR)</label>
                                       <div class="col-sm-6">
                                       <input type="text" class="form-control" id="bp" name="bp">
                                     </div>
                                     </div>

                                  <div class="form-group">
                                      <div class="col-sm-6">
                                        Status
                                        <select class="form-control" id="status" name="status">
                                          <option>-- Status -- </option>
                                          <option>Active</option>
                                          <option>InActive</option>
                                      </select>
                                    </div>
                                    </div>
                                      <div class="form-group">
                                      <div class="col-sm-6">
                                    <button type="submit" name="daftar" value="daftar" class="btn btn-info">Submit</button>
                                  </div>
                                </div>
                                <?php
                              }
                                ?>

                                  <br><br>
                                                  </form>
                                                  <script type="text/javascript">
                                                   $(document).ready(function() {
                                                       $('#kode').select2();
                                                   });
                                                  </script>
                                                                  </div>
                                                                </div>

                                                                </div>


            <!-- end of content area 2 -->


                </div>
        </div>
      </div>
      <?php
      include('../blank_footer.php')
      ?>
    </div>
  </div>
  </div>
</div>
        <!--  END CONTENT AREA  -->

        <script src="<?php echo $admin_url; ?>/demo5/assets/js/custom.js"></script>
        <script>
            $('#zero-config').DataTable({
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 5
            });
        </script>
    </div>

</body>
</html>

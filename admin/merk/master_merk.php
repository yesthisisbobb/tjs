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
 $hal = "merk";
 include('../blank_subheader.php');
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

                                  <div class="col-lg-12 col-12 mx-auto">
                                    <table id="zero-config" class="table table-hover" style="width:100%">
                                      <thead>
                                        <tr>
                                          <!-- <th width="1%">No</th> -->

                                          <th class="text-nowrap">Brand Code</th>
                                          <th class="text-nowrap">Brand name</th>

                                          <th class="text-nowrap">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>


                                        <?php
                                          $sql = "SELECT * FROM master_merk where status='Active' ORDER BY no";
                                               $query = mysqli_query($conn, $sql);
                                               while($amku = mysqli_fetch_array($query)){
                                          ?>
                                        <tr class="odd gradeX">


                                          <td><?=$amku["kode"];?></td>
                                          <td><?=$amku["nama"];?></td>

                                          <td class="with-btn" nowrap="">

                                            <a href="master_merk.php?aksi=view&no=<?php echo $amku["no"]; ?>#section2"><i class="fas fa-edit" style="font-size:18px;color:#5DADE2;" data-toggle="tooltip" title="EDIT" ></i></a>
                                              <a href="proses-merk.php?aksi=update&no=<?php echo $amku["no"]; ?>"><i class="fas fa-times-circle"  style="font-size:18px;color:#F8C471;"data-toggle="tooltip" title="DISABLE" ></i></a>
                                              <a href="proses-merk.php?aksi=active&no=<?php echo $amku["no"]; ?>"><i class="fas fa-check-circle" style="font-size:18px;color:#52BE80;"data-toggle="tooltip" title="ENABLE" ></i></i></a>
                                            <a href="proses-merk.php?aksi=delete&no=<?php echo $amku["no"]; ?>"><i class="fas fa-trash" style="font-size:18px;color:#CD6155;"data-toggle="tooltip" title="DELETE" ></i></i></a>

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
                                    <form class="form-horizontal" method="post" action="proses-merk.php">
                                      <?php
                                      $aksi=$_GET['aksi'];
                                      if ($aksi=="view")
                                      {
                                        $nomerku=$_GET['no'];
                                        $sql = "SELECT * FROM master_merk where no='$nomerku'";
                                             $query = mysqli_query($conn, $sql);
                                             while($amku = mysqli_fetch_array($query)){
                                               $kodep=$amku['kode'];
                                               $namap=$amku['nama'];
                                               $nom=$amku['no'];
                                               $status=$amku['status'];
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
                                               <div>
                                       <div class="form-group">
                                         <label class="col-sm-10 control-label">Brand Code (Kode Merek)</label>
                                         <div class="col-sm-12">
                                           <input type="text" class="form-control" id="kode" value="<?php echo $kodep; ?>" name="kode">
                                        </div>
                                        <div>
                                        <div class="form-group">
                                          <label class="col-sm-6 control-label">Brand Name (Nama Merek)</label>
                                        <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama" value="<?php echo $namap; ?>" name="nama">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-10 control-label">Status</label>
                                        <div class="col-sm-4">
                                          <select class="form-control" id="status" name="status">
                                            <option><?php echo $status; ?>
                                            <option>Active</option>
                                            <option>InActive</option>
                                        </select>
                                      </div>
                                      </div>
                                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-info">Update</button>
                                      <?php } else { ?>

                                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                                          <!-- begin panel-heading -->

                                          <!-- end panel-heading -->
                                          <!-- begin panel-body -->
                                          <div class="panel-body panel-form">
                                            <div class="container">
                                              <!-- <form class="form-horizontal" method="post" action="proses-perusahaan.php"> -->

                                 <div class="form-group">
                                   <label class="col-sm-10 control-label">Brand Code (Kode Merek)</label>
                                   <div class="col-sm-12">
                                     <input type="text" class="form-control" id="kod" name="kode">
                                   </div>
                                 </div>
                                   <div class="form-group">
                                    <label class="col-sm-6 control-label">Brand Name (Nama Merek)</label>
                                    <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama" name="nama">
                                  </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-10 control-label">Status</label>
                                      <div class="col-sm-4">
                                        <select class="form-control" id="status" name="status">
                                          <option>Active</option>
                                          <option>InActive</option>
                                      </select>
                                    </div>
                                    </div>

                                    <button type="submit" name="daftar" value="daftar" class="btn btn-info">Submit</button>
                                <?php
                              }
                                ?>

                                  <br><br>
                                                  </form>






                            </div>


</div>
            </div>
            <!-- end of content area 2 -->


        </div>
      </div>

        <!--  END CONTENT AREA  -->
        <?php
        include('../blank_footer.php')
        ?>
    </div>
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
</body>
</html>

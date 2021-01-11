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

<?php
include('../blank_header.php')
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
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>Business Company   <a href="master_divisi.php" class="btn  btn-rounded btn-primary btn-sm" role="button">Add New</a></h4>
                                  </div>
                              </div>
                          </div>
                          <hr>
                                  <div class="col-lg-12 col-12 mx-auto">
                                    <table id="zero-config" class="table table-hover" style="width:100%">
                                      <thead>
                                        <tr>
                                          <!-- <th width="1%">No</th> -->

                                          <th class="text-nowrap">Company Code</th>
                                          <th class="text-nowrap">Company Name</th>
                                            <th class="text-nowrap">Status</th>
                                          <th class="text-nowrap">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>


                                        <?php
                                          $sql = "SELECT * FROM master_divisi ORDER BY no";
                                               $query = mysqli_query($conn, $sql);
                                               while($amku = mysqli_fetch_array($query)){
                                          ?>
                                        <tr class="odd gradeX">


                                          <td><?=$amku["kode"];?></td>
                                          <td><?=$amku["nama"];?></td>
                                          <td><?=$amku["status"];?></td>
                                          <td class="with-btn" nowrap="">

                                            <a href="master_divisi.php?aksi=view&no=<?php echo $amku["no"]; ?>" class="btn  btn-rounded btn-primary btn btn-sm" role="button">Edit</a>
                                            <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                                              <a href="proses-divisi.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="btn btn-rounded btn-primary btn btn-sm" role="button">Disable</a>
                                              <a href="proses-divisi.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="btn btn-rounded  btn-primary btn btn-sm" role="button">Enable</i></a>
                                            <a href="proses-divisi.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn  btn-rounded btn-primary btn btn-sm" role="button">Delete</i></a>

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
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add/Update</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                                  <div class="col-lg-12 col-12 mx-auto">
                                    <form class="form-horizontal" method="post" action="proses-divisi.php">
                                      <?php
                                      $aksi=$_GET['aksi'];
                                      if ($aksi=="view")
                                      {
                                        $nomerku=$_GET['no'];
                                        $sql = "SELECT * FROM master_divisi where no='$nomerku'";
                                             $query = mysqli_query($conn, $sql);
                                             while($amku = mysqli_fetch_array($query)){
                                               $kodep=$amku['kode'];
                                               $namap=$amku['nama'];
                                               $nom=$amku['no'];
                                             }
                                        ?>


                                                <!-- <label class="col-sm-10 control-label">No.</label> -->
                                                <div class="col-sm-2">
                                                  <input type="hidden" class="form-control" id="nom" value="<?php echo $nom; ?>" name="nom">
                                               </div>



                                       <div class="form-group">
                                         <label class="col-sm-10 control-label">Divison Code</label>
                                         <div class="col-sm-2">
                                           <input type="text" class="form-control" id="kode" value="<?php echo $kodep; ?>" name="kode">
                                        </div>
                                      </div>
                                        <div>
                                        <div class="form-group">
                                          <label class="col-sm-6 control-label">Division Name</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" value="<?php echo $namap; ?>" name="nama">
                                      </div>
                                    </div>
                                    </div>
                                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-rounded  btn-primary">Update</button>
                                      <?php } else { ?>





                                 <div class="form-group">
                                   <label class="col-sm-10 control-label">Division Code</label>
                                   <div class="col-sm-2">
                                     <input type="text" class="form-control" id="kode" name="kode">
                                   </div>
                                 </div>
                                   <div class="form-group">
                                    <label class="col-sm-6 control-label">Division Name</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama">
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

                                    <button type="submit" name="daftar" value="daftar" class="btn btn-rounded  btn-primary">Submit</button>
                                <?php
                              }
                                ?>

                                  <br><br>
                                                  </form>






                            </div>


</div>
            </div>
            <!-- end of content area 2 -->

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">Karya Modern</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
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

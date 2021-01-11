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
include('../blank_header.php');
  $idku=$_GET["id"];
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
                                      <h4>Edit Quotation</h4>
                                  </div>
                              </div>
                          </div>
                          <hr>
                                  <div class="col-lg-12 col-12 mx-auto">
                <!-- start of content area 1 -->
                  <form method="post" action="proses-data.php">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <span style="color:blue">Quotation No.
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $idku;?>">
                  <?php echo $idku;?></span>
                </div>
                </div>
            </div>
            <?php

            $sql11 = "SELECT * FROM revq where no_cart='$idku'";
                 $query11 = mysqli_query($conn, $sql11);
                 $jumlah = mysqli_num_rows($query11);
            ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <span style="color:blue">Revision No.
                    <?php
                    if ($jumlah=="0")
                    {
                    ?>
                <input type="hidden" class="form-control" id="idrev" name="idrev" value="1">
              <?php echo "1"; ?>
            <?php } else {
              $jumlah=$jumlah+1;?>
              <input type="hidden" class="form-control" id="idrev" name="idrev" value="<?php echo $jumlah; ?>">
            <?php echo $jumlah; ?>
          <?php } ?>
            </span>

            </div>
            </div>
        </div>
<div class="table-responsive" style="overflow-x:auto;">
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <thead class="thead-light">
                    <tr>
                      <!-- <th width="1%">No</th> -->
                      <th>
                          Stock Code
                      </th>
                        <th>
                          Shading
                        </th >
                        <th>
                          Qty
                        </th>
                        <th>
                          Price (IDR)
                        </th>
                        <th>
                          Dis1(%)
                        </th>
                        <th>
                          Dis2(%)
                        </th>
                        <th>
                          Total(IDR)
                        </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $a=0;

                    $sql2 = "SELECT * FROM jualdtlq where no_cart='$idku'";
                         $query2 = mysqli_query($conn, $sql2);
                         while($amku2 = mysqli_fetch_array($query2)){
                           $no=$amku2["no"];
                           $a=$a+1;
                    ?>

                    <tr>
                      <td>
                          <input type="hidden" name="jumrec" id="jumrec" value="<?php echo $a;?>">
                        <?php echo $amku2['kode_stok']; ?>
                          <input type="hidden" name="kodestok[]" id="kodestok[]" value="<?php echo $amku2['kode_stok']; ?>">
                      </td>
                      <td>
                          <input type="hidden" name="shading[]" id="shading[]" value="<?php echo $amku2['shading']; ?>">
                        <?php echo $amku2['shading']; ?>
                      </td>

                      <td>
                        <input type="text" name="jum[]" id="jum[]" size="4" value="<?php echo $amku2['jumlah']; ?>">
                      </td>
                      <td>
                          <input type="text" name="harga[]" id="harga[]" value="<?php echo $amku2['harga']; ?>">
                      </td>

                      <td>
                        <input type="hidden" name="nolagi[]" id="nolagi[]" value="<?php echo $no; ?>">
                        <input type="text" id="dis1[]" name="dis1[]" size="10">
                      </td>
                      <td>
                          <input type="text" name="dis2[]" id="dis2[]" size="10">
                      </td>
                      <td>
                          <input readonly type="text" name="total[]" id="total[]" value="<?php echo $amku2['total']; ?>">
                      </td>

                    </tr>

                  <?php } ?>

                  </tbody>

                </table><br>
                <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4" align="right">
                  <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                  <button name="daftar" value="daftar" class="btn btn-primary">Save</button>
                </div>
              </div>
              <br>
              </form>
              </div>
              </div>
              </div>


              </div>
                  <!-- end of content area 1 -->

                  <!-- begin of content area 2 -->










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
</div>
        <!--  END CONTENT AREA  -->
        <?php
        include('../blank_footer.php')
        ?>
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

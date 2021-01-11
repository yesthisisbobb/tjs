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
                                      <h4>View Revision</h4>
                                  </div>
                              </div>
                          </div>
                          <hr>

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
                  <div class="col-lg-12 col-12 mx-auto"  style="overflow-x:auto;">
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <tr>
                    <th nowrap>Action</th>
                    <th>
                      No.Rev
                    </th>

                    <th>Material Price</th>
                    <th>Material Tax</th>
                    <th>Nett Total Material </th>
                    <th>Delivery Fee Exc Tax</th>
                    <th>Delivery Tax</th>
                    <th>Nett Delivery Fee</th>
                    <th>Other Fee Exc Tax</th>
                    <th>Other Tax</th>
                    <th>Nett Other Fee</th>
                    <th>Grand Total</th>

                  </tr>
                <?php

                $sql11 = "SELECT * FROM revq where no_cart='$idku'";
                $query11 = mysqli_query($conn, $sql11);
                $jumlah = mysqli_num_rows($query11);
                if ($jumlah=="0")
                {
                $norev=1;
                  $sql2 = "SELECT * FROM jualq where cart_id='$idku'";
                     $query2 = mysqli_query($conn, $sql2);
                     while($amku2 = mysqli_fetch_array($query2)){
                       $grandtotal=$amku2["grand_total"];
                }
                $tax=0;
                $totaltax=0;
                $del=0;
                $deltax=0;
                $totaldeltax=0;
                $other=0;
                $othertax=0;
                $totalothertax=0;
                $grandtotal1=$grandtotal+$tax+$totaldeltax+$totalothertax;
              }
                ?>

                      <tr>
                          <td><a href="revquotedtl.php?id=<?php echo $idku; ?>&rev=<?php echo $norev; ?>" class="btn-primary btn-rounded btn-sm" role="button">Revise</a></td>
                        <td><?php echo $norev;?></td>
                      <td><?php echo $grandtotal;?></td>
                      <td><?php echo $tax;?></td>
                      <td><?php echo $totaltax;?></td>
                      <td><?php echo $del;?></td>
                      <td><?php echo $deltax;?></td>

                      <td><?php echo $totaldeltax;?></td>
                      <td><?php echo $other;?></td>
                      <td><?php echo $othertax;?></td>
                      <td><?php echo $totaldeltax;?></td>
                      <td><?php echo $grandtotal1;?></td>


                      </tr>



              </form>
            </table>

              </div>
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

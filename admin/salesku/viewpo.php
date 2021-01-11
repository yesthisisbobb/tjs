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
  $idku=$_GET["noso"];
 ?>
 <?php
   function rupiah($angka){

   $hasil_rupiah = "Rp." . number_format($angka,0,',','.');
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
                          <div class="widget-header">
                            <form method="post" action="proses-data1.php" id="formku">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h5>Purchase Order Confirmation</h5><br>
                                      <h6>SO Indent No.
                                    <input type="hidden" class="form-control" id="id1" name="id1" value="<?php echo $idku;?>">
                                  <?php echo $idku;?></h6>

                                  </div>
                              </div>
                          </div>
                          <hr>

                <!-- start of content area 1 -->

                <div class="row">
                <div class="col-sm-12">

                </div>
                </div>
                <?php

                  $sqlin = "SELECT * FROM ijual where noso='$idku'";
                       $queryin = mysqli_query($conn, $sqlin);
                       while($amkuin = mysqli_fetch_array($queryin)){
                         $cartid=$amkuin["cart_id"];
                         $tgl=$amkuin["tgl"];



                              }
                              $inv="INV"."/".$tgl."/"."SBY".$cartid
                  ?>

                <div class="row">
                  <!-- <div class=col-sm-4>
                    <b>Payment</b> : <br><input type="checkbox"> Cash Before Delivery
                    <br><input type="checkbox"> Cash After Delivery
                  </div> -->
                    <div class=col-sm-6>
                      <b>Delivery</b> : <br><input type="checkbox" id="pil1" name="pil1" onclick="cek()"> Full-Order Date : <input type="date" id="tglu" name="tglu">


                    </div>
                </div>

                  <div class="col-lg-12 col-12 mx-auto"  style="overflow-x:auto;">
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <tr>

                    <th>Picture</th>
                    <th>Product Name</th>
                    <th>Qty(pcs)</th>
                    <th>Price (pcs) </th>

                    <th>Total</th>
                    <th>Partial Order Date</th>

                  </tr>
                  <?php
                  $total1=0;
                    $sql = "SELECT * FROM ijualdtl where noso='$idku'";
                         $query = mysqli_query($conn, $sql);
                         while($amku = mysqli_fetch_array($query)){
                           $kode=$amku["kode_stok"];
                           $no=$amku["no"];
                           $jumlah=$amku["jumlah"];
                           $harga=$amku["harga"];
                           $total=$amku["total"];
                           $total1=$total1+$total;
                           $sql1 = "SELECT * FROM master_stok where kode_stok='$kode'";
                                $query1 = mysqli_query($conn, $sql1);
                                while($amku1 = mysqli_fetch_array($query1)){
                                  $kodet=$amku1["kodetipe"];
                                }
                    ?>
                     <input type="hidden" id="nomer[]" name="nomer[]" value="<?php echo $no; ?>">
                    <tr>
                      <td><img src="../../venturafe1/img/gambar/<?php echo $kodet; ?>.jpg" width="100" height="100"></td>
                      <td><?php echo $kodet; ?><input type="hidden" id="kodet[]" name="kodet[]" value="<?php echo $kodet; ?>"></td>
                      <td><?php echo $jumlah; ?><input type="hidden" id="qty[]" name="qty[]" value="<?php echo $jumlah; ?>"></td>
                      <td><?php echo rupiah($harga); ?><input type="hidden" id="harga[]" name="harga[]" value="<?php echo $harga; ?>"></td>

                      </script>
                      <td><?php echo rupiah($total); ?></td><input type="hidden" id="total[]" name="total[]" value="<?php echo $total; ?>">
                    <td>

                      <input type="date" id="tgl[]" name="tgl[]"></td>
                      <script>
                      function cek(){
                        a=document.getElementById("pil1");


                        var myForm = document.forms.formku;
                        var myControls = myForm.elements['tgl[]'];
                        for (var i = 0; i < myControls.length; i++) {
                          if (a.checked==true)
                          {
                          myControls[i].disabled=true;
                          }
                          else
                          {
                            myControls[i].disabled=false;
                          }

                      }



                    }
                      </script>
                    </tr>
                  <?php } ?>
                  <tr><td></td><td></td><td></td><td>Sub Total</td><td><?php echo rupiah($total1); ?></td><td></td></tr>
                  <tr><td></td><td></td><td></td><td>Discount</td><td><input readonly type="text"> <input type="checkbox"> Approval</td><td></td></tr>
                  <tr><td></td><td></td><td></td><td>Addition Fee</td><td><input type="text"></td><td></td></tr>
                  <tr><td></td><td></td><td></td><td>Tax</td><td><input type="text">  <input type="checkbox"> Zero tax</td><td></td></tr>
                  <tr><td></td><td></td><td></td><td>Grand Total</td><td><input type="text"></td><td></td></tr>
                  <tr><td></td><td></td><td></td><td>Down Payment</td><td><input type="text"></td><td></td></tr>
                  <tr><td></td><td></td><td></td><td>Outstanding Balance</td><td><input type="text"></td><td></td></tr>
                  <tr><td></td><td></td><td></td><td></td><td><button type="submit" name="daftar" value="daftar" class="btn  btn-info">Submit</button></a></td><td></td></tr>


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

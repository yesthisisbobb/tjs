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
  $norev=$_GET["rev"];
 ?>

<body class="sidebar-noneoverflow">
  <script language=javascript>
  var objekxhr, objekxhr1;

  function lanjut()
  {
  pils1 = document.getElementById("pils");


  if (pils1.checked)
  {
   buatxhr();
  objekxhr.open("GET", "TampilMhs.php",true);
  objekxhr.send(null);
  objekxhr.onreadystatechange=tampilkan;
}else {
  document.getElementById("pg1").innerHTML="";
}
  }

  function buatxhr()
  {
      if (window.ActiveXObject)

      {
          objectxhr = new ActiveXObject("Microsoft.XMLHTTP");
      }
          else if (window.XMLHttpRequest)
      {
          objekxhr=new XMLHttpRequest();
      }
      else
      {
        alert ("ganti browser anda");
      }
  }

  function tampilkan()
  {
  document.getElementById("pg1").innerHTML = objekxhr.responseText;
  }
  </script>
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
                                      <h4>View Details</h4>
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
                <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <span style="color:powderblue">Revision No.
                  <input type="hidden" class="form-control" id="rev" name="rev" value="<?php echo $inorev;?>">
                <?php echo $norev;?></span>
                </div>
                </div>
                </div>
                <form action="proses-data-total.php" method="post">
                  <div class="col-lg-12 col-12 mx-auto"  style="overflow-x:auto;">
                <table id="zero-config" class="table table-hover" style="width:100%">

                    <tr>
                      <th>
                        Stock Code
                      </th>
                      <th>
                        Shading
                      </th>
                      <th>
                        Qty
                      </th>
                      <th>
                        Target Price (IDR)
                      </th>
                      <th>
                        Bottom Price (IDR)
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
                        Dis3(%)
                      </th>
                      <th>
                        Total(IDR)
                      </th>
                    </tr>
                  <?php
                  $a=0;
                  $a1=0;
                  $sql2 = "SELECT * FROM jualdtlq where no_cart='$idku'";
                       $query2 = mysqli_query($conn, $sql2);
                       while($amku2 = mysqli_fetch_array($query2)){
                         $no=$amku2["no"];
                         $a=$a+1;
                         $total=$amku2["total"];
                         $a1=$a1+$total;
                         $kodestok=$amku2["kode_stok"];
                         $sqlharga = "SELECT * FROM master_price where kode='$kodestok'";
                              $queryharga = mysqli_query($conn, $sqlharga);
                              while($amkuharga = mysqli_fetch_array($queryharga)){

                                $bot1=$amkuharga["bot"];

                              }
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
                            <input type="text" name="jum[]" id="jum[]" size="3" value="<?php echo $amku2['jumlah']; ?>">

                          </td>
                          <td>
                              <input type="text" name="targetharga[]" id="targetharga[]" size="10" >

                          </td>
                          <td>
                              <input type="text" readonly name="botharga[]" id="botharga[]" size="10" value="<?php echo $bot1; ?>"  onfocus="cek()">
                            <a href="revquotedtlcost.php?kodestok=<?php echo $kodestok; ?>&id=<?php echo $idku;?>&sh=<?php echo $amku2['shading']; ?>&rev=<?php echo $norev; ?>" class="btn-primary btn-sm" role="button">Adjust</a>
                            <script type="text/javascript">
                            function cek()
                            {

                            a=document.getElementById("targetharga[]");
                            b=document.getElementById("targetharga[]").value;
                            c=document.getElementById("botharga[]").value;
                            if (b<=c)
                            {
                            a.style.backgroundColor="red";
                          }
                            }
                            </script>
                          </td>
                          <td>
                              <input type="text" name="harga[]" id="harga[]" size="10" value="<?php echo $amku2['harga']; ?>">

                          </td>

                          <td>

                            <input type="hidden" name="nolagi[]" id="nolagi[]" value="<?php echo $no; ?>">
                            <input type="text" id="dis1[]" name="dis1[]" size="5">

                          </td>

                          <td>
                              <input type="text" name="dis2[]" id="dis2[]" size="5">
                          </td>
                          <td>
                              <input type="text" name="dis3[]" id="dis3[]" size="5">
                          </td>
                          <td>
                              <input type="text" name="total[]" id="total[]"  size="10" value="<?php echo $amku2['total']; ?>">
                          </td>


                        </tr>

                      <?php } ?>

                      <tr >
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td  colspan="2">Material</td>
                        <td colspan="2" > <input type="text" id="mat" name="mat" value="<?php echo $a1; ?>"> </td>
                      </tr>
                      <tr >
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td  colspan="2">Material Tax</td>
                        <td colspan="2" > <input type="checkbox" id="pil" name="pil"> Zero Tax </td>
                      </tr>
                      <tr >
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td  colspan="2">Nett Material</td>
                        <td colspan="2" > <input type="text" id="mat" name="mat" value="<?php echo $a1; ?>"> </td>
                      </tr>
                      <tr >
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td  colspan="2">Add Services</td>
                        <td colspan="2" > <input type="checkbox" id="pils" name="pils" onclick="lanjut()"> Yes </td>
                      </tr>


                      <!-- <script>


                      var array = Array();
                      var array1 = Array();

                      function hitung(str,str1)
                      {

                       document.getElementById('dis1[str1]').value;
                        array1[]=document.getElementById('total').value;

                      document.writeln(array[str1]);
                      }
                      </script> -->

            </table>
            <div id="pg1">

            </div>
            <br>
            <button type="submit" name="daftar12" id="daftar12" value="daftar12" class="btn btn-primary btn-rounded btn-sm">Submit</button></td>
</form>

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

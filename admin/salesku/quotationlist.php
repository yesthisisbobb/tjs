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
.table1 {
    display: table;
    border: 1px solid black;
    border-collapse: collapse;
    width: 100%;
    font-size: 10px;

}
.row1 {
    display: table-row;
    border: 1px solid black;
    height: 25px;
    vertical-align: center;
    padding: 15px;

}
.cell1 {
    display: table-cell;
    border: 1px solid black;

}
</style>
<script language=javascript>
var objekxhr, objekxhr1;
function ambildata(str2)
{

  buatxhr();
  str=document.getElementById('id').value;
  // document.getElementById('pg').innerHTML=str2;
  // //
  objekxhr.open("GET", "TampilMhs.php?q="+str+"&y="+str2,true);
  objekxhr.send(null);
  objekxhr.onreadystatechange=tampilkan;
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
document.getElementById("pg").innerHTML = objekxhr.responseText;

}
</script>
<?php
include('../blank_header.php')
 ?>

<body class="sidebar-noneoverflow">
<?php function rupiah($angka){

$hasil_rupiah = "" . number_format($angka,2,',','.');
return $hasil_rupiah;

} ?>
<script>
function hitungtax()
{
a=document.getElementById("kirim").value;
if(document.getElementById("pil").checked) {
b=0;
}
else {
  b=a*0.1;
}

c=parseFloat(a)+parseFloat(b);
document.getElementById('taxdel').value=b;
document.getElementById('totaldel').value=c;

}

function hitungtax1()
{
a1=document.getElementById("other").value;
if(document.getElementById("pil1").checked) {
b1=0;
}
else {
  b1=a1*0.1;
}

c1=parseFloat(a1)+parseFloat(b1);
document.getElementById('taxotherdel').value=b1;
document.getElementById('totalotherdel').value=c1;

}


</script>
<script>
function hitunggt()
{
a2=document.getElementById("totkirim").value;
b2=document.getElementById("totalotherdel").value;
c2=document.getElementById('totaldel').value;

d2=parseInt(a2)+parseInt(b2)+parseInt(c2);
document.getElementById("gtku").value=d2;

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
                                      <h4>Quotation List </h4>
                                  </div>
                              </div>
                          </div>
                        <hr>
                                  <div class="col-lg-12 col-12 mx-auto">
                                    <table id="zero-config" class="table table-hover" style="width:100%">
                                      <thead>
                                        <tr>
                                          <!-- <th width="1%">No</th> -->

                                          <th class="text-nowrap">Date</th>
                                          <th class="text-wrap">Quotation No</th>
                                          <th class="text-wrap">Customer ID</th>
                                          <th class="text-wrap">Project ID</th>
                                          <th class="text-wrap">Project Name</th>
                                          <th class="text-wrap">Total Quotation</th>
                                          <th class="text-nowrap">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        <?php
                                          $sql = "SELECT * FROM jualq";
                                               $query = mysqli_query($conn, $sql);
                                               while($amku = mysqli_fetch_array($query)){
                                                 $proid=$amku["proyekid"];
                                                 $sqlproku = "SELECT * FROM proyek where kode='$proid' ";
                                                      $queryproku = mysqli_query($conn, $sqlproku);
                                                      while($amproku = mysqli_fetch_array($queryproku)){
                                                        $namapro=$amproku["namap"];
                                                      }
                                          ?>
                                          <?php
                                          $idku=$amku['cart_id'];
                                          $sql12 = "SELECT * FROM revq where no_cart='$idku'";
                                               $query12 = mysqli_query($conn, $sql12);
                                               $jumlahrev = mysqli_num_rows($query12);
                                          ?>



                                        <tr class="odd gradeX">


                                          <td><?=$amku["tgl"];?></td>
                                          <td><?=$amku["cart_id"];?></td>
                                          <td><?=$amku["user_id"];?></td>
                                          <td><?=$amku["proyekid"];?></td>
                                          <td><?=$namapro;?></td>
                                          <td><?=rupiah($amku["total"]);?></td>
                                          <td class="with-btn" nowrap="">
                                             <!-- <a href="#" class="btn-primary btn-rounded btn-sm" role="button" data-toggle="modal" data-target="#myModal1<?php echo $amku["no"]; ?>">Edit/View</a></h1> -->

                                            <!-- <a href="editquote.php?id=<?php echo $amku["cart_id"];?>&no=<?php echo $amku["no"]; ?>" class="btn-primary btn-rounded btn-sm" role="button">View</a></h1> -->
                                              <a href="revquote.php?id=<?php echo $amku["cart_id"];?>" class="btn-primary btn-rounded btn-sm" role="button">View Revision</a></h1>
                                            <a href="#" class="btn-primary btn-rounded btn-sm" role="button" data-toggle="modal" data-target="#myModal2<?php echo $amku["no"]; ?>">Revision(<?php echo $jumlahrev; ?>)</a>
                                            <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                                              <!-- <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="btn-primary btn-rounded btn-sm" role="button">Convert to SO</a> -->
                                              <!-- <a href="proses-master-grup.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-sm btn-rounded" role="button">Enable</a>
                                            <a href="proses-master-grup.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-sm btn-rounded" role="button">Delete</a> -->

                                              </td>

                                              <div class="modal fade" id="myModal2<?php echo $amku["no"]; ?>"  role="dialog">
                                                  <div class="modal-dialog modal-xl">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Quotation Revision</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="proses-data.php">
                                                              <?php

                                                              $sql22= "SELECT * FROM jualq where cart_id='$idku'";
                                                                   $query22= mysqli_query($conn, $sql22);
                                                                   while($amku22 = mysqli_fetch_array($query22)){
                                                              ?>
                                                            <div class="form-group">
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <span style="color:blue">Quotation No.
                                                                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $amku22['cart_id'];?>">
                                                                <?php echo $amku22['cart_id'];?></span>
                                                              </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                              <div class="table1">



                                                                  <div class="row1">
                                                                    <!-- <th width="1%">No</th> -->


                                                                      <div class="cell1">Revision No</div>
                                                                      <div class="cell1">Total Material Exc Tax</div>
                                                                      <div class="cell1">Material Tax</div>
                                                                      <div class="cell1">Nett Total Material </div>
                                                                      <div class="cell1">Delivery Fee Exc Tax</div>
                                                                      <div class="cell1">Delivery Tax</div>
                                                                      <div class="cell1">Nett Delivery Fee</div>
                                                                      <div class="cell1">Other Fee Exc Tax</div>
                                                                      <div class="cell1">Other Tax</div>
                                                                      <div class="cell1">Nett Other Fee</div>
                                                                      <div class="cell1">Grand Total</div>
                                                                      <div class="cell1">Action</div>


                                                                  </div>



                                                                  <?php
                                                                    $sql23 = "SELECT * FROM revq where no_cart='$idku'";
                                                                         $query23 = mysqli_query($conn, $sql23);
                                                                         while($amku23 = mysqli_fetch_array($query23)){
                                                                           $nomercart=$amku23["no_cart"];
                                                                           $norev=$amku23["norev"];
                                                                    ?>


                                                                  <div class="row1">



                                                                    <div class="cell1"><?=$amku23["norev"];?><input type="text" id="norevku1" name="norevku1" value="<?php echo $norev; ?>"></div>
                                                                    <div class="cell1"><?=rupiah($amku23["total"]);?></div>
                                                                    <div class="cell1"><?=rupiah($amku23["tax"]);?></div>
                                                                    <div class="cell1" style="background-color:powderblue;"><?=rupiah($amku23["totaltax"]);?></div>
                                                                    <div class="cell1"><?=rupiah($amku23["kirim"]);?></div>
                                                                    <div class="cell1"><?=rupiah($amku23["taxkirim"]);?></div>
                                                                    <div class="cell1" style="background-color:powderblue;"><?=rupiah($amku23["netkirim"]);?></div>
                                                                    <div class="cell1"><?=rupiah($amku23["other"]);?></div>
                                                                    <div class="cell1"><?=rupiah($amku23["taxother"]);?></div>
                                                                    <div class="cell1" style="background-color:powderblue;"><?=rupiah($amku23["netother"]);?></div>
                                                                    <div class="cell1" style="background-color:yellow;"><?=rupiah($amku23["gtot"]);?></div>
                                                                    <div class="cell1">

                                                                    <button type="button" value="<?php echo $amku23["norev"]; ?>" id="but[]" class="btn-primary btn-rounded btn-sm" onclick="ambildata(this.value)">View Detail<?php  echo $amku23["norev"]; ?></button>

                                                                    <button type="submit" name="daftar1" id="daftar1" value="<?php echo $norev; ?>" class="btn-primary btn-rounded btn-sm">Use This</button></td>


                                                                  </div>


                                                                  </div>
                                                                <?php } ?>


                                                          </div>

                                                        </form><br>

                                                      <?php } ?>
                                                      <form id="pg" action="proses-data-total.php" method="post">
                                                      <!-- <div id="pg">


                                                      </div> -->
                                                    </form>

                                                  </div>
                                              </div>

                                                                        </div>


                                            </div>

                                            <div class="modal fade" id="myModal1<?php echo $amku["no"]; ?>"  role="dialog">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Quotation Revision</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                          <form method="post" action="proses-data.php">
                                                            <?php
                                                            $idku=$amku['cart_id'];
                                                            $sql1 = "SELECT * FROM jualq where cart_id='$idku'";
                                                                 $query1 = mysqli_query($conn, $sql1);
                                                                 while($amku1 = mysqli_fetch_array($query1)){
                                                            ?>
                                                          <div class="form-group">
                                                            <div class="row">
                                                              <div class="col-sm-12">
                                                                <div class="form-group">
                                                                  <span style="color:blue">Quotation No.
                                                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $amku['cart_id'];?>">
                                                              <?php echo $amku1['cart_id'];?></span>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $idku=$amku['cart_id'];
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

                                                        <div class="table1">
                                                          <div class="row1">
                                                            <div class="cell1">
                                                              Stock Code
                                                            </div>
                                                            <div class="cell1">
                                                              Shading
                                                            </div>
                                                            <div class="cell1">
                                                              Qty
                                                            </div>
                                                            <div class="cell1">
                                                              Price (IDR)
                                                            </div><div class="cell1">
                                                              Dis1(%)
                                                            </div>
                                                            <div class="cell1">
                                                              Dis2(%)
                                                            </div>
                                                            <div class="cell1">
                                                              Total(IDR)
                                                            </div>
                                                          </div>
                                                        <?php
                                                        $a=0;
                                                        $idku=$amku['cart_id'];
                                                        $sql2 = "SELECT * FROM jualdtlq where no_cart='$idku'";
                                                             $query2 = mysqli_query($conn, $sql2);
                                                             while($amku2 = mysqli_fetch_array($query2)){
                                                               $no=$amku2["no"];
                                                               $a=$a+1;
                                                        ?>

                                                              <div class="row1">
                                                                <div class="cell1">
                                                                    <input type="hidden" name="jumrec" id="jumrec" value="<?php echo $a;?>">
                                                                  <?php echo $amku2['kode_stok']; ?>
                                                                    <input type="hidden" name="kodestok[]" id="kodestok[]" value="<?php echo $amku2['kode_stok']; ?>">
                                                                </div>
                                                                <div class="cell1">
                                                                    <input type="hidden" name="shading[]" id="shading[]" value="<?php echo $amku2['shading']; ?>">
                                                                  <?php echo $amku2['shading']; ?>
                                                                </div>

                                                                <div class="cell1">
                                                                  <input type="text" name="jum[]" id="jum[]" value="<?php echo $amku2['jumlah']; ?>">

                                                                </div>
                                                                <div class="cell1">
                                                                    <input type="text" name="harga[]" id="harga[]" value="<?php echo $amku2['harga']; ?>">

                                                                </div>

                                                                <div class="cell1">

                                                                  <input type="hidden" name="nolagi[]" id="nolagi[]" value="<?php echo $no; ?>">
                                                                  <input type="text" id="dis1[]" name="dis1[]">

                                                                </div>

                                                                <div class="cell1">
                                                                    <input type="text" name="dis2[]" id="dis2[]">
                                                                </div>
                                                                <div class="cell1">
                                                                    <input type="text" name="total[]" id="total[]" value="<?php echo $amku2['total']; ?>">
                                                                </div>


                                                                </div>

                                                            <?php } ?>
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
                                                      </div>
                                                      </div>
                                                        <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                            <button name="daftar" value="daftar" class="btn btn-primary">Save</button>
                                                        </div>
                                                      </form>

                                                </div>
                                            </div>

                                                                      </div>
                                       <?php }} ?>
                                        </tr>

                                      </tbody>
                                    </table>

                      </div>







                  </div>

                  <!-- end of content area 1 -->
                  <!-- begin of content area 2 -->

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

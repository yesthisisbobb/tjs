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
<style>
h4 {
padding-left: 50px;
font-family: Montserrat;
padding-top: 20px;
}
</style>
<html lang="en">
<head>
<script language=javascript>
var objekxhr, objekxhr1;
function ambildata()
{
buatxhr();
objekxhr.open("GET", "TampilMhs.php",true);
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
document.getElementById("kotak").innerHTML = objekxhr.responseText;
}
</script>
</head>

<?php
include('../blank_header.php')
 ?>
 <?php
 global $hal;
 $hal = "buy";
 include('../blank_subheader.php');
 ?>

<body class="sidebar-noneoverflow" onload="ambildata()">

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


                                  <div id="kotak" style="overflow-x:auto;" class="col-lg-12 col-12 mx-auto">
                <!-- start of content area 1 -->

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
                                        $sql = "SELECT * FROM master_buy where id='$nomerku'";
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
                                               <label class="col-sm-10 control-label">Post Date (Tanggal Posting)</label>
                                               <div class="col-sm-4">
                                                 <input type="text" readonly class="form-control" id="nom1" value="<?php echo $tgl; ?>" name="nom1">
                                              </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-10 control-label">TJS Code (Kode Barang)</label>
                                               <div class="col-sm-8">
                                                 <select name="kode" id="kode" class="form-control">
                                                   <option><?php echo $kodep; ?></option>
                                                 <?php
                                                   $sql = "SELECT * FROM master_stok order by kodetipe";
                                                        $query = mysqli_query($conn, $sql);
                                                        while($amku = mysqli_fetch_array($query)){
                                                       echo "<option>".$amku['kode_stok']."</option>";
                                                     }
                                                   ?>
                                                 </select>
                                               </div>
                                             </div>
                                             <div class="form-group">
                                                 <label class="col-sm-10 control-label">Buying Foreign Currency (Mata Uang Asing)</label>
                                                 <div class="col-sm-8">
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
                                                   <label class="col-sm-10 control-label">Buying Price in Foreign Exchange (Konversi Mata Uang)</label>
                                                   <div class="col-sm-8">
                                                   <input type="text" class="form-control" id="bp" name="bp" value="<?php echo $pricep; ?>">


                                                 </div>
                                                 </div>
                                              <div class="form-group">
                                                  <div class="col-sm-2">
                                                    Status
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
                                      <?php } else { ?>

                                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                                          <!-- begin panel-heading -->

                                          <!-- end panel-heading -->
                                          <!-- begin panel-body -->
                                          <div class="panel-body panel-form">
                                            <div class="container"><br>
                                 <div class="row">
                                   <div class="col-sm-4">
                                     Product Code (Kode Produk)
                                     <select name="kode" id="kode" class="form-control">
                                     <?php
                                       $sql = "SELECT * FROM master_stok";
                                            $query = mysqli_query($conn, $sql);
                                            while($amku = mysqli_fetch_array($query)){
                                           echo "<option>".$amku['kode_stok']."</option>";
                                         }
                                       ?>
                                     </select>
                                   </div>
                                 </div>
                                 <br>


                                 <div class="row">

                                     <div class="col-sm-4">
                                       Buying Foreign Currency (Mata Uang)
                                       <select name="buying_cur" id="buying_cur" class="form-control">

                                       <?php
                                         $sql = "SELECT * FROM master_cur";
                                              $query = mysqli_query($conn, $sql);
                                              while($amku = mysqli_fetch_array($query)){
                                             echo "<option>".$amku['kode']."</option>";
                                           }
                                         ?>
                                       </select>
                                   </div>





                                       <div class="col-sm-4">
                                         Buying Price(Harga Beli)
                                       <input type="text" class="form-control" id="bp" name="bp"  data-type="currency" onchange="cek()">
                                       <input type="hidden" class="form-control" id="bp1" name="bp1">
                                       <script>
                                       function cek()
                                       {
                                        a=document.getElementById("bp").value;
                                         var number = Number(a.replace(/[^0-9.-]+/g,""));
                                         document.getElementById("bp1").value=number;
                                       }
                                       </script>
                                     </div>
                                     <div class="col-sm-4">
                                       Status
                                       <select class="form-control" id="status" name="status">
                                         <option>-- Status -- </option>
                                         <option>Active</option>
                                         <option>InActive</option>
                                     </select>
                                   </div>
                                   </div><br>




<br>
                                      <div class="row">
                                      <div class="col-sm-8">
                                    <button type="submit" name="daftar" value="daftar" class="btn btn-info btn-xl">Submit</button>
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
        <?php
        include('../blank_footer.php')
        ?>
      </div>
    </div>
  </div>
  </div>
</div>
        <!--  END CONTENT AREA  -->

        <script>
        $("input[data-type='currency']").on({
          keyup: function() {
            formatCurrency($(this));
    },
    blur: function() {
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.

  // get input value
  var input_val = input.val();

  // don't validate empty input
  if (input_val === "") { return; }

  // original length
  var original_len = input_val.length;

  // initial caret position
  var caret_pos = input.prop("selectionStart");

  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      // right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val =  input_val;

    // final formatting
    if (blur === "blur") {
      // input_val += ".00";
    }
  }

  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
        </script>
        <script src="<?php echo $admin_url; ?>/demo5/assets/js/custom.js"></script>

    </div>

</body>
</html>

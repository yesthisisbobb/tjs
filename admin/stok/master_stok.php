<!DOCTYPE html>

<?php
session_start();
include("../../config.php");
include("../../proses.php");
if (!isset($_SESSION["username"])) {
  echo '<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
  return false;
}
if ($_SESSION["level"] != "admin") {
  echo '<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../' . $_SESSION["level"] . '/";
             </script>';
  return false;
}
?>
<html lang="en">

<head>
  <script language=javascript>
    var objekxhr, objekxhr1;

    function ambildata(str) {
      
      buatxhr();
      objekxhr.open("GET", "TampilMhs.php?q=" + str, true);
      objekxhr.send(null);
      objekxhr.onreadystatechange = tampilkan;

      document.getElementById("kode_stok").value =
                                        document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
                                        document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
                                        document.getElementById("grade").value;
                                      document.getElementById("nm_stok").value =
                                        document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
                                        document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
                                        +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
    }

    function buatxhr() {
      if (window.ActiveXObject)

      {
        objectxhr = new ActiveXObject("Microsoft.XMLHTTP");
      } else if (window.XMLHttpRequest) {
        objekxhr = new XMLHttpRequest();
      } else {
        alert("ganti browser anda");
      }
    }

    function tampilkan() {
      document.getElementById("kotak").value = objekxhr.responseText;
    }

    function ambildatagrup1() {
      buatxhr();
      objekxhr.open("GET", "TampilMhsgrup1.php?q=" + objekxhr.responseText.toString(), true);
      objekxhr.send(null);
      objekxhr.onreadystatechange = tampilkangrup1;
    }

    function tampilkangrup1() {
      document.getElementById("namaalias").value = objekxhr.responseText;
    }

    function ambildatagrup2(str) {
      buatxhr();
      objekxhr.open("GET", "TampilMhsgrupmerk.php?q=" + str, true);
      objekxhr.send(null);
      objekxhr.onreadystatechange = tampilkangrup2;
    }

    function tampilkangrup2() {
      document.getElementById("kodku").value = objekxhr.responseText;
    }


    function ambildatagrup(str) {

      $.get("TampilMhsgrup.php?q=" + str, function(data) {
        document.getElementById("kodegrup1").value = data;
        $.get("TampilMhsgrup1.php?q=" + data, function(data1) {
          document.getElementById("namaalias").value = data1;
        });
      });
      document.getElementById("kode_stok").value =
      document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
    }

    function tampilkangrup() {

    }

    function ambildatahs(str) {
      buatxhr();
      objekxhr.open("GET", "TampilMhshs.php?q=" + str, true);
      objekxhr.send(null);
      objekxhr.onreadystatechange = tampilkanhs;
    }

    function tampilkanhs() {
      document.getElementById("kodehsku1").value = objekxhr.responseText;
    }
  </script>
</head>
<?php
include('../blank_header.php')
?>

<body class="sidebar-noneoverflow">
  <div class="loading">Loading&#8230;</div>
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
                    <h4>Stock <a href="master_stok.php#section2" class="btn  btn-rounded btn-primary btn-sm" role="button">Add New</a></h4>
                  </div>
                </div>
              </div>
              <hr class="dott">

              <div class="col-lg-12 col-12 mx-auto" style="overflow-x:auto;">
                <!-- start of content area 1 -->
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <!-- <th width="1%">No</th> -->
                      <th class="text-nowrap">Action</th>
                      <th class="text-nowrap">Pict</th>
                      <th class="text-wrap">TJS Item Code</th>
                      <th class="text-nowrap">Group</th>
                      <th class="text-wrap">Product Type </th>
                      <th class="text-wrap">Factory Code</th>
                      <th class="text-nowrap">HS Code</th>
                      <th class="text-nowrap">Brand</th>
                      <th class="text-nowrap">Supplier</th>
                      <th class="text-nowrap">Surface</th>
                      <th class="text-nowrap">Color</th>
                      <th class="text-nowrap">Pattern</th>
                      <th class="text-nowrap">COO</th>
                      <th class="text-nowrap">L</th>
                      <th class="text-nowrap">W</th>
                      <th class="text-nowrap">T</th>
                      <th class="text-nowrap">pcs/ctn</th>
                      <th class="text-nowrap">sqm/ctn</th>


                    </tr>
                  </thead>
                  <tbody id="dataStock">
                    <script type="text/javascript">

                    </script>

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
                <div class="row" id="section2">
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Add/Update</h4>
                  </div>

                </div>
              </div>
              <hr class="dott">
              <div class="col-lg-12 col-12 mx-auto">

                <form class="form-horizontal" method="post" action="proses-stok.php">
                  <?php
                  $aksi = $_GET['aksi'];
                  if ($aksi == "view") {
                    $nomerku = $_GET['no'];
                    $sql = "SELECT * FROM master_stok where no='$nomerku'";
                    $query = mysqli_query($conn, $sql);
                    while ($amku = mysqli_fetch_array($query)) {
                      $kodetipe = $amku['kodetipe'];
                      $kodep = $amku['kodeperusahaan'];
                      $fcode = $amku['factory_code'];
                      $hscode = $amku['kodehs'];
                      $tjs = $amku['kode_stok'];
                      $kodem = $amku['kodemerk'];
                      $kodes = $amku['kodesup'];
                      $kodediv = $amku['kodedivisi'];
                      $kelasku = $amku['kelas'];
                      $kelasku = $amku['kelas'];
                      $panjangku = $amku['panjang'];
                      $lebarku = $amku['lebar'];
                      $tebalku = $amku['tebal'];
                      $tinggi = $amku['tinggi'];
                      $sellunit = $amku['sellunit'];
                      $ctnpallet = $amku['ctnpallet'];
                      $pcsctnku = $amku['pcsctn'];
                      $sqmctnku = $amku['sqmctn'];
                      $kgctnku = $amku['kgsstok'];
                      $cont = $amku['contstan'];
                      $maxcont = $amku['maxcont'];
                      $stokcont = $amku['stokcont'];
                      $volctnku = $amku['cubicstok'];
                      $country = $amku['country'];
                      $nom = $amku['no'];
                      $des1 = $amku['des'];
                      $status1 = $amku['status'];

                      $jum = $amku['jum'];

                      $sql = "SELECT * FROM master_tipe where kode='$kodetipe'";
                      $query = mysqli_query($conn, $sql);
                      while ($amku = mysqli_fetch_array($query)) {
                        $namatipe = $amku["nama"];
                        break;
                      }
                      $sql = "SELECT * FROM master_perusahaan1 where kode='$kodep'";
                      $query = mysqli_query($conn, $sql);
                      while ($amku = mysqli_fetch_array($query)) {
                        $kodeperusahaan = $amku["kode"];
                        $namaperusahaan = $amku["nm_perusahaan"];
                        break;
                      }
                      $sql = "SELECT * FROM master_merk where kode='$kodem'";
                      $query = mysqli_query($conn, $sql);
                      while ($amku = mysqli_fetch_array($query)) {
                        $kodemerk = $amku["kode"];
                        $namamerk = $amku["nama"];
                        break;
                      }

                      $sql = "SELECT * FROM master_supplier where kode='$kodes'";
                      $query = mysqli_query($conn, $sql);
                      while ($amku = mysqli_fetch_array($query)) {
                        $kodesup = $amku["kode"];
                        $namasup = $amku["nama"];
                        $negarasup = $amku["negara"];
                        break;
                      }
                      $sql = "SELECT * FROM master_divisi where kode='$kodediv'";
                      $query = mysqli_query($conn, $sql);
                      while ($amku = mysqli_fetch_array($query)) {
                        $kodedivisi = $amku["kode"];
                        $namadivisi = $amku["nama"];
                        break;
                      }

                      $namap = $amku['nama'];
                      $shading = $amku['shading'];
                      $faces = $amku['faces'];
                      $color = $amku['color'];
                      $surface = $amku['surface'];
                      $pattern = $amku['pattern'];
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

                              <li class="nav-item">
                                <a class="nav-link" id="att-tab" data-toggle="tab" href="#att" role="tab" aria-controls="att" aria-selected="false">Dimension</a>
                              </li>



                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br><br>
                                <div class="row">
                                  <div class="col-sm-6">

                                    <img src="../gambar/<?php echo $kodetipe . ".jpg"; ?>" width="125" height="125"><br><br>
                                  </div>
                                </div>
                                <div class="row">


                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Product Type</label>
                                      <select name="kodetipe" id="kodetipe" class="form-control">
                                        <option value=<?php echo $kodetipe; ?>><?php echo $namatipe; ?></option>
                                        <?php
                                        $sql = "SELECT * FROM master_tipe";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option>" . $amku['kode'] . "</option>";
                                        }
                                        ?>
                                      </select>

                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label> TJS Code </label>
                                      <input type="text" class="form-control" value="<?php echo $tjs; ?>" id="kode_stok" name="kode_stok" required="required" data-error="Please enter Factory Code.">

                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label> Factory Code </label>
                                      <input type="text" class="form-control" value="<?php echo $fcode; ?>" id="fic" name="fic" required="required" data-error="Please enter Factory Code.">

                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label> HS Code </label>
                                      <select name="hscode" id="hscode" class="form-control" required>
                                        <option><?php echo $hscode; ?></option>
                                        <?php
                                        $sql = "SELECT * FROM master_hscode";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['kode'] . ">" . $amku['kode'] . "-" . $amku['nama'] . "-" . $amku['nama1'] . "</option>";
                                        }
                                        ?>
                                      </select>


                                    </div>
                                  </div>
                                </div>
                                <div class="row">


                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Company Name</label>
                                      <select name="kodeperusahaan" id="kodeperusahaan" class="form-control">
                                        <option value=<?php echo $kodep; ?>><?php echo $kodep . "-" . $namaperusahaan; ?></option>
                                        <?php
                                        $sql = "SELECT * FROM master_perusahaan1";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['kode'] . ">" . $amku['kode'] . "-" . $amku['nm_perusahaan'] . "</option>";
                                        }
                                        ?>
                                      </select>

                                    </div>
                                  </div>



                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Brand Name</label>
                                      <select name="kodemerk" id="kodemerk" class="form-control">
                                        <option value=<?php echo $kodemerk; ?>><?php echo $kodemerk . "-" . $namamerk; ?></option>
                                        <?php
                                        $sql = "SELECT * FROM master_merk";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['kode'] . ">" . $amku['kode'] . "-" . $amku['nama'] . "</option>";
                                        }
                                        ?>
                                      </select>

                                    </div>
                                  </div>


                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      <label>Supplier Name(Code, Name, Country Code)</label>
                                      <select name="kodesup" id="kodesup" class="form-control"">
                                        <option value=<?php echo $kodesup; ?>><?php echo $kodesup . "-" . $namasup . "-" . $negarasup; ?></option>
                                        <?php
                                        $sql = "SELECT * FROM master_supplier";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          $negarasup1 = $amku['negara'];
                                          echo "<option value=" . $amku['kode'] . ">" . $amku['kode'] . "-" . $amku['nama'] . "-" . $amku['negara'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>

                                    <input type="hidden" name="kotak" id="kotak" value="<?php echo $negarasup1; ?>">
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>COO</label>
                                      <?php
                                      $sql = "SELECT * FROM country where code='$country'";
                                      $query = mysqli_query($conn, $sql);
                                      while ($amku = mysqli_fetch_array($query)) {
                                        $neg = $amku['countryname'];
                                      }
                                      ?>
                                      <select name="country" id="country" class="form-control">
                                        <?php echo "<option value=" . $country . ">" . $neg . "</option>"; ?>
                                        <?php
                                        $sql = "SELECT * FROM country";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['code'] . ">" . $amku['countryname'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Length</label>
                                      <input type="text" class="form-control" id="panjang" name="panjang" value="<?php echo $panjangku; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">



                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Width</label>
                                      <input type="text" class="form-control" id="lebar" name="lebar" value="<?php echo $lebarku; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Height</label>
                                      <input type="text" class="form-control" id="tinggi" name="tinggi" value="<?php echo $tinggi; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Thicknes</label>
                                      <input type="text" class="form-control" id="tebal" name="tebal" value="<?php echo $tebalku; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Sell Unit</label>
                                      <input type="text" class="form-control" id="sellunit" name="sellunit" value="<?php echo $sellunit; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>PCS/BOX</label>
                                      <input type="text" class="form-control" id="pcsctn" name="pcsctn" value="<?php echo $pcsctnku; ?>">

                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>SQM/BOX</label>
                                      <input type="text" class="form-control" id="sqmctn" name="sqmctn" value="<?php echo $sqmctnku; ?>">

                                    </div>
                                  </div>

                                </div>
                                <div class="row">
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>BOX/PALLET</label>
                                      <input type="text" class="form-control" id="ctnpallet" name="ctnpallet" value="<?php echo $ctnpallet; ?>">

                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">

                                      <label>KG/BOX</label>
                                      <input type="text" class="form-control" id="kgctn" name="kgctn" value="<?php echo $kgctnku; ?>">

                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">

                                      <label>Vol</label>
                                      <input type="text" class="form-control" id="volctn" name="volctn" value="<?php echo $volctnku; ?>">

                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Container</label>
                                      <input type="text" class="form-control" id="contstan" name="contstan" value="<?php echo $cont; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Max/Container</label>
                                      <input type="text" class="form-control" id="maxcont" name="maxcont" value="<?php echo $maxcont; ?>">

                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                      <label>Stock/Container</label>
                                      <input type="text" class="form-control" id="stokcont" name="stokcont" value="<?php echo $stokcont; ?>">
                                    </div>
                                  </div>

                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label for="comment">Description</label>
                                      <textarea class="form-control" rows="5" id="commentku" name="commentku"><?php echo $des1; ?></textarea>
                                    </div>
                                  </div>

                                </div>
                                <?php echo $status1; ?>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <select class="form-control" id="status" name="status">
                                        <option><?php echo $status1; ?></option>
                                        <option>Active</option>
                                        <option>InActive</option>
                                      </select>
                                    </div>
                                  </div>

                                </div>

                                <button type="submit" name="daftar1" value="daftar1" class="btn-primary btn-rounded btn-sm">Update</button>
                              </div>
                            </div>



                          <?php } else { ?>
                            <!-- 1. BOOTSTRAP v4.0.0         CSS !-->

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" id="att-tab" data-toggle="tab" href="#att" role="tab" aria-controls="att" aria-selected="false">Dimension</a>
                              </li>


                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <br><br>
                                <div class="row">


                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      Product Type
                                      <select name="kodetipe" id="kodetipe" class="form-control" onchange="ambildatagrup(this.value)">
                                        <option value="">Choose Product type</option>
                                        <?php
                                        $sql = "SELECT * FROM master_tipe";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['kode'] . ">" . $amku['kode'] . "-" . $amku['nama'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    Group Name
                                    <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Group Name" id="kodegrup1" name="kodegrup1">
                                      <input type="text" class="form-control" placeholder="Alias" id="namaalias" name="namaalias" readonly>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      HS Code
                                      <select name="hscode" id="hscode" class="form-control" required>
                                        <option>HS Code</option>
                                        <?php
                                        $sql = "SELECT * FROM master_hscode";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['kode'] . ">" . $amku['kode'] . "-" . $amku['nama'] . "-" . $amku['nama1'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>

                                    </div>
                                  </div>


                                </div>

                                <div class="row">

                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      Company Name
                                      <select name="kodeperusahaan" id="kodeperusahaan" class="form-control">
                                        <option value="">Choose Company Name</option>
                                        <?php
                                        $sql = "SELECT * FROM master_perusahaan1";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['kode'] . ">" . $amku['kode'] . "-" . $amku['nm_perusahaan'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>

                                    </div>
                                  </div>


                                  <div class="col-sm-4">
                                    Brand Name
                                    <div class="form-group">
                                      <select name="kodemerk" id="kodemerk" class="form-control" onchange="ambildatagrup2(this.value)">
                                        <option value="">Choose Brand Name</option>
                                        <?php
                                        $sql = "SELECT * FROM master_merk";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option>" . $amku['nama'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                      <input type="text" class="form-control" id="kodku" name="kodku" placeholder="Brand Name" readonly><span>
                                        <font color="Red">*Required</font>
                                      </span>

                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    Country Of Origin
                                    <div class="form-group">
                                      <select name="country" id="country" class="form-control">
                                        <option value="">Country Of Origin</option>
                                        <?php
                                        $sql = "SELECT * FROM country";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['code'] . ">" . $amku['countryname'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">


                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      Supplier Name
                                      <select name="kodesup" id="kodesup" class="form-control" onchange="ambildata(this.value)">
                                        <option value="">Choose Supplier Name</option>
                                        <?php
                                        $sql = "SELECT * FROM master_supplier";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['kode'] . ">" . $amku['kode'] . "-" . $amku['nama'] . "-" . $amku['negara'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>
                                    </div>
                                    <input type="hidden" name="kotak" id="kotak">
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      Factory Code
                                      <input type="text" class="form-control" placeholder="Factory Item Code" id="fic" name="fic" required="required" data-error="Please enter Factory Code.">
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>
                                    </div>
                                  </div>

                                  <div class="col-sm-4">
                                    <div class="form-group">
                                      Product Grade
                                      <select name="grade" id="grade" class="form-control">
                                        <option value="">Choose Product Grade</option>
                                        <?php
                                        $sql = "SELECT * FROM master_grade";
                                        $query = mysqli_query($conn, $sql);
                                        while ($amku = mysqli_fetch_array($query)) {
                                          echo "<option value=" . $amku['id'] . ">" . $amku['nama'] . "</option>";
                                        }
                                        ?>
                                      </select>
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>

                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    Length
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="panjang" name="panjang" placeholder="Length">
                                    </div>
                                  </div>


                                  <div class="col-sm-3">
                                    Width
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="lebar" name="lebar" placeholder="Width">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    Pcs/Ctn
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="pcsctn" name="pcsctn" placeholder="Pcs/Carton">
                                      <span>
                                        <font color="Red">*Tile Product</font>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    Carton/Pallet
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="ctnpallet" name="ctnpallet" placeholder="Box/Pallet">
                                      <span>
                                        <font color="Red">*Tile Product</font>
                                      </span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-12">
                                    TJS Code
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="kode_stok" name="kode_stok" placeholder="Generate TJS Code" disabled required>
                                      <span>
                                        <font color="Red">*Required</font>
                                      </span>

                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    Product Name
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="nm_stok" name="nm_stok" placeholder="Generate Product Name" required>
                                      <!-- <button type="button" id="tom1" class="btn-primary" onclick="getnama()">Generate Name</button>
                                                                              <span><font color="Red">*Required, Click Generate Button</font></span> -->

                                    </div>
                                  </div>


                                  <script>
                                    function getkode() {

                                      document.getElementById("kode_stok").value =
                                        document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
                                        document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
                                        document.getElementById("grade").value;
                                      document.getElementById("nm_stok").value =
                                        document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
                                        document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
                                        +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;


                                    }
                                  </script>
                                  <script>
                                    function getnama() {

                                      //   document.getElementById("nm_stok").value=
                                      //   document.getElementById("namaalias").value+" "+document.getElementById("kodemerk").value+" "+
                                      //   document.getElementById("kodetipe").value+" "+document.getElementById("panjang").value+"x"+
                                      //   +document.getElementById("lebar").value+" "+"@"+document.getElementById("pcsctn").value;
                                      //
                                      // }
                                    }
                                  </script>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="att" role="tabpanel" aria-labelledby="att-tab">
                                <br><br>
                                <div class="row">


                                  <div class="col-sm-3">
                                    Height
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="tinggi" name="tinggi" placeholder="Height">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    Thickness
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="tebal" name="tebal" placeholder="Thickness">
                                      <span>
                                        <font color="Red">*Tile Product</font>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                    SQM/Carton
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="sqmctn" name="sqmctn" placeholder="SQM/Carton">
                                      <span>
                                        <font color="Red">*Tile Product</font>
                                      </span>
                                    </div>
                                  </div>

                                  <div class="col-sm-4">
                                    Selling Unit/ Stock Unit
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="sellunit" name="sellunit" placeholder="Selling Unit/Stock Unit">
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                  <div class="col-sm-4">
                                    Weight (KGS/Stock Unit)
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="kgsstok" name="kgsstok" placeholder="Kgs/Stock Unit">
                                    </div>
                                  </div>


                                  <div class="col-sm-4">
                                    Cubic Meters/Stock Unit
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="cubicstok" name="cubicstok" placeholder="Cubic Meters/Stock Unit">
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    Container Standard
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="contstan" name="contstan" placeholder="Container Standard">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4">
                                    Max Stock Unnit/Container
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="maxcont" name="maxcont" placeholder="Max Stock Unit/Cont">

                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    Stock Unit/Container
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="stokcont" name="stokcont" placeholder="Stock Unit/Cont">
                                    </div>
                                  </div>

                                </div>
                                <div class="row">
                                  <div class="col-sm-12">

                                    <div class="form-group">
                                      <label for="comment">Description</label>
                                      <textarea class="form-control" rows="5" id="commentku" name="commentku"></textarea>
                                    </div>
                                  </div>

                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    Status
                                    <div class="form-group">
                                      <select class="form-control" id="status" name="status">
                                        <option>Active</option>
                                        <option>InActive</option>
                                      </select>
                                    </div>
                                  </div>

                                </div>


                                <!--<div class="form-group">
                                  <label class="col-sm-10 control-label">Unit</label>
                                  <div class="col-sm-2">
                                    <select class="form-control" id="unitku" name="unitku">
                                      <option>M2</option>

                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-10 control-label">Loading Unit</label>
                                  <div class="col-sm-2">
                                    <select class="form-control" id="loadku" name="loadku">
                                      <option>TOONAGE</option>

                                    </select>
                                  </div>
                                </div> -->


                              </div>
                              <button type="submit" name="daftar" value="daftar" class="btn btn-primary btn-rounded btn-sm">Submit</button>
                            </div>
                          <?php
                        }
                          ?>
                </form>
                <script type="text/javascript">
                  $(document).ready(function() {
                    $('#kodesup').select2();
                    $('#kodetipe').select2();
                  });
                </script>


              </div>
            </div>
          </div>

        </div>


        <!-- end of content area 2 -->

        <div class="footer-wrapper">
          <div class="footer-section f-section-1">
            <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">Karya Modern</a>, All rights reserved.</p>
          </div>
          <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg></p>
          </div>
        </div>
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
    $(document).ready(function() {

      $.ajax({
        type: 'POST',
        url: 'ajaxLoadMasterStock.php',
        success: function(data) {
          document.getElementById("dataStock").innerHTML = data;

          $('#zero-config').DataTable({
            "oLanguage": {
              "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
              },
              "sInfo": "Showing page _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Search...",
              "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
          });
          $('.loading').fadeOut();
        }
      });

      document.getElementById("kodeperusahaan").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });

      document.getElementById("kodku").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });

      document.getElementById("country").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });

      document.getElementById("kodesup").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });
      document.getElementById("kodetipe").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });

      document.getElementById("grade").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });
      document.getElementById("namaalias").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });
      document.getElementById("kodemerk").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });
      document.getElementById("panjang").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });
      document.getElementById("lebar").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });
      document.getElementById("pcsctn").addEventListener("change", function() {

        document.getElementById("kode_stok").value =
          document.getElementById("kodeperusahaan").value + document.getElementById("kodku").value +
          document.getElementById("country").value + document.getElementById("kodesup").value + document.getElementById("kodetipe").value +
          document.getElementById("grade").value;
        document.getElementById("nm_stok").value =
          document.getElementById("namaalias").value + " " + document.getElementById("kodemerk").value + " " +
          document.getElementById("kodetipe").value + " " + document.getElementById("panjang").value + "x" +
          +document.getElementById("lebar").value + " " + "@" + document.getElementById("pcsctn").value;
      });
    });
  </script>
  <script>

  </script>
  </div>
</body>

</html>
<!DOCTYPE html>

<?php
session_start();
include("../../config.php");
// include("../../proses.php");
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
                    <h4>Product Type <a href="master_tipe.php#section2" class="btn  btn-rounded btn-primary btn-sm" role="button">Add New</a></h4>
                  </div>
                </div>
              </div>
              <hr class="dott">

              <div style="overflow-x:auto;" class="col-lg-12 col-12 mx-auto">
                <!-- start of content area 1 -->
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <!-- <th width="1%">No</th> -->

                      <th class="text-wrap">Picture</th>
                      <th class="text-wrap">Product Type Code</th>
                      <th class="text-wrap">Product Type Name</th>
                      <th class="text-wrap">Import/Local</th>
                      <th class="text-nowrap">Length</th>
                      <th class="text-nowrap">Width</th>
                      <th class="text-nowrap">Surface</th>
                      <th class="text-nowrap">Color</th>
                      <th class="text-nowrap">Pattern</th>


                      <th class="text-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody id="dataTipe">


                   
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

                <form id="myform" class="form-horizontal" method="post" action="proses-tipe.php">
                  <?php
                  $aksi = $_GET['aksi'];
                  if ($aksi == "view") {
                    $nomerku = $_GET['no'];
                    $sql = "SELECT * FROM master_tipe where id='$nomerku'";
                    $query = mysqli_query($conn, $sql);
                    while ($amku = mysqli_fetch_array($query)) {
                      $namag = $amku['kodegrup'];
                      $bc = $amku['bc'];
                      $bc1 = $amku['bc1'];
                      $import = $amku['import'];
                      $kodep = $amku['kode'];
                      $namap = $amku['nama'];
                      $glosy = $amku['glosy'];
                      $panjang = $amku['panjang'];
                      $lebar = $amku['lebar'];
                      $material = $amku['material'];
                      $faces = $amku['faces'];
                      $color = $amku['color'];
                      $surface = $amku['surface'];
                      $pattern = $amku['pattern'];
                      $buy = $amku['buy'];
                      $stock = $amku['stock'];
                      $selling = $amku['selling'];
                      $min = $amku['min'];
                      $max = $amku['max'];
                      $smallamount = $amku['smallamount'];
                      $konp = $amku['kon'];
                      $ll = $amku['ll'];
                      $nts = $amku['nts'];
                      $status = $amku['status'];


                      $nom = $amku['id'];
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



                            <!-- begin -->
                            <div class="row">
                              <div class="col-sm-3">Product Group
                                <select name="kodegrup" id="kodegrup" class="form-control">
                                  <option><?php echo $namag; ?></option>
                                  <?php
                                  $sqlpgg = "SELECT * FROM detail_sub_grup";
                                  $querypgg = mysqli_query($conn, $sqlpgg);
                                  while ($amkupgg = mysqli_fetch_array($querypgg)) {
                                    echo '<option>' . $amkupgg['nama'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-sm-3"> Product Business Company
                                <select name="bc" id="bc" class="form-control">
                                  <option><?php echo $bc; ?></option>
                                  <?php
                                  $sqlpbc = "SELECT * FROM master_divisi";
                                  $querypbc = mysqli_query($conn, $sqlpbc);
                                  while ($amkupbc = mysqli_fetch_array($querypbc)) {
                                    echo '<option>' . $amkupbc['nama'] . '</option>';
                                  }
                                  ?>
                                </select>

                              </div>
                              <div class="col-sm-3"> Product Business Category
                                <select name="bc1" id="bc1" class="form-control">
                                  <option><?php echo $bc1; ?></option>

                                  <?php
                                  $sqlbb = "SELECT * FROM master_perusahaan";
                                  $querybb = mysqli_query($conn, $sqlbb);
                                  while ($amkubb = mysqli_fetch_array($querybb)) {
                                    echo '<option>' . $amkubb['nm_perusahaan'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-sm-3"> Import/Local
                                <div class="form-group">
                                  <select class="form-control" id="import" name="import">
                                    <option><?php echo $import; ?></option>
                                    <option>Import</option>
                                    <option>Local</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-4">Type Code
                                <div class="form-group">
                                  <input type="text" class="bundar form-control" id="kode" name="kode" placeholder="Type Code" value=<?php echo $kodep; ?> required>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-sm-12">Type Name
                                <div class="form-group">
                                  <input type="text" class="bundar form-control" id="nama" name="nama" placeholder="Type Name" value=<?php echo $namap; ?> required>
                                </div>
                              </div>
                            </div>

                            <div class="row">

                              <div class="col-sm-2"> Length
                                <input type="text" class="bundar form-control" id="panjang" name="panjang" placeholder="Length" value=<?php echo $panjang; ?> required>
                                <span>
                                  <font color="Red">*Tile Product</font>
                                </span>
                              </div>

                              <div class="col-sm-2">Width
                                <input type="text" class="bundar form-control" id="lebar" name="lebar" placeholder="Width" value=<?php echo $lebar; ?> required>
                                <span>
                                  <font color="Red">*Tile Product</font>
                                </span>
                              </div>
                              <div class="col-sm-2">Number Of Faces
                                <input type="text" class="bundar form-control" id="faces" name="faces" placeholder="Faces" value=<?php echo $faces; ?>>
                                <span>
                                  <font color="Red">*Tile Product</font>
                                </span>
                              </div>
                              <div class="col-sm-2"> Surfaces
                                <div class="form-group">
                                  <select name="surface" id="surface" class="form-control">
                                    <?php
                                    $sqls = "SELECT * FROM master_surface where nama='$surface'";
                                    $querys = mysqli_query($conn, $sqls);
                                    while ($amkus = mysqli_fetch_array($querys)) {
                                      echo '<option>' . $amkus['nama'] . '</option>';
                                    }
                                    ?>

                                    <?php
                                    $sqlss = "SELECT * FROM master_surface";
                                    $queryss = mysqli_query($conn, $sqlss);
                                    while ($amkuss = mysqli_fetch_array($queryss)) {
                                      echo '<option value=' . $amkuss['nama'] . '>' . $amkuss['nama'] . '</option>';
                                    }
                                    ?>
                                  </select>
                                  <span>
                                    <font color="Red">*Tile Product</font>
                                  </span>
                                </div>
                              </div>
                              <div class="col-sm-2">Color
                                <div class="form-group">
                                  <select name="color" id="color" class="form-control">
                                    <option><?php echo $color; ?></option>
                                    <?php
                                    $sqlcc = "SELECT * FROM master_color";
                                    $querycc = mysqli_query($conn, $sqlcc);
                                    while ($amkucc = mysqli_fetch_array($querycc)) {
                                      echo '<option>' . $amkucc['nama'] . '</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>


                            <div class="row">
                              <div class="col-sm-2">Pattern
                                <div class="form-group">
                                  <select name="pattern" id="pattern" class="form-control">
                                    <option><?php echo $pattern; ?></option>

                                    <?php
                                    $sqlpt = "SELECT * FROM master_pattern";
                                    $querypt = mysqli_query($conn, $sqlpt);
                                    while ($amkupt = mysqli_fetch_array($querypt)) {
                                      echo '<option>' . $amkupt['nama'] . '</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-2">Material Class
                                <select name="material" id="material" class="form-control">
                                  <?php

                                  $sqlm = "SELECT * FROM master_material where id='$material'";
                                  $querym = mysqli_query($conn, $sqlm);
                                  while ($amkum = mysqli_fetch_array($querym)) {
                                    echo '<option>' . $amkum['nama'] . '</option>';
                                  }
                                  ?>
                                  <?php
                                  $sqlmc = "SELECT * FROM master_material";
                                  $querymc = mysqli_query($conn, $sqlmc);
                                  while ($amkumc = mysqli_fetch_array($querymc)) {
                                    echo '<option value=' . $amkumc['nama'] . '>' . $amkumc['nama'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-sm-2">Buying Unit
                                <div class="form-group">
                                  <select name="buy" id="buy" class="form-control">
                                    <?php
                                    $sql1 = "SELECT * FROM master_unit where id='$buy'";
                                    $query1 = mysqli_query($conn, $sql1);
                                    while ($amku1 = mysqli_fetch_array($query1)) {
                                      echo '<option>' . $amku1['nama'] . '</option>';
                                    }
                                    ?>
                                    <?php
                                    $sqlbuyunit = "SELECT * FROM master_unit";
                                    $querybuyunit = mysqli_query($conn, $sqlbuyunit);
                                    while ($amkubuyunit = mysqli_fetch_array($querybuyunit)) {
                                      echo '<option>' . $amkubuyunit['nama'] . '</option>';
                                    }
                                    ?>
                                  </select>

                                </div>
                              </div>
                              <div class="col-sm-2">Stock Unit
                                <select name="stock" id="stock" class="form-control">
                                  <?php
                                  $sqlstokunit = "SELECT * FROM master_unit where id='$stock'";
                                  $querystokunit = mysqli_query($conn, $sqlstokunit);
                                  while ($amkustokunit = mysqli_fetch_array($querystokunit)) {
                                    echo '<option>' . $amkustokunit['nama'] . '</option>';
                                  }
                                  ?>
                                  <?php
                                  $sqlstokunit1 = "SELECT * FROM master_unit";
                                  $querystokunit1 = mysqli_query($conn, $sqlstokunit1);
                                  while ($amkustokunit1 = mysqli_fetch_array($querystokunit1)) {
                                    echo '<option value=' . $amkustokunit1['nama'] . '>' . $amkustokunit1['nama'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>

                              <div class="col-sm-2">Selling Unit
                                <select name="selling" id="selling" class="form-control">
                                  <?php
                                  $sql1 = "SELECT * FROM master_unit where id='$selling'";
                                  $query1 = mysqli_query($conn, $sql1);
                                  while ($amku1 = mysqli_fetch_array($query1)) {
                                    echo '<option>' . $amku1['nama'] . '</option>';
                                  }
                                  ?>
                                  <?php
                                  $sql = "SELECT * FROM master_unit";
                                  $query = mysqli_query($conn, $sql);
                                  while ($amku = mysqli_fetch_array($query)) {
                                    echo '<option value=' . $amku['id'] . '>' . $amku['nama'] . '</option>';
                                  }
                                  ?>
                                </select>

                              </div>
                              <div class="col-sm-2">Buying Price Conversion to Sell Unit
                                <input type="text" class="bundar form-control" id="kon" name="kon" value="<?php echo $konp; ?>">
                              </div>

                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-2">Loading Limit
                                  <select name="ll" id="ll" class="form-control">
                                    <option><?php echo $ll; ?></option>
                                    <?php
                                    $sql = "SELECT * FROM master_ll";
                                    $query = mysqli_query($conn, $sql);
                                    while ($amku = mysqli_fetch_array($query)) {
                                      echo '<option value=' . $amku['id'] . '>' . $amku['nama'] . '</option>';
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="col-sm-2">Need To Stock?
                                  <select class="form-control" id="nts" name="nts">
                                    <option><?php echo $nts; ?></option>
                                    <option>Yes</option>
                                    <option>No</option>
                                  </select>
                                </div>
                                <div class="col-sm-2">Minimal Stock
                                  <input type="text" class="bundar form-control" id="min" name="min" placeholder="Minimal Stock" value=<?php echo $min; ?>>
                                </div>
                                <div class="col-sm-2">Maximal Stock
                                  <input type="text" class="bundar form-control" id="max" name="max" placeholder="Maximal Stock" value=<?php echo $max; ?>>
                                </div>
                                <div class="col-sm-2">Small Amount Level
                                  <input type="text" class="bundar form-control" id="smallamount" name="smallamount" placeholder="Small Amount" value=<?php echo $smallamount; ?>>
                                </div>

                              </div>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-2">
                                  <select class="form-control" id="status" name="status">
                                    <option><?php echo $status; ?></option>
                                    <option>Active</option>
                                    <option>InActive</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group">
                                <div class="col-sm-2">
                                  <button type="submit" name="daftar1" value="daftar1" class="btn btn-primary btn-rounded btn-sm">Update</button>
                                </div>
                              </div>
                            </div>

                            <!-- end -->





                          <?php } else { ?>
                            <!-- 1. BOOTSTRAP v4.0.0         CSS !-->

                            <div class="row">
                              <div class="col-sm-6">
                                Product Group
                                <select name="kodegrup" id="kodegrup" class="form-control">
                                  <option>Product Group</option>
                                  <?php
                                  $sql = "SELECT * FROM detail_sub_grup";
                                  $query = mysqli_query($conn, $sql);
                                  while ($amku = mysqli_fetch_array($query)) {
                                    echo '<option>' . $amku['nama'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-sm-6">
                                Product Business Company
                                <select name="bc" id="bc" class="form-control">
                                  <option>Product Business Company</option>
                                  <?php
                                  $sql = "SELECT * FROM master_divisi";
                                  $query = mysqli_query($conn, $sql);
                                  while ($amku = mysqli_fetch_array($query)) {
                                    echo '<option>' . $amku['nama'] . '</option>';
                                  }
                                  ?>
                                </select>

                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-sm-4">
                                Division
                                <select name="bc1" id="bc1" class="form-control">
                                  <option>Product Business Category</option>
                                  <?php
                                  $sql = "SELECT * FROM master_perusahaan";
                                  $query = mysqli_query($conn, $sql);
                                  while ($amku = mysqli_fetch_array($query)) {
                                    echo '<option>' . $amku['nm_perusahaan'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-sm-4">
                                Import/Local
                                <div class="form-group">
                                  <select class="form-control" id="import" name="import">
                                    <option>-- Import/Local --</option>
                                    <option>Import</option>
                                    <option>Local</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              Product Type Code
                              <div class="form-group">
                                <input type="text" class="bundar form-control" id="kode" name="kode" placeholder="Type Code" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-12">
                              Product Type Name
                              <div class="form-group">
                                <input type="text" class="bundar form-control" id="nama" name="nama" placeholder="Type Name" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">

                            <div class="col-sm-2">
                              Length
                              <input type="text" class="bundar form-control" id="panjang" name="panjang" placeholder="Length" required>
                              <span>
                                <font color="Red">*Tile Product</font>
                              </span>
                            </div>

                            <div class="col-sm-2">
                              Width
                              <input type="text" class="bundar form-control" id="lebar" name="lebar" placeholder="Width" required>
                              <span>
                                <font color="Red">*Tile Product</font>
                              </span>
                            </div>
                            <div class="col-sm-2">
                              Faces
                              <input type="text" class="bundar form-control" id="faces" name="faces" placeholder="Faces">
                              <span>
                                <font color="Red">*Tile Product</font>
                              </span>
                            </div>
                            <div class="col-sm-2">
                              Surface
                              <div class="form-group">
                                <select name="surface" id="surface" class="form-control">
                                  <option>Surface</option>
                                  <?php
                                  $sql = "SELECT * FROM master_surface";
                                  $query = mysqli_query($conn, $sql);
                                  while ($amku = mysqli_fetch_array($query)) {
                                    echo '<option>' . $amku['nama'] . '</option>';
                                  }
                                  ?>
                                </select>
                                <span>
                                  <font color="Red">*Tile Product</font>
                                </span>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              Color
                              <div class="form-group">
                                <select name="color" id="color" class="form-control">
                                  <option>Color</option>
                                  <?php
                                  $sql = "SELECT * FROM master_color";
                                  $query = mysqli_query($conn, $sql);
                                  while ($amku = mysqli_fetch_array($query)) {
                                    echo '<option>' . $amku['nama'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-sm-2">
                              Pattern
                              <div class="form-group">
                                <select name="pattern" id="pattern" class="form-control">
                                  <option>Pattern</option>
                                  <?php
                                  $sql = "SELECT * FROM master_pattern";
                                  $query = mysqli_query($conn, $sql);
                                  while ($amku = mysqli_fetch_array($query)) {
                                    echo '<option>' . $amku['nama'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>


                          <div class="row">



                            <div class="col-sm-2">
                              Material Class
                              <select name="material" id="material" class="form-control">
                                <option>Material Class</option>
                                <?php
                                $sql = "SELECT * FROM master_material";
                                $query = mysqli_query($conn, $sql);
                                while ($amku = mysqli_fetch_array($query)) {
                                  echo '<option>' . $amku['nama'] . '</option>';
                                }
                                ?>
                              </select>
                            </div>
                            <div class="col-sm-2">
                              Buying Unit
                              <div class="form-group">
                                <select name="buy" id="buy" class="form-control">
                                  <option>Buying Unit</option>
                                  <?php
                                  $sql = "SELECT * FROM master_unit";
                                  $query = mysqli_query($conn, $sql);
                                  while ($amku = mysqli_fetch_array($query)) {
                                    echo '<option>' . $amku['nama'] . '</option>';
                                  }
                                  ?>
                                </select>

                              </div>
                            </div>
                            <div class="col-sm-2">
                              Stock Unit
                              <select name="stock" id="stock" class="form-control">
                                <option>Stock Unit</option>
                                <?php
                                $sql = "SELECT * FROM master_unit";
                                $query = mysqli_query($conn, $sql);
                                while ($amku = mysqli_fetch_array($query)) {
                                  echo '<option>' . $amku['nama'] . '</option>';
                                }
                                ?>
                              </select>
                            </div>

                            <div class="col-sm-2">
                              Selling Unit
                              <select name="selling" id="selling" class="form-control">
                                <option>Selling Unit</option>
                                <?php
                                $sql = "SELECT * FROM master_unit";
                                $query = mysqli_query($conn, $sql);
                                while ($amku = mysqli_fetch_array($query)) {
                                  echo '<option>' . $amku['nama'] . '</option>';
                                }
                                ?>
                              </select>

                            </div>
                            <div class="col-sm-4">
                              Loading Limit
                              <select name="ll" id="ll" class="form-control">
                                <option>Loading Limit</option>
                                <?php
                                $sql = "SELECT * FROM master_ll";
                                $query = mysqli_query($conn, $sql);
                                while ($amku = mysqli_fetch_array($query)) {
                                  echo '<option>' . $amku['nama'] . '</option>';
                                }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-4">
                                Buying Price Conversion To selling unit
                                <input type="text" class="bundar form-control" id="kon" name="kon" placeholder="Buying Price Conversion to Selling Unit">
                              </div>

                              <div class="col-sm-4">
                                Need To Stock
                                <select class="form-control" id="nts" name="nts">
                                  <option>Need To Stock</option>
                                  <option>Yes</option>
                                  <option>No</option>
                                </select>
                              </div>
                              <div class="col-sm-4">
                                Minimal Stock
                                <input type="text" class="bundar form-control" id="min" name="min" placeholder="Minimal Stock">
                              </div>


                            </div>
                          </div>
                          <div class="row">

                            <div class="col-sm-4">
                              Maximal Stock
                              <input type="text" class="bundar form-control" id="max" name="max" placeholder="Maximal Stock">
                            </div>
                            <div class="col-sm-4">
                              Small Amount Stock
                              <input type="text" class="bundar form-control" id="smallamount" name="smallamount" placeholder="Small Amount">
                            </div>

                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-2">
                                Status
                                <select class="form-control" id="status" name="status">
                                  <option>--Status--</option>
                                  <option>Active</option>
                                  <option>InActive</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group">
                              <div class="col-sm-2">
                                <button type="submit" name="daftar" value="daftar" class="btn btn-primary btn-rounded btn-sm ">Submit</button>
                              </div>
                            </div>
                          </div>











                        <?php
                        }
                        ?>

                        <br><br>
                </form>


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
  
  $( document ).ready(function() {

$.ajax({
  type: 'POST',
  url: 'ajaxLoadMasterTipe.php',
  success: function(data) {
    document.getElementById("dataTipe").innerHTML = data;
    
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

$('.loading').remove();
  }
});




});
  </script>
  </div>
</body>

</html>
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
<?php
  include("../../header.php");
?>
<style>
.bundar {
border-radius: 0.5em;
}
</style>
<script language=javascript>
var objekxhr;

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
      alert ("ganti browser anda")
    }
}

function tampilkan()
{
document.getElementById("bc").value = objekxhr.responseText;
}

function ambilbc()
{
buatxhr();
a=document.getElementById("kode").value;


objekxhr.open("GET", "TampilMhs.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanbc;
}
function tampilkanbc()
{
document.getElementById("bc").value = objekxhr.responseText;
}
function ambilcogs()
{
buatxhr();
a=document.getElementById("kode").value;
objekxhr.open("GET", "TampilMhscogs.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkancogs;
}
function tampilkancogs()
{
document.getElementById("cogs").value = objekxhr.responseText;
}
</script>
<!DOCTYPE html>
<body>
<!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
      <div class="material-loader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
        <div class="message">Loading...</div>
      </div>
    </div>
    <!-- end #page-loader -->
    <!-- begin #page-container -->
<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">
<?php
  include("../../top-menu.php");
?>
<?php
  include("../../sidenav-menu.php");
?>
      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item active">Master Pricing Policy</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Pricing Policy <a href="master_cost.php" class="bundar btn btn-info btn btn-sm" role="button">Add</a></h1>
        <?php
          function rupiah($angka){

        	$hasil_rupiah = "Rp." . number_format($angka,0,',','.');
        	return $hasil_rupiah;

        }
        ?>
        <table id="data-table-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->

              <th class="text-nowrap">TJS Code</th>
              <th class="text-nowrap">COGS</th>
              <th class="text-nowrap">Bottom</th>
              <th class="text-nowrap">Price List</th>
              <th class="text-nowrap">Disc Retail Price</th>
              <th class="text-nowrap">Disc Agent Price</th>
              <th class="text-nowrap">Disc Project</th>
              <th class="text-nowrap">Disc Distribution</th>
              <th class="text-nowrap">Disc For Sales</th>
              <th class="text-nowrap">Disc For SPV</th>
              <th class="text-nowrap">Disc For Manager</th>
              <th class="text-nowrap">Disc For BOD</th>



              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $namaku2=$_SESSION["username"];
            $sqllog2="SELECT * FROM login where email='$namaku2'";
            $resultlog2 = mysqli_query($conn,$sqllog2);
            while($rowlog2 = mysqli_fetch_array($resultlog2)) {
              $divku2=$rowlog2['divisi2'];

            }


            ?>

            <?php
              $sql = "SELECT * FROM master_price where status= 'Active' and divisi='$divku2' ORDER BY no";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">


              <td><?=$amku["kode"];?></td>
              <td><?=rupiah($amku["cogs"]);?></td>
              <td><?=rupiah($amku["bot"]);?></td>
              <td><?=rupiah($amku["pl"]);?></td>
              <td><?=rupiah($amku["dis_showroom"]);?></td>
              <td><?=rupiah($amku["dis_agent"]);?></td>
              <td><?=rupiah($amku["dis_project"]);?></td>
              <td><?=rupiah($amku["dis_distribusi"]);?></td>
              <td><?=rupiah($amku["dis_sales"]);?></td>
              <td><?=rupiah($amku["dis_spv"]);?></td>
              <td><?=rupiah($amku["dis_manager"]);?></td>
              <td><?=rupiah($amku["dis_direksi"]);?></td>




              <td class="with-btn" nowrap="">

                <a href="master_cost.php?aksi=view&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-cost.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-cost.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-cost.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-trash"></i></a>

                  </td>
           <?php } ?>
            </tr>
          </tbody>
        </table>

      <!-- end page-header -->

      <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
              <!-- begin panel -->


  <form id="myform" class="form-horizontal" method="post" action="proses-cost.php">
                              <?php
                              $aksi=$_GET['aksi'];
                              if ($aksi=="view")
                              {
                                $nomerku=$_GET['no'];
                                $sql = "SELECT * FROM master_tipe where id='$nomerku'";
                                     $query = mysqli_query($conn, $sql);
                                     while($amku = mysqli_fetch_array($query)){
                                       $namag=$amku['kodegrup'];
                                       $bc=$amku['bc'];
                                       $bc1=$amku['bc1'];
                                       $import=$amku['import'];
                                       $kodep=$amku['kode'];
                                       $namap=$amku['nama'];
                                       $glosy=$amku['glosy'];
                                       $panjang=$amku['panjang'];
                                       $lebar=$amku['lebar'];
                                       $material=$amku['material'];
                                       $shading=$amku['shading'];
                                       $faces=$amku['faces'];
                                       $color=$amku['color'];
                                      $surface=$amku['surface'];
                                      $pattern=$amku['pattern'];
                                      $buy=$amku['buy'];
                                      $stock=$amku['stock'];
                                      $selling=$amku['selling'];
                                      $min=$amku['min'];
                                      $max=$amku['max'];
                                      $smallamount=$amku['smallamount'];
                                      $konp=$amku['kon'];
                                      $ll=$amku['ll'];
                                      $nts=$amku['nts'];
                                      $status=$amku['status'];


                                       $nom=$amku['id'];
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
        

<!-- begin -->
<div class="row">
    <div class="col-sm-3">Product Group
      <select name="kodegrup" id="kodegrup" class="form-control">
      <option><?php echo $namag; ?></option>
      <?php
        $sqlpgg = "SELECT * FROM detail_sub_grup";
             $querypgg = mysqli_query($conn, $sqlpgg);
             while($amkupgg = mysqli_fetch_array($querypgg)){
               echo '<option>'.$amkupgg['nama'].'</option>';
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
           while($amkupbc = mysqli_fetch_array($querypbc)){
             echo '<option>'.$amkupbc['nama'].'</option>';
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
         while($amkubb = mysqli_fetch_array($querybb)){
           echo '<option>'.$amkubb['nm_perusahaan'].'</option>';
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
            <span><font color="Red">*Tile Product</font></span>
          </div>

              <div class="col-sm-2">Width
              <input type="text" class="bundar form-control" id="lebar" name="lebar" placeholder="Width" value=<?php echo $lebar; ?> required>
              <span><font color="Red">*Tile Product</font></span>
            </div>
            <div class="col-sm-2">Number Of Faces
            <input type="text" class="bundar form-control" id="faces" name="faces" placeholder="Faces" value=<?php echo $faces; ?>>
              <span><font color="Red">*Tile Product</font></span>
          </div>
          <div class="col-sm-2"> Surfaces
            <div class="form-group">
              <select name="surface" id="surface" class="form-control">
                <?php
                  $sqls = "SELECT * FROM master_surface where nama='$surface'";
                       $querys = mysqli_query($conn, $sqls);
                       while($amkus = mysqli_fetch_array($querys)){
                         echo '<option>'.$amkus['nama'].'</option>';
                    }
                  ?>

              <?php
                $sqlss = "SELECT * FROM master_surface";
                     $queryss = mysqli_query($conn, $sqlss);
                     while($amkuss = mysqli_fetch_array($queryss)){
                       echo '<option value='.$amkuss['nama'].'>'.$amkuss['nama'].'</option>';
                  }
                ?>
              </select>
                <span><font color="Red">*Tile Product</font></span>
          </div>
          </div>
          <div class="col-sm-2">Color
            <div class="form-group">
            <select name="color" id="color" class="form-control">
              <option><?php echo $color;?></option>
            <?php
              $sqlcc = "SELECT * FROM master_color";
                   $querycc = mysqli_query($conn, $sqlcc);
                   while($amkucc = mysqli_fetch_array($querycc)){
                     echo '<option>'.$amkucc['nama'].'</option>';
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
                       while($amkupt = mysqli_fetch_array($querypt)){
                         echo '<option>'.$amkupt['nama'].'</option>';
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
                       while($amkum = mysqli_fetch_array($querym)){
                         echo '<option>'.$amkum['nama'].'</option>';
                    }
                  ?>
              <?php
                $sqlmc = "SELECT * FROM master_material";
                     $querymc = mysqli_query($conn, $sqlmc);
                     while($amkumc = mysqli_fetch_array($querymc)){
                       echo '<option value='.$amkumc['nama'].'>'.$amkumc['nama'].'</option>';
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
                       while($amku1 = mysqli_fetch_array($query1)){
                         echo '<option>'.$amku1['nama'].'</option>';
                    }
                  ?>
              <?php
                $sqlbuyunit = "SELECT * FROM master_unit";
                     $querybuyunit = mysqli_query($conn, $sqlbuyunit);
                     while($amkubuyunit = mysqli_fetch_array($querybuyunit)){
                       echo '<option>'.$amkubuyunit['nama'].'</option>';
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
                       while($amkustokunit = mysqli_fetch_array($querystokunit)){
                         echo '<option>'.$amkustokunit['nama'].'</option>';
                    }
                  ?>
              <?php
                $sqlstokunit1 = "SELECT * FROM master_unit";
                     $querystokunit1 = mysqli_query($conn, $sqlstokunit1);
                     while($amkustokunit1 = mysqli_fetch_array($querystokunit1)){
                       echo '<option value='.$amkustokunit1['nama'].'>'.$amkustokunit1['nama'].'</option>';
                  }
                ?>
              </select>
          </div>

              <div class="col-sm-2">Selling Unit
                <select name="selling" id="selling" class="form-control">
                  <?php
                    $sql1 = "SELECT * FROM master_unit where id='$selling'";
                         $query1 = mysqli_query($conn, $sql1);
                         while($amku1 = mysqli_fetch_array($query1)){
                           echo '<option>'.$amku1['nama'].'</option>';
                      }
                    ?>
                <?php
                  $sql = "SELECT * FROM master_unit";
                       $query = mysqli_query($conn, $sql);
                       while($amku = mysqli_fetch_array($query)){
                         echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
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
                       while($amku = mysqli_fetch_array($query)){
                         echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
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
 <button type="submit" name="daftar1" value="daftar1" class="btn btn-info">Update</button>
</div>
</div>
</div>

<!-- end -->

                                                                                 <!-- <div class="form-group">
                                                                                     <label class="col-sm-8 control-label">Product Group Code <font color="red"><i> *required</i></font></label>
                                                                                     <div class="col-sm-6">
                                                                                       <select name="kodegrup" id="kodegrup" class="form-control">
                                                                                         <option><?php echo $namag; ?></option>
                                                                                       <?php
                                                                                         $sql = "SELECT * FROM detail_sub_grup";
                                                                                              $query = mysqli_query($conn, $sql);
                                                                                              while($amku = mysqli_fetch_array($query)){
                                                                                             echo '<option value='.$amku['nama'].'>'.$amku['nama'].'-'.$amku['hscode'].'</option>';
                                                                                           }
                                                                                         ?>
                                                                                       </select>

                                                                                   </div>
                                                                                   </div>
                                             <div class="form-group">
                                                 <label class="col-sm-8 control-label">Product Type Code</label>
                                                 <div class="col-sm-6">
                                                 <input readonly type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodep; ?>">
                                               </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="col-sm-4 control-label">Product Type Name <font color="red"><i> *required</i></font></label>
                                                   <div class="col-sm-8">
                                                   <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $namap; ?>">
                                                 </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label class="col-sm-10 control-label">Shading</label>
                                                     <div class="col-sm-2">
                                                       <select class="form-control" id="shading" name="shading">
                                                         <option><?php echo $shading; ?></option>
                                                         <option>Yes</option>
                                                         <option>No</option>
                                                     </select>
                                                   </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label class="col-sm-4 control-label">Faces</label>
                                                     <div class="col-sm-4">
                                                     <input type="text" class="form-control" id="faces" name="faces" value="<?php echo $faces; ?>">
                                                       <span><font color="Red">*Leave Empty if no available value</font></span>
                                                   </div>
                                                   </div>
                                                   <div class="form-group">
                                                       <label class="col-sm-4 control-label">Surface</label>
                                                       <div class="col-sm-4">
                                                       <input type="text" class="form-control" id="surface" name="surface" value="<?php echo $surface; ?>">
                                                         <span><font color="Red">*Leave Empty if no available value</font></span>
                                                     </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="col-sm-4 control-label">Colour</label>
                                                         <div class="col-sm-4">
                                                         <input type="text" class="form-control" id="color" name="color" value="<?php echo $color; ?>">
                                                           <span><font color="Red">*Leave Empty if no available value</font></span>
                                                       </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="col-sm-4 control-label">Pattern</label>
                                                           <div class="col-sm-4">
                                                           <input type="text" class="form-control" id="pattern" name="pattern" value="<?php echo $pattern; ?>">
                                                             <span><font color="Red">*Leave Empty if no available value</font></span>
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
                                                  <br>
                                        <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                                                  </div> -->



                              <?php } else { ?>
                                <!-- 1. BOOTSTRAP v4.0.0         CSS !-->
                                <BR>


                                    <div class="row">


                                    <div class="col-sm-4">
                                      <select name="kode" id="kode" class="form-control">
                                        <option>TJS Code</option>
                                      <?php
                                        $sql = "SELECT * FROM master_stok";
                                             $query = mysqli_query($conn, $sql);
                                             while($amku = mysqli_fetch_array($query)){
                                               echo '<option>'.$amku['kode_stok'].'</option>';
                                          }
                                        ?>
                                      </select>
                                  </div>
                                  <?php
                                  $namaku11=$_SESSION["username"];
                                  $sqllog11="SELECT * FROM login where email='$namaku11'";
                                  $resultlog11 = mysqli_query($conn,$sqllog11);
                                  while($rowlog11 = mysqli_fetch_array($resultlog11)) {
                                    $divku1=$rowlog11['divisi2'];

                                  }
                                  ?>
                                  <div class="col-sm-4">
                                  <input type="text" class="bundar form-control" id="bc" name="bc" placeholder="Business Category" value="<?php echo $divku1; ?>">


                                </div>
                                <div class="col-sm-4">
                                <input type="text" class="bundar form-control" id="cogs" name="cogs" placeholder="COGS" onfocus="ambilcogs()">

                              </div>

                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                          <!-- asset/plugins/bootsrap combo box class  -->

                                          <!-- asset/plugins/bootsrap combo box js -->
                                          <!-- <script type="text/javascript">
                                            $(document).ready(function(){
                                              $('.combobox').combobox();
                                            });
                                          </script> -->

                                      </div>
                                      </div>

                                        </div>
                                        <?php
                                        $namaku1=$_SESSION["username"];
                                        $sqllog="SELECT * FROM login where email='$namaku1'";
                                        $resultlog = mysqli_query($conn,$sqllog);
                                        while($rowlog = mysqli_fetch_array($resultlog)) {
                                          $divku=$rowlog['divisi2'];

                                        }
                                        $sqlco="SELECT * FROM master_cost where divisi='$divku'";
                                        $resultco = mysqli_query($conn,$sqlco);
                                        while($rowco = mysqli_fetch_array($resultco)) {
                                          $sc=$rowco['sc'];
                                          $tc=$rowco['tc'];
                                          $mc=$rowco['mc'];
                                          $sic=$rowco['sic'];
                                          $fc=$rowco['fc'];
                                          $rpc=$rowco['rpc'];
                                          $allow=$rowco['allow'];
                                          $pl=$rowco['pl'];
                                          $dis_sales=$rowco['dis_sales'];
                                          $dis_spv=$rowco['dis_spv'];
                                          $dis_manager=$rowco['dis_manager'];
                                          $dis_direksi=$rowco['dis_direksi'];
                                          $dis_showroom=$rowco['dis_showroom'];
                                          $dis_agent=$rowco['dis_agent'];
                                          $dis_project=$rowco['dis_project'];
                                          $dis_distribusi=$rowco['dis_distribusi'];

                                        }

                                        ?>
                                              <div class="row">
                                                <div class="col-sm-2">
                                                <label>Showroom Cost</label>
                                                <input type="text" class="bundar form-control" id="sc" name="sc"  onfocus="hitungsc()">
                                                <input type="hidden" class="bundar form-control" id="sc1" name="sc1"  value="<?php echo $sc;?>">
                                              </div>
                                              <script>
                                              function hitungsc()
                                              {
                                                a=document.getElementById("cogs").value;
                                                sc1=document.getElementById("sc1").value;
                                                b=a*(sc1/100);
                                                c=b.toFixed(0)
                                                document.getElementById("sc").value=c;

                                              }
                                              </script>

                                                  <div class="col-sm-2">
                                                    <label>Sales Travel Cost</label>
                                                  <input type="text" class="bundar form-control" id="tc" name="tc"  onfocus="hitungtc()">
                                                  <input type="hidden" class="bundar form-control" id="tc1" name="tc1"  value="<?php echo $tc;?>">

                                                </div>
                                                <script>
                                                function hitungtc()
                                                {
                                                  a=document.getElementById("cogs").value;
                                                  tc1=document.getElementById("tc1").value;
                                                  b=a*(tc1/100);
                                                  c=b.toFixed(0)
                                                  document.getElementById("tc").value=c;

                                                }
                                                </script>
                                                <div class="col-sm-2">
                                                  <label>Marketing Cost</label>
                                                  <input type="text" class="bundar form-control" id="mc" name="mc"  onfocus="hitungmc()">
                                                  <input type="hidden" class="bundar form-control" id="mc1" name="mc1"  value="<?php echo $mc;?>">
                                              </div>

                                              <div class="col-sm-2">
                                                <label>Sales Commision</label>
                                                <input type="text" class="bundar form-control" id="sic" name="sic"  onfocus="hitungsic()">
                                                <input type="hidden" class="bundar form-control" id="sic1" name="sic1"  value="<?php echo $sic;?>">

                                            </div>
                                            <script>
                                            function hitungsic()
                                            {
                                              a=document.getElementById("cogs").value;
                                              sic1=document.getElementById("sic1").value;
                                              b=a*(sic1/100);
                                              c=b.toFixed(0)
                                              document.getElementById("sic").value=c;

                                            }
                                            </script>
                                            <div class="col-sm-2">
                                              <label>Fixed Cost</label>
                                              <input type="text" class="bundar form-control" id="fc" name="fc"  onfocus="hitungfc()">
                                              <input type="hidden" class="bundar form-control" id="fc1" name="fc1"  value="<?php echo $fc;?>">

                                          </div>
                                          <script>
                                          function hitungfc()
                                          {
                                            a=document.getElementById("cogs").value;
                                            fc1=document.getElementById("fc1").value;
                                            b=a*(fc1/100);
                                            c=b.toFixed(0)
                                            document.getElementById("fc").value=c;

                                          }
                                          </script>
                                          <div class="col-sm-2">
                                            <label> Net Profit </label>
                                            <input type="text" class="bundar form-control" id="rpc" name="rpc" onfocus="hitungrpc()">
                                            <input type="hidden" class="bundar form-control" id="rpc1" name="rpc1"  value="<?php echo $rpc;?>">

                                        </div>
                                        <script>
                                        function hitungrpc()
                                        {
                                          a=document.getElementById("cogs").value;
                                          rpc1=document.getElementById("rpc1").value;
                                          b=a*(rpc1/100);
                                          c=b.toFixed(0);
                                          document.getElementById("rpc").value=c;

                                        }
                                        </script>


                                              <script>
                                              function hitungmc()
                                              {
                                                a=document.getElementById("cogs").value;
                                                mc1=document.getElementById("mc1").value;
                                                b=a*(mc1/100);
                                                c=b.toFixed(0)

                                                document.getElementById("mc").value=c;

                                              }
                                              </script>
                                            </div><br>

                                      <div class="row">
                                        <div class="col-sm-2">
                                          <label> Allowance </label>
                                          <input type="text" class="bundar form-control" id="allow" name="allow"  onfocus="hitungallow()">
                                          <input type="hidden" class="bundar form-control" id="allow1" name="allow1"  value="<?php echo $allow;?>">
                                      </div>

                                      <div class="col-sm-2">
                                        <label> Bottom Price </label>
                                        <input type="text" class="bundar form-control" id="bot" name="bot"  onfocus="hitungbot()">
                                    </div>

                                      <div class="col-sm-2">
                                        <label> Price List </label>
                                        <input type="text" class="bundar form-control" id="pl" name="pl"  onfocus="hitungpl()">
                                        <input type="hidden" class="bundar form-control" id="pl1" name="pl1"  value="<?php echo $pl;?>">
                                    </div>
                                    <div class="col-sm-2">
                                      <label> Discount Retail(Sales)</label>
                                      <input type="text" class="bundar form-control" id="dis_sales" name="dis_sales"  onfocus="dissales()">
                                      <input type="hidden" class="bundar form-control" id="d1" name="d1"  value="<?php echo $dis_sales;?>">
                                  </div>
                                  <script>
                                  function dissales()
                                  {
                                    a=document.getElementById("pl").value;//2.3jt
                                    d1=document.getElementById("d1").value;//30%
                                    b=a*(d1/100);
                                    d=a-b;
                                    c=d.toFixed(0);

                                    document.getElementById("dis_sales").value=c;

                                  }
                                  </script>
                                  <div class="col-sm-2">
                                    <label> Discount Retail(SPV)</label>
                                    <input type="text" class="bundar form-control" id="dis_spv" name="dis_spv"  onfocus="disspv()">
                                    <input type="hidden" class="bundar form-control" id="d2" name="d2"  value="<?php echo $dis_spv;?>">
                                </div>
                                <script>
                                function disspv()
                                {
                                  a=document.getElementById("pl").value;//2.3jt
                                  d1=document.getElementById("d2").value;//30%
                                  b=a*(d1/100);
                                  d=a-b;
                                  c=d.toFixed(0);

                                  document.getElementById("dis_spv").value=c;

                                }
                                </script>
                                <div class="col-sm-2">
                                  <label> Discount Retail(Manager)</label>
                                  <input type="text" class="bundar form-control" id="dis_manager" name="dis_manager"  onfocus="dismanager()">
                                  <input type="hidden" class="bundar form-control" id="d3" name="d3"  value="<?php echo $dis_manager;?>">
                              </div>
                              <script>
                              function dismanager()
                              {
                                a=document.getElementById("pl").value;//2.3jt
                                d1=document.getElementById("d3").value;//30%
                                b=a*(d1/100);
                                d=a-b;
                                c=d.toFixed(0);

                                document.getElementById("dis_manager").value=c;

                              }
                              </script>

                                    <script>
                                    function hitungallow()
                                    {
                                      a=document.getElementById("cogs").value;
                                      allow1=document.getElementById("allow1").value;
                                      b=a*(allow1/100);

                                      document.getElementById("allow").value=b;

                                    }
                                    </script>
                                    <script>
                                    function hitungbot()
                                    {
                                      a=parseFloat(document.getElementById("sc").value);
                                      b=parseFloat(document.getElementById("tc").value);
                                      c=parseFloat(document.getElementById("mc").value);
                                      d=parseFloat(document.getElementById("sic").value);
                                      e=parseFloat(document.getElementById("fc").value);
                                      f=parseFloat(document.getElementById("rpc").value);
                                      g=parseFloat(document.getElementById("allow").value);
                                      h=parseFloat(document.getElementById("cogs").value);



                                      b=a+b+c+d+e+f+g+h;

                                      document.getElementById("bot").value=b;

                                    }
                                    </script>




                                    <script>

                                    function hitungpl()
                                    {
                                      a=document.getElementById("bot").value;
                                      pl1=document.getElementById("pl1").value;
                                      pl2=parseFloat(pl1);
                                      pl3=1+(pl2/100);
                                      b=a*pl3;

                                      document.getElementById("pl").value=b;
                                    }
                                    </script>


                                  </div>
                                  <div class="row">
                                    <div class="col-sm-2">
                                      <label> Discount Retail(BOD)</label>
                                      <input type="text" class="bundar form-control" id="dis_direksi" name="dis_direksi"  onfocus="disdireksi()">
                                      <input type="hidden" class="bundar form-control" id="d4" name="d4"  value="<?php echo $dis_direksi;?>">
                                  </div>
                                  <script>
                                  function disdireksi()
                                  {
                                    a=document.getElementById("pl").value;//2.3jt
                                    d1=document.getElementById("d4").value;//30%
                                    b=a*(d1/100);
                                    d=a-b;
                                    c=d.toFixed(0);

                                    document.getElementById("dis_direksi").value=c;

                                  }
                                  </script>
                                  <div class="col-sm-2">
                                    <label> Discount Retail/SQM(showroom)</label>
                                    <input type="text" class="bundar form-control" id="dis_showroom" name="dis_showroom"  onfocus="disshowroom()">
                                    <input type="hidden" class="bundar form-control" id="d5" name="d5"  value="<?php echo $dis_showroom;?>">
                                </div>
                                <script>
                                function disshowroom()
                                {
                                  a=document.getElementById("pl").value;//2.3jt
                                  d1=document.getElementById("d5").value;//30%
                                  b=a*(d1/100);
                                  d=a-b;
                                  c=d.toFixed(0);

                                  document.getElementById("dis_showroom").value=c;

                                }
                                </script>
                                <div class="col-sm-2">
                                  <label> Discount Agent/SQM</label>
                                  <input type="text" class="bundar form-control" id="dis_agent" name="dis_agent"  onfocus="disagent()">
                                  <input type="hidden" class="bundar form-control" id="d6" name="d6"  value="<?php echo $dis_agent;?>">
                              </div>
                              <script>
                              function disagent()
                              {
                                a=document.getElementById("pl").value;//2.3jt
                                d1=document.getElementById("d6").value;//30%
                                b=a*(d1/100);
                                d=a-b;
                                c=d.toFixed(0);

                                document.getElementById("dis_agent").value=c;

                              }
                              </script>
                              <div class="col-sm-2">
                                  <label> Discount Project/SQM</label>
                                  <input type="text" class="bundar form-control" id="dis_project" name="dis_project"  onfocus="disproject()">
                                  <input type="hidden" class="bundar form-control" id="d7" name="d7"  value="<?php echo $dis_project;?>">
                              </div>
                              <script>
                              function disproject()
                              {
                                a=document.getElementById("pl").value;//2.3jt
                                d1=document.getElementById("d7").value;//30%
                                b=a*(d1/100);
                                d=a-b;
                                c=d.toFixed(0);

                                document.getElementById("dis_project").value=c;

                              }
                              </script>
                              <div class="col-sm-2">
                                <label> Discount Distribution/SQM</label>
                                <input type="text" class="bundar form-control" id="dis_distribusi" name="dis_distribusi"  onfocus="disdistribusi()">
                                <input type="hidden" class="bundar form-control" id="d8" name="d8"  value="<?php echo $dis_distribusi;?>">
                            </div>
                            <script>
                            function disdistribusi()
                            {
                              a=document.getElementById("pl").value;//2.3jt
                              d1=document.getElementById("d8").value;//30%
                              b=a*(d1/100);
                              d=a-b;
                              c=d.toFixed(0);

                              document.getElementById("dis_distribusi").value=c;

                            }
                            </script>
                                  </div>
                                  <br>
                                       <div class="row">
                                       <div class="col-sm-2">
                                         <div class="form-group">
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
                                     <button type="submit" name="daftar" value="daftar" class="bundar btn btn-info ">Submit</button>
                                   </div>
                                   </div>
                                 </div>




                                        <!-- <div class="tab-pane fade" id="att" role="tabpanel" aria-labelledby="att-tab">

                                  </div> -->








                        <?php
                      }
                        ?>

                          <br><br>
                                  </form>


              <!-- end panel -->



            </div>
          </div>



<?php
  include("../../footer.php");
?>
    <script type="text/javascript">
      function myFunction() {
      var element = document.getElementById("add_show");
      element.classList.toggle("hide");
      }
    </script>
</div>
	</body>
    </html>

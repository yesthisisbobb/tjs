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
          <li class="breadcrumb-item active">Master Product Type</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Product type <a href="master_tipe.php" class="bundar btn btn-info btn btn-sm" role="button">Add</a></h1>

        <table id="data-table-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->


              <th class="text-nowrap">Product Type Code</th>
              <th class="text-nowrap">Product Type Name</th>

              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
              $sql = "SELECT * FROM master_tipe where status= 'Active' ORDER BY id";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">



              <td><?=$amku["kode"];?></td>
              <td><?=$amku["nama"];?></td>


              <td class="with-btn" nowrap="">

                <a href="master_tipe.php?aksi=view&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-tipe.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-tipe.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-tipe.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-trash"></i></a>

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


  <form id="myform" class="form-horizontal" method="post" action="proses-tipe.php">
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
                                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                                           <li class="nav-item">
                                             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                           </li>


                                         </ul>
                                         <div class="tab-content" id="myTabContent">
                                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                   </div>



                                         </div>


                              <?php } else { ?>
                                <!-- 1. BOOTSTRAP v4.0.0         CSS !-->
                                <BR>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                  </li>

                                  <!-- <li class="nav-item">
                                    <a class="nav-link" id="att-tab" data-toggle="tab" href="#att" role="tab" aria-controls="att" aria-selected="false">Attribute</a>
                                  </li> -->

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div class="row">
                                        <div class="col-sm-3">
                                          <select name="kodegrup" id="kodegrup" class="form-control">
                                            <option>Product Group</option>
                                          <?php
                                            $sql = "SELECT * FROM detail_sub_grup";
                                                 $query = mysqli_query($conn, $sql);
                                                 while($amku = mysqli_fetch_array($query)){
                                                   echo '<option value='.$amku['kode'].'>'.$amku['nama'].'</option>';
                                              }
                                            ?>
                                          </select>
                                      </div>
                                      <div class="col-sm-3">
                                        <select name="bc" id="bc" class="form-control">
                                          <option>Product Business Company</option>
                                        <?php
                                          $sql = "SELECT * FROM master_divisi";
                                               $query = mysqli_query($conn, $sql);
                                               while($amku = mysqli_fetch_array($query)){
                                                 echo '<option value='.$amku['kode'].'>'.$amku['nama'].'</option>';
                                            }
                                          ?>
                                        </select>

                                    </div>
                                    <div class="col-sm-3">
                                      <select name="bc1" id="bc1" class="form-control">
                                        <option>Product Business Category</option>
                                      <?php
                                        $sql = "SELECT * FROM master_perusahaan";
                                             $query = mysqli_query($conn, $sql);
                                             while($amku = mysqli_fetch_array($query)){
                                               echo '<option value='.$amku['kode'].'>'.$amku['nm_perusahaan'].'</option>';
                                          }
                                        ?>
                                      </select>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                    <select class="form-control" id="import" name="import">
                                      <option>-- Import/Local --</option>
                                      <option>Import</option>
                                      <option>Local</option>
                                  </select>
                                </div>
                                </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                          <div class="col-sm-4">
                                            <div class="form-group">
                                          <input type="text" class="bundar form-control" id="kode" name="kode" placeholder="Type Code" required>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                              <div class="form-group">
                                            <input type="text" class="bundar form-control" id="nama" name="nama" placeholder="Type Name" required>
                                          </div>
                                          </div>
                                          </div>

                                              <div class="row">

                                                <div class="col-sm-2">
                                                <input type="text" class="bundar form-control" id="panjang" name="panjang" placeholder="Length" required>
                                                <span><font color="Red">*Tile Product</font></span>
                                              </div>

                                                  <div class="col-sm-2">
                                                  <input type="text" class="bundar form-control" id="lebar" name="lebar" placeholder="Width" required>
                                                  <span><font color="Red">*Tile Product</font></span>
                                                </div>
                                                <div class="col-sm-2">
                                                <input type="text" class="bundar form-control" id="faces" name="faces" placeholder="Faces">
                                                  <span><font color="Red">*Tile Product</font></span>
                                              </div>
                                              <div class="col-sm-2">
                                                <div class="form-group">
                                                  <select name="surface" id="surface" class="form-control">
                                                    <option>Surface</option>
                                                  <?php
                                                    $sql = "SELECT * FROM master_surface";
                                                         $query = mysqli_query($conn, $sql);
                                                         while($amku = mysqli_fetch_array($query)){
                                                           echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
                                                      }
                                                    ?>
                                                  </select>
                                                    <span><font color="Red">*Tile Product</font></span>
                                              </div>
                                              </div>
                                              <div class="col-sm-2">
                                                <div class="form-group">
                                                <select name="color" id="color" class="form-control">
                                                  <option>Color</option>
                                                <?php
                                                  $sql = "SELECT * FROM master_color";
                                                       $query = mysqli_query($conn, $sql);
                                                       while($amku = mysqli_fetch_array($query)){
                                                         echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
                                                    }
                                                  ?>
                                                </select>
                                            </div>
                                          </div>

                                                                                            <div class="col-sm-2">
                                                                                              <div class="form-group">
                                                                                              <select name="pattern" id="pattern" class="form-control">
                                                                                                <option>Pattern</option>
                                                                                              <?php
                                                                                                $sql = "SELECT * FROM master_pattern";
                                                                                                     $query = mysqli_query($conn, $sql);
                                                                                                     while($amku = mysqli_fetch_array($query)){
                                                                                                       echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
                                                                                                  }
                                                                                                ?>
                                                                                              </select>
                                                                                          </div>
                                                                                        </div>
                                              </div>


                                              <div class="row">



                                                <div class="col-sm-2">
                                                  <select name="material" id="material" class="form-control">
                                                    <option>Material Class</option>
                                                  <?php
                                                    $sql = "SELECT * FROM master_material";
                                                         $query = mysqli_query($conn, $sql);
                                                         while($amku = mysqli_fetch_array($query)){
                                                           echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
                                                      }
                                                    ?>
                                                  </select>
                                              </div>
                                              <div class="col-sm-2">
                                                <div class="form-group">
                                                  <select name="buy" id="buy" class="form-control">
                                                    <option>Buying Unit</option>
                                                  <?php
                                                    $sql = "SELECT * FROM master_unit";
                                                         $query = mysqli_query($conn, $sql);
                                                         while($amku = mysqli_fetch_array($query)){
                                                           echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
                                                      }
                                                    ?>
                                                  </select>

                                              </div>
                                              </div>
                                                <div class="col-sm-2">
                                                  <select name="stock" id="stock" class="form-control">
                                                    <option>Stock Unit</option>
                                                  <?php
                                                    $sql = "SELECT * FROM master_unit";
                                                         $query = mysqli_query($conn, $sql);
                                                         while($amku = mysqli_fetch_array($query)){
                                                           echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
                                                      }
                                                    ?>
                                                  </select>
                                              </div>

                                                  <div class="col-sm-2">
                                                    <select name="selling" id="selling" class="form-control">
                                                      <option>Selling Unit</option>
                                                    <?php
                                                      $sql = "SELECT * FROM master_unit";
                                                           $query = mysqli_query($conn, $sql);
                                                           while($amku = mysqli_fetch_array($query)){
                                                             echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
                                                        }
                                                      ?>
                                                    </select>

                                                </div>
                                                <div class="col-sm-4">
                                                <input type="text" class="bundar form-control" id="kon" name="kon" placeholder="Buying Price Conversion to Selling Unit">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="row">
                                                  <div class="col-sm-2">
                                                    <select name="ll" id="ll" class="form-control">
                                                      <option>Loading Limit</option>
                                                    <?php
                                                      $sql = "SELECT * FROM master_ll";
                                                           $query = mysqli_query($conn, $sql);
                                                           while($amku = mysqli_fetch_array($query)){
                                                             echo '<option value='.$amku['id'].'>'.$amku['nama'].'</option>';
                                                        }
                                                      ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2">
                                                  <select class="form-control" id="nts" name="nts">
                                                    <option>Need To Stock</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                              </div>
                                              <div class="col-sm-2">
                                              <input type="text" class="bundar form-control" id="min" name="min" placeholder="Minimal Stock">
                                            </div>
                                            <div class="col-sm-2">
                                            <input type="text" class="bundar form-control" id="max" name="max" placeholder="Maximal Stock">
                                          </div>
                                          <div class="col-sm-2">
                                          <input type="text" class="bundar form-control" id="smallamount" name="smallamount" placeholder="Small Amount">
                                        </div>

                                            </div>
                                            </div>

                                     <div class="form-group">
                                       <div class="row">
                                       <div class="col-sm-2">
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
                                            </div>




                                        <!-- <div class="tab-pane fade" id="att" role="tabpanel" aria-labelledby="att-tab">

                                  </div> -->

                                </div>







                        <?php
                      }
                        ?>

                          <br><br>
                                  </form>



              </div>

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

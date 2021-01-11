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
<!DOCTYPE html>
<head>
  <script language=javascript>
var objekxhr, objekxhr1;
function ambildata(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhs.php?q="+str,true);
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
document.getElementById("kotak").value = objekxhr.responseText;
}

function ambildatagrup1(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhsgrup1.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkangrup1;
}
function tampilkangrup1()
{
document.getElementById("namaalias").value = objekxhr.responseText;
}

function ambildatagrup2(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhsgrupmerk.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkangrup2;
}
function tampilkangrup2()
{
document.getElementById("kodku").value = objekxhr.responseText;
}


function ambildatagrup(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhsgrup.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkangrup;
}



function tampilkangrup()
{
document.getElementById("kodegrup1").value = objekxhr.responseText;
}

function ambildatahs(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhshs.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanhs;
}



function tampilkanhs()
{
document.getElementById("kodehsku1").value = objekxhr.responseText;
}


</script>
</head>
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
          <li class="breadcrumb-item active">Master Product </li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Product <a href="master_stok.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>
<div class="container mb-20">
<div class="row">
<div class="col-xl-2">
<div class="form-group">

<form action="master_stok.php" method="POST">
Search Type
<select class="form-control" id="st" name="st">
  <option value='kodesup'>Supplier</option>
  <option value='kodemerk'>Brand</option>
  <option value='grup'>Group</option>
  <option value=4>Series</option>
</select>

</div>
</div>

<div class="col-xl-2">
Keyword<input type="text" class="form-control" id="nm" name="nm">
</div>
<div class="col-xl-2">
<div class="form-group">
Operator
<select class="form-control" id="op" name="op">
  <option value=1>Less Than</option>
  <option value=2>More Than</option>
</select>

</div>
</div>
<div class="col-xl-1">
Qty<input type="text" class="form-control" id="qty" name="qty">
</div>
</div>
<div class="row">
<div class="col-xl-2">
<button type="submit" name="daftar" value="daftar" class="btn btn-primary">Submit</button>
<button type="submit" name="daftar1" value="daftar1" class="btn btn-primary">Reset</button>
</div>

</div>
</div>
</form>
<br><Br>
<div class="table-responsive" style="font-size: 10px;overflow-x:auto;">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->
              <th class="text-nowrap">Action</th>
              <th class="text-nowrap">Pict</th>
              <th class="text-nowrap">TJS Item Code</th>
              <th class="text-nowrap">Group</th>
              <th class="text-nowrap">Product Type </th>
              <th class="text-nowrap">Factory Code</th>
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
          <tbody>



            <?php
            if(isset( $_POST['daftar']))
            	{
            $nama=$_POST['nm'];
            $qty1=$_POST['qty'];
            $op=$_POST['op'];
            $st1=$_POST['st'];
              if ($op==1)
                {
                $sql = "SELECT * FROM master_stok where $st1='$nama' and jum<'$qty1' ORDER BY no";
                }
                else if ($op==2) {
                    $sql = "SELECT * FROM master_stok where $st1='$nama' and jum>'$qty1' ORDER BY no";
                }
              }

            else if(isset( $_POST['daftar1'])){
                $sql = "SELECT * FROM master_stok ORDER BY no";
              }
              else {
                $sql = "SELECT * FROM master_stok ORDER BY no";
              }


                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
                        $sup=$amku["kodesup"];
                        $merk=$amku["kodemerk"];
                        $negara=$amku["country"];
                        $panjang=$amku["panjang"];
                        $lebar=$amku["lebar"];
                        $tebal=$amku["tebal"];
                        $pcsctn=$amku["pcsctn"];
                        $sqmctn=$amku["sqmctn"];
                        $kodetipe=$amku["kodetipe"];



                        $sqlsup = "SELECT * FROM master_supplier where kode='$sup'";
                             $querysup = mysqli_query($conn, $sqlsup);
                             while($amkusup = mysqli_fetch_array($querysup)){
                                  $sup1=$amkusup["nama"];
                                }
                                $sqlm = "SELECT * FROM master_merk where nama='$merk'";
                                     $querym = mysqli_query($conn, $sqlm);
                                     while($amkum = mysqli_fetch_array($querym)){
                                          $merk1=$amkum["kode"];
                                        }
                                        $sqlk = "SELECT * FROM country where code='$negara'";
                                             $queryk = mysqli_query($conn, $sqlk);
                                             while($amkuk = mysqli_fetch_array($queryk)){
                                                  $negara1=$amkuk["countryname"];
                                                }
                                                $sqlt = "SELECT * FROM master_tipe where kode='$kodetipe'";
                                                     $queryt = mysqli_query($conn, $sqlt);
                                                     while($amkut = mysqli_fetch_array($queryt)){
                                                          $surface=$amkut["surface"];
                                                          $color=$amkut["color"];
                                                          $pola=$amkut["pattern"];
                                                          $grup=$amkut["kodegrup"];
                                                        }

                ?>



            <tr class="odd gradeX">
              <td class="with-btn" nowrap="">

                <a href="master_stok.php?aksi=view&no=<?php echo $amku["no"]; ?>" class="btn btn-info btn btn-xs" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-stok.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="btn btn-info btn btn-xs" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-stok.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="btn btn-info btn btn-xs" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-stok.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-info btn btn-xs" role="button"><i class="fa fa-trash"></i></a>
                  <a href="master_shading_stok.php?kode=<?php echo $amku["kode_stok"]; ?>" class="btn btn-info btn btn-xs" role="button">shading</a>

                  </td>
              <td><img src="../gambar/<?php echo $amku["kodetipe"].".jpg"; ?>" widtn="25" height="25"></td>
              <td><?=$amku["kode_stok"];?></td>
              <td nowrap><?php echo $grup;?></td>
              <td nowrap><?=$amku["kodetipe"];?></td>
              <td nowrap><?=$amku["factory_code"];?></td>
              <td><?=$amku["kodehs"];?></td>
              <td nowrap><?=$merk;?></td>
              <td nowrap><?=$sup1;?></td>
              <td><?=$surface; ?></td>
              <td><?=$color; ?></td>
              <td><?=$pola; ?></td>


              <td nowrap><?=$negara1;?></td>
              <td nowrap><?=$panjang;?></td>
              <td nowrap><?=$lebar;?></td>
              <td nowrap><?=$tebal;?></td>
              <td nowrap><?=$pcsctn;?></td>
              <td nowrap><?=$sqmctn;?></td>



           <?php } ?>
            </tr>
          </tbody>
        </table>
</div>
      <!-- end page-header -->
<script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
      </script>
      <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
              <!-- begin panel -->


  <form class="form-horizontal" method="post" action="proses-stok.php">
                              <?php
                              $aksi=$_GET['aksi'];
                              if ($aksi=="view")
                              {
                                $nomerku=$_GET['no'];
                                $sql = "SELECT * FROM master_stok where no='$nomerku'";
                                     $query = mysqli_query($conn, $sql);
                                     while($amku = mysqli_fetch_array($query)){
                                       $kodetipe=$amku['kodetipe'];
                                       $kodep=$amku['kodeperusahaan'];
                                       $fcode=$amku['factory_code'];
                                       $hscode=$amku['kodehs'];
                                       $tjs=$amku['kode_stok'];
                                       $kodem=$amku['kodemerk'];
                                       $kodes=$amku['kodesup'];
                                       $kodediv=$amku['kodedivisi'];
                                       $kelasku=$amku['kelas'];
                                       $kelasku=$amku['kelas'];
                                       $panjangku=$amku['panjang'];
                                       $lebarku=$amku['lebar'];
                                       $tebalku=$amku['tebal'];
                                       $tinggi=$amku['tinggi'];
                                       $sellunit=$amku['sellunit'];
                                       $ctnpallet=$amku['ctnpallet'];
                                       $pcsctnku=$amku['pcsctn'];
                                       $sqmctnku=$amku['sqmctn'];
                                       $kgctnku=$amku['kgsstok'];
                                       $cont=$amku['contstan'];
                                       $maxcont=$amku['maxcont'];
                                       $stokcont=$amku['stokcont'];
                                       $volctnku=$amku['cubicstok'];
                                       $country=$amku['country'];
                                        $nom=$amku['no'];
                                        $des1=$amku['des'];
                                        $status1=$amku['status'];

                                        $jum=$amku['jum'];

                                       $sql = "SELECT * FROM master_tipe where kode='$kodetipe'";
                                            $query = mysqli_query($conn, $sql);
                                            while($amku = mysqli_fetch_array($query)){
                                              $namatipe=$amku["nama"];
                                            }
                                            $sql = "SELECT * FROM master_perusahaan1 where kode='$kodep'";
                                                 $query = mysqli_query($conn, $sql);
                                                 while($amku = mysqli_fetch_array($query)){
                                                   $kodeperusahaan=$amku["kode"];
                                                   $namaperusahaan=$amku["nm_perusahaan"];
                                                 }
                                             $sql = "SELECT * FROM master_merk where kode='$kodem'";
                                                      $query = mysqli_query($conn, $sql);
                                                      while($amku = mysqli_fetch_array($query)){
                                                        $kodemerk=$amku["kode"];
                                                        $namamerk=$amku["nama"];
                                                      }

                                                $sql = "SELECT * FROM master_supplier where kode='$kodes'";
                                                               $query = mysqli_query($conn, $sql);
                                                               while($amku = mysqli_fetch_array($query)){
                                                                 $kodesup=$amku["kode"];
                                                                 $namasup=$amku["nama"];
                                                                 $negarasup=$amku["negara"];
                                                               }
                                                               $sql = "SELECT * FROM master_divisi where kode='$kodediv'";
                                                                              $query = mysqli_query($conn, $sql);
                                                                              while($amku = mysqli_fetch_array($query)){
                                                                                $kodedivisi=$amku["kode"];
                                                                                $namadivisi=$amku["nama"];

                                                                              }

                                       $namap=$amku['nama'];
                                       $shading=$amku['shading'];
                                       $faces=$amku['faces'];
                                       $color=$amku['color'];
                                      $surface=$amku['surface'];
                                      $pattern=$amku['pattern'];


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
                                             <div class="row">
                                               <div class="col-sm-6">

                                                  <img src="../gambar/<?php echo $kodetipe.".jpg"; ?>" width="125" height="125"><br><br>
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
                                                          while($amku = mysqli_fetch_array($query)){
                                                         echo "<option>".$amku['kode']."</option>";
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
                                                    while($amku = mysqli_fetch_array($query)){
                                                   echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."-".$amku['nama1']."</option>";
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
                                                     <option value=<?php echo $kodep; ?>><?php echo $kodep."-".$namaperusahaan; ?></option>
                                                   <?php
                                                     $sql = "SELECT * FROM master_perusahaan1";
                                                          $query = mysqli_query($conn, $sql);
                                                          while($amku = mysqli_fetch_array($query)){
                                                         echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nm_perusahaan']."</option>";
                                                       }
                                                     ?>
                                                   </select>

                                               </div>
                                                 </div>



                                                                                                    <div class="col-sm-2">
                                                                                                      <div class="form-group">
                                                                                                        <label>Brand Name</label>
                                                                                                      <select name="kodemerk" id="kodemerk" class="form-control">
                                                                                                         <option value=<?php echo $kodemerk; ?>><?php echo $kodemerk."-".$namamerk; ?></option>
                                                                                                      <?php
                                                                                                        $sql = "SELECT * FROM master_merk";
                                                                                                             $query = mysqli_query($conn, $sql);
                                                                                                             while($amku = mysqli_fetch_array($query)){
                                                                                                            echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."</option>";
                                                                                                          }
                                                                                                        ?>
                                                                                                      </select>

                                                                                                  </div>
                                                                                                    </div>


                                                                                                      <div class="col-sm-4">
                                                                                                        <div class="form-group">
                                                                                                        <label >Supplier Name(Code, Name, Country Code)</label>
                                                                                                        <select name="kodesup" id="kodesup" class="form-control" onchange="ambildata(this.value)">
                                                                                                            <option value=<?php echo $kodesup; ?>><?php echo $kodesup."-".$namasup."-".$negarasup; ?></option>
                                                                                                        <?php
                                                                                                          $sql = "SELECT * FROM master_supplier";
                                                                                                               $query = mysqli_query($conn, $sql);
                                                                                                               while($amku = mysqli_fetch_array($query)){
                                                                                                                 $negarasup1=$amku['negara'];
                                                                                                              echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."-".$amku['negara']."</option>";
                                                                                                            }
                                                                                                          ?>
                                                                                                        </select>
                                                                                                      </div>

                                                                                                      <input type="hidden" name="kotak" id="kotak" value="<?php echo $negarasup1;?>">
                                                                                                    </div>
                                                                                                    <div class="col-sm-3">
                                                                                                      <div class="form-group">
                                                                                                        <label>COO</label>
                                                                                                        <?php
                                                                                                          $sql = "SELECT * FROM country where code='$country'";
                                                                                                               $query = mysqli_query($conn, $sql);
                                                                                                               while($amku = mysqli_fetch_array($query)){
                                                                                                                 $neg=$amku['countryname'];
                                                                                                            }
                                                                                                          ?>
                                                                                                      <select name="country" id="country" class="form-control" >
                                                                                                        <?php echo "<option value=".$country.">".$neg."</option>"; ?>
                                                                                                      <?php
                                                                                                        $sql = "SELECT * FROM country";
                                                                                                             $query = mysqli_query($conn, $sql);
                                                                                                             while($amku = mysqli_fetch_array($query)){
                                                                                                            echo "<option value=".$amku['code'].">".$amku['countryname']."</option>";
                                                                                                          }
                                                                                                        ?>
                                                                                                      </select>
                                                                                                        <span><font color="Red">*Required</font></span>
                                                                                                    </div>
                                                                                                  </div>
                                               </div>
                                               <div class="row">
                                               <div class="col-sm-1">
                                                 <div class="form-group">
                                                   <label>Length</label>
                                               <input type="text" class="form-control" id="panjang" name="panjang" value="<?php echo $panjangku; ?>" >
                                             </div>
                                             </div>


                                                 <div class="col-sm-1">
                                                   <div class="form-group">
                                                     <label>Width</label>
                                                 <input type="text" class="form-control" id="lebar" name="lebar" value="<?php echo $lebarku; ?>"  >
                                               </div>
                                               </div>
                                               <div class="col-sm-1">
                                                 <div class="form-group">
                                                   <label>Height</label>
                                               <input type="text" class="form-control" id="tinggi" name="tinggi" value="<?php echo $tinggi; ?>"  >
                                             </div>
                                             </div>
                                               <div class="col-sm-1">
                                                 <div class="form-group">
                                                   <label>Thicknes</label>
                                               <input type="text" class="form-control" id="tebal" name="tebal" value="<?php echo $tebalku; ?>" >
                                             </div>
                                             </div>
                                             <div class="col-sm-2">
                                               <div class="form-group">
                                                  <label>Sell Unit</label>
                                             <input type="text" class="form-control" id="sellunit" name="sellunit" value="<?php echo $sellunit; ?>">
                                           </div>
                                           </div>
                                               <div class="col-sm-1">
                                                 <div class="form-group">
                                                   <label>PCS/BOX</label>
                                               <input type="text" class="form-control" id="pcsctn" name="pcsctn" value="<?php echo $pcsctnku; ?>" >

                                             </div>
                                             </div>
                                             <div class="col-sm-1">
                                               <div class="form-group">
                                                 <label>SQM/BOX</label>
                                             <input type="text" class="form-control" id="sqmctn" name="sqmctn" value="<?php echo $sqmctnku; ?>" >

                                           </div>
                                           </div>
                                           <div class="col-sm-2">
                                             <div class="form-group">
                                               <label>BOX/PALLET</label>
                                           <input type="text" class="form-control" id="ctnpallet" name="ctnpallet" value="<?php echo $ctnpallet; ?>">

                                         </div>
                                         </div>
                                           <div class="col-sm-1">
                                           <div class="form-group">

                                                  <label>KG/BOX</label>
                                               <input type="text" class="form-control" id="kgctn" name="kgctn" value="<?php echo $kgctnku; ?>">

                                             </div>
                                           </div>
                                           <div class="col-sm-1">
                                           <div class="form-group">

                                                  <label>Vol</label>
                                               <input type="text" class="form-control" id="volctn" name="volctn" value="<?php echo $volctnku; ?>">

                                             </div>
                                           </div>
                                             </div>
                                             <div class="row">
                                               <div class="col-sm-1">
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
                                                 <textarea  class="form-control" rows="5" id="commentku" name="commentku"><?php echo $des1; ?></textarea>
                                                   </div>
                                                 </div>

                                             </div>
                                             <?php echo $status1; ?>
                                             <div class="row">
                                                   <div class="col-sm-12">
                                                 <div class="form-group">
                                                   <select class="form-control" id="status" name="status" >
                                                     <option><?php echo $status1; ?></option>
                                                     <option>Active</option>
                                                     <option>InActive</option>
                                                   </select>
                                                     </div>
                                                   </div>

                                               </div>

                                               <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
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


                                      <div class="row">


                                        <div class="col-sm-4">
                                          <div class="form-group">
                                          <select name="kodetipe" id="kodetipe" class="form-control" onchange="ambildatagrup(this.value)">
                                            <option>Choose Product type</option>
                                          <?php
                                            $sql = "SELECT * FROM master_tipe";
                                                 $query = mysqli_query($conn, $sql);
                                                 while($amku = mysqli_fetch_array($query)){
                                                echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."</option>";
                                              }
                                            ?>
                                          </select>
                                            <span><font color="Red">*Required</font></span>
                                        </div>
                                      </div>
                                          <div class="col-sm-4">
                                            <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Group Name"  id="kodegrup1" name="kodegrup1"  onfocus="ambildatagrup1(this.value)">
                                          <input type="text" class="form-control" placeholder="Alias"  id="namaalias" name="namaalias" readonly>
                                        </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                        <select name="hscode" id="hscode" class="form-control" required>
                                          <option>HS Code</option>
                                        <?php
                                          $sql = "SELECT * FROM master_hscode";
                                               $query = mysqli_query($conn, $sql);
                                               while($amku = mysqli_fetch_array($query)){
                                              echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."-".$amku['nama1']."</option>";
                                            }
                                          ?>
                                        </select>
                                          <span><font color="Red">*Required</font></span>

                                    </div>
                                      </div>


                                    </div>

                                        <div class="row">

                                        <div class="col-sm-4">
                                        <div class="form-group">

                                            <select name="kodeperusahaan" id="kodeperusahaan" class="form-control">
                                              <option>Choose Company Name</option>
                                            <?php
                                              $sql = "SELECT * FROM master_perusahaan1";
                                                   $query = mysqli_query($conn, $sql);
                                                   while($amku = mysqli_fetch_array($query)){
                                                  echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nm_perusahaan']."</option>";
                                                }
                                              ?>
                                            </select>
                                              <span><font color="Red">*Required</font></span>

                                        </div>
                                          </div>


                                            <div class="col-sm-4">
                                              <div class="form-group">
                                              <select name="kodemerk" id="kodemerk" class="form-control" onchange="ambildatagrup2(this.value)">
                                                <option>Choose Brand Name</option>
                                              <?php
                                                $sql = "SELECT * FROM master_merk";
                                                     $query = mysqli_query($conn, $sql);
                                                     while($amku = mysqli_fetch_array($query)){
                                                    echo "<option>".$amku['nama']."</option>";
                                                  }
                                                ?>
                                              </select>
                                                <input type="text" class="form-control" id="kodku" name="kodku" placeholder="Brand Name" readonly><span><font color="Red">*Required</font></span>

                                          </div>
                                            </div>
                                            <div class="col-sm-4">
                                              <div class="form-group">
                                              <select name="country" id="country" class="form-control" >
                                                <option>Country Of Origin</option>
                                              <?php
                                                $sql = "SELECT * FROM country";
                                                     $query = mysqli_query($conn, $sql);
                                                     while($amku = mysqli_fetch_array($query)){
                                                    echo "<option value=".$amku['code'].">".$amku['countryname']."</option>";
                                                  }
                                                ?>
                                              </select>
                                                <span><font color="Red">*Required</font></span>
                                            </div>
                                          </div>
                                          </div>
                                          <div class="row">





                                            <div class="col-sm-4">
                                              <div class="form-group">
                                              <select name="kodesup" id="kodesup" class="form-control" onchange="ambildata(this.value)">
                                                <option>Choose Supplier Name</option>
                                              <?php
                                                $sql = "SELECT * FROM master_supplier";
                                                     $query = mysqli_query($conn, $sql);
                                                     while($amku = mysqli_fetch_array($query)){
                                                    echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."-".$amku['negara']."</option>";
                                                  }
                                                ?>
                                              </select>
                                                <span><font color="Red">*Required</font></span>
                                            </div>
                                            <input type="hidden" name="kotak" id="kotak">
                                          </div>
                                          <div class="col-sm-4">
                                            <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Factory Item Code" id="fic" name="fic" required="required" data-error="Please enter Factory Code.">
                                          <span><font color="Red">*Required</font></span>
                                        </div>
                                      </div>

                                              <div class="col-sm-4">
                                                <div class="form-group">
                                                <select name="grade" id="grade" class="form-control">
                                                  <option>Choose Product Grade</option>
                                                <?php
                                                  $sql = "SELECT * FROM master_grade";
                                                       $query = mysqli_query($conn, $sql);
                                                       while($amku = mysqli_fetch_array($query)){
                                                      echo "<option value=".$amku['id'].">".$amku['nama']."</option>";
                                                    }
                                                  ?>
                                                </select>
                                                  <span><font color="Red">*Required</font></span>

                                            </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-sm-3">
                                            <div class="form-group">
                                          <input type="text" class="form-control" id="panjang" name="panjang" placeholder="Length">
                                        </div>
                                        </div>


                                            <div class="col-sm-3">
                                              <div class="form-group">
                                            <input type="text" class="form-control" id="lebar" name="lebar" placeholder="Width">
                                          </div>
                                          </div>
                                          <div class="col-sm-3">
                                            <div class="form-group">
                                          <input type="text" class="form-control" id="pcsctn" name="pcsctn" placeholder="Pcs/Carton">
                                          <span><font color="Red">*Tile Product</font></span>
                                        </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                        <input type="text" class="form-control" id="ctnpallet" name="ctnpallet" placeholder="Box/Pallet">
                                        <span><font color="Red">*Tile Product</font></span>
                                      </div>
                                      </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-sm-12">
                                                  <div class="form-group">
                                                <input type="text" class="form-control" id="kode_stok" name="kode_stok" placeholder="Generate TJS Code" required>
                                                  <button type="button" id="tom" class="btn-primary" onclick="getkode()">Generate Code</button>
                                                  <span><font color="Red">*Required, Click Generate Button</font></span>

                                              </div>
                                          </div>
                                          <div class="col-sm-12">
                                            <div class="form-group">
                                          <input type="text" class="form-control" id="nm_stok" name="nm_stok" placeholder="Generate Product Name" required>
                                            <!-- <button type="button" id="tom1" class="btn-primary" onclick="getnama()">Generate Name</button>
                                            <span><font color="Red">*Required, Click Generate Button</font></span> -->

                                        </div>
                                    </div>


                                              <script>
                                              function getkode()
                                              {

                                                  document.getElementById("kode_stok").value=
                                                  document.getElementById("kodeperusahaan").value+document.getElementById("kodku").value+
                                                  document.getElementById("country").value+document.getElementById("kodesup").value+document.getElementById("kodetipe").value+
                                                  document.getElementById("grade").value;
                                                  document.getElementById("nm_stok").value=
                                                  document.getElementById("namaalias").value+" "+document.getElementById("kodemerk").value+" "+
                                                  document.getElementById("kodetipe").value+" "+document.getElementById("panjang").value+"x"+
                                                  +document.getElementById("lebar").value+" "+"@"+document.getElementById("pcsctn").value;


                                                }

                                                </script>
                                                <script>
                                                function getnama()
                                                {

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

                                            <div class="row">


                                                  <div class="col-sm-3">
                                                    <div class="form-group">
                                                  <input type="text" class="form-control" id="tinggi" name="tinggi" placeholder="Height">
                                                </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="form-group">
                                                <input type="text" class="form-control" id="tebal" name="tebal" placeholder="Thickness">
                                                  <span><font color="Red">*Tile Product</font></span>
                                              </div>
                                              </div>
                                              <div class="col-sm-3">
                                                <div class="form-group">
                                              <input type="text" class="form-control" id="sqmctn" name="sqmctn" placeholder="SQM/Carton">
                                              <span><font color="Red">*Tile Product</font></span>
                                            </div>
                                            </div>
                                            <div class="col-sm-3">
                                              <div class="form-group">
                                            <input type="text" class="form-control" id="sellunit" name="sellunit" placeholder="Selling Unit/Stock Unit">
                                          </div>
                                          </div>

                                          </div>

                                        <div class="row">
                                          <div class="col-sm-2">
                                            <div class="form-group">
                                          <input type="text" class="form-control" id="kgsstok" name="kgsstok" placeholder="Kgs/Stock Unit">
                                        </div>
                                        </div>


                                            <div class="col-sm-3">
                                              <div class="form-group">
                                            <input type="text" class="form-control" id="cubicstok" name="cubicstok" placeholder="Cubic Meters/Stock Unit">
                                          </div>
                                          </div>
                                              <div class="col-sm-2">
                                                <div class="form-group">
                                              <input type="text" class="form-control" id="contstan" name="contstan"  placeholder="Container Standard">
                                            </div>
                                            </div>
                                            <div class="col-sm-3">
                                              <div class="form-group">
                                            <input type="text" class="form-control" id="maxcont" name="maxcont" placeholder="Max Stock Unit/Cont">

                                          </div>
                                          </div>
                                          <div class="col-sm-2">
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
                                          <div class="form-group">
                                            <select class="form-control" id="status" name="status" >
                                              <option>Active</option>
                                              <option>InActive</option>
                                            </select>
                                              </div>
                                            </div>

                                        </div>


                                                <!-- <div class="form-group">
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
<button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button>
                                </div>
                        <?php
                      }
                        ?>
                                  </form>
                                  <script type="text/javascript">
                                   $(document).ready(function() {
                                       $('#kodesup').select2();
                                   });
                                  </script>

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

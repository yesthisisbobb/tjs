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
document.getElementById("pg").value = objekxhr.responseText;
}
function ambildata1(str)
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhs1.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan1;
}
function tampilkan1()
{
document.getElementById("csvc").value = (objekxhr.responseText/document.getElementById("svc").value);
}
function ambildata2(str)
{
buatxhr();
a=document.getElementById("pg").value;
objekxhr.open("GET", "TampilMhs2.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan2;
}
function tampilkan2()
{
document.getElementById("hscode").value = objekxhr.responseText
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
          <li class="breadcrumb-item active">Master COGS </li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master COGS <a href="master_hpp.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>

        <table id="data-table-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->

              <th class="text-nowrap">TJS Item Code </th>
              <th class="text-nowrap">Product Type Code</th>
              <th class="text-nowrap">Supplier Name</th>
                <th class="text-nowrap">Brand Name</th>
                <th class="text-nowrap">Status</th>
              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
              $sql = "SELECT * FROM master_stok ORDER BY no";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">


              <td><?=$amku["kodetipe"];?></td>
              <td><?=$amku["kodetipe"];?></td>
              <td><?=$amku["kodesup"];?></td>
              <td><?=$amku["kodemerk"];?></td>
              <td><?=$amku["status"];?></td>

              <td class="with-btn" nowrap="">

                <a href="master_stok.php?aksi=view&no=<?php echo $amku["no"]; ?>" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-stok.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-stok.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="btn btn-success btn btn-sm" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-stok.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-trash"></i></a>

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
                                       $kodem=$amku['kodemerk'];
                                       $kodes=$amku['kodesup'];
                                       $kodediv=$amku['kodedivisi'];
                                       $kelasku=$amku['kelas'];
                                       $kelasku=$amku['kelas'];
                                       $panjangku=$amku['panjang'];
                                       $lebarku=$amku['lebar'];
                                       $tebalku=$amku['tebal'];
                                       $pcsctnku=$amku['pcsctn'];
                                       $sqmctnku=$amku['sqmctn'];
                                       $kgctnku=$amku['kgctn'];
                                       $volctnku=$amku['volctn'];
                                        $nom=$amku['no'];

                                       $sql = "SELECT * FROM master_tipe where kode='$kodetipe'";
                                            $query = mysqli_query($conn, $sql);
                                            while($amku = mysqli_fetch_array($query)){
                                              $namatipe=$amku["nama"];
                                            }
                                            $sql = "SELECT * FROM master_perusahaan where kode='$kodep'";
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
                                      $status=$amku['status'];

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
                                             <li class="nav-item">
                                               <a class="nav-link" id="att1-tab" data-toggle="tab" href="#att1" role="tab" aria-controls="att1" aria-selected="false">Attribute</a>
                                             </li>
                                             <li class="nav-item">
                                               <a class="nav-link" id="att2-tab" data-toggle="tab" href="#att2" role="tab" aria-controls="att2" aria-selected="false">Addition Attribute</a>
                                             </li>


                                           </ul>
                                         <div class="tab-content" id="myTabContent">
                                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                             <div class="form-group">
                                                 <label class="col-sm-8 control-label">Product Type</label>
                                                 <div class="col-sm-6">
                                                   <select name="kodetipe" id="kodetipe" class="form-control">
                                                     <option value=<?php echo $kodetipe; ?>><?php echo $namatipe; ?></option>
                                                   <?php
                                                     $sql = "SELECT * FROM master_tipe";
                                                          $query = mysqli_query($conn, $sql);
                                                          while($amku = mysqli_fetch_array($query)){
                                                         echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                                       }
                                                     ?>
                                                   </select>

                                               </div>
                                               </div>

                                               <div class="form-group">
                                                 <label class="col-sm-8 control-label">Company Name</label>
                                                 <div class="col-sm-6">
                                                   <select name="kodeperusahaan" id="kodeperusahaan" class="form-control">
                                                     <option value=<?php echo $kodeperusahaan; ?>><?php echo $kodeperusahaan."-".$namaperusahaan; ?></option>
                                                   <?php
                                                     $sql = "SELECT * FROM master_perusahaan";
                                                          $query = mysqli_query($conn, $sql);
                                                          while($amku = mysqli_fetch_array($query)){
                                                         echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nm_perusahaan']."</option>";
                                                       }
                                                     ?>
                                                   </select>

                                               </div>
                                                 </div>

                                                 <div class="form-group">
                                                   <label class="col-sm-8 control-label">Brand Name</label>
                                                   <div class="col-sm-6">
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
                                                   <div class="form-group">
                                                     <label class="col-sm-8 control-label">Supplier Name(Code, Name, Country Code)</label>
                                                     <div class="col-sm-6">
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
                                                   <div class="form-group">
                                                     <label class="col-sm-8 control-label">Business Division</label>
                                                     <div class="col-sm-6">
                                                       <select name="kodedivisi" id="kodedivisi" class="form-control">
                                                           <option value=<?php echo $kodedivisi; ?>><?php echo $kodedivisi."-".$namadivisi; ?></option>
                                                       <?php
                                                         $sql = "SELECT * FROM master_divisi";
                                                              $query = mysqli_query($conn, $sql);
                                                              while($amku = mysqli_fetch_array($query)){
                                                             echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."</option>";
                                                           }
                                                         ?>
                                                       </select>

                                                   </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="col-sm-10 control-label">Material Class</label>
                                                         <div class="col-sm-2">
                                                           <select class="form-control" id="kelas" name="kelas">
                                                             <option><?php echo $kelasku; ?></option>
                                                             <option>High</option>
                                                             <option>Low</option>
                                                         </select>
                                                       </div>
                                                     </div>

                                                     <div class="form-group">
                                                         <label class="control-label col-sm-4">TJS Code</label>
                                                         <div class="col-sm-6">
                                                         <input type="text" class="form-control" id="kode_stok" name="kode_stok"> <br>
                                                           <button type="button" id="tom" class="btn" onclick="getkode()">Generate</button>
                                                       </div>
                                                       <script>
                                                       function getkode()
                                                       {

                                                           document.getElementById("kode_stok").value=
                                                           document.getElementById("kodeperusahaan").value+document.getElementById("kodemerk").value+
                                                           document.getElementById("kotak").value+document.getElementById("kodesup").value+document.getElementById("kodetipe").value;

                                                         }

                                                         </script>
                                                     </div>
                                               </div>
                                                 <div class="tab-pane fade" id="att" role="tabpanel" aria-labelledby="att-tab">
                                                   <div class="form-group">
                                                       <label class="col-sm-4 control-label">Length</label>
                                                       <div class="col-sm-2">
                                                       <input type="text" class="form-control" id="panjang" name="panjang" value="<?php echo $panjangku;?>">
                                                     </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="col-sm-4 control-label">Width</label>
                                                         <div class="col-sm-2">
                                                         <input type="text" class="form-control" id="lebar" name="lebar" value="<?php echo $lebarku;?>">
                                                       </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="col-sm-4 control-label">Thickness</label>
                                                           <div class="col-sm-2">
                                                           <input type="text" class="form-control" id="tebal" name="tebal" value="<?php echo $tebalku;?>">
                                                         </div>
                                                         </div>


                                              </div>
                                              <div class="tab-pane fade" id="att2" role="tabpanel" aria-labelledby="att2-tab">
                                                <?php
                                                $nomerkuaja=$_GET["no"];
                                                  $sql = "SELECT * FROM master_tipe where id='$nomerkuaja'";
                                                       $query = mysqli_query($conn, $sql);
                                                       while($amku = mysqli_fetch_array($query)){
                                                         $id=$amku['id'];
                                                         $kodeg=$amku['kodegrup'];
                                                         $shade=$amku['shading'];
                                                         $faces=$amku['faces'];
                                                         $surface=$amku['surface'];



                                                    }
                                                  ?>
                                                  <div class="form-group">
                                                      <label class="col-sm-6 control-label">Group Code</label>
                                                      <div class="col-sm-4">
                                                      <input type="text" class="form-control" readonly id="kodegrup" name="kodegrup" value="<?php echo $kodeg; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-6 control-label">Shading</label>
                                                        <div class="col-sm-2">
                                                        <input type="text" class="form-control" readonly id="shading" name="shading" value="<?php echo $shade; ?>">
                                                      </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="col-sm-6 control-label">Faces</label>
                                                          <div class="col-sm-2">
                                                          <input type="text" class="form-control" readonly id="faces" name="faces" value="<?php echo $faces; ?>">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6 control-label">Surface</label>
                                                            <div class="col-sm-4">
                                                            <input type="text" class="form-control" readonly id="surface" name="surface" value="<?php echo $surface; ?>">
                                                          </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="col-sm-6 control-label">Color</label>
                                                              <div class="col-sm-3">
                                                              <input type="text" class="form-control" readonly id="color" name="color" value="<?php echo $color; ?>">
                                                            </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-6 control-label">Pattern</label>
                                                                <div class="col-sm-3">
                                                                <input type="text" class="form-control" readonly id="pola" name="pola" value="<?php echo $pattern; ?>">
                                                              </div>
                                                              </div>


                                              </div>




                                           <div class="tab-pane fade" id="att1" role="tabpanel" aria-labelledby="att1-tab">

                                                   <div class="form-group">
                                                       <label class="col-sm-4 control-label">PCS/CTN</label>
                                                       <div class="col-sm-2">
                                                       <input type="text" class="form-control" id="pcsctn" name="pcsctn" value="<?php echo $pcsctnku; ?>">
                                                     </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="col-sm-4 control-label">SQM/CTN</label>
                                                         <div class="col-sm-2">
                                                         <input type="text" class="form-control" id="sqmctn" name="sqmctn" value="<?php echo $sqmctnku; ?>">
                                                       </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="col-sm-4 control-label">KG/CTN</label>
                                                           <div class="col-sm-2">
                                                           <input type="text" class="form-control" id="kgctn" name="kgctn" value="<?php echo $kgctnku; ?>">
                                                         </div>
                                                         </div>
                                                       <div class="form-group">
                                                           <label class="col-sm-4 control-label">VOL/CTN</label>
                                                           <div class="col-sm-2">
                                                           <input type="text" class="form-control" id="volctn" name="volctn" onfocus="hitung()"  value="<?php echo $volctnku; ?>">
                                                         </div>
                                                         </div>
                                                         <script>
                                                         function hitung()
                                                         {

                                                             document.getElementById("volctn").value=document.getElementById("panjang").value/100*document.getElementById("lebar").value/100*
                                                             document.getElementById("tebal").value/1000*document.getElementById("pcsctn").value;
                                                           }

                                                           </script>
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
                                        </div>
                                     </div>


                                         </div>



                              <?php } else { ?>
                                <!-- 1. BOOTSTRAP v4.0.0         CSS !-->
                                <BR>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link" id="att-tab" data-toggle="tab" href="#att" role="tab" aria-controls="att" aria-selected="false">Attribute 1</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="att1-tab" data-toggle="tab" href="#att1" role="tab" aria-controls="att1" aria-selected="false">Attribute 2</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="att2-tab" data-toggle="tab" href="#att2" role="tab" aria-controls="att2" aria-selected="false">Dimension</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="att3-tab" data-toggle="tab" href="#att3" role="tab" aria-controls="att3" aria-selected="false">Attribute</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="att4-tab" data-toggle="tab" href="#att4" role="tab" aria-controls="att4" aria-selected="false">Attribute</a>
                                  </li>


                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div class="form-group">
                                        <label class="col-sm-8 control-label">TJS Item Stock</label>
                                        <div class="col-sm-6">
                                          <select name="tjsitemcode" id="tjsitemcode" class="form-control" onchange="ambildata(this.value)">
                                            <option>Choose TJS Item Stock</option>
                                          <?php
                                            $sql = "SELECT * FROM master_stok";
                                                 $query = mysqli_query($conn, $sql);
                                                 while($amku = mysqli_fetch_array($query)){
                                                echo "<option value=".$amku['kodeitem_stok'].">".$amku['kodeitem_stok']."</option>";
                                              }
                                            ?>
                                          </select>

                                      </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">Product Grup</label>
                                          <div class="col-sm-4">
                                          <input type="text" class="form-control" id="pg" name="pg" readonly onfocus="ambildata2(this.value)">
                                        </div>
                                        </div>
                                        <!-- <script>
                                        function coba()
                                        {
                                         document.getElementById("hscode").value="bisa";
                                       }
                                        </script> -->
                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">HS Code</label>
                                          <div class="col-sm-4">
                                          <input type="text" class="form-control" id="hscode" name="hscode">
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Kg/Ctn</label>
                                            <div class="col-sm-2">
                                            <input type="text" class="form-control" id="kgctn" name="kgctn">
                                          </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="col-sm-10 control-label">Container Type</label>
                                            <div class="col-sm-1">
                                              <select class="form-control" id="cont_type" name="cont_type">
                                                <option>20</option>
                                                <option>40</option>
                                            </select>
                                          </div>
                                        </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">CTN/Pallet</label>
                                              <div class="col-sm-2">
                                              <input type="text" class="form-control" id="ctnpallet" name="ctnpallet">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Standard Tonnage/Cont</label>
                                                <div class="col-sm-3">
                                                <input type="text" class="form-control" id="stc" name="stc">
                                              </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-4 control-label">Standard Volume/Cont</label>
                                                  <div class="col-sm-3">
                                                  <input type="text" class="form-control" id="svc" name="svc">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">%Capacity Tonnage</label>
                                                    <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="cstc" name="cstc" onfocus="hitungton()">
                                                  </div>
                                                  </div>
                                                  <script>
                                                  function hitungton()
                                                  {
                                                    document.getElementById("cstc").value=(document.getElementById("kgctn").value/document.getElementById("stc").value)*100;

                                                  }
                                                  </script>
                                                  <div class="form-group">
                                                      <label class="col-sm-4 control-label">%Capacity Vol</label>
                                                      <div class="col-sm-2">
                                                      <input type="text" class="form-control" id="csvc" name="csvc" onfocus="ambildata1()">
                                                    </div>
                                                    </div>

</div>
<!-- end of tab 1 -->
                                  <div class="tab-pane fade" id="att" role="tabpanel" aria-labelledby="att-tab">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Exchange Rate</label>
                                        <div class="col-sm-2">
                                        <input type="text" class="form-control" id="rate" name="rate" onfocus="ambildata1()">
                                      </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-sm-4 control-label">Exchange Rate EMKL</label>
                                          <div class="col-sm-2">
                                          <input type="text" class="form-control" id="rateemkl" name="rateemkl">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">LS Cost/Document</label>
                                            <div class="col-sm-2">
                                            <input type="text" class="form-control" id="lscostdoc" name="lscostdoc">
                                          </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Buying Price USD </label>
                                              <div class="col-sm-2">
                                              <input type="text" class="form-control" id="buy_price_usd" name="buy_price_usd">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Buying Price IDR </label>
                                                <div class="col-sm-2">
                                                <input type="text" class="form-control" id="buy_price_idr" name="buy_price_idr" onfocus="hitungrate()">

                                              </div>
                                              </div>
                                              <script type="text/javascript">
                                              function hitungrate()
                                              {
                                                document.getElementById("buy_price_idr").value=document.getElementById("buy_price_usd").value*document.getElementById("rate").value;
                                              }
                                              </script>
                                  </div>
                                      <div class="tab-pane fade" id="att" role="tabpanel" aria-labelledby="att-tab">

                                   </div>
                                 </div>
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

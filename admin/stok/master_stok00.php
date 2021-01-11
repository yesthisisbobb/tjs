
<!DOCTYPE html>
<html>
<head>
  <script language=javascript>
var objekxhr, objekxhr1;



function ambildata2(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhs2.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan2;
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

function tampilkan2()
{
document.getElementById("kode_stok").value = objekxhr.responseText;
}

//



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



function ambildata1(str1)
{
buatxhr1();
objekxhr1.open("GET", "TampilMhs1.php?q1="+str1,true);
objekxhr1.send(null);
objekxhr1.onreadystatechange=tampilkan1;
}

function buatxhr1()
{
    if (window.ActiveXObject)

    {
        objectxhr1 = new ActiveXObject("Microsoft.XMLHTTP");
    }
        else if (window.XMLHttpRequest)
    {
        objekxhr1=new XMLHttpRequest();
    }
    else
    {
      alert ("ganti browser anda");
    }
}

function tampilkan1()
{
document.getElementById("kotak1").innerHTML = objekxhr1.responseText;
}

</script>




</head>
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
          <li class="breadcrumb-item active">Master Data Stok</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Data Stok</h1>
<a href=" " class="btn btn-info" role="button"  data-toggle="modal" data-target="#myModal">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
<div id="myModal" class="modal fade" role="dialog" width="600">
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Master Stok</h4>
      </div>
      <div class="modal-body">
        <p>
<table border="1" width=100% class="table-striped ">
<thead class="thead-dark">
    <tr>
         <th>Kode Stok</th>
        <th>Nama Stok</th>
        <th>Shading</th>
    </tr>
</thead>
<tbody>
          <?php

           $sql = "SELECT * FROM master_stok";
           $query = mysqli_query($conn, $sql);

           while($agen = mysqli_fetch_array($query)){


               echo "<tr>";
         echo "<td>".$agen['Kode']."</td>";

         echo "<td>".$agen['nm_stok']."</td>";
         echo "<td>".$agen['shading']."</td>";
         echo "</tr>";


           }

           echo "</table>";
           ?>



        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	    <!-- end page-header -->

	    <div id="add_show">
          <div class="row">
            <div class="col-sm-12">
              <!-- begin panel -->
              <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                  <h4 class="panel-title">Master Stok - Kode Stok Generator</h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body panel-form">
                  <div class="container">
                  <form class="form-horizontal" method="post" action="master_stok1.php">

                    <div class="col-sm-6">
                      <div class="form-group">
                          <label class="control-label col-sm-4">Kode Stok</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" id="kode_stok" name="kode_stok"> <br>
                            <button type="button" id="tom" class="btn" onclick="getkode()">Generate Kode</button>
                        </div>
                        <script>
                        function getkode()
                        {

                            document.getElementById("kode_stok").value=
                            document.getElementById("kd_perusahaan").value+document.getElementById("kd_merk").value+
                            document.getElementById("kotak").value+
                            document.getElementById("kd_sup").value+document.getElementById("kd_tipe").value;

                          }

                          </script>
                      </div>
                    </div>

<!-- row -->

                        <div class="form-group">
                            <div class="col-sm-12">
                              <select class="form-control" id="kd_perusahaan" name="kd_perusahaan">
                                <option>Choose Business Division</option>
                            				<?php
                            					$sql = "SELECT * FROM master_perusahaan";
                                   				 $query = mysqli_query($conn, $sql);
                                    			 while($amku = mysqli_fetch_array($query)){
                            							echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nm_perusahaan']."</option>";
                            						}

                            					?>
                                </select>
                                <a href="../perusahaan/master_perusahaan.php" class="btn btn-primary btn btn-sm" role="button">Add New</a>
                          </div>
                          </div>

                          <div class="form-group">
                              <div class="col-sm-12">


                                <select class="form-control" id="kd_merk" name="kd_merk">
                                  <option>Choose Brand</option>
                                      <?php
                                        $sql = "SELECT * FROM master_merk";
                                             $query = mysqli_query($conn, $sql);
                                             while($amku = mysqli_fetch_array($query)){
                                            echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."</option>";
                                          }
                                        ?>
                                  </select>
                                  <a href="../merk/master_merk.php" class="btn btn-primary btn btn-sm" role="button">Add New</a>

                            </div>
                          </div>



<!-- end row -->
<div class="form-group">
    <div class="col-sm-12">


      <select class="form-control" id="kd_sup" name="kd_sup" onchange="ambildata(this.value)">
        <option>Choose Factory Name</option>
            <?php
              $sql = "SELECT * FROM master_supplier";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
                  echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."</option>";
                }
              ?>
        </select>
        <a href="../supplier/master_supplier.php" class="btn btn-primary btn btn-sm" role="button">Add New</a>

  </div>
</div>
                        <div class="row">
                          
                            <div class=" col-sm-6">
                              <div class="form-group">
                                  <label class="col-sm-4 control-label">Kode Tipe</label>
                                  <div class="col-sm-8">
                                    <select class="form-control" id="kd_tipe" name="kd_tipe" onchange="ambildata1(this.value)">
                                      <option>Kode Tipe</option>
                                          <?php
                                            $sql = "SELECT * FROM master_tipe";
                                                 $query = mysqli_query($conn, $sql);
                                                 while($amku = mysqli_fetch_array($query)){
                                                echo '<option>'.$amku['Kode'].'</option>';
                                              }
                                            ?>
                                      </select>
                                     <div id="kotak1" name="kotak1"></div>
                                </div>
                                </div>
                              </div>
                            </div>



<!-- row -->


                            <div class="row">
                              <div class=" col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">Ukuran</label>
                                    <div class="col-sm-6">
                                      <select class="form-control" id="kd_ukuran" name="kd_ukuran">
                                        <option>Ukuran</option>
                                            <?php
                                              $sql = "SELECT * FROM master_ukuran";
                                                   $query = mysqli_query($conn, $sql);
                                                   while($amku = mysqli_fetch_array($query)){
                                                  echo '<option>'.$amku['nama'].'</option>';
                                                }
                                              ?>
                                        </select>
                                  </div>
                                  </div>
                                </div>
                                <div class=" col-sm-6">
                                  <div class="form-group">
                                      <label class="col-sm-6 control-label">Warna</label>
                                      <div class="col-sm-6">
                                        <select class="form-control" id="kd_warna" name="kd_warna">
                                          <option>Warna</option>
                                              <?php
                                                $sql = "SELECT * FROM master_warna";
                                                     $query = mysqli_query($conn, $sql);
                                                     while($amku = mysqli_fetch_array($query)){
                                                    echo '<option>'.$amku['nama'].'</option>';
                                                  }
                                                ?>
                                          </select>
                                    </div>
                                    </div>
                          </div>

                        </div>
                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Isi</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="isi" name="isi"> <br>
                                      </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button> <br><br>
                                  </div>
                                </div>

                                <div class="panel-footer"> - klik submit button to continue - </div>
                  </div>
                </div>
              </div>
</form>
             <!-- end panel -->



            </div>
          </div>


<!-- begin panel -->



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

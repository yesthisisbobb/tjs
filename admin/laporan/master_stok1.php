
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
        <h4 class="modal-title">Data Customer Toko (B2B)</h4>
      </div>
      <div class="modal-body">
        <p>
<table border="1" width=100% class="table-striped ">
<thead class="thead-dark">
    <tr>
         <th>Nama Toko</th>
        <th>Shipto</th>
           <th>Billto</th>
        <th>kota</th>
        <th>telp</th>
        <th>no.hp</th>
           <th>Email</th>


    </tr>
</thead>
<tbody>
          <?php

           $sql = "SELECT * FROM detail_toko";
           $query = mysqli_query($conn, $sql);

           while($agen = mysqli_fetch_array($query)){


               echo "<tr>";
         echo "<td>".$agen['nama_toko']."</td>";

         echo "<td>".$agen['alamat_shipto']."</td>";
         echo "<td>".$agen['alamat_billto']."</td>";
        echo "<td>".$agen['Kota']."</td>";
       echo "<td>".$agen['Telpon']."</td>";
         echo "<td>".$agen['no_hp']."</td>";
         echo "<td>".$agen['Email']."</td>";







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
                  <h4 class="panel-title">Master Stok </h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body panel-form">
                  <?php

                  if(isset( $_POST['daftar']))

                  {
                    $kode = $_POST['kode_stok'];
                    $kdperusahaan = $_POST['kd_perusahaan'];
                    $kd_merk = $_POST['kd_merk'];
                    $tipe= $_POST['kd_tipe'];
                    $isi= $_POST['isi'];
                    $kd_ukuran=$_POST['kd_ukuran'];
                    $kd_warna=$_POST['kd_warna'];
                    $kd_sup=$_POST['kd_sup'];



                      $sql = "SELECT * FROM master_merk where Kode='$kd_merk'";
                           $query = mysqli_query($conn, $sql);
                           while($amku = mysqli_fetch_array($query)){
                             $nama=$amku['nama'];
                        }

                        $sql = "SELECT * FROM master_tipe where Kode='$tipe'";
                             $query = mysqli_query($conn, $sql);
                             while($amku1 = mysqli_fetch_array($query)){
                               $nm_tipe=$amku1['nama'];
                               $kd_tipe=$amku1['Kode'];

                          }



                  }
                    else
                    {
                      die("Access Denied...");
                    }


                   ?>

                </div>
             <!-- end panel -->

<div class="container">
    <form class="form-horizontal" method="post" action="proses-stok.php">
      <div class="row">
        <div class=" col-sm-4">
          <div class="form-group">
              <label class="control-label col-sm-6 ">Kode Stok</label>
              <div class="col-sm-6">
            <input type="text" class="form-control" id="kd_stok" name="kd_stok" value='<?php echo $kode ?>'>
          </div>
        </div>
      </div>

      <div class=" col-sm-8">
        <div class="form-group">
            <label class="control-label col-sm-2 ">Nama</label>
            <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" value=
          '<?php echo $nm_tipe ." " . $nama . " ". $kd_tipe ."@" . $isi ." ". $kd_ukuran . " ". $kd_warna ?>'>
        </div>
      </div>
    </div>

    </div>

    <div class="row">
      <div class=" col-sm-4">
        <div class="form-group">
            <label class="control-label col-sm-8">Kode perusahaan</label>
            <div class="col-sm-4">
          <input type="text" class="form-control" id="kd_perusahaan" name="kd_perusahaan" value='<?php echo $kdperusahaan ?>'>
        </div>
      </div>
    </div>

    <div class=" col-sm-4">
      <div class="form-group">
          <label class="control-label col-sm-8">Kode Merk</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" id="merk" name="merk" value='<?php echo $kd_merk ?>'>
      </div>
    </div>
  </div>

  <div class=" col-sm-4">
    <div class="form-group">
        <label class="control-label col-sm-8">Kode Supplier</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="sup" name="sup" value='<?php echo $kd_sup ?>'>
    </div>
  </div>
</div>
  </div>


  <div class="row">
    <div class=" col-sm-4">
      <div class="form-group">
          <label class="control-label col-sm-8">Tipe</label>
          <div class="col-sm-4">
        <input type="text" class="form-control" id="tipe" name="tipe" value='<?php echo $nm_tipe?>'>
      </div>
    </div>
  </div>

  <div class=" col-sm-4">
    <div class="form-group">
        <label class="control-label col-sm-8">Ukuran</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="ukuran" name="ukuran" value='<?php echo $kd_ukuran ?>'>
    </div>
  </div>
</div>

<div class=" col-sm-4">
  <div class="form-group">
      <label class="control-label col-sm-8">Warna</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" id="warna" name="warna" value='<?php echo $kd_warna ?>'>
  </div>
</div>
</div>
</div>

<hr>

    <div class="row">
      <div class=" col-sm-4">
        <div class="form-group">
            <label class="control-label col-sm-6 ">Satuan </label>
            <div class="col-sm-6">

          <select class="form-control" id="satuan" name="satuan">
            <option>Nama Satuan</option>
                <?php
                  $sql = "SELECT * FROM master_satuan";
                       $query = mysqli_query($conn, $sql);
                       while($amku = mysqli_fetch_array($query)){
                      echo '<option>'.$amku['nama'].'</option>';
                    }
                  ?>
            </select>
        </div>

      </div>
    </div>
    <div class=" col-sm-8">
      <div class="form-group">
          <label class="control-label col-sm-6 ">Dimensi (m2)</label>
          <div class="col-sm-6">
        <input type="text" class="form-control" id="dimensi" name="dimensi">
      </div>
    </div>
  </div>
    </div>

  <div class="row">
    <div class=" col-sm-4">
      <div class="form-group">
          <label class="control-label col-sm-8 ">Berat</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" id="berat" name="berat">
      </div>
    </div>
    </div>

      <div class=" col-sm-8">
        <div class="form-group">
            <label class="control-label col-sm-6 ">Volume (m3)</label>
            <div class="col-sm-6">
          <input type="text" class="form-control" id="vol" name="vol">
        </div>
      </div>
    </div>
  </div>


<div class="row">
    <div class=" col-sm-4">
      <div class="form-group">
          <label class="control-label col-sm-8 ">Lokal/Import</label>
          <div class="col-sm-4">
            <select class="form-control" id="lokal" name="lokal">
              <option>Lokal / Import</option>
              <option>Lokal</option>
              <option>Impor</option>
              </select>
      </div>
    </div>
    </div>


      <div class=" col-sm-8">
        <div class="form-group">
            <label class="control-label col-sm-2 ">Keterangan</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="keterangan" rows="2" id="keterangan"></textarea>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class=" col-sm-4">
      <div class="form-group">
          <label class="control-label col-sm-8 ">Status</label>
          <div class="col-sm-4">
            <select class="form-control" id="status" name="status">
              <option>Status</option>
              <option>Aktif</option>
              <option>Tidak Aktif</option>
              </select>
      </div>
    </div>
    </div>

      <div class=" col-sm-4">
        <div class="form-group">
            <label class="control-label col-sm-2 ">Shading</label>
            <div class="col-sm-10">
              <select class="form-control" id="shading" name="shading">
                <option>Shading</option>
                <option>Ada</option>
                <option>Tidak ada</option>
                </select>
        </div>
      </div>
    </div>
</div>
<div class=" col-sm-12">
  <div class="form-group">
   <!-- <div class="col-sm-4"> -->
      <button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button> <br><br>
  <!-- </div> -->
</div>
</div>
</div>




    </div>
</form>

</div>
            </div>
          </div>
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

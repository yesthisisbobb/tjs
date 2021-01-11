
<?php
  session_start();
  include("../config.php");
  include("../proses.php");
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
  include("../header.php");
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
  include("../top-menu.php");
?>
<?php
  include("../sidenav-menu.php");
?>  
      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item active">Master Data Sales</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Data Sales</h1>
<button class="btn btn-md btn-primary m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Tambah Data Sales</button>
<button class="btn btn-md btn-primary m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Update Data Sales</button>
<button class="btn btn-md btn-primary m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Update Data Sales</button>
    
	    <!-- end page-header -->
      
	    <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
              <!-- begin panel -->
              <div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                  <h4 class="panel-title">Master Sales</h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body panel-form">
             <BR>
				  <form>
				  <table>
				  <tr><td>Tanggal Buat </td><td><input type="date"></td></tr>
				  
				  
				  <tr><td height="30"> Kode Sales </td>
				  <td><input type="text"></td></tr>
				  <tr><td> Nama Sales</td>
				  <td><input size="50" type="text"></td></tr>
				  <tr><td height="30"> Alamat</td>
				  <td><input size="40" type="text"></td></tr>
				  <tr><td> Kota </td>
				  <td> <input size="30" type="text"> </td></tr>
				  <tr><td> No.Telpon</td>
				  <td><input size="30" type="text"></td></td></tr>
				  <tr><td height="30"> Mobile Phone</td>
				  <td><input size="30" type="text"></td></tR>
				  <td><label for="kota">Email</label></td>
				  <td><input required size="50" type="text" name="kota" id="kota" /></td></tr>
				  <tr><td height="30"><label for="kota">Kontak</label></td>
				  <td><input required size="30" type="text" name="kota" id="kota" /></td></tr>
				 <tr><td height="30"><label for="kota">Keterangan</label></td><td><input required size="30" type="text" name="kota" id="kota" /></td>
				  <tr><td><label for="kota">Status</label></td>
				  <td>
				  <select>
				  <option>Aktif</option>
				  <option>Tidak Aktif</option>
				  </select></td></tr>

				   </table>
				  
				  
				  </form>
				<br>
				<br>
				<br>
				<br>
                </div>
              </div>
              
              <!-- end panel -->
			  
			  
			  
            </div>
          </div>
        </div>
<!-- begin panel -->
        <div class="row">
          <!-- begin col-12 -->
          <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
              <!-- begin panel-heading -->
              <div class="panel-heading">
                <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                </div>
                <h4 class="panel-title">Data Master Sales</h4>

              </div>
              <!-- end panel-heading -->
              <!-- begin panel-body -->
              <div class="panel-body">
                <table border="1" width=100% class="small" >
    <thead>
        <tr>
            <th>ID.</th>
			<th>Nama</th>
            <th>NPWP</th>
            <th>KTP</th>
            <th>Shipto</th>
			<th>Billto</th>
            <th>Kota</th>
            <th>Telp.</th>
            <th>No.HP</th>
			<th>Email</th>
            <th>Status</th>
            <th>PIC</th>
            <th>Fax</th>
			<th>Keterangan</th>
			<th>Tgl.Reg</th>
			<th>Sales</th>
			<th>Jenis</th>
			<th>Action</th>
			
        </tr>
    </thead>
    <tbody>
	
       <?php
        $sql = "SELECT * FROM master_retail";
        $query = mysqli_query($conn, $sql);

        while($agen = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$agen['ID_toko']."</td>";
			echo "<td>".$agen['nama_customer']."</td>";
			echo "<td>".$agen['no_npwp']."</td>";
            echo "<td>".$agen['no_ktp']."</td>";
            echo "<td>".$agen['alamat_shipto']."</td>";
            echo "<td>".$agen['alamat_billto']."</td>";
			echo "<td>".$agen['Kota']."</td>";
            echo "<td>".$agen['Telpon']."</td>";
            echo "<td>".$agen['no_hp']."</td>";
            echo "<td>".$agen['Email']."</td>";
			echo "<td>".$agen['Status']."</td>";
            echo "<td>".$agen['PIC']."</td>";
            echo "<td>".$agen['fax']."</td>";
			echo "<td>".$agen['Keterangan_BL']."</td>";
			echo "<td>".$agen['Tanggal_Masuk']."</td>";
			echo "<td>".$agen['Salesman']."</td>";
			echo "<td>".$agen['kategori_pjk']."</td>";
            echo "<td>";
            echo "<a href='form-updatelead.php?kode=".$agen['kode']."'>Update</a> | ";
			echo "<a href='history.php?kode=".$agen['kode']."'>History</a> | ";
			echo "<a href='sendemail.php?kode=".$agen['kode']."'>Activity</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

				
				
				
              </div>
              <!-- end panel-body -->
            </div>
            <!-- end panel -->
          </div>
          <!-- end col-12 -->
        </div>
        <!-- end panel -->

<?php
  include("../footer.php");
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
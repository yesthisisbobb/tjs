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
          <li class="breadcrumb-item active">Master Customer Retail</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Customer Retail</h1>
<button class="btn btn-md btn-primary m-b-30" onclick="myFunction()"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Tambah Customer Retail Baru</button>
        <!-- end page-header -->
      
	    <div id="add_show" class="hide">
          <div class="row">
            <div class="col-lg-12">
              <!-- begin panel -->
              <div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                  <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                  </div>
                  <h4 class="panel-title">Customer TOKO</h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body panel-form">
                  <form id="add_customer_toko" name="customer_toko" class="form-horizontal form-bordered" method="post" action="proses-daftar-retail.php">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">ID Toko</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="ID Toko" name="ID_toko" id="ID_toko">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Password</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="password" placeholder="Password" name="Password" id="Password">
                            </div>
                          </div>
                        </div> 
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Nama Customer Toko</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="Nama Customer Toko" name="Customer_Name" id="Customer_Name">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">NPWP</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="NPWP" name="no_npwp" id="no_npwp">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">No. KTP</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="No. KTP" name="no_ktp" id="no_ktp">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Alamat Pengiriman</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="Alamat Pengiriman" name="alamat_shipto" id="alamat_shipto">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Alamat Penagihan</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="Alamat Penagihan" name="alamat_billto" id="alamat_billto">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Kota</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="Kota" name="Kota" id="Kota">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">No. Telpon</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="No. Telpon" name="Telpon" id="Telpon">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">No. HP</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="No. HP" name="no_hp" id="no_hp">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">No. Fax</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="No. Fax" name="fax" id="fax">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Status</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input type="checkbox" data-render="switchery" data-theme="blue" data-change="check-switchery-state-text" checked="" name="Status" id="Status" data-switchery="true">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">E-Mail</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="email" placeholder="E-Mail" name="Email" id="Email">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Picture</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <span class="control-fileupload ">
                                <label for="file">Choose a file : (.jpg)</label>
                                <input type="file" name="PIC" id="PIC">
                                <span class="btn btn-primary fileinput-button float-right"> <i class="fa fa-plus"></i> Foto Profil</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Keterangan</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <textarea class="form-control" rows="3" placeholder="Keterangan" name="Keterangan_BL" id="Keterangan_BL"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Memo</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <textarea class="form-control" rows="3" placeholder="Memo" name="Memo" id="Memo"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Tgl. Masuk</label>
                          <div class="col-md-8">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="Tgl. Masuk" name="Tanggal_Masuk" id="datepicker-default Tanggal_Masuk" value="04/1/2019">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Kategori Pajak</label>
                          <div class="col-md-8">
                            <select class="form-control">
                              <option value="Pajak">Pajak</option>
                              <option value="Non Pajak">Non Pajak</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 col-form-label">Salesman</label>
                          <div class="col-md-8">
                            <select class="default-select2 form-control" name="Salesman" id="Salesman">
                              <option value=""></option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-6 m-b-30 text-center">
                  <a href="javascript:;" onclick="myFunction()" class="btn btn btn-warning btn-lg float-right">Batal</a>
                </div>
                <div class="col-lg-6 m-b-30 text-center">
                  <a href="javascript:;" data-click="swal-primary" class="btn btn-primary btn-lg float-left">Tambah Customer Retail</a>
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
                <h4 class="panel-title">Data Customer Retail</h4>

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
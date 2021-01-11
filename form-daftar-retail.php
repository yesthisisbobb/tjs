<?php
session_start(); //memulai session
//cek jika sebelumnya sudah ada session level
//maka redirect ke halaman berdasarkan level si pengguna.
if(isset($_SESSION["level"])){
header('Location: ./'.$_SESSION["level"].'/');
}
include("config.php"); //include koneksi database
include(""); //include proses untuk merespon dari masing-masing action
?>
<?php
include("header.php");
?>
<body class="pace-top bg-white">
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
	<div id="page-container" class="fade">
		<!-- begin register -->
		<div class="register register-with-news-feed">
			<!-- begin news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url('<?=$base_url;?>/assets/img/login-bg/login-bg-11.jpg')"></div>
				<div class="news-caption">
					<div class="icon-img m-b-15">
						<a href="<?=$base_url;?>/index.php"><img src="<?=$base_url;?>/assets/img/logo/ventura2-white.png" alt="Ventura Ver. 2" /></a>
					</div>
					<h4 class="caption-title"><b>Ventura</b> Ver.2</h4>
					<p>
						ERP Business Solutions Karya Modern
					</p>
				</div>
			</div>
			<!-- end news-feed -->
			<!-- begin right-content -->
			<div class="right-content">
				<!-- begin register-header -->
				<h1 class="register-header">
				<div class="icon-img text-center m-b-30">
					<a href="<?=$base_url;?>/index.php"><img src="<?=$base_url;?>/assets/img/logo/ventura2.png" alt="" /></a>
				</div>
				<hr />
				Register
				<small>Create <strong>"Customer Retail"</strong> Account</small>
				</h1>
				<!-- end register-header -->
				<!-- begin register-content -->
				<div class="register-content">
					<form id="form1" name="form1" method="post" action="proses-daftar-retail.php" enctype="multipart/form-data">
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="ID Toko" name="ID_toko" id="ID_toko" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="password" class="form-control" placeholder="Password" name="Password" id="Password" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Nama Customer" name="Customer_Name" id="Customer_Name" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="No. NPWP" name="no_npwp" id="no_npwp" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="No. KTP" name="no_ktp" id="no_ktp" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<textarea class="form-control" rows="3" placeholder="Alamat Pengiriman" name="alamat_shipto" id="alamat_shipto"></textarea>
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<textarea class="form-control" rows="3" placeholder="Alamat Tagiahan" name="alamat_billto" id="alamat_billto"></textarea>
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Kota" name="Kota" id="Kota" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" id="masked-input-phone" placeholder="Phone: (XXX) XXX-XXXXX" name="Telpon" id="Telpon">
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" id="masked-input-phone" placeholder="No. HP : (XXX) XXX-XXXXX" name="no_hp" id="no_hp">
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="email" class="form-control" placeholder="Email" name="Email" id="Email" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<select name="formal" onchange="javascript:handleSelect(this)" class="form-control" name="Status" id="Status">
									<option value="" selected="Status">Status</option>
									<option value="Aktif">Aktif</option>
									<option value="Tidak Aktif">Tidak. Aktif</option>
								</select>
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<span class="control-fileupload ">
									<label for="file">Choose a file : (.jpg)</label>
									<input type="file" name="PIC" id="PIC">
									<span class="btn btn-primary fileinput-button float-right"> <i class="fa fa-plus"></i> Photo Profile</span>
								</span>
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" id="masked-input-phone" placeholder="No. Fax: (XXX) XXX-XXXXX" name="fax" id="fax">
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<textarea class="form-control" rows="3" placeholder="Keterangan" name="keterangan_BL" id="keterangan_BL"></textarea>
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<textarea class="form-control" rows="3" placeholder="Memo" name="Memo" id="Memo"></textarea>
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input class="form-control" type="text" placeholder="Tgl. Masuk" name="Tanggal_Masuk" id="datepicker-default" value="04/1/2019">
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Nama Sales" name="Salesman" id="Salesman" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<select name="formal" onchange="javascript:handleSelect(this)" class="form-control" name="kategori_pjk" id="kategori_pjk">
									<option value="" selected="Status">Kategori Pajak</option>
									<option value="Pajak">Pajak</option>
									<option value="Non Pajak">Non Pajak</option>
								</select>
							</div>
						</div>
						<div class="checkbox checkbox-css m-b-30">
							<div class="checkbox checkbox-css m-b-30">
								<input type="checkbox" id="agreement_checkbox" value="">
								<label for="agreement_checkbox">
									By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
								</label>
							</div>
						</div>
						<div class="register-buttons">
							<button type="submit" class="btn btn-primary btn-block btn-lg" name="daftar">Daftar</button>
						</div>
						<hr />
					</form>
				</div>
				<!-- end register-content -->
			</div>
			<!-- end right-content -->
		</div>
		<!-- end register -->
	</div>
	<!-- end page container -->
	<?php
	include("footer.php");
	?>
	<script type="text/javascript">
	$(function() {
	$('input[type=file]').change(function(){
	var t = $(this).val();
	var labelText = 'File : ' + t.substr(12, t.length);
	$(this).prev('label').text(labelText);
	})
	});
	</script>
</div>
</body>
</html>
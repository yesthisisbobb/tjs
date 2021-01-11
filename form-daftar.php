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
				<small>Create <strong>"Customer Toko"</strong> Account</small>
				</h1>
				<!-- end register-header -->
				<!-- begin register-content -->
				<div class="register-content">
					<form id="form1" name="form1" method="post" action="proses-daftar.php" enctype="multipart/form-data">
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="ID Group" name="ID_grup" id="ID_grup" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Nama Group" name="nm_grup" id="nm_grup" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="ID Kategori" name="ID_Kategori" id="ID_Kategori" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="AR Limit" name="AR_limit" id="AR_limit" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<textarea class="form-control" rows="3" placeholder="Alamat" name="alamat" id="alamat"></textarea>
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" id="masked-input-phone" placeholder="Phone: (XXX) XXX-XXXXX" name="telp" id="telp">
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="email" class="form-control" placeholder="Email" name="email" id="email" required />
							</div>
						</div>
						<div class="input-group m-b-10">
							<span class="control-fileupload ">
								<label for="file">Choose a file : (.jpg)</label>
								<input type="file" name="pic" id="pic">
								<span class="btn btn-primary fileinput-button float-right"> <i class="fa fa-plus"></i> Picture</span>
							</span>
						</div>
						<div class="input-group m-b-10">
							<span class="control-fileupload ">
								<label for="file">Choose a file : (.jpg) </label>
								<input type="file" name="foto" id="foto">
								<span class="btn btn-primary fileinput-button float-right"> <i class="fa fa-plus"></i> Foto Toko</span>
							</span>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Nama Sales" name="sales" id="sales" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<textarea class="form-control" rows="3" placeholder="Keterangan" name="keterangan_BL" id="keterangan_BL"></textarea>
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Cabang" name="Cabang" id="Cabang" required />
							</div>
						</div>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" class="form-control" placeholder="Koordinat" name="koordinat" id="koordinat" required />
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
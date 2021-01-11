<?php
session_start();
include("config.php");
//include("proses-daftar-retail.php");

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
include("header.php");
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
		include("top-menu.php");
		?>
		<?php
		include("sidenav-menu.php");
		?>
		<body>
			<!-- begin #content -->
			<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb pull-right">
					<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
					<li class="breadcrumb-item active">Pendaftaran Customer Retail</li>
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Pendaftaran Customer Retail</h1>
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
							<h4 class="panel-title">Daftar Customer Retail</h4>
						</div>
						<!-- begin panel-body -->
						<div class="panel-body panel-form">
							<form id="form1" name="form1" class="form-horizontal form-bordered" method="post" action="proses-daftar-retail.php">
								<div class="row">




									
		<!-- begin FORM -->






								</div>
            <div class="col-lg-12 m-t-10 m-b-10 text-center">
              <button type="submit" data-click="swal-success" name="daftar" class="btn btn-lg btn-primary m-b-30 float-right"><i class="fas fa-lg fa-fw m-r-10 fa-plus"></i>Tambah Customer</button>
            </div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
			include("footer.php");
			?>
		</div>
	</body>
</html>


<?php
include("../header.php");
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
				<small>Add <strong>"Subsidiary"</strong> Account | <a href="../index.php"> Back to Login Page</a></small>
				</h1>
				<!-- end register-header -->
				<!-- begin register-content -->
				<div class="register-content">
				<form id="form1" name="form1" method="post" action="">
   			<table><tr><td><label for="ID_grup">Id Grup</label></td><td><input type="text" name="ID_grup" id="ID_grup"  required/></td>
							
			<td><input type="submit" value="daftar" name="daftar" /></td></tr></table>

			<?php
				include "../config.php";
				if(isset( $_POST['daftar']))

				{
				$kode = $_POST['ID_grup'];
		        $sql = "SELECT * FROM master_toko where ID_grup=$kode";
		        $query = mysqli_query($conn, $sql);
		        while($agen = mysqli_fetch_array($query))
						
		            { 
						echo "<br>";
						echo "<b>";
						echo "Welcome ".$agen['nm_grup'];
						echo "</b>";
						echo "<br>";
						echo $agen['alamat'];
						echo "<br>";
						echo $agen['kota'];
						echo " | <a href='form-daftar-detail.php?kode=$kode'>Click Here</a> to continue";
						
				 	}
				}
	   		 ?>

</form>

<br><br><br><br><br><br>
	<ol> <p class=small><b>Note :</b>
		<li class=small>Subsidiary account bisa didaftarkan setelah Main account atau Grup didaftarkan </li>
		<li class=small>Pendaftaran main account dapat dilakukan di <a href="form-daftar.php">link ini</a></li>
		<li class=small>Setelah syarat pendaftaran lengkap dan proses pendaftaran main account / grup di setujui maka admin akan memberikan ID Group </li>
		<li class=small>ID Group dapat digunakan untuk mendaftarkan subsidiary account di halaman ini </li>
		<li class=small>Jika ada hal yang hendak ditanyakan dapat menghubungi +628113456734 </li>
		
	</ol>
			<br class="clear" /> 
				</div>
				<!-- end register-content -->
			</div>
			<!-- end right-content -->
		</div>
		<!-- end register -->
	</div>
	<!-- end page container -->
	<?php
	include("../footer.php");
	?>
	

	
</div>
</body>
</html>
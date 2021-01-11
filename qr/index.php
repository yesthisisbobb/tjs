<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>NDASMUU!</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="container" id="QR-Code">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="navbar-form navbar-left">
                        <h4>CEK KEASLIAN SERTIFIKAT</h4>
                    </div>
                    <div class="navbar-form navbar-right">
                        <select class="form-control" id="camera-select"></select>
                        <div class="form-group">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                         </div>
                    </div>
                </div>
                <div class="panel-body text-center">
                    <div class="col-md-6">
                        <div class="well" style="position: relative;display: inline-block;">
                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="thumbnail" id="result">
                            <div class="well" style="overflow: hidden;">
                                <img width="320" height="240" id="scanned-img" src="">
                            </div>
                            <div class="caption">
                                <h3>COPYKAN KODE UNTUK MENGETAHUI PEMILIK SERTIFIKAT!</h3>
                                <p id="qr"></p>
<?php
include"koneksi.php";
?>

<!-----------form cari-------------------->
<form method='post' action='index.php'>

<input class='form-control' type='text' name='cari' placeholder='COPY PASTEKAN KODENYA DAN TEKAN TOMBOL ENTER'>
<!-----------tabel-------------------->
<table>
<tr>
<div id='table' 'table-responsive'>
			<table border='1' class='table'>
			<thead class='thead-dark'>
  			<tr>
    			<th>SERIAL</th>
    			<th>NPM</th>
				<th>NAMA</th>
				<th>PRODI</th>
  			</tr>
</div>
<tr>

<!-----------------menampilkan hasil dari form cari---->
<?php	
		$cari = $_POST['cari']; //fungsi untuk membaca inputan dari form cari
	  	$cari = mysql_query("SELECT *FROM qr where qr like '$cari'");
	  	while($data=mysql_fetch_array($cari)){
	  	echo"
</div>
</div>
		<tr>
				<td valign='top'>$data[qr]</td>
				<td valign='top'>$data[npm]</td>
				<td valign='top'>$data[nama]</td>
				<td valign='top'>$data[prodi]</td>
		  	</tr>";
  			}
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/filereader.js"></script>
        <!-- Using jquery version: -->
        <!--
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/qrcodelib.js"></script>
            <script type="text/javascript" src="js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="js/mainjquery.js"></script>
        -->
        <script type="text/javascript" src="js/qrcodelib.js"></script>
        <script type="text/javascript" src="js/webcodecamjs.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
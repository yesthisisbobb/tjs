<table>
<tr>
<div id='table' 'table-responsive'>
			<table border='1' class='table'>
			<thead class='thead-dark'>
  			<tr>
    			<th>QR</th>
    			<th>NAMA</th>
				<th>NPM</th>
				<th>KETERANGAN</th>
				<th>AKSI</th>
  			</tr>
</div>
<tr>
<?php
include"qrlib.php";
include"koneksi.php";	
		$cari = $_POST['cari']; //fungsi untuk membaca inputan dari form cari
	  	$cari = mysql_query("SELECT * FROM qr");
	  	while($data=mysql_fetch_array($cari)){
		$tempdir = "temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
		if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
		mkdir($tempdir);
 

		$isi_teks = "$data[qr]";
		$namafile = "$data[qr].png";
		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
		$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
		$padding = 0;
 
		QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
	  	echo"
</div>
</div>
		<tr>
				<td valign='top'><img src=temp/$data[qr].png></td>
				<td valign='top'>$data[nama]</td>
				<td valign='top'>$data[npm]</td>
				<td valign='top'>$data[prodi]</td>
				<td valign='top'><a href='cetak.php?qr=$data[qr]'>cetak</a></td>
		  	</tr>";
  			}
?>			

<!--
 *----------------------------------------------------------*
 *	Name : aplikasi pendaftaran pplt-ls online fkip ummetro-*
 *	Coder: ismail puji saputra------------------------------*								
 *	Email: ismailpujisaputra@gmail.com----------------------*
 *	Date : march 2018---------------------------------------*
 * ---------------------------------------------------------*/
-->
<?php include"../koneksi.php";
include"qrlib.php";

	ini_set( "display_errors", 0);

	
function antiInjections($string) {
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = mysql_real_escape_string($string);
    return $string;
}
$qr = $_GET['qr'];
$query = "select * from qr where qr='$qr'";
$hasil = mysql_query($query, $koneksi) or die("Gagal melakukan query.");
$buff = mysql_fetch_array($hasil);
mysql_close($konak);
		$tempdir = "../temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
		if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
		mkdir($tempdir);
		$isi_teks = "$buff[qr]";
		$namafile = "$buff[qr].png";
		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
		$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
		$padding = 0;
 
		QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CETAK
</title>
</head>
<body color="black">
<?php
echo'<table align="center">
  <tr>
    <td><h1>SERTIFIKAT</h1></td>
  </tr>
  </table><p></p><p></p><p></p><p></p><p></p>';
echo '<table width="600">

    <tr>
    <td><h3>SERTIFIKAT INI DIBERIKAN KEPADA:</h3><p></p><p></p><p></p></td>
  </tr>

</table>';
echo '<table>
    <tr>
    <td><h4>NAMA</h4></td>
    <td>:</td>
    <td><h4>'.$buff['nama'].'</h4></td> 
  </tr>
  <tr>
	<td><h4>NPM</h4></td>
    <td>:</td>
    <td><h4>'.$buff['npm'].'</h4></td>
  </tr>
  <tr>
	<td><h4>PROGRAM STUDI</h4></td>
    <td>:</td>
    <td><h4>'.$buff['prodi'].'</h4></td>
  </tr>
  
</table><p></p>';
echo '<table width="600">
  <tr>
    <td><h4>TELAH MENYELESAIKAN TUGAS NEGARA YAITU MENGEBOR MINYAK KAYU PUTIH DI LEPAS PANTAI!</h4></td>
  </tr>
 
</table>';
echo '<table width="600">
  <tr>
    <td><img src=temp/'.$buff['qr'].'.png></td>
  </tr>
 
</table>';
?>
</body>
</html>
<?php
$filename="mhs-".$qr.".pdf";
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once('pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>
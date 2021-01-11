

<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");

$kode=$_GET['q'];//required quantiy
$kode1=$_GET['y'];

?>
<form action="proses-cart.php" method="POST">
<input type="text" name="nilai" id="nilai" value="5">
<button type="submit" name="daftar" value="daftar" class="btn btn-info">Add to Cart</button>
</form>

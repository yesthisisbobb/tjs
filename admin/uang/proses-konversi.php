<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
    $uang1 = $_POST['uang1'];
		$uang2 = $_POST['uang2'];
		$nilai = $_POST['nilai'];
		$ket1 = $_POST['ket1'];
		$status = $_POST['status'];

		$sql = "INSERT INTO master_konversi(nama1, nama2, nilai, ket1, status)  VALUES ('$uang1','$uang2', '$nilai', '$ket1', '$status')";
		$query = mysqli_query($conn, $sql);
		if( $query )
	{
				header('Location:../../index.php?status=sukses');
		}
	else
	{
			header('Location:../index.php?status=gagal');
		}

}
else
{
	die("Access Denied...");
}

?>

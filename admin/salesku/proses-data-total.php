<?php
include '../../config.php';

if(isset( $_POST['daftar12']))
	{
		$id = $_POST['noq'];
		$idrev=$_POST['norevisi'];

		$total=$_POST['totmat'];
		$tax=$_POST['netmat'];
		$totaltax = $_POST['totkirim'];
		$kirim= $_POST['kirim'];
		$taxkirim = $_POST['taxdel'];
		$netkirim = $_POST['totaldel'];
		$other=$_POST['other'];
		$taxother=$_POST['taxotherdel'];
		$netother=$_POST['totalotherdel'];
		$gtot=$_POST['gtku'];

	 $sql = "UPDATE revq set total='$total', tax='$tax',totaltax='$totaltax', kirim='$kirim', taxkirim='$taxkirim', netkirim='$netkirim',
	 other='$other', taxother='$taxother', netother='$netother', gtot='$gtot' where no_cart='$id' and norev='$idrev'";

	 $query = mysqli_query($conn, $sql);
			if($query)
		{
					header('Location: quotationlist.php?status=sukses');
			}
		else
		{
				header('Location: quotationlist.php?status=gagal');
			}

}

?>

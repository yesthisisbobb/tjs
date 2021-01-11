<?php
session_start();
include("../../config.php");
include("../../proses.php");

if(isset( $_POST['daftar']))
	{
		// $tgl=$_POST['tgl'];
		// $dono=$_POST['dono'];

		$noso=$_POST['noso'];
		$kode=$_POST['kode'];
		$jum=$_POST['jum'];
		$sisa=$_POST['sisa'];
		$kirim=$_POST['kirim'];
		$tglkirim=$_POST['tglkirim'];
		$pilih= $_POST['pilih'];
		$dipilih = count($pilih);
// echo $dono;
		// $sql11 = "INSERT INTO do (tgl, nodo, status)VALUES ('$tgl','$dono','OPEN')";
		// $query11 = mysqli_query($conn, $sql11);
}
	// 	for($x=0;$x<$dipilih;$x++){
	// 		// echo $pilih[$x];
	// 		// echo $_POST["kirim"][$pilih[$x]-1];
	// 					$sql1 = "SELECT * from jualdtl where no=$pilih[$x]";
	// 		$query1 = mysqli_query($conn, $sql1);
	// 		while($amku1= mysqli_fetch_array($query1)){
	// 			$kodeku=$amku1['kode_stok'];
	// 			$no_cart=$amku1['no_cart'];
	// 			$kirim1=$amku1['kirim'];
	//
	// 		}
	// 		$kir2=$_POST["kirim"][$pilih[$x]-1];
	// 		$kir=$kirim1+$_POST["kirim"][$pilih[$x]-1];
	// 		$tglkirim=$_POST["tglkirim"][$pilih[$x]-1];
	// 		$sql = "INSERT INTO dotemp (no_cart,tgl,kode_stok, jumlah)VALUES ('$no_cart','$tglkirim','$kodeku','$kir2')";
	// 		$query = mysqli_query($conn, $sql);
	// 		$sql2 = "UPDATE jualdtl set kirim=$kir WHERE  no=$pilih[$x]";
	// 		$query2 = mysqli_query($conn, $sql2);
	//
	//
	// 	}
	//
	//     if( $query )
	// 	{
	//
	// 				header('Location: do_temp.php?status=sukses');
  //   	}
	// 	else
	// 	{
	// 		header('Location: do_temp.php?status=gagal');
  //   	}
	// }
	// else
	// {
  //   die("Access Denied...");
	// }

?>

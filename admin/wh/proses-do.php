<?php
session_start();
include("../../config.php");
include("../../proses.php");

if(isset( $_POST['daftar']))
	{
		$tgl=$_POST['tgl'];
		$dono=$_POST['dono'];
		$noso=$_POST['noso'];
		$kode=$_POST['kode'];
		$jum=$_POST['jum'];
		$kirim=$_POST['kirim'];
		$pilih= $_POST['pilih'];
		$vt=$_POST['vt'];
		$dipilih = count($pilih);

		$sql11 = "INSERT INTO do (tgl, nodo, status)VALUES ('$tgl','$dono','OPEN')";
		$query11 = mysqli_query($conn, $sql11);

		for($x=0;$x<$dipilih;$x++){
			// echo $pilih[$x];
			// echo $_POST["kirim"][$pilih[$x]-1];
			$sql1 = "SELECT * from dotemp where no=$pilih[$x]";
			$query1 = mysqli_query($conn, $sql1);
			while($amku1= mysqli_fetch_array($query1)){
				$kodeku=$amku1['kode_stok'];
				$no_cart=$amku1['no_cart'];
				$kirim1=$amku1['jumlah'];

			}
$urutan=$pilih[$x];
			$kir=$kirim1-$_POST['kirim'][$urutan-1];;
			$kir2=$_POST['kirim'][$urutan-1];


			$sql = "INSERT INTO dodtl (nodo, no_cart,kode_stok,jumlah)VALUES ('$dono','$no_cart','$kodeku',$kir2)";
			$query = mysqli_query($conn, $sql);
			$sql2 = "UPDATE dotemp set jumlah=$kir WHERE  no=$pilih[$x]";
			$query2 = mysqli_query($conn, $sql2);

			$sql15 = "SELECT * from master_stok where kodeitem_stok='$kodeku'";
			$query15 = mysqli_query($conn, $sql15);
			while($amku15= mysqli_fetch_array($query15)){
				$tonage=$amku15['kgctn'];
				$p=$amku15['panjang']/100;
				$l=$amku15['lebar']/100;
				$t=$amku15['tebal']/100;
				$vol=$p*$l*$t;
			}
			$sql3 = "INSERT INTO dtl_vtruk (nopol, nodo, vol,tonage)VALUES ('$vt','$dono',$vol,$tonage)";
			$query3 = mysqli_query($conn, $sql3);


		}

	    if( $query )
		{

					header('Location: do_in.php?status=sukses');
    	}
		else
		{
			header('Location: do_in.php?status=gagal');
    	}
	}
	else
	{
    die("Access Denied...");
	}

?>

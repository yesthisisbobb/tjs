<?php
session_start();
include("../../config.php");
include("../../proses.php");

if(isset( $_POST['daftar']))
	{
		$tgl=$_POST['tgl'];
		$pono=$_POST['pono'];
		$dist=$_POST['dist'];
		// $kode=$_POST['kode'];
		// $harga=$_POST['harga'];
		// $qty=$_POST['qty'];
		$pilih= $_POST['pilih'];
		$dipilih = count($pilih);


		for($x=0;$x<$dipilih;$x++){
				// echo $pilih[$x];
				$sql = "SELECT * from ordertemp where no='$pilih[$x]'";
				$query = mysqli_query($conn, $sql);
					while($amku = mysqli_fetch_array($query)){
							$kodestok=$amku['kode_stok'];
							$so=$amku['no_cart'];
							$jum=$amku['jumlah'];
								$sql2 = "SELECT * FROM master_hpp where tjsitemcode='$kodestok'";
										 $query2 = mysqli_query($conn, $sql2);
										 while($amku2 = mysqli_fetch_array($query2)){
											 $hpp=$amku2['cogsp'];
										 }
					}
					$sql3 = "INSERT INTO podtl (kode, nopo, noso, jumlah, harga)VALUES ('$kodestok',$pono', $so',$jum,$hpp)";
					$query3 = mysqli_query($conn, $sql3);
			}

			$sql4 = "INSERT INTO masterpo (tgl, nopo, dist, status)VALUES ('$tgl','$pono','$dist', 'OPEN')";
			$query4 = mysqli_query($conn, $sql4);
			// $totalku=$harga[$x]*$qty[$x];
			// $sql2 = "INSERT INTO podtl (kode, noso, jumlah, harga)VALUES ('$kodestok','$noso',$jum,$hp')";
			// $query2 = mysqli_query($conn, $sql2);


	    if( $query4 )
		{

					header('Location: master_po.php?status=sukses');
    	}
		else
		{
			header('Location: master_po.php?status=gagal');
    	}
	}
	else
	{
    die("Access Denied...");
	}

?>

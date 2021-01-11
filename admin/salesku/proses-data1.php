<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
	if(!empty($_POST['pil1'])){
			$tglu=$_POST['tglu'];
			$id=$_POST['id1'];
			$kodet=$_POST['kodet'];
			$tgl=$_POST['tgl'];
			$qty=$_POST['qty'];
			$nomer=$_POST['nomer'];
			$harga=$_POST['harga'];
			$total=$_POST['total'];

			$sqlcekid2 = "SELECT cart_id from po order by cart_id DESC LIMIT 1";
			$querycekid2 = mysqli_query($conn, $sqlcekid2);
			$hasil=mysqli_num_rows($querycekid2);

		 if ($hasil==0)
		 {
				 $noakhir2=1;
				 $invno="PO"."/".$tglu."/"."SBY-RTL"."/".$noakhir2;
				 // $dono="DO"."/".$tglu."/"."SBY-RTL"."/".$noakhir2;
				 $sql5 = "INSERT INTO PO(tgl,cart_id,noinv,noso)  VALUES ('$tglu','$noakhir2','$invno','$id')";
				 $query5 = mysqli_query($conn, $sql5);
				//  $sql51 = "INSERT INTO do(tgl,cart_id,nodo,noinv)  VALUES ('$tglu','$noakhir2','$dono','$invno')";
				// $query51= mysqli_query($conn, $sql51);
		 }
		 else {
					$noakhir2=$rowcekid2["cart_id"]+1;
					$sql5 = "UPDATE PO SET tgl='$tglu',noso='$id' where tgl='$tglu' and noso='$id'";
					$query5 = mysqli_query($conn, $sql5);
					// $sql51 = "UPDATE do SET tgl='$tglu',nodo='$dono' where tgl='$tglu' and noso='$id'";
					// $query51 = mysqli_query($conn, $sql5);
	}

	$sqlcekid = "SELECT * from podtl1";
	$querycekid = mysqli_query($conn, $sqlcekid);
	$rowcekjum=mysqli_num_rows($querycekid);
	if($rowcekjum==0)
	{
	$noakhir1=0;
	}
 else {
	$sqlcekid1 = "SELECT noq from podtl1 order by noq DESC LIMIT 1";
	$querycekid1 = mysqli_query($conn, $sqlcekid1);
		while($rowcekid1 = mysqli_fetch_array($querycekid1)) {
			$noakhir1=$rowcekid1["noq"];
				 }

		 }
		 $sqlcekid2= "SELECT * from ijualdtl where noso='$id'";
 	 $querycekid2 = mysqli_query($conn, $sqlcekid2);
 	 $cekq=mysqli_num_rows($querycekid2);



 				 for ($i=0;$i<$cekq;$i++)
 				 {
	$noakhir1=$noakhir1+1;
  $sql6 = "INSERT INTO podtl1(noq,noso,noinv,tgl,kode_stok,jumlah,harga,total)  VALUES ('$noakhir1','$id','$invno','$tglu','$kodet[$i]','$qty[$i]','$harga[$i]','$total[$i]')";
  $query6 = mysqli_query($conn, $sql6);
	$noakhir1=$noakhir1+1;
  // $sql61 = "INSERT INTO dodtl(nodo,noinv,no_cart,kode_stok,jumlah)  VALUES ('$dono','$invno','$noakhir1','$kodet[$i]','$qty[$i]')";
  // $query61 = mysqli_query($conn, $sql61);
}
}


else {
		$uid=$_SESSION["username"];
			$id=$_POST['id1'];
			$kodet=$_POST['kodet'];
    	$tgl=$_POST['tgl'];
			$qty=$_POST['qty'];
			$nomer=$_POST['nomer'];
			$harga=$_POST['harga'];
			$total=$_POST['total'];

			$sqlcekid2= "SELECT * from ijualdtl where noso='$id'";
		 $querycekid2 = mysqli_query($conn, $sqlcekid2);
		 $cekq=mysqli_num_rows($querycekid2);



					 for ($i=0;$i<$cekq;$i++)
					 {
						 $sqlcekid2 = "SELECT cart_id from po order by cart_id DESC LIMIT 1";
						 $querycekid2 = mysqli_query($conn, $sqlcekid2);
						 $hasil=mysqli_num_rows($querycekid2);

						if ($hasil==0)
						{
								$noakhir2=1;
						}
						else {

							 while($rowcekid2 = mysqli_fetch_array($querycekid2)) {
								 $noakhir2=$rowcekid2["cart_id"]+1;

										}
				}
				// echo $noakhir2;
						 $sqlcekid = "SELECT * from podtl";
						 $querycekid = mysqli_query($conn, $sqlcekid);
						 $rowcekjum=mysqli_num_rows($querycekid);
						 if($rowcekjum==0)
						 {
						 $noakhir1=0;
						 }
			 			else {
			 			 $sqlcekid1 = "SELECT noq from podtl1 order by noq DESC LIMIT 1";
			 			 $querycekid1 = mysqli_query($conn, $sqlcekid1);
			 				 while($rowcekid1 = mysqli_fetch_array($querycekid1)) {
			 					 $noakhir1=$rowcekid1["noq"];
			 				 			}

			 		 			}

			 $sqlcektgl = "SELECT * from po where tgl='$tgl[$i]' and noso = '$id'";
			 $querycektgl = mysqli_query($conn, $sqlcektgl);
			 $rowcektgl=mysqli_num_rows($querycektgl);

				if($rowcektgl==0)
				{

					$invno="PO"."/".$tgl[$i]."/"."SBY-RTL"."/".$noakhir2;
					// $dono="DO"."/".$tgl[$i]."/"."SBY-RTL"."/".$noakhir2;
			 		$sql5 = "INSERT INTO po(tgl,cart_id,noinv,noso)  VALUES ('$tgl[$i]','$noakhir2','$invno','$id')";
					$query5 = mysqli_query($conn, $sql5);
					// $sql51 = "INSERT INTO do(tgl,cart_id,nodo,noinv)  VALUES ('$tgl[$i]','$noakhir2','$dono','$invno')";
				 // $query51= mysqli_query($conn, $sql51);

				}
				else {
					$sql5 = "UPDATE po SET tgl='$tgl[$i]',noso='$id' where tgl='$tgl[$i]' and noso='$id'";
				$query5 = mysqli_query($conn, $sql5);
				// $sql51 = "UPDATE do SET tgl='$tgl[$i]',nodo='$dono' where tgl='$tgl[$i]' and noso='$id'";
				// $query51 = mysqli_query($conn, $sql5);
				}



						 $noakhir1=$noakhir1+1;
						 $sql6 = "INSERT INTO podtl1(noq,noso,noinv,tgl,kode_stok,jumlah,harga,total)  VALUES ('$noakhir1','$id','$invno','$tgl[$i]','$kodet[$i]','$qty[$i]','$harga[$i]','$total[$i]')";
						 $query6 = mysqli_query($conn, $sql6);
						 // $sql61 = "INSERT INTO dodtl(nodo,noinv,no_cart,kode_stok,jumlah)  VALUES ('$dono','$invno','$noakhir1','$kodet[$i]','$qty[$i]')";
						 // $query61 = mysqli_query($conn, $sql61);
					 }

}
					 	}

?>

<!--

	}
	//
	//     $sql = "INSERT INTO gudang (nm_cabang, nm_gudang, alamat, kota, jenis, keterangan, status)
	// 		 VALUES ('$cabang', '$nama', '$alamat', '$kota', '$jenis', '$keterangan', '$status')";
	// 	$query = mysqli_query($conn, $sql);
  //   	if( $query )
	// 	{
  //       	header('Location: ../index.php?status=sukses');
  //   	}
	// 	else
	// 	{
	// 		header('Location: ../index.php?status=gagal');
  //   	}
	//
	// }
	// else
	// {
  //   die("Access Denied...");
	// }

?> -->

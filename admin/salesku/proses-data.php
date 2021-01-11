<?php
include '../../config.php';
session_start();
$cid=$_POST['cid'];
$hargan3=$_POST['hargan3'];
$status = "OPEN";
$cabang = $_SESSION['cabang'];
$divisi2 = $_SESSION['divisi2'];
if(isset( $_POST['daftar1']))
	{

		$user=$_SESSION["username"];



		$sqlku11 = "SELECT * FROM login where email='$user'";
		$queryku11 = mysqli_query($conn, $sqlku11);
		 while($amku11 = mysqli_fetch_array($queryku11)){
			 $divisiku=$amku11['divisi2'];
			 $role=$amku11['role'];

		 }

		$id=$_POST['id1'];
		$status=$_POST['status'];
		$hargan=$_POST['hargan'];
		$hargan1=$_POST['hargan1'];
		$hargan2=$_POST['hargan2'];
		$hargan3=$_POST['hargan3'];

		$nomer=$_POST['nomer'];
		$j=0;
		$sqlcekhargan = "SELECT * from jualdtl where noso='$id'";
		$querycekhargan = mysqli_query($conn, $sqlcekhargan);
$total1=0;
$total2=0;
		while($rowcekhargan = mysqli_fetch_array($querycekhargan))
					{
						$hargaakhir1=$rowcekhargan['hargaakhir'];
						$jumlah1=$rowcekhargan['jumlah'];
						$total1=$hargaakhir1*$jumlah1;
						$total2=$total2+$total1;
						if ($role=="admin")
						{
							
						$nomerku=$rowcekhargan['no'];
						$sqlhargan = "UPDATE jualdtl set diskon='$hargan[$j]',hargaakhir='$hargan[$j]',total='$total1' where no='$nomerku'";
						$queryhargan = mysqli_query($conn, $sqlhargan);
						$sqlharganstat = "UPDATE jual set status='$status', grand_total='$total2' where noso='$id'";
						$queryharganstat = mysqli_query($conn, $sqlharganstat);
						$j=$j+1;
						$sel = $conn->query("SELECT * FROM login WHERE role = 'supervisor' AND cabang = '$cabang' AND divisi2 = '$divisi2'");
						while($row = mysqli_fetch_assoc($sel)){
							echo $row['username'];
							$sel2 = $conn->query("SELECT * FROM customer WHERE username = '".$row['username']."'");
								while($row2 = mysqli_fetch_assoc($sel2)){
									$telp = $row2['telp'];
									echo 'anjay';
								?>
								<script type="text/javascript">window.location.assign('https://wa.me/<?=$telp?>?text=Please%20approve%20immedietly%20on%20<?=urlencode('http://localhost/ventura2erp/index.php?approval=true&noso='.$_GET['noso'])?>');</script>;
								<?php
								}
						}
					}
					else if ($role=="supervisor")
					{
						$nomerku=$rowcekhargan['no'];
						$sqlhargan = "UPDATE jualdtl set diskon2='$hargan1[$j]',hargaakhir='$hargan1[$j]',total='$total1' where no='$nomerku'";
						$queryhargan = mysqli_query($conn, $sqlhargan);
						$sqlharganstat = "UPDATE jual set status='$status', grand_total='$total2'  where noso='$id'";
						$queryharganstat = mysqli_query($conn, $sqlharganstat);
						$j=$j+1;
						$sel = $conn->query("SELECT * FROM login WHERE role = 'manager' AND cabang = '$cabang' AND divisi2 = '$divisi2'");
						while($row = mysqli_fetch_assoc($sel)){
							echo $row['username'];
							$sel2 = $conn->query("SELECT * FROM customer WHERE username = '".$row['username']."'");
								while($row2 = mysqli_fetch_assoc($sel2)){
									$telp = $row2['telp'];
									echo 'anjay';
								?>
								<script type="text/javascript">window.location.assign('https://wa.me/<?=$telp?>?text=Please%20approve%20immedietly%20on%20<?=urlencode('http://localhost/ventura2erp/index.php?approval=true&noso='.$_GET['noso'])?>');</script>;
								<?php
								}
						}
					}
					else if ($role=="manager")
					{
						$nomerku=$rowcekhargan['no'];
						$sqlhargan = "UPDATE jualdtl set diskon3='$hargan2[$j]',hargaakhir='$hargan2[$j]',total='$total1' where no='$nomerku'";
						$queryhargan = mysqli_query($conn, $sqlhargan);
						$sqlharganstat = "UPDATE jual set status='$status', grand_total='$total2'  where noso='$id'";
						$queryharganstat = mysqli_query($conn, $sqlharganstat);
						$j=$j+1;
						$sel = $conn->query("SELECT * FROM login WHERE role = 'director' AND cabang = '$cabang' AND divisi2 = '$divisi2'");
						while($row = mysqli_fetch_assoc($sel)){
							echo $row['username'];
							$sel2 = $conn->query("SELECT * FROM customer WHERE username = '".$row['username']."'");
								while($row2 = mysqli_fetch_assoc($sel2)){
									$telp = $row2['telp'];
									echo 'anjay';
								?>
								<script type="text/javascript">window.location.assign('https://wa.me/<?=$telp?>?text=Please%20approve%20immedietly%20on%20<?=urlencode('http://localhostventura2erp/index.php?approval=true&noso='.$_GET['noso'])?>');</script>;
								<?php
								}
						}
					}
					else if ($role=="director")
					{
						$nomerku=$rowcekhargan['no'];
						$sqlhargan = "UPDATE jualdtl set diskon4='$hargan3[$j]',hargaakhir='$hargan3[$j]',total='$total1' where no='$nomerku'";
						$queryhargan = mysqli_query($conn, $sqlhargan);
						$sqlharganstat = "UPDATE jual set status='$status', grand_total='$total2'  where noso='$id'";
						$queryharganstat = mysqli_query($conn, $sqlharganstat);
						$j=$j+1;
						$sel = $conn->query("SELECT * FROM login WHERE role = 'manager' AND cabang = '$cabang' AND divisi2 = '$divisi2'");
						
					}

				}

					if( $queryhargan )
					{
				      	//header('Location: solist.php?status=sukses');
				  	}
					else
					{
						//header('Location: solist.php?status=gagal');
				  	}
	}



if(isset( $_POST['daftar']))
	{
		$status = "CLOSED	";
		if($hargan3 == null){
		$user=$_SESSION["username"];



		$sqlku11 = "SELECT * FROM login where email='$user'";
		$queryku11 = mysqli_query($conn, $sqlku11);
		 while($amku11 = mysqli_fetch_array($queryku11)){
			 $divisiku=$amku11['divisi2'];
			 $role=$amku11['role'];

		 }

		$id=$_POST['id1'];
		$hargan=$_POST['hargan'];
		$hargan1=$_POST['hargan1'];
		$hargan2=$_POST['hargan2'];
		$hargan3=$_POST['hargan3'];

		$nomer=$_POST['nomer'];
		$j=0;
		$sqlcekhargan = "SELECT * from jualdtl where noso='$id'";
		$querycekhargan = mysqli_query($conn, $sqlcekhargan);
$total1=0;
$total2=0;
		while($rowcekhargan = mysqli_fetch_array($querycekhargan))
					{
						$hargaakhir1=$rowcekhargan['hargaakhir'];
						$jumlah1=$rowcekhargan['jumlah'];
						$total1=$hargaakhir1*$jumlah1;
						$total2=$total2+$total1;
						if ($role=="admin")
						{

						$nomerku=$rowcekhargan['no'];

						$sqlhargan = "UPDATE jualdtl set diskon='$hargan[$j]',hargaakhir='$hargan[$j]',total='$total1' where no='$nomerku'";
						$queryhargan = mysqli_query($conn, $sqlhargan);
						$sqlharganstat = "UPDATE jual set status='$status', grand_total='$total2' where noso='$id'";
						$queryharganstat = mysqli_query($conn, $sqlharganstat);

						$j=$j+1;
					}
					else if ($role=="supervisor")
					{
						$nomerku=$rowcekhargan['no'];
						$sqlhargan = "UPDATE jualdtl set diskon2='$hargan1[$j]',hargaakhir='$hargan1[$j]',total='$total1' where no='$nomerku'";
						$queryhargan = mysqli_query($conn, $sqlhargan);
						$sqlharganstat = "UPDATE jual set status='$status', grand_total='$total2'  where noso='$id'";
						$queryharganstat = mysqli_query($conn, $sqlharganstat);
						$j=$j+1;
					}
					else if ($role=="manager")
					{
						$nomerku=$rowcekhargan['no'];
						$sqlhargan = "UPDATE jualdtl set diskon3='$hargan2[$j]',hargaakhir='$hargan2[$j]',total='$total1' where no='$nomerku'";
						$queryhargan = mysqli_query($conn, $sqlhargan);
						$sqlharganstat = "UPDATE jual set status='$status', grand_total='$total2'  where noso='$id'";
						$queryharganstat = mysqli_query($conn, $sqlharganstat);
						$j=$j+1;
					}
					else if ($role=="director")
					{
						$nomerku=$rowcekhargan['no'];
						$sqlhargan = "UPDATE jualdtl set diskon4='$hargan3[$j]',hargaakhir='$hargan3[$j]',total='$total1' where no='$nomerku'";
						$queryhargan = mysqli_query($conn, $sqlhargan);
						$sqlharganstat = "UPDATE jual set status='$status', grand_total='$total2'  where noso='$id'";
						$queryharganstat = mysqli_query($conn, $sqlharganstat);
						$j=$j+1;
					}

				}

					if( $queryhargan )
					{
				      	header('Location: solist.php?status=sukses');
				  	}
					else
					{
						header('Location: solist.php?status=gagal');
					  }
					}
	
					$res = $conn->query("UPDATE jual SET status = 'CLOSED' where noso = ".$id);
					if($res == true){
						echo "ASHIAP";
					}
$user=$_SESSION["username"];
	if(!empty($_POST['pil1'])){
			$tglu=$_POST['tglu'];
			$id=$_POST['id1'];
			$kodet=$_POST['kodet'];
			$tgl=$_POST['tgl'];
			$qty=$_POST['qty'];
			$nomer=$_POST['nomer'];
			$harga=$_POST['harga'];
			$total=$_POST['total'];
			$status=$_POST['status'];
			$sqlcekid2 = "SELECT cart_id from inv order by cart_id DESC LIMIT 1";
			$querycekid2 = mysqli_query($conn, $sqlcekid2);
			$hasil=mysqli_num_rows($querycekid2);

		 if ($hasil==0)
		 {
				 $noakhir2=1;
				 $d=substr($tglu,0,2);
				 $m=substr($tglu,3,2);
				 $y=substr($tglu,6,2);
				 // $invno="INV"."/"."SBYRTL"."/".$noakhir2."/".$id."/".$d.$m.$y;
					$invno="INV"."/"."SBYRTL"."/".$noakhir2."/".$id."/".$d.$m.$y;
				 $dono="DO"."/"."SBYRTL"."/".$noakhir2."/"."INV".$noakhir2."/".$id."/".$d.$m.$y;
				 // $invno="INV"."/".$tglu."/"."SBY-RTL"."/".$noakhir2;

				 $sql5 = "INSERT INTO inv(tgl,cart_id,noinv,noso,sales,user_id)  VALUES ('$tglu','$noakhir2','$invno','$id','$user','$cid')";
				 $query5 = mysqli_query($conn, $sql5);
				 $sql51 = "INSERT INTO do(tgl,cart_id,nodo,noinv)  VALUES ('$tglu','$noakhir2','$dono','$invno')";
				$query51= mysqli_query($conn, $sql51);
		 }
		 else {
					$noakhir2=$rowcekid2["cart_id"]+1;
					$sql5 = "UPDATE inv SET tgl='$tglu',noso='$id',userid='$cid' where tgl='$tglu' and noso='$id'";
					$query5 = mysqli_query($conn, $sql5);
					$sql51 = "UPDATE do SET tgl='$tglu',nodo='$dono' where tgl='$tglu' and noso='$id'";
					$query51 = mysqli_query($conn, $sql5);
	}

	$sqlcekid = "SELECT * from invdtl";
	$querycekid = mysqli_query($conn, $sqlcekid);
	$rowcekjum=mysqli_num_rows($querycekid);
	if($rowcekjum==0)
	{
	$noakhir1=0;
	}
 else {
	$sqlcekid1 = "SELECT noq from invdtl order by noq DESC LIMIT 1";
	$querycekid1 = mysqli_query($conn, $sqlcekid1);
		while($rowcekid1 = mysqli_fetch_array($querycekid1)) {
			$noakhir1=$rowcekid1["noq"];
				 }

		 }
		 $sqlcekid2= "SELECT * from jualdtl where noso='$id'";
 	 $querycekid2 = mysqli_query($conn, $sqlcekid2);
 	 $cekq=mysqli_num_rows($querycekid2);
	 while($rowcekid2 = mysqli_fetch_array($querycekid2))
 				 {
	$noakhir1=$noakhir1+1;
  $sql6 = "INSERT INTO invdtl(noq,noso,noinv,tgl,kode_stok,jumlah,harga,total)  VALUES ('$noakhir1','$id','$invno','$tglu','$kodet','$qty','$harga','$total')";
  $query6 = mysqli_query($conn, $sql6);
	$noakhir1=$noakhir1+1;
  $sql61 = "INSERT INTO dodtl(nodo,noinv,no_cart,kode_stok,jumlah)  VALUES ('$dono','$invno','$noakhir1','$kodet','$qty')";
  $query61 = mysqli_query($conn, $sql61);
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

			$sqlcekid2= "SELECT * from jualdtl where noso='$id'";
		 $querycekid2 = mysqli_query($conn, $sqlcekid2);
		 $cekq=mysqli_num_rows($querycekid2);



					 for ($i=0;$i<$cekq;$i++)
					 {
						 $sqlcekid2 = "SELECT cart_id from inv order by cart_id DESC LIMIT 1";
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
						 $sqlcekid = "SELECT * from invdtl";
						 $querycekid = mysqli_query($conn, $sqlcekid);
						 $rowcekjum=mysqli_num_rows($querycekid);
						 if($rowcekjum==0)
						 {
						 $noakhir1=0;
						 }
			 			else {
			 			 $sqlcekid1 = "SELECT noq from invdtl order by noq DESC LIMIT 1";
			 			 $querycekid1 = mysqli_query($conn, $sqlcekid1);
			 				 while($rowcekid1 = mysqli_fetch_array($querycekid1)) {
			 					 $noakhir1=$rowcekid1["noq"];
			 				 			}

			 		 			}

			 $sqlcektgl = "SELECT * from inv where tgl='$tgl[$i]' and noso = '$id'";
			 $querycektgl = mysqli_query($conn, $sqlcektgl);
			 $rowcektgl=mysqli_num_rows($querycektgl);

				if($rowcektgl==0)
				{
					$d=substr($tgl[$i],2,2);
				  $m=substr($tgl[$i],5,2);
				  $y=substr($tgl[$i],8,2);
				  // $invno="INV"."/"."SBYRTL"."/".$noakhir2."/".$id."/".$d.$m.$y;
					$invno="INV"."/"."SBYRTL"."/".$noakhir2."/".$id."/".$d.$m.$y;
				  $dono="DO"."/"."SBYRTL"."/".$noakhir2."/"."INV".$noakhir2."/".$id."/".$d.$m.$y;
			 		$sql5 = "INSERT INTO inv(tgl,cart_id,noinv,noso,sales,user_id)  VALUES ('$tgl[$i]','$noakhir2','$invno','$id','$user','$cid')";
					$query5 = mysqli_query($conn, $sql5);
					$sql51 = "INSERT INTO do(tgl,cart_id,nodo,noinv)  VALUES ('$tgl[$i]','$noakhir2','$dono','$invno')";
				 $query51= mysqli_query($conn, $sql51);

				}
				else {
					$sql5 = "UPDATE inv SET tgl='$tgl[$i]',noso='$id',userid='$cid' where tgl='$tgl[$i]' and noso='$id'";
				$query5 = mysqli_query($conn, $sql5);
				$sql51 = "UPDATE do SET tgl='$tgl[$i]',nodo='$dono' where tgl='$tgl[$i]' and noso='$id'";
				$query51 = mysqli_query($conn, $sql5);
				}



						 $noakhir1=$noakhir1+1;
						 $sql6 = "INSERT INTO invdtl(noq,noso,noinv,tgl,kode_stok,jumlah,harga,total)  VALUES ('$noakhir1','$id','$invno','$tgl[$i]','$kodet[$i]','$qty[$i]','$harga[$i]','$total[$i]')";
						 $query6 = mysqli_query($conn, $sql6);
						 $sql61 = "INSERT INTO dodtl(nodo,noinv,no_cart,kode_stok,jumlah)  VALUES ('$dono','$invno','$noakhir1','$kodet[$i]','$qty[$i]')";
						 $query61 = mysqli_query($conn, $sql61);
					 }

}

					 	}
				//header('Location: solist.php?status=sukses');




?>





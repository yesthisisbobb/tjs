<?php
include '../../config.php';

if(isset( $_POST['daftar']))
	{
		$id = $_POST['id'];
		$idrev=$_POST['idrev'];
		$kodestok=$_POST['kodestok'];
		$shading=$_POST['shading'];
		$jum = $_POST['jum'];
		$harga = $_POST['harga'];
		$dis1 = $_POST['dis1'];
		$dis2 = $_POST['dis2'];
		$nolagi=$_POST['nolagi'];
		$total=$_POST['total'];
		$jumrec=$_POST['jumrec'];




		$ggtotal=0;
		for($i=0;$i<$jumrec;$i++)
		{

		$diss1[$i]=$dis1[$i]/100;
		$diss2[$i]=$dis2[$i]/100;
		$totale[$i]=$jum[$i]*$harga[$i];

	 	$total1[$i]=$totale[$i]*(1-$diss1[$i]);
		$total2[$i]=$total1[$i]*(1-$diss2[$i]);

		$gtotal[$i]=$total2[$i];
		$ggtotal=$ggtotal+$gtotal[$i];
		$sql1 = "INSERT INTO revdtlq(norev,nourut,no_cart,kodestok,shading,jumlah,harga,dis1,dis2,total)  VALUES
		('$idrev', '$nolagi[$i]','$id','$kodestok[$i]','$shading[$i]','$jum[$i]','$harga[$i]','$dis1[$i]','$dis2[$i]','$gtotal[$i]')";
		$query1 = mysqli_query($conn, $sql1);
	 }
	 $sql = "INSERT INTO revq(norev, no_cart,total)  VALUES ('$idrev', '$id','$ggtotal')";
	 $query = mysqli_query($conn, $sql);
			if($query1)
		{
					header('Location: quotationlist.php?status=sukses');
			}
		else
		{
				header('Location: quotationlist.php?status=gagal');
			}

}
else {
	if(isset( $_POST['daftar1']))
		{
			$id = $_POST['id'];
			$idrev=$_POST['daftar1'];

			$sql2="UPDATE revq SET status='close' where no_cart='$id' and norev='$idrev'";
			$query2 = mysqli_query($conn, $sql2);

if($query2)
{
		header('Location: quotationlist.php?status=sukses');
}
else
{
	header('Location: quotationlist.php?status=gagal');
}
}}

?>

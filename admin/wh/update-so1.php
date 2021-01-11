<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
			$dis= $_POST['dis'];
			$qq1=$_POST['qq'];
			$sono=$_POST['sono1'];
			$j=0;
			$sql1 = "SELECT * FROM jualdtl where no_cart='$sono'";
					 $query1 = mysqli_query($conn, $sql1);
					 while($amku1 = mysqli_fetch_array($query1)){
						 	$j=$j+1;
					 }

for($x=0;$x<$j;$x++){
	$sql = "UPDATE jualdtl set diskon='$dis[$x]' where no_cart='$sono' and no='$qq1[$x]'";
	$query = mysqli_query($conn, $sql);
}


    	if( $query )
		{
        	header('Location: so_in.php?status=sukses');
    	}
		else
		{
			header('Location: so_in.php?status=gagal');
    	}

	}
	else
	{
    die("Access Denied...");
	}

?>

<?php
include '../config.php';
if(isset( $_POST['daftar']))
		{
			$nomer = $_POST['noin'];
			$tot = $_POST['tot'];
			$del= $_POST['del'];
			$other = $_POST['other'];
			$vat1= $_POST['vat1'];
			$grand = $_POST['grand'];
			$paid = $_POST['paid'];
			$change = $_POST['change'];
			$delby=$_POST['delby'];

				$sql = "UPDATE inv SET total='$tot', del='$del', other='$other', vat='$vat1', grand_total='$grand',
				bayar='$paid', kembali='$change', status_payment='PAID' where noinv='$nomer'";
			  $query = mysqli_query($conn, $sql);
				$sql1 = "UPDATE do SET status1='$delby' where noinv='$nomer'";
			  $query1 = mysqli_query($conn, $sql1);
	    	if( $query )
			{
				?>
				 <script>
				 alert("You have successfully update data");
				 window.location.href = "invlistdtl3.php?status=paid&no=<?php echo $nomer; ?>";
			 </script>
		<?php
	    	}
			else
			{
				header('Location: ../admin/salesku/solist.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>

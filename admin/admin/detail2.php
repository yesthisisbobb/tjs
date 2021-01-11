<?php
session_start();
include '../../config.php';
include("../../header.php");
include("../../proses.php");
?>
<?php
  function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
<div class="container">
<?php
if($_POST['rowid'])
	{

		$id = $_POST['rowid'];

    $sql = "SELECT * FROM do where nodo='$id'";
    $query = mysqli_query($conn, $sql);

    while($amku = mysqli_fetch_array($query)){
        $no=$amku['no'];
				$tgl=$amku['tgl'];
				$pono=$amku['nodo'];

				$grandtotal1=$amku['grand_total'];
				$status=$amku['status'];
				$statusp=$amku['status_payment'];

				$bayar=$amku['bayar'];
				$kembali=$amku['kembali'];
    ?>
		<form action="update-po.php" method="post">
<div class="row">
		<div class="form-group">
		<div class="col-sm-10">
		<input type="hidden" class="form-control" name="id"  value="<?php echo $no; ?>">
	</div>
</div>
<div class="container">
<div class="form-group">
	<label class="col-sm-2 control-label">Date</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="tgl" id="tgl"  value="<?php echo $tgl; ?>">
</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">DO No.</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="sono" id="sono"  value="<?php echo $pono; ?>">
</div>
</div>

</div>


</div>
      <?php } }?>
			<br>
	<form action="update-so.php" method="post">

		<input type="hidden" class="form-control" name="sono1" id="sono1"  value="<?php echo $sono; ?>">
<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No.SO</th><th>Type Code</th><th>Qty</th>
					</tr>
				</thead>
<tbody>
			<?php
			$sql1 = "SELECT * FROM dodtl where nodo='$pono'";
			$query1 = mysqli_query($conn, $sql1);
			$t=0;
			$gt=0;
			$totalbot=0;
			while($amku1 = mysqli_fetch_array($query1)){
				  $noso=$amku1['no_cart'];
					$kode=$amku1['kode_stok'];
					$jumlah=$amku1['jumlah'];

					$gt=$gt+$jumlah;
			?>

			<tr>
				<td><?php echo $noso; ?></td>
				<td><?php echo $kode; ?></td>
				<td><?php echo $jumlah; ?></td>

			</tr>

		<?php } ?>

</tbody>
<tfooter>
	<tr>
		<td></td><td>Grand Total</td><td><?php echo $gt; ?></td>
	</tr>
</tfooter>
	</table>

	<!--  -->
	<button type="submit" name="daftar2" value="daftar2" class="btn btn-default">Print DO</button>


</form>
</div>
</div>

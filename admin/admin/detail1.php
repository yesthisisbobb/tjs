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

    $sql = "SELECT * FROM masterpo where nopo='$id'";
    $query = mysqli_query($conn, $sql);

    while($amku = mysqli_fetch_array($query)){
        $no=$amku['no'];
				$tgl=$amku['tgl'];
				$pono=$amku['nopo'];
				$dist=$amku['dist'];
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
	<label class="col-sm-2 control-label">PO No.</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="sono" id="sono"  value="<?php echo $pono; ?>">
</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Vendor</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="dist" id="dist"  value="<?php echo $dist; ?>">
</div>
</div></div>


</div>
      <?php } }?>
			<br>
	<form action="update-so.php" method="post">

		<input type="hidden" class="form-control" name="sono1" id="sono1"  value="<?php echo $sono; ?>">
<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No.SO</th><th>Type Code</th><th>Qty</th><th>Price</th><th>Total</th>
					</tr>
				</thead>
<tbody>
			<?php
			$sql1 = "SELECT * FROM podtl where nopo='$pono'";
			$query1 = mysqli_query($conn, $sql1);
			$t=0;
			$gt=0;
			$totalbot=0;
			while($amku1 = mysqli_fetch_array($query1)){
				  $noso=$amku1['noso'];
					$kode=$amku1['kode'];
          $sqltipe = "SELECT * FROM master_stok where kode_stok='$kode'";
          $querytipe = mysqli_query($conn, $sqltipe);
          while($amkutipe = mysqli_fetch_array($querytipe)){
            $kodetipeku=$amkutipe['kodeitem_stok'];
          }

					$jumlah=$amku1['jumlah'];
					$harga=$amku1['harga'];
					$total=$amku1['jumlah']*$amku1['harga'];

					$gt=$gt+$total;
			?>

			<tr>
				<td><?php echo $noso; ?></td>
				<td><?php echo $kodetipeku; ?></td>
				<td><?php echo $jumlah; ?></td>
				<td><?php echo rupiah($harga); ?></td>
				<td><?php echo rupiah($total); ?></td>

			</tr>

		<?php } ?>

</tbody>
<tfooter>
	<tr>
		<td></td><td></td><td></td><td>Grand Total</td><td><?php echo rupiah($gt); ?></td>
	</tr>
</tfooter>
	</table>

	<select class="form-control" name="status" id="status">
		<option><?php echo $status; ?></option>
		<option>Open</option>
		<option>Close</option>
	</select>
	<button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Save & Print</button>


</form>
</div>
</div>

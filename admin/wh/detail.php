<?php
session_start();
include("../../config.php");
include("../../header.php");
include("../../proses.php");
?>

<div class="container">

<?php
if($_POST['rowid'])
	{

		$id = $_POST['rowid'];

    $sql = "SELECT * FROM do where nodo='$id'";
    $query = mysqli_query($conn, $sql);

    while($amku = mysqli_fetch_array($query)){
        $no=$amku['nodo'];
				$sono=$amku['cart_id'];
				$sales=$amku['sales'];
				$status=$amku['status'];
    ?>
		<div class="row">
			<div class="col-sm-10">
			<input type="hidden" class="form-control" name="id"  value="<?php echo $no; ?>">
			</div>
		</div>

<div class="row">
	<div class="col-sm-8">
		DO No.
	</div>
<div class="col-sm-8">
<input type="text" class="form-control" name="dono" id="dono"  value="<?php echo $no; ?>">
</div>
</div><br>

<div class="row">
	<div class="col-sm-8">
		SO No.
	</div>
<div class="col-sm-8">
<input type="text" class="form-control" name="sono" id="sono"  value="<?php echo $sono; ?>">
</div>
</div>
</div>
      <?php } }?>
			<br>
	<form action="update-do.php" method="post">
		<div class="container">
		<div class="row">
			<div class="col-sm-8">
				Date
			</div>
		<div class="col-sm-8">
		<input type="date" class="form-control" name="tgl" id="tgl">
		</div>
		</div>
	</div><br>

		<input type="hidden" class="form-control" name="dono1" id="dono1"  value="<?php echo $no; ?>">
<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Type Code</th><th>Qty</th>
					</tr>
				</thead>
<tbody>
			<?php
			$sql1 = "SELECT * FROM dodtl where nodo='$no'";
			$query1 = mysqli_query($conn, $sql1);
			$t=0;
			$gt=0;
			$totalbot=0;
			while($amku1 = mysqli_fetch_array($query1)){

					$kodestok=$amku1['kode_stok'];
					$jumlah=$amku1['jumlah'];
			?>

			<tr>
				<td><?php echo $kodestok; ?></td>
				<td><?php echo $jumlah; ?></td>
			</tr>

		<?php } ?>

</tbody>
<tfooter>


</tfooter>
	</table>

	<select class="form-control" name="status" id="status">
		<option><?php echo $status; ?></option>
		<option>OPEN</option>
		<option>CLOSE</option>
	</select>
	<button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button>


</form>
</div>
</div>

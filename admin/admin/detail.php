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
    // echo $id;
    $sql = "SELECT * FROM jual where no='$id'";
    $query = mysqli_query($conn, $sql);

    while($amku = mysqli_fetch_array($query)){
        $no=$amku['no'];
				$tgl=$amku['tgl'];
        $tglkirim=$amku['tglkirim'];
				$sono=$amku['cart_id'];
				$disitem=$amku['dis'];
				$grandtotal1=$amku['grand_total'];
				$status=$amku['status'];
				$statusp=$amku['status_payment'];

				$bayar=$amku['bayar'];
				$kembali=$amku['kembali'];
    ?>
    <form action="update-so.php" method="post">
<div class="row">
		<div class="form-group">
		<div class="col-sm-10">
		<input type="hidden" class="form-control" name="id"  value="<?php echo $no; ?>">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">SO Date</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="tgl" id="tgl"  value="<?php echo $tgl; ?>">
</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">SO No.</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="sono" id="sono"  value="<?php echo $sono; ?>">
</div>
</div>
<div class="form-group">
  <div class="col-sm-10">
  <label class="col-sm-2 control-label ml-12">Delivery</label>
  <input type="date" class="form-control" name="tglkirim" id="tglkirim">
</div>
</div>



</div>
      <?php } }?>
			<br>


		<input type="hidden" class="form-control" name="sono1" id="sono1"  value="<?php echo $sono; ?>">
<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#Q</th><th>Type Code</th><th>Qty</th><th>Unit Price</th><th>Total</th>
					</tr>
				</thead>
<tbody>
			<?php
			$sql1 = "SELECT * FROM jualdtl where no_cart='$sono'";
			$query1 = mysqli_query($conn, $sql1);
			$t=0;
			$gt=0;
			$totalbot=0;
			while($amku1 = mysqli_fetch_array($query1)){
				  $no1=$amku1['no'];
					$kodestok=$amku1['kode_stok'];
            $sqltipe = "SELECT * FROM master_stok where kode_stok='$kodestok'";
            $querytipe = mysqli_query($conn, $sqltipe);
            while($amkutipe = mysqli_fetch_array($querytipe)){
              $kodetipeku=$amkutipe['kodeitem_stok'];
            }

					$jumlah=$amku1['jumlah'];
					$harga=$amku1['harga'];
					$total=$amku1['total'];
					$t=$t+1;
					$gt=$gt+$total;
						$sqlbot = "SELECT * FROM master_price where kodestok='$kodestok'";
				 		$querybot = mysqli_query($conn, $sqlbot);

				 	while($ambot = mysqli_fetch_array($querybot)){
							$bp=$ambot['bp'];
							$bot=$ambot["bp"]*$jumlah;
							$totalbot=$totalbot+$bot;
							$cogsp=$ambot['cogsp'];
							$totcogsp=$ambot['cogsp']*$jumlah;
							$sc=$ambot['bunga1'];
							$totsc=$ambot['bunga1']*$jumlah;
							$sc1=$ambot['sc'];
							$totsc1=$ambot['sc']*$jumlah;
							$mc=$ambot['mc'];
							$totmc=$ambot['mc']*$jumlah;
							$fc=$ambot['fcost1'];
							$totfc=$ambot['fcost1']*$jumlah;
							$profit=$grandtotal1-$totcogsp-$totsc-$totsc1-$totmc-$totfc;
							$persen=($profit/$gt)*100;

					}
			?>

			<tr>
				<td><input size="3" type="text" readonly name="qq[]" value="<?php echo $no1; ?>"></td>
				<td><input size="50" type="text" readonly name="kode[]" value="<?php echo $kodestok; ?>"></td>
				<td><input size="3" type="text" readonly name="jum[]" value="<?php echo $jumlah; ?>"></td>
				<td><input size="15" type="text" readonly name="harga[]" value="<?php echo $harga; ?>"></td></td>
				<!-- <td><input type="text" name="dis[]" id="dis[]" onchange="hitung(this.value)"></td> -->
				<td><input size="15" type="text" name="total[]" id="total[]" value="<?php echo $total; ?>"></td>
			</tr>
			<script>

			function hitung(a) {
				document.getElementById("total[]").value = a;
			}
			</script>
		<?php } ?>

</tbody>
<tfooter>
	<tr>
		<?php
			if ($pengguna["role"]=="manager")
		{
		?>
		<td></td><td></td>
		</td><td></td><td>Total</td><td><input size="15" type="text" readonly id="gt" value="<?php echo $gt; ?>"></td>
	<?php } else if($pengguna["role"]=="admin1") { ?>

		<td></td><td>Payment Method <select class="form-control"><option>Cash</option><option>Down Payment</option><option>BG</option><option>Regular</option>
    <option>SCF</option><option>SKBDN</option></select></td><td></td><td>Total</td><td><input size="15" type="text" readonly id="gt" value="<?php echo $gt; ?>"></td>
	<?php }?>
	</tr>
	<?php
	  if ($pengguna["role"]=="manager")
	{
	?>
	<tr>
		<td></td><td></td><td></td><td>Disc</td><td><input size="15" id="dis1" name="dis1" type="text" value="<?php echo $disitem; ?>"></td>
	</tr>
	<tr>
		<td></td><td></td><td></td><td>Grand Total</td><td><input size="15" id="grand" name="grand" onfocus="hitung()" type="text"  value="<?php echo $grandtotal1; ?>"></td>
	</tr>
	<tr>
		<td></td><td><b>BOTTOM PRICE <input type="hidden"  id="bott" name="bott" value="<?php echo $totalbot; ?>"></b></td><td></td><td><?php echo rupiah($bp); ?></td><td><?php echo rupiah($totalbot); ?></td>
	</tr>
	<tr>
		<td></td><td><b>Sales Commision <input type="hidden"  id="sc" name="sc" value="<?php echo $totsc; ?>"></b></td><td></td><td><?php echo rupiah($sc); ?></td><td><?php echo rupiah($totsc); ?></td>
	</tr>
	<tr>
		<td></td><td><b>Showroom Cost<input type="hidden"  id="sc1" name="sc1" value="<?php echo $totsc1; ?>"></b></td><td></td><td><?php echo rupiah($sc1); ?></td><td><?php echo rupiah($totsc1); ?></td>
	</tr>
	<tr>
		<td></td><td><b>Marketing Cost<input type="hidden"  id="mc" name="mc" value="<?php echo $totmc; ?>"></b></td><td></td><td><?php echo rupiah($mc); ?></td><td><?php echo rupiah($totmc); ?></td>
	</tr>
	<tr>
		<td></td><td><b>Fix Cost<input type="hidden"  id="fc" name="fc" value="<?php echo $totfc; ?>"></b></td><td></td><td><?php echo rupiah($fc); ?></td><td><?php echo rupiah($totfc); ?></td>
	</tr>
	<tr>
		<td></td><td><b>COGS<input type="hidden"  id="cogsp" name="cogsp" value="<?php echo $totcogsp; ?>"></b></td><td></td><td><?php echo rupiah($cogsp); ?></td><td><?php echo rupiah($totcogsp); ?></td>
	</tr>
   <tr  style="color:red;">
		<td></td><td><b>Gross Profit<input type="hidden"  id="gprofit" name="gprofit" value="<?php echo $profit; ?>"></b></td><td></td><td></td><td><?php echo rupiah($profit); ?>(<?php echo round($persen); ?>%)</td>
	</tr>

<?php } else if ($pengguna["role"]=="admin1") {?>
	<tr>
		<td></td><td>Term of Payment <select class="form-control"><option>7</option><option>14 </option><option>21 </option><option>21 </option>
    <option>30 </option><option>45 </option><option>60 </option><option>90 </option><option>120 </option><option>180 </option></select> Day</td><td></td><td>Disc</td><td><input readonly size="15" id="dis1" name="dis1" type="text"  value="<?php echo $disitem; ?>"></td>
	</tr>
	<tr>
		<td></td><td>Down Payment <select class="form-control"><option>0</option><option>10</option><option>20</option><option>30</option><option>50</option></select> %</td><td></td><td>Grand Total</td><td><input size="15" id="grand" name="grand" onfocus="hitung()" type="text"  value="<?php echo $grandtotal1; ?>"></td>
	</tr>
	<tr>
			<td></td><td></td><td></td><td>Payment</td><td><input size="15" name="payment" id="payment" type="text" value="<?php echo $bayar; ?>"></td>
		</tr>
		<tr>
				<td></td><td></td><td></td><td>Change</td><td><input size="15" id="kembali" name="kembali" onfocus="bayar()" type="text" value="<?php echo $kembali; ?>"></td>
			</tr>
	<?php }
?>

</tfooter>
<script>
	function hitung()
	{

		document.getElementById("grand").value=document.getElementById("gt").value-document.getElementById("dis1").value;
		// if (document.getElementById("grand").value <= document.getElementById("gran1").value)
		// {
		//
		// }
}
function bayar()
{

	document.getElementById("kembali").value=document.getElementById("payment").value-document.getElementById("grand").value;
	// if (document.getElementById("grand").value <= document.getElementById("gran1").value)
	// {
	//
	// }
}
</script>
	</table>

<hr>

	<select class="form-control" name="status" id="status">
		<option>--Close--</option>
		<option>Open</option>
		<option>Close</option>
	</select>
	<select class="form-control" name="statusp" id="statusp">
		<option><?php echo $statusp; ?></option>
		<option>Paid</option>
		<option>Unpaid</option>
	</select>


	<?php
	  if ($pengguna["role"]=="manager")
	{?>
	  <button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button>
	<?php } else if ($pengguna["role"]=="admin1")
	{
	?>
	<button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Save & Print</button>
<?php } ?>

</form>
</div>
</div>

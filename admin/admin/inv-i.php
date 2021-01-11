
<?php
  session_start();
  include("../../config.php");
  include("../../proses.php");
  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
      return false;
  }
  if($_SESSION["level"] != "admin"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../'.$_SESSION["level"].'/";
             </script>';
        return false;
  }
?>
<?php
  include("../../header.php");
?>
<?php
  function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
<!DOCTYPE html>
<body>
<!-- begin #page-loader -->

    <!-- end #page-loader -->
    <!-- begin #page-container -->
    <br>
<div class="container">


        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="so_in.php">Home</a></li>
          <li class="breadcrumb-item active">SO Indent</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <?php
        $nomer=$_GET['no'];
         ?>
        <h1 class="page-header">SO Indent no.<?php echo $nomer; ?></h1>

	    <!-- end page-header -->
      <table class="table table-striped">
        <thead>
          <tr>
            <!-- <th width="1%">No</th> -->
              <th class="text-nowrap">No</th>
            <th class="text-nowrap">Type Code</th>
            <th class="text-nowrap">Qty</th>
            <th class="text-nowrap">Price</th>
              <th class="text-nowrap">Total Purchase</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $un=$pengguna["username"];
          $sql1 = "SELECT * FROM login where username='$un'";
             $query1 = mysqli_query($conn, $sql1);
              while($amku1 = mysqli_fetch_array($query1)){
                $idsales=$amku1['id'];
              }


           ?>
          <?php
          $no=0;
              $sql = "SELECT * FROM ijualdtl where no_cart='$nomer'";
                 $query = mysqli_query($conn, $sql);

                 while($amku = mysqli_fetch_array($query)){
                   $cartidku=$amku['cart_id'];
                   $noku=$amku['no'];
                   $no=$no+1;
                   $kstok=$amku['kode_stok'];
                   $sqls = "SELECT * FROM master_stok where kode_stok='$kstok'";
                      $querys = mysqli_query($conn, $sqls);
                      while($amkus = mysqli_fetch_array($querys)){
                        $kodetipe=$amkus['kodeitem_stok'];
                      }


            ?>

          <tr class="odd gradeX">

            <td><?=$no; ?></td>
            <td><?=$kodetipe;?></td>
            <td><?=$amku["jumlah"];?></td>
            <td><?=rupiah($amku["harga"]);?></td>
            <td><?=rupiah($amku["total"]);?></td>

                </td>
         <?php } ?>
          </tr>
        </tbody>
        <?php
            $sql1 = "SELECT * FROM ijual where cart_id='$nomer'";
               $query1 = mysqli_query($conn, $sql1);
               while($amku1 = mysqli_fetch_array($query1)){
                  $totalku=$amku1['total'];
                  $disku=$amku1['dis'];
                  $gtku=$amku1['grand_total'];
                  $bayarku=$amku1['bayar'];
                  $kembaliku=$amku1['kembali'];
                }
          ?>
        <tfooter>
        	<tr>

        		<td></td><td></td><td></td><td>Total</td><td><?php echo rupiah($gtku); ?></td>

        	</tr>

        	<tr>
        		<td></td><td></td><td></td><td>Disc</td><td><?php echo rupiah($disku); ?></td>
        	</tr>
        	<tr>
        		<td></td><td></td><td></td><td>Grand Total</td><td><?php echo rupiah($gtku); ?></td>
        	</tr>
        	<tr>
        			<td></td><td></td><td></td><td>Down Payment</td><td><?php echo rupiah($bayarku); ?></td>
        		</tr>
        		<tr>
        			<td></td>	<td></td><td></td><td>Balance</td><td><?php echo rupiah($kembaliku); ?></td>
        			</tr>


        </tfooter>




      </table>



<?php
  include("../../footer.php");
?>
</div>
	</body>
    </html>

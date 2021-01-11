
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
<!DOCTYPE html>
<?php
  function rupiah($angka){

	$hasil_rupiah = "" . number_format($angka,0,',','.');
	return $hasil_rupiah;

}

?>
<style>
.table{
  font-size: 12px;
}
</style>
<body>
<!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
      <div class="material-loader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
        <div class="message">Loading...</div>
      </div>
    </div>
    <!-- end #page-loader -->
    <!-- begin #page-container -->
<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">
<?php
  include("../../top-menu.php");
?>
<?php
  include("../../sidenav-menu.php");
?>
      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item active">Sales Report</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Sales Report </h1>

	    <!-- end page-header -->
      <table id="data-table-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <!-- <th width="1%">No</th> -->

              <th class="text-nowrap">Date</th>


              <th class="text-nowrap">Total Order</th>
              <th class="text-nowrap">COGS</th>

              <th class="text-nowrap">Commision</th>
              <th class="text-nowrap">Showroom Cost</th>
              <th class="text-nowrap">MKT Cost</th>
              <th class="text-nowrap">Fix Cost</th>
              <th class="text-nowrap">GP</th>
              <th class="text-nowrap">%Profit</th>
              <th class="text-nowrap">Inv.No</th>
              <th class="text-nowrap">Customer</th>

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
          $total=0;
          $totcogs=0;
            $sql = "SELECT * FROM jual";
                 $query = mysqli_query($conn, $sql);
                 while($amku = mysqli_fetch_array($query)){
                   $cartidku=$amku['cart_id'];
                   $noku=$amku['no'];
                   $persen=($amku['gprofit']/$amku['grand_total'])*100;
                   $tgl=$amku['tgl'];
                   $date=date_create("$tgl");
                   $total=$total+$amku['grand_total'];
                   $totcogs=$totcogs+$amku['cogsp'];
                   $totcom=$totcom+$amku['sc'];
                   $totscom=$totscom+$amku['sc1'];
                   $totmc=$totmc+$amku['mc'];
                   $totfc=$totfc+$amku['fc'];
                   $totgp=$totgp+$amku['gprofit'];
                   $persen=($totgp/$total)*100;
                   $ggp=(($total-$totcogs)/$total)*100;
            ?>

          <tr class="odd gradeX">


            <td><?php echo date_format($date,"d/m"); ?></td>
            <td><?=rupiah($amku["grand_total"]);?></td>
            <td><?=rupiah($amku["cogsp"]);?></td>
            <td><?=rupiah($amku["sc"]);?></td>
            <td><?=rupiah($amku["sc1"]);?></td>
            <td><?=rupiah($amku["mc"]);?></td>
            <td><?=rupiah($amku["fc"]);?></td>
            <td><?=rupiah($amku["gprofit"]);?></td>
            <td><?=round($persen); ?>%</td>
            <td><?=$amku["cart_id"];?></td>
            <td><?=$amku["user_id"];?></td>



              <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                <!-- <a href="proses-merk.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-minus"></i></a>
                <a href="proses-merk.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="btn btn-success btn btn-sm" role="button"><i class="fa fa-check"></i></a>
              <a href="proses-merk.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-trash"></i></a> -->

                </td>
         <?php } ?>
          </tr>
        </tbody>
        <tfooter>
          <tr  style="color:red;">
            <td></td><td ><?php echo rupiah($total); ?></td><td><?php echo rupiah($totcogs); ?>(<?php echo round($ggp) ?>%)</td>
            <td><?php echo rupiah($totcom); ?></td><td><?php echo rupiah($totscom); ?></td><td><?php echo rupiah($totmc); ?></td>
            <td><?php echo rupiah($totfc); ?></td><td><?php echo rupiah($totgp); ?></td><td><?php echo rupiah($persen); ?>%</td>


          </tr>

        </tfooter>
      </table>
      <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
<?php
$aksi=$_GET["aksi"];
$cartid=$_GET["cartid"];
if ($aksi=="view")
{
 ?>
 <span><b>Inv No.<?php echo $cartid; ?></b></span>

 <table class="table table-striped">
 <thead>
   <tr>
     <!-- <th width="1%">No</th> -->
     <th class="text-nowrap">TJS Item Code</th>
     <th class="text-nowrap">Qty</th>
     <th class="text-nowrap">Price</th>
       <th class="text-nowrap">Total</th>

   </tr>
 </thead>
 <tbody>
   <?php
     $sql5 = "SELECT * FROM jualdtl where no_cart='$cartid'";
          $query5 = mysqli_query($conn, $sql5);
          while($amku5 = mysqli_fetch_array($query5)){
            $totalku=$amku5["jumlah"]*$amku5["harga"];
     ?>
     <tr class="odd gradeX">


       <td><?=$amku5["kode_stok"];?></td>
       <td><?=$amku5["jumlah"];?></td>
       <td><?=$amku5["harga"];?></td>

       <td><?php echo $totalku; ?>

     <?php } ?>
     </tr>
 </tbody>
</table>
<?php }?>

            </div>
                                </div>
                              </div>



                            </div>

<?php
  include("../../footer.php");
?>
    <script type="text/javascript">
      function myFunction() {
      var element = document.getElementById("add_show");
      element.classList.toggle("hide");
      }
    </script>
</div>
	</body>
    </html>

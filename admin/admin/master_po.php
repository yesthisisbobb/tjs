
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
          <li class="breadcrumb-item active">Purchase Order</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Purchase Order</h1>

	    <!-- end page-header -->
      <form class="form-horizontal" method="post" action="proses-po.php">

          <div class="form-group">

            <div class="col-sm-4">
              <label>PO Date </label>
            </div>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="tgl" name="tgl">
           </div>
        </div>
        <div class="form-group">

          <div class="col-sm-4">
            <label>PO No. </label>
          </div>
          <div class="col-sm-4">
          <input type="text" class="form-control" id="pono" name="pono">
         </div>
      </div>
      <div class="form-group">

        <div class="col-sm-4">
          <label>Distributor/Vendor </label>
        </div>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="dist" name="dist">
       </div>
    </div>
      <button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button><br><br>

      <table id="data-table-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-nowrap">SO.No</th>
            <th class="text-nowrap">Product Name</th>
            <th class="text-nowrap">Qty</th>
            <th class="text-nowrap">Unit Price</th>

              <!-- <th class="text-nowrap">Total </th> -->
              <th class="text-nowrap">Choose</th>

          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM ordertemp";
                 $query = mysqli_query($conn, $sql);
                 while($amku = mysqli_fetch_array($query)){
                   $kodestok=$amku['kode_stok'];
                   $sql1 = "SELECT * FROM master_hpp where tjsitemcode='$kodestok'";
                        $query1 = mysqli_query($conn, $sql1);
                        while($amku1 = mysqli_fetch_array($query1)){
                          $hpp=$amku1['cogsp'];
                        }
            ?>
            
          <tr class="odd gradeX">
            <td><?=$amku["no_cart"];?></td>
            <td><?=$amku["kode_stok"];?><input type="hidden" class="form-control-small" id="kode[]" name="kode[]" value="<?php echo $amku['tjsitemcode']; ?> "></td>
            <td><?=$amku["jumlah"];?></td>
            <td><?php echo rupiah($hpp); ?></td>
            <td><input type="checkbox" class="form-control-small" id="pilih[]" name="pilih[]" value="<?php echo $amku['no']; ?>"></td>

          </tr>

         <?php } ?>

        </tbody>
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
</form>
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

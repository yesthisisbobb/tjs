
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
          <li class="breadcrumb-item active">Stock Out Request</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Stock Out Request </h1>

	    <!-- end page-header -->
      <form class="form-horizontal" method="post" action="proses-do-temp.php">

      <?php
      $aa=1;
      $sql13 = "SELECT * FROM do";
         $query13 = mysqli_query($conn, $sql13);
          while($amku13 = mysqli_fetch_array($query13)){
            $aa=$aa+1;
          }
          ?>



     <br><br>
        <button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button><br><br>
      <table id="data-table-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <!-- <th width="1%">No</th> -->


            <th class="text-nowrap">#</th>
            <th class="text-nowrap">SO NO.</th>
              <th class="text-nowrap">Type Code</th>
              <th class="text-nowrap">QTY</th>
              <th class="text-nowrap">Pending</th>
              <th class="text-nowrap">Deliver</th>
              <th class="text-nowrap">Request Date</th>
            <th class="text-nowrap">Action</th>
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
            $sql = "SELECT * FROM jualdtl";
                 $query = mysqli_query($conn, $sql);
                 while($amku = mysqli_fetch_array($query)){
                   $nomerku=$amku['no'];
                   $sisa=$amku['jumlah']-$amku['kirim'];

            ?>

          <tr class="odd gradeX">


            <td><?=$amku["no"];?>
            <input type="hidden" class="form-control-small" id="no[]" name="no[]" value="<?php echo $amku['no']; ?> ">
            </td>
            <td><?=$amku["no_cart"];?>
            <input type="hidden" class="form-control-small" id="noso[]" name="noso[]" value="<?php echo $amku['no_cart']; ?> ">
            </td>
            <td><?=$amku["kode_stok"];?>
              <input type="hidden" class="form-control-small" id="kode[]" name="kode[]" value="<?php echo $amku['kode_stok']; ?> ">
            </td>
            <td><?=$amku["jumlah"];?>
            <input type="hidden" class="form-control-small" id="jum[]" name="jum[]" value="<?php echo $amku['jumlah']; ?> ">
            </td>
            <td><?php echo $sisa; ?>
              <input type="hidden" class="form-control-small" id="sisa[]" name="sisa[]" value="<?php echo $sisa; ?> ">
            </td>
            <td><input type="text" class="form-control-small" id="kirim[]" name="kirim[]"></td>
            <td><input type="date" class="form-control-small" id="tglkirim[]" name="tglkirim[]"></td>
            <td><input type="checkbox" class="form-control-small" id="pilih[]" name="pilih[]" value="<?php echo $amku['no']; ?>"></td>
<!-- showmodal -->


<!-- end of modal -->


              <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                <!-- <a href="proses-merk.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-minus"></i></a>
                <a href="proses-merk.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="btn btn-success btn btn-sm" role="button"><i class="fa fa-check"></i></a>
              <a href="proses-merk.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-trash"></i></a> -->

                </td>
         <?php } ?>
          </tr>
        </tbody>
      </table>
    </form>
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

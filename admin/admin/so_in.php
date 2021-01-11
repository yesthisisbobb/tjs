
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
          <li class="breadcrumb-item active">Incoming SO</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Incoming Sales Order(SO) </h1>

	    <!-- end page-header -->
      <table id="data-table-buttons" class="table table-striped table-bordered">
        <thead>
          <tr>
            <!-- <th width="1%">No</th> -->

            <th class="text-nowrap">Date</th>
            <th class="text-nowrap">Invoice No.</th>
            <th class="text-nowrap">User Id.</th>
              <th class="text-nowrap">Total Purchase</th>
              <th class="text-nowrap">Status</th>
              <th class="text-nowrap">Payment Status</th>
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
            $sql = "SELECT * FROM jual";
                 $query = mysqli_query($conn, $sql);
                 while($amku = mysqli_fetch_array($query)){
                   $cartidku=$amku['cart_id'];
                   $noku=$amku['no'];

            ?>

          <tr class="odd gradeX">


            <td><?=$amku["tgl"];?></td>


            <td><?=$amku["cart_id"];?></td>
            <td><?=$amku["user_id"];?></td>
            <td><?=$amku["grand_total"];?></td>
            <td><?=$amku["status"];?></td>
            <td><?=$amku["status_payment"];?></td>
            <td class="with-btn" nowrap="">
<!-- showmodal -->

              <?php echo "<a href='#myModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=".$amku['no'].">Detail</a>"; ?>

              <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View/Edit Sales Order</h4>
                          </div>
                          <div class="modal-body">
                          <div class="fetched-data"></div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#myModal').on('show.bs.modal', function (e) {
                                var rowid = $(e.relatedTarget).data('id');
                                //menggunakan fungsi ajax untuk pengambilan data
                                $.ajax({
                                    type : 'post',
                                    url : 'detail.php',
                                    data :  'rowid='+ rowid,
                                    success : function(data){
                                    $('.fetched-data').html(data);//menampilkan data ke dalam modal
                                    }
                                });
                             });
                        });
                      </script>
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

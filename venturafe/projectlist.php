<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
include("phpqrcode/qrlib.php")
?>
<script src="https://kit.fontawesome.com/f0ec2f5d0b.js" crossorigin="anonymous"></script>
<head>

<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>

</head>
<body>
  <style>
  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
}
</style>

<?php
  function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
<div class="wrapper">
    <header class="header-area sticky-bar">
        <div class="main-header-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo pt-40">
                            <a href="index.php">
                                <img src="assets/img/logo/smblogo.png" height="50" width="175" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
    <!-- top menu navigation start -->
<?php
include("inc/top_menu.php");
?>
     <!-- top menu navigation end -->

                    </div>
                    <div class="col-xl-4 col-lg-3">
                        <div class="header-right-wrap pt-40 mr-20">

                            <?php
                            $s=session_id();

                            $b=1;
                            $sqlcart = "SELECT * FROM jual";
                                 $querycart = mysqli_query($conn, $sqlcart);

                                 while($amkucart = mysqli_fetch_array($querycart)){
                                    $b=$b+1;
                                 }
                                   ?>
                            <div class="cart-wrap">
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <h4>Shopping Cart</h4>
                                        <span><?php
                                        $un=$_SESSION["id"];
                                        $tgl= date("d/m");
                                        $ss="SO/".$un."/"."$tgl"."/".$b;
                                         ?></span>
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                    </div>

                                    <ul>
                                      <?php
                                    $r=session_id();
                                    $a=0;
                                    $gt=0;
                                      $sqlku = "SELECT * FROM cartdtl where sess_id='$r'";
                                           $queryku = mysqli_query($conn, $sqlku);
                                           while($amku1 = mysqli_fetch_array($queryku)){
                                             $a=$a+1;
                                             $kodestokku=$amku1['kode_stok'];
                                             $hargaku=$amku1['harga'];
                                             $jum1=$amku1['jumlah'];
                                             $no=$amku1['no'];
                                           ?>
                                        <li class="single-shopping-cart">
                                          <?php
                                          $sqlku2 = "SELECT * FROM master_stok where kodeitem_stok='$kodestokku' and status='Active'";
                                               $queryku2 = mysqli_query($conn, $sqlku2);
                                               while($amku2 = mysqli_fetch_array($queryku2)){
                                                 $gamku=$amku2['gam1'];
                                                 $p=$amku2['panjang'];
                                                 $l=$amku2['lebar'];
                                                 $t=$amku2['tebal'];

                                               }
                                            ?>

                                            <div class="shopping-cart-img">
                                              <?php
                                              if ($gamku=="")
                                              {
                                                ?>
                                                <a href="#"><img alt="" src="assets/img/produk/noimage.png"></a>
                                              <?php
                                            }
                                              else {

                                              ?>
                                                <a href="#"><img alt="" src="assets/img/produk/<?php echo $gamku; ?>"></a>
                                              <?php } ?>
                                                <div class="item-close">
                                                    <a href="proses-cart.php?aksi=delete&no=<?php echo $no; ?>"><i class="sli sli-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#"><?php echo $kodestokku; ?> </a></h4>

                                                <span><?php echo $jum1; ?>x <?php echo rupiah($hargaku); ?>=</span>
                                                <?php $totalitem=$jum1*$hargaku; ?>
                                                <span><?php echo rupiah($totalitem); ?></span>
                                                <?php $gt=$gt+$totalitem;?>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="shopping-cart-bottom">
                                        <div class="shopping-cart-total">
                                            <h4>Grand Total : <span class="shop-total"><?php echo rupiah($gt); ?></span></h4>
                                        </div>
                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="checkout.php?sesi=<?php echo $r; ?>&id=<?php echo $ss; ?>">checkout</a>
                                            <a class="default-btn" href="cart-page.php">view cart</a>
                                            <input type="text" name="sesi" id="sesi" value="<?php echo $ss; ?>">
                                        </div>

                                    </div>

                                </div>
                                <button class="icon-cart-active"  data-toggle="tooltip" title="Ready Stock Cart">
                                    <span class="icon-cart mt-10">
                                        <i class="sli sli-bag"></i>
                                        <span class="count-style"><?php echo $a; ?></span>
                                    </span>
                                </button>
                            </div>
                            <div class="cart-wrap">
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <h4>Indent Stock Request</h4>
                                        <span><?php
                                        $un=$_SESSION["id"];
                                        $tgl= date("d/m");
                                        $ss="SO-I /".$un."/"."$tgl"."/".$b;
                                         ?></span>
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                    </div>

                                    <ul>
                                      <?php
                                    $r=session_id();
                                    $b=0;

                                    $gt1=0;
                                      $sqlku1 = "SELECT * FROM icartdtl where sess_id='$r'";
                                           $queryku1 = mysqli_query($conn, $sqlku1);
                                           while($amku11 = mysqli_fetch_array($queryku1)){
                                             $b=$b+1;
                                             $kodestokku1=$amku11['kode_stok'];
                                             $hargaku1=$amku11['harga'];
                                             $jum11=$amku11['jumlah'];
                                             $no1=$amku11['no'];
                                           ?>
                                        <li class="single-shopping-cart">
                                          <?php
                                          $sqlku21 = "SELECT * FROM master_stok where kodeitem_stok='$kodestokku1' and status='Active'";
                                               $queryku21 = mysqli_query($conn, $sqlku21);
                                               while($amku21 = mysqli_fetch_array($queryku21)){
                                                 $gamku1=$amku21['gam1'];
                                                 $p1=$amku21['panjang'];
                                                 $l1=$amku21['lebar'];
                                                 $t1=$amku21['tebal'];

                                               }
                                            ?>

                                            <div class="shopping-cart-img">
                                              <?php
                                              if ($gamku1=="")
                                              {
                                                ?>
                                                <a href="#"><img alt="" src="assets/img/produk/noimage.png"></a>
                                              <?php
                                            }
                                              else {

                                              ?>
                                                <a href="#"><img alt="" src="assets/img/produk/<?php echo $gamku1; ?>"></a>
                                              <?php } ?>
                                                <div class="item-close">
                                                    <a href="proses-cart.php?aksi=delete1&no=<?php echo $no1; ?>"><i class="sli sli-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#"><?php echo $kodestokku1; ?> </a></h4>

                                                <span><?php echo $jum11; ?>x <?php echo rupiah($hargaku1); ?>=</span>
                                                <?php $totalitem1=$jum11*$hargaku1; ?>
                                                <span><?php echo rupiah($totalitem1); ?></span>
                                                <?php $gt1=$gt1+$totalitem1;?>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="shopping-cart-bottom">
                                        <div class="shopping-cart-total">
                                            <h4>Grand Total : <span class="shop-total"><?php echo rupiah($gt1); ?></span></h4>
                                        </div>
                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="icheckout.php?sesi=<?php echo $r; ?>&id=<?php echo $ss; ?>">checkout</a>
                                            <a class="default-btn" href="cart-page.php">view cart</a>
                                            <input type="text" name="sesi" id="sesi" value="<?php echo $ss; ?>">
                                        </div>

                                    </div>

                                </div>

                                <button class="icon-cart-active" data-toggle="tooltip" title="Indent Stock Cart">
                                    <span class="icon-cart mt-10">
                                        <i class="sli sli-bag" style="color:green"></i>
                                        <span class="count-style"><?php echo $b; ?></span>
                                    </span>
                                </button>
                            </div>
                            <div class="setting-wrap">
                                <button class="setting-active">
                                  <?php
                                  if ($_SESSION["username"]=="") {
                                  ?>
                                    <i class="sli sli-user"></i>
                                  <?php }

                                  else {

                                    $nama=$_SESSION["username"];
                                    $sqlp= "SELECT * FROM login where username='$nama'";
                                         $queryp = mysqli_query($conn, $sqlp);

                                         while($amp = mysqli_fetch_array($queryp)){
                                           $gam=$amp['gam'];
                                           $namanya=$amp['nama'];
                                           $email=$amp['email'];

                                         }
                                           ?>


                                    <img  class="rounded-circle mt-0"  width="40" height="40" alt="" src="assets/img/bg/<?php echo $gam; ?>">


                                  <?php } ?>
                                </button>
                                <div class="setting-content">
                                    <ul>
                                      <?php
                                      if ($_SESSION["username"]=="") {
                                      ?>
                                      <li><a href="login-register.php">Login</a></li>
                                    <?php } else {
                                      $c=0;
                                      $nama1=$_SESSION["username"];
                                      $sqla = "SELECT * FROM jual where user_id='$nama1'";
                                           $querya = mysqli_query($conn, $sqla);
                                           while($ama = mysqli_fetch_array($querya)){
                                             $c=$c+1;
                                           }
                                      ?>
                                      <?php
                                      $d=0;
                                      $nama1=$_SESSION["username"];
                                      $sqlb = "SELECT * FROM jual where user_id='$nama1' and status_payment='Unpaid'";
                                           $queryb = mysqli_query($conn, $sqlb);
                                           while($amb = mysqli_fetch_array($queryb)){
                                             $d=$d+1;
                                           }
                                      ?>
                                      <div class="row">
                                      <div cols="col-sm-4">
                                          <img  class="rounded-circle mt-0 mr-10"  width="60" height="60" alt="" src="assets/img/bg/<?php echo $gam; ?>">
                                      </div>
                                      <div cols="col-sm-8">
                                        <h6><?php echo $namanya; ?></h6>
                                        <p class="small"><?php echo $nama1; ?>-<?php echo $email; ?></p>
                                      </div>
                                      </div>

                                      <hr>
                                        <li><a href="">User Profile</a></li>
                                        <li><a href="invlist.php">Invoice List</a><span class="badge"><?php echo $c; ?></span></li>
                                        <li><a href="">Pending Invoice</a><span class="badge"><?php echo $d; ?></span></li>
                                        <hr mt-0>
                                        <li><a href="logout.php" class="btn btn-danger btn-sm" role="button">Sign Out</a></li>
                                      <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-search start -->

        </div>
        <div class="header-small-mobile">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo">
                            <a href="index.php">
                                <img alt="" src="assets/img/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-right-wrap">
                            <div class="cart-wrap">
                                <button class="icon-cart-active">
                                    <span class="icon-cart">
                                        <i class="sli sli-bag"></i>
                                        <span class="count-style">02</span>
                                    </span>
                                    <span class="cart-price">
                                        $320.00
                                    </span>
                                </button>
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <h4>Shoping Cart</h4>
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                    </div>
                                    <ul>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="assets/img/cart/cart-1.svg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Product Name </a></h4>
                                                <span>1 x 90.00</span>
                                            </div>
                                        </li>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="assets/img/cart/cart-2.svg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Product Name</a></h4>
                                                <span>1 x 90.00</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-bottom">
                                        <div class="shopping-cart-total">
                                            <h4>Total : <span class="shop-total">$260.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="checkout.php">checkout</a>
                                            <a class="default-btn" href="cart-page.php">view cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-off-canvas">
                                <a class="mobile-aside-button" href="#"><i class="sli sli-menu"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mobile menu navigation start -->
<?php
include("inc/mobile_nav.php");
?>
     <!-- mobile menu navigation end -->
     <div class="breadcrumb-area pt-35 pb-35 bg-gray">
         <div class="container">
             <div class="breadcrumb-content text-center">
                 <ul>
                     <li>
                         <a href="index.php">Home</a>
                     </li>
                     <li class="active">Quotation List</li>
                 </ul>
             </div>
         </div>
     </div>

<!-- main content -->
<br>
<div class="container">

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add New project</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="login-form-container">
              <div class="login-register-form">
                  <form action="proses-proyek.php" method="post">
                    <div class="form-group m-b-2">
                      Project ID.
                      <input type="text" readonly name="kode" style="text-transform:uppercase;" id="kode" class="form-control form-control-sm" required />
                    </div>
                    <div class="form-group m-b-2">
                      Project Name.
                      <input type="text" name="namap" id="namap" class="form-control form-control-sm" style="text-transform:uppercase;" onchange="buatkode(this.value)" required />
                    </div>
                    <script>
                    function buatkode(str)
                    {
                      var n = str.length;
                      var res = str.substr(0, 2);

                      for (j=0;j<n;j++)
                      {
                        var res1=str.substr(j,1);
                        if (res1==" ")
                        {
                        k=j+1;
                        res2=str.substr(k,2)
                        }

                      }
                      document.getElementById("kode").value=res+res2;
                    }
                    </script>

                    <div class="form-group m-b-2">
                      Project Manager
                      <input type="text"  name="pm" style="text-transform:uppercase;" id="pm" class="form-control form-control-sm" required />
                    </div>
                    <div class="form-group m-b-2">
                      Project  Location
                      <input type="text"  name="lokasi" style="text-transform:uppercase;" id="lokasi" class="form-control form-control-sm" required />
                    </div>

                      <button type="submit" name="daftar" value="daftar" class=" btn btn-primary btn-sm">Submit</button>
                  </form>
                </div>
              </div>

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>

    </div>
  </div>

</div>

     <div class="container pt-35 pb-35">


       <table id="example" class="table table-striped table-bordered">
         <thead>
           <tr>
             <!-- <th width="1%">No</th> -->


             <th class="text-nowrap">Project Id.</th>
               <th class="text-nowrap">Project Name</th>
               <th class="text-nowrap">Status</th>
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
           $gt=0;
           $un1=$_SESSION["username"];
             $sql = "SELECT * FROM proyek  where nama='$un1'";
                  $query = mysqli_query($conn, $sql);
                  while($amku = mysqli_fetch_array($query)){
                    $kode=$amku['kode'];
                    $namap=$amku['namap'];
                    $status=$amku['status'];


              ?>
           <tr class="odd gradeX">


             <td><?=$amku["kode"];?></td>
             <td><?=$amku["namap"];?></td>
             <td><?=$amku["status"];?></td>



             <td class="with-btn" nowrap="">
               <a href="qlistdtl.php?no=<?php echo $cartidku; ?>" target="_blank" class='btn btn-primary btn-rounded btn-sm'>View Quotation</a>
             </td>
       <!-- showmodal -->
     </tr>
     <?php } ?>
     <tfooter>
       <tr>
         <td></td><td>Total Order</td><td><?php echo rupiah($gt); ?></td>
       </tr>
     </tfooter>
     </table>
     </div>

     <!-- end of content -->
    <!-- <div class="container">
      <div class="row">
  <div class="col-sm-4">
    <div class="card" style="width: 20rem;">
  <img class="card-img-top" src="assets/img/bg/bg11.jpeg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
<div class="col-sm-4">
  <div class="card" style="width: 20rem;">
<img class="card-img-top" src="assets/img/bg/bg11.jpeg" alt="Card image cap">
<div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  <a href="#" class="btn btn-primary">Go somewhere</a>
</div>
</div>
</div>
<div class="col-sm-4">
  <div class="card" style="width: 20rem;">
<img class="card-img-top" src="assets/img/bg/bg11.jpeg" alt="Card image cap">
<div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  <a href="#" class="btn btn-primary">Go somewhere</a>
</div>
</div>
</div>
</div>

</div>
    </div> -->


    <footer class="footer-area bg-paleturquoise">
        <div class="container">
            <div class="footer-top text-center pt-45 pb-45">
                <nav>
                    <ul>
                        <li><a href="#">Home </a></li>
                        <li><a href="#">Sanitary </a></li>
                        <li><a href="#">Tiles </a></li>.
                    </ul>
                </nav>
            </div>
        </div>
        <div class="footer-bottom border-top-1 pt-20">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright text-center pb-20">
                            <p>Copyright © All Right Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="tab-content quickview-big-img">
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img src="assets/img/product/no-image.png" alt="">
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="assets/img/product/no-image.png" alt="">
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    <img src="assets/img/product/no-image.png" alt="">
                                </div>
                                <div id="pro-4" class="tab-pane fade">
                                    <img src="assets/img/product/no-image.png" alt="">
                                </div>
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="quickview-wrap mt-15">
                                <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product/no-image.png" alt=""></a>
                                    <a data-toggle="tab" href="#pro-2"><img src="assets/img/product/no-image.png" alt=""></a>
                                    <a data-toggle="tab" href="#pro-3"><img src="assets/img/product/no-image.png" alt=""></a>
                                    <a data-toggle="tab" href="#pro-4"><img src="assets/img/product/no-image.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>Products Name Here</h2>
                                <div class="product-details-price">
                                    <span>IDR 18.00 </span>
                                    <span class="old">IDR 20.00 </span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                                <div class="pro-details-list">
                                    <ul>
                                        <li>- 0.5 mm Dail</li>
                                        <li>- Inspired vector icons</li>
                                        <li>- Very modern style  </li>
                                    </ul>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                    </div>
                                    <div class="pro-details-cart">
                                        <a href="#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
</div>
<?php
include("inc/footer.php");
?>


</body>
</php>

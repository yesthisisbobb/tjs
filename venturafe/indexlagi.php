<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
include("phpqrcode/qrlib.php")
?>
<script src="https://kit.fontawesome.com/f0ec2f5d0b.js" crossorigin="anonymous"></script>
<body>
  <style>
  .blinking{
      animation:blinkingText 0.8s infinite;
  }
  @keyframes blinkingText{
      0%{     color: #fff; left:0px; top:0px;   }
      49%{    color: transparent; }
      50%{    color: transparent; }
      98%{    color: #fff;  }
      99%{    color: #fff;  }
      100%{   color: #fff;    }
  }
  .popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* The actual popup */
  .popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
  }

  /* Popup arrow */
  .popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }

  /* Toggle this class - hide and show the popup */
  .popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
  }

  /* Add animation (fade in the popup) */
  @-webkit-keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }

  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
  }

  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
}
.form-rounded {
border-radius: 2rem;
}
.centered {
  position: absolute;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.kanan {
  position: absolute;
  bottom: 50px;
  right: 40px;
  left:80px

  transform: translate(-50%, -50%);
}


.kanan2 {
  position: absolute;
  bottom: 0px;
  right: 0px;

  transform: translate(-50%, -50%);
}

.kanan1 {
  position: absolute;
  bottom: 0px;
  right: 0px;

  transform: translate(-50%, -50%);
}
html {
  scroll-behavior: smooth;
}
.centered2 {
  position: absolute;
  top: 80%;
  left: 50%;
  text-align: center;
  transform: translate(-50%, -50%);
}
.centered3 {
  position: absolute;
  top: 60%;
  left: 50%;
  text-align: center;
  transform: translate(-50%, -50%);
}
@media screen and (min-width: 300px)  and (max-width: 850px) {
  div.centered3 {
    top: 40%;
  }
}

@media screen and (min-width: 320px)  and (max-width: 600px) {
  div.centered3 {
    top: 40%;
  }
}

@media screen and (min-width: 375px)  and (max-width: 815px) {
  div.centered3 {
    top: 30%;
  }
}
.button1 {border-radius: 24px;}
h2 {




  font-family: "Adobe Devanagari", sans-serif;
  color: white;
}
h1{




  font-family: "Adobe Devanagari", sans-serif;
  color: white;
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
            <div class="container ml-0">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 ml-0">
                        <div class="logo mt-15">
                            <a href="index.php">
                                <img src="assets/img/logo/23.jpg" height="40" width="300" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-10 ml-100 ">
    <!-- top menu navigation start -->
<?php
include("inc/top_menu.php");
?>

                </div>
                    <div class="col-xl-5 col-xl-5">
                        <div class="header-right-wrap pt-40 mr-0">

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
                                        <h4>SHOPPING CART</h4>

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

                                      $sqlku = "SELECT * FROM cartdtl where sess_id='$r' and jumlah<>'0'";
                                           $queryku = mysqli_query($conn, $sqlku);
                                           while($amku1 = mysqli_fetch_array($queryku)){
                                             $a=$a+1;
                                             $kodestokku=$amku1['kode_stok'];
                                             $hargaku=$amku1['harga'];
                                             $jum1=$amku1['jumlah'];
                                             $no=$amku1['no'];
                                             $shading1=$amku1['shading'];
                                             $gud=$amku1['gudang'];

                                          ?>
                                        <li class="single-shopping-cart">
                                          <?php
                                          $sqlku2 = "SELECT * FROM master_stok where kode_stok='$kodestokku' and status='Active'";
                                               $queryku2 = mysqli_query($conn, $sqlku2);
                                               while($amku2 = mysqli_fetch_array($queryku2)){
                                                 $gamku=$amku2['gam1'];
                                                 $p=$amku2['panjang'];
                                                 $l=$amku2['lebar'];
                                                 $t=$amku2['tebal'];
                                                 $kodeku11=$amku2['kode_stok'];
                                                 $kodetipe=$amku2['kodetipe'];

                                               }
                                            ?>
                                            <?php

                                            if ($jum1==0)
                                            {
                                            }else {


                                            ?>
                                            <div class="shopping-cart-img">

                                                <a href="#"><img alt="" src="../admin/gambar/<?php echo $kodetipe.".jpg"; ?>"></a>
                                                <div class="item-close">
                                                    <a href="proses-cart.php?aksi=delete&no=<?php echo $no; ?>"><i class="sli sli-close"></i></a>
                                                </div>
                                            </div>

                                            <div class="shopping-cart-title">
                                                <h4><a href="#"><?php echo $kodeku11; ?><?php echo "-".$shading1; ?>-<?php echo $gud; ?></a></h4>

                                                <span><?php echo $jum1; ?> Dos x <?php echo rupiah($hargaku); ?>=</span>
                                                <?php $totalitem=$jum1*$hargaku; ?>
                                                <span><?php echo rupiah($totalitem); ?></span>
                                                <?php $gt=$gt+$totalitem;?>
                                            </div>
                                        </li>
                                      <?php }} ?>
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
                                    <span class="icon-cart mt-30">
                                        <!-- <i class="sli sli-bag" style="font-size:22px";></i> -->
                                          <i class="fa fa-shopping-bag" style="font-size:22px;color:#45B39D ;"></i></i>


                                        <span class="count-style"><?php echo $a; ?></span>

                                    </span>
                                </button>
                            </div>
                            <?php
                            $s=session_id();

                            $b=1;
                            $sqlcart = "SELECT * FROM ijual";
                                 $querycart = mysqli_query($conn, $sqlcart);

                                 while($amkucart = mysqli_fetch_array($querycart)){
                                    $b=$b+1;
                                 }
                                   ?>
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
                                             $shading=$amku11['shading'];
                                           ?>
                                        <li class="single-shopping-cart">
                                          <?php
                                          $sqlku21 = "SELECT * FROM master_stok where kode_stok='$kodestokku1' and status='Active'";
                                               $queryku21 = mysqli_query($conn, $sqlku21);
                                               while($amku21 = mysqli_fetch_array($queryku21)){
                                                 $gamku1=$amku21['gam1'];
                                                 $p1=$amku21['panjang'];
                                                 $l1=$amku21['lebar'];
                                                 $t1=$amku21['tebal'];
                                                 $kodetipeku1=$amku21['kode_stok'];
                                                 $kodetipeindent=$amku21['kodetipe'];




                                               }
                                            ?>

                                            <div class="shopping-cart-img">
                                              <a href="#"><img alt="" src="../admin/gambar/<?php echo $kodetipeindent.".jpg"; ?>"></a>
                                                <div class="item-close">
                                                    <a href="proses-cart.php?aksi=delete1&no=<?php echo $no1; ?>"><i class="sli sli-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#"><?php echo $kodetipeku1; ?> </a></h4>

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
                                    <span class="icon-cart mt-30">
                                        <i class="fa fa-shopping-bag" style="font-size:22px;color:#F5B041;"></i></i>
                                        <span class="count-style"><?php echo $b; ?></span>
                                    </span>
                                </button>
                            </div>
                            <form class="form-inline" action="index.php" method="GET">
                              <div class="form-group">
                                <input type="text" class="form-control form-rounded input-sm" size="15" placeholder="Type To Search" name="cari">
                                <button type="submit" class="btn btn-sm  btn-info ml-1 mr-20"><i class="sli sli-magnifier"></i></button>
                                <!-- <input type="file" class="form-rounded form-control input-sm" accept="image/*" capture="camera" /> -->
                              </div>

                            </form>

                            <div class="setting-wrap">
                                <button class="setting-active">
                                  <?php
                                  if ($_SESSION["username"]=="") {
                                  ?>
                                    <i class="sli sli-user "></i>
                                  <?php }

                                  else {

                                    $nama=$_SESSION["username"];

                                    $sqlp= "SELECT * FROM login where username='$nama'";
                                         $queryp = mysqli_query($conn, $sqlp);

                                         while($amp = mysqli_fetch_array($queryp)){
                                           $gam=$amp['gam'];
                                           $namanya=$amp['nama'];
                                           $email=$amp['email'];
                                           $divisi=$amp['divisi2'];

                                         }
                                           ?>


                                    <img  class="rounded-circle mt-0"  width="50" height="50" alt="" src="assets/img/bg/<?php echo $gam; ?>">


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
                                      <?php
                                      $e=0;
                                      $nama2=$_SESSION["username"];
                                      $sqlc = "SELECT * FROM fav where user='$nama2'";
                                           $queryc = mysqli_query($conn, $sqlc);
                                           while($amc = mysqli_fetch_array($queryc)){
                                             $e=$e+1;
                                           }
                                      ?>
                                      <div class="row">
                                      <div cols="col-sm-4">
                                            <img  class="rounded-circle mt-0 mr-10"  width="60" height="60" alt="" src="assets/img/bg/<?php echo $gam; ?>">
                                      </div>
                                      <div cols="col-sm-8">
                                        <h6><?php echo $namanya; ?></h6>
                                        <p class="small"><?php echo $nama1; ?>-<?php echo $email; ?>
                                        <BR>Division : <?php echo $divisi; ?></p>

                                      </div>
                                      </div>

                                      <hr>
                                        <li><i class="fa fa-user" style="font-size:16px;color: #17A589;"></i><a href=""> User Profile</a></li>
                                        <li><i class="fa fa-receipt" style="font-size:16px;color: #17A589;"></i><a href="invlist.php"> Invoice List</a><span class="badge badge-info"><?php echo $c; ?></span></li>
                                        <!-- <li><a href="">Pending Invoice</a><span class="badge badge-pill badge-info"><?php echo $d; ?></span></li> -->
                                        <li><i class="fa fa-bookmark" style="font-size:16px;color: #17A589;"></i><a href="favlist.php"> Favorite Item</a><span class="badge badge-info"><?php echo $e; ?></span></li>
                                        <hr mt-0>
                                        <li><a href="logout.php" class="btn btn-info btn-sm" role="button">Sign Out</a></li>
                                      <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-search start -->
            <div class="main-search-active">
                <div class="sidebar-search-icon">
                    <button class="search-close"><span class="sli sli-close"></span></button>
                </div>
                <div class="sidebar-search-input">
                    <form>
                        <div class="form-search">
                            <input id="search" class="input-text" value="" placeholder="Search Now" type="search">
                            <button>
                                <i class="sli sli-magnifier"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="header-small-mobile">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo">
                            <a href="index.php">
                                  <img src="assets/img/logo/23.jpg" height="75" width="200" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-right-wrap">
                            <div class="cart-wrap">
                              <button class="icon-cart-active"  data-toggle="tooltip" title="Ready Stock Cart">
                                  <span class="icon-cart">
                                      <!-- <i class="sli sli-bag" style="font-size:22px";></i> -->
                                        <i class="fa fa-shopping-bag" style="font-size:22px;color:#45B39D ;"></i></i>


                                      <span class="count-style"><?php echo $a; ?></span>

                                  </span>
                              </button>
                                <div class="shopping-cart-content">
                                  <div class="shopping-cart-top">
                                      <h4>SHOPPING CART</h4>

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

                                    $sqlku = "SELECT * FROM cartdtl where sess_id='$r' and jumlah<>'0'";
                                         $queryku = mysqli_query($conn, $sqlku);
                                         while($amku1 = mysqli_fetch_array($queryku)){
                                           $a=$a+1;
                                           $kodestokku=$amku1['kode_stok'];
                                           $hargaku=$amku1['harga'];
                                           $jum1=$amku1['jumlah'];
                                           $no=$amku1['no'];
                                           $shading1=$amku1['shading'];

                                        ?>
                                      <li class="single-shopping-cart">
                                        <?php
                                        $sqlku2 = "SELECT * FROM master_stok where kode_stok='$kodestokku' and status='Active'";
                                             $queryku2 = mysqli_query($conn, $sqlku2);
                                             while($amku2 = mysqli_fetch_array($queryku2)){
                                               $gamku=$amku2['gam1'];
                                               $p=$amku2['panjang'];
                                               $l=$amku2['lebar'];
                                               $t=$amku2['tebal'];
                                               $kodeku11=$amku2['kodeitem_stok'];

                                             }
                                          ?>
                                          <?php

                                          if ($jum1==0)
                                          {
                                          }else {


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
                                              <h4><a href="#"><?php echo $kodeku11; ?><?php echo "-".$shading1; ?></a></h4>

                                              <span><?php echo $jum1; ?> Dos x <?php echo rupiah($hargaku); ?>=</span>
                                              <?php $totalitem=$jum1*$hargaku; ?>
                                              <span><?php echo rupiah($totalitem); ?></span>
                                              <?php $gt=$gt+$totalitem;?>
                                          </div>
                                      </li>
                                    <?php }} ?>
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
                                <button class="icon-cart-active" data-toggle="tooltip" title="Indent Stock Cart">
                                    <span class="icon-cart">
                                        <i class="fa fa-shopping-bag" style="font-size:22px;color:#F5B041;"></i></i>
                                        <span class="count-style"><?php echo $b; ?></span>
                                    </span>
                                </button>
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
<div class="container">
  <img src="assets/img/logo/24.jpg" width="100%">
</div>
    <div class="breadcrumb-area pt-0 pb-0 bg-white">
      <img src="assets/img/bg/BG1.jpg" width="100%">
      <div class="centered3"><h1 style="font-size:4vw;">We always Provide The Best Quality and Services</h1>
        <a href="#c4" class="btn btn-info btn-lg button1" role="button">Check Our Product</a></div>

        <!-- <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">Products</li>

                </ul>
            </div>
        </div> -->
    </div>

    <div class="container-fluid pt-0 pr-0 pl-0 pb-0 mr-0 ml-0">
      <div class="row">
  <div class="col-sm-4 pt-0 pr-0 pl-0 pb-0 mr-0 ml-0 mt-0 mb-0">
    <img src="assets/img/bg/22.jpg" width=100%>
    <div class="kanan"><h2>Sanitary Promo</h2></div>
    <div class="kanan2">
      <a href="index.php?grupku=promo" class="btn btn-info button1" role="button">See more </a></div></div>
<div class="col-sm-4 pt-0 pr-0 pl-0 pb-0 mr-0 ml-0">
<img src="assets/img/bg/33.jpg" width="100%">
<div class="kanan"><h2>Granite Promo</h2></div>
<div class="kanan2"><button class="button btn-transparent btn-info button1"> See more </button></div>
</div>
<div class="col-sm-4 pt-0 pr-0 pl-0 pb-0 mr-0 ml-0">
  <img src="assets/img/bg/66.jpg" width="100%">
  <div class="kanan"><h2>Catalogue</h2></div>
  <div class="kanan2"><button class="button btn-transparent btn-info button1"> See more </button></div>
</div>
</div>

</div>
<a name="c4"></a>
    <div class="shop-area pt-95 pb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="shop-top-bar">
                        <div class="select-shoing-wrap">
                            <!-- <div class="shop-select">
                                <select>
                                    <option value="">Sort by newness</option>
                                    <option value="">A to Z</option>
                                    <option value=""> Z to A</option>
                                    <option value="">In stock</option>
                                </select>
                            </div> -->

                            <?php


                            $batas=12;
                            $halskrg=$_GET["page"];
                            $grupku=$_GET["grupku"];

                            if($grupku=='')
                            {
                            $query=mysqli_query($conn,"select count(*) from master_stok");
                            $recordcount=mysqli_fetch_row($query)[0];
                            }
                            else {
                              $query=mysqli_query($conn,"select count(*) from master_stok where grup='$grupku'");
                              $recordcount=mysqli_fetch_row($query)[0];
                            }

                            $pagecount=ceil($recordcount/$batas);
                            $previous_page = $halskrg - 1;
                            $next_page = $halskrg + 1;
                            $second_last = $pagecount - 1;
                            $adjacents=2;
                            ?><p> Showing Page <?php echo $halskrg; ?> of Total <?php echo $pagecount; ?> pages</p>
                            <?php
                            if (!isset($_GET["page"])){
                              $activepage=1;

                            }else{
                              $activepage=$_GET["page"];
                            }
                            $mulai=$batas *($activepage-1);
                             ?>
                        </div>
                        <div class="shop-tab nav">
                            <a class="active" href="#shop-1" data-toggle="tab">
                                <i class="sli sli-grid"></i>
                            </a>
                        </div>
                    </div>
                    <div class="shop-bottom-area mt-35">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row ht-products">
                    <?php

                    $namauser=$_SESSION["username"];
                    $level=$_SESSION["level"];

                    $promo=$_GET["status"];

	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];

	// 	$data = mysql_query("select * from mhs where nama like '%".$cari."%'");
	// }else{
	// 	$data = mysql_query("select * from mhs");
	// }

   $sql = "SELECT * FROM master_stok where kode_stok like '%".$cari."%' or grupname like '%".$cari."%'";
     $query = mysqli_query($conn, $sql);
  }
  else
                    if($grupku=='')
                    {
                     $sql = "SELECT * FROM master_stok LIMIT 20";
                       $query = mysqli_query($conn, $sql);
                    }
                    else if($grupku=='promo')
                    {
                     $sql = "SELECT * FROM master_stok where promo='p1'";
                       $query = mysqli_query($conn, $sql);
                    }

                      else {
                                  $sql = "SELECT * FROM master_stok where grup='$grupku' LIMIT 20";
                                  $query = mysqli_query($conn, $sql);
                            }

                            if($grupku=='promo')
                            {
                              ?>
                              <div class="container">
                                <H3>BIG SLAB PROMO</H3>
                              </div>
                            <?php }





                                       while($amku = mysqli_fetch_array($query)){

                                         $kode=$amku['kodeitem_stok'];
                                         $kodetipe=$amku['kodetipe'];
                                         $kodetjs=$amku['kode_stok'];
                                         $panjang=$amku['panjang'];
                                         $lebar=$amku['lebar'];
                                         $tebal=$amku['tebal'];
                                         $gam1=$amku['gam1'];

                                         $kodesup=$amku['kodesup'];
                                         $kodemerk=$amku['kodemerk'];
                                         $pcsctn=$amku['pcsctn'];
                                         $sqmctn=$amku['sqmctn'];
                                         $kgctn=$amku['kgctn'];
                                         $flag=$amku['flag_shading'];
                                         // echo $kode;

                                  ?>
                                  <?php
                                  $jum=0;
                                  $sqlss = "SELECT * FROM master_shading where kode_stok='$kodetjs'";
                                  $queryss = mysqli_query($conn, $sqlss);
                                   while($amkuss = mysqli_fetch_array($queryss)){
                                     $jum=$jum+$amkuss["jum"];
                                   }
                                   ?>
                                  <?php
                                  $sql1 = "SELECT * FROM master_merk where kode='$kodemerk'";
                                       $query1 = mysqli_query($conn, $sql1);
                                       while($amku1 = mysqli_fetch_array($query1)){
                                         $namasup=strtoupper($amku1['nama']);
                              }
                                         // echo $kode;

                                  ?>


                               <div class="col-xl-2">
                                        <!--Product Start-->
                                        <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                            <div class="ht-product-inner">
                                                <div class="ht-product-image-wrap">

                                                    <a href="product-details.php?kode=<?php echo $kodetjs; ?>" class="ht-product-image"><img src="../../admin/gambar/<?php echo $kodetipe.".jpg"; ?>" width="200" height="150"></a>
                                                    <div class="ht-product-action">
                                                        <!-- <ul>
                                                            <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                            <li><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                        </ul> -->
                                                    </div>
                                                </div>
                                                <div class="ht-product-content">
                                                    <div class="ht-product-content-inner">
                                                      <?php

                                                      $sql1 = "SELECT * FROM master_tipe where status='ACTIVE' and kode='$kodetipe'";
                                                           $query1 = mysqli_query($conn, $sql1);
                                                           while($amku1 = mysqli_fetch_array($query1)){
                                                             $kode1=$amku1['kodegrup'];
                                                             $surface=$amku1['surface'];
                                                             $nama1=$amku1['nama'];

                                                      ?>
                                                        <!-- <div class="ht-product-categories"><a href="#"><?php echo $kode1; ?></a></div> -->
                                                      <?php } ?>



                                                           <!-- <img src="assets/img/produk/frame.png" width="50" height="50"  class="center"><br><br> -->

                                                        <h4 class="ht-product-title"><a href="product-details.php?kode=<?php echo $kodetjs; ?>"><?php echo $kodetjs; ?></a>


                                                        <h6 class="ht-product-subtitle"><?php echo $namasup; ?>
                                                        <?php


                                                        $namauser=$_SESSION["username"];

                                                            $sqlaktif = "SELECT * FROM fav where kode='$kodetjs' and user='$namauser'";
                                                            $queryaktif = mysqli_query($conn, $sqlaktif);
                                                               $row = mysqli_num_rows($queryaktif);
                                                             if ($row>0)
                                                             { ?>

                                                                <a href="fav.php?status=del1&kode=<?php echo $kodetjs; ?>"> <i class="fa fa-bookmark" style="font-size:10px;color: #17A589;"></a></i>
                                                             <?php } else { ?>
                                                        <a href="fav.php?kode=<?php echo $kodetjs; ?>"><i class="fa fa-bookmark-o" style="font-size:10px;color: black;"></i></a></h4>
                                                      <?php }?></h6>

                                                        <?php $sqlmax = "SELECT kode_stok, MAX(jumlah) FROM jualdtl GROUP BY kode_stok DESC";
                                                        $querymax = mysqli_query($conn, $sqlmax);
                                                        while($ammax = mysqli_fetch_array($querymax)){


                                                        }
                                                        if (($kodemax=$kodetjs) && ($jum>10))
                                                        {
                                                          // echo "<i class='fa fa-thumbs-up' style='font-size:10px;color: green;'></i>";

                                                        }

                                                        ?>
                                                        <?php
                                                        if ($grupku=='promo')
                                                        {
                                                          $sqlpr = "SELECT * FROM promo where kode='$kodetjs'";
                                                          $querypr = mysqli_query($conn, $sqlpr);

                                                          while($amkupr = mysqli_fetch_array($querypr)){
                                                              $promo=$amkupr['diskon'];

                                                          }
                                                          ?>
                                                          <span class="badge badge-pill badge-success"><?php echo $promo; ?> % Off</span>
                                                          <?php
                                                        }
                                                         ?>

                                                        <?php


                                                        if($level=='admin')
                                                        {
                                                        if($jum==0)
                                                        {
                                                        ?>

                                                        <span class="badge badge-pill badge-danger">Indent Stock</span>
                                                        <?php
                                                      }


                                                        else if (($jum>0) and ($jum<18)) { ?>

                                                          <span class="badge badge-pill badge-warning">Limited Stock</span>
                                                      <?php } else if ($jum>18) { ?>
                                                        <h6 class="ht-product-subtitle"><span class="badge badge-pill badge-info">Ready Stock </span></h6>
                                                      <?php } }
                                                      else
                                                      {
                                                        if($jum==0)
                                                        {
                                                        ?>

                                                        <span class="badge badge-pill badge-danger">Indent Stock</span>
                                                        <?php
                                                      }


                                                        else if (($jum>0) and ($jum<18)) { ?>

                                                          <span class="badge badge-pill badge-warning">Limited Stock </span>
                                                      <?php } else if ($jum>18) { ?>
                                                        <h6 class="ht-product-subtitle"><span class="badge badge-pill badge-info">Ready Stock</span></h6>
                                                      <?php }
                                                      }

                                                      ?>
                                                      <?php
                                                      $ab=0;
                                                          $sqlaktif11 = "SELECT * FROM promo where kode='$kodetjs'";
                                                          $queryaktif11 = mysqli_query($conn, $sqlaktif11);
                                                             while($amkupr1 = mysqli_fetch_array($queryaktif11)){
                                                               $promo1=$amkupr1['diskon'];
                                                               $ab=$ab+1;
                                                               if (($ab>0) && ($grupku==''))
                                                               { ?>
                                                                  <span class="blinking badge badge-pill badge-success">PROMO</span>
                                                            <?php }}?>

                                                        <hr>
                                                          <h6 class="ht-product-subtitle text-muted"><?php echo $kode1; ?></a></h6>





                                                          <?php
                                                          $namat=$_SESSION["username"];

                                                          $sqlp1= "SELECT * FROM login where username='$namat'";
                                                               $queryp1 = mysqli_query($conn, $sqlp1);

                                                               while($amp1 = mysqli_fetch_array($queryp1)){

                                                                 $divisi1=$amp1['divisi2'];

                                                               }
                                                          $a=0;$bot=0;
                                                          $pl=0;$diskon=0;

                                                          $sql2 = "SELECT * FROM master_price where kode='$kodetjs' and divisi='$divisi1' and status='Active'";
                                                               $query2 = mysqli_query($conn, $sql2);
                                                               while($amku2 = mysqli_fetch_array($query2)){
                                                                 $bot=$amku2['dis_showroom'];
                                                                 $dis1=$amku['dis_distribusi'];
                                                                 $pl=$amku2['pl'];
                                                                 $dp=$amku2['disprice'];
                                                                 $bp=$amku2['bp'];
                                                                 $disprice=$amku2['disprice'];
                                                                 // $dd1=$disprice.Fixed(0);
                                                                 $diskon=(($pl-$bot)/$pl)*100;

                                                                 // $diskon=$diskon1.toFixed(0);
                                                                 // g = e.toFixed(0);
                                                                 $a=$a+1;
                                                               }

                                                               ?>

                                                        <div class="ht-product-price">
                                                          <!-- <span class="old">Was <?php  echo rupiah($pl); ?></span><br> -->
                                                          <?php
                                                          if ($ab==0)
                                                          {
                                                          ?>
                                                          <span class="new1"><?php echo rupiah($bot); ?> /m2</span>
                                                        <?php } else if (($ab>0) && ($grupku==''))
                                                          {
                                                            $dp1=$dp-($dp*($promo1/100));
                                                             ?>

                                                              <span class="old">Now <?php echo rupiah($dp); ?> /m2</span><br>
                                                                <h5><span class="badge badge-pill badge-success">PROMO <?php echo rupiah($dp1); ?> /m2</span></h5>
                                                          <?php } ?>

                                                        </div>
                                                        <div class=ht-product-price>
                                                          <?php
                                                          if ($ab==0)
                                                          {
                                                          ?>

                                                        <span class="new1">Save</span><span class="new1"><?php echo round($diskon,2)."%"; ?></span>
                                                        <?php } else if (($ab>0) && ($grupku==''))
                                                      {
                                                        ?>
                                                        <span class="new1">Save</span><span class="new1"><?php echo $diskon."% + ".$promo1."%"; ?></span>
                                                        <?php } else if (($ab>0) && ($grupku=='promo')) {?>

                                                          <span class="new1">Save</span><span class="new1"><?php echo $diskon."% + ".$promo1."%"; ?></span>
                                                          <?php } ?>
                                                        </div>


                                                      <?php

                                                      // QRCode::png("http://www.karyamodern.store?kode='$kode'","image.png","L",1,1);
                                                      // echo "<img src='image.png' />";
                                                      //  ?>
                                                    </div>
                                                    <div class="ht-product-action">
                                                        <ul>
                                                            <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                                            <li><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="ht-product-countdown-wrap">
                                                        <div class="ht-product-countdown" data-countdown="2020/01/01"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Product End-->
                                    </div>
                                          <!--Product End-->
                                          <?php } ?>
                                    </div>

                                </div>
                            </div>

                            <!-- <div id="shop-2" class="tab-pane">
                                <div class="shop-list-wrap shop-list-mrg2 shop-list-mrg-none mb-30">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="product-list-img">
                                                <a href="product-details.php">
                                                    <img src="assets/img/product/product-list-1.svg" alt="Universal Product Style">
                                                </a>
                                                <div class="product-quickview">
                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 align-self-center">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.php">Demo Product Name</a></h3>
                                                <p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard The standard chunk of Lorem Ipsum used since the McClintock, a Latin. It has roots in a piece of classical Latin literature from Tremm.</p>
                                                <span>Sanitary</span>
                                                <div class="shop-list-price-action-wrap">
                                                    <div class="shop-list-price-ratting">
                                                        <div class="ht-product-list-price">
                                                            <span class="new">IDR 40.00</span>
                                                            <span class="old">IDR 70.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="ht-product-list-action">
                                                        <a class="list-wishlist" title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                                        <a class="list-cart" title="Add To Cart" href="#"><i class="sli sli-basket-loaded"></i> Add to Cart</a>
                                                        <a class="list-refresh" title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap shop-list-mrg2 shop-list-mrg-none mb-30">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="product-list-img">
                                                <a href="product-details.php">
                                                    <img src="assets/img/product/product-list-2.svg" alt="Universal Product Style">
                                                </a>
                                                <div class="product-quickview">
                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 align-self-center">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.php">Demo Product Name</a></h3>
                                                <p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard The standard chunk of Lorem Ipsum used since the McClintock, a Latin. It has roots in a piece of classical Latin literature from Tremm.</p>
                                                <span>Sanitary</span>
                                                <div class="shop-list-price-action-wrap">
                                                    <div class="shop-list-price-ratting">
                                                        <div class="ht-product-list-price">
                                                            <span class="new">IDR 50.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="ht-product-list-action">
                                                        <a class="list-wishlist" title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                                        <a class="list-cart" title="Add To Cart" href="#"><i class="sli sli-basket-loaded"></i> Add to Cart</a>
                                                        <a class="list-refresh" title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap shop-list-mrg2 shop-list-mrg-none mb-30">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="product-list-img">
                                                <a href="product-details.php">
                                                    <img src="assets/img/product/product-list-3.svg" alt="Universal Product Style">
                                                </a>
                                                <div class="product-quickview">
                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 align-self-center">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.php">Demo Product Name</a></h3>
                                                <p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard The standard chunk of Lorem Ipsum used since the McClintock, a Latin. It has roots in a piece of classical Latin literature from Tremm.</p>
                                                <span>Sanitary</span>
                                                <div class="shop-list-price-action-wrap">
                                                    <div class="shop-list-price-ratting">
                                                        <div class="ht-product-list-price">
                                                            <span class="new">IDR 40.00</span>
                                                            <span class="old">IDR 70.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="ht-product-list-action">
                                                        <a class="list-wishlist" title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                                        <a class="list-cart" title="Add To Cart" href="#"><i class="sli sli-basket-loaded"></i> Add to Cart</a>
                                                        <a class="list-refresh" title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap shop-list-mrg2 shop-list-mrg-none mb-30">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="product-list-img">
                                                <a href="product-details.php">
                                                    <img src="assets/img/product/product-list-4.svg" alt="Universal Product Style">
                                                </a>
                                                <div class="product-quickview">
                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 align-self-center">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.php">Demo Product Name</a></h3>
                                                <p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard The standard chunk of Lorem Ipsum used since the McClintock, a Latin. It has roots in a piece of classical Latin literature from Tremm.</p>
                                                <span>Sanitary</span>
                                                <div class="shop-list-price-action-wrap">
                                                    <div class="shop-list-price-ratting">
                                                        <div class="ht-product-list-price">
                                                            <span class="new">IDR 90.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="ht-product-list-action">
                                                        <a class="list-wishlist" title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                                        <a class="list-cart" title="Add To Cart" href="#"><i class="sli sli-basket-loaded"></i> Add to Cart</a>
                                                        <a class="list-refresh" title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>
<div class="pro-pagination-style text-center mt-30">
<ul>
<?php
$hal=$_GET["page"];
// begin first page button
if($hal > 1){
?>
<li><a class="active" href="index.php?page=<?php echo $previous_page; ?>">Prev</a></li>
<?php } ?>

<!-- end of first button -->

<?php

if ($pagecount > 10){
  // begin of pagination
if($hal <= 4) {

for ($i=1; $i<8; $i++)
{
  if ($i == $hal)
  {
    ?> <li><a class="active"><?php echo $i; ?> </a></li>
  <?php } else { ?>
    <li><a class="active" href="index.php?page=<?php echo $i;?>">
    <?php echo $i; }
//

//


  }
?>

    <li><a class="active" href="index.php?page=<?php echo $i;?>">
      <?php echo $i; ?>
    </a></li>
    <?php
    echo "<li><a>...</a></li>";
    echo "<li><a class='active' href='?page_no=$second_last'>$second_last</a></li>";
    echo "<li><a class='active' href='?page_no=$pagecount'>$pagecount</a></li>";
}
else if($hal > 4 && $hal < $pagecount - 4) {
echo "<li><a class='active' href='index.php?page=1'>1</a></li>";
echo "<li><a class='active' href='index.php?page=2'>2</a></li>";
echo "<li><a >...</a></li>";
for (
     $i= $hal - $adjacents;
     $i <= $hal + $adjacents;
     $i++
     ) {
     if ($i == $hal) {
 echo "<li><a class='active'>$i</a></li>";
 }else{
        echo "<li><a class='active' href='index.php?page_no=$i'>$i</a></li>";
          }
       }
echo "<li><a >...</a></li>";
echo "<li><a class='active' href='index.php?page=$second_last'>$second_last</a></li>";
echo "<li><a class='active' href='index?page=$pagecount'>$pagecount</a></li>";
}
else {
echo "<li><a class='active' href='index.php?hal=1'>1</a></li>";
echo "<li><a class='active' href='index.php?hal=2'>2</a></li>";
echo "<li><a>...</a></li>";
for (
     $i = $pagecount - 6;
     $i <= $pagecount;
     $i++
     ) {
     if ($i == $hal) {
 echo "<li><a class='active'>$i</a></li>";
 }else{
        echo "<li><a class='active' href='index.php?page=$i'>$i</a></li>";
 }
     }
}

}


// end of hide pagination




if($hal < $pagecount){
?>
<li><a class="active" href="index.php?page=<?php echo $next_page; ?>">Next</a></li>
<?php } ?>


<!-- </div>                      <div class="pro-pagination-style text-center mt-30">
                            <ul>
                                <li><a class="prev" href="#"><i class="sli sli-arrow-left"></i></a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a class="next" href="#"><i class="sli sli-arrow-right"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-area bg-paleturquoise">

        <div class="footer-bottom border-top-1 pt-20">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright text-center pb-20">
                            <p>Copyright Smart Marble & Bath © All Right Reserved</p>
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
                                <p></p>
                                <div class="pro-details-list">
                                    <ul>
                                        <li>- </li>
                                        <li>- </li>
                                        <li>-  </li>
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

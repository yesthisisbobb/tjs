<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
?>

<script language=javascript>
var objekxhr, objekxhr1;
function hitung(str)
{
buatxhr();
str2=document.getElementById("kodeitem").value;
objekxhr.open("GET", "TampilMhs.php?y="+str2+"&q="+str,true);
objekxhr.send(null);

objekxhr.onreadystatechange=tampilkan;

}
function buatxhr()
{
    if (window.ActiveXObject)

    {
        objectxhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
        else if (window.XMLHttpRequest)
    {
        objekxhr=new XMLHttpRequest();
    }
    else
    {
      alert ("ganti browser anda");
    }
}


function tampilkan()
{

document.getElementById("pg").innerHTML= objekxhr.responseText;


}


</script>
<script src="https://kit.fontawesome.com/f0ec2f5d0b.js" crossorigin="anonymous"></script>


<?php
$kode=$_GET["kode"];
$out=$_GET["status"];

 ?>
<body>

  <?php
    function rupiah($angka){

  	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
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
                                <img src="assets/img/logo/smblogo.png" width="200px" height="75px" alt="">
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
                                                 $kodetipe=$amku2['kodetipe'];
                                                 $kodeku11=$amku2['kode_stok'];

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
                                                <a href="#"><img alt="" src="../../admin/gambar/<?php echo $kodetipe.".jpg"; ?>"></a>

                                              <?php
                                            }
                                              else {

                                              ?>
                                                <a href="#"><img alt="" src="../../admin/gambar/<?php echo $kodetipe.".jpg"; ?>"></a>
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
                                <button class="icon-cart-active"  data-toggle="tooltip" title="Ready Stock Cart">
                                    <span class="icon-cart mt-10">
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
                                    <span class="icon-cart mt-10">
                                        <i class="fa fa-shopping-bag" style="font-size:22px;color:#F5B041;"></i></i>
                                        <span class="count-style"><?php echo $b; ?></span>
                                    </span>
                                </button>
                            </div>
                            <form action="/action_page.php">
                              <div class="form-group">
                                <input type="text" class="form-control form-rounded input-sm" placeholder="Search" name="text1">
                              </div>
                            </form>
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
                                      $divisi=$_SESSION["divisi"];
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
                                        <p class="small"><?php echo $nama1; ?>-<?php echo $email; ?></p>
                                      </div>
                                      </div>

                                      <hr>
                                        <li><a href="">User Profile</a></li>
                                        <li><a href="invlist.php">Invoice List</a><span class="badge badge-pill badge-info"><?php echo $c; ?></span></li>
                                        <li><a href="">Pending Invoice</a><span class="badge badge-pill badge-info"><?php echo $d; ?></span></li>
                                        <li><a href="favlist.php">Favorite Item</a><span class="badge badge-pill badge-info"><?php echo $e; ?></span></li>
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
                                        <span class="count-style">0</span>
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
                                                <a href="#"><img alt="" src=""></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Product Name </a></h4>
                                                <span></span>
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
<?php
include("inc/mobile_nav.php");
?>
    <div class="breadcrumb-area pt-35 pb-35 bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">Product Details </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    $nama11=$_SESSION["username"];

    $sql11 = "SELECT * FROM login where username='$nama11'";
         $query11 = mysqli_query($conn, $sql11);
         while($amku11 = mysqli_fetch_array($query11)){
           $divisi11=$amku11['divisi'];
           echo $divisi11;
    }?>

    <?php
    $sql = "SELECT * FROM master_stok where kode_stok='$kode' and status='Active'";
         $query = mysqli_query($conn, $sql);
         while($amku = mysqli_fetch_array($query)){
           $kode=$amku['kodeitem_stok'];
           $kodestok=$amku['kode_stok'];
           $kodetipe=$amku['kodetipe'];
           $panjang=$amku['panjang'];
           $lebar=$amku['lebar'];
           $tebal=$amku['tebal'];
           $gam1=$amku['gam1'];
           $jum11=$amku['jum'];
           $des=$amku['des'];
           $kodesup=$amku['kodesup'];
           $kodemerk=$amku['kodemerk'];
           $pcsctn=$amku['pcsctn'];
           $kgctn=$amku['kgsstok'];
           $sqmctn=$amku['sqmctn'];
           $pcsctn=$amku['pcsctn'];
           $flag=$_GET['flag'];



            $jumss=0;
              if($divisi11=="DISTRIBUSI")
              {
              $sqlss = "SELECT * FROM master_shading where kode_stok='$kodestok' and (katgd='$divisi11' or katgd='RETAIL')";
              }
              // else if($divisi11=="RETAIL")
              // {
              //   $sqlss = "SELECT * FROM master_shading where kode_stok='$kodestok' and katgd='$divisi11' and katgd='RETAIL'";
              // }
              $queryss = mysqli_query($conn, $sqlss);
               while($amkuss = mysqli_fetch_array($queryss)){
                 $kodeshading=$amkuss['kode_shading'];
                 $jumss=$jumss+$amkuss['jum'];
               }
                 $jum=$jumss;






}
           // echo $kode;

    ?>
    <?php
    $sql1 = "SELECT * FROM master_merk where kode='$kodemerk'";
         $query1 = mysqli_query($conn, $sql1);
         while($amku1 = mysqli_fetch_array($query1)){
           $namasup=$amku1['nama'];
}
           // echo $kode;

    ?>
    <div class="product-details-area pt-100 pb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-img">
                        <div class="zoompro-border zoompro-span border">
                          <img class="zoompro" src="../../admin/gambar/<?php echo $kodetipe.".jpg"; ?>">

                            <!-- <div class="product-video">
                                <a class="video-popup" href="">
                                    <i class="sli sli-control-play"></i>
                                    View Video
                                </a>
                            </div> -->
                        </div>
                        <div id="gallery" class="mt-20 product-dec-slider">
                            <a data-image="assets/img/produk/<?php echo $gam1; ?>" data-zoom-image="assets/img/produk/<?php echo $gam1; ?>">
                                <img src="assets/img/produk/<?php echo $gam1; ?>" alt="" width="90" height="90">

                            </a>
                            <a data-image="assets/img/produk/<?php echo $gam1; ?>" data-zoom-image="assets/img/produk/<?php echo $gam1; ?>">
                                  <img src="assets/img/produk/<?php echo $gam1; ?>" alt="" width="90" height="90">
                            </a>
                            <a data-image="assets/img/produk/<?php echo $gam1; ?>" data-zoom-image="assets/img/produk/<?php echo $gam1; ?>">
                                  <img src="assets/img/produk/<?php echo $gam1; ?>" alt="" width="90" height="90">
                            </a>
                            <a data-image="assets/img/produk/<?php echo $gam1; ?>" data-zoom-image="assets/img/produk/<?php echo $gam1; ?>">
                                  <img src="assets/img/produk/<?php echo $gam1; ?>" alt="" width="90" height="90">
                            </a>
                            <a data-image="assets/img/produk/<?php echo $gam1; ?>" data-zoom-image="assets/img/produk/<?php echo $gam1; ?>"
                                  <img src="assets/img/produk/<?php echo $gam1; ?>" alt="" width="90" height="90">
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                $sql2 = "SELECT * FROM master_price where kode='$kodestok' and status='Active'";
                     $query2 = mysqli_query($conn, $sql2);
                     while($amku2 = mysqli_fetch_array($query2)){
                       $pl=$amku2['pl'];
                       $bot=$amku2['dis_showroom'];
                       $dp=$amku2['disprice'];
                       $pldos=$amku2['bot'];
                       $bp=$amku2['bp'];
                       $disprice=$amku2['disprice'];
                       $pldosdis=$bot*$sqmctn;
                       $diskon=(($pl-$bot)/$pl)*100;
                     }
                     ?>
                <div class="col-lg-6 col-md-6">


                    <div class="product-details-content ml-30">
                      <span class="hi">
                      <?php
                      if($out=="out")
                      {
                        echo "You can only order ". $jum. " Dos !!!<br><br>";
                    }

                      ?></span><br>

                        <h2><?php echo $kodestok; ?></h2>
                        <h3><?php echo strtoupper($namasup); ?></h3>
                        <!-- <div class="pro-details-meta">
                            <span>Categories : <?php echo $kode3; ?></span>

                        </div> -->

                        <div class="product-details-price mb-0">

                            <?php
                            $sql31 = "SELECT * FROM master_stok where kode_stok='$kodestok'";
                            $query31 = mysqli_query($conn, $sql31);
                            while($amku31 = mysqli_fetch_array($query31)){
                              $promoku=$amku31['promo'];
                            }
                            $sql32 = "SELECT * FROM promo where kode='$kodestok' and kategori='$promoku'";
                            $query32 = mysqli_query($conn, $sql32);
                            while($amku32 = mysqli_fetch_array($query32)){
                              $nilaipromo=$amku32['diskon'];
                            }
                            ?>
                            <?php
                            if ($nilaipromo=="")
                            {

                            ?>
                            <span><?php echo rupiah($bot); ?> /m2</span>
                            <span class="old"><?php echo rupiah($pl); ?> </span>
                            <span class="dis badge-pill badge-info ml-10">You save <?php echo round($diskon,2);?> %</span>
                          <?php } else {
                            $dpakhir=$dp-($dp*($nilaipromo/100));
                            $pldos1=$pldosdis-($pldosdis*($nilaipromo/100));
                            ?>
                            <span><?php echo rupiah($dpakhir); ?>/m2</span>
                            <span class="oldpromo"><?php echo rupiah($dp); ?>/m2</span>
                            <span class="oldpromo"><?php echo rupiah($pl); ?>/m2 </span>
                            <span class="dispromo badge-pill badge-info ml-10">You save <?php echo $diskon;?>%+<?php echo $nilaipromo;?>%</span>
                          <?php }?>
                        </div>
                        <?php
                        if ($nilaipromo=="")
                        {

                        ?>

                        <div class="product-details-price mt-0">
                            <span><?php echo rupiah($pldosdis); ?> / Box</span>
                        </div>
                      <?php } else { ?>
                        <div class="product-details-price mt-0">
                            <span><?php echo rupiah($pldos1); ?> / Box</span>
                        </div>
                      <?php } ?>
                        <hr>
                        <p><?php echo $des; ?></p>
                        <?php

                        $sql3 = "SELECT * FROM master_tipe where kode='$kodetipe'";
                             $query3 = mysqli_query($conn, $sql3);
                             while($amku3 = mysqli_fetch_array($query3)){
                               $kode3=$amku3['kodegrup'];
                               $surface=$amku3['surface'];
                               $nama3=$amku3['nama'];
                               $faces=$amku3['faces'];
                             }
                        ?>
                        <div class="pro-details-list">
                            <ul>

                                <li>-Dimension: <?php echo $panjang."x".$lebar."x"."$tebal"."(mm)/".$sqmctn." m2"; ?></li>
                                <li>-Weight: <?php echo $kgctn; ?> kg / box </li>
                                <li>-Qty/Dos: <?php echo $pcsctn; ?> pcs</li>
                                <li>-Faces: <?php echo $faces; ?> faces </li>
                                <li>-Surface: <?php echo $surface; ?> </li>
                                <li>-Available Stock: <?php echo $jum ?></a> Box</h6> </li>

                            </ul>
                        </div>
                        <!-- <h2>What You can do if you need more stock :</h2>
                        <span> 1. You can split your order by purchase the require quantity from total available stok and indent the rest stock from main product page </span><br>
                        <span> 2. You can purchase the require quanity from availabe stok and purchase the rest stock from another shading product if it available </span><br>
                        <span> 3. Contact Our Administration if you do not want to split order or use another shading and choose to indent total of your requirement quantity </span><br><hr> -->

                          <form class="form-horizontal" method="post" action="proses-cart.php">
                            <input type="hidden"  name="kodeitem" id="kodeitem" value="<?php echo $kodestok; ?>">
                            <?php
                            if ($nilaipromo=="")
                            {
                              $ha=$bot*$sqmctn*$pcsctn;
                            ?>
                            <input type="hidden"  name="harga" id="harga" value="<?php echo $ha; ?>">
                          <?php } else { ?>
                            <input type="hidden"  name="harga" id="harga" value="<?php echo $ha; ?>">
                          <?php } ?>
                            <input type="hidden"  name="ses1" id="ses1" value="<?php echo $ses1; ?>">




                        <div class="pro-details-quality">
                          <div class="cart-plus-minus">
                              <span class="badge-info">QTY <input class="cart-plus-minus-box" type="text" name="qty" id="qty" value="2" onfocusout="hitung(this.value)">
                          </div>

                          <script language=javascript>
                          function coba()
                          {
                            a=parseInt(document.getElementById(qtys2[0]).value);
                            document.getElementById("jumlahin").value=a;
                          }
                          </script>
                          <?php
                          $flag=$_GET['flag'];
                          if($out=='out') { ?>

                            <?php
                            $sql36 = "SELECT * FROM master_shading where kode_stok='$kodestok'";
                                 $query36 = mysqli_query($conn, $sql36);
                                 while($amku36 = mysqli_fetch_array($query36)){
                             ?>
                            <div class="cart-plus-minus">
                                Shading <?php echo $amku36['kode_shading']; ?><input class="cart-plus-minus-box" type="text" name="qtys1" id="qtys1[]" value="<?php echo $amku36['jumlah']; ?>">
                            </div>

                          <?php } ?>

                          <?php } else { ?>
                              <!-- <div id="pg">

                              </div> -->
                          <?php } ?>



                            <div class="pro-details-cart btn-hover">
                                <button type="submit" name="daftar" value="daftar" class="btn btn-info">Add to Cart</button>
                            </div>

                        </div>
<!--  -->
<div>
                  <table border="1" width="25%">
                          <tr>
                            <td colspan="2" align="center">
                              ORDER HERE
                            </td>
                          </tr>
                          <tr>
                            <td width="50%"><input type="text" name="qty" id="qty" placeholder="Fill in" onfocusout="hitung(this.value)"></td>
                            <td><h2><?php echo $jum ?></h2></td>
                          </tr>
                          <tr>
                            <td>
                              Carton
                            </td>
                            <td>
                              Available
                            </td>
                          </tr>
                  </table>
                        </div>


<!--  -->
                      </div>



                         <div class="pro-details-quality">
                        <div id="pg" class="ml-10">

                        </div>
                      </div>

                      </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

        <footer class="footer-area bg-paleturquoise">
        <!-- <div class="container">
            <div class="footer-top text-center pt-45 pb-45">
                <nav>
                    <ul>
                        <li><a href="#">Home </a></li>
                        <li><a href="#">Sanitary </a></li>
                        <li><a href="#">Tiles </a></li>.
                    </ul>
                </nav>
            </div>
        </div> -->
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
                                    <img src="assets/img/product/" alt="">
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="assets/img/product/" alt="">
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    <img src="assets/img/product/" alt="">
                                </div>
                                <div id="pro-4" class="tab-pane fade">
                                    <img src="assets/img/product/" alt="">
                                </div>
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="quickview-wrap mt-15">
                                <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/img/product/" alt=""></a>
                                    <a data-toggle="tab" href="#pro-2"><img src="assets/img/product/" alt=""></a>
                                    <a data-toggle="tab" href="#pro-3"><img src="assets/img/product/" alt=""></a>
                                    <a data-toggle="tab" href="#pro-4"><img src="assets/img/product/" alt=""></a>
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
                                        <li>- </li>
                                        <li>- </li>
                                        <li>- </li>
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
                                <div class="pro-details-meta">
                                    <span>Categories :</span>
                                    <ul>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
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

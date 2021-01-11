

<header id="header">
  <div id="header-wrap">
    <div class="container">
      <div class="header-row">

        <!-- Logo
        ============================================= -->
        <!-- <div id="logo">
          <img src="img/logo/smblogo.png" ></a>
        </div> -->
        <!-- #logo end -->
        <div id="logo" >
                <a href="index.html" class="standard-logo"><img src="img/logo/smblogo.png" class="responsivelogo"></a>
                <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="img/logo/smblogo.png" width="250" height="25"></a>

              </div>
        <div class="header-misc">

          <!-- Top Search
          ============================================= -->
          <!-- <div id="top-search" class="header-misc-icon">
            <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
          </div> -->

          <!-- Top Cart
          ============================================= -->
          <?php
          $total2=0;
          $usern=$_SESSION['username'];
            $sqlunt = "SELECT * FROM cartdtl where userid='$usern'";
                 $queryunt = mysqli_query($conn, $sqlunt);
                 while($amkunt = mysqli_fetch_array($queryunt)){
                   $total2=$total2+1;
                 }
            ?>

          <div id="top-cart" class="header-misc-icon d-none d-sm-block">
            <a href="#" id="top-cart-trigger">
              <?php
              if($total2>0)
              { ?>
              <i class="fa fa-shopping-basket animated bounceIn infinite"></i>
            <?php } else { ?>
              <i class="fa fa-shopping-basket"></i>
            <?php } ?>
              <span class="top-cart-number"><?php echo $total2; ?></span></a>
            <div class="top-cart-content">
              <div class="top-cart-title">
                <h4>Shopping Cart</h4>
              </div>
              <div class="top-cart-items">

                            <?php
                            $total1=0;
                            $usern=$_SESSION['username'];
                              $sqlun = "SELECT * FROM cartdtl where userid='$usern'";
                                   $queryun = mysqli_query($conn, $sqlun);
                                   while($amkun = mysqli_fetch_array($queryun)){
                                     $kodes=$amkun['kode_stok'];
                                     $har=$amkun['harga'];
                                     $jum=$amkun['jumlah'];
                                     $total=$har*$jum;
                                     $total1=$total1+$total;
                              ?>

                              <?php

                                $sqlun1 = "SELECT * FROM master_stok where kode_stok='$kodes'";
                                     $queryun1 = mysqli_query($conn, $sqlun1);
                                     while($amkun1 = mysqli_fetch_array($queryun1)){
                                       $kodetipe=$amkun1['kodetipe'];

                                     }
                                ?>


                <div class="top-cart-item">
                  <div class="top-cart-item-image">
                    <a href="#"><img src="img/gambar/<?php echo $kodetipe;?>.jpg"></a></a>
                  </div>

                  <div class="top-cart-item-desc">
                    <div class="top-cart-item-desc-title">
                      <a href="#"><?php echo $kodes; ?></a>
                      <span class="top-cart-item-price d-block"><?php echo rupiah($har); ?></span>
                    </div>
                    <div class="top-cart-item-quantity">x <?php echo $jum; ?></div>
                  </div>
                </div>
              <?php }?>

              </div>
              <?php
              $sess1=session_id();
              ?>
              <div class="top-cart-action">
                <span class="top-checkout-price"><?php echo rupiah($total1);?></span>

              </div>
              <div class="top-cart-action">
              <a href="checkout.php?sessi=<?php echo $sess1;?>" class="btn btn-info btn-block" role="button" id="kos1">Buy</a><br>

            </div>
            <div class="top-cart-action">
            <a href="checkout3.php?sessi=<?php echo $sess1;?>" class="btn btn-danger btn-block" role="button" id="kos">Empty Cart</a><br>

          </div>
          </div>
          </div><!-- #top-cart end -->

          <?php
          $total3=0;
          $usern3=$_SESSION['username'];
            $sqlunt3 = "SELECT * FROM icartdtl where userid='$usern3'";
                 $queryunt3 = mysqli_query($conn, $sqlunt3);
                 while($amkunt3 = mysqli_fetch_array($queryunt3)){
                   $total3=$total3+1;
                 }

            ?>

            <div id="top-cart" class="header-misc-icon d-none d-sm-block">
              <a href="#" id="top-cart-trigger">
              <?php
              if($total3>0)
              { ?>
              <i style="color:orange;" class="fa fa-shopping-basket animated bounceIn infinite"></i>
            <?php } else { ?>
              <i style="color:orange;" class="fa fa-shopping-basket"></i>
            <?php } ?>
              <span class="top-cart-number"><?php echo $total3; ?></span></a>

            <div class="top-cart-content1">
              <div class="top-cart-title">
                <h4>Indent Cart</h4>
              </div>
              <div class="top-cart-items">

                            <?php
                            $total1=0;
                            $usern=$_SESSION['username'];
                              $sqlun = "SELECT * FROM icartdtl where userid='$usern'";
                                   $queryun = mysqli_query($conn, $sqlun);
                                   while($amkun = mysqli_fetch_array($queryun)){
                                     $kodes=$amkun['kode_stok'];
                                     $har=$amkun['harga'];
                                     $jum=$amkun['jumlah'];
                                     $total=$har*$jum;
                                     $total1=$total1+$total;
                              ?>

                              <?php

                                $sqlun1 = "SELECT * FROM master_stok where kode_stok='$kodes'";
                                     $queryun1 = mysqli_query($conn, $sqlun1);
                                     while($amkun1 = mysqli_fetch_array($queryun1)){
                                       $kodetipe=$amkun1['kodetipe'];

                                     }
                                ?>


                <div class="top-cart-item">
                  <div class="top-cart-item-image">
                    <a href="#"><img src="img/gambar/<?php echo $kodetipe;?>.jpg"></a></a>
                  </div>

                  <div class="top-cart-item-desc">
                    <div class="top-cart-item-desc-title">
                      <a href="#"><?php echo $kodes; ?></a>
                      <span class="top-cart-item-price d-block"><?php echo rupiah($har); ?></span>
                    </div>
                    <div class="top-cart-item-quantity">x <?php echo $jum; ?></div>
                  </div>
                </div>
              <?php }?>

              </div>
              <?php
              $sess1=session_id();
              ?>
              <div class="top-cart-action">
                <span class="top-checkout-price"><?php echo rupiah($total1);?></span>

              </div>
              <div class="top-cart-action">
              <a href="checkout2.php?sessi=<?php echo $sess1;?>" class="btn btn-info btn-block" role="button">Indent</a>
            </div>
          </div>
          </div>
          <!-- topcart indent end -->



        </div>

        <div id="primary-menu-trigger">
          <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
        </div>

        <!-- Primary Navigation
        ============================================= -->
        <nav class="primary-menu">

          <ul class="menu-container">
            <li class="menu-item current"><a class="menu-link" href="index-shop.php"><div>Home</div></a>
              <ul class="sub-menu-container">
                <li class="menu-item"><a class="menu-link" href="index-corporate.html"><div>About Us</div></a>
                  <ul class="sub-menu-container">
                    <li class="menu-item"><a class="menu-link" href="index-corporate.html"><div>About Us</div></a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item"><a class="menu-link" href="index-portfolio.html"><div>Services</div></a>

                </li>
                <li class="menu-item"><a class="menu-link" href="index-blog.html"><div>News/Event</div></a>

                </li>
                <li class="menu-item"><a class="menu-link" href="index-shop.html"><div>Contact Us</div></a>

                </li>


                </ul>
            </li>
            <?php
            $sqlh = "SELECT * FROM master_grup";
                 $queryh = mysqli_query($conn, $sqlh);
                 $cekh=mysqli_num_rows($queryh);

                 while($amh = mysqli_fetch_array($queryh)){
                   $nama=$amh["nama"];
                   ?>
            <li class="menu-item "><a class="menu-link" href="#"><div><?php echo $nama;?></div></a>
              <ul class="sub-menu-container">
                <?php
                $sqli = "SELECT * FROM master_sub_grup where namagrup='$nama'";
                     $queryi = mysqli_query($conn, $sqli);
                     $ceki=mysqli_num_rows($queryi);

                     while($ami = mysqli_fetch_array($queryi)){
                       $nama1=$ami["nama"];

                       ?>
                <li class="menu-item"><a class="menu-link" href="index-corporate.html"><div><?php echo $nama1; ?></div></a>
                  <ul class="sub-menu-container">
                    <?php
                    $sqli1 = "SELECT * FROM detail_sub_grup where namagrup='$nama1'";
                         $queryi1 = mysqli_query($conn, $sqli1);
                         $ceki1=mysqli_num_rows($queryi1);

                         while($ami1 = mysqli_fetch_array($queryi1)){
                           $namai1=$ami1["nama"];
                          ?>
                    <li class="menu-item"><a class="menu-link" href="index-shop.php?grup=<?php echo $namai1;?>#produkoke"><div><?php echo $namai1;?></div></a>
                    </li>
                  <?php }?>
                  </ul>
                </li>
              <?php } ?>


                </ul>
            </li>
          <?php } ?>

            <!-- Mega Menu
            ============================================= -->

            <?php
            $totu3=0;
            $userku3=$_SESSION["username"];
            $sqluku3 = "SELECT * FROM jual where user_id='$userku3'";
              $queryuku3 = mysqli_query($conn, $sqluku3);
                 while($amkuuku3 = mysqli_fetch_array($queryuku3)){
                   $totu3=$totu3+1;
                 }
                 $totu4=0;
                 $userku4=$_SESSION["username"];
                 $sqluku4 = "SELECT * FROM ijual where user_id='$userku4'";
                   $queryuku4 = mysqli_query($conn, $sqluku4);
                      while($amkuuku4 = mysqli_fetch_array($queryuku4)){
                        $totu4=$totu4+1;
                      }
                      $tott=$totu4+$totu3;
                    ?>
            <li class="menu-item"><a class="menu-link" href="#"><div>HISTORY (<?php echo $tott; ?>)</div></a>
              <ul class="sub-menu-container">
                <?php
                $totu2=0;
                $userku2=$_SESSION["username"];
                $sqluku2 = "SELECT * FROM jual where user_id='$userku2'";
                  $queryuku2 = mysqli_query($conn, $sqluku2);
                     while($amkuuku2 = mysqli_fetch_array($queryuku2)){
                       $totu2=$totu2+1;

                     }
                        ?>
                <li class="menu-item"><a class="menu-link"  href="paidlist.php?#tost">Paid Transaction</a>

                </li>
                <li class="menu-item"><a class="menu-link" href="unpaidlist.php?#tost"><div>Unpaid Transaction (<?php echo $totu2; ?>)</div></a>

                </li>
                <?php
                $totu21=0;
                $userku21=$_SESSION["username"];
                $sqluku21 = "SELECT * FROM ijual where user_id='$userku21'";
                  $queryuku21 = mysqli_query($conn, $sqluku21);
                     while($amkuuku21 = mysqli_fetch_array($queryuku21)){
                       $totu21=$totu21+1;

                     }

                        ?>
                <li class="menu-item"><a class="menu-link" href="indentlist.php?#tost"><div>Indent Transaction  (<?php echo $totu21; ?>)</div></a>

                </li>



                </ul>
            </li>	</ul>

        </nav><!-- #primary-menu end -->

        <form class="top-search-form" action="include/ajax/shop-item.php?kode=" method="get" data-lightbox="ajax">
          <input type="text" name="kode" id="kode" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
        </form>

      </div>
    </div>
  </div>
</header>

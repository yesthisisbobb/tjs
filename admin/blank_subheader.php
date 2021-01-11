<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row">
            <li class="nav-item align-self-center page-heading">
                <div class="page-header">
                  <?php

                  if ($hal=="divisi")
                  { ?>
                       <h4 style="color:#5DADE2;">COMPANY <span style="font-size:12px;">Perusahaan</span> <a href="master_divisi.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php } else if ($hal=="perusahaan") {?>
                    <h4 style="color:#5DADE2;">Divisi <span style="font-size:12px;">Divisi</span> <a href="master_perusahaan.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }  else if ($hal=="sup") {?>
                    <h4 style="color:#5DADE2;">Supplier <span style="font-size:12px;">Pemasok</span> <a href="master_supplier.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="merk") {?>
                    <h4 style="color:#5DADE2;">Brand<span style="font-size:12px;"> Merk</span> <a href="master_merk.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="grup") {?>
                    <h4 style="color:#5DADE2;">Product Category<span style="font-size:12px;"> Kategori Produk</span> <a href="master_grup.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="subgrup") {?>
                    <h4 style="color:#5DADE2;">Product Sub Category<span style="font-size:12px;"> Sub Kategori Produk</span> <a href="master_sub_grup.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="subgrupdtl") {?>
                    <h4 style="color:#5DADE2;">Product Grup<span style="font-size:12px;"> Grup Produk</span> <a href="master_sub_grupdtl.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="surface") {?>
                    <h4 style="color:#5DADE2;">Surface<span style="font-size:12px;"> Permukaan</span> <a href="master_surface.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="color") {?>
                    <h4 style="color:#5DADE2;">Colour<span style="font-size:12px;"> Warna</span> <a href="master_color.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="pattern") {?>
                    <h4 style="color:#5DADE2;">Pattern<span style="font-size:12px;"> Pola</span> <a href="master_pattern.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="grade") {?>
                    <h4 style="color:#5DADE2;">Grade<span style="font-size:12px;"> Kualitas</span> <a href="master_grade.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="hscode") {?>
                    <h4 style="color:#5DADE2;">HS Code<span style="font-size:12px;"> HS Code</span> <a href="master_hscode.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="unit") {?>
                    <h4 style="color:#5DADE2;">Unit<span style="font-size:12px;"> Satuan</span> <a href="master_unit.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="ll") {?>
                    <h4 style="color:#5DADE2;">Loading Limit<span style="font-size:12px;"> Kapasitas Muat</span> <a href="master_ll.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="cur") {?>
                    <h4 style="color:#5DADE2;">Currency<span style="font-size:12px;"> Mata Uang</span> <a href="master_cur.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="exrate") {?>
                    <h4 style="color:#5DADE2;">Selling Exchange Rate<span style="font-size:12px;"> Konversi Mata Uang untuk Jual</span> <a href="master_cur.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="buy") {?>
                    <h4 style="color:#5DADE2;">Buying Price<span style="font-size:12px;"> Harga Beli</span> <a href="master_buy.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="agent") {?>
                    <h4 style="color:#5DADE2;">Agent<span style="font-size:12px;"> Agen</span> <a href="master_buy.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="freight") {?>
                    <h4 style="color:#5DADE2;">Freight <span style="font-size:12px;"> Kargo</span> <a href="master_buy.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4>
                  <?php }else if ($hal=="soc") {?>
                    <h4 style="color:#5DADE2;">Sales Order Confirmation <span style="font-size:12px;"> Konfirmasi Order</span> </h4>
                  <?php }?>
                </div>
            </li>
        </ul>

        <ul class="navbar-item flex-row navbar-dropdown">
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
            <?php
            if ($_SESSION["username"]==""){
            ?>
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </a>
            <?php   } else {?>
              <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php
                $nama=$_SESSION["username"];

                $sqlp= "SELECT * FROM login where email='$nama'";
                     $queryp = mysqli_query($conn, $sqlp);

                     while($amp = mysqli_fetch_array($queryp)){
                       $gam=$amp['gam'];
                       $namanya=$amp['nama'];
                       $email=$amp['email'];
                       $role=$amp['role'];
                       $divisi=$amp['divisi2'];
                       $divisi2=$amp['divisi'];

                     }
                       ?>

                       <img class="rounded-circle mt-0 ml-0" src="<?php echo $admin_url; ?>/<?php echo $gam; ?>" width="50" height="50">

              </a>
            <?php } ?>
            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                <div class="">
                  <div class="dropdown-item">
                <p style="color:black;"><b>Welcome, <?php echo strtoupper($namanya); ?>
                </p></b>
                  </div>
                  <div class="dropdown-item">
                    <p style="color:black;"><b>
                      <?php echo "You are:"." ".strtoupper($role)?>
                </p></b>
                  </div>
                  <div class="dropdown-item">
                    <p style="color:black;"><b>
                      <?php echo "Status: ".strtoupper($divisi2) ?>
                </p></b>
                  </div>
                  <div class="dropdown-item">
                    <p style="color:black;"><b>
                      <?php echo strtoupper($divisi); ?>
                </p></b>
                  </div>
                    <!-- <div class="dropdown-item">
                        <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                    </div> -->
                    <div class="dropdown-item-1">
                       <div class="row">
 <div class="col-sm-6">
                        <a href="#" data-toggle="tooltip" title="INBOX" style="font-family:Digital-7;font-size:20px; text-align: center; color:black;"><i class="fas fa-inbox"></i></a>
</div>
<div class="col-sm-6">
                       <a href="<?=$base_url?>/logout.php" data-toggle="tooltip1" title="SIGN OUT" style="font-family:Digital-7;font-size:20px; text-align: center; color:black;"><i class="fas fa-sign-out-alt"></i></a>
</div>
</div>
                    </div>

                    <!-- <div class="dropdown-item">
                        <a class="" href="../../logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                    </div> -->
                </div>
            </div>
            </li>
        </ul>
    </header>
</div>

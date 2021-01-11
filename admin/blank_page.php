<head>
  <script>
  function addZero(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
function startTime() {
  var today = new Date();
  var h = addZero(today.getHours());
  var m =today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</head>
<body onload="startTime()">>
<?php
 
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
        <!--  BEGIN SIDEBAR  -->
        <?php
        $un=$_SESSION["username"];
          $sql = "SELECT * FROM login where email='$un'";
               $query = mysqli_query($conn, $sql);
               while($amku = mysqli_fetch_array($query)){
                 $divisi=$amku["divisi"];
               }

          ?>
        <div class="sidebar-wrapper sidebar-theme mt-0">
            <nav id="sidebar">
              <div id="txt" style="font-family:roboto;font-size:40px; text-align: left; color:aqua;padding-left:35px; margin-top: 20px; padding-bottom:0px;"></div>
              <div style="font-size:14px; color:aqua; text-align: left;padding-left:40px; padding-top: 0px; margin-top: -10px;padding-bottom:10px;"> <?php echo date("D").", ".date("d-M-y"); ?></div>

<?php
                if ($divisi=="PURCHASING")
                {
                 ?>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                                <i class="fa fa-book" style="font-size:20px"></i>
                                <span>  Documentation</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg> -->
                                  <i class="fa fa-cog" style="font-size:20px"></i>
                                <span>Setup</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="submenu" data-parent="#accordionExample">

                            <li>
                                <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Product Structure <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2">
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/divisi/master_divisi.php"> Business Company</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/perusahaan/master_perusahaan.php"> Division</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/supplier/master_supplier.php"> Supplier</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/merk/master_merk.php"> Brands </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/mastergrup/master_grup.php"> Category </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/mastergrup/master_sub_grup.php"> Sub Category </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/mastergrup/master_sub_grupdtl.php"> Product Group </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo $admin_url; ?>/surface/master_surface.php"> Surface </a>
                                    </li>
                                    <li>
                                      <a href="<?php echo $admin_url; ?>/color/master_color.php"> Colour </a>
                                    </li>
                                    <li>
                                          <a href="<?php echo $admin_url; ?>/pattern/master_pattern.php">Pattern </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/grade/master_grade.php"> Grade </a>
                                    </li>
                                    <li>
                                          <a href="<?php echo $admin_url; ?>/hscode/master_hscode.php"> HS Code </a>
                                    </li>


                                    <li>
                                        <a href="<?php echo $admin_url; ?>/unit/master_unit.php"> Unit </a>
                                    </li>
                                    <li>
                                          <a href="<?php echo $admin_url; ?>/ll/master_ll.php"> Loading Limit </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#sm2a" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> COGS  Structure<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="sm2a" data-parent="#submenu2">
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/cur/master_cur.php"> Currency</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/exrate/master_exrate.php"> Buy Rate</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/buy/master_buy.php"> Buy Price</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/agent/master_agent.php"> Agent Fee</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/hpp/master_freight.php"> Freight</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/hpp/master_is.php"> Import System</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/exrate/master_exrate1.php"> EMKL USD Exchange Rate</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $admin_url; ?>/hpp/master_emkl.php"> EMKL</a>
                                    </li>


                                  </ul>
                                </li>
                                <li>
                                    <a href="<?php echo $admin_url; ?>/tipe/master_tipe.php"> MKT COGS Structure </a>
                                </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> -->
                                <i class="fa fa-cubes" style="font-size:20px"></i>
                                <span>Stock</span>

                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                            <li>
                                <a href="<?php echo $admin_url; ?>/tipe/master_tipe.php"> Product Detail </a>
                            </li>
                            <li>
                                <a href="<?php echo $admin_url; ?>/stok/master_stok.php"> Product Code </a>
                            </li>
                            <!-- <li> -->
                                <!-- <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Submenu 2 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a> -->
                                <!-- <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2">
                                    <li>
                                        <a href="javascript:void(0);"> Sub-Submenu 1 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"> Sub-Submenu 2 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"> Sub-Submenu 3 </a>
                                    </li>
                                </ul> -->
                            <!-- </li> -->
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#starter-kit" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                <i class="fa fa-tag" style="font-size:20px"></i>
                                <span>Price</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>

                        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="starter-kit" data-parent="#accordionExample">
                            <li class="active">
                              <a href="<?php echo $admin_url; ?>/hpp/master_hpp.php"> COGS </a>
                            </li>
                            <li>
                                  <a href="<?php echo $admin_url; ?>/price/master_cost.php"> MKT COGS/HPP MKT </a>
                            </li>
                            <li>
                                  <a href="<?php echo $admin_url; ?>/price/master_pp.php"> PRICING POLICY </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#menu40" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                <i class="fa fa-warehouse" style="font-size:20px"></i>
                                <span>Report</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>

                        <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu40" data-parent="#accordionExample">
                            <li class="active">
                                  <a href="<?php echo $admin_url; ?>/laporan/l_stok.php"  target="_blank"> Stock Report</a>
                            </li>

                        </ul>

                    </li>

                  <?php }
                  else if ($divisi=="SALES")
                      { ?>

                      <div class="shadow-bottom"></div>
                      <ul class="list-unstyled menu-categories" id="accordionExample">
                      <li class="menu">
                          <a href="#menu6" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                  <i class="fa fa-people-arrows" style="font-size:20px"></i>
                                  <span>Sales & Marketing</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                              </div>
                          </a>

                          <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu6" data-parent="#accordionExample">
                            <li class="active">
                                <a href="<?php echo $admin_url; ?>/sales_marketing/master_team.php"> Team </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo $admin_url; ?>/sales_marketing/master_stage.php"> Stage </a>
                            </li>
                              <li class="active">
                                  <a href="<?php echo $admin_url; ?>/sales_marketing/master_kontak.php"> Kontak </a>
                              </li>
                            
                              <li class="active">
                                  <a href="<?php echo $admin_url; ?>/sales_marketing/master_deals.php"> Deals </a>
                              </li>
                              <li class="active">
                                  <a href="<?php echo $admin_url; ?>/sales_marketing/master_activities.php"> Activities </a>
                              </li>

                          </ul>
                      </li>
                      </ul>
                        <?php }


                  else if ($divisi=="SUPERUSER")
                   { ?>
                     <div class="shadow-bottom"></div>
                     <ul class="list-unstyled menu-categories" id="accordionExample">


                         <li class="menu">
                             <a href="#submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                 <div class="">
                                     <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg> -->
                                       <i class="fa fa-cog" style="font-size:20px"></i>
                                     <span>Setup</span>
                                 </div>
                                 <div>
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                 </div>
                             </a>
                             <ul class="collapse submenu list-unstyled" id="submenu" data-parent="#accordionExample">

                                 <li>
                                     <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Product Structure <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                     <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2">
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/divisi/master_divisi.php"> Business Company</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/perusahaan/master_perusahaan.php"> Division</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/supplier/master_supplier.php"> Supplier</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/merk/master_merk.php"> Brands </a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/mastergrup/master_grup.php"> Category </a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/mastergrup/master_sub_grup.php"> Sub Category </a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/mastergrup/master_sub_grupdtl.php"> Product Group </a>
                                         </li>
                                         <li>
                                           <a href="<?php echo $admin_url; ?>/surface/master_surface.php"> Surface </a>
                                         </li>
                                         <li>
                                           <a href="<?php echo $admin_url; ?>/color/master_color.php"> Colour </a>
                                         </li>
                                         <li>
                                               <a href="<?php echo $admin_url; ?>/pattern/master_pattern.php">Pattern </a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/grade/master_grade.php"> Grade </a>
                                         </li>
                                         <li>
                                               <a href="<?php echo $admin_url; ?>/hscode/master_hscode.php"> HS Code </a>
                                         </li>


                                         <li>
                                             <a href="<?php echo $admin_url; ?>/unit/master_unit.php"> Unit </a>
                                         </li>
                                         <li>
                                               <a href="<?php echo $admin_url; ?>/ll/master_ll.php"> Loading Limit </a>
                                         </li>
                                     </ul>
                                 </li>
                                 <li>
                                     <a href="#sm2a" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> COGS  Structure<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                     <ul class="collapse list-unstyled sub-submenu" id="sm2a" data-parent="#submenu2">
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/cur/master_cur.php"> Currency</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/exrate/master_exrate.php"> Buy Rate</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/buy/master_buy.php"> Buy Price</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/agent/master_agent.php"> Agent Fee</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/hpp/master_freight.php"> Freight</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/hpp/master_is.php"> Import System</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/exrate/master_exrate1.php"> EMKL USD Exchange Rate</a>
                                         </li>
                                         <li>
                                             <a href="<?php echo $admin_url; ?>/hpp/master_emkl.php"> EMKL</a>
                                         </li>


                                       </ul>
                                     </li>
                                     <li>
                                         <a href="<?php echo $admin_url; ?>/cost/master_cost.php"> MKT COGS Structure </a>
                                     </li>
                             </ul>
                         </li>

                         <li class="menu">
                             <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                 <div class="">
                                     <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> -->
                                     <i class="fa fa-cubes" style="font-size:20px"></i>
                                     <span>Stock</span>

                                 </div>
                                 <div>
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                 </div>
                             </a>
                             <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                                 <li>
                                     <a href="<?php echo $admin_url; ?>/tipe/master_tipe.php"> Product Detail </a>
                                 </li>
                                 <li>
                                     <a href="<?php echo $admin_url; ?>/stok/master_stok.php"> Product Code </a>
                                 </li>
                                 <!-- <li> -->
                                     <!-- <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Submenu 2 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a> -->
                                     <!-- <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2">
                                         <li>
                                             <a href="javascript:void(0);"> Sub-Submenu 1 </a>
                                         </li>
                                         <li>
                                             <a href="javascript:void(0);"> Sub-Submenu 2 </a>
                                         </li>
                                         <li>
                                             <a href="javascript:void(0);"> Sub-Submenu 3 </a>
                                         </li>
                                     </ul> -->
                                 <!-- </li> -->
                             </ul>
                         </li>

                         <li class="menu">
                             <a href="#starter-kit" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                                 <div class="">
                                     <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                     <i class="fa fa-tag" style="font-size:20px"></i>
                                     <span>Price</span>
                                 </div>
                                 <div>
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                 </div>
                             </a>

                             <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="starter-kit" data-parent="#accordionExample">
                                 <li class="active">
                                   <a href="<?php echo $admin_url; ?>/hpp/master_hpp.php"> COGS </a>
                                 </li>
                                 <li>
                                       <a href="<?php echo $admin_url; ?>/price/master_cost.php"> MKT COGS/HPP MKT </a>
                                 </li>
                                 <li>
                                       <a href="<?php echo $admin_url; ?>/price/master_pp.php"> PRICING POLICY </a>
                                 </li>

                             </ul>
                         </li>

                      <li class="menu">
                          <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                              <div class="">
                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                                  <i class="fa fa-house-user" style="font-size:20px"></i>
                                  <span> Customer</span>
                              </div>
                          </a>
                        </li>
                      <li class="menu">
                          <a href="#menu5" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                  <i class="fa fa-arrow-alt-circle-down" style="font-size:20px"></i>
                                  <span>Purchase</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                              </div>
                          </a>
                          <?php
                          $cq2=0;
                          $total2=0;
                          $sqlq2 = "SELECT * FROM ijual";
                               $queryq2 = mysqli_query($conn, $sqlq2);
                               while($amq2 = mysqli_fetch_array($queryq2)){
                                 $cq2=$cq2+1;
                                 $total2=$total2+$amq2['grand_total'];
                               }
                               ?>

                          <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu5" data-parent="#accordionExample">
                              <li class="active">
                                  <a href="<?php echo $admin_url;?>/salesku/polist.php"> Purchase Order <span class="badge badge-pills badge-primary"><?php echo $cq2; ?><span></a>
                              </li>

                          </ul>
                      </li>
                      <li class="menu">
                          <a href="#menu4" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                  <i class="fa fa-arrow-alt-circle-up" style="font-size:20px"></i>
                                  <span>Selling</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                              </div>
                          </a>
                          <?php
                          $cq=0;
                          $total=0;
                          $sqlq = "SELECT * FROM jualq";
                               $queryq = mysqli_query($conn, $sqlq);
                               while($amq = mysqli_fetch_array($queryq)){
                                 $cq=$cq+1;
                                 $total=$total+$amq['grand_total'];
                               }
                               ?>
                               <?php
                               $cq1=0;
                               $total1=0;
                               $sqlq1 = "SELECT * FROM jual";
                                    $queryq1 = mysqli_query($conn, $sqlq1);
                                    while($amq1 = mysqli_fetch_array($queryq1)){
                                      $cq1=$cq1+1;
                                      $total1=$total1+$amq1['grand_total'];
                                    }
                                    ?>
                                    <?php
                                    $cq3=0;

                                    $sqlq3= "SELECT * FROM do";
                                         $queryq3 = mysqli_query($conn, $sqlq3);
                                         while($amq3 = mysqli_fetch_array($queryq3)){
                                           $cq3=$cq3+1;

                                         }
                                         ?>
                                         <?php
                                         $cq4=0;

                                         $sqlq4= "SELECT * FROM inv";
                                              $queryq4 = mysqli_query($conn, $sqlq4);
                                              while($amq4 = mysqli_fetch_array($queryq4)){
                                                $cq4=$cq4+1;

                                              }
                                              ?>



                          <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu4" data-parent="#accordionExample">
                              <li class="active">
                                  <a href="<?php echo $admin_url;?>/salesku/quotationlist.php"> Quotation <span class="badge badge-pills badge-primary"><?php echo $cq; ?><span></a>
                              </li>
                              <li>
                                <a href="<?php echo $admin_url;?>/salesku/solist.php"> Sales Order <span class="badge badge-pills badge-primary"><?php echo $cq1; ?><span></a>

                              </li>
                              <li>
                                  <a href="<?php echo $admin_url;?>/salesku/invlistall.php"> Invoice List <span class="badge badge-pills badge-primary"><?php echo $cq4; ?><span> </a>
                              </li>
                              <li>
                                  <a href="<?php echo $admin_url;?>/salesku/dolistall.php"> DO list <span class="badge badge-pills badge-primary"><?php echo $cq3; ?><span> </a>
                              </li>

                          </ul>
                      </li>
                      <li class="menu">
                          <a href="#menu6" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                  <i class="fa fa-people-arrows" style="font-size:20px"></i>
                                  <span>Sales & Marketing</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                              </div>
                          </a>

                          <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu6" data-parent="#accordionExample">
                              <li class="active">
                                  <a href="starter_kit_blank_page.html"> Blank Page </a>
                              </li>
                              <li>
                                  <a href="starter_kit_boxed.html"> Boxed </a>
                              </li>
                              <li>
                                  <a href="starter_kit_collapsible_menu.html"> Collapsible </a>
                              </li>
                          </ul>
                      </li>
                      <li class="menu">
                          <a href="#menu7" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                  <i class="fa fa-id-badge" style="font-size:20px"></i>
                                  <span>HRD</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                              </div>
                          </a>

                          <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu7" data-parent="#accordionExample">
                              <li class="active">
                                  <a href="starter_kit_blank_page.html"> Blank Page </a>
                              </li>
                              <li>
                                  <a href="starter_kit_boxed.html"> Boxed </a>
                              </li>
                              <li>
                                  <a href="starter_kit_collapsible_menu.html"> Collapsible </a>
                              </li>
                          </ul>
                      </li>
                      <li class="menu">
                          <a href="#menu8" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                              <div class="">
                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                  <i class="fa fa-file-invoice" style="font-size:20px"></i>
                                  <span>Finance & Accounting</span>
                              </div>
                              <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                              </div>
                          </a>

                          <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu8" data-parent="#accordionExample">
                              <li class="active">
                                  <a href="starter_kit_blank_page.html"> Blank Page </a>
                              </li>
                              <li>
                                  <a href="starter_kit_boxed.html"> Boxed </a>
                              </li>
                              <li>
                                  <a href="starter_kit_collapsible_menu.html"> Collapsible </a>
                              </li>
                          </ul>
                      </li>

                        <li class="menu">
                            <a href="#menu40" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                                <div class="">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                    <i class="fa fa-warehouse" style="font-size:20px"></i>
                                    <span>Report</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>

                            <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu40" data-parent="#accordionExample">
                                <li class="active">
                                      <a href="<?php echo $admin_url; ?>/laporan/l_stok.php"  target="_blank"> Stock Report</a>
                                </li>

                            </ul>
                        </li>
                        <li class="menu">
                            <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                                    <i class="fa fa-book" style="font-size:20px"></i>
                                    <span>  Guideline</span>
                                </div>
                            </a>
                        </li>


                      <?php } else if ($divisi=="ACTS")
                      { ?>

                      <div class="shadow-bottom"></div>
                      <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu">
                            <a href="#menu41" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                                <div class="">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg> -->
                                    <i class="fa fa-warehouse" style="font-size:20px"></i>
                                    <span>ACTS</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled" id="menu41" data-parent="#accordionExample">
                                <li class="active">
                                      <a href="<?php echo $admin_url; ?>/acts/master_customer.php"  target="_blank">Transaction History</a>
                                </li>
                                <li>
                                      <a href="<?php echo $admin_url; ?>/laporan/l_stok.php"  target="_blank">Customer List</a>
                                </li>

                            </ul>

                        </li>
                      </ul>
                        <?php }
                          ?>



                </ul>
            </nav>

        </div>
      </body>
      </html>
        <!--  END SIDEBAR  -->

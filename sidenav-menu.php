<!-- begin #sidebar -->

      <div id="sidebar" class="sidebar" data-disable-slide-animation="true">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
          <!-- begin sidebar user -->
          <ul class="nav">
            <li class="nav-profile">
              <a href="javascript:;" data-toggle="nav-profile">
                <div class="cover with-shadow"></div>
                <div class="image">
                  <img src="<?=$base_url;?>/assets/img/customer_toko/no_image.jpg" alt="" />
                </div>
                <div class="info">
                  <b class="caret pull-right"></b>
                  Level : <?=$pengguna["level"]."-".$pengguna["divisi2"];?>
                  <small><?=$pengguna["email"];?></small><br>





                </div>
              </a>
            </li>
            <li>
              <ul class="nav nav-profile">
                <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
              </ul>
            </li>
          </ul>
          <!-- end sidebar user -->
          <!-- begin sidebar nav -->
          <?php
          if ($pengguna["role"]=="manager")
          {
          ?>
          <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub">
              <a href="javascript:;">
                <a href="<?=$admin_url;?>">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
              </a>
            </li>



          <li class="has-sub">
            <a href="javascript:;">
                  <b class="caret"></b>
                <i class="material-icons">list</i>
                <span>Sales</span>
            </a>
            <?php
            $k=$pengguna["id"];
            $a=0;
            $sql="SELECT * FROM jual";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)) {
                $a=$a+1;
            }
            ?>
            <?php
            $b=0;
            $sql1="SELECT * FROM masterpo";
            $result1 = mysqli_query($conn,$sql1);
            while($row1 = mysqli_fetch_array($result1)) {
                $b=$b+1;
            }
            $c=0;
            $sql2="SELECT * FROM ijual";
            $result2 = mysqli_query($conn,$sql2);
            while($row2 = mysqli_fetch_array($result2)) {
                $c=$c+1;
            }
            ?>
            <ul class="sub-menu">
              <li class="has-sub">
              <li><a href="<?=$admin_url;?>/admin/so_in.php">SO List(<?php echo $a; ?>)</a></li>
              <li><a href="<?=$admin_url;?>/admin/so_in_i.php">SO Indet List(<?php echo $c; ?>)</a></li>
              <li><a href="<?=$admin_url;?>/admin/so_report.php">Sales Report</a></li>
              <!-- <li><a href="<?=$admin_url;?>/katgdg//master_katgdg.php">Kategori Gudang</a></li>
              <li><a href="<?=$admin_url;?>/cellgdg/master_cell.php">Master Cell Gudang</a></li> -->

            </li>
            </ul>
</li>
<li class="has-sub">
  <a href="javascript:;">
        <b class="caret"></b>
      <i class="material-icons">list</i>
      <span>Purchasing</span>
  </a>
  <?php
  $k=$pengguna["id"];
  $a=0;
  $sql="SELECT * FROM jual";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)) {
      $a=$a+1;
  }
  ?>
  <?php
  $b=0;
  $sql1="SELECT * FROM masterpo";
  $result1 = mysqli_query($conn,$sql1);
  while($row1 = mysqli_fetch_array($result1)) {
      $b=$b+1;
  }
  ?>
  <ul class="sub-menu">
    <li class="has-sub">
    <li><a href="<?=$admin_url;?>/admin/po_in.php">PO List(<?php echo $b; ?>)</a></li>
    <!-- <li><a href="<?=$admin_url;?>/katgdg//master_katgdg.php">Kategori Gudang</a></li>
    <li><a href="<?=$admin_url;?>/cellgdg/master_cell.php">Master Cell Gudang</a></li> -->

  </li>
  </ul>
</li>
          <!-- <li class="has-sub">
            <a href="javascript:;">
                  <b class="caret"></b>
                <i class="material-icons">list</i>
                <span>Master Data</span>
            </a>
            <ul class="sub-menu">
              <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Master Customer
                    </a>

                <ul class="sub-menu">
                  <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/customer_retail_list.php">Master Retail</a></li>
                  <li><a href="<?=$admin_url;?>/customer_project_list.php">Master Project</a></li>
                  <li><a href="<?=$admin_url;?>/customer_toko_list.php">Master Toko</a></li>
                  <li><a href="<?=$admin_url;?>/toko/master_groupentry.php">Master Grouping</a></li>

                </li>
                </ul>
              </li>
          </ul>

</li> -->
        <!-- end class nav -->      </ul>




              <!-- php sales -->
              <?php
            }
          else
          if ($pengguna["role"]=="admin1")
          {
          ?>
          <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub">
              <a href="javascript:;">
                <a href="<?=$admin_url;?>">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
              </a>
            </li>



          <li class="has-sub">
            <a href="javascript:;">
                  <b class="caret"></b>
                <i class="material-icons">list</i>
                <span>Sales</span>
            </a>
            <?php
            $k=$pengguna["id"];
            $a=0;
            $sql="SELECT * FROM jual";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)) {
                $a=$a+1;
            }
            ?>
            <?php
            $b=0;
            $sql1="SELECT * FROM masterpo";
            $result1 = mysqli_query($conn,$sql1);
            while($row1 = mysqli_fetch_array($result1)) {
                $b=$b+1;
            }
            $c=0;
            $sql2="SELECT * FROM ijual";
            $result2 = mysqli_query($conn,$sql2);
            while($row2 = mysqli_fetch_array($result2)) {
                $c=$c+1;
            }
            ?>
            <ul class="sub-menu">
              <li class="has-sub">
              <li><a href="<?=$admin_url;?>/admin/so_in.php">SO List(<?php echo $a; ?>)</a></li>
              <li><a href="<?=$admin_url;?>/admin/so_in_i.php">SO Indet List(<?php echo $c; ?>)</a></li>
              <li><a href="<?=$admin_url;?>/admin/so_report.php">Sales Report</a></li>
              <!-- <li><a href="<?=$admin_url;?>/katgdg//master_katgdg.php">Kategori Gudang</a></li>
              <li><a href="<?=$admin_url;?>/cellgdg/master_cell.php">Master Cell Gudang</a></li> -->

            </li>
            </ul>
</li>
<li class="has-sub">
  <a href="javascript:;">
        <b class="caret"></b>
      <i class="material-icons">list</i>
      <span>Purchasing</span>
  </a>
  <?php
  $k=$pengguna["id"];
  $a=0;
  $sql="SELECT * FROM jual";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)) {
      $a=$a+1;
  }
  ?>
  <?php
  $b=0;
  $sql1="SELECT * FROM masterpo";
  $result1 = mysqli_query($conn,$sql1);
  while($row1 = mysqli_fetch_array($result1)) {
      $b=$b+1;
  }
  ?>
  <ul class="sub-menu">
    <li class="has-sub">
    <li><a href="<?=$admin_url;?>/admin/po_in.php">PO List(<?php echo $b; ?>)</a></li>
    <!-- <li><a href="<?=$admin_url;?>/katgdg//master_katgdg.php">Kategori Gudang</a></li>
    <li><a href="<?=$admin_url;?>/cellgdg/master_cell.php">Master Cell Gudang</a></li> -->

  </li>
  </ul>
</li>
          <!-- <li class="has-sub">
            <a href="javascript:;">
                  <b class="caret"></b>
                <i class="material-icons">list</i>
                <span>Master Data</span>
            </a>
            <ul class="sub-menu">
              <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Master Customer
                    </a>

                <ul class="sub-menu">
                  <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/customer_retail_list.php">Master Retail</a></li>
                  <li><a href="<?=$admin_url;?>/customer_project_list.php">Master Project</a></li>
                  <li><a href="<?=$admin_url;?>/customer_toko_list.php">Master Toko</a></li>
                  <li><a href="<?=$admin_url;?>/toko/master_groupentry.php">Master Grouping</a></li>

                </li>
                </ul>
              </li>
          </ul>

</li> -->
        <!-- end class nav -->      </ul>




              <!-- php sales -->
              <?php
            }
          else
          if ($pengguna["role"]=="admin")
          {
          ?>
          <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub">
              <a href="javascript:;">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
              </a>
            </li>



            <li class="has-sub">
              <a href="javascript:;">
                <i class="material-icons">list</i>
                    <b class="caret"></b>
                      Master Setup
                  </a>

              <ul class="sub-menu">
                <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/divisi/master_divisi.php">Business Company</a></li>
                  <li><a href="<?=$admin_url;?>/perusahaan/master_perusahaan.php">Business Category</a></li>
                  <li><a href="<?=$admin_url;?>/perusahaan/master_perusahaan1.php">Import Company</a></li>
                  <li><a href="<?=$admin_url;?>/merk/master_merk.php">Master Brand</a></li>
                  <li><a href="<?=$admin_url;?>/supplier/master_supplier.php">Master Suplier</a></li>
                  <li><a href="<?=$admin_url;?>/mc/master_mc.php">Material Class</a></li>
                  <li><a href="<?=$admin_url;?>/grade/master_grade.php">Product Grade</a></li>
                  <li><a href="<?=$admin_url;?>/hscode/master_hscode.php">HS Code</a></li>
                  <li><a href="<?=$admin_url;?>/mastergrup/master_grup.php">Product Category</a></li>
                  <li><a href="<?=$admin_url;?>/mastergrup/master_sub_grup.php">Product Sub Category</a></li>
                  <li><a href="<?=$admin_url;?>/mastergrup/master_sub_grupdtl.php">Product Group</a></li>
                  <li><a href="<?=$admin_url;?>/surface/master_surface.php">Surface</a></li>

                  <li><a href="<?=$admin_url;?>/color/master_color.php">Color</a></li>
                  <li><a href="<?=$admin_url;?>/pattern/master_pattern.php">Pattern</a></li>
                  <li><a href="<?=$admin_url;?>/unit/master_unit.php">Unit</a></li>
                  <li><a href="<?=$admin_url;?>/ll/master_ll.php">Loading Limit</a></li>




              </li>
              </ul>
            </li>



            <li class="has-sub">
              <a href="javascript:;">
                  <i class="material-icons">list</i>
                    <b class="caret"></b>
                      Master Stock
                  </a>
              <ul class="sub-menu">
                <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/tipe/master_tipe.php">Master Product Type</a></li>
                  <li><a href="<?=$admin_url;?>/stok/master_stok.php">Stock</a></li>
              </li>
              </ul>
            </li>
              <!-- <li class="has-sub">
                      <a href="javascript:;">
                          <i class="material-icons">list</i>
                            <b class="caret"></b>
                              Master Purchasing
                          </a>
                      <ul class="sub-menu">
                        <li class="has-sub">
                        <li><a href="<?=$admin_url;?>/hpp/master_hpp.php">Master COGS</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_rate.php">Master Rate</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_tax.php">Master Import Tax</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_cont.php">Master Container</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_cont_dtl.php">Container Capacity</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_cont_prod.php">Product Unit Container</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_is.php">Master Import System</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_port.php">Master Port</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_freight.php">Master Freight</a></li>
                        <li><a href="<?=$admin_url;?>/hpp/master_emkl.php">Master EMKL</a></li>
                      </li>
                      </ul>
              </li> -->


            <!-- <ul class="sub-menu">
              <li class="has-sub">

                <a href="javascript:;">
                      <b class="caret"></b>
                        Penjualan
                    </a>
                </li>

                  <li class="has-sub">
                    <a href="javascript:;">
                          <b class="caret"></b>
                            Inventory
                        </a>
                    </li>
                    <li class="has-sub">
                      <a href="javascript:;">
                            <b class="caret"></b>
                              Gudang
                          </a>
                      </li>
              </ul></li> -->


</li>
          <!-- <li class="has-sub">
            <a href="javascript:;">
                  <b class="caret"></b>
                <i class="material-icons">list</i>
                <span>Master Data</span>
            </a>
            <ul class="sub-menu">
              <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Master Customer
                    </a>

                <ul class="sub-menu">
                  <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/customer_retail_list.php">Master Retail</a></li>
                  <li><a href="<?=$admin_url;?>/customer_project_list.php">Master Project</a></li>
                  <li><a href="<?=$admin_url;?>/customer_toko_list.php">Master Toko</a></li>
                  <li><a href="<?=$admin_url;?>/toko/master_groupentry.php">Master Grouping</a></li>

                </li>
                </ul>
              </li>
          </ul>

</li> -->
        <!-- end class nav -->      </ul>




              <!-- php sales -->
              <?php
            } else if ($pengguna["role"]=="gudang")
              {
              ?>
              <ul class="nav">
                <li class="nav-header">Navigation</li>
                <li class="has-sub">
                  <a href="javascript:;">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                  </a>
                </li>



              <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                    <i class="material-icons">list</i>
                    <span>Warehouse</span>
                </a>
                <?php

                $a=0;
                $sql="SELECT * FROM do where status='OPEN'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)) {
                    $a=$a+1;
                }
                ?>
                <ul class="sub-menu">
                  <li class="has-sub">


                  <li><a href="<?=$admin_url;?>/wh/do_in.php">Delivery Order(DO)(<?php echo $a; ?>)</a></li>
                  <li><a href="<?=$admin_url;?>/wh/master_vtruk.php">Virtual Truck</a></li>
                  <li><a href="<?=$admin_url;?>/wh/master_truk.php">Truck</a></li>
                  <li><a href="<?=$admin_url;?>/wh/master_driver.php">Driver</a></li>


                </li>
                </ul>
              </li>
                 </ul>

               <?php } else if ($pengguna["role"]=="sales")
                   {
                   ?>
                   <ul class="nav">
                     <li class="nav-header">Navigation</li>
                     <li class="has-sub">
                       <a href="javascript:;">
                         <i class="material-icons">home</i>
                         <span>Dashboard</span>
                       </a>
                     </li>



                   <li class="has-sub">


                     <li class="has-sub">
                             <a href="javascript:;">
                                   <b class="caret"></b>
                                   <i class="material-icons">list</i>
                                   <span>Master CRM</span>
                                 </a>
                             <ul class="sub-menu">
                               <li class="has-sub">
                               <li><a href="<?=$admin_url;?>/customer/master_customer.php">Master Customer</a></li>
                               <li><a href="<?=$admin_url;?>/stage/master_stage.php">Master Stage</a></li>
                               <li><a href="<?=$admin_url;?>/tipetruk/master_tipe.php">Master Activity</a></li>
                               <li><a href="<?=$admin_url;?>/funnel/master_funnel.php">Master Funnel</a></li>
                               <li><a href="<?=$admin_url;?>/tipetruk/master_biaya.php">Master Biaya Transport</a></li>
                               <li><a href="<?=$admin_url;?>/tipetruk/master_biaya_lain.php">Master Biaya tambahan</a></li>
                               <li><a href="<?=$admin_url;?>/sopir/master_sopir.php">Master Sopir</a></li>
                                   <li><a href="<?=$admin_url;?>/status/master_status.php">Master Status</a></li>


                             </li>
                             </ul>

                       </li>

                   </li>
                      </ul>


                  <!-- php sales -->
                  <?php
                } else if ($pengguna["role"]=="mkt")
                  {
                  ?>
                  <ul class="nav">
                    <li class="nav-header">Navigation</li>
                    <li class="has-sub">
                      <a href="javascript:;">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                      </a>
                    </li>



                  <li class="has-sub">
                    <a href="javascript:;">
                          <b class="caret"></b>
                        <i class="material-icons">list</i>
                        <span>Sales & Marketing</span>
                    </a>
                    <?php

                    $a=0;
                    $sql="SELECT * FROM jual where status='Close' and status_payment='Paid'";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)) {
                        $a=$a+1;
                    }
                    ?>
                    <ul class="sub-menu">
                      <li class="has-sub">


                      <li><a href="<?=$admin_url;?>/wh/do_temp.php">Sales Order In(<?php echo $a; ?>)</a></li>



                    </li>
                    </ul>

          <?php
        } else if ($pengguna["role"]=="km")
          {
          ?>
          <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub">
              <a href="javascript:;">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
              </a>
            </li>
          <li><a href="<?=$admin_url;?>/data-pengguna.php"><i class="material-icons">date_range</i><span>User Ventura</span></i></a></li>


          <li class="has-sub">
            <a href="javascript:;">
                  <b class="caret"></b>
                <i class="material-icons">list</i>
                <span>Transaksi</span>
            </a>
            <ul class="sub-menu">
              <li class="has-sub">

                <a href="javascript:;">
                      <b class="caret"></b>
                        Penjualan
                    </a>
                </li>
                <!-- <li class="has-sub">
                        <a href="javascript:;">
                              <b class="caret"></b>
                                Master Purchasing
                            </a>
                        <ul class="sub-menu">
                          <li class="has-sub">
                          <li><a href="<?=$admin_url;?>/hpp/master_hpp.php">Master COGS</a></li>
                          <li><a href="<?=$admin_url;?>/uang//master_konversi.php">Master Konversi</a></li>


                        </li>
                        </ul>
                </li> -->
                  <li class="has-sub">
                    <a href="javascript:;">
                          <b class="caret"></b>
                            Inventory
                        </a>
                    </li>
                    <li class="has-sub">
                      <a href="javascript:;">
                            <b class="caret"></b>
                              Gudang
                          </a>
                      </li>
              </ul></li>



          <li class="has-sub">
            <a href="javascript:;">
                  <b class="caret"></b>
                <i class="material-icons">list</i>
                <span>Master Data</span>
            </a>
            <ul class="sub-menu">
              <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Master Setup
                        <ul class="sub-menu">
                          <li class="has-sub">
                            <a href="javascript:;">
                                  <b class="caret"></b>
                                  Master Setup Product
                                  <ul class="sub-menu">
                                    <li class="has-sub">
                                      <li><a href="<?=$admin_url;?>/divisi/master_divisi.php">Business Company</a></li>
                                      <li><a href="<?=$admin_url;?>/perusahaan/master_perusahaan.php">Business Category</a></li>
                                      <li><a href="<?=$admin_url;?>/merk/master_merk.php">Master Brand</a></li>
                                      <li><a href="<?=$admin_url;?>/mc/master_mc.php">Material Class</a></li>
                                      <li><a href="<?=$admin_url;?>/grade/master_grade.php">Product Grade</a></li>
                                      <li><a href="<?=$admin_url;?>/hscode/master_hscode.php">HS Code</a></li>
                                      <li><a href="<?=$admin_url;?>/mastergrup/master_grup.php">Product Category</a></li>
                                      <li><a href="<?=$admin_url;?>/mastergrup/master_sub_grup.php">Product Sub Category</a></li>
                                      <li><a href="<?=$admin_url;?>/mastergrup/master_sub_grupdtl.php">Product Group</a></li>
                                      <li><a href="<?=$admin_url;?>/surface/master_surface.php">Surface</a></li>
                                      <li><a href="<?=$admin_url;?>/glosy/master_glosy.php">Glossiness</a></li>
                                      <li><a href="<?=$admin_url;?>/color/master_color.php">Color</a></li>
                                      <li><a href="<?=$admin_url;?>/pattern/master_pattern.php">Pattern</a></li>
                                      <li><a href="<?=$admin_url;?>/unit/master_unit.php">Unit</a></li>
                                      <li><a href="<?=$admin_url;?>/ll/master_ll.php">Loading Limit</a></li>
                                  </li>
                                  </ul>
                            </li>
                            <li class="has-sub">
                              <a href="javascript:;">
                                    <b class="caret"></b>
                                    Master Setup COGS
                                    <ul class="sub-menu">
                                      <li class="has-sub">
                                        <li><a href="<?=$admin_url;?>/cur/master_cur.php">Currency</a></li>
                                        <li><a href="<?=$admin_url;?>/buy/master_buy.php">Buying Price</a></li>
                                        <li><a href="<?=$admin_url;?>/exrate/master_exrate.php">Rate/Division</a></li>
                                        <li><a href="<?=$admin_url;?>/agent/master_agent.php">Agent Fee</a></li>
                                        <li><a href="<?=$admin_url;?>/hpp/master_freight.php">Freight</a></li>
                                        <li><a href="<?=$admin_url;?>/hpp/master_is.php">Import System</a></li>
                                        <li><a href="<?=$admin_url;?>/exrate/master_exrate1.php">Rate EMKL</a></li>
                                        <li><a href="<?=$admin_url;?>/hpp/master_emkl.php">EMKL</a></li>
                                        <li><a href="<?=$admin_url;?>/perusahaan/master_contdoc.php">Cont/Doc</a></li>
                                        <li><a href="<?=$admin_url;?>/import/master_import.php">Import Duty</a></li>
                                        <li><a href="<?=$admin_url;?>/cost/master_cost.php">Cost</a></li>

                                    </li>
                                    </ul>
                              </li>

                          </ul>
                    </a>


              </li>
              <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Master Stock
                    </a>
                <ul class="sub-menu">
                  <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/tipe/master_tipe.php">Product Type</a></li>
                  <li><a href="<?=$admin_url;?>/stok/master_stok.php">Stock</a></li>
                  <!-- <li><a href="<?=$admin_url;?>/stok/master_shading_stok.php">Master Shading Stock</a></li>
				   <li><a href="<?=$admin_url;?>/ukuran/master_ukuran.php">Master Ukuran</a></li>
				   <li><a href="<?=$admin_url;?>/warna/master_warna.php">Master Warna</a></li>
           <li><a href="<?=$admin_url;?>/satuan/master_satuan.php">Master Satuan</a></li> -->
                </li>
                </ul>
              </li>
                <li class="has-sub">
                        <a href="javascript:;">
                              <b class="caret"></b>
                                Master Price
                        <ul class="sub-menu">
                          <li class="has-sub">
                          <li><a href="<?=$admin_url;?>/hpp/master_hpp.php">COGS</a></li>
                          <li><a href="<?=$admin_url;?>/price/master_cost.php">Pricing Policy</a></li>

                          <!-- <li><a href="<?=$admin_url;?>/hpp/master_rate.php">Master Rate</a></li>
                          <li><a href="<?=$admin_url;?>/hpp/master_tax.php">Master Import Tax</a></li>
                          <li><a href="<?=$admin_url;?>/hpp/master_cont.php">Master Container</a></li>
                          <li><a href="<?=$admin_url;?>/hpp/master_cont_dtl.php">Container Capacity</a></li>
                          <li><a href="<?=$admin_url;?>/hpp/master_cont_prod.php">Product Unit Container</a></li>

                          <li><a href="<?=$admin_url;?>/hpp/master_port.php">Master Port</a></li> -->

                        </li>
                        </ul>
                </li>
              <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Master Customer
                    </a>

                <ul class="sub-menu">
                  <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/customer_retail_list.php">Master Retail</a></li>
                  <li><a href="<?=$admin_url;?>/customer_project_list.php">Master Project</a></li>
                  <li><a href="<?=$admin_url;?>/customer_toko_list.php">Master Toko</a></li>
                  <li><a href="<?=$admin_url;?>/toko/master_groupentry.php">Master Grouping</a></li>

                </li>
                </ul>
              </li>

<li><a href="<?=$admin_url;?>/cabang/master_cabang.php">Master Cabang</a></li>
<li><a href="<?=$admin_url;?>/sales/master_sales.php">Master Sales</a></li>

<li class="has-sub">
        <a href="javascript:;">
              <b class="caret"></b>
                Master Currency
            </a>
        <ul class="sub-menu">
          <li class="has-sub">
          <li><a href="<?=$admin_url;?>/uang/master_uang.php">Master Currency</a></li>
          <li><a href="<?=$admin_url;?>/uang//master_konversi.php">Master Konversi</a></li>


        </li>
        </ul>
</li>

				<li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Master Gudang
                    </a>
                <ul class="sub-menu">
                  <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/gudang/master_gudang.php">Master Gudang</a></li>
                  <li><a href="<?=$admin_url;?>/katgdg//master_katgdg.php">Kategori Gudang</a></li>
                  <li><a href="<?=$admin_url;?>/cellgdg/master_cell.php">Master Cell Gudang</a></li>

                </li>
                </ul>
                <li class="has-sub">
                        <a href="javascript:;">
                              <b class="caret"></b>
                                Master Supplier
                            </a>
                        <ul class="sub-menu">
                          <li class="has-sub">
                          <li><a href="<?=$admin_url;?>/supplier/master_supplier.php">Master Suplier</a></li>
                          <li><a href="<?=$admin_url;?>/negara/master_negara.php">Master Negara</a></li>


                        </li>
                        </ul>


			  <!-- <li><a href="<?=$admin_url;?>/supplier/master_supplier.php">Master Suplier</a></li> -->


			  <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Master Transport
                    </a>
                <ul class="sub-menu">
                  <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/truk/master_truk.php">Master Transport</a></li>
                  <li><a href="<?=$admin_url;?>/vtruk/master_vtruk.php">Master Virtual Transport</a></li>
                  <li><a href="<?=$admin_url;?>/tipetruk/master_tipe.php">Master Tipe Transport</a></li>
                  <li><a href="<?=$admin_url;?>/tipetruk/master_biaya.php">Master Biaya Transport</a></li>
                  <li><a href="<?=$admin_url;?>/tipetruk/master_biaya_lain.php">Master Biaya tambahan</a></li>
                  <li><a href="<?=$admin_url;?>/sopir/master_sopir.php">Master Sopir</a></li>
                      <li><a href="<?=$admin_url;?>/status/master_status.php">Master Status</a></li>


                </li>
                </ul>

          </li>
          <li class="has-sub">
                  <a href="javascript:;">
                        <b class="caret"></b>
                          Master CRM
                      </a>
                  <ul class="sub-menu">
                    <li class="has-sub">
                    <li><a href="<?=$admin_url;?>/customer/master_customer.php">Master Customer</a></li>
                    <li><a href="<?=$admin_url;?>/stage/master_stage.php">Master Stage</a></li>
                    <li><a href="<?=$admin_url;?>/tipetruk/master_tipe.php">Master Activity</a></li>
                    <li><a href="<?=$admin_url;?>/tipetruk/master_biaya.php">Master Biaya Transport</a></li>
                    <li><a href="<?=$admin_url;?>/tipetruk/master_biaya_lain.php">Master Biaya tambahan</a></li>
                    <li><a href="<?=$admin_url;?>/sopir/master_sopir.php">Master Sopir</a></li>
                        <li><a href="<?=$admin_url;?>/status/master_status.php">Master Status</a></li>


                  </li>
                  </ul>

            </li>



            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->

          </ul>
          <li class="has-sub">
            <a href="javascript:;">
                  <b class="caret"></b>
                <i class="material-icons">list</i>
                <span>Report</span>
            </a>
            <ul class="sub-menu">
              <li class="has-sub">
                <li><a href="<?=$admin_url;?>/laporan/l_stok.php">Stock</a></li>
                </li>

                </ul></li>
              </ul>
<?php }?>


            </li>

          <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
      </div>
      <div class="sidebar-bg"></div>
      <!-- end #sidebar -->

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
                  Level : <?=$pengguna["level"];?>
                  <small><?=$pengguna["email"];?></small>
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
                <span>Sales</span>
            </a>
            <ul class="sub-menu">
              <li class="has-sub">
                <a href="javascript:;">
                      <b class="caret"></b>
                        Incoming Invoice
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
                  <!-- <li class="has-sub">
                    <a href="javascript:;">
                          <b class="caret"></b>
                            Inventory
                        </a>
                    </li> -->
                    <!-- <li class="has-sub">
                      <a href="javascript:;">
                            <b class="caret"></b>
                              Gudang
                          </a>
                      </li> -->
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
<li><a href="<?=$admin_url;?>/divisi/master_divisi.php">Master Divisi</a></li>
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
                        Master Stock
                    </a>
                <ul class="sub-menu">
                  <li class="has-sub">
                  <li><a href="<?=$admin_url;?>/stok/master_stok.php">Master Stok</a></li>
                  <li><a href="<?=$admin_url;?>/stok/master_shading_stok.php">Master Shading Stok</a></li>
                  <li><a href="<?=$admin_url;?>/mastergrup/master_grup.php">Master Grup</a></li>
                  <li><a href="<?=$admin_url;?>/mastergrup/master_sub_grup.php">Master Sub Grup</a></li>
                  <li><a href="<?=$admin_url;?>/mastergrup/master_sub_grupdtl.php">Master Detail Sub Grup</a></li>
				          <li><a href="<?=$admin_url;?>/perusahaan/master_perusahaan.php">Master Perusahaan</a></li>
                  <li><a href="<?=$admin_url;?>/merk/master_merk.php">Master Merk</a></li>
                  <li><a href="<?=$admin_url;?>/tipe/master_tipe.php">Master Tipe</a></li>
				   <li><a href="<?=$admin_url;?>/ukuran/master_ukuran.php">Master Ukuran</a></li>
				   <li><a href="<?=$admin_url;?>/warna/master_warna.php">Master Warna</a></li>
           <li><a href="<?=$admin_url;?>/satuan/master_satuan.php">Master Satuan</a></li>
                </li>
                </ul>
                <li class="has-sub">
                        <a href="javascript:;">
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
                <a href="javascript:;">
                      <b class="caret"></b>
                        Penjualan
                    </a>
                </li>
                <li class="has-sub">
                  <a href="javascript:;">
                        <b class="caret"></b>
                          Pembelian
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
                      <li class="has-sub">
                        <a href="javascript:;">
                              <b class="caret"></b>
                                Hutang
                            </a>
                        </li>
                        <li class="has-sub">
                          <a href="javascript:;">
                                <b class="caret"></b>
                              Piutang
                              </a>
                          </li>
                </ul></li>
              </ul></li>

          <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
      </div>
      <div class="sidebar-bg"></div>
      <!-- end #sidebar -->

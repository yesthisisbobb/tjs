<?php
session_start();
include("../../inc/config.php"); //include koneksi database

?>
<?php
$kode=$_GET["kode"];

?>
<?php
  function rupiah($angka){

  $hasil_rupiah = "Rp ". number_format($angka,0,',','.');
  return $hasil_rupiah;

}
?>
<?php
$sql = "SELECT * FROM master_stok where kode_stok='$kode'";
  $query = mysqli_query($conn, $sql);
     while($amku = mysqli_fetch_array($query)){
       $kodetipe=$amku['kodetipe'];
       $kodetjs=$amku['kode_stok'];
       $kodemerk=$amku['kodemerk'];
       $panjang=$amku['panjang'];
       $lebar=$amku['lebar'];
       $grup=$amku['grupname'];
       $tebal=$amku['tinggi'];
       $gam1=$amku['gam1'];
       $jum11=$amku['jum'];
       $des=$amku['des'];
       $kodesup=$amku['kodesup'];
       $kodemerk=$amku['kodemerk'];
       $pcsctn=$amku['pcsctn'];
       $kgctn=$amku['kgsstok'];
       $sqmctn=$amku['sqmctn'];
       $pcsctn=$amku['pcsctn'];

       $jumss=0;

         $sqlss = "SELECT * FROM master_shading where kode_stok='$kodetjs'";

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
     ?>
     <?php
     $sql1 = "SELECT * FROM master_merk where kode='$kodemerk'";
          $query1 = mysqli_query($conn, $sql1);
          while($amku1 = mysqli_fetch_array($query1)){
            $namasup=$amku1['nama'];
 }
 ?>
    <div class="single-product shop-quick-view-ajax">

                    <div class="ajax-modal-title">
                        <h2 style="margin-top: 25px; font-size:36px"><?php echo $kodetipe; ?></h2>
                        <h5 style="margin-top: -10px;font-weight: normal; color:teal"><?php echo $kodetjs; ?></h5>
                        <h3><?php echo strtoupper($grup); ?>
                        | <?php echo strtoupper($namasup); ?></h3>

                    </div>

                    <div class="product modal-padding">

                        <div class="row gutter-40 col-mb-50">
                            <div class="col-md-6">
                                <div class="product-image">
                                    <div class="fslider" data-pagi="false">
                                        <div class="flexslider">
                                            <div class="slider-wrap">
                <div class="slide"><img src="/../../img/gambar/<?php echo $kodetipe;?>.jpg"></div>
                                                <!-- <div class="slide"><a href="images/shop/dress/3-1.jpg" title="Pink Printed Dress - Side View"><img src="images/shop/dress/3-1.jpg" alt="Pink Printed Dress"></a></div>
                                                <div class="slide"><a href="images/shop/dress/3-2.jpg" title="Pink Printed Dress - Back View"><img src="images/shop/dress/3-2.jpg" alt="Pink Printed Dress"></a></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="sale-flash badge badge-danger p-2">Sale!</div> -->
                                </div>
                            </div>
                            <?php
      											$sql2 = "SELECT * FROM master_price where kode='$kodetjs'";
      													 $query2 = mysqli_query($conn, $sql2);
      													 while($amku2 = mysqli_fetch_array($query2)){
      														 $bot=$amku2['dis_showroom'];
      														 $dis1=$amku['dis_distribusi'];
      														 $pl=$amku2['pls'];
      														 $dp=$amku2['disprice'];
      														 $bp=$amku2['bp'];
      														 $disprice=$amku2['disprice'];
                                   $pldosdis=$bot*$sqmctn;
      														 // $dd1=$disprice.Fixed(0);
      														 $diskon=(($pl-$bot)/$pl)*100;

      														 // $diskon=$diskon1.toFixed(0);
      														 // g = e.toFixed(0);
      														 $a=$a+1;
      													 }

      													 ?>
                            <div class="col-md-6 product-desc">
                                <div class="product-price-dtl"><h3><?php echo rupiah($pl); ?>/pcs</h3></div>
                                <div class="product-price-dtl"><p>Available Stock :<?php echo $jum; ?> Pcs</p></div>

                                <!-- <div class="clear"></div> -->
                                <div class="line"></div>

                                <!-- Product Single - Quantity & Cart Button
                                ============================================= -->
                                <form class="cart mb-0" method="post" action="proses-cart.php" enctype='multipart/form-data'>
                                  <input type="hidden" id="har" name="har" value="<?php echo $pl; ?>">
                                  <input type="hidden" id="kode22" name="kode22" value="<?php echo $kodetjs; ?>">
                                  <input type="hidden" id="qty22" name="qty22" value="<?php echo $jum; ?>">

                                    <div class="quantity">
                                        <input type="button" value="-" class="minus" onclick="kurang()">
                                        <input type="text" step="1" min="1" id="quantity" name="quantity" value="1" title="Qty" class="qty" size="4" />
                                        <input type="button" value="+" class="plus" onclick="tambah()">
                                        <script>
                                        function tambah()
                                        {
                                          a=parseInt(document.getElementById("quantity").value)
                                          a=a+1;
                                          document.getElementById("quantity").value=a;
                                        }
                                        function kurang()
                                        {
                                          b=parseInt(document.getElementById("quantity").value)
                                          if(b==0)
                                          {
                                            b=0;
                                          }else {


                                          b=b-1;
                                        }
                                          document.getElementById("quantity").value=b;
                                        }
                                        </script>
                                    </div>
                                    <!-- <button type="submit" class="add-to-cart button m-0">Add to cart</button> -->
                                    <?php
                                      if($jum==0)
                                      {
                                      ?>    <button type="submit" name="daftar1" value="daftar"  class="add-to-cart button m-0" class="add-to-cart button m-0">Indent to Cart</button>
                                    <?php } else {

                                      ?>
                                      <button type="submit" name="daftar" value="daftar"  class="add-to-cart button m-0" class="add-to-cart button m-0">Add to cart</button>
                                    <?php } ?>
                                </form>
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
                                <div class="clear"></div>
                                <div class="line"></div>
                                <p><?php echo $des; ?></p>
                                <ul class="iconlist">
                                    <li><i class="icon-caret-right"></i> Dimension : <?php echo $panjang; ?>x<?php echo $lebar; ?>x<?php echo $tebal; ?>(mm)</li>
                                    <!-- <li><i class="icon-caret-right"></i> Weight : <?php echo $kgctn; ?>kg/box</li>
                                    <li><i class="icon-caret-right"></i> Qty/Box : <?php echo $pcsctn; ?> pcs</li>
                                    <li><i class="icon-caret-right"></i> Faces : <?php echo $faces; ?> Faces</li>
                                    <li><i class="icon-caret-right"></i> Surface : <?php echo $surface; ?></li> -->
                                    <!-- <li><i class="icon-caret-right"></i> Available Stock :<?php echo $jum; ?> Pcs</li> -->
                                </ul>
                                <!-- <div class="card product-meta mb-0">
                                    <div class="card-body">
                                        <span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">8465415</span></span>
                                        <span class="posted_in">Category: <a href="#" rel="tag">Shoes</a>.</span>
                                        <span class="tagged_as">Tags: <a href="#" rel="tag">Barena</a>, <a href="#" rel="tag">Blazers</a>, <a href="#" rel="tag">Tailoring</a>, <a href="#" rel="tag">Unconstructed</a>.</span>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                    </div>

                </div>

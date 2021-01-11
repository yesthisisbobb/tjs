<?php
session_start();
include("db/config.php");
include("rupiah.php");

$grup = $_POST["grup"];
$kodeproduk = $_POST["kodeproduk"];
$getcommand = "SELECT DISTINCT ms.kodetipe as namaproduk, ms.nm_stok shortdesc, ms.des as longdesc, ms.kgsstok as kg, ms.panjang as panjang, ms.lebar as lebar, ms.tinggi as tinggi, ms.grupname as grup, mp.pls as harga FROM master_stok ms, master_price mp WHERE ms.grupname='$grup' AND ms.kode_stok = mp.kode LIMIT 4";
$query = mysqli_query($conn, $getcommand);

if($query){
    while ($data = mysqli_fetch_array($query)) {
        echo    '<div class="item">
                    <div class="product type-product">
                        <div class="woocommerce-LoopProduct-link">
                            <div class="product-image">
                                <a href="#" class="wp-post-image">
                                    <img src="../venturafe1/img/gambar/' . isset($data["namaproduk"]) ? $data["namaproduk"] : "noimg" . '.jpg" alt="product">
                                </a>';
                                echo'<div class="yith-wcwl-add-button show">
											<a href="" class="add_to_wishlist tombol-favorite" id="'.$kodeStok.'">';
												if(isset($_SESSION['username'])){
												$query2=$conn->query("SELECT * FROM fav where user='".$_SESSION['username']."' AND kode='$kodeStok'");
												$numRows = mysqli_num_rows($query2);
												if($numRows == 0){
													echo'<i class="zmdi zmdi-favorite-outline"></i>';
												}
												else{
													echo'<i class="zmdi zmdi-favorite"></i>';
												}
												}
												else{
												 echo'<i class="zmdi zmdi-favorite-outline"></i>';
												}
                                   echo ' </a>
                                </div>
                                <div class="button add_to_cart_button">
                                    <a href="#">
                                        <img src="images/icons/shopping-cart-black-icon.png" alt="cart">
                                    </a>
                                </div>
                                <h5 class="woocommerce-loop-product__title"><a href="#">' . $data["namaproduk"] . '</a></h5>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">' . rupiah($data["harga"]) . '</span>
                                        </span>
                                    </ins>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>';
    }
}
else{
    echo "Query Failed";
}

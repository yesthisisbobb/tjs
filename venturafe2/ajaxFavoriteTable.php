<?php
include('db/config.php');
include('rupiah.php');
include("get-picture.php");

session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $query=$conn->query("SELECT * FROM fav WHERE user = '$username'");
    $numFav = mysqli_num_rows($query);
    
    $file = "";
    if($numFav > 0){
        echo    '<form class="woocommerce-cart-form" method="POST">
                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents wishlist_table">
                        <thead>
                            <tr>
                                <th class="product-remove"></th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-subtotal product-add-to-cart">Details</th>
                            </tr>
                        </thead>
                        <tbody>';

        while($row = mysqli_fetch_assoc($query)){
            $kodeStok = $row['kode'];
            $query2=$conn->query("SELECT * FROM master_price WHERE kode = '$kodeStok' LIMIT 1");
            $numprice = mysqli_num_rows($query2);
            $query3=$conn->query("SELECT ms.kodetipe as kode, msg.namagrup as grup FROM master_stok ms, master_sub_grup msg, detail_sub_grup dsg WHERE kode_stok = '$kodeStok' AND ms.grupname = dsg.nama AND dsg.namagrup = msg.nama LIMIT 1");
            $harga = 0;
            $kodeproduk="";
            $namaGrup = "";
            if($numprice == 1){
                $row2 = mysqli_fetch_assoc($query2);
                $harga = $row2["pls"];
            }
            if($query3){
                $row3 = mysqli_fetch_assoc($query3);
                $kodeproduk = $row3["kode"];
                $namaGrup = $row3["grup"];
            }
            
            $file = getProductPicture($kodeproduk);
            $link = "shop-detail.php?id=$kodeproduk&group=$namaGrup";
            
            echo '<tr class="woocommerce-cart-form__cart-item cart_item">
            <td class="product-remove">
                <a href="" class="removeFav" id="'.$kodeStok.'"><i class="zmdi zmdi-close"></i></a>
            </td>
            <td class="product-name" data-title="Product">
                <a href="'.$link.'"><img src="'.$file.'" alt="product"></a>
                <a href="'.$link.'">'.$kodeproduk.'</a>
            </td>
            <td class="product-price" data-title="Price">
                <span class="woocommerce-Price-amount amount">
                    '.rupiah($harga).'
                </span>
            </td>
            <td class="product-subtotal product-add-to-cart" data-title="To Details">
                <a href="'.$link.'" class="au-btn btn-small">See Details<i class="zmdi zmdi-arrow-right"></i></a>	
            </td>
            </tr>';
        }

        echo            '</tbody>
                    </table>
                </form>';
    }
    else{
        echo '<div class="empty-message-container"><img src="resource/empty-wishlist.png"><span>Choose your favorites at our <b>Home</b> or <b>Products</b> tab!</span></div>';
    }
}
else{
    echo '<div class="empty-message-container"><img src="resource/empty-wishlist.png"><span>Choose your favorites at our <b>Home</b> or <b>Products</b> tab!</span></div>';
}




?>
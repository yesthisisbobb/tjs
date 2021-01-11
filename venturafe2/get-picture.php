<?php
function getProductPicture ($kode){
    $upper = strtoupper($kode);
    $file = "../img/product/$upper.jpg";

    if (!file_exists($file)) {
        $file = "../img/product/$upper.JPG";

        if (!file_exists($file)) {
            // Lek lowercase
            $lower = strtolower($kode);
            $file = "../img/product/$lower.jpg";

            if(!file_exists($file)){
                $file = "../img/product/$lower.JPG";
                
                if(!file_exists($file)){
                    $file = "../img/product/noimg.jpg";
                }
            }
        }
    }
    return $file;
}

function getSmallBrandLogo($merk){
    $merk = strtolower($merk);
    $file = "resource/logomerk/$merk.png";
    if (!file_exists($file)) {
        $file = "resource/logomerk/$merk.PNG";

        if (!file_exists($file)) {
            $merk = strtoupper($merk);
            $file = "resource/logomerk/$merk.png";

            if (!file_exists($file)) {
                $file = "resource/logomerk/$merk.PNG";
            }
        }
    }
    
    return $file;
}
?>
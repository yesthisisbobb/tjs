<?php

include("db/config.php");
include("get-picture.php");

$command = "SELECT ms.kodetipe as tipe, ms.kode_stok as kode, mm.nama as merk, ms.panjang as pjg, ms.lebar as lbr FROM master_stok ms LEFT JOIN master_merk mm ON ms.kodemerk = mm.kode";
$query = mysqli_query($conn, $command);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finder No Image</title>
</head>

<body>
    <table border=1>
        <tr>
            <th>#</th>
            <th>Kodetipe</th>
            <th>Kode_Stok</th>
            <th>Merk</th>
            <th>Panjang X Lebar</th>
        </tr>
        <?php
        $i = 0;
        while ($d = mysqli_fetch_assoc($query)) {
            $imgpath = getProductPicture($d["tipe"]);
            if ($imgpath === "../img/product/noimg.jpg") {
                $i++;
                $tipe = $d["tipe"];
                $kode = $d["kode"];
                $merk = $d["merk"];
                $p = $d["pjg"];
                $l = $d["lbr"];
                echo "<tr>
                        <td style='padding:10px;'>$i</td>
                        <td style='padding:10px;'>$tipe</td>
                        <td style='padding:10px;'>$kode</td>
                        <td style='padding:10px;'>$merk</td>
                        <td style='padding:10px;'>$p x $l</td>
                    </tr>";
            }
        }
        ?>
    </table>
</body>

</html>
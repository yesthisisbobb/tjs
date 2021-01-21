<?php

include("db/config.php");
include("get-picture.php");

$command = "SELECT * FROM master_stok";
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
            <th>Kode_stok</th>
        </tr>
        <?php
        $i = 0;
        while ($d = mysqli_fetch_assoc($query)) {
            $imgpath = getProductPicture($d["kodetipe"]);
            if ($imgpath === "../img/product/noimg.jpg") {
                $i++;
                $tipe = $d["kodetipe"];
                $stok = $d["kode_stok"];
                echo "<tr>
                        <td style='padding:10px;'>$i</td>
                        <td style='padding:10px;'>$tipe</td>
                        <td style='padding:10px;'>$stok</td>
                    </tr>";
            }
        }
        ?>
    </table>
</body>

</html>
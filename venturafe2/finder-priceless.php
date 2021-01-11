<?php
    include("db/config.php");

    // Query lambat vvv
    /* SELECT ms.no as no, ms.kodetipe as nama, ms.kode_stok as kode
    FROM master_stok ms, master_sub_grup msg, detail_sub_grup dsg
    WHERE ms.grupname = dsg.nama AND msg.nama = dsg.namagrup AND ms.kode_stok NOT IN (SELECT ms.kode_stok
    FROM master_stok ms, master_sub_grup msg, detail_sub_grup dsg, master_price mp
    WHERE ms.grupname = dsg.nama AND msg.nama = dsg.namagrup AND ms.kode_stok = mp.kode) */

    $findpriceless =    "SELECT ms.no as no, ms.kodetipe as nama, ms.kode_stok as kode
                        FROM master_stok ms, master_sub_grup msg, detail_sub_grup dsg
                        WHERE ms.grupname = dsg.nama AND msg.nama = dsg.namagrup";

    $querypriceless = mysqli_query($conn, $findpriceless);
    echo    "<table border=5 style='font-family:arial;'>
                <tr>
                    <th>#</th>
                    <th>no</th>
                    <th>kodetipe</th>
                    <th>kode_stok</th>
                </tr>";
    $ctr = 1;
    while($row = mysqli_fetch_array($querypriceless)){
        $tempkode = $row["kode"];
        $sqcommand = "SELECT kode FROM master_price WHERE kode='$tempkode'";
        $sqquery = mysqli_query($conn, $sqcommand);
        $qty = mysqli_num_rows($sqquery);
        if ($qty < 1) {
            $sqresult = mysqli_fetch_assoc($sqquery);
            echo    "<tr>
                        <td>" . $ctr . "</td>
                        <td style='padding: 12px;'>" . $row["no"] . "</td>
                        <td style='padding: 12px;'>" . $row["nama"] . "</td>
                        <td style='padding: 12px;'>" . $row["kode"] . "</td>
                    </tr>";
            $ctr++;
        }
    }
    echo "</table>";
?>

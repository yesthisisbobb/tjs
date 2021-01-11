<?php
    include("db/config.php");

    $findclone = "SELECT DISTINCT kodetipe FROM master_stok";
    $queryclone = mysqli_query($conn, $findclone);
    echo    "<table border=5 style='font-family:arial;'>
                <tr>
                    <th>#</th>
                    <th>no</th>
                    <th>kodetipe</th>
                    <th>kode_stok</th>
                </tr>";
    $ctr = 1;
    while($row = mysqli_fetch_array($queryclone)){
        $tempkode = $row["kodetipe"];
        $subquerycommand = "SELECT * FROM master_stok WHERE kodetipe='$tempkode' ORDER BY 1";
        $subquery = mysqli_query($conn, $subquerycommand);
        $sqresult = mysqli_fetch_array($subquery);
        $qty = mysqli_num_rows($subquery);
        if($qty > 1){
            echo    "<tr>
                        <td>" . $ctr . "</td>
                        <td style='padding: 12px;'>" . $sqresult["no"] . "</td>
                        <td style='padding: 12px;'>" . $sqresult["kodetipe"] . "</td>
                        <td style='padding: 12px;'>" . $sqresult["kode_stok"] . "</td>
                    </tr>";
        }
        $ctr++;
    }
    echo "</table>";
?>
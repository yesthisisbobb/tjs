<?php
include("../../config.php");
$sql = "SELECT * FROM jual";
$query = mysqli_query($conn, $sql);
$i=0;
while ($amku = mysqli_fetch_array($query)) {
    $i++;
    $nosoku = $amku["noso"];
    $sqlin3 = "SELECT * FROM INV where noso='$nosoku'";
    $queryin3 = mysqli_query($conn, $sqlin3);


    $sqlin4 = "SELECT * FROM jual where noso='$nosoku'";
    $queryin4 = mysqli_query($conn, $sqlin4);
    $statusku4 = "";
    while ($amku4 = mysqli_fetch_array($queryin4)) {
        $statusku4 = $amku4['status'];
    }


    echo"<tr class=odd gradeX>
        <td>".$amku["tgl"]."</td>
        <td>". $amku["noso"]."</td>
        <td>". $amku["user_id"]."</td>

        <td class='with-btn' nowrap=''>
            <a href='viewso.php?noso=".$nosoku."&id='".$amku["cart_id"]."' class='btn btn-info btn-rounded btn-sm' role='button'>SO Confirmation</a></h1>
            <a href='solist.php#anchor'><button class='btn btn-rounded btn-sm btn-info' id='tom' name='tom' onclick=ambildata('".$amku['noso']."')>Invoices($i)</button></a>
        </td>";

     } ?>
<?php
session_start();

include("db/config.php");

$kode = $_POST["kode"];
$amount = $_POST["amount"];

echo    '<table id="shading-table">
            <tr>
                <th class="text-center">Code</th>
                <th class="text-center">Set Amount</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Available</th>
            </tr>';

$getcommand = "SELECT kode_stok, kd_shading, sum(jum) as jum FROM `master_shading` WHERE kode_stok='$kode' GROUP BY kode_stok, kd_shading ORDER BY 1 ASC";
$query = mysqli_query($conn, $getcommand);
$ctr = 1;
while ($row = mysqli_fetch_array($query)) {
    $k_shading = $row["kd_shading"];
    echo    '<tr>
                <td class="text-center">' . $k_shading . '</td>
                <td><input type="range" min="0" max="' . $row["jum"] . '" value="0" id="shading-' . $k_shading . '" class="shading-slider" oninput="sliderValueChanged(this.id)"></td>
                <td class="text-center"><input type="number" id="shading-' . $k_shading . '-qty" onkeyup="qtyValueChanged(this.id, this.value)"></td>
                <td class="text-center">' . $row["jum"] . '</td>
            </tr>';

    $ctr++;
}

echo        '<tr>
                <td class="text-center">Indent</td>
                <td><input type="range" min="0" max="' . $amount . '" value="0" id="shading-idt" class="shading-slider" oninput="sliderValueChanged(this.id)"></td>
                <td class="text-center"><input type="number" id="shading-idt-qty" onkeyup="qtyValueChanged(this.id, this.value)"></td>
                <td class="text-center">' . $amount . '</td>
            </tr>
        </table>';

?>
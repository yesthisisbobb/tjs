<?php

include '../../config.php';
$q=$_GET['q'];//is
$s=$_GET['s'];//cont_type
$r=$_GET['r'];//coo
$t=$_GET['t'];//tujuan
$f=$_GET['f'];//tjsitemcode


$sql1="SELECT * FROM master_stok where kode_stok='$f'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
 $kodetipe1=$row1['kodetipe'];
 $sql2="SELECT * FROM master_tipe where kode='$kodetipe1'";
 $result2 = mysqli_query($conn,$sql2);
  while($row2 = mysqli_fetch_array($result2)) {
      $div1=$row2['bc1'];
  }

}
$sql="SELECT * FROM master_emkl where koded='$div1' and import_system='$q' and pod='$r' and tujuan='$t' and conttype='$s'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {

    echo $row['biaya'];
}

?>

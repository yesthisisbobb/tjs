
<?php
include '../../config.php';
$kode=$_GET['q'];
?>
<br>
  <div class="col-lg-12 col-12 mx-auto" id="anchor">
<u>INVOICES LIST FOR SO No. <b><?php echo $kode; ?></b><br><br></u>

<table id="zero-config" class="table table-hover" style="width:100%">
  <thead>
    <th>
      Inv.No
    </th>
    <th>
      DO.No
    </th>

  
  </thead>


<?php
$sql="SELECT * FROM inv where noso='$kode'";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {
    $noinv=$row['noinv'];
    $tgl1=$row['tgl'];

    $sql1="SELECT * FROM  do where noinv='$noinv'";
    $result1 = mysqli_query($conn,$sql1);

    $nodoku=null;
    while($row1 = mysqli_fetch_array($result1)) {
        $nodoku=$row1['nodo'];
      }


?>


        <tbody>
          <tr>
            <td><?php echo $noinv; ?>               <a href="<?php echo $base_url; ?>/venturafe1/invlistdtl3.php?no=<?php echo $noinv; ?>" class="btn btn-info btn-rounded btn-sm" role="button">PRINT</a>
</td>
            <td><?php echo $nodoku; ?>                   <a href="<?php echo $base_url; ?>/venturafe1/dolistdtl.php?no=<?php echo $noinv; ?>" class="btn btn-info btn-rounded btn-sm" role="button">PRINT</a>
</td>

            <td>
              <!-- <a href="viewso.php?noso=<?php echo $nosoku; ?>&id=<?php echo $amku["cart_id"];?>" class="btn btn-info btn-rounded btn-sm" role="button">Edit Invoice</a></h1> -->

            </td>
          </tr>
        </tbody>


<?php } ?>
  </div>
  </table>

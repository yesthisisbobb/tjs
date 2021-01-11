
<?php
include '../../config.php';
$kode=$_GET['q'];
?>
<br>
  <div class="col-lg-12 col-12 mx-auto">
<u>PO LIST FOR SO Indent No. <b><?php echo $kode; ?></b><br><br></u>

<table id="zero-config" class="table table-hover" style="width:100%">
  <thead>
    <th>
      PO.No
    </th>
    <th>
      Order Date
    </th>
    <th>
    Action
    </th>

  </thead>


<?php
$sql="SELECT * FROM po where noso='$kode'";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {
    $noinv=$row['noinv'];
    $tgl1=$row['tgl'];
?>


        <tbody>
          <tr>
            <td><?php echo $noinv; ?></td>
            <td><?php echo $tgl1; ?></td>
            <td>
              <!-- <a href="viewso.php?noso=<?php echo $nosoku; ?>&id=<?php echo $amku["cart_id"];?>" class="btn btn-info btn-rounded btn-sm" role="button">Edit Invoice</a></h1> -->
              <a href="<?php echo $base_url; ?>/venturafe1/polistdtl2.php?no=<?php echo $noinv; ?>" class="btn btn-info btn-rounded btn-sm" role="button">Print PO</a></h1>
                <!-- <a href="<?php echo $base_url; ?>/venturafe1/dolistdtl.php?no=<?php echo $noinv; ?>" class="btn btn-info btn-rounded btn-sm" role="button">Print DO</a></h1> -->

            </td>
          </tr>
        </tbody>


<?php } ?>
  </div>
  </table>

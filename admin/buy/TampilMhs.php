<?php
include '../../config.php';
include '../blank_header.php';

?>

  <table id="zero-config" class="cell-border table table-hover">
  <thead>
    <tr>
      <!-- <th width="1%">No</th> -->

      <!-- <th class="text-nowrap">Date</th> -->
      <th class="text-nowrap">Date</th>
      <th class="text-nowrap">Time</th>
      <th class="text-nowrap" style="text-align:left">TJS Item Code</th>
      <!-- <th class="text-nowrap" style="text-align:left">Grup Name</th> -->
      <th class="text-nowrap" style="text-align:center">Currency</th>
      <th class="text-nowrap" style="text-align:center">Price</th>
        <th class="text-nowrap" style="text-align:left" >Action</th>
    </tr>
  </thead>


    <tbody>


    <?php
      $sql = "SELECT * FROM master_buy where status='Active' ORDER BY id ASC";
           $query = mysqli_query($conn, $sql);
           while($amku = mysqli_fetch_array($query)){
             $kode=$amku["kode"];
                $tgl=$amku["tgl"];
             $sqlt = "SELECT * FROM master_stok where kode_stok='$kode'";
                  $queryt = mysqli_query($conn, $sqlt);
                  while($amkut = mysqli_fetch_array($queryt)){
                    $kodetipe2=$amkut["kodetipe"];
                    $grupname2=$amkut["grupname"];

                  }
      ?>
    <tr class="odd gradeX">

          </td>
          <td><?php echo date("d-M", strtotime($tgl));?></td>
          <td><?php echo date("H:i:sa", strtotime($tgl));?></td>
      <td style="text-align:left"><?=$amku["kode"];?></td>
      <!-- <td style="text-align:left"><?php echo $grupname2; ?></td> -->

      <td style="text-align:center"><?=$amku["cur"];?></td>
      <td style="text-align:center"><?=$amku["price"];?></td>
      <td style="text-align:left" class="with-btn" nowrap="">

        <a href="master_buy.php?aksi=view&no=<?php echo $amku["id"]; ?>#section2"><i class="fas fa-edit" style="font-size:18px;color:#5DADE2;" data-toggle="tooltip" title="EDIT" ></i></a>
        <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->
        <?php
        $uk=$_SESSION["username"];
        $sqluk = "SELECT * FROM login where email='$uk'";
             $queryuk = mysqli_query($conn, $sqluk);
             while($amkuuk = mysqli_fetch_array($queryuk)){
               $divisiuk=$amkuuk["divisi"];
          }
          if ($divisiuk=="SUPERUSER")
          {
         ?>
          <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>"><i class="fas fa-times-circle"  style="font-size:18px;color:#F8C471;"data-toggle="tooltip" title="DISABLE" ></i></a>
          <a href="proses-master-grup.php?aksi=active&no=<?php echo $amku["id"]; ?>"><i class="fas fa-check-circle" style="font-size:18px;color:#52BE80;"data-toggle="tooltip" title="ENABLE" ></i></i></a>
        <a href="proses-master-grup.php?aksi=delete&no=<?php echo $amku["id"]; ?>"><i class="fas fa-trash" style="font-size:18px;color:#CD6155;"data-toggle="tooltip" title="DELETE" ></i></i></a>
<?php } else { ?>

<i class="fas fa-times-circle"  style="font-size:18px;color:silver;"data-toggle="tooltip" title="DISABLE" ></i>
<i class="fas fa-check-circle" style="font-size:18px;color:silver;"data-toggle="tooltip" title="ENABLE" ></i></i>
<i class="fas fa-trash" style="font-size:18px;color:silver;"data-toggle="tooltip" title="DELETE" ></i></i>


<?php }} ?>
    </tr>
  </tbody>
  <script>
      $('#zero-config').DataTable({
          "oLanguage": {
              "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
              "sInfo": "Showing page _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Search...",
             "sLengthMenu": "Results :  _MENU_",
          },
          "stripeClasses": [],
          "lengthMenu": [5, 10, 20, 50],
          "pageLength": 5


      });
  </script>

</table>

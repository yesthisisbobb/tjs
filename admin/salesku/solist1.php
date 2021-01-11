<!DOCTYPE html>

<?php
  session_start();
  include("../../config.php");
  include("../../proses.php");
  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
      return false;
  }
  if($_SESSION["level"] != "admin"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../'.$_SESSION["level"].'/";
             </script>';
        return false;
  }
?>
<html lang="en">
<style>
.btn.btn-info[disabled] {
    background-color: #00ff00;
}
.table1 {
    display: table;
    border: 1px solid black;
    border-collapse: collapse;
    width: 100%;
    font-size: 10px;

}
.row1 {
    display: table-row;
    border: 1px solid black;
    height: 25px;
    vertical-align: center;
    padding: 15px;

}
.cell1 {
    display: table-cell;
    border: 1px solid black;

}
</style>
<script language=javascript>
var objekxhr, objekxhr1;
function ambildata(str2)
{

  buatxhr();

  objekxhr.open("GET", "TampilMhs3.php?q="+str2,true);
  objekxhr.send(null);
  objekxhr.onreadystatechange=tampilkan;
}

function buatxhr()
{
    if (window.ActiveXObject)

    {
        objectxhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
        else if (window.XMLHttpRequest)
    {
        objekxhr=new XMLHttpRequest();
    }
    else
    {
      alert ("ganti browser anda");
    }
}

function tampilkan()
{
document.getElementById("pg").innerHTML = objekxhr.responseText;
}
</script>
<?php
include('../blank_header.php')
 ?>

<body class="sidebar-noneoverflow">
<?php function rupiah($angka){

$hasil_rupiah = "" . number_format($angka,2,',','.');
return $hasil_rupiah;

} ?>
<script>
function hitungtax()
{
a=document.getElementById("kirim").value;
if(document.getElementById("pil").checked) {
b=0;
}
else {
  b=a*0.1;
}

c=parseFloat(a)+parseFloat(b);
document.getElementById('taxdel').value=b;
document.getElementById('totaldel').value=c;

}

function hitungtax1()
{
a1=document.getElementById("other").value;
if(document.getElementById("pil1").checked) {
b1=0;
}
else {
  b1=a1*0.1;
}

c1=parseFloat(a1)+parseFloat(b1);
document.getElementById('taxotherdel').value=b1;
document.getElementById('totalotherdel').value=c1;

}


</script>
<script>
function hitunggt()
{
a2=document.getElementById("totkirim").value;
b2=document.getElementById("totalotherdel").value;
c2=document.getElementById('totaldel').value;

d2=parseInt(a2)+parseInt(b2)+parseInt(c2);
document.getElementById("gtku").value=d2;

}


</script>
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

      <?php
      include('../blank_page.php')
      ?>
        <!--  BEGIN CONTENT AREA  -->

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
              <div class="row layout-top-spacing">
                <!-- start of content area 1 -->
                  <div id="basic" class="col-lg-12 layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>Sales Order List </h4>
                                  </div>
                              </div>
                          </div>
                        <hr>
                                  <div class="col-lg-12 col-12 mx-auto">
                                    <table id="zero-config" class="table table-hover" style="width:100%">
                                      <thead>
                                        <tr>
                                          <!-- <th width="1%">No</th> -->

                                          <th class="text-nowrap">SO.Date</th>
                                          <th class="text-wrap">SO No.</th>
                                          <th class="text-wrap">User Id.</th>
                                          <!-- <th class="text-wrap">SO Status</th> -->

                                          <th class="text-nowrap">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        <?php
                                          $sql = "SELECT * FROM jual";
                                               $query = mysqli_query($conn, $sql);
                                               while($amku = mysqli_fetch_array($query)){
                                                 $proid=$amku["proyekid"];
                                                 $nosoku=$amku["noso"];

                                          ?>
                                          <?php
                                            $sqlin3 = "SELECT * FROM INV where noso='$nosoku'";
                                                 $queryin3 = mysqli_query($conn, $sqlin3);
                                                $cekin3=mysqli_num_rows($queryin3);

                                            ?>



                                        <tr class="odd gradeX">


                                          <td><?=" ".$amku["tgl"];?></td>
                                          <td><?=$amku["noso"];?></td>
                                          <td><?=$amku["user_id"];?></td>


                                          <td class="with-btn" nowrap="">
                                             <!-- <a href="#" class="btn-primary btn-rounded btn-sm" role="button" data-toggle="modal" data-target="#myModal1<?php echo $amku["no"]; ?>">Edit/View</a></h1> -->

                                            <!-- <a href="editquote.php?id=<?php echo $amku["cart_id"];?>&no=<?php echo $amku["no"]; ?>" class="btn-primary btn-rounded btn-sm" role="button">View</a></h1> -->

                                            <?php
                                              $sqlin4 = "SELECT * FROM jual where noso='$nosoku'";
                                                   $queryin4 = mysqli_query($conn, $sqlin4);
                                                      while($amku4 = mysqli_fetch_array($queryin4)){
                                                         $statusku4=$amku4['status'];
                                                      
                                                      }

                                              ?>
                                              <?php
                                              if ($statusku4=="OPEN") {
                                              ?>
                                              <a href="viewso.php?noso=<?php echo $nosoku; ?>&id=<?php echo $amku["cart_id"];?>" class="btn btn-info btn-rounded btn-sm" role="button">SO Confirmation</a></h1>
                                            <?php } else if
                                            ($statusku4=="CLOSED"){ ?>
                                              <a href="" class="btn btn-info disabled btn-rounded btn-sm" role="button">SO Confirmation</a></h1>

                                            <?php }?>
                                              <button class="btn btn-rounded btn-sm btn-info" id="tom" name="tom" onclick="ambildata('<?php echo $amku["noso"]; ?>')">Invoices(<?php echo $cekin3; ?>)</button>
                                            <!-- <a href="#" class="btn-primary btn-rounded btn-sm" role="button" data-toggle="modal" data-target="#myModal2<?php echo $amku["no"]; ?>">Revision(<?php echo $jumlahrev; ?>)</a> -->
                                            <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                                              <!-- <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="btn-primary btn-rounded btn-sm" role="button">Convert to SO</a> -->
                                              <!-- <a href="proses-master-grup.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-sm btn-rounded" role="button">Enable</a>
                                            <a href="proses-master-grup.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-sm btn-rounded" role="button">Delete</a> -->

                                              </td>
                                            <?php }?>
                                            </table>
                                            <div id="pg">

                                            </div>






                  </div>

                  <!-- end of content area 1 -->
                  <!-- begin of content area 2 -->

            </div>
            <!-- end of content area 2 -->

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">Karya Modern</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
      </div>
        <!--  END CONTENT AREA  -->
        <?php
        include('../blank_footer.php')
        ?>
    </div>
    <script src="<?php echo $admin_url; ?>/demo5/assets/js/custom.js"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });
    </script>
</body>
</html>

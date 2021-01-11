<!DOCTYPE html>

<?php
  session_start();
  include("../../config.php");
  //  include("../../proses.php");
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
<div class="loading">Loading&#8230;</div>
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
                                          <th class="text-wrap">Customer Id.</th>
                                          <!-- <th class="text-wrap">SO Status</th> -->

                                          <th class="text-nowrap">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody id="ajaxLoad">
                                       
</tr>
                                        </tbody>
                                            </table>
                                            <div id="pg">

                                            </div>






                  </div>

                  <!-- end of content area 1 -->
                  <!-- begin of content area 2 -->

            </div>
            <!-- end of content area 2 -->

                    </div>
      </div>
        <!--  END CONTENT AREA  -->
        <?php
        include('../blank_footer.php')
        ?>
    </div>
    <script src="<?php echo $admin_url; ?>/demo5/assets/js/custom.js"></script>
    <script>

$.ajax({
        type: 'POST',
        url: 'ajaxLoadSoList.php',
        success: function(data) {
          document.getElementById("ajaxLoad").innerHTML = data;
          $('#zero-config').DataTable({
            "oLanguage": {
              "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
              },
              "sInfo": "Showing page _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Search...",
              "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
          });
          $('.loading').fadeOut();
        }
      });

    </script>
</body>
</html>

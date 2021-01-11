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
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo $base_url; ?>/venturafe1/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $base_url; ?>/venturafe1/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $base_url; ?>/venturafe1/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $base_url; ?>/venturafe1/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $base_url; ?>/venturafe1/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $base_url; ?>/venturafe1/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?php echo $base_url; ?>/venturafe1/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<!-- Document Title
	============================================= -->
	<title>Flip Cards | Canvas</title>

</head>

<style>

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
                                      <h4>DO LIST by Month </h4>
                                  </div>
                              </div>
                          </div>
                        <hr>





<div class="container">

                    					<div class="row">
                                <?php
                                 for ($i=1;$i<=12;$i++)
                                 {?>
                                <div class="col-lg-3 mb-4">
                    							<div class="flip-card text-center">
                    								<div class="flip-card-front dark" style="background-image: url('<?php echo $base_url; ?>/venturafe1/demos/business/images/featured/1.jpg')">
                    									<div class="flip-card-inner">
                    										<div class="card bg-transparent border-0 text-center">
                    											<div class="card-body">
                    												<i class="icon-line2-camera h1"></i>
                    												<h4 class="card-title">January</h4>
                    												<!-- <p class="card-text font-weight-normal">With supporting text below as a natural lead-in to additional content.</p> -->
                    											</div>
                    										</div>
                    									</div>
                    								</div>
                    								<div class="flip-card-back bg-danger no-after">
                    									<div class="flip-card-inner">
                    										<p class="mb-2 text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit.</p>
                    										<button type="button" class="btn btn-outline-light mt-2">View Details</button>
                    									</div>
                    								</div>
                    							</div>
                    						</div>
<?php } ?>
                    					</div>




                <!-- #content end -->
<!--  -->

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

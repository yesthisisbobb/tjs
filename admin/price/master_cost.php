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

<?php
include('../blank_header.php')
 ?>
 <script language=javascript>
 var objekxhr;

 function ambildata()
 {
 buatxhr();
 objekxhr.open("GET", "TampilMhs.php",true);
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
       alert ("ganti browser anda")
     }
 }

 function tampilkan()
 {
 document.getElementById("bc").value = objekxhr.responseText;
 }

 function ambilbc()
 {
 buatxhr();
 a=document.getElementById("kode").value;


 objekxhr.open("GET", "TampilMhs.php?q="+a,true);
 objekxhr.send(null);
 objekxhr.onreadystatechange=tampilkanbc;
 }
 function tampilkanbc()
 {
 document.getElementById("bc").value = objekxhr.responseText;
 }
 function ambilcogs()
 {
 buatxhr();
 a=document.getElementById("kode").value;
 objekxhr.open("GET", "TampilMhscogs.php?q="+a,true);
 objekxhr.send(null);
 objekxhr.onreadystatechange=tampilkancogs;
 }
 function tampilkancogs()
 {
 document.getElementById("cogs").value = objekxhr.responseText;
 }
 </script>
<body class="sidebar-noneoverflow">

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
                                      <h4>Pricing Policy <a href="master_cost.php" class="btn  btn-rounded btn-primary btn-sm" role="button">Add New</a>
                                      </h4>
                                  </div>

                              </div>
                          </div>
                          <hr><?php
                            function rupiah($angka){

                          	$hasil_rupiah = "Rp." . number_format($angka,0,',','.');
                          	return $hasil_rupiah;

                          }
                          ?>
                                    <div  style="overflow-x:auto;" class="col-lg-12 col-12 mx-auto">
                <!-- start of content area 1 -->
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <!-- <th width="1%">No</th> -->
                      <th class="text-nowrap">Action</th>
                      <th class="text-nowrap">TJS Code</th>
                      <th class="text-nowrap">COGS</th>
                      <th class="text-nowrap">Rental Cost</th>
                      <th class="text-nowrap">Travel Cost</th>
                      <th class="text-nowrap">Marketing Cost</th>
                      <th class="text-nowrap">Interest</th>
                      <th class="text-nowrap">Sales Commision</th>
                      <th class="text-nowrap">Fixed Cost</th>
                      <th class="text-nowrap">Nett Profit</th>
                      <th class="text-nowrap">Savings</th>
                      <th class="text-nowrap">Middleman</th>
                      <th class="text-nowrap">Project Cost</th>
                      <th class="text-nowrap">Onsite Cost</th>
                      <th class="text-nowrap">Storage Cost</th>
                      <th class="text-nowrap">Bottom Price</th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $namaku2=$_SESSION["username"];
                    $sqllog2="SELECT * FROM login where email='$namaku2'";
                    $resultlog2 = mysqli_query($conn,$sqllog2);
                    while($rowlog2 = mysqli_fetch_array($resultlog2)) {
                      $divku2=$rowlog2['divisi2'];

                    }

                    ?>



                    <?php
                      $sql = "SELECT * FROM master_price where status= 'Active' ORDER BY no";
                           $query = mysqli_query($conn, $sql);
                           while($amku = mysqli_fetch_array($query)){
                             $kodestok=$amku["kode"];

                                      $sc1=$amku["sc"];
                                      $tc1=$amku["tc"];
                                      $mc1=$amku["mc"];
                                      $interest1=$amku["interest"];
                                      $sic1=$amku["sic"];
                                      $fc1=$amku["fc"];
                                      $net1=$amku["net"];
                                      $saving1=$amku["saving"];
                                      $middle1=$amku["middle"];
                                      $project1=$amku["project"];
                                      $osc1=$amku["osc"];
                                      $stocost1=$amku["stocost"];
                                      $bot1=$amku["bot"];



                             // $sc1=($sc/100)*$amku["cogs"];
                             // $tc1=($tc/100)*$amku["cogs"];
                             // $mc1=($mc/100)*$amku["cogs"];
                             // $interest1=($interest/100)*$amku["cogs"];
                             // $sic1=($sic/100)*$amku["cogs"];
                             // $fc1=($fc/100)*$amku["cogs"];
                             // $net1=($net/100)*$amku["cogs"];
                             // $saving1=($saving/100)*$amku["cogs"];
                             // $middle1=($middle/100)*$amku["cogs"];
                             // $project1=($project/100)*$amku["cogs"];
                             // $osc1=($osc/100)*$amku["cogs"];
                             // $stocost1=($stocost/100)*$amku["cogs"];
                             // $bot1=$amku["cogs"]+$sc1+$tc1+$mc1+$interest1+$sic1+$fc1+$net1+$saving1+$middle1+$project1+$osc1+$stocost1;


                      ?>
                    <tr class="odd gradeX">

                      <td class="with-btn" nowrap="">

                        <a href="master_cost.php?aksi=view&no=<?php echo $amku["no"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-pencil-alt"></i></a>
                        <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                          <a href="proses-cost.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-minus"></i></a>
                          <a href="proses-cost.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-check"></i></a>
                        <a href="proses-cost.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="bundar btn btn-info btn btn-xs" role="button"><i class="fa fa-trash"></i></a>

                          </td>
                      <td><?=$amku["kode"];?></td>
                      <td><?=rupiah($amku["cogs"]);?></td>
                      <td><?=rupiah($sc1);?></td>
                      <td><?=rupiah($tc1);?></td>
                      <td><?=rupiah($mc1);?></td>
                      <td><?=rupiah($interest1);?></td>
                      <td><?=rupiah($sic1);?></td>
                      <td><?=rupiah($fc1);?></td>
                      <td><?=rupiah($net1);?></td>
                      <td><?=rupiah($saving1);?></td>
                      <td><?=rupiah($middle1);?></td>
                      <td><?=rupiah($project1);?></td>
                      <td><?=rupiah($osc1);?></td>
                      <td><?=rupiah($stocost1);?></td>
                      <td><?=rupiah($bot1);?></td>










                   <?php } ?>
                    </tr>
                  </tbody>
                </table>



              </div>
              </div>


              </div>
                  <!-- end of content area 1 -->

                  <!-- begin of content area 2 -->



                  <div id="basic" class="col-lg-12 layout-spacing">
                      <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add/Update</h4>
                                </div>
                            </div>
                        </div>

<hr>

<?php
$aksi=$_GET["aksi"];
if ($aksi=="view")
{
  $no=$_GET["no"];

  ?>

  <div class="col-lg-12 col-12 mx-auto">
   <form id="myform" class="form-horizontal" method="post" action="proses-cost.php">


<input type="hidden" name="nom" id="nom" value="<?php echo $no; ?>">

                                     <div class="row">
                                       <div class="col-sm-4">
                                         <?php

                                         $sqlcekno="SELECT * FROM master_price where no='$no'";
                                         $resultcekno = mysqli_query($conn,$sqlcekno);
                                         while($rowcekno = mysqli_fetch_array($resultcekno)) {
                                           $kodecekno=$rowcekno['kode'];
                                           $divku1=$rowcekno['divisi'];
                                           $cogs=$rowcekno['cogs'];

                                         }
                                         ?>
                                       <input type="text" class="bundar form-control" id="kode" name="kode" value="<?php echo $kodecekno; ?>">

                                     </div>



                                   <div class="col-sm-4">
                                   <input type="text" class="bundar form-control" id="bc" name="bc" placeholder="Business Category" value="<?php echo $divku1; ?>">


                                 </div>
                                 <div class="col-sm-4">
                                 <input type="text" class="bundar form-control" id="cogs" name="cogs" placeholder="COGS"  value="<?php echo $cogs; ?>">

                               </div>

                                       </div>


<?php
}else { ?>


                                   <div class="col-lg-12 col-12 mx-auto">
                                    <form id="myform" class="form-horizontal" method="post" action="proses-cost.php">




                                                                      <div class="row">


                                                                      <div class="col-sm-4">
                                                                        <select name="kode" id="kode" class="form-control">
                                                                          <option>TJS Code</option>
                                                                        <?php
                                                                          $sql = "SELECT * FROM master_stok";
                                                                               $query = mysqli_query($conn, $sql);
                                                                               while($amku = mysqli_fetch_array($query)){
                                                                                 echo '<option>'.$amku['kode_stok'].'</option>';
                                                                            }
                                                                          ?>
                                                                        </select>
                                                                    </div>
                                                                    <?php
                                                                    $namaku11=$_SESSION["username"];
                                                                    $sqllog11="SELECT * FROM login where email='$namaku11'";
                                                                    $resultlog11 = mysqli_query($conn,$sqllog11);
                                                                    while($rowlog11 = mysqli_fetch_array($resultlog11)) {
                                                                      $divku1=$rowlog11['divisi2'];

                                                                    }
                                                                    ?>
                                                                    <div class="col-sm-4">
                                                                    <input type="text" class="bundar form-control" id="bc" name="bc" placeholder="Business Category" value="<?php echo $divku1; ?>">


                                                                  </div>
                                                                  <div class="col-sm-4">
                                                                  <input type="text" class="bundar form-control" id="cogs" name="cogs" placeholder="COGS" onfocus="ambilcogs()">

                                                                </div>

                                                                        </div>
                                                                        <hr>
                                                                      <?php  } ?>
                                                                          <?php
                                                                          $namaku1=$_SESSION["username"];
                                                                          $sqllog="SELECT * FROM login where email='$namaku1'";
                                                                          $resultlog = mysqli_query($conn,$sqllog);
                                                                          while($rowlog = mysqli_fetch_array($resultlog)) {
                                                                            $divku=$rowlog['divisi2'];

                                                                          }
                                                                          $sqlco="SELECT * FROM master_cost where divisi='$divku'";
                                                                          $resultco = mysqli_query($conn,$sqlco);
                                                                          while($rowco = mysqli_fetch_array($resultco)) {
                                                                            $sc=$rowco['sc'];
                                                                            $tc=$rowco['tc'];
                                                                            $mc=$rowco['mc'];
                                                                            $sic=$rowco['sic'];
                                                                            $interest=$rowco['interest'];
                                                                            $fc=$rowco['fc'];
                                                                            $rpc=$rowco['net'];
                                                                            $saving=$rowco['saving'];
                                                                            $middle=$rowco['middle'];
                                                                            $project=$rowco['project'];
                                                                            $osc=$rowco['osc'];
                                                                            $stocost=$rowco['stocost'];
                                                                            $pl=$rowco['pl'];
                                                                            $dis_sales=$rowco['dis_sales'];
                                                                            $dis_spv=$rowco['dis_spv'];
                                                                            $dis_manager=$rowco['dis_manager'];
                                                                            $dis_direksi=$rowco['dis_direksi'];
                                                                            $dis_showroom=$rowco['dis_showroom'];
                                                                            $dis_agent=$rowco['dis_agent'];
                                                                            $dis_project=$rowco['dis_project'];
                                                                            $dis_distribusi=$rowco['dis_distribusi'];

                                                                          }

                                                                          ?>
                                                                                <div class="row">
                                                                                  <div class="col-sm-3">
                                                                                  <label>Showroom Cost</label>
                                                                                  <input type="text" class="bundar form-control" id="sc" name="sc"  onfocus="hitungsc()">
                                                                                  <input type="hidden" class="bundar form-control" id="sc1" name="sc1"  value="<?php echo $sc;?>">
                                                                                </div>
                                                                                <script>
                                                                                function hitungsc()
                                                                                {
                                                                                  a=document.getElementById("cogs").value;
                                                                                  sc1=document.getElementById("sc1").value;
                                                                                  b=a*(sc1/100);
                                                                                  c=b.toFixed(0)
                                                                                  document.getElementById("sc").value=c;

                                                                                }
                                                                                </script>

                                                                                    <div class="col-sm-3">
                                                                                      <label>Sales Travel Cost</label>
                                                                                    <input type="text" class="bundar form-control" id="tc" name="tc"  onfocus="hitungtc()">
                                                                                    <input type="hidden" class="bundar form-control" id="tc1" name="tc1"  value="<?php echo $tc;?>">

                                                                                  </div>
                                                                                  <script>
                                                                                  function hitungtc()
                                                                                  {
                                                                                    a=document.getElementById("cogs").value;
                                                                                    tc1=document.getElementById("tc1").value;
                                                                                    b=a*(tc1/100);
                                                                                    c=b.toFixed(0)
                                                                                    document.getElementById("tc").value=c;

                                                                                  }
                                                                                  </script>
                                                                                  <div class="col-sm-3">
                                                                                    <label>Marketing Cost</label>
                                                                                    <input type="text" class="bundar form-control" id="mc" name="mc"  onfocus="hitungmc()">
                                                                                    <input type="hidden" class="bundar form-control" id="mc1" name="mc1"  value="<?php echo $mc;?>">
                                                                                </div>
                                                                                <script>
                                                                                function hitungmc()
                                                                                {
                                                                                  a=document.getElementById("cogs").value;
                                                                                  mc1=document.getElementById("mc1").value;
                                                                                  b=a*(mc1/100);
                                                                                  c=b.toFixed(0)
                                                                                  document.getElementById("mc").value=c;

                                                                                }
                                                                                </script>

                                                                                <div class="col-sm-3">
                                                                                  <label>Interest</label>
                                                                                  <input type="text" class="bundar form-control" id="interest" name="interest"  onfocus="hitunginterest()">
                                                                                  <input type="hidden" class="bundar form-control" id="interest1" name="interest1"  value="<?php echo $interest;?>">

                                                                              </div>
                                                                              <script>
                                                                              function hitunginterest()
                                                                              {
                                                                                a=document.getElementById("cogs").value;
                                                                                interest1=document.getElementById("interest1").value;
                                                                                b=a*(interest1/100);
                                                                                c=b.toFixed(0)
                                                                                document.getElementById("interest").value=c;

                                                                              }
                                                                              </script>

                                                                                <div class="col-sm-3">
                                                                                  <label>Sales Commision</label>
                                                                                  <input type="text" class="bundar form-control" id="sic" name="sic"  onfocus="hitungsic()">
                                                                                  <input type="hidden" class="bundar form-control" id="sic1" name="sic1"  value="<?php echo $sic;?>">

                                                                              </div>
                                                                              <script>
                                                                              function hitungsic()
                                                                              {
                                                                                a=document.getElementById("cogs").value;
                                                                                sic1=document.getElementById("sic1").value;
                                                                                b=a*(sic1/100);
                                                                                c=b.toFixed(0)
                                                                                document.getElementById("sic").value=c;

                                                                              }
                                                                              </script>
                                                                              <div class="col-sm-3">
                                                                                <label>Fixed Cost</label>
                                                                                <input type="text" class="bundar form-control" id="fc" name="fc"  onfocus="hitungfc()">
                                                                                <input type="hidden" class="bundar form-control" id="fc1" name="fc1"  value="<?php echo $fc;?>">

                                                                            </div>
                                                                            <script>
                                                                            function hitungfc()
                                                                            {
                                                                              a=document.getElementById("cogs").value;
                                                                              fc1=document.getElementById("fc1").value;
                                                                              b=a*(fc1/100);
                                                                              c=b.toFixed(0)
                                                                              document.getElementById("fc").value=c;

                                                                            }
                                                                            </script>
                                                                            <div class="col-sm-3">
                                                                              <label> Net Profit </label>
                                                                              <input type="text" class="bundar form-control" id="rpc" name="rpc" onfocus="hitungrpc()">
                                                                              <input type="hidden" class="bundar form-control" id="rpc1" name="rpc1"  value="<?php echo $rpc;?>">

                                                                          </div>
                                                                          <script>
                                                                          function hitungrpc()
                                                                          {
                                                                            a=document.getElementById("cogs").value;
                                                                            rpc1=document.getElementById("rpc1").value;
                                                                            b=a*(rpc1/100);
                                                                            c=b.toFixed(0);
                                                                            document.getElementById("rpc").value=c;

                                                                          }
                                                                          </script>
                                                                          <div class="col-sm-3">
                                                                            <label> Saving </label>
                                                                            <input type="text" class="bundar form-control" id="saving" name="saving"  onfocus="hitungsaving()">
                                                                            <input type="hidden" class="bundar form-control" id="saving1" name="saving1"  value="<?php echo $saving;?>">
                                                                          </div>
                                                                          <script>
                                                                          function hitungsaving()
                                                                          {
                                                                          a=document.getElementById("cogs").value;
                                                                          saving1=document.getElementById("saving1").value;
                                                                          b=a*(saving1/100);
                                                                          c=b.toFixed(0)

                                                                          document.getElementById("saving").value=c;

                                                                          }
                                                                          </script>
                                                                              </div><br>
                                                                              <div class="row">
                                                                              <div class="col-sm-3">
                                                                                <label> Middleman</label>
                                                                                <input type="text" class="bundar form-control" id="middle" name="middle"  onfocus="hitungmiddle()">
                                                                                <input type="hidden" class="bundar form-control" id="middle1" name="middle1"  value="<?php echo $middle;?>">
                                                                              </div>
                                                                              <script>
                                                                              function hitungmiddle()
                                                                              {
                                                                              a=document.getElementById("cogs").value;
                                                                              middle1=document.getElementById("middle1").value;
                                                                              b=a*(saving1/100);
                                                                              c=b.toFixed(0)

                                                                              document.getElementById("middle").value=c;

                                                                              }
                                                                              </script>
                                                                              <div class="col-sm-3">
                                                                                <label>Project</label>
                                                                                <input type="text" class="bundar form-control" id="project" name="project"  onfocus="hitungproject()">
                                                                                <input type="hidden" class="bundar form-control" id="project1" name="project1"  value="<?php echo $project; ?>">
                                                                              </div>
                                                                              <script>
                                                                              function hitungproject()
                                                                              {
                                                                              a=document.getElementById("cogs").value;
                                                                              project1=document.getElementById("project1").value;
                                                                              b=a*(saving1/100);
                                                                              c=b.toFixed(0)

                                                                              document.getElementById("project").value=c;

                                                                              }
                                                                              </script>
                                                                              <div class="col-sm-3">
                                                                                <label>Onsite Cost</label>
                                                                                <input type="text" class="bundar form-control" id="osc" name="osc"  onfocus="hitungosc()">
                                                                                <input type="hidden" class="bundar form-control" id="osc1" name="osc1"  value="<?php echo $osc; ?>">
                                                                              </div>
                                                                              <script>
                                                                              function hitungosc()
                                                                              {
                                                                              a=document.getElementById("cogs").value;
                                                                              osc1=document.getElementById("osc1").value;
                                                                              b=a*(osc1/100);
                                                                              c=b.toFixed(0)

                                                                              document.getElementById("osc").value=c;

                                                                              }
                                                                              </script>
                                                                              <div class="col-sm-3">
                                                                                <label>Storage Cost</label>
                                                                                <input type="text" class="bundar form-control" id="stocost" name="stocost"  onfocus="hitungstocost()">
                                                                                <input type="hidden" class="bundar form-control" id="stocost1" name="stocost1"  value="<?php echo $stocost; ?>">
                                                                              </div>
                                                                              <script>
                                                                              function hitungstocost()
                                                                              {
                                                                              a=document.getElementById("cogs").value;
                                                                              stocost1=document.getElementById("stocost1").value;
                                                                              b=a*(stocost1/100);
                                                                              c=b.toFixed(0)

                                                                              document.getElementById("stocost").value=c;

                                                                              }
                                                                              </script>

                                                                            </div>


                                                                      <div class="row">
                                                                        <div class="col-sm-3">
                                                                          <label> Bottom Price </label>
                                                                          <input type="text" class="bundar form-control" id="bot" name="bot"  onfocus="hitungbot()">
                                                                      </div>
                                                                      <script>
                                                                      function hitungbot()
                                                                      {
                                                                        a=parseFloat(document.getElementById("sc").value);
                                                                        b=parseFloat(document.getElementById("tc").value);
                                                                        c=parseFloat(document.getElementById("mc").value);
                                                                        c=parseFloat(document.getElementById("interest").value);
                                                                        d=parseFloat(document.getElementById("sic").value);
                                                                        e=parseFloat(document.getElementById("fc").value);
                                                                        f=parseFloat(document.getElementById("rpc").value);
                                                                        g=parseFloat(document.getElementById("saving").value);
                                                                        i=parseFloat(document.getElementById("middle").value);
                                                                        j=parseFloat(document.getElementById("project").value);
                                                                        k=parseFloat(document.getElementById("osc").value);
                                                                        l=parseFloat(document.getElementById("stocost").value);

                                                                        h=parseFloat(document.getElementById("cogs").value);



                                                                        b=a+b+c+d+e+f+g+i+j+k+l+h;

                                                                        document.getElementById("bot").value=b;

                                                                      }
                                                                      </script>
                                                                      <div class="col-sm-3">
                                                                          <label> Project price</label>
                                                                          <input type="text" class="bundar form-control" id="dis_project" name="dis_project">

                                                                      </div>


                                                                      <?php
                                                                      $sqldis="SELECT * FROM leveldiskon";
                                                                      $resultdis = mysqli_query($conn,$sqldis);
                                                                      while($rowdis = mysqli_fetch_array($resultdis)) {
                                                                        $up1=$rowdis['up1'];
                                                                        $up2=$rowdis['up2'];
                                                                        $dis1=$rowdis['dis1'];
                                                                        $dis2=$rowdis['dis2'];
                                                                        $dis3=$rowdis['dis3'];

                                                                      }
                                                                      ?>
                                                                      <div class="col-sm-3">
                                                                        <input type="hidden" id="up1" value="<?php echo $up1;?>">
                                                                        <label> Price List </label>
                                                                        <input type="text" class="bundar form-control" id="pl" name="pl" onfocus="hitungpl1()">

                                                                      </div>

                                                                    <script>
                                                                    function hitungpl1()
                                                                    {
                                                                      // a=document.getElementById("pl").value;
                                                                      up=document.getElementById("up1").value;
                                                                      dis=document.getElementById("dis_project").value;
                                                                      b=(100/up)*dis;

                                                                      c=b.toFixed(0);

                                                                      document.getElementById("pl").value=c;

                                                                    }
                                                                    </script>

                                                                    <div class="col-sm-3">
                                                                      <input type="hidden" id="up2" value="<?php echo $up2;?>">
                                                                      <label> Store Price List </label>
                                                                      <input type="text" class="bundar form-control" id="pls" name="pls" onfocus="hitungpl2()">

                                                                    </div>

                                                                  <script>
                                                                  function hitungpl2()
                                                                  {
                                                                    // a=document.getElementById("pl").value;
                                                                    up2=document.getElementById("up2").value;
                                                                    dis=document.getElementById("dis_project").value;
                                                                    b=(100/up2)*dis;

                                                                    c=b.toFixed(0);

                                                                    document.getElementById("pls").value=c;

                                                                  }
                                                                  </script>

                                                                  <div class="col-sm-3">
                                                                    <input type="hidden" id="dis1" value="<?php echo $dis1;?>">
                                                                    <label> Discount Retail (sales) </label>
                                                                    <input type="text" class="bundar form-control" id="retail" name="retail" onfocus="hitungdis1()">

                                                                  </div>

                                                                  <script>
                                                                  function hitungdis1()
                                                                  {
                                                                  // a=document.getElementById("pl").value;
                                                                  dis1=parseInt(document.getElementById("dis1").value);
                                                                  pls=parseInt(document.getElementById("pls").value);
                                                                  b=pls-(pls*(dis1/100));

                                                                  c=b.toFixed(0);

                                                                  document.getElementById("retail").value=c;

                                                                  }
                                                                  </script>

                                                                  <div class="col-sm-3">
                                                                    <input type="hidden" id="dis2" value="<?php echo $dis2;?>">
                                                                    <label> Discount Retail (SPV) </label>
                                                                    <input type="text" class="bundar form-control" id="retails" name="retails" onfocus="hitungdis2()">

                                                                  </div>

                                                                  <script>
                                                                  function hitungdis2()
                                                                  {
                                                                  // a=document.getElementById("pl").value;
                                                                  dis2=parseInt(document.getElementById("dis2").value);
                                                                  pls=parseInt(document.getElementById("pls").value);
                                                                  b=pls-(pls*(dis2/100));

                                                                  c=b.toFixed(0);

                                                                  document.getElementById("retails").value=c;

                                                                  }
                                                                  </script>
                                                                  <div class="col-sm-3">
                                                                    <input type="hidden" id="dis3" value="<?php echo $dis3;?>">
                                                                    <label> Discount Retail (Manager) </label>
                                                                    <input type="text" class="bundar form-control" id="retailm" name="retailm" onfocus="hitungdis3()">

                                                                  </div>

                                                                  <script>
                                                                  function hitungdis3()
                                                                  {
                                                                  // a=document.getElementById("pl").value;
                                                                  dis3=parseInt(document.getElementById("dis3").value);
                                                                  pls=parseInt(document.getElementById("pls").value);
                                                                  b=pls-(pls*(dis3/100));

                                                                  c=b.toFixed(0);

                                                                  document.getElementById("retailm").value=c;

                                                                  }
                                                                  </script>





                                                                    <script>
                                                                    function dissales()
                                                                    {
                                                                      a=document.getElementById("pl").value;//2.3jt
                                                                      d1=document.getElementById("d1").value;//30%
                                                                      b=a*(d1/100);
                                                                      d=a-b;
                                                                      c=d.toFixed(0);

                                                                      document.getElementById("dis_sales").value=c;

                                                                    }
                                                                    </script>
                                                                    <!-- <div class="col-sm-2">
                                                                      <label> Discount Retail(SPV)</label>
                                                                      <input type="text" class="bundar form-control" id="dis_spv" name="dis_spv"  onfocus="disspv()">
                                                                      <input type="hidden" class="bundar form-control" id="d2" name="d2"  value="<?php echo $dis_spv;?>">
                                                                  </div> -->
                                                                  <script>
                                                                  function disspv()
                                                                  {
                                                                    a=document.getElementById("pl").value;//2.3jt
                                                                    d1=document.getElementById("d2").value;//30%
                                                                    b=a*(d1/100);
                                                                    d=a-b;
                                                                    c=d.toFixed(0);

                                                                    document.getElementById("dis_spv").value=c;

                                                                  }
                                                                  </script>
                                                                  <!-- <div class="col-sm-2">
                                                                    <label> Discount Retail(Manager)</label>
                                                                    <input type="text" class="bundar form-control" id="dis_manager" name="dis_manager"  onfocus="dismanager()">
                                                                    <input type="hidden" class="bundar form-control" id="d3" name="d3"  value="<?php echo $dis_manager;?>">
                                                                </div> -->
                                                                <script>
                                                                function dismanager()
                                                                {
                                                                  a=document.getElementById("pl").value;//2.3jt
                                                                  d1=document.getElementById("d3").value;//30%
                                                                  b=a*(d1/100);
                                                                  d=a-b;
                                                                  c=d.toFixed(0);

                                                                  document.getElementById("dis_manager").value=c;

                                                                }
                                                                </script>

                                                                      <script>
                                                                      function hitungallow()
                                                                      {
                                                                        a=document.getElementById("cogs").value;
                                                                        allow1=document.getElementById("allow1").value;
                                                                        b=a*(allow1/100);

                                                                        document.getElementById("allow").value=b;

                                                                      }
                                                                      </script>





                                                                      <script>

                                                                      function hitungpl()
                                                                      {
                                                                        a=document.getElementById("bot").value;
                                                                        pl1=document.getElementById("pl1").value;
                                                                        pl2=parseFloat(pl1);
                                                                        pl3=1+(pl2/100);
                                                                        b=a*pl3;

                                                                        document.getElementById("pl").value=b;
                                                                      }
                                                                      </script>


                                                                    </div>


                                                                    </div>
                                                                    <br>
                                                                         <div class="row">
                                                                         <div class="col-sm-2">
                                                                           <div class="form-group">
                                                                           <select class="form-control" id="status" name="status">
                                                                             <option>--Status--</option>
                                                                             <option>Active</option>
                                                                             <option>InActive</option>
                                                                         </select>
                                                                       </div>
                                                                     </div>
                                                                     </div>
                                                                     <?php
                                                                     if ($aksi=="view")
                                                                     {
                                                                       ?>
                                                                       <div class="row">
                                                                       <div class="form-group">
                                                                          <div class="col-sm-2">
                                                                       <button type="submit" name="daftar1" value="daftar1" class="bundar btn btn-info ">Update</button>
                                                                     </div>
                                                                     </div>
                                                                   </div>

                                                                 <?php } else {?>
                                                                       <div class="row">
                                                                       <div class="form-group">
                                                                          <div class="col-sm-2">
                                                                       <button type="submit" name="daftar" value="daftar" class="bundar btn btn-info ">Submit</button>
                                                                     </div>
                                                                     </div>
                                                                   </div>
                                                                 <?php } ?>


                                                            <br><br>
                                                                    </form>
                                                                    <script type="text/javascript">
                                                                     $(document).ready(function() {
                                                                         $('#kode').select2();

                                                                     });
                                                                    </script>
                                                                </div>
                                                                </div>

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
    </div>
  </div>
  </div>
</div>
        <!--  END CONTENT AREA  -->
        <?php
        include('../blank_footer.php')
        ?>
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
    </div>
</body>
</html>

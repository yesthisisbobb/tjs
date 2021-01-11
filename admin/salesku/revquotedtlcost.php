<!DOCTYPE html>

<?php
  session_start();
  include("../../config.php");

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
include('../blank_header.php');
  $kodestok=$_GET["kodestok"];
  $id=$_GET["id"];
  $sh=$_GET["sh"];
  $rev=$_GET["rev"];
  $user=$_SESSION["username"];

  $sql21 = "SELECT * FROM login where email='$user'";
       $query21 = mysqli_query($conn, $sql21);
       while($amku21 = mysqli_fetch_array($query21)){
         $div=$amku21["divisi2"];
       }

 ?>

<body class="sidebar-noneoverflow">

    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

      <?php
      include('../blank_page.php')
      ?>
        <!--  BEGIN CONTENT AREA  -->



        <?php function rupiah($angka){

        $hasil_rupiah = "" . number_format($angka,2,',','.');
        return $hasil_rupiah;

        } ?>

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
              <div class="row layout-top-spacing">
                <!-- start of content area 1 -->
                  <div id="basic" class="col-lg-12 layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                      <h4>Costing Adjustment</h4>
                                  </div>
                              </div>
                          </div>
                          <hr>

                <!-- start of content area 1 -->
                <input type="hidden" id="divisi" name="divisi" value="<?php echo $div; ?>">
                <select id="pildiv" onchange="pildiv1(this.value)">
                  <option>
                    Select Division
                  </option>
                   <option>
                     PTA LOW
                   </option>
                   <option>
                     PTA HIGH
                   </option>

                </select>
                <br>
                <br>

                <?php
                $sql22 = "SELECT * FROM master_cost where divisi='$div'";
                     $query22 = mysqli_query($conn, $sql22);
                     while($amku22 = mysqli_fetch_array($query22)){

                       $sc2=$amku22['sc'];
                       $tc2=$amku22['tc'];
                       $mc2=$amku22['mc'];
                       $sic2=$amku22['sic'];
                       $fc2=$amku22['fc'];
                       $rpc2=$amku22['rpc'];
                       $allow2=$amku22['allow'];

                     }
                     ?>
                <div class="row mb-3">
                <div class="col-sm-12">

                      <span style="color:blue">Quotation No. <?php echo $id; ?> |
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $idku;?>">
                      <?php echo $idku;?></span>
                      <span style="color:powderblue">Revision No. <?php echo $rev; ?>
                        <input type="hidden" class="form-control" id="rev" name="rev" value="<?php echo $inorev;?>">
                        <?php echo $norev;?></span>

                </div>

                </div>
                <div class="row">

                <div class="col-sm-12">
                  <div class="form-group">
                    <span style="color:blue">Stock Code. <?php echo $kodestok; ?>
                  <input type="hidden" class="form-control" id="sc" name="sc" value="<?php echo $kodestok;?>">

                </div>
                </div>
                <?php
                $sqlbuy = "SELECT * FROM master_hpp where tjsitemcode='$kodestok'";
                     $querybuy = mysqli_query($conn, $sqlbuy);
                     while($amkubuy = mysqli_fetch_array($querybuy)){
                       $bp=$amkubuy["buyprice"];

                     }

                     ?>
                <?php
                $sql2 = "SELECT * FROM master_price where kode='$kodestok'";
                     $query2 = mysqli_query($conn, $sql2);
                     while($amku2 = mysqli_fetch_array($query2)){
                       $cogs=$amku2["cogs"];
                       $sc=$amku2["sc"];
                       $tc=$amku2["tc"];
                       $mc=$amku2["mc"];
                       $sic=$amku2["sic"];
                       $fc=$amku2["fc"];
                       $rpc=$amku2["rpc"];
                       $allow=$amku2["allow"];
                       $bot=$amku2["bot"];
                       $pr=(($bot-$cogs)/$bot)*100;
                       $pr1=(($cogs-$bp)/$cogs)*100;

                     }

                     ?>
                     <div class="col-sm-12">
                       <div class="form-group">
                         <span style="color:blue">Buying Price IDR.<?php echo rupiah($bp); ?>
                       <input type="hidden" class="form-control" id="bp" name="bp" value="<?php echo $bp;?>">

                     </div>
                     </div>
                     <div class="col-sm-12">
                       <div class="form-group">
                         <span style="color:blue">HPP Real IDR.<?php echo rupiah($cogs); ?>(<?php echo round($pr1); ?>%)
                       <input type="hidden" class="form-control" id="hpp1" name="hpp1" value="<?php echo $cogs;?>">

                     </div>
                     </div>
                     <div class="col-sm-12">
                       <div class="form-group">
                         <span style="color:blue">Initial Bottom Price IDR.<?php echo rupiah($bot); ?> (<?php echo round($pr); ?>%)
                       <input type="hidden" class="form-control" id="bot2" name="bot2" value="<?php echo $bot;?>">

                     </div>
                     </div>
                     <div class="col-sm-12">
                       <div class="form-group">
                         <span style="color:blue">Bottom Price after Adjusment IDR.</span><span style="color:blue" id="botper1"></span><span style="color:blue">(<span><span style="color:blue" id="botper2"></span><span style="color:blue">%)</span>
                       <input type="hidden" class="form-control" id="bot2" name="bot2" value="<?php echo $bot;?>">

                     </div>
                     </div>
                   </div>
                   <hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <span style="color:blue"> <input type="hidden" class="form-control" id="hppreal" name="hppreal" value="<?php echo $cogs;?>" >

                </div>
                </div>
              </div>

              <div class="col-sm-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">1. Showroom Cost</span>
                </div>
                <input type="text" style="text-align:center;" class="form-control" id="sc2" value="<?php echo $sc2;?>" onchange="persen(this.value)">
                <script>
                function persen(str)
                {
                  z=parseInt(document.getElementById("hppreal").value);
                  y=parseInt(str)/100;
                  y1=z*y;
                  document.getElementById("sc1").value=y1;

                }
                </script>
                <input type="text" style="text-align:center;"  class="form-control" id="sc1" value="<?php echo $sc;?>">
                <!-- <script>
                $("#sc1").inputmask({mask:"$999,9999,999.99"});
                </script> -->
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">2. Travel Cost</span>
                </div>
                <input type="text"  style="text-align:center;" class="form-control" id="tc2" name="tc2" value="<?php echo $tc2;?>" onchange="persen1(this.value)">
                <script>
                function persen1(str)
                {
                  z=parseInt(document.getElementById("hppreal").value);
                  y=parseInt(str)/100;
                  y1=z*y;
                  document.getElementById("tc1").value=y1;

                }
                </script>
                <input type="text" style="text-align:center;" id="tc1" name="tc1" value="<?php echo $tc;?>" class="form-control">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">3. Incentive Cost</span>
                </div>
                <input type="text"  style="text-align:center;" id="sic2" name="sic2" value="<?php echo $sic2;?>"  onchange="persen2(this.value)" class="form-control">
                <script>
                function persen2(str)
                {
                  z=parseInt(document.getElementById("hppreal").value);
                  y=parseInt(str)/100;
                  y1=z*y;
                  document.getElementById("sic").value=y1;

                }
                </script>
                <input type="text"   style="text-align:center;" id="sic" name="sic" value="<?php echo $sic;?>" class="form-control">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">4. Marketing Cost</span>
                </div>
                <input type="text"  id="mc2" name="mc2" style="text-align:center;" value="<?php echo $mc2;?>"  onchange="persen3(this.value)" class="form-control">
                <script>
                function persen3(str)
                {
                  z=parseInt(document.getElementById("hppreal").value);
                  y=parseInt(str)/100;
                  y1=z*y;
                  document.getElementById("mc").value=y1;

                }
                </script>
                <input type="text"  id="mc" name="mc" style="text-align:center;" value="<?php echo $mc;?>" class="form-control">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">5. Fixed Cost</span>
                </div>
                <input type="text"   id="tc1" name="tc1" style="text-align:center;" value="<?php echo $fc2;?>" onchange="persen4(this.value)" class="form-control">
                <script>
                function persen4(str)
                {
                  z=parseInt(document.getElementById("hppreal").value);
                  y=parseInt(str)/100;
                  y1=z*y;
                  document.getElementById("fc").value=y1;

                }
                </script>
                <input type="text"  id="fc" name="fc" style="text-align:center;" value="<?php echo $fc;?>" class="form-control">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">6. Saving</span>
                </div>
                <input type="text"  id="rpc2" name="rpc2" style="text-align:center;" value="<?php echo $rpc2;?>" onchange="persen5(this.value)" class="form-control">
                <script>
                function persen6(str)
                {
                  z=parseInt(document.getElementById("hppreal").value);
                  y=parseInt(str)/100;
                  y1=z*y;
                  document.getElementById("allow").value=y1;

                }
                </script>
                <input type="text" id="rpc" name="rpc" style="text-align:center;" value="<?php echo $rpc;?>" class="form-control">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">7. Allowance</span>
                </div>
                <input type="text"  id="allow2" style="text-align:center;" name="allow2" value="<?php echo $allow2;?>" onchange="persen6(this.value)" class="form-control">
                <script>
                function persen6(str)
                {
                  z=parseInt(document.getElementById("hppreal").value);
                  y=parseInt(str)/100;
                  y1=z*y;
                  document.getElementById("allow").value=y1;

                }
                </script>
                <input type="text"  style="text-align:center;" id="allow" name="allow" value="<?php echo $allow;?>" class="form-control">
              </div>

              <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <span style="color:blue">Bottom : <input type="text" class="form-control" id="bot" name="bot" value="<?php echo $bot;?>" onfocus="hitung1()">

              </div>
              </div>
            </div>
            </div>



                    <script>
                    function hitung1()
                    {
                      hppreal=parseInt(document.getElementById("hppreal").value)
                      sc1=parseInt(document.getElementById("sc1").value);
                      tc1=parseInt(document.getElementById("tc1").value);
                      mc=parseInt(document.getElementById("mc").value);
                      sic=parseInt(document.getElementById("sic").value);
                      fc=parseInt(document.getElementById("fc").value);
                      rpc=parseInt(document.getElementById("rpc").value);
                      allow=parseInt(document.getElementById("allow").value);

                      bot11=parseInt(document.getElementById("bot").value);

                      a=hppreal+sc1+tc1+mc+sic+fc+rpc+allow;
                      b=((a-hppreal)/a)*100;
                      document.getElementById("bot").value=a;
                      document.getElementById("botper1").innerHTML=a;
                      document.getElementById("botper2").innerHTML=Math.round(b);

                    }
                    </script>
<button name="daftar" value="daftar" class="btn btn-primary" onclick="hitung1()">Save</button>
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

<!DOCTYPE html>

<?php
  session_start();
  include("../../config.php");
  include("../../proses.php");
  $i = 0;
  $diskonku = null;
  $diskonku2 = null;
  $diskonku3 = null;
  $diskonku4 = null;
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

  $idku=$_GET["noso"];
 ?>
 <?php
 global $hal;
 $hal = "soc";
 include('../blank_subheader.php');
 ?>
 <?php
   function rupiah($angka){

   $hasil_rupiah = "Rp." . number_format($angka,0,',','.');
   return $hasil_rupiah;

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



        <?php

          $sqlin1 = "SELECT * FROM jual where noso='$idku'";
               $queryin1 = mysqli_query($conn, $sqlin1);
               while($amkuin1 = mysqli_fetch_array($queryin1)){

                 $cust1=$amkuin1["user_id"];}
?>

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
              <div class="row layout-top-spacing">
                <!-- start of content area 1 -->
                  <div id="basic" class="col-lg-12 layout-spacing">
                      <div class="statbox widget box box-shadow">
                          <div class="widget-header">
                            <form method="post" action="proses-data.php?noso=<?=$_GET['noso']?>" id="formku">
                              <div class="row">
                                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                                      <h6 style="text-align:left;font-weight:bold;">SO No.
                                    <input type="hidden" class="form-control" id="id1" name="id1" value="<?php echo $idku;?>">
                                  <?php echo $idku;?></h6>
                                  <h6 style="text-align:left;font-weight:100;"> Customer.ID <?php echo $cust1; ?><input type="hidden" name="cid" id="cid" value="<?php echo $cust1; ?>"></h6>
                                  </div>
                              </div>
                          </div>
                          <hr>

                <!-- start of content area 1 -->

                <div class="row">
                <div class="col-sm-12">

                </div>
                </div>
                <?php
                  $status = "";
                  $sqlin = "SELECT * FROM jual where noso='$idku'";
                       $queryin = mysqli_query($conn, $sqlin);
                       while($amkuin = mysqli_fetch_array($queryin)){
                         $cartid=$amkuin["cart_id"];
                         $tgl=$amkuin["tgl"];
                         $status=$amkuin["status"];
                         $cust=$amkuin["user_id"];



                              }
                              $d=substr($tgl,0,2);
                              $m=substr($tgl,3,2);
                              $y=substr($tgl,6,2);


                        			$inv="INV"."/"."SBYRTL"."/".$cartid."/".$idku."/".$d.$m.$y;

                  ?>
                <div class="row">
                  <!-- <div class=col-sm-4>
                    <b>Payment</b> : <br><input type="checkbox"> Cash Before Delivery
                    <br><input type="checkbox"> Cash After Delivery
                  </div> -->

                    <div class=col-sm-6>
                      <b>DELIVERY</b> : <br><input type="checkbox" id="pil1" name="pil1" onclick="cek()"> Full-Delivery Date : <input type="date" id="tglu" name="tglu">


                    </div>

                </div>

                  <div class="col-lg-12 col-12 mx-auto"  style="overflow-x:auto;">
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <tr>

                    <th>Picture</th>
                    <th>Product Name</th>
                    <th>Qty(pcs)</th>
                    <th>Price (pcs) </th>
                    <th>Total</th>
                    <th>Partial Delivery Date</th>

                  </tr>
                  <?php
                  $total1=0;
                    $sql = "SELECT * FROM jualdtl where noso='$idku'";
                         $query = mysqli_query($conn, $sql);
                         while($amku = mysqli_fetch_array($query)){
                           $kode=$amku["kode_stok"];
                           $no=$amku["no"];
                           $jumlah=$amku["jumlah"];
                           $hargaakhir=$amku["hargaakhir"];
                           $harga=$amku["harga"];
                           $total=$hargaakhir*$jumlah;
                           $diskonku=$amku["diskon"];
                           $diskonku2=$amku["diskon2"];
                           $diskonku3=$amku["diskon3"];
                           $diskonku4=$amku["diskon4"];
                           $total1=$total1+$total;
                           $sql1 = "SELECT * FROM master_stok where kode_stok='$kode'";
                                $query1 = mysqli_query($conn, $sql1);
                                while($amku1 = mysqli_fetch_array($query1)){
                                  $kodet=$amku1["kodetipe"];
                                }

          											$sql2 = "SELECT * FROM master_price where kode='$kode'";
          													 $query2 = mysqli_query($conn, $sql2);
          													 while($amku2 = mysqli_fetch_array($query2)){
          														//  $bot=$amku2['dis_showroom'];
          														//  $dis1=$amku['dis_distribusi'];
          														 $pl=$amku2['pl'];
          														 $pls=$amku2['pls'];
          														//  $dp=$amku2['disprice'];
          														//  $bp=$amku2['bp'];
          														//  $disprice=$amku2['disprice'];
          														 $disproject=$amku2['disproject'];
          														 //$bot=$amku2['bot'];
          														 $cogs=$amku2['cogs'];


          														 $retail=$amku2['retail'];
          														  $retails=$amku2['retails'];
          															$retailm=$amku2['retailm'];
                                        $disproject=$amku2['disproject'];



          													 }

                    ?>
                     <input type="hidden" id="nomer[]" name="nomer[]" value="<?php echo $no; ?>">
                    <tr>
                      <td><img src="../../venturafe1/img/gambar/<?php echo $kodet; ?>.jpg" width="100" height="100"></td>
                      <td><?php echo $kodet; ?><input type="hidden" id="kodet[]" name="kodet[]" value="<?php echo $kodet; ?>"></td>
                      <td><?php echo $jumlah; ?><input type="hidden" id="qty[]" name="qty[]" value="<?php echo $jumlah; ?>"></td>
                      <td>
                        <?php
                        $sqlinok = "SELECT * FROM jual where noso='$idku'";
                             $queryinok = mysqli_query($conn, $sqlinok);
                             while($amkuinok = mysqli_fetch_array($queryinok)){

                               $statusok=$amkuinok["status"];

                             }
                        if ($statusok=="OPEN")
                        {
                        ?>
                        <input type="hidden" id="harga[]" name="harga[]" value="<?php echo $pls; ?>">
                        <label id='disc<?=$i?>'> <?php echo rupiah($pls); ?></label>
                      <?php } else if ($statusok=="CLOSED") {?>
                        <input type="hidden" id="harga[]" name="harga[]" value="<?php echo $hargaakhir; ?>">
                        <label id='disc<?=$i?>'> <?php echo rupiah($hargaakhir); ?></label>
                      <?php } ?>
                      <?php
                      $user=$_SESSION["username"];

                      $sqlku11 = "SELECT * FROM login where email='$user'";
                      $queryku11 = mysqli_query($conn, $sqlku11);
                       while($amku11 = mysqli_fetch_array($queryku11)){
                         $divisiku=$amku11['divisi2'];
                         $role=$amku11['role'];
                         $statuslevel=$amku11['level'];

                       }
                       
                       if (($divisiku=="PTA LOW") and ($role=="admin"))
                       {
                      ?>


                          <hr>Target Price<br><input type="number" class="anjay" id="hargan<?= $i?>"name="hargan[]" required value="<?php echo $hargaakhir; ?>">
                          <br>
                          <label id='hargan<?=$i?>'></label>
                          <br>
                          Discount Limit<br><input type="hidden"  readonly id="hargal" name="hargal[]" value="<?php echo $retail; ?>"><label id='disc<?=$i?>'> <?= rupiah($retail); ?></label></td>
                          
                    <?php } else  if (($divisiku=="PTA LOW") and ($role=="supervisor"))
                    { ?>
                      <hr>Target Price<br><input type="number" class="anjay" id="hargan1<?= $i?>" name="hargan1[]" required value="<?php echo $hargaakhir; ?>">
                                                <br>
                          <label id='hargan1<?=$i?>'></label>
                          <br>
                        Discount Limit<br><input type="hidden" readonly id="hargal" name="hargal[]" value="<?php echo $retails; ?>"><label id='disc<?=$i?>'> <?php echo rupiah($retails); ?></label></td>
                        

                    <?php } else  if (($divisiku=="PTA LOW") and ($role=="manager"))
                    { ?>
                      <hr>Target Price<BR><input type="number" class="anjay" id="hargan2<?= $i?>"name="hargan2[]" required value="<?php echo $hargaakhir; ?>">
                                                <br>
                          <label id='hargan2<?=$i?>'></label>
                          <br>
                        Discount Limit<br><input type="hidden" readonly id="hargal" name="hargal[]" value="<?php echo $retailm; ?>"><label id='disc<?=$i?>'> <?php echo rupiah($retailm); ?></label></td>
                        

                    <?php } else  if (($divisiku=="PTA LOW") and ($role=="director"))
                    { ?>
                      <hr>Target Price<BR><input type="number" class="anjay" id="hargan3<?= $i?>" name="hargan3[]" required value="<?php echo $hargaakhir; ?>">
                                                <br>
                          <label id='hargan3<?=$i?>'></label>
                          <br>
                        Discount Limit<br><input type="hidden" readonly id="hargal" name="hargal[]" value="<?php echo $disproject; ?>"><label id='disc<?=$i?>'> <?php echo rupiah($discproject); ?></label></td>
                        

                    <?php }
                    $i++;?>



                      </script>

                      
                      <td><?php echo rupiah($hargaakhir); ?></td><input type="hidden" id="total[]" name="total[]" value="<?php echo $hargaakhir; ?>">
                    <td>

                      <input type="date" id="tgl" name="tgl[]"></td>
                      <script>
                      function cek(){
                        a=document.getElementById("pil1");


                        var myForm = document.forms.formku;
                        var myControls = myForm.elements['tgl[]'];
                        for (var i = 0; i < myControls.length; i++) {
                          if (a.checked==true)
                          {
                          myControls[i].disabled=true;
                          }
                          else
                          {
                            myControls[i].disabled=false;
                          }

                      }



                    }
                      </script>
                    </tr>
                  <?php } ?>
                  <tr><td>Approved By : </td><td><?php if($diskonku!=null){echo "Admin" ;} if($diskonku2!=null){echo ", Supervisor" ;} if($diskonku3 != null){echo ", Manager" ;} if($diskonku4 != null){echo ", Director" ;}?></td><td></td><td>Sub Total</td><td><?php echo rupiah($total1); ?></td><td><input type="hidden" id="sub" value="<?php echo $total1; ?>"></td></tr>
                  <!-- <tr><td></td><td></td><td></td><td>Discount</td><td><input readonly type="text"> </td><td></td></tr> -->
                  <!-- <tr><td></td><td></td><td></td><td>Addition Fee</td><td><input type="text" id="add" onchange="hitungt(this.value)"></td><td></td></tr> -->
                  <!-- <tr><td></td><td></td><td></td><td>Tax</td><td><input type="text">  <input type="checkbox"> Zero tax</td>a<td></td></tr> -->
                  <!-- <tr><td></td><td></td><td></td><td>Grand Total</td><td><input type="text" id="gt"></td><td></td></tr>
                  <tr><td></td><td></td><td></td><td>Down Payment</td><td><input type="text" id="dp" onchange="hitbal(this.value)"></td><td></td></tr>
                  <tr><td></td><td></td><td></td><td>Outstanding Balance</td><td><input type="text" id="bal"></td><td></td></tr> -->
                  <tr><td></td><td></td><td></td>
                    <?php
                    $user1=$_SESSION["username"];

                    $sqlku111 = "SELECT * FROM login where email='$user1'";
                    $queryku111 = mysqli_query($conn, $sqlku111);
                     while($amku111 = mysqli_fetch_array($queryku111)){

                       $statusnama=$amku111['username'];

                     }?>
                    <td>

                      <?php if ($status=="CLOSED")
                      { ?>
                        <b>Status</b> :
                        <select readonly disabled id="status" name="status"><option><?php echo $status; ?></option><option>OPEN</option><option>CLOSED</option></select>

                        <?php
                      }else if (($status=="OPEN") && ($statusnama<>"salesptalow")) {
                        ?>
                        <b>Status</b> :
                    
<?php } ?>
</td><td colspan="2">
                    <button type="submit" name="daftar" id="sbmt" value="daftar" class="btn  btn-info">Submit</button>
                    <button type="submit" name="daftar1" id="apprvl" value="daftar1" class="btn  btn-info">Approval Discount</button>

                  </td>
                    <!-- <?php
                    if ($status=="OPEN")
                    {?>

                      <button type="submit" name="daftar1" value="daftar1" class="btn  btn-info">Approval Discount</button></a>

                    <?php } else { ?>

                    <button type="submit" name="daftar" value="daftar" class="btn  btn-info">Submit</button></a>

                  <?php } ?> -->
                  <script>
                  function hitungt(str)
                  {
                    a=parseInt(document.getElementById("sub").value);
                    b=parseInt(str);
                    c=a+b;
                    document.getElementById('gt').value=c;
                  }
                  function hitbal(str1)
                  {
                    a1=parseInt(document.getElementById("gt").value);
                    b1=parseInt(str1);
                    c1=a1-b1;
                    document.getElementById('bal').value=c1;
                  }


                  </script>
                  </td><td></td></tr>
              </form>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      include('../blank_footer.php')
      ?>
    </div>





        <!--  END CONTENT AREA  -->
        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="<?php echo $admin_url; ?>/demo5/assets/js/custom.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
        $(function () {
        $('#tgl').datetimepicker({
            minDate:new Date()
        });
       });
        });


          let idx = <?=$i?>;
          let role = '<?=$role?>';
          let status = '<?=$status?>';

          $('.anjay').on('keyup',function(){
              var id = this.id;
              let harga1 = $('#'+id).val();
              let hargal = $('#hargal').val();
              $('label[id$='+id+']').html(formatRupiah(harga1,'Rp.'));
              if( parseInt(harga1) < parseInt(hargal)){
                document.getElementById('sbmt').disabled = true;
                document.getElementById('apprvl').style.display = "block";
              }else if(parseInt(harga1) >= parseInt(hargal) || status == "CLOSED"){
                document.getElementById('sbmt').disabled = false;
                document.getElementById('apprvl').style.display = "none";
              }
          });

          for(var i = 0; i< idx; i++){
            let harga1 = $('#hargan'+i).val();
            let harga2 = $('#hargan1'+i).val();
            let harga3 = $('#hargan2'+i).val();
            let harga4 = $('#hargan3'+i).val();
            $('label[id$=hargan'+i+']').html(formatRupiah(harga1,'Rp.'));
            $('label[id$=hargan1'+i+']').html(formatRupiah(harga2,'Rp.'));
            $('label[id$=hargan2'+i+']').html(formatRupiah(harga3,'Rp.'));
            $('label[id$=hargan3'+i+']').html(formatRupiah(harga4,'Rp.'));
          }

          $('.anjay').on('keyup',function(){
              var id = this.id;
              let harga1 = $('#'+id).val();
              let hargal = $('#hargal').val();
              $('label[id$='+id+']').html(formatRupiah(harga1,'Rp.'));
              if( parseInt(harga1) < parseInt(hargal)){
                document.getElementById('sbmt').disabled = true;
                document.getElementById('apprvl').style.display = "block";
              }else if(parseInt(harga1) >= parseInt(hargal) || status == "CLOSED"){
                document.getElementById('sbmt').disabled = false;
                document.getElementById('apprvl').style.display = "none";
              }
            
          });
          function sbmtChck(){
              let harga1 = $('.anjay').val();  
              document.getElementById('hargaTarget'+i).html = formatRupiah(harga1,'Rp. ');
              let hargal = $('#hargal').val(); 
              if( parseInt(harga1) < parseInt(hargal)){
                document.getElementById('sbmt').disabled = true;
                document.getElementById('apprvl').style.display = "block";
              }else if(parseInt(harga1) >= parseInt(hargal) || status == "CLOSED"){
                document.getElementById('sbmt').disabled = false;
                document.getElementById('apprvl').style.display = "none";
              }
         }
          
          function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
          sbmtChck();
        </script>
    </div>
</body>
</html>

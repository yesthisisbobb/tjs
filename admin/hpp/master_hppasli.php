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
<?php
  function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}
?>
<?php
  include("../../header.php");
?>
<!DOCTYPE html>
<head>
  <script language=javascript>
var objekxhr, objekxhr1;
function ambildata(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhs.php?q="+str,true);
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

document.getElementById("pg").value = objekxhr.responseText;


}
function ambildata1(str)
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhs1.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan1;
}
function tampilkan1()
{
document.getElementById("csvc").value = (objekxhr.responseText/document.getElementById("svc").value)*100;
}

function ambilagent(str)
{
buatxhr();
a=document.getElementById("pg").value;
b=document.getElementById("coo").value;
c=document.getElementById("bp").value;

objekxhr.open("GET", "TampilMhsagent.php?q="+a+"&s="+b+"&r="+c,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanagent;
}
function tampilkanagent()
{
document.getElementById("agent").value = objekxhr.responseText;
}

function ambiltax()
{
buatxhr();
a=document.getElementById("pg").value;
b=document.getElementById("coo").value;
c=document.getElementById("bp").value;

objekxhr.open("GET", "TampilMhstax.php?q="+a+"&s="+b+"&r="+c,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkantax;
}
function tampilkantax()
{
document.getElementById("tax").value = objekxhr.responseText;
}

function ambilemkl()
{
buatxhr();
a=document.getElementById("isku").value;
b=document.getElementById("ct").value;
c=document.getElementById("coo").value;
d=document.getElementById("tujuan").value;


objekxhr.open("GET", "TampilMhsemkl.php?q="+a+"&s="+b+"&r="+c+"&t="+d,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanemkl;
}
function tampilkanemkl()
{
document.getElementById("emkl1").value = objekxhr.responseText;
}


function hitungfcost()
{
buatxhr();
a=document.getElementById("coo").value;
b=document.getElementById("ct").value;
c=document.getElementById("shiptype").value;
d=document.getElementById("tujuan").value;

objekxhr.open("GET", "TampilMhsfcost.php?q="+a+"&s="+b+"&r="+c+"&t="+d,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanfcost;
}
function tampilkanfcost()
{
document.getElementById("fee1").value = objekxhr.responseText;
}

function ambilcoo()
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhs11.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan11;
}
function tampilkan11()
{
document.getElementById("coo").value =  objekxhr.responseText;
}

function ambilp(str1)
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsp.php?q="+a+"&s="+str1,true);
objekxhr.send(null);
objekxhr.onreadystatechange=function(){
if(str1=="1")
{
document.getElementById("p").value =  objekxhr.responseText;
}
else if(str1=="2") {
  document.getElementById("l").value =  objekxhr.responseText;

}
else if(str1=="3") {
  document.getElementById("pcsctn").value =  objekxhr.responseText;

}
else if(str1=="4") {
  document.getElementById("stokcont").value =  objekxhr.responseText;

}
else if(str1=="5") {
  document.getElementById("ct").value =  objekxhr.responseText;

}
else if(str1=="6") {
  document.getElementById("teb1").value =  objekxhr.responseText;

}
else if(str1=="7") {
  document.getElementById("kg").value =  objekxhr.responseText;

}
}
}


function ambildatabp()
{

buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsbp.php?q="+a,true);
objekxhr.send(null);

objekxhr.onreadystatechange=tampilkanbp;
}
function tampilkanbp()
{
document.getElementById("bp").value = objekxhr.responseText;
}
function ambildatabprate()
{

buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsbprate.php?q="+a,true);
objekxhr.send(null);

objekxhr.onreadystatechange=tampilkanbprate;
}
function tampilkanbprate()
{
document.getElementById("bprate").value = objekxhr.responseText;
}




function ambildatabu()
{

buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsbu.php?q="+a,true);
objekxhr.send(null);

objekxhr.onreadystatechange=tampilkanbu;
}
function tampilkanbu()
{
document.getElementById("bu").value = objekxhr.responseText;
}

function ambildatasu()
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhssu.php?q="+a,true);
objekxhr.send(null);

objekxhr.onreadystatechange=tampilkansu;
}
function tampilkansu()
{
document.getElementById("su").value = objekxhr.responseText;
}

function ambildatakon()
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhskon.php?q="+a,true);
objekxhr.send(null);

objekxhr.onreadystatechange=tampilkankon;
}
function tampilkankon()
{
document.getElementById("kon").value = objekxhr.responseText;
}



function ambildatasqm()
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhssqm.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkansqm;
}
function tampilkansqm()
{
document.getElementById("sqmctn").value = objekxhr.responseText;
}

function ambilsc()
{
buatxhr();
a="smb";
objekxhr.open("GET", "TampilMhssc.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkansc;
}
function tampilkansc()
{
document.getElementById("sc").value = (objekxhr.responseText/100)*document.getElementById("cogs").value;
}

function ambiltc()
{
buatxhr();
a="smb";
objekxhr.open("GET", "TampilMhstc.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkantc;
}
function tampilkantc()
{
document.getElementById("tc").value = (objekxhr.responseText/100)*document.getElementById("cogs").value;
}

function ambilmc()
{
buatxhr();
a="smb";
objekxhr.open("GET", "TampilMhsmc.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanmc;
}
function tampilkanmc()
{
document.getElementById("mc").value = (document.getElementById("pl").value*(objekxhr.responseText/100))*0.5;
}

function ambilbunga1()
{
buatxhr();
a="smb";
objekxhr.open("GET", "Tampilbunga.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanbunga1;
}
function tampilkanbunga1()
{
document.getElementById("bunga1").value = (objekxhr.responseText/100)*document.getElementById("cogs").value;
}

function ambilnp()
{
buatxhr();
a="smb";
objekxhr.open("GET", "Tampilnp.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkannp;
}
function tampilkannp()
{
document.getElementById("np").value = (objekxhr.responseText/100)*document.getElementById("cogs").value;
}


function ambildp()
{
buatxhr();
a="smb";
objekxhr.open("GET", "Tampildp.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkandp;
}
function tampilkandp()
{
b=parseInt(document.getElementById("pl").value);

document.getElementById("dp").value = b-(objekxhr.responseText/100*b);

}

function ambilallow()
{
buatxhr();
a="smb";
objekxhr.open("GET", "Tampilallow.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanallow;
}
function tampilkanallow()
{
document.getElementById("allow").value = (objekxhr.responseText/100)*document.getElementById("cogs").value;
}



function ambilscom()
{
buatxhr();
a="smb";
objekxhr.open("GET", "Tampilscom.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanscom;
}
function tampilkanscom()
{
document.getElementById("scom").value = (objekxhr.responseText/100)*document.getElementById("cogs").value;
}

function ambilfcost1()
{
buatxhr();
a="smb";
objekxhr.open("GET", "Tampilfcost.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanfcost1;
}
function tampilkanfcost1()
{
document.getElementById("fcost1").value = (objekxhr.responseText/100)*document.getElementById("cogs").value;
}



function ambildata2(str)
{
buatxhr();
a=document.getElementById("pg").value;
objekxhr.open("GET", "TampilMhs2.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan2;
}
function tampilkan2()
{
document.getElementById("hscode").value = objekxhr.responseText
}
function ambildata3(str)
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhs3.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan3;
}
function tampilkan3()
{
document.getElementById("kgctn").value = objekxhr.responseText;
}

function ambilbm()
{
buatxhr();
a=document.getElementById("hscode").value;
objekxhr.open("GET", "TampilMhspph.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanbm;
}
function tampilkanbm()
{
document.getElementById("bm").value = objekxhr.responseText/100*(document.getElementById("pp").value)*(document.getElementById("rate").value);
}

function ambilppn()
{
buatxhr();
a=document.getElementById("hscode").value;
objekxhr.open("GET", "TampilMhsppn.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanppn;
}
function tampilkanppn()
{
document.getElementById("ppn").value = (objekxhr.responseText/100)*(parseInt((document.getElementById("pp").value)*(document.getElementById("rate").value))+parseInt(document.getElementById("bm").value));
}

function ambilpph1()
{
buatxhr();
a=document.getElementById("hscode").value;
objekxhr.open("GET", "TampilMhspph1.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanpph1;
}
function tampilkanpph1()
{
document.getElementById("pph").value = (objekxhr.responseText/100)*(parseInt((document.getElementById("pp").value)*(document.getElementById("rate").value))+parseInt(document.getElementById("bm").value));
}


function ambildata4(str)
{
buatxhr();
a=document.getElementById("pg").value;
objekxhr.open("GET", "TampilMhs4.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan4;
}
function tampilkan4()
{
document.getElementById("cont_type").value = objekxhr.responseText;
}
function ambildata5(str)
{
buatxhr();
a=document.getElementById("cont_type").value;
objekxhr.open("GET", "TampilMhs5.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan5;
}
function tampilkan5()
{
document.getElementById("stc").value = objekxhr.responseText;
}
function ambildata6(str)
{
buatxhr();
a=document.getElementById("cont_type").value;
objekxhr.open("GET", "TampilMhs6.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkan6;
}
function tampilkan6()
{
document.getElementById("svc").value = objekxhr.responseText;
}
function ambildatarate(str)
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsrate.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanrate;
}
function tampilkanrate()
{
document.getElementById("rate").value = objekxhr.responseText;
}
function ambilemklrate(str)
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsemklrate.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanemklrate;
}
function tampilkanemklrate()
{
document.getElementById("emklrate").value = objekxhr.responseText;
}

function ambildatarate1()
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsrate1.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanrate1;
}
function tampilkanrate1()
{
document.getElementById("rateemkl").value = objekxhr.responseText;
}
function ambildatarate2()
{
buatxhr();
a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsrate2.php?q="+a,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanrate2;
}
function tampilkanrate2()
{
document.getElementById("lscostdoc").value = objekxhr.responseText;
}
function ambilfreight(str)
{
buatxhr();
// a=document.getElementById("tjsitemcode").value;
objekxhr.open("GET", "TampilMhsfr.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanfr;
}
function tampilkanfr()
{
document.getElementById("fcost").value = objekxhr.responseText*document.getElementById("rateemkl").value/document.getElementById("stc").value*document.getElementById("kgctn").value/document.getElementById("sqmctn").value;
}
</script>
</head>
<body>

<!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
      <div class="material-loader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
        <div class="message">Loading...</div>
      </div>
    </div>
    <!-- end #page-loader -->
    <!-- begin #page-container -->
<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">
<?php
  include("../../top-menu.php");
?>
<?php
  include("../../sidenav-menu.php");
?>
      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item active">Master COGS </li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master COGS <a href="master_hpp.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>

        <table id="data-table-buttons" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->

              <th class="text-nowrap">TJS Item Code </th>

                <!-- <th class="text-nowrap">Product Group</th> -->


              <?php if($pengguna["role"]=="km")
              {
              ?>

              <th class="text-nowrap">Buy Price(Rp)</th>
                <th class="text-nowrap">COGS(km)</th>
                <th class="text-nowrap">COGS(p)</th>
                <th class="text-nowrap">COGS(smb)</th>


              <?php } else if($pengguna["role"]="perwira") {
                ?>
                <th class="text-nowrap">COGS(p)</th>
                <th class="text-nowrap">Bottom Price</th>
                <th class="text-nowrap">Discount Price</th>
                <th class="text-nowrap">Price List</th>

              <?php } ?>
                <th class="text-nowrap">Status</th>
              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
              $sql = "SELECT * FROM master_hpp ORDER BY no";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">

              <?php if($pengguna["role"]=="km")
              {
              ?>
              <td><?=$amku["tjsitemcode"];?></td>



              <td><?=rupiah($amku["buyprice"]);?></td>
              <td><?=rupiah($amku["cogsku"]);?></td>
              <td><?=rupiah($amku["cogskupta"]);?></td>
              <td><?=rupiah($amku["cogskusmb"]);?></td>

            <?php } else if($pengguna["role"]="perwira") {
                ?>
<td><?=$amku["tjsitemcode"];?></td>
<td><?=$amku["pg"];?></td>
<td><?=$amku["cogsp"];?></td>
<td><?=$amku["bp"];?></td>
<td><?=$amku["dp"];?></td>
<td><?=$amku["pl"];?></td>

<?php } ?>
              <td><?=$amku["status"];?></td>

              <td class="with-btn" nowrap="">

                <a href="master_stok.php?aksi=view&no=<?php echo $amku["no"]; ?>" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-stok.php?aksi=update&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-stok.php?aksi=active&no=<?php echo $amku["no"]; ?>" class="btn btn-success btn btn-sm" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-stok.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-trash"></i></a>

                  </td>
           <?php } ?>
            </tr>
          </tbody>
        </table>

      <!-- end page-header -->

      <div id="add_show">
          <div class="row">
            <div class="col-lg-12">
              <!-- begin panel -->


  <form class="form-horizontal" method="post" action="proses-hpp.php">
                              <?php
                              $aksi=$_GET['aksi'];
                              if ($aksi=="view")
                              {
                                $nomerku=$_GET['no'];
                                $sql = "SELECT * FROM master_stok where no='$nomerku'";
                                     $query = mysqli_query($conn, $sql);
                                     while($amku = mysqli_fetch_array($query)){
                                       $kodetipe=$amku['kodetipe'];
                                       $kodep=$amku['kodeperusahaan'];
                                       $kodem=$amku['kodemerk'];
                                       $kodes=$amku['kodesup'];
                                       $kodediv=$amku['kodedivisi'];
                                       $kelasku=$amku['kelas'];
                                       $kelasku=$amku['kelas'];
                                       $panjangku=$amku['panjang'];
                                       $lebarku=$amku['lebar'];
                                       $tebalku=$amku['tebal'];
                                       $pcsctnku=$amku['pcsctn'];
                                       $sqmctnku=$amku['sqmctn'];
                                       $kgctnku=$amku['kgctn'];
                                       $volctnku=$amku['volctn'];
                                        $nom=$amku['no'];

                                       $sql = "SELECT * FROM master_tipe where kode='$kodetipe'";
                                            $query = mysqli_query($conn, $sql);
                                            while($amku = mysqli_fetch_array($query)){
                                              $namatipe=$amku["nama"];
                                            }
                                            $sql = "SELECT * FROM master_perusahaan where kode='$kodep'";
                                                 $query = mysqli_query($conn, $sql);
                                                 while($amku = mysqli_fetch_array($query)){
                                                   $kodeperusahaan=$amku["kode"];
                                                   $namaperusahaan=$amku["nm_perusahaan"];
                                                 }
                                             $sql = "SELECT * FROM master_merk where kode='$kodem'";
                                                      $query = mysqli_query($conn, $sql);
                                                      while($amku = mysqli_fetch_array($query)){
                                                        $kodemerk=$amku["kode"];
                                                        $namamerk=$amku["nama"];
                                                      }

                                                $sql = "SELECT * FROM master_supplier where kode='$kodes'";
                                                               $query = mysqli_query($conn, $sql);
                                                               while($amku = mysqli_fetch_array($query)){
                                                                 $kodesup=$amku["kode"];
                                                                 $namasup=$amku["nama"];
                                                                 $negarasup=$amku["negara"];
                                                               }
                                                               $sql = "SELECT * FROM master_divisi where kode='$kodediv'";
                                                                              $query = mysqli_query($conn, $sql);
                                                                              while($amku = mysqli_fetch_array($query)){
                                                                                $kodedivisi=$amku["kode"];
                                                                                $namadivisi=$amku["nama"];

                                                                              }

                                       $namap=$amku['nama'];
                                       $shading=$amku['shading'];
                                       $faces=$amku['faces'];
                                       $color=$amku['color'];
                                      $surface=$amku['surface'];
                                      $pattern=$amku['pattern'];
                                      $status=$amku['status'];

                                     }
                                ?>

                                  <!-- end panel-heading -->
                                  <!-- begin panel-body -->
                                  <div class="panel-body panel-form">
                                    <div class="container">
                                      <div class="form-group">
                                        <!-- <label class="col-sm-10 control-label">No.</label> -->
                                        <div class="col-sm-2">
                                          <input type="hidden" class="form-control" id="nom" value="<?php echo $nom; ?>" name="nom">

                                       </div>
                                       <div>
                                         <BR>
                                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                                             <li class="nav-item">
                                               <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                             </li>

                                             <li class="nav-item">
                                               <a class="nav-link" id="att-tab" data-toggle="tab" href="#att" role="tab" aria-controls="att" aria-selected="false">Dimension</a>
                                             </li>
                                             <li class="nav-item">
                                               <a class="nav-link" id="att1-tab" data-toggle="tab" href="#att1" role="tab" aria-controls="att1" aria-selected="false">Attribute</a>
                                             </li>
                                             <li class="nav-item">
                                               <a class="nav-link" id="att2-tab" data-toggle="tab" href="#att2" role="tab" aria-controls="att2" aria-selected="false">Addition Attribute</a>
                                             </li>


                                           </ul>
                                         <div class="tab-content" id="myTabContent">
                                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                             <div class="form-group">
                                                 <label class="col-sm-8 control-label">Product Type</label>
                                                 <div class="col-sm-6">
                                                   <select name="kodetipe" id="kodetipe" class="form-control">
                                                     <option value=<?php echo $kodetipe; ?>><?php echo $namatipe; ?></option>
                                                   <?php
                                                     $sql = "SELECT * FROM master_tipe";
                                                          $query = mysqli_query($conn, $sql);
                                                          while($amku = mysqli_fetch_array($query)){
                                                         echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                                       }
                                                     ?>
                                                   </select>

                                               </div>
                                               </div>

                                               <div class="form-group">
                                                 <label class="col-sm-8 control-label">Company Name</label>
                                                 <div class="col-sm-6">
                                                   <select name="kodeperusahaan" id="kodeperusahaan" class="form-control">
                                                     <option value=<?php echo $kodeperusahaan; ?>><?php echo $kodeperusahaan."-".$namaperusahaan; ?></option>
                                                   <?php
                                                     $sql = "SELECT * FROM master_perusahaan";
                                                          $query = mysqli_query($conn, $sql);
                                                          while($amku = mysqli_fetch_array($query)){
                                                         echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nm_perusahaan']."</option>";
                                                       }
                                                     ?>
                                                   </select>

                                               </div>
                                                 </div>

                                                 <div class="form-group">
                                                   <label class="col-sm-8 control-label">Brand Name</label>
                                                   <div class="col-sm-6">
                                                     <select name="kodemerk" id="kodemerk" class="form-control">
                                                        <option value=<?php echo $kodemerk; ?>><?php echo $kodemerk."-".$namamerk; ?></option>
                                                     <?php
                                                       $sql = "SELECT * FROM master_merk";
                                                            $query = mysqli_query($conn, $sql);
                                                            while($amku = mysqli_fetch_array($query)){
                                                           echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."</option>";
                                                         }
                                                       ?>
                                                     </select>

                                                 </div>
                                                   </div>
                                                   <div class="form-group">
                                                     <label class="col-sm-8 control-label">Supplier Name(Code, Name, Country Code)</label>
                                                     <div class="col-sm-6">
                                                       <select name="kodesup" id="kodesup" class="form-control" onchange="ambildata(this.value)">
                                                           <option value=<?php echo $kodesup; ?>><?php echo $kodesup."-".$namasup."-".$negarasup; ?></option>
                                                       <?php
                                                         $sql = "SELECT * FROM master_supplier";
                                                              $query = mysqli_query($conn, $sql);
                                                              while($amku = mysqli_fetch_array($query)){
                                                                $negarasup1=$amku['negara'];
                                                             echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."-".$amku['negara']."</option>";
                                                           }
                                                         ?>
                                                       </select>
                                                     </div>

                                                     <input type="hidden" name="kotak" id="kotak" value="<?php echo $negarasup1;?>">
                                                   </div>
                                                   <div class="form-group">
                                                     <label class="col-sm-8 control-label">Business Division</label>
                                                     <div class="col-sm-6">
                                                       <select name="kodedivisi" id="kodedivisi" class="form-control">
                                                           <option value=<?php echo $kodedivisi; ?>><?php echo $kodedivisi."-".$namadivisi; ?></option>
                                                       <?php
                                                         $sql = "SELECT * FROM master_divisi";
                                                              $query = mysqli_query($conn, $sql);
                                                              while($amku = mysqli_fetch_array($query)){
                                                             echo "<option value=".$amku['kode'].">".$amku['kode']."-".$amku['nama']."</option>";
                                                           }
                                                         ?>
                                                       </select>

                                                   </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="col-sm-10 control-label">Material Class</label>
                                                         <div class="col-sm-2">
                                                           <select class="form-control" id="kelas" name="kelas">
                                                             <option><?php echo $kelasku; ?></option>
                                                             <option>High</option>
                                                             <option>Low</option>
                                                         </select>
                                                       </div>
                                                     </div>

                                                     <div class="form-group">
                                                         <label class="control-label col-sm-4">TJS Code</label>
                                                         <div class="col-sm-6">
                                                         <input type="text" class="form-control" id="kode_stok" name="kode_stok"> <br>
                                                           <button type="button" id="tom" class="btn" onclick="getkode()">Generate</button>
                                                       </div>
                                                       <script>
                                                       function getkode()
                                                       {

                                                           document.getElementById("kode_stok").value=
                                                           document.getElementById("kodeperusahaan").value+document.getElementById("kodemerk").value+
                                                           document.getElementById("kotak").value+document.getElementById("kodesup").value+document.getElementById("kodetipe").value;

                                                         }

                                                         </script>
                                                     </div>
                                               </div>
                                                 <div class="tab-pane fade" id="att" role="tabpanel" aria-labelledby="att-tab">
                                                   <div class="form-group">
                                                       <label class="col-sm-4 control-label">Length</label>
                                                       <div class="col-sm-2">
                                                       <input type="text" class="form-control" id="panjang" name="panjang" value="<?php echo $panjangku;?>">
                                                     </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="col-sm-4 control-label">Width</label>
                                                         <div class="col-sm-2">
                                                         <input type="text" class="form-control" id="lebar" name="lebar" value="<?php echo $lebarku;?>">
                                                       </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="col-sm-4 control-label">Thickness</label>
                                                           <div class="col-sm-2">
                                                           <input type="text" class="form-control" id="tebal" name="tebal" value="<?php echo $tebalku;?>">
                                                         </div>
                                                         </div>


                                              </div>
                                              <div class="tab-pane fade" id="att2" role="tabpanel" aria-labelledby="att2-tab">
                                                <?php
                                                $nomerkuaja=$_GET["no"];
                                                  $sql = "SELECT * FROM master_tipe where id='$nomerkuaja'";
                                                       $query = mysqli_query($conn, $sql);
                                                       while($amku = mysqli_fetch_array($query)){
                                                         $id=$amku['id'];
                                                         $kodeg=$amku['kodegrup'];
                                                         $shade=$amku['shading'];
                                                         $faces=$amku['faces'];
                                                         $surface=$amku['surface'];



                                                    }
                                                  ?>
                                                  <div class="form-group">
                                                      <label class="col-sm-6 control-label">Group Code</label>
                                                      <div class="col-sm-4">
                                                      <input type="text" class="form-control" readonly id="kodegrup" name="kodegrup" value="<?php echo $kodeg; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-6 control-label">Shading</label>
                                                        <div class="col-sm-2">
                                                        <input type="text" class="form-control" readonly id="shading" name="shading" value="<?php echo $shade; ?>">
                                                      </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="col-sm-6 control-label">Faces</label>
                                                          <div class="col-sm-2">
                                                          <input type="text" class="form-control" readonly id="faces" name="faces" value="<?php echo $faces; ?>">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-6 control-label">Surface</label>
                                                            <div class="col-sm-4">
                                                            <input type="text" class="form-control" readonly id="surface" name="surface" value="<?php echo $surface; ?>">
                                                          </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="col-sm-6 control-label">Color</label>
                                                              <div class="col-sm-3">
                                                              <input type="text" class="form-control" readonly id="color" name="color" value="<?php echo $color; ?>">
                                                            </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-6 control-label">Pattern</label>
                                                                <div class="col-sm-3">
                                                                <input type="text" class="form-control" readonly id="pola" name="pola" value="<?php echo $pattern; ?>">
                                                              </div>
                                                              </div>


                                              </div>




                                           <div class="tab-pane fade" id="att1" role="tabpanel" aria-labelledby="att1-tab">

                                                   <div class="form-group">
                                                       <label class="col-sm-4 control-label">PCS/CTN</label>
                                                       <div class="col-sm-2">
                                                       <input type="text" class="form-control" id="pcsctn" name="pcsctn" value="<?php echo $pcsctnku; ?>">
                                                     </div>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="col-sm-4 control-label">SQM/CTN</label>
                                                         <div class="col-sm-2">
                                                         <input type="text" class="form-control" id="sqmctn" name="sqmctn" value="<?php echo $sqmctnku; ?>">
                                                       </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="col-sm-4 control-label">KG/CTN</label>
                                                           <div class="col-sm-2">
                                                           <input type="text" class="form-control" id="kgctn" name="kgctn" value="<?php echo $kgctnku; ?>">
                                                         </div>
                                                         </div>
                                                       <div class="form-group">
                                                           <label class="col-sm-4 control-label">VOL/CTN</label>
                                                           <div class="col-sm-2">
                                                           <input type="text" class="form-control" id="volctn" name="volctn" onfocus="hitung()"  value="<?php echo $volctnku; ?>">
                                                         </div>
                                                         </div>
                                                         <script>
                                                         function hitung()
                                                         {

                                                             document.getElementById("volctn").value=document.getElementById("panjang").value/100*document.getElementById("lebar").value/100*
                                                             document.getElementById("tebal").value/1000*document.getElementById("pcsctn").value;
                                                           }

                                                           </script>
                                      <div class="form-group">
                                          <label class="col-sm-10 control-label">Status</label>
                                          <div class="col-sm-2">
                                            <select class="form-control" id="status" name="status">
                                              <option>Active</option>
                                              <option>InActive</option>
                                          </select>
                                        </div>
                                        <br>
                                        <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                                        </div>
                                     </div>


                                         </div>



                              <?php } else { ?>
                                <!-- 1. BOOTSTRAP v4.0.0         CSS !-->
                                <BR>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                  </li>





                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                          <!-- asset/plugins/bootsrap combo box class  -->
                                          <select name="tjsitemcode" id="tjsitemcode" class="form-control" onchange="ambildata(this.value)">
                                            <option>--Select TJS Code--</option>
                                          <?php
                                            $sql = "SELECT * FROM master_stok";
                                                 $query = mysqli_query($conn, $sql);
                                                 while($amku = mysqli_fetch_array($query)){
                                                echo "<option>".$amku['kode_stok']."</option>";
                                              }
                                            ?>
                                          </select>
                                          <!-- asset/plugins/bootsrap combo box js -->
                                          <!-- <script type="text/javascript">
                                            $(document).ready(function(){
                                              $('.combobox').combobox();
                                            });
                                          </script> -->

                                      </div>
                                      </div>



                                          <div class="col-sm-2.5">
                                            <div class="form-group">
                                          <input type="text" class="form-control" id="pg" name="pg" placeholder="Group Name" onfocus="ambilcoo()">
                                        </div>
                                        </div>
                                        <div class="col-sm-2.75">
                                          <div class="form-group">
                                        <input readonly type="text" class="form-control" id="coo" name="coo" onfocus="ambilp(1)">
                                        <span><font color="Red">*Origin Country</font></span>
                                      </div>
                                      </div>
                                      <div class="col-sm-1">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="p" name="p" onfocus="ambilp(2)">
                                      <span><font color="Red">*Length(cm)</font></span>
                                    </div>
                                    </div>
                                    <div class="col-sm-1">
                                      <div class="form-group">
                                    <input readonly type="text" class="form-control" id="l" name="l" onfocus="ambilp(3)">
                                    <span><font color="Red">*Width(cm)</font></span>
                                  </div>
                                </div>
                                <div class="col-sm-1">
                                  <div class="form-group">
                                <input readonly type="text" class="form-control" id="pcsctn" name="pcsctn"  onfocus="ambilp(4)">
                                <span><font color="Red">*pcs/cnt</font></span>
                              </div>
                              </div>
                                <div class="col-sm-1">
                                  <div class="form-group">
                                <input readonly type="text" class="form-control" id="teb1" name="teb1"  onfocus="ambilp(6)">
                                <span><font color="Red">*Thickness(mm)</font></span>
                              </div>
                              </div>


                                      </div>
                                        <!-- <script>
                                        function coba()
                                        {
                                         document.getElementById("hscode").value="bisa";
                                       }
                                        </script> -->

                                        <div class="row">

                                          <div class="col-sm-2">
                                            <div class="form-group">
                                          <input readonly type="text" class="form-control" id="stokcont" name="stokcont" onfocus="ambilp(5)">
                                          <span><font color="Red">*Min Total(Dos)/Cont</font></span>
                                        </div>
                                        </div>
                                        <div class="col-sm-2">
                                          <div class="form-group">
                                        <input readonly type="text" class="form-control" id="ct" name="ct">
                                        <span><font color="Red">*Container Type</font></span>
                                      </div>
                                      </div>
                                            <div class="col-sm-2">
                                              <div class="form-group">
                                              <select name="buying_cur"  class="form-control">
                                                <option>--Unit Currency--</option>
                                              <?php
                                                $sql = "SELECT * FROM master_cur";
                                                     $query = mysqli_query($conn, $sql);
                                                     while($amku = mysqli_fetch_array($query)){
                                                    echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                                  }
                                                ?>
                                              </select>
                                              <span><font color="Red">*Unit Currency</font></span>
                                          </div>
                                          </div>



                                              <div class="col-sm-2">
                                                <div class="form-group">
                                              <input type="text" class="form-control" id="pp" name="pp">
                                              <span><font color="Red">*Price Profile Customs</font></span>
                                            </div>
                                            </div>


                                                <div class="col-sm-2">
                                                  <div class="form-group">
                                                <input readonly type="text" class="form-control" id="bp" name="bp" onfocus="ambildatabp()">
                                                <span><font color="Red">*Product Price</font></span>
                                              </div>
                                              </div>
                                              <div class="col-sm-1">
                                                <div class="form-group">
                                              <input  type="text" class="form-control" id="bu" name="bu" onfocus="ambildatabu()" >
                                              <span><font color="Red">Buying unit area</font></span>
                                            </div>
                                            </div>
                                            <div class="col-sm-1">
                                              <div class="form-group">
                                            <input type="text"  class="form-control" id="su" name="su" onfocus="ambildatasu()">
                                            <span><font color="Red">Selling Unit area</font></span>
                                          </div>

                                          </div>

                                            </div>
                                            <div class="row">
                                              <div class="col-sm-2">
                                                <div class="form-group">
                                              <input type="text"  class="form-control" id="kon" name="kon" onfocus="ambildatakon()">
                                              <span><font color="Red">*Buying Price Conversion to Sell Unit</font></span>
                                            </div>

                                            </div>
                                            <div class="col-sm-2">
                                              <div class="form-group">
                                            <input type="text" readonly class="form-control" id="bprate" name="bprate" onfocus="ambildatabprate()">
                                            <span><font color="Red">*Buying Price Exchange Rate</font></span>
                                          </div>

                                          </div>
                                          <div class="col-sm-2">
                                            <div class="form-group">
                                          <input type="text" readonly class="form-control" id="buyprice" name="buyprice" onfocus="hitungbuyprice()"  STYLE="background-color: yellow;">
                                          <span><font color="blue">*Local Price in IDR</font></span>
                                        </div>

                                        </div>
                                          <script>
                                          function hitungbuyprice()
                                          {
                                          a=document.getElementById("bprate").value;
                                          b=document.getElementById("kon").value;
                                          c=document.getElementById("bp").value;
                                          d=a*b*c;
                                          document.getElementById("buyprice").value=d;

                                          }
                                          </script>

                                        <div class="col-sm-2">
                                          <div class="form-group">
                                        <input type="text" readonly class="form-control" id="suc" name="suc" onfocus="hitungstok()" >
                                        <span><font color="Red">*Total SQM Load/Cont</font></span>
                                      </div>

                                      </div>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input type="text" class="form-control" id="agent" name="agent" onfocus="ambilagent()" value="0">
                                      <span><font color="Red">*Agent Fee in USD per Container</font></span>
                                    </div>

                                    </div>
                                    <div class="col-sm-2">
                                      <div class="form-group">
                                    <input type="text" readonly class="form-control" id="agentbu" name="agentbu" onfocus="hitungagentbu()" >
                                    <span><font color="Red">*Agent Fee In USD per SQM</font></span>
                                  </div>

                                  </div>
                                        </div>
                                        <script>
                                        function hitungstok()
                                        {
                                        c=(document.getElementById("p").value)/100;
                                        d=(document.getElementById("l").value)/100;
                                        f=document.getElementById("pcsctn").value;
                                        g=document.getElementById("stokcont").value;

                                        e=c*d*f*g;
                                        document.getElementById("suc").value=e;
                                        }
                                        function hitungagentbu()
                                        {
                                        j=document.getElementById("agent").value;
                                        k=document.getElementById("suc").value;
                                        l=j/k;
                                        n = l.toFixed(3);
                                        document.getElementById("agentbu").value=n;
                                        }
                                        </script>

                                        <div class="row">

                                          <!-- <div class="col-sm-2">
                                            <div class="form-group">
                                          <input readonly type="text" class="form-control" id="tax" name="tax" onfocus="ambiltax()" placeholder="%Agent Cost Tax">
                                          <span><font color="Red">*Agent Tax</font></span>
                                        </div>
                                        </div> -->
                                        <div class="col-sm-4">
                                          <div class="form-group">
                                        <input readonly type="text" class="form-control" id="fee" name="fee" onfocus="hitungfee()" STYLE="background-color: yellow;">
                                        <span><font color="blue">*Agent Fee in IDR</font></span>
                                      </div>
                                      </div>

                                        <div class="col-sm-2">
                                          <div class="form-group">
                                        <select name="tujuan" id="tujuan" class="form-control">
                                          <option>--Destination Port--</option>
                                        <?php
                                          $sql = "SELECT * FROM master_port";
                                               $query = mysqli_query($conn, $sql);
                                               while($amku = mysqli_fetch_array($query)){
                                              echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                            }
                                          ?>
                                        </select>
                                        <span><font color="Red">*Destination Port</font></span>
                                      </div>
                                    </div>
                                    <div class="col-sm-2">
                                      <select class="form-control" id="shiptype" name="shiptype">
                                        <option>--Ship Type--</option>
                                        <option>FOB</option>
                                        <option>EXWORK</option>
                                    </select>
                                    <span><font color="Red">*Ship Type</font></span>
                                  </div>
                                    <div class="col-sm-2">
                                      <div class="form-group">
                                    <input readonly type="text" class="form-control" id="fee1" name="fee1" onfocus="hitungfcost()">
                                    <span><font color="red">*Freight Cost per Container in USD</font></span>
                                  </div>
                                  </div>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                  <input readonly type="text" class="form-control" id="volctn" name="volctn" onfocus="hitungvol()">
                                  <span><font color="red">*CBM/Cont</font></span>
                                </div>
                                </div>
                                      <script>
                                      function hitungfee()
                                      {
                                        a=document.getElementById("agentbu").value;
                                        // b=document.getElementById("tax").value;
                                        c=document.getElementById("kon").value;
                                        d=document.getElementById("bprate").value;
                                        // f=1+parseFloat(b);
                                        e=a*c*d*f;
                                        g = e.toFixed(0);
                                        document.getElementById("fee").value=g;


                                      }

                                      function hitungvol()
                                      {
                                        a=(document.getElementById("p").value)/100;
                                        b=(document.getElementById("l").value)/100;
                                        c=(document.getElementById("teb1").value)/1000;
                                        d=document.getElementById("pcsctn").value;
                                        e=a*b*c*d;
                                        document.getElementById("volctn").value=e;
                                      }
                                      </script>
                                      </div>
                                      <div class="row">

                                        <div class="col-sm-2">
                                          <div class="form-group">
                                        <input readonly type="text" class="form-control" id="kg" name="kg" onfocus="ambilp(7)">
                                        <span><font color="Red">KG/DOS</font></span>
                                      </div>
                                      </div>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                        <input readonly type="text" class="form-control" id="stc" name="stc" onfocus="hitungstc()">
                                      <span><font color="Red">Total Weight(kg)/cont</font></span>
                                    </div>
                                    </div>
                                    <script>
                                    function hitungstc()
                                    {
                                      a=document.getElementById("kg").value;
                                      b=document.getElementById("stokcont").value;
                                      c=a*b;
                                      document.getElementById("stc").value=c;

                                    }
                                    </script>
                                    <div class="col-sm-2">
                                      <div class="form-group">
                                      <input readonly type="text" class="form-control" id="ctc" name="ctc" onfocus="hitungctc()">
                                    <span><font color="red">% Tonnage of Cont</font></span>
                                  </div>
                                  </div>
                                  <script>
                                  function hitungctc()
                                  {
                                    a=document.getElementById("kg").value;
                                    b=document.getElementById("stc").value;
                                    c=a/b;
                                    document.getElementById("ctc").value=c*100;

                                  }
                                  </script>
                                  <div class="col-sm-2">
                                    <div class="form-group">
                                  <input readonly type="text" class="form-control" id="sqmcont1" name="sqmcont1" onfocus="hitunglagi()">
                                  <span><font color="Red">*SQM/DOS</font></span>
                                </div>
                                </div>
                                <script>
                                function hitunglagi()
                                {
                                  a=(document.getElementById("p").value)/100;
                                  b=(document.getElementById("l").value)/100;
                                  d=document.getElementById("pcsctn").value;
                                  e=a*b*d;
                                  document.getElementById("sqmcont1").value=e;
                                }
                                </script>
                                <div class="col-sm-2">
                                  <div class="form-group">
                                <input readonly type="text" class="form-control" id="fcostlagi" name="fcostlagi" onfocus="hitunglagi1()" STYLE="background-color: yellow;">
                                <span><font color="Blue">*Freight Cost</font></span>
                              </div>
                              </div>
                              <script>
                              function hitunglagi1()
                              {
                                a=document.getElementById("fee1").value;//400
                                b=document.getElementById("bprate").value;//16000
                                c=document.getElementById("ctc").value/100;//0.23%
                                d=document.getElementById("sqmcont1").value;//2.88

                                e=a*b*c/d;
                                g = e.toFixed(0);
                                document.getElementById("fcostlagi").value=g;
                              }
                              </script>
                              <div class="col-sm-2">
                                <div class="form-group">
                                <select name="isku" id="isku" class="form-control">
                                  <option>--Import System--</option>
                                <?php
                                  $sql = "SELECT * FROM master_is";
                                       $query = mysqli_query($conn, $sql);
                                       while($amku = mysqli_fetch_array($query)){
                                      echo "<option>".$amku['nama']."</option>";
                                    }
                                  ?>
                                </select>
                                <span><font color="Red">*Import System</font></span>
                            </div>
                            </div>

                                    </div>
                                    <div class="row">
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="emkl1" name="emkl1" onfocus="ambilemkl()" >
                                      <span><font color="Red">*Landed Cost per Container</font></span>
                                      </div>
                                      </div>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="emkl2" name="emkl2" onfocus="hitungemklku()" STYLE="background-color: yellow;">
                                      <span><font color="Blue">*Total Landed Cost per SQM</font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitungemklku()
                                      {
                                        a=document.getElementById("emkl1").value;//15000000
                                        b=document.getElementById("ctc").value/100;//15000

                                        d=document.getElementById("sqmcont1").value;//2.88

                                        e=a*b/d;
                                        g = e.toFixed(0);
                                        document.getElementById("emkl2").value=g;
                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input type="text" class="form-control" id="lscostdoc" name="lscostdoc" onfocus="ambills1()">
                                      <span><font color="Red">*LS Cost/Document</font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function ambills1()
                                      {
                                      document.getElementById("lscostdoc").value="440";
                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input type="text" class="form-control" id="numcont" name="numcont">
                                      <span><font color="Red">*Number of Container/Document</font></span>
                                      </div>
                                      </div>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="emklrate" name="emklrate" onfocus="ambilemklrate()">
                                      <span><font color="Red">*Exchange Rate of importation in USD </font></span>
                                      </div>
                                      </div>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="lscost" name="lscost" onfocus="hitunglscostku()" STYLE="background-color: yellow;">
                                      <span><font color="Blue">*LS Cost Per SQM</font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitunglscostku()
                                      {
                                        a=document.getElementById("lscostdoc").value;//440
                                        b=document.getElementById("emklrate").value;//15000
                                        c=document.getElementById("ctc").value/100;//ctc
                                        d=document.getElementById("sqmcont1").value;//2.88

                                        e=document.getElementById("numcont").value;//1



                                        f=a*b*c/d/e;
                                        g = f.toFixed(0);
                                        document.getElementById("lscost").value=g;
                                      }
                                      </script>

                                    </div>
                                    <div class="row">
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="iduty" name="iduty" onfocus="hitungiduty()">
                                      <span><font color="Red">*Import Duty Per SQM</font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitungiduty()
                                      {
                                        a=document.getElementById("pp").value*0.05;//440
                                        b=document.getElementById("emklrate").value;//15000

                                        f=a*b;
                                        g = f.toFixed(0);
                                        document.getElementById("iduty").value=g;
                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="atax" name="atax" onfocus="hitungatax()" >
                                      <span><font color="Red">*Value Added Tax per SQM </font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitungatax()
                                      {
                                        a=document.getElementById("pp").value;//440
                                        b=document.getElementById("iduty").value;//15000
                                        c=document.getElementById("emklrate").value;//15000
                                        d=a*0.05;
                                        e=parseFloat(d)+parseFloat(a);
                                        f=e*0.1;


                                        h=f*c;
                                        g = h.toFixed(0);
                                        document.getElementById("atax").value=g;
                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="itax" name="itax" onfocus="hitungitax()">
                                      <span><font color="Red">*Income Tax Per SQM</font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitungitax()
                                      {
                                        a=document.getElementById("pp").value;//440
                                        b=document.getElementById("iduty").value;//15000
                                        c=document.getElementById("emklrate").value;//15000
                                        d=a*0.05;
                                        e=parseFloat(d)+parseFloat(a);
                                        f=e*0.075;


                                        h=f*c;
                                        g = h.toFixed(0);
                                        document.getElementById("itax").value=g;
                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input readonly type="text" class="form-control" id="itax1" name="itax1" onfocus="hitungitax1()" STYLE="background-color: yellow;">
                                      <span><font color="Blue">*Total Import Tax per SQM</font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitungitax1()
                                      {
                                        a=document.getElementById("itax").value;//440
                                        b=document.getElementById("iduty").value;//15000
                                        c=document.getElementById("atax").value;//15000
                                        d=parseFloat(a)+parseFloat(b)+parseFloat(c);
                                        document.getElementById("itax1").value=d;
                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input  type="text" class="form-control" id="sguard" name="sguard"  onfocus="ambilsg1()" STYLE="background-color: yellow;">
                                      <span><font color="Red">*Safe Guard per SQM</font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function ambilsg1()
                                      {
                                      document.getElementById("sguard").value="11776";
                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input  type="text" class="form-control" id="finc" name="finc"  STYLE="background-color: yellow;">
                                      <span><font color="Red">*Financing Cost<font></span>
                                      </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input type="text" class="form-control" id="inte" name="inte"   STYLE="background-color: yellow;">
                                      <span><font color="Blue">*Interest</font></span>
                                      </div>
                                      </div>

                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input  type="text" class="form-control" id="sniku" name="sniku"  STYLE="background-color: yellow;">
                                      <span><font color="Blue">*SNI Cost per SQM</font></span>
                                      </div>
                                      </div>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input type="text" class="form-control" id="cogsku" name="cogsku"  onfocus="hitungcogsku()"  STYLE="background-color:aqua;">
                                      <span><font color="Blue">*COGS in IDR Per SQM </font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitungcogsku()
                                      {
                                        a=parseFloat(document.getElementById("buyprice").value);
                                        b=parseFloat(document.getElementById("fee").value);
                                        c=parseFloat(document.getElementById("fcostlagi").value);
                                        d=parseFloat(document.getElementById("emkl2").value);
                                        e=parseFloat(document.getElementById("lscost").value);
                                        f=parseFloat(document.getElementById("itax1").value);
                                        g=parseFloat(document.getElementById("finc").value);
                                        h=parseFloat(document.getElementById("inte").value);
                                        i=parseFloat(document.getElementById("sniku").value);
                                        k=parseFloat(document.getElementById("sguard").value);
                                        j=a+b+c+d+e+f+g+h+i+k;
                                        document.getElementById("cogsku").value=j;

                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input type="text" class="form-control" id="cogskupta" name="cogskupta"  onfocus="hitungcogskupta()"  STYLE="background-color:aqua;">
                                      <span><font color="Blue">*COGS PTA in IDR Per SQM </font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitungcogskupta()
                                      {
                                        a=document.getElementById("cogsku").value*1.1;
                                        b=a.toFixed(0);
                                        document.getElementById("cogskupta").value=b;

                                      }
                                      </script>
                                      <div class="col-sm-2">
                                        <div class="form-group">
                                      <input type="text" class="form-control" id="cogskusmb" name="cogskusmb"  onfocus="hitungcogskusmb()"  STYLE="background-color:aqua;">
                                      <span><font color="Blue">*COGS SMB in IDR Per SQM </font></span>
                                      </div>
                                      </div>
                                      <script>
                                      function hitungcogskusmb()
                                      {
                                        a=document.getElementById("cogsku").value*1.15;
                                        b=a.toFixed(0);
                                        document.getElementById("cogskusmb").value=b;

                                      }
                                      </script>
                                      </div>

</div>
  <button type="submit" name="daftar" value="daftar" class="button1 btn-primary btn-sm">Submit</button>
</div>

<!-- end of tab 1 -->

                                 </div>
                                </div>
                        <?php
                      }
                        ?>

                          <br><br>
                                  </form>
              </div>

              <!-- end panel -->
            </div>
          </div>



<?php
  include("../../footer.php");
?>
    <script type="text/javascript">
      function myFunction() {
      var element = document.getElementById("add_show");
      element.classList.toggle("hide");
      }
    </script>


</div>
	</body>
    </html>

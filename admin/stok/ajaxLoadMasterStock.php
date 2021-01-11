<?php
include("../../config.php");
session_start();
class Stok
{
  public $sup;
  public $merk;
  public $negara;
  public $panjang;
  public $lebar;
  public $tebal;
  public $pcsctn;
  public $sqmctn;
  public $kodetipe;
  public $sup1;
  public $merk1;
  public $negara1;
  public $surface;
  public $color;
  public $pola;
  public $grup;
  public $factoryCode;
  public $kodeStok;
  public $no;
  public $kodeHs;
}


$arrStok = [];
if(!isset($_SESSION['arrStok'])){


if (isset($_POST['daftar'])) {
  $nama = $_POST['nm'];
  $qty1 = $_POST['qty'];
  $op = $_POST['op'];
  $st1 = $_POST['st'];
  if ($op == 1) {
    $sql = "SELECT * FROM master_stok where $st1='$nama' and jum<'$qty1' ORDER BY no";
  } else if ($op == 2) {
    $sql = "SELECT * FROM master_stok where $st1='$nama' and jum>'$qty1' ORDER BY no";
  }
} else if (isset($_POST['daftar1'])) {
  $sql = "SELECT * FROM master_stok ORDER BY no";
} else {
  $sql = "SELECT * FROM master_stok ORDER BY no";
}


$query = mysqli_query($conn, $sql);


$amku = [];


while ($amku = mysqli_fetch_array($query)) {
  $s = new Stok();
  $s->no = $amku['no'];
  $sup = $amku["kodesup"];
  $s->merk = $amku["kodemerk"];
  $negara = $amku["country"];
  $s->panjang = $amku["panjang"];
  $s->lebar = $amku["lebar"];
  $s->tebal = $amku["tebal"];
  $s->pcsctn = $amku["pcsctn"];
  $s->sqmctn = $amku["sqmctn"];
  $s->kodetipe = $amku["kodetipe"]; 
  $s->kodeHs = $amku['kodehs'];
  $s->factoryCode = $amku['factory_code'];
  $kodetipe = $amku["kodetipe"];



  $sqlsup = "SELECT * FROM master_supplier where kode='$sup' LIMIT 1";
  $querysup = mysqli_query($conn, $sqlsup);
  while ($amkusup = mysqli_fetch_array($querysup)) {
    $s->sup1 = $amkusup["nama"];
    break;
  }
  $sqlm = "SELECT * FROM master_merk where nama='".$s->merk."' LIMIT 1";
  $querym = mysqli_query($conn, $sqlm);
  while ($amkum = mysqli_fetch_array($querym)) {
    $s->merk1 = $amkum["kode"];
    break;
  }
  $sqlk = "SELECT * FROM country where code='$negara' LIMIT 1";
  $queryk = mysqli_query($conn, $sqlk);
  while ($amkuk = mysqli_fetch_array($queryk)) {
    $s->negara1 = $amkuk["countryname"];
    break;
  }
  $sqlt = "SELECT * FROM master_tipe where kode='$kodetipe'";
  $queryt = mysqli_query($conn, $sqlt);
  while ($amkut = mysqli_fetch_array($queryt)) {
    $s->surface = $amkut["surface"];
    $s->color = $amkut["color"];
    $s->pola = $amkut["pattern"];
    $s->grup = $amkut["kodegrup"];
    break;
  }
  array_push($arrStok,$s);
}
$_SESSION['arrStok'] = $arrStok;








 
}
foreach($_SESSION['arrStok'] as $stok){
  
  echo '
                        <tr class="odd gradeX" >
                        <td class="with-btn" nowrap="">

                          <a href="master_stok.php?aksi=view&no= '.$stok->no.'" class="btn btn-primary btn-rounded btn-sm" role="button">Edit</a>
                          <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                          <!-- <a href="proses-stok.php?aksi=update&no= '.$stok->no.'" class="btn btn-primary btn-rounded btn-sm" role="button">Disable</a>
                          <a href="proses-stok.php?aksi=active&no='.$stok->no.'" class="btn btn-primary btn-rounded btn-sm" role="button">Enable</a>
                        <a href="proses-stok.php?aksi=delete&no='.$stok->no.'" class="btn btn-primary btn-rounded btn-sm" role="button">Delete</a> -->

                          <a href="master_shading_stok.php?kode='.$stok->kodeStok.'" class="btn btn-primary btn-rounded btn-sm" role="button">shading</a>

                        </td>
                        <td><img src="../gambar/'.$stok->kodetipe.'.jpg" widtn="50" height="50"></td>
                        <td>'.$stok->kodeStok.'</td>
                        <td nowrap>'.$stok->grup.'</td>
                        <td nowrap>'.$stok->kodetipe.'</td>
                        <td nowrap>'.$stok->factoryCode.'</td>
                        <td>'.$stok->kodeHs.'</td>
                        <td nowrap>'.$stok->merk.'</td>
                        <td nowrap>'.$stok->sup1.'</td>
                        <td>'.$stok->surface.'</td>
                        <td>'.$stok->color.'</td>
                        <td>'.$stok->pola.'</td>


                        <td nowrap> '.$stok->negara1.'</td>
                        <td nowrap> '.$stok->panjang.'</td>
                        <td nowrap> '.$stok->lebar.'</td>
                        <td nowrap> '.$stok->tebal.'</td>
                        <td nowrap> '.$stok->pcsctn.'</td>
                        <td nowrap> '.$stok->sqmctn.'</td>
                        
                        </tr>';
}


?>







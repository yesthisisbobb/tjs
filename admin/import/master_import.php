<!DOCTYPE html>
<html>
<head>
  <script language=javascript>
var objekxhr;

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
        alert ("ganti browser anda")
      }
}

function tampilkan()
{
document.getElementById("kotak").value = objekxhr.responseText;
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

</script>


</head>

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
  include("../../header.php");
?>

<body>
<!-- begin #page-loader -->

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
          <li class="breadcrumb-item active">Master Buying Price</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Buying Price<a href="master_buy.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>

        <table id="data-table-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->

              <th class="text-nowrap">Date</th>
              <th class="text-nowrap">TJS Item Code</th>
              <th class="text-nowrap">Currency</th>
              <th class="text-nowrap">Buying Price</th>
              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
              $sql = "SELECT * FROM master_buy where status='Active' ORDER BY id ASC";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">

              <td><?=$amku["tgl"];?></td>
              <td><?=$amku["kode"];?></td>
              <td><?=$amku["cur"];?></td>
              <td><?=$amku["price"];?></td>
              <td class="with-btn" nowrap="">

                <a href="master_buy.php?aksi=view&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-master-grup.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-master-grup.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-xs" role="button"><i class="fa fa-trash"></i></a>

                  </td>
           <?php } ?>
            </tr>
          </tbody>
        </table>

        <div id="add_show">
            <div class="row">
              <div class="col-lg-12">
                      <form class="form-horizontal" method="post" action="proses-master-grup.php">
                        <?php
                        $aksi=$_GET['aksi'];
                        if ($aksi=="view")
                        {
                          $nomerku=$_GET['no'];
                          $sql = "SELECT * FROM master_buy where id='$nomerku'";
                               $query = mysqli_query($conn, $sql);
                               while($amku = mysqli_fetch_array($query)){
                                 $tgl=$amku['tgl'];
                                 $kodep=$amku['kode'];
                                 $curp=$amku['cur'];
                                 $pricep=$amku['price'];
                                 $status=$amku['status'];
                                 $nom=$amku['id'];
                               }
                          ?>
                          <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                            <!-- begin panel-heading -->
                            <div class="panel-heading">
                              <h4 class="panel-title">View/Update Currency</h4>
                            </div>
                            <!-- end panel-heading -->
                            <!-- begin panel-body -->
                            <div class="panel-body panel-form">
                              <div class="container">
                                <div class="form-group">
                                  <!-- <label class="col-sm-10 control-label">No.</label> -->
                                  <div class="col-sm-2">
                                    <input type="hidden" class="form-control" id="nom" value="<?php echo $nom; ?>" name="nom">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="col-sm-10 control-label">Post Date</label>
                                 <div class="col-sm-4">
                                   <input type="text" readonly class="form-control" id="nom1" value="<?php echo $tgl; ?>" name="nom1">
                                </div>
                              </div>

                               <div class="form-group">
                                  <label class="col-sm-10 control-label">TJS Code</label>
                                 <div class="col-sm-4">
                                   <select name="kode" id="kode" class="form-control">
                                     <option><?php echo $kodep; ?></option>
                                   <?php
                                     $sql = "SELECT * FROM master_stok";
                                          $query = mysqli_query($conn, $sql);
                                          while($amku = mysqli_fetch_array($query)){
                                         echo "<option>".$amku['kode_stok']."</option>";
                                       }
                                     ?>
                                   </select>
                                 </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-sm-4 control-label">Buying Foreign Currency</label>
                                   <div class="col-sm-4">
                                     <select name="buying_cur" id="buying_cur" class="form-control">
                                    <option><?php echo $curp; ?>
                                     <?php
                                       $sql = "SELECT * FROM master_cur";
                                            $query = mysqli_query($conn, $sql);
                                            while($amku = mysqli_fetch_array($query)){
                                           echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                                         }
                                       ?>
                                     </select>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-sm-4 control-label">Buying Price in Foreign Exchange</label>
                                     <div class="col-sm-4">
                                     <input type="text" class="form-control" id="bp" name="bp" value="<?php echo $pricep; ?>">
                                   </div>
                                   </div>
                                <div class="form-group">
                                    <div class="col-sm-2">
                                      <select class="form-control" id="status" name="status">
                                        <option><?php echo $status; ?></option>
                                        <option>Active</option>
                                        <option>InActive</option>
                                    </select>
                                  </div>
                                  </div>
                      <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                        <?php } else { ?>

                          <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                            <!-- begin panel-heading -->
                            <div class="panel-heading">
                              <h4 class="panel-title">Add New Currency</h4>
                            </div>
                            <!-- end panel-heading -->
                            <!-- begin panel-body -->
                            <div class="panel-body panel-form">
                              <div class="container"><br>
                   <div class="form-group">
                     <div class="col-sm-4">
                       <select name="kode" id="kode" class="form-control">
                       <?php
                         $sql = "SELECT * FROM master_stok";
                              $query = mysqli_query($conn, $sql);
                              while($amku = mysqli_fetch_array($query)){
                             echo "<option>".$amku['kode_stok']."</option>";
                           }
                         ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-4 control-label">Buying Foreign Currency</label>
                       <div class="col-sm-4">
                         <select name="buying_cur" id="buying_cur" class="form-control">

                         <?php
                           $sql = "SELECT * FROM master_cur";
                                $query = mysqli_query($conn, $sql);
                                while($amku = mysqli_fetch_array($query)){
                               echo "<option value=".$amku['kode'].">".$amku['nama']."</option>";
                             }
                           ?>
                         </select>
                     </div>
                     </div>
                     <div class="form-group">
                         <label class="col-sm-4 control-label">Buying Price in Foreign Exchange</label>
                         <div class="col-sm-4">
                         <input type="text" class="form-control" id="bp" name="bp">
                       </div>
                       </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                          <select class="form-control" id="status" name="status">
                            <option>-- Status -- </option>
                            <option>Active</option>
                            <option>InActive</option>
                        </select>
                      </div>
                      </div>
                        <div class="form-group">
                        <div class="col-sm-6">
                      <button type="submit" name="daftar" value="daftar" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                  <?php
                }
                  ?>

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
                              </div>
                            </div>
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
</div>
</div>
</div>
</div>
	</body>
    </html>

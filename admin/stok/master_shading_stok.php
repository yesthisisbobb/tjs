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
document.getElementById("kotak").value = objekxhr.responseText;
}

function ambildatagrup1(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhsgrup1.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkangrup1;
}
function tampilkangrup1()
{
document.getElementById("namaalias").value = objekxhr.responseText;
}

function ambildatagrup2(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhsgrupmerk.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkangrup2;
}
function tampilkangrup2()
{
document.getElementById("kodku").value = objekxhr.responseText;
}


function ambildatagrup(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhsgrup.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkangrup;
}



function tampilkangrup()
{
document.getElementById("kodegrup1").value = objekxhr.responseText;
}

function ambildatahs(str)
{
buatxhr();
objekxhr.open("GET", "TampilMhshs.php?q="+str,true);
objekxhr.send(null);
objekxhr.onreadystatechange=tampilkanhs;
}



function tampilkanhs()
{
document.getElementById("kodehsku1").value = objekxhr.responseText;
}


</script>
</head>
<?php
include('../blank_header.php')
 ?>

<body class="sidebar-noneoverflow">
  <?php
  $kodetjs=$_GET["kode"];
  ?>
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
                                      <h4>Shading Stock <a href="master_shading_stok.php?kode=<?php echo $kodetjs; ?>#section2" class="btn  btn-rounded btn-primary btn-sm" role="button">Add New</a>
                                      <a href="master_stok.php" class="btn  btn-rounded btn-primary btn-sm" role="button">Back to Product Code</a></h4>
                                  </div>
                              </div>
                          </div>
                          <hr class="dott">

                                  <div class="col-lg-12 col-12 mx-auto" style="overflow-x:auto;">
                <!-- start of content area 1 -->
                <table id="zero-config" class="table table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <!-- <th width="1%">No</th> -->

                      <!-- <th class="text-nowrap">Temp Code</th> -->
                      <th class="text-nowrap">TJS Code</th>
                      <th class="text-nowrap">Shading</th>
                      <th class="text-nowrap">Qty</th>
                      <th class="text-nowrap">WH</th>
                      <th class="text-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php
                      $sql = "SELECT * FROM master_shading where kode_stok='$kodetjs'";
                           $query = mysqli_query($conn, $sql);
                           while($amku = mysqli_fetch_array($query)){
                      ?>
                    <tr class="odd gradeX">

                      
                      <td><?=$amku["kode_stok"];?></td>
                      <td><?=$amku["kd_shading"];?></td>
                      <td><?=$amku["jum"];?></td>
                      <td><?=$amku["gudang"];?></td>

                      <td class="with-btn" nowrap="">

                        <a href="master_shading_stok.php?aksi=view&kode=<?php echo $kodetjs; ?>&no=<?php echo $amku["no"]; ?>" class="btn btn-primary btn-rounded btn-sm" role="button">Edit</a>
                        <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                          <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn-rounded btn-sm" role="button">Disable</a>
                          <a href="proses-master-grup.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn-rounded btn-sm" role="button">Enable</a>
                        <a href="proses-stok-shading.php?aksi=delete&no=<?php echo $amku["no"]; ?>" class="btn btn-primary btn-rounded btn-sm" role="button">Delete</a>

                          </td>
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
                            <div class="row" id="section2">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add/Update</h4>
                                </div>

                            </div>
                        </div>
<hr class="dott">
                                  <div class="col-lg-12 col-12 mx-auto">

                                    <form class="form-horizontal" method="post" action="proses-stok-shading.php">
                                      <?php
                                      $aksi=$_GET['aksi'];
                                      if ($aksi=="view")
                                      {
                                        $nomerku=$_GET['no'];
                                        $sql = "SELECT * FROM master_shading where no='$nomerku'";
                                             $query = mysqli_query($conn, $sql);
                                             while($amku = mysqli_fetch_array($query)){
                                               $tempcode1=$amku['tempcode'];
                                               $shading1=$amku['kd_shading'];
                                               $jum=$amku['jum'];
                                               $temp1=$amku['tempcode'];
                                               $status=$amku['status'];
                                               $nom=$amku['no'];
                                             }

                                        ?>
                                              <div class="form-group">
                                                <!-- <label class="col-sm-10 control-label">No.</label> -->
                                                <div class="col-sm-2">
                                                  <input type="hidden" class="form-control" id="nom" value="<?php echo $nom; ?>" name="nom">
                                               </div>
                                             </div>

                                             <div class="form-group">
                                               <label class="control-label col-sm-8 ">TJS Code </label>
                                               <div class="col-sm-4">
                                             <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodetjs; ?>">
                                           </div>
                                           </div>

                                      <hr>

                                      <div class="form-group">
                                       <label class="control-label col-sm-8 ">Ventura Temporary Code</label>
                                       <div class="col-sm-4">
                                         <select name="tempcode" id="tempcode" class="form-control">
                                           <option><?php echo $temp1; ?></option>
                                         <?php
                                           $sql = "SELECT * FROM tempcode";
                                                $query = mysqli_query($conn, $sql);
                                                while($amku = mysqli_fetch_array($query)){
                                               echo "<option value=".$amku['tempcode'].">".$amku['tempcode']."</option>";
                                             }
                                           ?>
                                         </select>
                                      </div>
                                      </div>

                                       <div class="form-group">
                                           <label class="control-label col-sm-8 ">Shading Code </label>
                                           <div class="col-sm-4">
                                         <input type="text" class="form-control" id="kode_shading" name="kode_shading" value="<?php echo $shading1;?>">
                                       </div>
                                      </div>
                                      <div class="form-group">
                                         <label class="control-label col-sm-8 ">Qty </label>
                                         <div class="col-sm-4">
                                       <input type="text" class="form-control" id="jum" name="jum" value="<?php echo $jum;?>">
                                      </div>
                                      </div>


                                       <div class="row">
                                         <div class=" col-sm-8">
                                           <div class="form-group">
                                               <label class="control-label col-sm-8 ">Status</label>
                                               <div class="col-sm-4">
                                                 <select class="form-control" id="status" name="status">
                                                   <option><?php echo $status; ?></option>
                                                   <option>Active</option>
                                                   <option>InActive</option>
                                                   </select>
                                           </div>
                                         </div>
                                         </div>
                                       </div>
                                       <div class=" col-sm-8">
                                         <div class="form-group">

                                             <div class="col-sm-4">
                                             <button type="submit" name="daftar1" value="daftar" class="btn btn-primary btn-rounded btn-sm">Update</button> <br><br>
                                         </div>
                                       </div>
                                       </div>
                                      <?php } else { ?>
                                          <div class="form-group">
                                            <label class="control-label col-sm-8 ">TJS Code </label>
                                            <div class="col-sm-4">
                                          <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodetjs; ?>">
                                        </div>
                                        </div>

                                <hr>

                                <div class="form-group">
                                    <label class="control-label col-sm-8 ">Ventura Temporary Code</label>
                                    <div class="col-sm-4">
                                      <select name="tempcode" id="tempcode" class="form-control">
                                      <?php
                                        $sql = "SELECT * FROM tempcode";
                                             $query = mysqli_query($conn, $sql);
                                             while($amku = mysqli_fetch_array($query)){
                                            echo "<option value=".$amku['tempcode'].">".$amku['tempcode']."</option>";
                                          }
                                        ?>
                                      </select>
                                </div>
                                </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-8 ">Shading Code </label>
                                        <div class="col-sm-4">
                                      <input type="text" class="form-control" id="kode_shading" name="kode_shading">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-sm-8 ">Qty </label>
                                      <div class="col-sm-4">
                                    <input type="text" class="form-control" id="jum" name="jum">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class=" col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-8 ">Warehouse</label>
                                        <div class="col-sm-4">
                                          <select name="gdg" id="gdg" class="form-control">
                                          <?php
                                            $sqlgdg = "SELECT * FROM gudang";
                                                 $querygdg = mysqli_query($conn, $sqlgdg);
                                                 while($amkugdg = mysqli_fetch_array($querygdg)){
                                                echo "<option>".$amkugdg['nm_lengkap']."</option>";
                                              }
                                            ?>
                                          </select>
                                    </div>
                                  </div>
                                  </div>
                                </div>

                                    <div class="row">
                                      <div class=" col-sm-8">
                                        <div class="form-group">
                                            <label class="control-label col-sm-8 ">Status</label>
                                            <div class="col-sm-4">
                                              <select class="form-control" id="status" name="status">
                                                <option>Status</option>
                                                <option>Active</option>
                                                <option>InActive</option>
                                                </select>
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                                    <div class=" col-sm-8">
                                      <div class="form-group">

                                          <div class="col-sm-4">
                                          <button type="submit" name="daftar" value="daftar" class="btn btn-primary btn-rounded btn-sm">Submit</button> <br><br>
                                      </div>
                                    </div>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                </form>
                                <script type="text/javascript">
                                 $(document).ready(function() {
                                     $('#tempcode').select2();
                                 });
                                </script>


                                                                  </div>
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

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
  include("../top-menu.php");
?>
<?php
  include("../../sidenav-menu.php");
?>


      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Dashboard</h1>
<div class="row">
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
          <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
            <div class="stats-info">
              <h4>TOTAL CUSTOMER TOKO</h4>
              <p><?=$totalPenggunatoko; ?></p>
            </div>
            <div class="stats-link">
            <a href=" " class="btn btn-info" role="button"  data-toggle="modal" data-target="#myModal">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog" width="600">
          <div class="modal-dialog modal-lg" >

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Data Customer Toko (B2B)</h4>
              </div>
              <div class="modal-body">
                <p>
       <table border="1" width=100% class="table-striped ">
        <thead class="thead-dark">
            <tr>
    			       <th>Nama Toko</th>
                <th>Shipto</th>
      			       <th>Billto</th>
                <th>kota</th>
                <th>telp</th>
                <th>no.hp</th>
    			         <th>Email</th>


            </tr>
        </thead>
        <tbody>
                  <?php

                   $sql = "SELECT * FROM detail_toko";
                   $query = mysqli_query($conn, $sql);

                   while($agen = mysqli_fetch_array($query)){


                       echo "<tr>";
                 echo "<td>".$agen['nama_toko']."</td>";

                 echo "<td>".$agen['alamat_shipto']."</td>";
                 echo "<td>".$agen['alamat_billto']."</td>";
                echo "<td>".$agen['Kota']."</td>";
               echo "<td>".$agen['Telpon']."</td>";
                 echo "<td>".$agen['no_hp']."</td>";
                 echo "<td>".$agen['Email']."</td>";






                       echo "</tr>";
                   }

                   echo "</table>";
                   ?>



                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
          <div class="widget widget-stats bg-orange">
            <div class="stats-icon"><i class="fa fa-link"></i></div>
            <div class="stats-info">
              <h4>TOTAL USER RETAIL</h4>
              <p><?=$totalPenggunaretail; ?></p>
            </div>
            <div class="stats-link">
              <a href=" " class="btn btn-info" role="button"  data-toggle="modal" data-target="#myModal1">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>

            </div>
          </div>
        </div>

        <div id="myModal1" class="modal fade" role="dialog" width="600">
          <div class="modal-dialog modal-lg" >

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Data Customer Retail</h4>
              </div>
              <div class="modal-body">
                <p>
                  <form name="form3">
                    <select>
                      <option>Kategori</option>
                      <option>Perorangan</option>
                      <option>Badan Usaha</option>
                    </select>
                  </form>
                  <br>
       <table border="1" width=100% class="table-striped ">
        <thead class="thead-dark">
            <tr>
                 <th>Nama Toko</th>
                 <th>Nama Customer</th>
                <th>Shipto</th>
                   <th>Billto</th>
                <th>kota</th>
                <th>telp</th>
                <th>no.hp</th>
                   <th>Email</th>


            </tr>
        </thead>
        <tbody>
                  <?php

                   $sql = "SELECT * FROM master_retail";
                   $query = mysqli_query($conn, $sql);

                   while($agen = mysqli_fetch_array($query)){


                       echo "<tr>";
                 echo "<td>".$agen['nama_customer']."</td>";
                 echo "<td>".$agen['PIC']."</td>";
                 echo "<td>".$agen['alamat_shipto']."</td>";
                 echo "<td>".$agen['alamat_billto']."</td>";
                echo "<td>".$agen['Kota']."</td>";
               echo "<td>".$agen['Telpon']."</td>";
                 echo "<td>".$agen['no_hp']."</td>";
                 echo "<td>".$agen['Email']."</td>";






                       echo "</tr>";
                   }

                   echo "</table>";
                   ?>



                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
          <div class="widget widget-stats bg-grey-darker">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
              <h4>TOTAL USER TERDAFTAR</h4>
              <p><?=$totalPengguna;?></p>
            </div>
            <div class="stats-link">
              <a href=" " class="btn btn-info" role="button"  data-toggle="modal" data-target="#myModal3">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>

            </div>
          </div>
        </div>

        <div id="myModal3" class="modal fade" role="dialog" width="600">
          <div class="modal-dialog modal-lg" >

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Data Customer Retail</h4>
              </div>
              <div class="modal-body">
                <p>
        <table border="1" width=100% class="table-striped ">
        <thead class="thead-dark">
            <tr>
                 <th>User Name</th>
                 <th>Email</th>
                <th>Level</th>

            </tr>
        </thead>
        <tbody>
                  <?php

                   $sql = "SELECT * FROM login";
                   $query = mysqli_query($conn, $sql);

                   while($agen = mysqli_fetch_array($query)){


                       echo "<tr>";
                 echo "<td>".$agen['username']."</td>";
                 echo "<td>".$agen['email']."</td>";
                 echo "<td>".$agen['level']."</td>";

                       echo "</tr>";
                   }

                   echo "</table>";
                   ?>



                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>


        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
          <div class="widget widget-stats bg-black-lighter">
            <div class="stats-icon"><i class="fa fa-clock"></i></div>
            <div class="stats-info">
              <h4>TOTAL CUSTOMER PROJECT</h4>
              <p><?=$totalPenggunaproject; ?></p>
            </div>
            <div class="stats-link">
              <a href=" " class="btn btn-info" role="button"  data-toggle="modal" data-target="#myModal2">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>

            </div>
          </div>
        </div>
        <!-- end col-3 -->
        <div id="myModal2" class="modal fade" role="dialog" width="600">
          <div class="modal-dialog modal-lg" >

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Data Customer Project</h4>
              </div>
              <div class="modal-body">
                <p>
       <table border="1" width=100% class="table-striped ">
        <thead class="thead-dark">
            <tr>
                 <th>Nama Kontraktor</th>

                <th>Shipto</th>
                   <th>Billto</th>
                <th>kota</th>
                <th>telp</th>
                <th>no.hp</th>
                   <th>Email</th>


            </tr>
        </thead>
        <tbody>
                  <?php

                   $sql = "SELECT * FROM detail_project";
                   $query = mysqli_query($conn, $sql);

                   while($agen = mysqli_fetch_array($query)){


                       echo "<tr>";
                 echo "<td>".$agen['nama_toko']."</td>";
                 echo "<td>".$agen['alamat_shipto']."</td>";
                 echo "<td>".$agen['alamat_billto']."</td>";
                echo "<td>".$agen['Kota']."</td>";
               echo "<td>".$agen['Telpon']."</td>";
                 echo "<td>".$agen['no_hp']."</td>";
                 echo "<td>".$agen['Email']."</td>";






                       echo "</tr>";
                   }

                   echo "</table>";
                   ?>



                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      </div>


        <!-- end #content -->
      </div>
  </div>
<?php
  include("../../footer.php");
?>
  </body>
    </html>

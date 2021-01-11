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
<style>
h4 {
padding-left: 50px;
font-family: Montserrat;
padding-top: 20px;
}
</style>
<html lang="en">


<?php
include('../blank_header.php')
 ?>
 <div class="header-container fixed-top">
 <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row">
            <li class="nav-item align-self-center page-heading">
                <div class="page-header">
                    <h4 class="text-info"> Activities <span style="font-size:12px;">Kegiatan </span><a href="master_stage.php#section2" class="btn btn-info btn-sm" role="button">Add New</a></h4></h4>                    
                </div>
            </li>
        </ul>

        <ul class="navbar-item flex-row navbar-dropdown">
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
            <?php
            if ($_SESSION["username"]==""){
            ?>
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </a>
            <?php   } else {?>
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php
                $nama=$_SESSION["username"];

                $sqlp= "SELECT * FROM login where email='$nama'";
                    $queryp = mysqli_query($conn, $sqlp);

                    while($amp = mysqli_fetch_array($queryp)){
                    $gam=$amp['gam'];
                    $namanya=$amp['nama'];
                    $email=$amp['email'];
                    $role=$amp['role'];
                    $divisi=$amp['divisi2'];
                    $divisi2=$amp['divisi'];

                    }
                    ?>

                    <img class="rounded-circle mt-0 ml-0" src="<?php echo $admin_url; ?>/<?php echo $gam; ?>" width="50" height="50">

            </a>
            <?php } ?>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                    <div class="dropdown-item">
                    <p><b>Welcome, <?php echo strtoupper($namanya); ?>
                    </p></b>
                    </div>
                    <div class="dropdown-item">
                        <p><b>
                        <?php echo "Role:"." ".strtoupper($role)?>
                    </p></b>
                    </div>
                    <div class="dropdown-item">
                        <p><b>
                        <?php echo "Division: ".strtoupper($divisi2) ?>
                    </p></b>
                    </div>
                    <div class="dropdown-item">
                        <p><b>
                        <?php echo "Company:".strtoupper($divisi); ?>
                    </p></b>
                    </div>
                        <!-- <div class="dropdown-item">
                            <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                        </div> -->
                        <div class="dropdown-item">
                            <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> Inbox</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="auth_lockscreen.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Lock Screen</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="../../logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
 </div>

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


                                  <div  style="overflow-x:auto;" class="col-lg-12 col-12 mx-auto">
                <!-- start of content area 1 -->
                <table id="zero-config" class="cell-border table table-hover">
                  <thead>
                    <tr>
                      <!-- <th width="1%">No</th> -->

                      <!-- <th class="text-nowrap">Date</th> -->

                       <th class="text-nowrap text-left">Activity Name</th>                      
                      <th class="text-wrap text-left">Type of Activity</th>
                      <th class="text-wrap text-left">Date</th>
                      <th class="text-wrap text-left">Time Scheduled</th>
                      <th class="text-wrap text-left">Duration</th>
                      <th class="text-wrap text-left">Notes</th>
                      <th class="text-nowrap text-left">Deals</th>
                      <th class="text-nowrap text-left">Contact's Name</th>
                      <th class="text-nowrap text-left">Organization</th>   
                      <th class="text-nowrap text-left">Status</th>     

                      <th class="text-nowrap" style="text-align:left">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                          <?php

                      // $username = $_SESSION["username"];

                      $sql = "SELECT a.id AS kode, a.name AS act_name, a.type AS act_type, a.date AS act_date, a.time AS act_time, a.duration AS act_duration, a.notes AS act_notes, a.status AS act_status, d.name AS deal_name, k.nama AS kontak, k.perusahaan AS perusahaan FROM master_activities a
                              INNER JOIN kontak k ON id_kontak = k.id
                              INNER JOIN master_deals d ON id_deals = d.id";
                           $query = mysqli_query($conn, $sql);
                           while($amku = mysqli_fetch_array($query)){                             
                      ?>
                    <tr class="odd gradeX">
                      <td><b><?=$amku["act_name"];?></b></td>
                      <td>
                      <?php
                        if($amku['act_type'] == "Call")
                        {
                          echo "<span class='badge badge-info' style='font-size: 10px;'>Call</span>";
                        }
                        else if($amku['act_type'] == "Meeting")
                        {
                          echo "<span class='badge badge-secondary' style='font-size: 10px;'>Meeting</span>";
                        }
                        else if($amku['act_type'] == "Task")
                        {
                          echo "<span class='badge badge-primary' style='font-size: 10px;'>Task</span>";
                        }
                        else if($amku['act_type'] == "Deadline")
                        {
                          echo "<a href='#'><span class='badge badge-dark' style='font-size: 10px;'>Deadline</span></a>";
                        }
                        else if($amku['act_type'] == "Email")
                        {
                          echo "<span class='badge badge-danger' style='font-size: 10px;'>Email</span>";
                        } 
                        else
                        {
                          echo "<span class='badge badge-success' style='font-size: 10px;'>Lunch</span>";
                        }                       
                      ?>
                      </td>
                      <td><?=$amku["act_date"];?></td>
                      <td><?=$amku["act_time"];?></td>
                      <td><?=$amku["act_duration"];?></td>
                      <td><?=$amku["act_notes"];?></td>                     
                      <td><?=$amku["deal_name"];?></td>
                      <td><?=$amku["kontak"];?></td>
                      <td><?=$amku["perusahaan"];?></td>
                      <td><?=$amku["act_status"];?></td>


                      <td class="with-btn" nowrap="">
                        <a href="master_activities.php?aksi=view&no=<?php echo $amku["kode"]; ?>#section2"><i class="fas fa-edit" style="font-size:18px;color:#5DADE2;" data-toggle="tooltip" title="EDIT" ></i></a>
                        <a href="proses-master-grup.php?aksi=update&no=<?php echo $amku["id"]; ?>"><i class="fas fa-times-circle"  style="font-size:18px;color:#F8C471;"data-toggle="tooltip" title="DISABLE" ></i></a>
                        
                        

                        <?php 
                            if($amku['act_status'] == "On Process")
                            {
                                // echo '<a href="proses-master-activities.php?aksi=done&kode='.$amku["kode"].'" class="btn btn-primary btn-rounded btn-sm" role="button">Mark as Done</a>';   
                                echo '<a href="proses-master-activities.php?aksi=done&kode='.$amku["kode"].'"><i class="fas fa-check-circle" style="font-size:18px;color:#52BE80;"data-toggle="tooltip" title="Mark as Done" ></i></i></a>';
                                
                                // echo '<a href="proses-master-activities.php?aksi=done&kode='.$amku["kode"].'" class="btn btn-primary btn-rounded btn-sm" role="button">Mark as Done</a>';                                              
                            }
                        ?>
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
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 border-bottom border-info 1px">
                                    <h3 class="text-info" style="text-align:left">Add New <span style="font-size:12px;">Tambah Data</span></h4>

                                </div>
                            </div>
                        </div>

                                  <div class="col-lg-12 col-12 mx-auto">

                                    <form class="form-horizontal" method="post" action="proses-master-activities.php">
                                         <?php
                                            $aksi = $_GET['aksi'];
                                            if ($aksi =="view")
                                            {
                                              $nomerku = $_GET['no'];
                                              
                                              $sql = "SELECT a.id AS kode, a.name AS act_name, a.type AS act_type, a.date AS act_date, a.time AS act_time, a.duration AS act_duration, a.notes AS act_notes, a.status AS act_status, d.name AS deal_name, k.nama AS kontak, k.perusahaan AS perusahaan FROM master_activities a
                                                      INNER JOIN kontak k ON id_kontak = k.id
                                                      INNER JOIN master_deals d ON id_deals = d.id WHERE a.id='$nomerku'";
                                                  $query = mysqli_query($conn, $sql);
                                                  while($amku = mysqli_fetch_array($query)){
                                                    $kode =$amku['kode'];
                                                    $type =$amku['act_type'];
                                                    $nama =$amku['act_name'];
                                                    $date =$amku['act_date'];
                                                    $time =$amku['act_time'];
                                                    $duration =$amku['act_duration'];
                                                    $notes =$amku['act_notes'];
                                                    $status =$amku['act_status'];
                                                    $deals =$amku['deal_name'];
                                                    $kontak =$amku['kontak'];
                                                    $perusahaan =$amku['perusahaan'];
                                                  }
                                          ?>

                                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                                          <!-- begin panel-heading -->

                                          <!-- end panel-heading -->
                                          <!-- begin panel-body -->
                                          <div class="panel-body panel-form">
                                            <div class="container">
                                              <div class="form-group">
                                                <!-- <label class="col-sm-10 control-label">No.</label> -->
                                                <div class="col-sm-2">
                                                  <input type="hidden" class="form-control" id="nom" value="<?php echo $nomerku; ?>" name="nom">
                                               </div>
                                             </div>
                                              <div class="form-group">
                                                 <label class="col-sm-10 control-label">Activity Name</label>
                                                 <div class="col-sm-4">
                                                   <input type="text" class="form-control" id="name_act" value="<?php echo $nama; ?>" name="name_act">
                                                </div>
                                              </div>
                                                <div>
                                                <div class="form-group">
                                                  <label class="col-sm-6 control-label">Type of Activity</label>
                                                  <div class="col-sm-2">
                                                    <select class="form-control" id="type" name="type">  
                                                      <option value="<?php echo $type; ?>"><?php echo $type; ?></option>                                      
                                                      <option value="Call">Call</option>
                                                      <option value="Meeting">Meeting</option>
                                                      <option value="Task">Task</option>
                                                      <option value="Deadline">Deadline</option>
                                                      <option value="Email">Email</option>
                                                      <option value="Lunch">Lunch</option>
                                                    </select>
                                                  </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-6 control-label">Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" id="date_activity" name="date_activity" value="<?php echo $date; ?>">
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-6 control-label">Duration</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="duration" name="duration" placeholder="0 hours" value="<?php echo $duration; ?>">
                                            </div>
                                         </div>
                                         <div class="form-group">
                                              <label class="col-sm-6 control-label">Time (WIB)</label>
                                              <div class="col-sm-2">
                                              <select class="form-control" id="time" name="time">
                                                <option value="<?php echo $time; ?>"><?php echo $time; ?></option>       
                                                <?php 
                                                for($hours=0; $hours<24; $hours++)
                                                {
                                                    for($mins=0; $mins<60; $mins+=30)
                                                    { 
                                                        $time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT);
                                                        echo '<option value= "'.$time.'">'.$time.'</option>';
                                                    }
                                                }
                                                ?>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Notes</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="notes" id="notes" cols="100" rows="10"><?php echo $notes; ?></textarea>                                        
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-6 control-label">Deals</label>
                                          <div class="col-sm-6">                                      
                                              <input type="text" class="form-control" id="deals2" name="deals2" value="<?php echo $deals; ?>" disabled>
                                          </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label">Contact's Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="kontak2" name="kontak2" value="<?php echo $kontak; ?>" disabled>
                                            </div>
                                        </div><br>
                                    <button type="submit" name="daftar1" value="daftar1" class="btn btn-default">Update</button>
                                      <?php } else { ?>

                                        <div class="panel panel-primary" data-sortable-id="form-plugins-1">
                                          <!-- begin panel-heading -->

                                          <!-- end panel-heading -->
                                          <!-- begin panel-body -->
                                          <div class="panel-body panel-form">
                                            <div class="container"><br>
                                                 <div class="form-group">
                                     <div class="col-sm-4">
                                       <input type="text" class="form-control" id="nama" name="nama2" placeholder="Activity Name">
                                     </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-6 control-label">Type of Activity</label>
                                      <div class="col-sm-2">
                                        <select class="form-control" id="type" name="type2">                                        
                                          <option value="Call">Call</option>
                                          <option value="Meeting">Meeting</option>
                                          <option value="Task">Task</option>
                                          <option value="Deadline">Deadline</option>
                                          <option value="Email">Email</option>
                                          <option value="Lunch">Lunch</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-6 control-label">Date</label>
                                      <div class="col-sm-4">
                                          <input type="date" class="form-control" id="date_activity2" name="date_activity2">
                                      </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-sm-6 control-label">Duration</label>
                                      <div class="col-sm-2">
                                          <input type="text" class="form-control" id="duration" name="duration2" placeholder="0 hours">
                                      </div>
                                   </div>
                                   <div class="form-group">
                                        <label class="col-sm-6 control-label">Time</label>
                                        <div class="col-sm-2">
                                        <select class="form-control" id="time2" name="time2">
                                          <?php 
                                          for($hours=0; $hours<24; $hours++)
                                          {
                                              for($mins=0; $mins<60; $mins+=30)
                                              { 
                                                  $time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT);
                                                  echo '<option value= "'.$time.'">'.$time.'</option>';
                                              }
                                          }
                                          ?>
                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-6 control-label">Notes</label>
                                      <div class="col-sm-6">
                                          <textarea class="form-control" name="notes2" id="notes2" cols="100" rows="10"></textarea>                                        
                                      </div>
                                  </div>
                                  <div class="form-group">
                                        <label class="col-sm-6 control-label">Deals</label>
                                        <div class="col-sm-6">
                                          <select class="form-control" id="deals" name="deals2">
                                          <?php 
                                            $sql2 = "SELECT * from master_deals";

                                            $hasil2 = $conn->query($sql2);
                                            while($data2 = mysqli_fetch_assoc($hasil2))
                                            {                                                    
                                                echo '<option value="'.$data2['id'].'">'.$data2['name'].'</option>';
                                            }
                                          ?>  
                                        </select>
                                      </div>
                                  </div>  
                                  <div class="form-group">
                                        <label class="col-sm-6 control-label">Contact's Name</label>
                                        <div class="col-sm-6">
                                          <select class="form-control" id="kontak" name="kontak2">
                                          <?php 
                                            $sql3 = "SELECT * from kontak";

                                            $hasil3 = $conn->query($sql3);
                                            while($data3 = mysqli_fetch_assoc($hasil3))
                                            {                                                    
                                                echo '<option value="'.$data3['id'].'">'.$data3['nama'].'</option>';
                                            }
                                          ?>  
                                        </select>
                                      </div>
                                  </div><br>
                                      <div class="row">
                                      <div class="col-sm-8">
                                    <button type="submit" name="daftar" value="daftar" class="btn btn-info btn-xl">Submit</button>
                                  </div>
                                </div>
                                <?php
                              }
                                ?>
                                  <br><br>
                                   </form>
                                  </div>
                                </div>

                                </div>


            <!-- end of content area 2 -->

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">SmartMarbleandBath</a>, All rights reserved.</p>
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
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
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

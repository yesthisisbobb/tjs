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
<!DOCTYPE html>
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
          <li class="breadcrumb-item active">Master Data Customer</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Master Data Customer <a href="master_supplier.php" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-plus"></i></a></h1>

        <table id="data-table-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th width="1%">No</th> -->

              <th class="text-nowrap">Customer Code</th>
              <th class="text-nowrap">Name</th>
                <th class="text-nowrap">Status</th>
              <th class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
              $sql = "SELECT * FROM customerp ORDER BY id";
                   $query = mysqli_query($conn, $sql);
                   while($amku = mysqli_fetch_array($query)){
              ?>
            <tr class="odd gradeX">


              <td><?=$amku["kode"];?></td>
              <td><?=$amku["nama"];?></td>
              <td><?=$amku["status"];?></td>
              <td class="with-btn" nowrap="">

                <a href="master_supplier.php?aksi=view&no=<?php echo $amku["id"]; ?>" class="btn btn-primary btn btn-sm" role="button"><i class="fa fa-pencil-alt"></i></a>
                <!-- <a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil-alt"></i></a> -->

                  <a href="proses-supplier.php?aksi=update&no=<?php echo $amku["id"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-minus"></i></a>
                  <a href="proses-supplier.php?aksi=active&no=<?php echo $amku["id"]; ?>" class="btn btn-success btn btn-sm" role="button"><i class="fa fa-check"></i></a>
                <a href="proses-supplier.php?aksi=delete&no=<?php echo $amku["id"]; ?>" class="btn btn-danger btn btn-sm" role="button"><i class="fa fa-trash"></i></a>

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


  <form class="form-horizontal" method="post" action="proses-supplier.php">
                              <?php
                              $aksi=$_GET['aksi'];
                              if ($aksi=="view")
                              {
                                $nomerku=$_GET['no'];
                                $sql = "SELECT * FROM master_supplier where id='$nomerku'";
                                     $query = mysqli_query($conn, $sql);
                                     while($amku = mysqli_fetch_array($query)){
                                       $kodep=$amku['kode'];
                                       $namap=$amku['nama'];
                                       $alamat=$amku['alamat'];
                                       $telpon=$amku['telpon'];
                                      $pic=$amku['pic'];
                                      $email=$amku['email'];
                                      $kota=$amku['kota'];
                                      $negara=$amku['negara'];
                                      $kur1=$amku['kur1'];
                                      $kur2=$amku['kur2'];
                                      $kur3=$amku['kur3'];
                                      $cl=$amku['cl'];
                                      $top=$amku['top'];

                                       $nom=$amku['id'];
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
                                             <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Finance</a>
                                           </li>

                                         </ul>
                                         <div class="tab-content" id="myTabContent">
                                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                             <div class="form-group">
                                               <label class="col-sm-10 control-label">Supplier Code</label>
                                               <div class="col-sm-2">
                                                 <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodep; ?>">
                                               </div>
                                             </div>
                                               <div class="form-group">
                                                <label class="col-sm-6 control-label">Supplier Name</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $namap; ?>">
                                              </div>
                                              </div>
                                              <div class="form-group">
                                                 <label class="col-sm-6 control-label">PIC</label>
                                               <div class="col-sm-6">
                                               <input type="text" class="form-control" id="pic" name="pic" value="<?php echo $pic; ?>">
                                              </div>
                                              </div>
                                              <div class="form-group">
                                               <label class="col-sm-6 control-label">Address</label>
                                               <div class="col-sm-12">
                                               <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
                                             </div>
                                             </div>
                                             <div class="form-group">
                                              <label class="col-sm-6 control-label">Telephone</label>
                                              <div class="col-sm-12">
                                              <input type="text" class="form-control" id="telpon" name="telpon" value="<?php echo $telpon; ?>">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                             <label class="col-sm-6 control-label">Email</label>
                                             <div class="col-sm-12">
                                             <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                           </div>
                                           </div>

                                             <div class="form-group">
                                              <label class="col-sm-6 control-label">City</label>
                                              <div class="col-sm-6">
                                              <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $kota; ?>">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                             <label class="col-sm-6 control-label">Country</label>
                                             <div class="col-sm-6">
                                               <select name="negara" id="negara" class="form-control">
           <option value="<?php echo $negara; ?>"><?php echo $negara; ?></option>
           <option value="AF">Afghanistan</option>
         	<option value="AX">Åland Islands</option>
         	<option value="AL">Albania</option>
         	<option value="DZ">Algeria</option>
         	<option value="AS">American Samoa</option>
         	<option value="AD">Andorra</option>
         	<option value="AO">Angola</option>
         	<option value="AI">Anguilla</option>
         	<option value="AQ">Antarctica</option>
         	<option value="AG">Antigua and Barbuda</option>
         	<option value="AR">Argentina</option>
         	<option value="AM">Armenia</option>
         	<option value="AW">Aruba</option>
         	<option value="AU">Australia</option>
         	<option value="AT">Austria</option>
         	<option value="AZ">Azerbaijan</option>
         	<option value="BS">Bahamas</option>
         	<option value="BH">Bahrain</option>
         	<option value="BD">Bangladesh</option>
         	<option value="BB">Barbados</option>
         	<option value="BY">Belarus</option>
         	<option value="BE">Belgium</option>
         	<option value="BZ">Belize</option>
         	<option value="BJ">Benin</option>
         	<option value="BM">Bermuda</option>
         	<option value="BT">Bhutan</option>
         	<option value="BO">Bolivia, Plurinational State of</option>
         	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
         	<option value="BA">Bosnia and Herzegovina</option>
         	<option value="BW">Botswana</option>
         	<option value="BV">Bouvet Island</option>
         	<option value="BR">Brazil</option>
         	<option value="IO">British Indian Ocean Territory</option>
         	<option value="BN">Brunei Darussalam</option>
         	<option value="BG">Bulgaria</option>
         	<option value="BF">Burkina Faso</option>
         	<option value="BI">Burundi</option>
         	<option value="KH">Cambodia</option>
         	<option value="CM">Cameroon</option>
         	<option value="CA">Canada</option>
         	<option value="CV">Cape Verde</option>
         	<option value="KY">Cayman Islands</option>
         	<option value="CF">Central African Republic</option>
         	<option value="TD">Chad</option>
         	<option value="CL">Chile</option>
         	<option value="CN">China</option>
         	<option value="CX">Christmas Island</option>
         	<option value="CC">Cocos (Keeling) Islands</option>
         	<option value="CO">Colombia</option>
         	<option value="KM">Comoros</option>
         	<option value="CG">Congo</option>
         	<option value="CD">Congo, the Democratic Republic of the</option>
         	<option value="CK">Cook Islands</option>
         	<option value="CR">Costa Rica</option>
         	<option value="CI">Côte d'Ivoire</option>
         	<option value="HR">Croatia</option>
         	<option value="CU">Cuba</option>
         	<option value="CW">Curaçao</option>
         	<option value="CY">Cyprus</option>
         	<option value="CZ">Czech Republic</option>
         	<option value="DK">Denmark</option>
         	<option value="DJ">Djibouti</option>
         	<option value="DM">Dominica</option>
         	<option value="DO">Dominican Republic</option>
         	<option value="EC">Ecuador</option>
         	<option value="EG">Egypt</option>
         	<option value="SV">El Salvador</option>
         	<option value="GQ">Equatorial Guinea</option>
         	<option value="ER">Eritrea</option>
         	<option value="EE">Estonia</option>
         	<option value="ET">Ethiopia</option>
         	<option value="FK">Falkland Islands (Malvinas)</option>
         	<option value="FO">Faroe Islands</option>
         	<option value="FJ">Fiji</option>
         	<option value="FI">Finland</option>
         	<option value="FR">France</option>
         	<option value="GF">French Guiana</option>
         	<option value="PF">French Polynesia</option>
         	<option value="TF">French Southern Territories</option>
         	<option value="GA">Gabon</option>
         	<option value="GM">Gambia</option>
         	<option value="GE">Georgia</option>
         	<option value="DE">Germany</option>
         	<option value="GH">Ghana</option>
         	<option value="GI">Gibraltar</option>
         	<option value="GR">Greece</option>
         	<option value="GL">Greenland</option>
         	<option value="GD">Grenada</option>
         	<option value="GP">Guadeloupe</option>
         	<option value="GU">Guam</option>
         	<option value="GT">Guatemala</option>
         	<option value="GG">Guernsey</option>
         	<option value="GN">Guinea</option>
         	<option value="GW">Guinea-Bissau</option>
         	<option value="GY">Guyana</option>
         	<option value="HT">Haiti</option>
         	<option value="HM">Heard Island and McDonald Islands</option>
         	<option value="VA">Holy See (Vatican City State)</option>
         	<option value="HN">Honduras</option>
         	<option value="HK">Hong Kong</option>
         	<option value="HU">Hungary</option>
         	<option value="IS">Iceland</option>
         	<option value="IN">India</option>
         	<option value="ID">Indonesia</option>
         	<option value="IR">Iran, Islamic Republic of</option>
         	<option value="IQ">Iraq</option>
         	<option value="IE">Ireland</option>
         	<option value="IM">Isle of Man</option>
         	<option value="IL">Israel</option>
         	<option value="IT">Italy</option>
         	<option value="JM">Jamaica</option>
         	<option value="JP">Japan</option>
         	<option value="JE">Jersey</option>
         	<option value="JO">Jordan</option>
         	<option value="KZ">Kazakhstan</option>
         	<option value="KE">Kenya</option>
         	<option value="KI">Kiribati</option>
         	<option value="KP">Korea, Democratic People's Republic of</option>
         	<option value="KR">Korea, Republic of</option>
         	<option value="KW">Kuwait</option>
         	<option value="KG">Kyrgyzstan</option>
         	<option value="LA">Lao People's Democratic Republic</option>
         	<option value="LV">Latvia</option>
         	<option value="LB">Lebanon</option>
         	<option value="LS">Lesotho</option>
         	<option value="LR">Liberia</option>
         	<option value="LY">Libya</option>
         	<option value="LI">Liechtenstein</option>
         	<option value="LT">Lithuania</option>
         	<option value="LU">Luxembourg</option>
         	<option value="MO">Macao</option>
         	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
         	<option value="MG">Madagascar</option>
         	<option value="MW">Malawi</option>
         	<option value="MY">Malaysia</option>
         	<option value="MV">Maldives</option>
         	<option value="ML">Mali</option>
         	<option value="MT">Malta</option>
         	<option value="MH">Marshall Islands</option>
         	<option value="MQ">Martinique</option>
         	<option value="MR">Mauritania</option>
         	<option value="MU">Mauritius</option>
         	<option value="YT">Mayotte</option>
         	<option value="MX">Mexico</option>
         	<option value="FM">Micronesia, Federated States of</option>
         	<option value="MD">Moldova, Republic of</option>
         	<option value="MC">Monaco</option>
         	<option value="MN">Mongolia</option>
         	<option value="ME">Montenegro</option>
         	<option value="MS">Montserrat</option>
         	<option value="MA">Morocco</option>
         	<option value="MZ">Mozambique</option>
         	<option value="MM">Myanmar</option>
         	<option value="NA">Namibia</option>
         	<option value="NR">Nauru</option>
         	<option value="NP">Nepal</option>
         	<option value="NL">Netherlands</option>
         	<option value="NC">New Caledonia</option>
         	<option value="NZ">New Zealand</option>
         	<option value="NI">Nicaragua</option>
         	<option value="NE">Niger</option>
         	<option value="NG">Nigeria</option>
         	<option value="NU">Niue</option>
         	<option value="NF">Norfolk Island</option>
         	<option value="MP">Northern Mariana Islands</option>
         	<option value="NO">Norway</option>
         	<option value="OM">Oman</option>
         	<option value="PK">Pakistan</option>
         	<option value="PW">Palau</option>
         	<option value="PS">Palestinian Territory, Occupied</option>
         	<option value="PA">Panama</option>
         	<option value="PG">Papua New Guinea</option>
         	<option value="PY">Paraguay</option>
         	<option value="PE">Peru</option>
         	<option value="PH">Philippines</option>
         	<option value="PN">Pitcairn</option>
         	<option value="PL">Poland</option>
         	<option value="PT">Portugal</option>
         	<option value="PR">Puerto Rico</option>
         	<option value="QA">Qatar</option>
         	<option value="RE">Réunion</option>
         	<option value="RO">Romania</option>
         	<option value="RU">Russian Federation</option>
         	<option value="RW">Rwanda</option>
         	<option value="BL">Saint Barthélemy</option>
         	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
         	<option value="KN">Saint Kitts and Nevis</option>
         	<option value="LC">Saint Lucia</option>
         	<option value="MF">Saint Martin (French part)</option>
         	<option value="PM">Saint Pierre and Miquelon</option>
         	<option value="VC">Saint Vincent and the Grenadines</option>
         	<option value="WS">Samoa</option>
         	<option value="SM">San Marino</option>
         	<option value="ST">Sao Tome and Principe</option>
         	<option value="SA">Saudi Arabia</option>
         	<option value="SN">Senegal</option>
         	<option value="RS">Serbia</option>
         	<option value="SC">Seychelles</option>
         	<option value="SL">Sierra Leone</option>
         	<option value="SG">Singapore</option>
         	<option value="SX">Sint Maarten (Dutch part)</option>
         	<option value="SK">Slovakia</option>
         	<option value="SI">Slovenia</option>
         	<option value="SB">Solomon Islands</option>
         	<option value="SO">Somalia</option>
         	<option value="ZA">South Africa</option>
         	<option value="GS">South Georgia and the South Sandwich Islands</option>
         	<option value="SS">South Sudan</option>
         	<option value="ES">Spain</option>
         	<option value="LK">Sri Lanka</option>
         	<option value="SD">Sudan</option>
         	<option value="SR">Suriname</option>
         	<option value="SJ">Svalbard and Jan Mayen</option>
         	<option value="SZ">Swaziland</option>
         	<option value="SE">Sweden</option>
         	<option value="CH">Switzerland</option>
         	<option value="SY">Syrian Arab Republic</option>
         	<option value="TW">Taiwan, Province of China</option>
         	<option value="TJ">Tajikistan</option>
         	<option value="TZ">Tanzania, United Republic of</option>
         	<option value="TH">Thailand</option>
         	<option value="TL">Timor-Leste</option>
         	<option value="TG">Togo</option>
         	<option value="TK">Tokelau</option>
         	<option value="TO">Tonga</option>
         	<option value="TT">Trinidad and Tobago</option>
         	<option value="TN">Tunisia</option>
         	<option value="TR">Turkey</option>
         	<option value="TM">Turkmenistan</option>
         	<option value="TC">Turks and Caicos Islands</option>
         	<option value="TV">Tuvalu</option>
         	<option value="UG">Uganda</option>
         	<option value="UA">Ukraine</option>
         	<option value="AE">United Arab Emirates</option>
         	<option value="GB">United Kingdom</option>
         	<option value="US">United States</option>
         	<option value="UM">United States Minor Outlying Islands</option>
         	<option value="UY">Uruguay</option>
         	<option value="UZ">Uzbekistan</option>
         	<option value="VU">Vanuatu</option>
         	<option value="VE">Venezuela, Bolivarian Republic of</option>
         	<option value="VN">Viet Nam</option>
         	<option value="VG">Virgin Islands, British</option>
         	<option value="VI">Virgin Islands, U.S.</option>
         	<option value="WF">Wallis and Futuna</option>
         	<option value="EH">Western Sahara</option>
         	<option value="YE">Yemen</option>
         	<option value="ZM">Zambia</option>
         	<option value="ZW">Zimbabwe</option>
           </select>

                                            </div>
                                            </div>


                                             </div>
                                           <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                             <div class="form-group">
                                               <label class="col-sm-10 control-label">Currency #1</label>
                                               <div class="col-sm-2">
                                                 <input type="text" class="form-control" id="kur1" name="kur1"  value="<?php echo $kur1; ?>">
                                               </div>
                                             </div>
                                               <div class="form-group">
                                                <label class="col-sm-6 control-label">Currency #2</label>
                                                <div class="col-sm-2">
                                                <input type="text" class="form-control" id="kur2" name="kur2" value="<?php echo $kur2; ?>">
                                              </div>
                                              </div>
                                              <div class="form-group">
                                               <label class="col-sm-6 control-label">Currency #3</label>
                                               <div class="col-sm-2">
                                               <input type="text" class="form-control" id="kur3" name="kur3" value="<?php echo $kur3; ?>">
                                             </div>
                                             </div>
                                             <div class="form-group">
                                              <label class="col-sm-6 control-label">Credit Limit</label>
                                              <div class="col-sm-4">
                                              <input type="text" class="form-control" id="cl" name="cl" value="<?php echo $cl; ?>">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                             <label class="col-sm-6 control-label">TOP</label>
                                             <div class="col-sm-4">
                                             <input type="text" class="form-control" id="top" name="top" value="<?php echo $top; ?>">
                                            </div>
                                            </div>
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
                                  <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Finance</a>
                                  </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div class="form-group">
                                      <label class="col-sm-10 control-label">Supplier Code</label>
                                      <div class="col-sm-2">
                                        <input type="text" class="form-control" id="kode" name="kode">
                                      </div>
                                    </div>
                                      <div class="form-group">
                                       <label class="col-sm-6 control-label">Supplier Name</label>
                                       <div class="col-sm-12">
                                       <input type="text" class="form-control" id="nama" name="nama">
                                     </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-sm-6 control-label">PIC</label>
                                      <div class="col-sm-6">
                                      <input type="text" class="form-control" id="pic" name="pic">
                                     </div>
                                     </div>
                                     <div class="form-group">
                                      <label class="col-sm-6 control-label">Address</label>
                                      <div class="col-sm-12">
                                      <input type="text" class="form-control" id="alamat" name="alamat">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                     <label class="col-sm-6 control-label">Telephone</label>
                                     <div class="col-sm-12">
                                     <input type="text" class="form-control" id="telpon" name="telpon">
                                   </div>
                                   </div>
                                   <div class="form-group">
                                    <label class="col-sm-6 control-label">Email</label>
                                    <div class="col-sm-12">
                                    <input type="text" class="form-control" id="email" name="email">
                                  </div>
                                  </div>

                                    <div class="form-group">
                                     <label class="col-sm-6 control-label">City</label>
                                     <div class="col-sm-6">
                                     <input type="text" class="form-control" id="kota" name="kota">
                                   </div>
                                   </div>
                                   <div class="form-group">
                                    <label class="col-sm-6 control-label">Country</label>
                                    <div class="col-sm-6">
                                      <select name="negara" id="negara" class="form-control">
  <option value="">Please select</option>
  <option value="AF">Afghanistan</option>
	<option value="AX">Åland Islands</option>
	<option value="AL">Albania</option>
	<option value="DZ">Algeria</option>
	<option value="AS">American Samoa</option>
	<option value="AD">Andorra</option>
	<option value="AO">Angola</option>
	<option value="AI">Anguilla</option>
	<option value="AQ">Antarctica</option>
	<option value="AG">Antigua and Barbuda</option>
	<option value="AR">Argentina</option>
	<option value="AM">Armenia</option>
	<option value="AW">Aruba</option>
	<option value="AU">Australia</option>
	<option value="AT">Austria</option>
	<option value="AZ">Azerbaijan</option>
	<option value="BS">Bahamas</option>
	<option value="BH">Bahrain</option>
	<option value="BD">Bangladesh</option>
	<option value="BB">Barbados</option>
	<option value="BY">Belarus</option>
	<option value="BE">Belgium</option>
	<option value="BZ">Belize</option>
	<option value="BJ">Benin</option>
	<option value="BM">Bermuda</option>
	<option value="BT">Bhutan</option>
	<option value="BO">Bolivia, Plurinational State of</option>
	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
	<option value="BA">Bosnia and Herzegovina</option>
	<option value="BW">Botswana</option>
	<option value="BV">Bouvet Island</option>
	<option value="BR">Brazil</option>
	<option value="IO">British Indian Ocean Territory</option>
	<option value="BN">Brunei Darussalam</option>
	<option value="BG">Bulgaria</option>
	<option value="BF">Burkina Faso</option>
	<option value="BI">Burundi</option>
	<option value="KH">Cambodia</option>
	<option value="CM">Cameroon</option>
	<option value="CA">Canada</option>
	<option value="CV">Cape Verde</option>
	<option value="KY">Cayman Islands</option>
	<option value="CF">Central African Republic</option>
	<option value="TD">Chad</option>
	<option value="CL">Chile</option>
	<option value="CN">China</option>
	<option value="CX">Christmas Island</option>
	<option value="CC">Cocos (Keeling) Islands</option>
	<option value="CO">Colombia</option>
	<option value="KM">Comoros</option>
	<option value="CG">Congo</option>
	<option value="CD">Congo, the Democratic Republic of the</option>
	<option value="CK">Cook Islands</option>
	<option value="CR">Costa Rica</option>
	<option value="CI">Côte d'Ivoire</option>
	<option value="HR">Croatia</option>
	<option value="CU">Cuba</option>
	<option value="CW">Curaçao</option>
	<option value="CY">Cyprus</option>
	<option value="CZ">Czech Republic</option>
	<option value="DK">Denmark</option>
	<option value="DJ">Djibouti</option>
	<option value="DM">Dominica</option>
	<option value="DO">Dominican Republic</option>
	<option value="EC">Ecuador</option>
	<option value="EG">Egypt</option>
	<option value="SV">El Salvador</option>
	<option value="GQ">Equatorial Guinea</option>
	<option value="ER">Eritrea</option>
	<option value="EE">Estonia</option>
	<option value="ET">Ethiopia</option>
	<option value="FK">Falkland Islands (Malvinas)</option>
	<option value="FO">Faroe Islands</option>
	<option value="FJ">Fiji</option>
	<option value="FI">Finland</option>
	<option value="FR">France</option>
	<option value="GF">French Guiana</option>
	<option value="PF">French Polynesia</option>
	<option value="TF">French Southern Territories</option>
	<option value="GA">Gabon</option>
	<option value="GM">Gambia</option>
	<option value="GE">Georgia</option>
	<option value="DE">Germany</option>
	<option value="GH">Ghana</option>
	<option value="GI">Gibraltar</option>
	<option value="GR">Greece</option>
	<option value="GL">Greenland</option>
	<option value="GD">Grenada</option>
	<option value="GP">Guadeloupe</option>
	<option value="GU">Guam</option>
	<option value="GT">Guatemala</option>
	<option value="GG">Guernsey</option>
	<option value="GN">Guinea</option>
	<option value="GW">Guinea-Bissau</option>
	<option value="GY">Guyana</option>
	<option value="HT">Haiti</option>
	<option value="HM">Heard Island and McDonald Islands</option>
	<option value="VA">Holy See (Vatican City State)</option>
	<option value="HN">Honduras</option>
	<option value="HK">Hong Kong</option>
	<option value="HU">Hungary</option>
	<option value="IS">Iceland</option>
	<option value="IN">India</option>
	<option value="ID">Indonesia</option>
	<option value="IR">Iran, Islamic Republic of</option>
	<option value="IQ">Iraq</option>
	<option value="IE">Ireland</option>
	<option value="IM">Isle of Man</option>
	<option value="IL">Israel</option>
	<option value="IT">Italy</option>
	<option value="JM">Jamaica</option>
	<option value="JP">Japan</option>
	<option value="JE">Jersey</option>
	<option value="JO">Jordan</option>
	<option value="KZ">Kazakhstan</option>
	<option value="KE">Kenya</option>
	<option value="KI">Kiribati</option>
	<option value="KP">Korea, Democratic People's Republic of</option>
	<option value="KR">Korea, Republic of</option>
	<option value="KW">Kuwait</option>
	<option value="KG">Kyrgyzstan</option>
	<option value="LA">Lao People's Democratic Republic</option>
	<option value="LV">Latvia</option>
	<option value="LB">Lebanon</option>
	<option value="LS">Lesotho</option>
	<option value="LR">Liberia</option>
	<option value="LY">Libya</option>
	<option value="LI">Liechtenstein</option>
	<option value="LT">Lithuania</option>
	<option value="LU">Luxembourg</option>
	<option value="MO">Macao</option>
	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
	<option value="MG">Madagascar</option>
	<option value="MW">Malawi</option>
	<option value="MY">Malaysia</option>
	<option value="MV">Maldives</option>
	<option value="ML">Mali</option>
	<option value="MT">Malta</option>
	<option value="MH">Marshall Islands</option>
	<option value="MQ">Martinique</option>
	<option value="MR">Mauritania</option>
	<option value="MU">Mauritius</option>
	<option value="YT">Mayotte</option>
	<option value="MX">Mexico</option>
	<option value="FM">Micronesia, Federated States of</option>
	<option value="MD">Moldova, Republic of</option>
	<option value="MC">Monaco</option>
	<option value="MN">Mongolia</option>
	<option value="ME">Montenegro</option>
	<option value="MS">Montserrat</option>
	<option value="MA">Morocco</option>
	<option value="MZ">Mozambique</option>
	<option value="MM">Myanmar</option>
	<option value="NA">Namibia</option>
	<option value="NR">Nauru</option>
	<option value="NP">Nepal</option>
	<option value="NL">Netherlands</option>
	<option value="NC">New Caledonia</option>
	<option value="NZ">New Zealand</option>
	<option value="NI">Nicaragua</option>
	<option value="NE">Niger</option>
	<option value="NG">Nigeria</option>
	<option value="NU">Niue</option>
	<option value="NF">Norfolk Island</option>
	<option value="MP">Northern Mariana Islands</option>
	<option value="NO">Norway</option>
	<option value="OM">Oman</option>
	<option value="PK">Pakistan</option>
	<option value="PW">Palau</option>
	<option value="PS">Palestinian Territory, Occupied</option>
	<option value="PA">Panama</option>
	<option value="PG">Papua New Guinea</option>
	<option value="PY">Paraguay</option>
	<option value="PE">Peru</option>
	<option value="PH">Philippines</option>
	<option value="PN">Pitcairn</option>
	<option value="PL">Poland</option>
	<option value="PT">Portugal</option>
	<option value="PR">Puerto Rico</option>
	<option value="QA">Qatar</option>
	<option value="RE">Réunion</option>
	<option value="RO">Romania</option>
	<option value="RU">Russian Federation</option>
	<option value="RW">Rwanda</option>
	<option value="BL">Saint Barthélemy</option>
	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="KN">Saint Kitts and Nevis</option>
	<option value="LC">Saint Lucia</option>
	<option value="MF">Saint Martin (French part)</option>
	<option value="PM">Saint Pierre and Miquelon</option>
	<option value="VC">Saint Vincent and the Grenadines</option>
	<option value="WS">Samoa</option>
	<option value="SM">San Marino</option>
	<option value="ST">Sao Tome and Principe</option>
	<option value="SA">Saudi Arabia</option>
	<option value="SN">Senegal</option>
	<option value="RS">Serbia</option>
	<option value="SC">Seychelles</option>
	<option value="SL">Sierra Leone</option>
	<option value="SG">Singapore</option>
	<option value="SX">Sint Maarten (Dutch part)</option>
	<option value="SK">Slovakia</option>
	<option value="SI">Slovenia</option>
	<option value="SB">Solomon Islands</option>
	<option value="SO">Somalia</option>
	<option value="ZA">South Africa</option>
	<option value="GS">South Georgia and the South Sandwich Islands</option>
	<option value="SS">South Sudan</option>
	<option value="ES">Spain</option>
	<option value="LK">Sri Lanka</option>
	<option value="SD">Sudan</option>
	<option value="SR">Suriname</option>
	<option value="SJ">Svalbard and Jan Mayen</option>
	<option value="SZ">Swaziland</option>
	<option value="SE">Sweden</option>
	<option value="CH">Switzerland</option>
	<option value="SY">Syrian Arab Republic</option>
	<option value="TW">Taiwan, Province of China</option>
	<option value="TJ">Tajikistan</option>
	<option value="TZ">Tanzania, United Republic of</option>
	<option value="TH">Thailand</option>
	<option value="TL">Timor-Leste</option>
	<option value="TG">Togo</option>
	<option value="TK">Tokelau</option>
	<option value="TO">Tonga</option>
	<option value="TT">Trinidad and Tobago</option>
	<option value="TN">Tunisia</option>
	<option value="TR">Turkey</option>
	<option value="TM">Turkmenistan</option>
	<option value="TC">Turks and Caicos Islands</option>
	<option value="TV">Tuvalu</option>
	<option value="UG">Uganda</option>
	<option value="UA">Ukraine</option>
	<option value="AE">United Arab Emirates</option>
	<option value="GB">United Kingdom</option>
	<option value="US">United States</option>
	<option value="UM">United States Minor Outlying Islands</option>
	<option value="UY">Uruguay</option>
	<option value="UZ">Uzbekistan</option>
	<option value="VU">Vanuatu</option>
	<option value="VE">Venezuela, Bolivarian Republic of</option>
	<option value="VN">Viet Nam</option>
	<option value="VG">Virgin Islands, British</option>
	<option value="VI">Virgin Islands, U.S.</option>
	<option value="WF">Wallis and Futuna</option>
	<option value="EH">Western Sahara</option>
	<option value="YE">Yemen</option>
	<option value="ZM">Zambia</option>
	<option value="ZW">Zimbabwe</option>

  </select>

                                   </div>
                                   </div>


                                    </div>
                                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="form-group">
                                      <label class="col-sm-10 control-label">Currency #1</label>
                                      <div class="col-sm-2">
                                        <input type="text" class="form-control" id="kur1" name="kur1">
                                      </div>
                                    </div>
                                      <div class="form-group">
                                       <label class="col-sm-6 control-label">Currency #2</label>
                                       <div class="col-sm-2">
                                       <input type="text" class="form-control" id="kur2" name="kur2">
                                     </div>
                                     </div>
                                     <div class="form-group">
                                      <label class="col-sm-6 control-label">Currency #3</label>
                                      <div class="col-sm-2">
                                      <input type="text" class="form-control" id="kur3" name="kur3">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                     <label class="col-sm-6 control-label">Credit Limit</label>
                                     <div class="col-sm-4">
                                     <input type="text" class="form-control" id="cl" name="cl" >
                                   </div>
                                   </div>
                                   <div class="form-group">
                                    <label class="col-sm-6 control-label">TOP</label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="top" name="top">
                                   </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="col-sm-10 control-label">Status</label>
                                       <div class="col-sm-2">
                                         <select class="form-control" id="status" name="status">
                                           <option>Active</option>
                                           <option>InActive</option>
                                       </select>
                                     </div>
                                     <br>
                                     <button type="submit" name="daftar" value="daftar" class="btn btn-default">Submit</button>
                                     </div>
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

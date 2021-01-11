<?php
session_start();
if(isset($_SESSION["level"])){
header('Location: ./'.$_SESSION["level"].'/');
}
include("config.php"); //include koneksi database
include("proses.php"); //include proses untuk merespon dari masing-masing action
?>
<?php
include("header.php");
?>
<style>
.button3 {border-radius: 18px;}
</style>
<body class="pace-top bg-white">
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
  <div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-with-news-feed">
      <!-- begin news-feed -->
      <div class="news-feed">
        <div class="news-image" style="background-image: url(<?=$base_url;?>/assets/img/login-bg/back1.jpg)"></div>
        <div class="news-caption">
          <div class="icon-img m-b-15">
            <!-- <a href="<?=$base_url;?>/index.php"><img src="<?=$base_url;?>/assets/img/logo/25.jpg" width="200" height="75" alt="Ventura Ver. 2" /></a> -->
          </div>
          <h4 class="caption-title"><b>SmartMarble&Bath</b>.com</h4>
          <p>
            Administrator Module
          </p>
        </div>
      </div>
      <!-- end news-feed -->
      <!-- begin right-content -->
      <div class="right-content">
        <!-- begin login-header -->
        <div class="login-header">
          <div class="icon-img text-center m-b-30">
            <a href="<?=$base_url;?>/index.php"><img src="<?=$base_url;?>/assets/img/logo/25.jpg" width="375" height="55" alt="" /></a>
          </div>
          <hr />
          <div class="brand">
            LOGIN
            <small>log in to your account</small>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
        </div>
        <!-- end login-header -->
        <!-- begin login-content -->
        <div class="login-content">
          <form action="" method="post" class="margin-bottom-0">
            <div class="form-group m-b-15">
              <input type="text" name="username" class=" button3 form-control form-control-lg" placeholder="Username" required />
            </div>
            <div class="form-group m-b-15">
              <input type="password" name="password" class="button3 form-control form-control-lg" placeholder="Password" required />
            </div>
            <!-- <div class="form-group m-b-15">
              <input type="text" class="form-control form-control-lg" placeholder="Refferal Code" />
            </div> -->
            <!--             <div class="checkbox checkbox-css m-b-30">
              <input type="checkbox" id="remember_me_checkbox" value="" />
              <label for="remember_me_checkbox">
                Remember Me
              </label>
            </div> -->
            <div class="login-buttons">
              <button type="submit" name="login" class="button3 btn btn-info btn-block btn-lg">LOG IN</button>
            </div>
            <div class="m-t-20 m-b-10 p-b-10 text-inverse">
              Not a member yet? Signup Here
            </div>
            <!-- <div class="form-group m-b-15">
              <a href="../retail/form-daftar-retail.php">Retail </a> | <a href="../toko/form-daftar-detail.php">Toko </a> | <a href="../project/form-daftar-detail.php">Project</a>
            </div> -->
          </form>
        </div>
        <div class="icon-img text-center m-b-30">
          <a href="<?=$base_url;?>/index.php"><img src="<?=$base_url;?>/assets/img/logo/24.jpg" width="425" height="40" alt="" /></a>
        </div>
        <p class="text-center text-grey-darker">
          &copy; 2020 SmartMarble&Bath.com | All Right Reserved.
        </p>
        <!-- end login-content -->
      </div>
      <!-- end right-container -->
    </div>
    <!-- end login -->
  </div>
  <!-- end page container -->
  <?php
  include("footer.php");
  ?>
  <script type="text/javascript">
  function handleSelect(elm)
  {
  window.location = elm.value+".php";
  }
  </script>
</body>
</html>

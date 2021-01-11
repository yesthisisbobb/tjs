<div id="top-bar">
  <div class="container clearfix">
    <div class="row justify-content-between">

      <div class="col-12 col-md-auto">

        <p class="mb-0"><strong>Call:</strong> (6231) 532 45 05 | <strong>Email:</strong> info@smartmarbleandbath.com</p>
      </div>

      <div class="col-12 col-md-auto">

        <!-- Top Links
        ============================================= -->
        <div class="top-links on-click">
          <ul class="top-links-container">
            <!-- <li class="top-links-item"><a href="#">USD</a>
              <ul class="top-links-sub-menu">
                <li class="top-links-item"><a href="#">EUR</a></li>
                <li class="top-links-item"><a href="#">AUD</a></li>
                <li class="top-links-item"><a href="#">GBP</a></li>
              </ul>
            </li> -->
            <!-- <li class="top-links-item"><a href="#">EN</a>
              <ul class="top-links-sub-menu">
                <li class="top-links-item"><a href="#"><img src="images/icons/flags/french.png" alt="French"> FR</a></li>
                <li class="top-links-item"><a href="#"><img src="images/icons/flags/italian.png" alt="Italian"> IT</a></li>
                <li class="top-links-item"><a href="#"><img src="images/icons/flags/german.png" alt="German"> DE</a></li>
              </ul>
            </li> -->
            <?php
            $user=$_SESSION["username"];
            if($user==""){
            ?>
            <li class="top-links-item"><a href="#">Login</a>

              <div class="top-links-section">
                <form id="top-login" method="POST" autocomplete="off" action="cek-login.php">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="email" name="username" id="username" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password"  placeholder="Password" required="">
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                  </div>
                  <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" value="" id="top-login-checkbox">
                    <label class="form-check-label" for="top-login-checkbox">Remember Me</label>
                  </div>
                  <button class="btn btn-danger btn-block" type="submit">Sign in</button>
                  <hr>

                  <a href="register.php#isi" class="btn btn-info btn-block" role="button">Register</a>
                </form>
              </div>
            </li>
          <?php }else {
            ?>
             <span style="padding-right: 10px;" class="blinkme">Now you can shop !!! </span><li class="top-links-item ml-30"><a href="#"><?php echo $user; ?></a>
                <!-- <div class="top-links-section">
                      <p><a href="">Profile</a></p>
                      <p><a href="logout.php">Log Out</a><p>
                </div> -->

                  <ul class="top-links-sub-menu">
                    <!-- <li class="top-links-item"><a href="#">My Profile</a></li>
                    <li class="top-links-item"><a href="#">Transaction History</a></li> -->
                    <li class="top-links-item"><a href="logout.php">Logout</a></li>

                  </ul>
                </li>
              <?php } ?>
          </ul>
        </div><!-- .top-links end -->

      </div>
    </div>

  </div>
</div>

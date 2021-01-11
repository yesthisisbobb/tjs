  <!-- begin #header -->
      <div id="header" class="header navbar-default">
        <!-- begin navbar-header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed navbar-toggle-left" data-click="sidebar-minify">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a href="index.html" class="navbar-brand">
            <div class="icon-img text-center m-b-30">
              <img src="<?=$base_url;?>/assets/img/logo/ventura2_small.png" alt="" />
            </div>
          </a>
        </div>
        <!-- end navbar-header -->

        <!-- begin header-nav -->
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle icon">
              <i class="material-icons">inbox</i>
              <span class="label">1</span>
            </a>
            <ul class="dropdown-menu media-list dropdown-menu-right">
              <li class="dropdown-header">NOTIFICATIONS (1)</li>
              <li class="media">
                <a href="javascript:;">
                  <div class="media-left">
                    <img src="<?=$base_url;?>/assets/img/customer_toko/no_image.jpg" class="media-object" alt="" />
                    <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                  </div>
                  <div class="media-body">
                    <h6 class="media-heading">Customer Name</h6>
                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                    <div class="text-muted f-s-11">25 minutes ago</div>
                  </div>
                </a>
              </li>
              <li class="dropdown-footer text-center">
                <a href="javascript:;">View more</a>
              </li>
            </ul>
          </li>
          <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
              <span class="d-none d-md-inline">Hi, <?=$pengguna["username"];?></span>
              <span class="d-none d-md-inline">( <?=$pengguna["role"];?> )</span>
              <img src="<?=$base_url;?>/assets/img/customer_toko/no_image.jpg" alt="" />
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="javascript:;" class="dropdown-item">Edit Profile</a>
              <a href="javascript:;" class="dropdown-item">Setting</a>
              <div class="dropdown-divider"></div>
              <a href="<?=$base_url;?>/logout.php" class="dropdown-item">Log Out</a>
            </div>
          </li>
        </ul>
        <!-- end header navigation right -->

        <div class="search-form">
          <button class="search-btn" type="submit"><i class="material-icons">search</i></button>
          <input type="text" class="form-control" placeholder="Search Something..." />
          <a href="#" class="close" data-dismiss="navbar-search"><i class="material-icons">close</i></a>
        </div>
      </div>
      <!-- end #header -->

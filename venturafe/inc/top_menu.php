<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Adobe Devanagari, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 20px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
}
</style>
<?php include("inc/config.php");?>



<div class="main-menu">
  <div class="main-menu">

  <nav>
      <ul>


          <?php
          $sql = "SELECT * FROM master_grup";
                 $query = mysqli_query($conn, $sql);
                 while($amku = mysqli_fetch_array($query)){
                   $nama=$amku['nama'];
          ?>
          <li class="angle-shape"><a href="#"><?php echo $nama; ?></a>
            <ul class="submenu">
            <?php
            $sql1 = "SELECT * FROM master_sub_grup where namagrup='$nama'";
                   $query1 = mysqli_query($conn, $sql1);
                   while($amku1 = mysqli_fetch_array($query1)){
                     $nama1=$amku1['nama'];
            ?>
              <li><a class="angle-shape" href="#"><?php echo $nama1; ?></a>
                    
              </li><?php } ?>
  </ul>
</li>
<?php } ?>
</ul>

</nav>

</div>

</div>

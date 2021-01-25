<?php
session_start();
if (!isset($_SESSION['loginId'])) {
    echo '<h4>L O G I N</h4>
            <form id="formLogin">
            <div class="input-container input-border">
                    <i class=" fa fa-envelope icon icon"></i>
                <input autocomplete="username" type="email" class="input-field" required="" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" placeholder="Your e-mail...">
            </div>
            <br>
            <div class="input-container input-border">
                    <i class="fa fa-lock icon"></i>
                <input autocomplete="current-password" type="password" required="" id="password" class="input-field" name="password" placeholder="Your Password...">
                <i class="fa fa-eye toggle-visible" id="icon-toggle" onClick="toggleVisible(1)"></i>
            </div>
           
            <button style="cursor:pointer;background:#6c757d;color:white;border:0px solid white;padding:12px" id="loginBtn" type="button" data-dismiss="modal" name="add-to-cart" class="au-btn loginBtn">
                L O G I N
            </button>
            </form>
            <br>
            <label><a href="my-account.php" id="registerlink" style="color:#20c997">Register Now</a></label>';
} else {
    echo '<h4>'.$_SESSION['username']. '</h4>
   
    <button style="cursor:pointer;background:red;color:white;border:0px solid white;padding:12px" type="button" id="logoutBtn" data-dismiss="modal" name="add-to-cart" class="au-btn logoutBtn">
        L O G O U T
    </button>';
}
?>
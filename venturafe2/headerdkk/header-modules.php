<?php
session_start();

$ALL_TYPE = "all";
$NON_ADMIN_TYPE = "user";
$resp = array();

$allh =     '<ul>
                <li class="menu-item" style="color:#1ABC9C">
                    <a href="index.php">
                        HOME
                    </a>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="index.php#TILE">
                                TILE
                            </a>
                        </li>
                        <li class="">
                            <a href="index.php#SANITARY">
                                SANITARY
                            </a>
                        </li>
                        <li class="">
                            <a href="index.php#FITTING">
                                FITTING
                            </a>
                        </li>
                        <li class="">
                            <a href="index.php#OTHER">
                                OTHER
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="shop.php">
                        PRODUCTS
                    </a>
                </li>
                <li class="menu-item mega-menu">
                    <a href="shop.php">
                        PORTFOLIO
                    </a>
                </li>
                <li class="menu-item">
                    <a href="favorite.php">
                        FAVORITE
                    </a>
                </li>
                <li class="menu-item">
                    <a href="transaction.php?type=all">
                        TRANSACTIONS
                    </a>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="transaction.php?type=all">
                                HISTORY
                            </a>
                        </li>
                        <li class="">
                            <a href="transaction.php?type=paid">
                                PAID
                            </a>
                        </li>
                        <li class="">
                            <a href="transaction.php?type=unpaid">
                                PENDING
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" style="color:#ec3923;">
                        SMB ACADEMY
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                Courses
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>';

$uh =   '<ul>
            <li class="menu-item" style="color:#1ABC9C">
                <a href="index.php">
                    HOME
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="index.php#TILE">
                            TILE
                        </a>
                    </li>
                    <li class="">
                        <a href="index.php#SANITARY">
                            SANITARY
                        </a>
                    </li>
                    <li class="">
                        <a href="index.php#FITTING">
                            FITTING
                        </a>
                    </li>
                    <li class="">
                        <a href="index.php#OTHER">
                            OTHER
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="shop.php">
                    PRODUCTS
                </a>
            </li>
            <li class="menu-item mega-menu">
                <a href="shop.php">
                    PORTFOLIO
                </a>
            </li>
            <li class="menu-item">
                <a href="favorite.php">
                    FAVORITE
                </a>
            </li>
            <li class="menu-item">
                <a href="transaction.php?type=all">
                    TRANSACTIONS
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="transaction.php?type=all">
                            HISTORY
                        </a>
                    </li>
                    <li class="">
                        <a href="transaction.php?type=paid">
                            PAID
                        </a>
                    </li>
                    <li class="">
                        <a href="transaction.php?type=unpaid">
                            PENDING
                        </a>
                    </li>
                </ul>
            </li>
        </ul>';

function mVersion($isLogged, $type){
    $logModule = '<a class="drop-link" href="my-account.php">Log In</a>';
    if (!$isLogged)  $logModule = '<a class="drop-link" href="ajaxLogout.php">Log Out</a>';

    if ($type == $GLOBALS["ALL_TYPE"]) {
        $mallh =    '<ul>
                    <li class="drop">
                        <a class="drop-link" href="index.php">
                            HOME
                        </a>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="shop.php">
                            PRODUCTS
                        </a>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="#OTHER">
                            PORTFOLIO
                        </a>
                    </li>
                    <li class="drop">
                        <a href="favorite.php">
                            FAVORITE
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=all">
                            TRANSACTION HISTORY
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=unpaid">
                            PENDING TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=paid">
                            PAID TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="#" style="color:#ec3923;">
                            SMB ACADEMY
                        </a>
                    </li>
                    <li class="drop">
                        ' . $logModule . '
                    </li>
                </ul>';
        return $mallh;
    }
    else if($type = $GLOBALS["NON_ADMIN_TYPE"]){
        $muh =    '<ul>
                    <li class="drop">
                        <a class="drop-link" href="index.php">
                            HOME
                        </a>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="shop.php">
                            PRODUCTS
                        </a>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="#OTHER">
                            PORTFOLIO
                        </a>
                    </li>
                    <li class="drop">
                        <a href="favorite.php">
                            FAVORITE
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=all">
                            TRANSACTION HISTORY
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=unpaid">
                            PENDING TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=paid">
                            PAID TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        ' . $logModule . '
                    </li>
                </ul>';
        return $muh;
    }
    
}


if (isset($_SESSION['username'])) {
    if (isset($_SESSION['level'])) {
        if ($_SESSION['level'] == "admin") {
            $resp["header"] = $allh;
            $resp["mobile"] = mVersion(true, $ALL_TYPE);
        }
        else{
            $resp["header"] = $uh;
            $resp["mobile"] = mVersion(true, $NON_ADMIN_TYPE);
        }
    }
    else{
        $resp["header"] = $uh;
        $resp["mobile"] = mVersion(true, $NON_ADMIN_TYPE);
    }
}
else{
    $resp["header"] = $uh;
    $resp["mobile"] = mVersion(false, $NON_ADMIN_TYPE);
}

echo json_encode($resp);
?>
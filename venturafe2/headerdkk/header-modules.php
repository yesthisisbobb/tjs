<?php
session_start();

$ALL_TYPE = "all";
$NON_ADMIN_TYPE = "user";

$HOME_LINK = "index.php";
$INDEX_TILE_LINK = "index.php#TILE";
$INDEX_SANITARY_LINK = "index.php#SANITARY";
$INDEX_FITTING_LINK = "index.php#FITTING";
$INDEX_OTHER_LINK = "index.php#OTHER";
$PRODUCTS_LINK = "shop.php";
$FAVORITES_LINK = "favorite.php";
$TRANSACTIONS_ALL_LINK = "transaction.php?type=all";
$TRANSACTIONS_PAID_LINK = "transaction.php?type=paid";
$TRANSACTIONS_UNPAID_LINK = "transaction.php?type=unpaid";
$COMPANY_PROFILE_LINK = "company.php";

$resp = array();

$allh =     '<ul>
                <li class="menu-item" style="color:#1ABC9C">
                    <a href="' . $HOME_LINK . '">
                        HOME
                    </a>
                    <ul class="sub-menu">
                        <li class="home-nav">
                            <a href="' . $INDEX_TILE_LINK . '">
                                TILE
                            </a>
                        </li>
                        <li class="home-nav">
                            <a href="' . $INDEX_SANITARY_LINK . '">
                                SANITARY
                            </a>
                        </li>
                        <li class="home-nav">
                            <a href="' . $INDEX_FITTING_LINK . '">
                                FITTING
                            </a>
                        </li>
                        <li class="home-nav">
                            <a href="' . $INDEX_OTHER_LINK . '">
                                OTHER
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="' . $PRODUCTS_LINK . '">
                        PRODUCTS
                    </a>
                </li>
                <li class="menu-item">
                    <a href="' . $FAVORITES_LINK . '">
                        FAVORITE
                    </a>
                </li>
                <li class="menu-item">
                    <a href="' . $TRANSACTIONS_ALL_LINK . '">
                        TRANSACTIONS
                    </a>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="' . $TRANSACTIONS_ALL_LINK . '">
                                HISTORY
                            </a>
                        </li>
                        <li class="">
                            <a href="' . $TRANSACTIONS_PAID_LINK . '">
                                PAID
                            </a>
                        </li>
                        <li class="">
                            <a href="' . $TRANSACTIONS_UNPAID_LINK . '">
                                PENDING
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item mega-menu">
                    <a href="' . $COMPANY_PROFILE_LINK . '">
                        ABOUT
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="' . $COMPANY_PROFILE_LINK . '">
                                COMPANY PROFILE
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
                                COURSES
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>';

$uh =   '<ul>
            <li class="menu-item" style="color:#1ABC9C">
                <a href="' . $HOME_LINK . '">
                    HOME
                </a>
                <ul class="sub-menu">
                    <li class="home-nav">
                        <a href="' . $INDEX_TILE_LINK . '">
                            TILE
                        </a>
                    </li>
                    <li class="home-nav">
                        <a href="' . $INDEX_SANITARY_LINK . '">
                            SANITARY
                        </a>
                    </li>
                    <li class="home-nav">
                        <a href="' . $INDEX_FITTING_LINK . '">
                            FITTING
                        </a>
                    </li>
                    <li class="home-nav">
                        <a href="' . $INDEX_OTHER_LINK . '">
                            OTHER
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="' . $PRODUCTS_LINK . '">
                    PRODUCTS
                </a>
            </li>
            <li class="menu-item">
                <a href="' . $FAVORITES_LINK . '">
                    FAVORITE
                </a>
            </li>
            <li class="menu-item">
                <a href="' . $TRANSACTIONS_ALL_LINK . '">
                    TRANSACTIONS
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="' . $TRANSACTIONS_ALL_LINK . '">
                            HISTORY
                        </a>
                    </li>
                    <li class="">
                        <a href="' . $TRANSACTIONS_PAID_LINK . '">
                            PAID
                        </a>
                    </li>
                    <li class="">
                        <a href="' . $TRANSACTIONS_UNPAID_LINK . '">
                            PENDING
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item mega-menu">
                <a href="' . $COMPANY_PROFILE_LINK . '">
                    ABOUT
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="' . $COMPANY_PROFILE_LINK . '">
                            COMPANY PROFILE
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
                        <a class="drop-link" href="' . $GLOBALS["HOME_LINK"] . '">
                            HOME
                        </a>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="' . $GLOBALS["PRODUCTS_LINK"] . '">
                            PRODUCTS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="' . $GLOBALS["FAVORITES_LINK"] . '">
                            FAVORITE
                        </a>
                    </li>
                    <li class="drop">
                        <a href="' . $GLOBALS["TRANSACTIONS_ALL_LINK"] . '">
                            TRANSACTION HISTORY
                        </a>
                    </li>
                    <li class="drop">
                        <a href="' . $GLOBALS["TRANSACTIONS_UNPAID_LINK"] . '">
                            PENDING TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="' . $GLOBALS["TRANSACTIONS_PAID_LINK"] . '">
                            PAID TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a id="mallh" class="drop-link" href="' . $GLOBALS["COMPANY_PROFILE_LINK"] . '">
                            ABOUT
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
                        <a class="drop-link" href="' . $GLOBALS["HOME_LINK"] . '">
                            HOME
                        </a>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="' . $GLOBALS["PRODUCTS_LINK"] . '">
                            PRODUCTS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="' . $GLOBALS["FAVORITES_LINK"] . '">
                            FAVORITE
                        </a>
                    </li>
                    <li class="drop">
                        <a href="' . $GLOBALS["TRANSACTIONS_ALL_LINK"] . '">
                            TRANSACTION HISTORY
                        </a>
                    </li>
                    <li class="drop">
                        <a href="' . $GLOBALS["TRANSACTIONS_UNPAID_LINK"] . '">
                            PENDING TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="' . $GLOBALS["TRANSACTIONS_PAID_LINK"] . '">
                            PAID TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a id="muh" class="drop-link" href="' . $GLOBALS["COMPANY_PROFILE_LINK"] . '">
                            ABOUT
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
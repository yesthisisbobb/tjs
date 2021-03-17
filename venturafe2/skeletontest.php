<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include("headerdkk/template-head.php");
    ?>
    <style>
        @keyframes skeleton-load {
            100% {
                transform: translateX(400%);
            }
        }

        #a {
            width: 200px;
            height: 80px;
            background-color: gray;
        }

        #b {
            transform: translateX(-100%);
            width: 70px;
            height: 100%;
            background-image: -moz-linear-gradient(90deg, transparent, rgb(255, 255, 255), transparent);
            background-image: -o-linear-gradient(90deg, transparent, rgb(255, 255, 255), transparent);
            background-image: -webkit-linear-gradient(90deg, transparent, rgb(255, 255, 255), transparent);
            background-image: linear-gradient(90deg, transparent, rgb(255, 255, 255), transparent);
            animation-name: skeleton-load;
            animation-iteration-count: infinite;
            animation-duration: 1s;
        }
    </style>
</head>

<body>
    <div id="a">
        <div id="b"></div>
    </div>

    <section class="featured-hp-1">
        <div class="container">
            <div class="featured-content woocommerce">
                <div class="content-area">
                    <div class="row">
                        <div class="col">
                            <div class="home-product-base-container">
                                <div class="home-product-base" onclick="">
                                    <div class="home-product-top">
                                        <div class="home-product-stock stock-skeleton" style="width:5em;">
                                            <div class="home-skeleton-animation"></div>
                                        </div>
                                        <div class="home-product-image">
                                            <div style="width:100%;height:100%;background-color:#c2c2c2">
                                                <div class="home-skeleton-animation"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="home-product-bottom">
                                        <div class="home-product-interaction" style="background-color:#e8e8e8;">
                                            <div class="home-product-desc">
                                                <span class="home-product-group">
                                                    <div style="width:7.5em;height:.8em;background-color:#bababa;margin-bottom:5px;">
                                                        <div class="home-skeleton-animation"></div>
                                                    </div>
                                                </span>
                                                <span class="home-product-name">
                                                    <div style="width:5.7em;height:1.1em;background-color:#cccccc;margin-bottom:5px;">
                                                        <div class="home-skeleton-animation"></div>
                                                    </div>
                                                </span>
                                                <span class="home-product-price">
                                                    <div style="width:5em;height:.9em;background-color:#d9d9d9">
                                                        <div class="home-skeleton-animation"></div>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="home-product-buy" onclick="">
                                                <img src="resource/cart.svg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
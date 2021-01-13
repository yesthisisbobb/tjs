<div id="normal-cart-container">
    <div class="floating-cart-qty">1</div>
</div>
<div id="indent-cart-container">
    <div class="floating-cart-qty">2</div>
</div>
<div id="floating-cart-list-container">
    <div id="floating-cart-modal">
        <div id="floating-cart-header">Ready Cart</div>
        <div id="floating-cart-list">
            <div class="floating-cart-item-container">
                <div class="floating-cart-item-img">
                    <img src="../img/product/6807.jpg">
                </div>
                <div class="floating-cart-item-desc">
                    <div class="floating-cart-desc-top">Placeholder Item</div>
                    <div class="floating-cart-desc-bot"><span id="">1</span>&nbspx&nbsp<span>Rp. 1.000.000</span></div>
                </div>
                <div class="floating-cart-item-remove"><i class="fas fa-trash-alt"></i></div>
            </div>
        </div>
        <div id="floating-cart-interaction">
            <button id="floating-cart-back" type="button" class="btn btn-outline-black">Back</button>
            <button id="floating-cart-view" type="button" class="btn btn-outline-primary">View Cart</button>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="js/floating-cart.js"></script> -->
<script>
    let fpath = "";
    $("#normal-cart-container").click(function() {
        fpath = "cart.php";
        $("#floating-cart-header").text("Ready Cart");

        // Ngisi item-item normal cart
        $.ajax({
            url: "ajaxCart.php",
            method: "POST",
            dataType: "json",
            data: {
                "tipe": "normal"
            },
            success: function(data) {
                $("#floating-cart-list").html(data.mobile);
            }
        });

        $("#floating-cart-list-container").css({
            "background-color": "rgba(0, 0, 0, .25)",
            "visibility": "visible"
        });
        $("#floating-cart-modal").css("transform", "translateY(0)");
    });
    $("#indent-cart-container").click(function() {
        fpath = "indent.php";
        $("#floating-cart-header").text("Indent Cart");

        // Ngisi item-item indent cart
        $.ajax({
            url: "ajaxCart.php",
            method: "POST",
            dataType: "json",
            data: {
                "tipe": "indent"
            },
            success: function(data) {
                $("#floating-cart-list").html(data.mobile);
            }
        });

        $("#floating-cart-list-container").css({
            "background-color": "rgba(0, 0, 0, .25)",
            "visibility": "visible"
        });
        $("#floating-cart-modal").css("transform", "translateY(0)");
    });
    $("#floating-cart-back").click(function() {
        $("#floating-cart-list-container").css({
            "background-color": "transparent",
            "visibility": "hidden"
        });
        $("#floating-cart-modal").css("transform", "translateY(200vh)");
    });
    $("#floating-cart-view").click(function() {
        window.location.href = fpath;
    });
</script>
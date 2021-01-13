$("#normal-cart-container").click(function () {
    $("#floating-cart-list-container").css({
        "background-color": "rgba(0, 0, 0, .25)",
        "visibility": "visible"
    });
    $("#floating-cart-modal").css("transform", "translateY(0)");
});
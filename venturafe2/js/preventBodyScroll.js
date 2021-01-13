function preventBodyScroll() {
    $('body').addClass('stop-scrolling');
    $('body').bind('touchmove', function (e) {
        e.preventDefault()
    });
}

function allowBodyScroll() {
    $('body').removeClass('stop-scrolling');
    $('body').unbind('touchmove');
}
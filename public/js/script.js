$(window).scroll(function () {
    var navbar = $(".navbar");

    if ($(window).scrollTop() > 0) {
        navbar.addClass("shadow-sm");
    } else {
        navbar.removeClass("shadow-sm");
    }
});

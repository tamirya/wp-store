(function ($) {
    $(document).ready(function () {
        console.log('app js ready');
        $(window).resize(function () {
            onWidthEvent();
        });
        onWidthEvent();

        function onWidthEvent() {
            if ($(window).width() <= 800) {
                // is mobile device
                $(window).unbind('scroll');
                $('#navbar').removeClass('fixed-top');
                document.getElementById("nav-holder").style.height = "0";
            } else {
                $('#navbar').addClass('fixed-top');
                document.getElementById("nav-holder").style.height = "128px";
                window.onscroll = function () {
                    scrollFunction();
                };
                scrollFunction();
            }
        }

        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.height = "65px";
                document.getElementById("logo-desktop").style.display = "none";
                document.getElementById("logo-mobile").style.display = "block";
                document.getElementById("logo-mobile").style.width = "180px";
                document.getElementById("products-items").style.top = "94px";
            } else {
                document.getElementById("navbar").style.height = "128px";
                document.getElementById("logo-desktop").style.display = "block";
                document.getElementById("logo-mobile").style.display = "none";
                document.getElementById("products-items").style.top = "128px";
            }
        }
    });
})(jQuery);
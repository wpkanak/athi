(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        /*========== Responsive Menu  ==========*/
        $('#mobilemenu').slicknav({
            prependTo: '#responsive-menu'
        });
          /*========== scroll to top  ==========*/
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 200) {
                $('.scroll-top').fadeIn(200);
            } else {
                $('.scroll-top').fadeOut(200);
            }
        });
        $('.scroll-top').on('click', function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 1000);
        });
    });
})(jQuery);
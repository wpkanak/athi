(function ($) {
	"use strict";

    jQuery(document).ready(function($){


        $(".embed-responsive iframe").addClass("embed-responsive-item");
        $(".carousel-inner .item:first-child").addClass("active");
        
        $('[data-toggle="tooltip"]').tooltip();


    }); // end 


    jQuery(window).load(function(){

        jQuery(".industry-slide-preloader, .preloader-circle-wrapper").fadeOut(500);
        jQuery(".preloader, .spinner").delay(500).fadeOut(500);

    }); // end


}(jQuery));	
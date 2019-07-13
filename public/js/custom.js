
/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% Free To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDIT US AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */

(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {

            //PRE LOADER SCRIPTS
            $(window).load(function () {
                $("#loader").fadeOut();
                $("#pre-div").delay(1000).fadeOut("slow");
            });

            // SLIDER SCRIPTS
            $('#carousel-slider').carousel({
                interval: 2000 //TIME IN MILLI SECONDS
            })
            //  SCROLL SCRIPT FUNCTION FOR NAVBAR 
            $(function () {
                $('.move-me a').bind('click', function (event) { //just pass move-me in design and start scrolling
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1000, 'easeInOutQuad');
                    event.preventDefault();
                });
            });
                      

            //TESTIMONIAL & SLIDEER SPEED
            $('.carousel').carousel({
                interval: 4000 //TIME IN MILLI SECONDS
            })
            // PRETTYPHOTO FUNCTION 

            $("a.preview").prettyPhoto({
                social_tools: false
            });
            
           
            /*====================================
            WRITE YOUR SCRIPTS HERE
            ======================================*/
        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
        // WOW FUNCTION 
        new WOW().init();
    });

}(jQuery));

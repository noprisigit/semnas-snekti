$(function ($) {
    "use strict";
    var $window = $(window);


    
    //for scroll bottom to top js here
    if ($('.totop').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('.totop').addClass('show');
                } else {
                    $('.totop').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('.totop').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    $window.scroll(function () {
        if ($window.scrollTop()) {
            $("#mainHeader").addClass('stiky');
        } else {
            $("#mainHeader").removeClass('stiky');
        }
        if ($window.scrollTop()) {
            $(".support-bar-area").addClass('hideme');
        } else {
            $(".support-bar-area").removeClass('hideme');
        }
        if ($window.scrollTop()) {
            $(".logo-light").addClass('displatNone');
        } else {
            $(".logo-light").removeClass('displatNone');
        }
        if ($window.scrollTop()) {
            $(".logo-dark").addClass('displatBlock');
        } else {
            $(".logo-dark").removeClass('displatBlock');
        }
    });





    $( document ).ready(function() {

        /**---------------------------------------
         *  Jquery UI event calendar
         * -------------------------------------**/
        var $calenderUi = $('#calendar');
        if($calenderUi.length > 0){
            $calenderUi.datepicker();
        }
       
        /*---------------------------------------------------
            Portfolio Filter
        ----------------------------------------------------*/

        var Container = $('.container');

        Container.imagesLoaded(function () {
            var portfolio = $('.portfolio-menu');
            portfolio.on('click', 'button', function () {
                $(this).addClass('active').siblings().removeClass('active');
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });

            var $grid = $('.portfolio-grid').isotope({
                itemSelector: '.grid-item'
            });

            $(document).on('click', '.portfolio-menu ul li', function () {

                var filterValue = $(this).attr('data-filter');

                portfolio.isotope({
                    filter: filterValue
                });

            });

        });


        /*---------------------------------------------------
            Venuse  Slider
        ----------------------------------------------------*/
        var $VenuseSlider = $('.venues_slider');

        $VenuseSlider.owlCarousel({
            loop: true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            nav: true,
            dots: false,
            autoplay: true,
            margin: 18,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                650: {
                    items: 2,
                    nav: false
                },
                768: {
                    items: 2,
                    nav: false
                },
                991: {
                    items: 2,
                    nav: false
                },
                1200: {
                    items: 3,
                    nav: false
                },
                1350: {
                    items: 3,
                    nav: false
                },
                1400: {
                    items: 3,
                    nav: true
                },
                1920: {
                    items: 3,
                    nav: true
                }
            }
        });

        /*---------------------------------------------------
            Main Slider
        ----------------------------------------------------*/
        var $mainSlider = $('.silder');

        $mainSlider.owlCarousel({
            loop: true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            nav: true,
            dots: false,
            autoplay: false, 
            autoplayTimeout: 5000,
            animateOut: 'slideOutLeft',
            animateIn: 'fadeIn',
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 1,
                    nav: false,
                },
                960: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        });


        /*---------------------------------------------------
            Testimonial One Carousel
        ----------------------------------------------------*/
        var $homeTestimonial = $('#home-testimonial');

        $homeTestimonial.owlCarousel({
            loop: true,
            margin: 20,
            dots: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                650: {
                    items: 2
                },
                768: {
                    items: 2
                },
                991: {
                    items: 2
                },
                1200: {
                    items: 3
                },
                1920: {
                    items: 3
                }
            }
        });


        /*---------------------------------------------------
            Partner Carousel
        ----------------------------------------------------*/
        var $partnerCarousel = $('.partner');

        $partnerCarousel.owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 6
                },
                1920: {
                    items: 5
                }
            }
        });
        /*---------------------------------------------------
            Team member Carousel
        ----------------------------------------------------*/
        var $teamCarousel = $('#team-carousel');

        $teamCarousel.owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                599: {
                    items: 2
                },
                768: {
                    items: 2
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1920: {
                    items: 4
                }
            }
        });

    
});

 /*---------------------------------------------------
            Venobox Active js
        ----------------------------------------------------*/
        $('.venobox').venobox();

        
 

    jQuery(window).load(function () {

        /*---------------------------------------------------
            Site Preloader
        ----------------------------------------------------*/
        var $sitePreloaderSelector = $('.site-preloader');
        $sitePreloaderSelector.fadeOut(500);


    });



    // coun down Timer
    var myDate = new Date();
    myDate.setDate(myDate.getDate() + 7);
    $("#countdown").countdown(myDate, function (event) {
        $(this).html(
            event.strftime(
                '<div class="timer-wrapper"><div class="time">%D<span class="text">Days</span></div></div><div class="timer-wrapper"><div class="time">%H<span class="text">Hours</span></div></div><div class="timer-wrapper"><div class="time">%M<span class="text">Minutes</span></div></div><div class="timer-wrapper"><div class="time">%S<span class="text">Seconds</span></div></div>'
            )
        );
    });
    // coun down Timer
    var myDate = new Date();
    myDate.setDate(myDate.getDate() + 10);
    $("#countdown2").countdown(myDate, function (event) {
        $(this).html(
            event.strftime(
                '<div class="timer-wrapper"><div class="time">%D<span class="text">Days</span></div></div><div class="timer-wrapper"><div class="time">%H<span class="text">Hours</span></div></div><div class="timer-wrapper"><div class="time">%M<span class="text">Minutes</span></div></div><div class="timer-wrapper"><div class="time">%S<span class="text">Seconds</span></div></div>'
            )
        );
    });
    // coun down Timer
    var myDate = new Date();
    myDate.setDate(myDate.getDate() + 3);
    $("#countdown3").countdown(myDate, function (event) {
        $(this).html(
            event.strftime(
                '<div class="timer-wrapper"><div class="time">%D<span class="text">Days</span></div></div><div class="timer-wrapper"><div class="time">%H<span class="text">Hours</span></div></div><div class="timer-wrapper"><div class="time">%M<span class="text">Minutes</span></div></div><div class="timer-wrapper"><div class="time">%S<span class="text">Seconds</span></div></div>'
            )
        );
    });


}(jQuery));
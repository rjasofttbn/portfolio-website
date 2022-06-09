(function ($) {
    "use strict";

    /*-------------------------------------------------------------------------------
	  Navbar 
	-------------------------------------------------------------------------------*/

    function navbarFixed() {
        if ($(".header_area").length) {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll) {
                    $(".header_area").addClass("navbar_fixed");
                } else {
                    $(".header_area").removeClass("navbar_fixed");
                }
            });
        }
    }
    navbarFixed();

    /*-------------------------------------------------------------------------------
	  mCustomScrollbar js
	-------------------------------------------------------------------------------*/
    $(window).on("load", function () {
        if ($(".mega_menu_two .scroll").length) {
            $(".mega_menu_two .scroll").mCustomScrollbar({
                mouseWheelPixels: 50,
                scrollInertia: 0,
            });
        };
    });

    /*-------------------------------------------------------------------------------
	  WOW js
	-------------------------------------------------------------------------------*/
    function wowAnimation() {
        new WOW({
            offset: 100,
            animateClass: "animated",
            mobile: true,
        }).init();
    }
    wowAnimation();

    /*-------------------------------------------------------------------------------
	  Recent Work Carousel js
	-------------------------------------------------------------------------------*/
        
    $(".recent_work_slider").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000, //2000ms = 2s;
        autoplayHoverPause: true,
        margin: 30
    });

    /*-------------------------------------------------------------------------------
	  pos_slider js
	-------------------------------------------------------------------------------*/
    function posSlider() {
        var posS = $(".pos_slider");
        if (posS.length) {
            posS.owlCarousel({
                loop: true,
                margin: 0,
                items: 1,
                dots: false,
                nav: false,
                autoplay: true,
                slideSpeed: 300,
                mouseDrag: false,
                animateIn: "fadeIn",
                animateOut: "fadeOut",
                responsiveClass: true,
            });
        }
    }
    posSlider();

    /*-------------------------------------------------------------------------------
	  feedback_slider js
	-------------------------------------------------------------------------------*/
    function feedbackSlider() {
        var feedback_slider = $(".feedback_slider");
        if (feedback_slider.length) {
            feedback_slider.owlCarousel({
                loop: true,
                margin: 25,
                items: 3,
                nav: false,
                center: true,
                autoplay: false,
                smartSpeed: 2000,
                stagePadding: 0,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    776: {
                        items: 2,
                        stagePadding: 0,
                    },
                    1199: {
                        items: 3,
                        stagePadding: 0,
                    },
                },
            });
        }
    }
    feedbackSlider();

    /*-------------------------------------------------------------------------------
	  feedback_slider two js
	-------------------------------------------------------------------------------*/
    function feedbackSlider_two() {
        var feedback_sliders = $(".feedback_slider");
        if (feedback_sliders.length) {
            feedback_sliders.owlCarousel({
                loop: true,
                margin: 0,
                items: 2,
                nav: true,
                dots: true,
                autoplay: false,
                smartSpeed: 2000,
                stagePadding: 0,
                responsiveClass: true,
                navText: [
          '<i class="ti-angle-left"></i><i class="ti-angle-right"></i>',
        ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    776: {
                        items: 2,
                    },
                    1199: {
                        items: 2,
                    },
                },
            });
        }
    }
    feedbackSlider_two();

    /*-------------------------------------------------------------------------------
	  fslider_three js
	-------------------------------------------------------------------------------*/
    function feedback2_slider() {
        var feedback2_slider = $(".feedback2_slider");
        if (feedback2_slider.length) {
            feedback2_slider.owlCarousel({
                loop: true,
                margin: 30,
                items: 2,
                nav: false,
                dots: true,
                autoplay: false,
                smartSpeed: 2000,
                stagePadding: 0,
                responsiveClass: true,
                navText: ['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                    },
                    992: {
                        items: 2,
                    },
                },
            });
        }
    }
    feedback2_slider();

    /*-------------------------------------------------------------------------------
	  testimonial_slider js
	-------------------------------------------------------------------------------*/
    function testimonialSlider() {
        var testimonialSlider = $(".testimonial_slider");
        if (testimonialSlider.length) {
            testimonialSlider.owlCarousel({
                loop: true,
                margin: 10,
                items: 1,
                autoplay: true,
                smartSpeed: 2500,
                autoplaySpeed: false,
                responsiveClass: true,
                nav: true,
                dot: true,
                stagePadding: 0,
                navContainer: ".agency_testimonial_info",
                navText: [
          '<i class="ti-angle-left"></i>',
          '<i class="ti-angle-right"></i>',
        ],
            });
        }
    }
    testimonialSlider();
    
    /*-------------------------------------------------------------------------------
      Coverage Slider js
    -------------------------------------------------------------------------------*/
    function coverageSlider() {
        var coverageSlider = $(".coverage_slider");
        if (coverageSlider.length) {
            coverageSlider.owlCarousel({
                loop: true,
                margin: 25,
                items: 3,
//                autoplay: true,
                smartSpeed: 1000,
                responsiveClass: true,
                nav: true,
                navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    650: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    }
    coverageSlider();

    /*-------------------------------------------------------------------------------
	  digital Slider js
	-------------------------------------------------------------------------------*/
    function digitalSlider() {
        var digitalslider = $(".digital_slider");
        if (digitalslider.length) {
            digitalslider.owlCarousel({
                loop: true,
                margin: 25,
                items: 3,
                autoplay: true,
                smartSpeed: 1000,
                responsiveClass: true,
                nav: true,
                navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    650: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        }
    }
    digitalSlider();

    /*-------------------------------------------------------------------------------
	  case_studies_slider js
	-------------------------------------------------------------------------------*/
    function caseStudies() {
        var CSlider = $(".case_studies_slider");
        if (CSlider.length) {
            CSlider.owlCarousel({
                loop: true,
                margin: 25,
                items: 3,
//                autoplay: true,
                smartSpeed: 1000,
                responsiveClass: true,
                nav: true,
                navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    650: {
                        items: 2,
                    },
                    776: {
                        items: 3,
                    },
                    1200: {
                        items: 4,
                    },
                },
            });
        }
    }
    caseStudies();    
    
    /*-------------------------------------------------------------------------------
	  Fortune Slider js
	-------------------------------------------------------------------------------*/
    function fortuneSlider() {
        var fortuneSlider = $(".fortune_slider");
        if (fortuneSlider.length) {
            fortuneSlider.owlCarousel({
                loop: true,
                margin: 25,
                items: 3,
                autoplay: true,
                smartSpeed: 1000,
                responsiveClass: true,
                nav: false,
                navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                dots: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    650: {
                        items: 2,
                    },
                    776: {
                        items: 3,
                    },
                    1200: {
                        items: 4,
                    },
                },
            });
        }
    }
    fortuneSlider();
    
    /*-------------------------------------------------------------------------------
	  Therapy Slider js
	-------------------------------------------------------------------------------*/
    function therapySlider() {
        var therapySlider = $(".therapy_slider");
        if (therapySlider.length) {
            therapySlider.owlCarousel({
                loop: true,
                margin: 25,
                items: 1,
                autoplay: true,
                smartSpeed: 1000,
                responsiveClass: true,
                nav: false,
                navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
                dots: true,
            });
        }
    }
    therapySlider();

    /*-------------------------------------------------------------------------------
	  Digital Video slider js
	-------------------------------------------------------------------------------*/
    function videoslider() {
        var dSlider = $(".digital_video_slider");
        if (dSlider.length) {
            dSlider.owlCarousel({
                loop: true,
                margin: 30,
                items: 1,
                center: true,
                autoplay: true,
                smartSpeed: 1000,
                stagePadding: 200,
                responsiveClass: true,
                nav: false,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 0,
                    },
                    575: {
                        items: 1,
                        stagePadding: 100,
                    },
                    768: {
                        items: 1,
                        stagePadding: 40,
                    },
                    992: {
                        items: 1,
                        stagePadding: 100,
                    },
                    1250: {
                        items: 1,
                        stagePadding: 200,
                    },
                },
            });
        }
    }
    videoslider();

    /*-------------------------------------------------------------------------------
	  Saasslider js
	-------------------------------------------------------------------------------*/
    function Saasslider() {
        var SSlider = $(".saas_banner_area_three");
        if (SSlider.length) {
            SSlider.owlCarousel({
                loop: true,
                margin: 30,
                items: 1,
                animateOut: "fadeOut",
                autoplay: true,
                smartSpeed: 1000,
                responsiveClass: true,
                nav: false,
                dots: true,
            });
        }
    }
    Saasslider();    
    
    /*-------------------------------------------------------------------------------
	  popup js
	-------------------------------------------------------------------------------*/
    function popupGallery() {
        if ($(".img_popup,.image-link").length) {
            $(".img_popup,.image-link").each(function() {
                $(".img_popup,.image-link").magnificPopup({
                    type: "image",
                    tLoading: "Loading image #%curr%...",
                    removalDelay: 300,
                    mainClass: "mfp-with-zoom mfp-img-mobile",
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1], // Will preload 0 - before current, and 1 after the current image,
                    },
                });
            });
        }
    }
    popupGallery();

    /*-------------------------------------------------------------------------------
	  price tab js
	-------------------------------------------------------------------------------*/
    function tab_hover() {
        var tab = $(".price_tab");
        if ($(window).width() > 450) {
            if ($(tab).length > 0) {
                tab.append('<li class="hover_bg"></li>');
                if ($(".price_tab li a").hasClass("active_hover")) {
                    var pLeft = $(".price_tab li a.active_hover").position().left,
                        pWidth = $(".price_tab li a.active_hover").css("width");
                    $(".hover_bg").css({
                        left: pLeft,
                        width: pWidth,
                    });
                }
                $(".price_tab li a").on("click", function () {
                    $(".price_tab li a").removeClass("active_hover");
                    $(this).addClass("active_hover");
                    var pLeft = $(".price_tab li a.active_hover").position().left,
                        pWidth = $(".price_tab li a.active_hover").css("width");
                    $(".hover_bg").css({
                        left: pLeft,
                        width: pWidth,
                    });
                });
            }
        }
    }
    tab_hover();

    /*-------------------------------------------------------------------------------
	  selectpickers js
	-------------------------------------------------------------------------------*/
    if ($(".selectpickers").length > 0) {
        $(".selectpickers").niceSelect();
    }

    /*-------------------------------------------------------------------------------
	  cart js
	-------------------------------------------------------------------------------*/
    $(".ar_top").on("click", function () {
        var getID = $(this).next().attr("id");
        var result = document.getElementById(getID);
        var qty = result.value;
        $(".proceed_to_checkout .update-cart").removeAttr("disabled");
        if (!isNaN(qty)) {
            result.value++;
        } else {
            return false;
        }
    });

    $(".ar_down").on("click", function () {
        var getID = $(this).prev().attr("id");
        var result = document.getElementById(getID);
        var qty = result.value;
        $(".proceed_to_checkout .update-cart").removeAttr("disabled");
        if (!isNaN(qty) && qty > 0) {
            result.value--;
        } else {
            return false;
        }
    });

    /*-------------------------------------------------------------------------------
	  Portfolio isotope js
	-------------------------------------------------------------------------------*/
    function portfolioMasonry() {
        var portfolio = $("#work-portfolio");
        if (portfolio.length) {
            portfolio.imagesLoaded(function () {
                // images have loaded
                // Activate isotope in container
                portfolio.isotope({
                    // itemSelector: ".portfolio_item",
                    layoutMode: "masonry",
                    filter: "*",
                    animationOptions: {
                        duration: 1000,
                    },
                    transitionDuration: "0.5s",
                    masonry: {},
                });

                // Add isotope click function
                $("#portfolio_filter div").on("click", function () {
                    $("#portfolio_filter div").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    portfolio.isotope({
                        filter: selector,
                        animationOptions: {
                            animationDuration: 750,
                            easing: "linear",
                            queue: false,
                        },
                    });
                    return false;
                });
            });
        }
    }
    portfolioMasonry();

    /*-------------------------------------------------------------------------------
	  blogMasonry js
	-------------------------------------------------------------------------------*/
    function blogMasonry() {
        var blog = $("#blog_masonry");
        if (blog.length) {
            blog.imagesLoaded(function () {
                blog.isotope({
                    layoutMode: "masonry",
                });
            });
        }
    }
    blogMasonry();

    /*-------------------------------------------------------------------------------
	  mapBox js
	-------------------------------------------------------------------------------*/
    if ($("#mapBox").length) {
        var $lat = $("#mapBox").data("lat");
        var $lon = $("#mapBox").data("lon");
        var $zoom = $("#mapBox").data("zoom");
        var $marker = $("#mapBox").data("marker");
        var $info = $("#mapBox").data("info");
        var $markerLat = $("#mapBox").data("mlat");
        var $markerLon = $("#mapBox").data("mlon");
        var map = new GMaps({
            el: "#mapBox",
            lat: $lat,
            lng: $lon,
            scrollwheel: false,
            scaleControl: true,
            streetViewControl: false,
            panControl: true,
            disableDoubleClickZoom: true,
            mapTypeControl: false,
            zoom: $zoom,
        });
        map.addMarker({
            lat: $markerLat,
            lng: $markerLon,
            icon: $marker,
            infoWindow: {
                content: $info,
            },
        });
    }
    
    /*-------------------------------------------------------------------------------
      feedback_slider two js
    -------------------------------------------------------------------------------*/
    function partner_slider() {
        var partner_slider = $(".partner_slider");
        if (partner_slider.length) {
            partner_slider.owlCarousel({
                loop: true,
                margin: 15,
                items: 2,
                nav: true,
                dots: true,
                autoplay: true,
                smartSpeed: 2000,
                stagePadding: 0,
                responsiveClass: true,
                navText: [
                    '<i class="ti-angle-left"></i><i class="ti-angle-right"></i>',
                ],
                responsive: {
                    0: {
                        items: 3,
                    },
                    575: {
                        items: 4,
                    },
                    776: {
                        items: 6,
                    },
                    1199: {
                        items: 8,
                    },
                },
            });
        }
    }
    partner_slider();

    function banner_slider() {
        var banner_slider = $(".banner_slider");
        if (banner_slider.length) {
            banner_slider.owlCarousel({
                loop: true,
                margin: 15,
                items: 1,
                nav: true,
                dots: true,
                autoplay: true,
                smartSpeed: 2000,
                stagePadding: 0,
                responsiveClass: true,
                navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>']
            });
        }
    }
    banner_slider();

    /*-------------------------------------------------------------------------------
      CountDown js activator
    -------------------------------------------------------------------------------*/

    function mobileMenu() {
        // Mobile Menu
        $(".menu-open").on('click',function(){
            $(".sidenav").addClass("active");
        });
        $(".closebtn").on('click',function(){
            $(".sidenav").removeClass("active");
        });
        $(".menu-link").on('click',function(){
            $(this).siblings().toggle();
        });
    }
    mobileMenu();

    $(".vdo-link").YouTubePopUp();

    /*-------------------------------------------------------------------------------
	  Counter js
	-------------------------------------------------------------------------------*/
    function counterUp() {
        if ($(".counter").length) {
            $(".counter").counterUp({
                delay: 1,
                time: 500,
            });
        }
    }

    counterUp();

    /*-------------------------------------------------------------------------------
	  progress bar js
	-------------------------------------------------------------------------------*/
    function circle_progress() {
        if ($(".circle").length) {
            $(".circle").each(function () {
                $(".circle").appear(
                    function () {
                        $(".circle").circleProgress({
                            startAngle: -14.1,
                            size: 200,
                            duration: 9000,
                            easing: "circleProgressEase",
                            emptyFill: "#f1f1fa ",
                            lineCap: "round",
                            thickness: 10,
                        });
                    }, {
                        triggerOnce: true,
                        offset: "bottom-in-view",
                    }
                );
            });
        }
    }
    circle_progress();

    /*-------------------------------------------------------------------------------
	  preloader js
	-------------------------------------------------------------------------------*/
    function loader() {
        $(window).on("load", function () {
            $("#ctn-preloader").addClass("loaded");
            // Una vez haya terminado el preloader aparezca el scroll

            if ($("#ctn-preloader").hasClass("loaded")) {
                // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
                $("#preloader")
                    .delay(900)
                    .queue(function () {
                        $(this).remove();
                    });
            }
        });
    }
    loader();

    /*-------------------------------------------------------------------------------
	  tooltip js
	-------------------------------------------------------------------------------*/
    if ($('[data-toggle="tooltip"]').length) {
        $('[data-toggle="tooltip"]').tooltip();
    }
    /*-------------------------------------------------------------------------------
	  Pricing Filter js
	-------------------------------------------------------------------------------*/
    if ($("#slider-range").length) {
        $("#slider-range").slider({
            range: true,
            min: 5,
            max: 150,
            values: [5, 100],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            },
        });
        $("#amount").val(
            "$" +
            $("#slider-range").slider("values", 0) +
            " - $" +
            $("#slider-range").slider("values", 1)
        );
    }

    /*-------------------------------------------------------------------------------
	  search js
	-------------------------------------------------------------------------------*/
    $(".search-btn").on("click", function () {
        $("body").addClass("open");
        setTimeout(function () {
            $(".search-input").focus();
        }, 500);
        return false;
    });
    $(".close_icon").on("click", function () {
        $("body").removeClass("open");
        return false;
    });

    /*-------------------------------------------------------------------------------
	  develor tab js
	-------------------------------------------------------------------------------*/
    if ($(".develor_tab li a").length > 0) {
        $(".develor_tab li a").click(function () {
            var tab_id = $(this).attr("data-tab");
            $(".tab_img").removeClass("active");
            $("#" + tab_id).addClass("active");
        });
    }

    /*-------------------------------------------------------------------------------
	  alert js
	-------------------------------------------------------------------------------*/
    $(".alert_close").on("click", function (e) {
        $(this).parent().hide();
    });

    /*-------------------------------------------------------------------------------
	  active dropdown
	-------------------------------------------------------------------------------*/
    function active_dropdown() {
        if ($(window).width() < 992) {
            $(".menu li.submenu > a").on("click", function (event) {
                event.preventDefault();
                $(this).parent().find("ul").first().toggle(700);
                $(this).parent().siblings().find("ul").hide(700);
            });
        }
    }
    active_dropdown();

    /*-------------------------------------------------------------------------------
	  Full screen sections 
	-------------------------------------------------------------------------------*/
    if ($(".pagepiling").length > 0) {
        $(".pagepiling").pagepiling({
            scrollingSpeed: 280,
            loopBottom: true,
            // anchors: ['first', 'second', 'third', 'four','five'],
            // menu: '#menu',
            navigation: {
                position: "right_position",
            },
        });
        $.fn.pagepiling.setAllowScrolling(true);
    }

    var heading = $(".typed");
    if (heading.length) {
        heading.typed({
            strings: ["Startups", "Business", "Agencies"],
            // Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
            stringsElement: null,
            typeSpeed: 100,
            startDelay: 500,
            backSpeed: 100,
            backDelay: 500,
            loop: true,
            showCursor: true,
            cursorChar: "|",
        });
    }

})(jQuery);

(function ($) {
    "use strict";
    var $wn = $(window);
    $wn.on('load', function () {

        /***************
         *  Preloader  *
         ***************/
        var $element = $("#loading");
        $element.fadeOut(1000);

        /****************************
         * Sticky Header  *
         ****************************/
        $wn.on("scroll", function () {
            if ($(this).scrollTop() > 1) {
                $('header').addClass("sticky");
            } else {
                $('header').removeClass("sticky");
            }
        });

        /****************************
         * Menu Icon  *
         ****************************/
        $wn.on('click', '.navbar-toggler', function (e) {
            $(".navbar-toggler").toggleClass("cross");
        });

        /******************************
         *  Language Select dropdown  *
         ******************************/
        function formatState(state) {
            var $state = $('<span><img src="images/' + $.trim(state.text.toLowerCase()) + '.png" class="img-flag" /> ' + state.text + '</span>');
            return $state;
        };

        /****************************
         *  Custom Select dropdown  *
         ****************************/
        var $element = $('#currency_select');
        $element.select2({
            templateResult: formatState,
            templateSelection: formatState,
            minimumResultsForSearch: Infinity
        });
        var $elements = $(".custom_select");
        $elements.select2({
            minimumResultsForSearch: Infinity
        });

        /*************************************
         * Bootstrap Dropdown Menu on hover  *
         *************************************/
        function dropdown() {
            var $viewportWidth = $wn.width();
            var $element = $('ul.nav li.dropdown');
            if ($viewportWidth > 767) {
                $element.hover(function () {
                    $(this)
                        .find('.dropdown-menu')
                        .stop(true, true)
                        .delay(200)
                        .slideDown(300);
                }, function () {
                    $(this)
                        .find('.dropdown-menu')
                        .stop(true, true)
                        .delay(200)
                        .slideUp(300);
                });
            }
        }
        $wn.on('resize', dropdown);
        dropdown();

        /*********************
         *  Banner Carousel  *
         *********************/
        var $element = $('.banner-slider');
        if ($element.length > 0) {
            $element.bxSlider({
                controls: true,
                auto: true,
                mode: 'fade',
                pager: false,
                speed: 800,
            });
        }

        /***********************
         *   Cources Carousel  *
         ***********************/
        var $element = $('.our-cources .owl-carousel');
        if ($element.length > 0) {
            $element.owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                autoplay: true,
                smartSpeed: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 2,
                        margin: 20
                    },

                    768: {
                        items: 3,
                        margin: 20
                    },

                    1024: {
                        items: 4,
                        margin: 0
                    },
                }
            });
        }

        /****************
         *   Couter up  *
         ****************/
        var $element = $('.counter');
        if ($element.length > 0) {
            $element.counterUp({
                delay: 10,
                time: 1000
            });
        }

        /*********************
         *   magnific-popup  *
         *********************/
        var $groups = {};
        var $gallery = $('.galleryItem');
        $gallery.each(function () {
            var id = parseInt($(this).attr('data-group'), 10);
            if (!$groups[id]) {
                $groups[id] = [];
            }
            $groups[id].push(this);
        });
        $.each($groups, function () {
            $(this)
                .magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    gallery: {
                        enabled: true
                    }
                })
        });

        /***************************
         *   Testimonial Carousel  *
         ***************************/
        var $element = $('.testimonial .owl-carousel');
        if ($element.length > 0) {
            $element.owlCarousel({
                loop: true,
                nav: true,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                autoplay: true,
                smartSpeed: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1,
                    },

                    768: {
                        items: 1,
                    },

                    1024: {
                        items: 1,
                    },
                }
            });
        }

        /**********************
         *  Our Doctors Team Carousel  *
         **********************/
        var $element = $('.doctors-team .owl-carousel');
        if ($element.length > 0) {
            $element.owlCarousel({
                loop: true,
                navText: ['', ''],
                autoplay: true,
                smartSpeed: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1,
                    },

                    768: {
                        items: 2,
                    },

                    1024: {
                        items: 3,
                    },

                    1200: {
                        items: 3,
                    },
                }
            });
        }
		
		
		 /**********************
         *  video thumb Carousel  *
         **********************/
        var $element = $('.video-slide .owl-carousel');
        if ($element.length > 0) {
            $element.owlCarousel({
                loop: true,
                navText: ['', ''],
                autoplay: true,
                smartSpeed: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1,
                    },

                    768: {
                        items: 2,
                    },

                    1024: {
                        items: 3,
                    },

                    1200: {
                        items: 3,
                    },
                }
            });
        }
		
		
		
		
		 /**********************
         *  Our Doctors Team Carousel  *
         **********************/
        var $element = $('.our-team .owl-carousel');
        if ($element.length > 0) {
            $element.owlCarousel({
                loop: true,
                navText: ['', ''],
                autoplay: false,
                smartSpeed: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1,
                    },

                    768: {
                        items: 2,
                    },

                    1024: {
                        items: 5,
                    },

                    1200: {
                        items: 5,
                    },
                }
            });
        }
		
		
		

        /***************************************
         * footer menu accordian (@media 767)  *
         ***************************************/
        function footerAcc() {
            var $allFooterAcco = $(".foot-nav > ul");
            var $allFooterAccoItems = $(".foot-nav h3");
            if ($wn.width() < 768) {
                $allFooterAcco.css('display', 'none');
                $allFooterAccoItems.on("click", function () {
                    if ($(this)
                        .hasClass('open')) {
                        $(this)
                            .removeClass('open');
                        $(this)
                            .next()
                            .stop(true, false)
                            .slideUp(300);
                    } else {
                        $allFooterAcco.slideUp(300);
                        $allFooterAccoItems.removeClass('open');
                        $(this)
                            .addClass('open');
                        $(this)
                            .next()
                            .stop(true, false)
                            .slideDown(300);
                        return false;
                    }
                });
            } else {
                $allFooterAcco.css('display', 'block');
                $allFooterAccoItems.off();
            }
        }
        $wn.on('resize', function () {
            footerAcc();
        });
        footerAcc();

        /**********************
         *   Gallery Isotope  *
         **********************/
        var $isotopeContainer = $('.isotopeContainer');
        if ($isotopeContainer.length > 0) {
            $isotopeContainer.isotope({
                itemSelector: '.isotopeSelector'
            });
            $('.isotopeFilters')
                .on('click', 'a', function (e) {
                    $('.isotopeFilters')
                        .find('.active')
                        .removeClass('active');
                    $(this)
                        .parent()
                        .addClass('active');
                    var $filterValue = $(this)
                        .attr('data-filter');
                    $isotopeContainer.isotope({
                        filter: $filterValue
                    });
                    e.preventDefault();
                    return false;
                });
        }

        /**************************
         *   Testimonial Masonry  *
         **************************/
        var $element = $('.testimonials');
        if ($element.length > 0) {
            $element.masonry({
                itemSelector: '.grid-item',
                percentPosition: true,
                autoplay: true,
            });
        }

        /****************************
         *   News & Events Masonry  *
         ****************************/
        var $element = $('.news-listing');
        if ($element.length > 0) {
            $element.masonry({
                itemSelector: '.grid-item',
                percentPosition: true
            });
        }

        /*****************
         *   Datepicker  *
         *****************/
        var $element = $('.datepicker');
        if ($element.length > 0) {
            $element.datepicker()
        }
    });

    /***************************
     *   Scroll to top action  *
     ***************************/
    var $element = $('.scroll-top');

    $wn.on("scroll", function () {
        if ($(this)
            .scrollTop() > 100) {
            $element.fadeIn();
        } else {
            $element.fadeOut();
        }
    });

    $element.on("click", function () {
        var $scrollElement = $("html, body");
        $scrollElement.animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /***************************
     *   Fancybox  *
     ***************************/
    $('.poppup-forms .loginform, .poppup-forms .sign-upform').fancybox({
        prevEffect: 'fade',
        nextEffect: 'fade'
    });


function ajaxLike() {
$('body').append('<div class="owl-carousel"> <div> Your Content </div> <div> Your Content </div> <div> Your Content </div> <div> Your Content </div> <div> Your Content </div> <div> Your Content </div> <div> Your Content </div> </div>');
    ajaxCallback();
}

ajaxLike();

function ajaxCallback() {
  $('.our-team').owlCarousel({
    margin:5,
	navText: ['', ''],
	responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1,
                    },

                    768: {
                        items: 2,
                    },

                    1024: {
                        items: 5,
                    },

                    1200: {
                        items: 5,
                    },
	}
	
	
  });
  
  
  
 $('.video-slide').owlCarousel({
    margin:5,
	navText: ['', ''],
	responsive: {
                    0: {
                        items: 1
                    },

                    480: {
                        items: 1,
                    },

                    768: {
                        items: 2,
                    },

                    1024: {
                        items: 5,
                    },

                    1200: {
                        items: 5,
                    },
	}
	
	
  }); 
  
  
  
}


})(jQuery);
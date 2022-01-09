$(document).ready(function () {

    var search_show = true;
    $(".show_searh").click(function () {
        if (search_show) {
            $(".search_form").fadeIn("15000");
            $(".search_input_box").focus();
            search_show = false;
        } else {
            $(".search_form").fadeOut("15000");
            search_show = true;
        }

    });
    $(".search-close").click(function () {
        $(".search_form").fadeOut("15000");
        search_show = true;
    });

    // sticky-header-----------------//
    $(window).scroll(function () {
        var header_ad_height = $('.ad-below-logo').height();
        var sticky_header_height = 190 + header_ad_height;
        if ($(window).scrollTop() >= sticky_header_height) {
            $('.my-nav1').addClass('fixed-header');
        }
        else {
            $('.my-nav1').removeClass('fixed-header');
        }
    });

    $("#mega-menu-open").click(function () {
        document.getElementById("myNav").style.height = "100%";
    });

    $("#mega-menu-close").click(function () {
        document.getElementById("myNav").style.height = "0%";
    });

    $("#mobile-mega-menu-open").click(function () {
        document.getElementById("mobile-mega-menu").style.height = "100%";
    });

    $("#mobile-mega-menu-close").click(function () {
        document.getElementById("mobile-mega-menu").style.height = "0%";
    });

    


    $("#mobile-just-in-news-open").click(function () {
        document.getElementById("mobile-justin-news-modal").style.display = "block";
    });

    $("#mobile-just-in-news-close").click(function () {
        document.getElementById("mobile-justin-news-modal").style.display = "none";
    });


    $('.worst-read').owlCarousel({
        loop: true,
        lazyLoad : true,
        margin: 15,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        dots: false,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            567: {
                items: 3
            },
            991: {
                items: 4
            },
            1365: {
                items: 4
            },
            1920: {
                items: 4
            }
        }
    });
    // <!--        photo-store-carousel-->
    $('.photo-store').owlCarousel({
        loop: true,
	lazyLoad : true,
        margin: 15,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        dots: false,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            567: {
                items: 3
            },
            991: {
                items: 5
            },
            1365: {
                items: 6
            },
            1920: {
                items: 6
            }
        }
    });
    // <!--  my-video-carousel-->
    $('.my-video-carousel').owlCarousel({
        loop: true,
	lazyLoad : true,
        margin: 15,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        dots: false,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            567: {
                items: 3
            },
            991: {
                items: 5
            },
            1365: {
                items: 6
            },
            1920: {
                items: 6
            }
        }
    });

    $('.worst-read2').owlCarousel({
        loop: true,
        margin: 30,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        dots: false,
        nav: true,
        autoplay: false,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 2
            },
            567: {
                items: 3
            },
            991: {
                items: 3
            },
            1365: {
                items: 3
            },
            1920: {
                items: 3
            }
        }
    });

    // FOR-MOBILE  mobile-video-carousel---------------

    $('.mobile-video-carousel').owlCarousel({
        loop: true,
	lazyLoad : true,
        margin: 5,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        dots: false,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 2
            },
            567: {
                items: 3
            },
            991: {
                items: 5
            },
            1365: {
                items: 6
            },
            1920: {
                items: 6
            }
        }
    });

    // mobile-photo-store-carousel---------------------

    $('.mobile-photo-store').owlCarousel({
        loop: true,
	lazyLoad : true,
        margin: 5,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        dots: false,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 2
            },
            567: {
                items: 3
            },
            991: {
                items: 5
            },
            1365: {
                items: 6
            },
            1920: {
                items: 6
            }
        }
    });

    // init cubeportfolio
     $('#js-grid-masonry').cubeportfolio({
        filters: '#js-filters-masonry',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideDelay',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 4
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 2,
            options: {
                caption: ''
            }
        }, {
            width: 320,
            cols: 2,
            options: {
                caption: ''
            }
        }],
        caption: 'overlayBottomAlong',
        displayType: 'bottomToTop',
        //displayTypeSpeed: 100,
		displayTypeSpeed: 10,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
    });


    var options = {
        filters: '#js-filters-masonry',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideDelay',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 3
        }, {
            width: 1100,
            cols: 3
        }, {
            width: 800,
            cols: 2
        }, {
            width: 480,
            cols: 1,
            options: {
                caption: ''
            }
        }, {
            width: 320,
            cols: 1,
            options: {
                caption: ''
            }
        }],
        caption: 'overlayBottomAlong',
        displayType: 'bottomToTop',
        //displayTypeSpeed: 100,
		displayTypeSpeed: 10,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
    };

    if($(".desktop-view-open").css("display") == 'block')
        $('#desktop-meag-menu-masonry').cubeportfolio(options);
    else
        $('#mobile-meag-menu-masonry').cubeportfolio(options);

        
    
});


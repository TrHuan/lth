jQuery(document).ready(function ($) {
    // $('html, body').animate({ scrollTop: 0 }, 0);

    $('#wpadminbar').parent().addClass('body-admin');

    $(window).on("scroll", function () {
        var hb = $('.header').outerHeight();
        if ($(this).scrollTop() > hb) {
            $('.header-stick').addClass('active');
        } else {
            $('.header-stick').removeClass('active');
        }

        if ($(this).scrollTop() > 0) {
            $('.back-to-top').addClass('active');
        } else {
            $('.back-to-top').removeClass('active');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 400);
    });

    setTimeout(function () {
        var hb = $('.header-stick').outerHeight();
        $('.header').outerHeight(hb);
    }, 2000);

    $(window).resize(function () {
        setTimeout(function () {
            var hb = $('.header-stick').outerHeight();
            $('.header').outerHeight(hb);
        }, 1000);
    });

    //////////////////////////////////////////////////
    $(document).on('click', '.cart-container-list .cart_list .remove', function (e) {
        e.preventDefault();
        setTimeout(function () {
            setTimeout(function () {
                $('.notification-product .remove-product').addClass('active');

                setTimeout(function () {
                    $('.notification-product .remove-product').removeClass('active');
                }, 2000);
            }, 400);
        }, 1000);
    });

    $(document).on('click', '.module_products .ajax_add_to_cart, .product-content-box .single_add_to_cart_button, .product-content-box .ajax_add_to_cart', function () {
        setTimeout(function () {
            setTimeout(function () {
                $('.notification-product .add-product').addClass('active');

                setTimeout(function () {
                    $('.notification-product .add-product').removeClass('active');
                }, 2000);
            }, 400);
        }, 1000);
    });

    $(document).on('click', '.main-products .products-ordering label', function () {
        // $(this).next().slideToggle('slow');
        $(this).parent().toggleClass('show');
    });

    $('.product-tab-box .tab-menu a').click(function (e) {
        e.preventDefault();
        var hs = $(this).parent().hasClass('active');
        if (!hs) {
            $('.product-tab-box .tab-menu li').removeClass('active');
            $(this).parent().addClass('active');
        }

        var data = $(this).attr('data_tab');
        $('.product-tab-box .tab-pane').removeClass('active');
        $('#' + data).addClass('active');
    });

    // $(document).on('click', '.cart-header .cart-btn', function (e) {
    //     e.preventDefault();
    //     $('.cart-content').addClass('active');
    // });

    // $(document).on('click', '.cart-content .cart-close', function () {
    //     $('.cart-content').removeClass('active');
    // });

    //////////////////////////////////////////////////
});

jQuery(document).ready(function ($) {

    if (jQuery().slick) {
        var slick = jQuery(".swiper-slider");
        slick.each(function () {
            var item = jQuery(this).data('item'),
                item_lg = jQuery(this).data('item_lg'),
                item_md = jQuery(this).data('item_md'),
                item_sm = jQuery(this).data('item_sm'),
                item_mb = jQuery(this).data('item_mb'),
                row = jQuery(this).data('row'),
                arrows = jQuery(this).data('arrows'),
                dots = jQuery(this).data('dots'),
                vertical = jQuery(this).data('vertical');
            autoplay = jQuery(this).data('autoplay');
            jQuery(this).slick({
                loop: true,
                autoplay: autoplay,
                infinite: true,
                autoplaySpeed: 2000,
                vertical: vertical,
                rows: row,
                slidesToShow: item,
                slidesToScroll: 1,
                lazyLoad: 'ondemand',
                // verticalSwiping: true,
                dots: dots,
                arrows: arrows,
                prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
                nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: item_lg,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: item_md,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: item_sm,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: item_mb,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        });
    }

    $('.product-images .slick-product-images-for .ul').slick({
        loop: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.product-images .slick-product-images-nav .ul',
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
    });
    $('.product-images .slick-product-images-nav .ul').slick({
        loop: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-images .slick-product-images-for .ul',
        dots: false,
        focusOnSelect: true,
        prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
        nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
});

// js popups
jQuery(document).ready(function ($) {
    // popups
    $('.btn-popup').click(function (e) {
        e.preventDefault();

        var adat = $(this).attr('data_popup');

        var hg_pop = $('.' + adat + ' .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({ 'top': '15px' });
        } else {
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({ 'top': 'auto' });
        }

        $('.popups.' + adat).addClass('active');
    });
    ////////////////////
    setTimeout(function () {
        var hg_pop = $('.popups .show .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({ 'top': '15px' });
        } else {
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({ 'top': 'auto' });
        }

        // $('.popups').addClass('active');
    }, 2000);
    ////////////////////
    $('.popups').click(function (e) {
        e.preventDefault();

        $('.popups').removeClass('active');
    });
    ////////////////////
    $('.popups .content-box').click(function (e) {
        e.stopPropagation();
    });
    ////////////////////
    $(window).resize(function () {
        var hg_pop = $('.popups .show .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({ 'top': '15px' });
        } else {
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({ 'top': 'auto' });
        }
    });

    $('.popup-content form.wpcf7-form .form-group-button .form-button .wpcf7-submit').click(function () {
        setTimeout(function () {
            var hg_pop = $('.popups.active .content-box').outerHeight();
            var hg_win = $(window).height();
            if (hg_pop >= hg_win) {
                $('.popups .popups-box').height(hg_win - 30);
                $('.popups .popups-box').css({ 'top': '15px' });
            } else {
                $('.popups .popups-box').height('auto');
                $('.popups .popups-box').css({ 'top': 'auto' });
            }
        }, 2000);
    });
});
// end js popups

// js tab
jQuery(document).ready(function ($) {
    $('.title-tab .title').click(function (e) {
        e.preventDefault();

        var ac = $(this).hasClass('active');

        if (!ac) {
            var tp = $(this).attr('data_tab');
            $('.title-tab .title').removeClass('active');
            $(this).addClass('active');
            $('.tab-panel').removeClass('active');
            $('.tab-panel.' + tp).addClass('active');
        }
    });

    $('.tab-list a').click(function (e) {
        e.preventDefault();

        var ac = $(this).hasClass('active');

        if (!ac) {
            var tp = $(this).attr('href');
            $(this).parent().parent().children().children().removeClass('active');
            $(this).addClass('active');
            $(this).parent().parent().parent().parent().next().children().removeClass('active');
            $(tp).addClass('active');
        }
    });

    $('.product-tab-box .tab-content .tab-pane .title').click(function () {
        $(this).parent().toggleClass('active');
    });
});
// end js tab

// menu mobile
jQuery(document).ready(function ($) {
    $('.megamenu-mobile .close-box a, .megamenu-mobile .module_content').click(function (e) {
        e.preventDefault();
        $('.megamenu-mobile .module_content').removeClass('active');
    });

    $(document).on('click', '.megamenu-mobile .open-box a', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        var whgtp = $('.header-top').outerHeight();
        $('.megamenu-mobile .module_content').height(whg).delay(300).queue(function (next) {
            $('.megamenu-mobile .module_content').css({ 'top': '-' + whgtp + 'px' }).delay(300).queue(function (next) {
                $(this).addClass('active');
                next();
            });
            next();
        });
    });

    $(window).resize(function () {
        var whg = $(window).height();
        var whgtp = $('.header-top').outerHeight();
        $('.megamenu-mobile .module_content').height(whg);
        $('.megamenu-mobile .module_content').css({ 'top': '-' + whgtp + 'px' });
    });

    $('.megamenu-mobile li a .icon').click(function (e) {
        e.preventDefault();
        $(this).parent().next().slideToggle('slow');
    });

    $('.megamenu-mobile .module_content .content-box').click(function (e) {
        e.stopPropagation();
    });
});
// end menu mobile

// search
jQuery(document).ready(function ($) {
    $(document).on('click', '.search-box .open-box a', function (e) {
        e.preventDefault();
        var whg = $(window).height(); console.log(whg);

        $('.search-box .content-box').height(whg).delay(300).queue(function (next) {
            $('.search-box .content-box').addClass('active');
            next();
        });
    });


    $('.search-box .close-box a').click(function (e) {
        e.preventDefault();
        $('.search-box .content-box').height('auto').delay(300).queue(function (next) {
            $('.search-box .content-box').removeClass('active');
            next();
        });
    });
});
// end search

jQuery(document).ready(function ($) {
    // toggle
    $(document).on('click', '.module_toggle li a, .menu_toggle .title-box', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $(this).next().slideToggle('slow');
    });
    // end toggle

    $('.lth-menu li a .icon').click(function (e) {
        e.preventDefault();
        $(this).parent().next().slideToggle('slow');
    });
});

jQuery(document).ready(function ($) {

});

// wow
jQuery(document).ready(function ($) {
    wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
    );
    wow.init();
});
// end wow
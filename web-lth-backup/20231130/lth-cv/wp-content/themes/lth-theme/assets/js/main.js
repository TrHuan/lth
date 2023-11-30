
jQuery(document).ready(function ($) {
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
        var hbst = $('.header-stick').outerHeight();
        var hbt = $('.header-top').outerHeight();
        var hbb = $('.header-bottom').outerHeight();
        if (hbt && hbb && hbst) {
            var hb = parseInt(hbst) + parseInt(hbt) + parseInt(hbb);
        } else if (hbt && hbst) {
            var hb = parseInt(hbst) + parseInt(hbt);
        } else if (hbb && hbst) {
            var hb = parseInt(hbst) + parseInt(hbb);
        } else if (hbst) {
            var hb = parseInt(hbst);
        }
        $('.header').outerHeight(hb);
    }, 2000);

    $(window).resize(function () {
        setTimeout(function () {
            var hbst = $('.header-stick').outerHeight();
            var hbt = $('.header-top').outerHeight();
            var hbb = $('.header-bottom').outerHeight();
            if (hbt && hbb && hbst) {
                var hb = parseInt(hbst) + parseInt(hbt) + parseInt(hbb);
            } else if (hbt && hbst) {
                var hb = parseInt(hbst) + parseInt(hbt);
            } else if (hbb && hbst) {
                var hb = parseInt(hbst) + parseInt(hbb);
            } else if (hbst) {
                var hb = parseInt(hbst);
            }
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

    $(document).on('click', '.product-content-box .btn-buynow', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url'); 
        setTimeout(function () {
            $(location).attr('href',url);
        }, 3400);
    });

    $(document).on('click', '.main-products .products-ordering label', function () {
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

    var wdh = $(window).outerHeight();
    $('.cart-content').height(wdh);

    $(window).resize(function () {
        var wdh = $(window).outerHeight();
        $('.cart-content').height(wdh);
    });

    // $(document).on('click', '.cart-header .cart-btn', function (e) {
    //     e.preventDefault();
    //     $('.cart-content').addClass('active');
    // });

    // $(document).on('click', '.cart-content .cart-close', function () {
    //     $('.cart-content').removeClass('active');
    // });

    $('.menu-item-icon').parent().addClass('sub-icon');
});

jQuery(document).ready(function ($) {
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
    $(document).on('click', '.btn-popup', function (e) {
        e.preventDefault();

        var adat = $(this).attr('data_popup');

        var hg_pop = $('.' + adat + ' .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {
            $('.lth-popups .popups-box').height(hg_win - 30);
            $('.lth-popups .popups-box').css({ 'top': '15px' });
        } else {
            $('.lth-popups .popups-box').height('auto');
            $('.lth-popups .popups-box').css({ 'top': 'auto' });
        }

        $('.lth-popups.' + adat).addClass('active');
    });
    ////////////////////
    setTimeout(function () {
        var hg_pop = $('.lth-popups.active .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {
            $('.lth-popups .popups-box').height(hg_win - 30);
            $('.lth-popups .popups-box').css({ 'top': '15px' });
        } else {
            $('.lth-popups .popups-box').height('auto');
            $('.lth-popups .popups-box').css({ 'top': 'auto' });
        }
    }, 2000);
    ////////////////////
    $(document).on('click', '.lth-popups', function (e) {
        e.preventDefault();

        $('.lth-popups').removeClass('active');
    });
    ////////////////////
    $(document).on('click', '.lth-popups .content-box', function (e) {
        e.stopPropagation();
    });
    ////////////////////
    $(window).resize(function () {
        var hg_pop = $('.lth-popups.active .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {
            $('.lth-popups .popups-box').height(hg_win - 30);
            $('.lth-popups .popups-box').css({ 'top': '15px' });
        } else {
            $('.lth-popups .popups-box').height('auto');
            $('.lth-popups .popups-box').css({ 'top': 'auto' });
        }
    });

    $(document).on('click', '.popup-content form.wpcf7-form .form-group-button .form-button .wpcf7-submit', function (e) {
        setTimeout(function () {
            var hg_pop = $('.lth-popups.active .content-box').outerHeight();
            var hg_win = $(window).height();
            if (hg_pop >= hg_win) {
                $('.lth-popups .popups-box').height(hg_win - 30);
                $('.lth-popups .popups-box').css({ 'top': '15px' });
            } else {
                $('.lth-popups .popups-box').height('auto');
                $('.lth-popups .popups-box').css({ 'top': 'auto' });
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
    $('.megamenu-mobile .close-box a, .megamenu-mobile .module_content, .megamenu-desktop-icon .close-box a, .megamenu-desktop-icon .module_content').click(function (e) {
        e.preventDefault();
        $('.megamenu-mobile .module_content, .megamenu-desktop-icon .module_content').removeClass('active');
        $('body, html').removeClass('open-menu');
        $('body, html').height('auto');
    });

    $(document).on('click', '.megamenu-mobile .open-box a, .megamenu-desktop-icon .open-box a', function (e) {
        e.preventDefault();
        var whgw = $(window).height();
        var wpadminbar = $('#wpadminbar').height();
        if (wpadminbar) {
            whg = whgw - wpadminbar;
        } else {
            whg = whgw;
        }
        var whgmn = whg - 76;
        // var whgtp = $('.header-top').outerHeight();
        $('.megamenu-mobile .module_content, .megamenu-desktop-icon .module_content').height(whg).delay(300).queue(function (next) {
            $('.megamenu-mobile .menu, .megamenu-desktop-icon .menu').css({ 'height': whgmn + 'px' }).delay(300).queue(function (next) {
                $('.megamenu-mobile .module_content, .megamenu-desktop-icon .module_content').addClass('active');
                $('body, html').addClass('open-menu');
                // $('body, html').height(whg);
                next();
            });
            next();
        });
    });

    $(window).resize(function () {
        var mnac = $('.megamenu-mobile .module_content, .megamenu-desktop-icon .module_content').hasClass('active');
        if (mnac) {
            var whg = $(window).height();
            var wpadminbar = $('#wpadminbar').height();
            if (wpadminbar) {
                whg = whgw - wpadminbar;
            } else {
                whg = whgw;
            }
            var whgmn = whg - 76;
            // var whgtp = $('.header-top').outerHeight();
            $('.megamenu-mobile .module_content, .megamenu-desktop-icon .module_content').height(whg);
            $('body, html').addClass('open-menu');
            $('.megamenu-mobile .menu, .megamenu-desktop-icon .menu').css({ 'height': whgmn + 'px' });
            // $('body, html').height(whg);
        }
    });

    $('.megamenu-mobile .module_content .content-box, .megamenu-desktop-icon .module_content .content-box').click(function (e) {
        e.stopPropagation();
    });   
});
// end menu mobile

// search
jQuery(document).ready(function ($) {
    $(document).on('click', '.search-box .open-box a', function (e) {
        e.preventDefault();
        var whg = $(window).height();

        $('.search-box .content-box').height(whg).delay(300).queue(function (next) {
            $('.search-box .content-box').addClass('active');
            $('body, html').addClass('open-search');
            next();
        });
    });

    $('.search-box .close-box a').click(function (e) {
        e.preventDefault();            

        $('.search-box .content-box').removeClass('active').delay(300).queue(function (next) {
            $('.search-box .content-box').height('auto');
            $('body, html').removeClass('open-search');
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

    $('.menu li a .icon').click(function (e) {
        e.preventDefault();
        $(this).parent().next().slideToggle('slow');
    });

    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
});

jQuery(document).ready(function ($) {
    var w = $(window).width();
    var ws = $('.lth-blog-single > .container').width();
    var wt = (w - ws) / 2 - 30;
    var wh = $(window).outerHeight() - 126;
    
    var wsh = $('.muc-luc-box').outerHeight();
    var whbd = $('body').outerHeight();
    var wshbr = $('.breadcrumbs').outerHeight();
    var wshbs = $('.main-single').outerHeight();
    var wshft = $('footer').outerHeight();
    var wshst = $('.header-stick').outerHeight();
    var wpadb = $('#wpadminbar').outerHeight();
    var wshbsg = $('.lth-blog-single').outerHeight();
    var wshh = $('.header').outerHeight();
    var kk = whbd - (wshbs - wshbr) - wshft - wshst - wpadb;
    var pt = parseInt(wshst) + parseInt(wpadb) + 1;
    var kkk = parseInt(wshbsg) + parseInt(wshbr) + parseInt(wshh) - wsh - 60;

    $(document).on('click', '.muc-luc-box #ez-toc-container .ez-toc-list-level-1 > li > a', function (e) {
        var has = $(this).parent().hasClass('open');
        if (!has) {
            $('.muc-luc-box #ez-toc-container .ez-toc-list-level-1 > li').removeClass('open');
            $(this).parent().addClass('open');
        } else {
            $(this).parent().removeClass('open');
        }
    });

    if (w > 1200) {
        $('.muc-luc-box').width(wt);
    } else {
        $('.muc-luc-box').width('280px');
    }
    
    if (wsh > wh) {
        $('.muc-luc-box').css({"height": wh, "overflow-y": "scroll"});
    }

    $(window).on("scroll", function () {
        var scrollTop = $(this).scrollTop();

        if (scrollTop >= kk && scrollTop < kkk) {
            $('.muc-luc-box-block').css({"left": "0", "position": "fixed", "top": pt + 'px'});
        } else if (scrollTop >= kkk) {
            $('.muc-luc-box-block').css({"left": "0", "top": "auto", "position": "absolute", "bottom": wsh + 'px'});
        } else {
            $('.muc-luc-box-block').css({"left": "0", "position": "relative", "top": '0', "bottom": "auto"});
        }
    });

    $(window).resize(function () {
        var w = $(window).width();
        var ws = $('.lth-blog-single > .container').width();
        var wt = (w - ws) / 2 - 30;
        var wh = $(window).outerHeight() - 126;
        // var wsh = $('.muc-luc-box').outerHeight();
    
        var wsh = $('.muc-luc-box').outerHeight();
        var whbd = $('body').outerHeight();
        var wshbr = $('.breadcrumbs').outerHeight();
        var wshbs = $('.main-single').outerHeight();
        var wshft = $('footer').outerHeight();
        var wshst = $('.header-stick').outerHeight();
        var wpadb = $('#wpadminbar').outerHeight();
        var wshbsg = $('.lth-blog-single').outerHeight();
        var wshh = $('.header').outerHeight();
        var kk = whbd - (wshbs - wshbr) - wshft - wshst - wpadb;
        var pt = parseInt(wshst) + parseInt(wpadb) + 1;
        var kkk = parseInt(wshbsg) + parseInt(wshbr) + parseInt(wshh) - wsh - 60;

        if (w > 1200) {
            $('.muc-luc-box').width(wt);

            $('.muc-luc-box #ez-toc-container .ez-toc-list').css({"display": "block"});
        } else {
            $('.muc-luc-box').width('280px');
        }
    
        if (wsh > wh) {
            $('.muc-luc-box').css({"height": wh, "overflow-y": "scroll"});
        }

        $(window).on("scroll", function () {
            var scrollTop = $(this).scrollTop();
    
            if (scrollTop >= kk && scrollTop < kkk) {
                $('.muc-luc-box-block').css({"left": "0", "position": "fixed", "top": pt + 'px'});
            } else if (scrollTop >= kkk) {
                $('.muc-luc-box-block').css({"left": "0", "top": "auto", "position": "absolute", "bottom": wsh + 'px'});
            } else {
                $('.muc-luc-box-block').css({"left": "0", "position": "relative", "top": '0', "bottom": "auto"});
            }
        });
    });

    $(document).on('click', '.lth-muc-luc-box .sb-menu', function (e) {
        $('.muc-luc-box').addClass('active');
        $('.lth-muc-luc-box .sb-close').addClass('active');
    });

    $(document).on('click', '.lth-muc-luc-box .sb-close, .muc-luc-box #ez-toc-container a', function (e) {
        $('.muc-luc-box').removeClass('active');
        $('.lth-muc-luc-box .sb-close').removeClass('active');
    });
});

jQuery(document).ready(function ($) {
    
});
jQuery(document).ready(function($) {
    $(".slick-slidershow").slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        arrow: true,
        prevArrow: '<button class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon icon-prev"></i></button>',
        nextArrow: '<button class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon icon-next"></i></button>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".slick-brands").slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 6,
        slidesToScroll: 1,
        adaptiveHeight: true,
        arrow: false,
        prevArrow: '<button class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon icon-prev"></i></button>',
        nextArrow: '<button class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon icon-next"></i></button>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $(".slick-products").slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        adaptiveHeight: true,
        arrow: true,
        prevArrow: '<button class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon icon-prev"></i></button>',
        nextArrow: '<button class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon icon-next"></i></button>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
});

jQuery(document).ready(function($) {
    // $('#menu .menu-content').click(function(e){
    //     e.stopPropagation();
    // });
    // $('#menuToggle .menu-title, #menuToggle .menu-close, #menu').click(function(){
    //     $('#menuToggle').toggleClass('active');
    // });$('.menu-box').height('100%');

    $('.megamenu .sub-title').click(function(event){
        event.preventDefault();
        $(this).next().slideToggle('slow');
    });

    $(window).on("scroll",function() {
        if ($(this).scrollTop() > 41 ) {
            $('.main-sticky').addClass('active');
        } else {
            $('.main-sticky').removeClass('active');
        }

        if ($(this).scrollTop() > 0 ) {
            $('.back-to-top').addClass('active');
        } else {
            $('.back-to-top').removeClass('active');
        }
    });
    $('.back-to-top').click(function(){
        $('html, body').animate({scrollTop:0}, 400);
    });

    $('.categories-title').click(function(){
        var hsac = $(this).parent().hasClass('active');
        if (!hsac) {
            $(this).parent().parent().children().removeClass('active');
            $(this).parent().addClass('active');
        }
    });

    //////////

    $('.popup-account-title a').click(function(){
        var hsrg = $(this).hasClass('title-regis');
        $('.popup-account-title a').removeClass('active');
        if (hsrg) {
            var h_wd = $(window).height();
            var h_cb2 = $ ('#registration-box .regis-box').outerHeight( true );
            var h_tit = $('.popup-account-title').outerHeight( true );
            var h_cb = parseInt(h_cb2) + h_tit + 80;
            if (h_wd < h_cb) {
                $('#registration-box').height(h_wd - h_tit - 80);
            } else {
                $('#registration-box').css({'height': 'auto'});
            }

            $(this).addClass('active');
            $('#login-box').removeClass('in');
            $('#login-box').removeClass('active');
            $('#registration-box').addClass('in');
            $('#registration-box').addClass('active');      
        } else {
            var h_wd = $(window).height();
            var h_cb2 = $ ('#login-box .login-box').outerHeight( true );
            var h_tit = $('.popup-account-title').outerHeight( true );
            var h_cb = parseInt(h_cb2) + h_tit + 80;
            if (h_wd < h_cb) {
                $('#login-box').height(h_wd - h_tit - 80);
            } else {
                $('#login-box').css({'height': 'auto'});
            }

            $(this).addClass('active');

            $('#registration-box').css({'height': 0});

            $('#registration-box').removeClass('in');
            $('#registration-box').removeClass('active');  
            $('#login-box').addClass('in');
            $('#login-box').addClass('active');
        }        
    });

    $('.top-bar-right li:not(.tai-khoan) a').click(function(e){
        e.preventDefault();
        $('.popup-account').addClass('active');

        var hsrg = $(this).parent().hasClass('regis');
        if (hsrg) {
            $('.popup-account-title a').removeClass('active');
            $('.popup-account-title .title-regis').addClass('active');
            $('#login-box').removeClass('in');
            $('#login-box').removeClass('active');
            $('#registration-box').addClass('in');
            $('#registration-box').addClass('active');

            var h_wd = $(window).height();
            var h_cb2 = $ ('#registration-box .regis-box').outerHeight( true );
            var h_tit = $('.popup-account-title').outerHeight( true );
            var h_cb = parseInt(h_cb2) + h_tit + 80;
            if (h_wd < h_cb) {
                $('#registration-box').height(h_wd - h_tit - 80);
            } else {
                $('#registration-box').css({'height': 'auto'});
            }      
        } else {
            $('.popup-account-title a').removeClass('active');
            $('.popup-account-title .title-login').addClass('active');
            $('#registration-box').removeClass('in');
            $('#registration-box').removeClass('active');
            $('#login-box').addClass('in');
            $('#login-box').addClass('active');

            var h_wd = $(window).height();
            var h_cb2 = $ ('#login-box .login-box').outerHeight( true );
            var h_tit = $('.popup-account-title').outerHeight( true );
            var h_cb = parseInt(h_cb2) + h_tit + 80;
            if (h_wd < h_cb) {
                $('#login-box').height(h_wd - h_tit - 80);
            } else {
                $('#login-box').css({'height': 'auto'});
            }
        }
    });
    $('.popups').click(function(){
        $('.popups').removeClass('active');
    });
    $('.popups .content-box').click(function(e){
        e.stopPropagation();
    });

    $(window).resize(function(){
        var h_wd = $(window).height();
        var h_cb2 = $ ('.popups-box > .active > div').outerHeight( true );
        var h_tit = $('.popup-account-title').outerHeight( true );
        var h_cb = parseInt(h_cb2) + h_tit + 80;
        if (h_wd < h_cb) {
            $('.popups-box > .active').height(h_wd - h_tit - 80);
        }    
        else {
            $('.popups-box > .active').css({'height': 'auto'});
        }    
    });
});
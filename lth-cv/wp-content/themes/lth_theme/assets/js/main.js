jQuery(document).ready(function($) {
    $('html, body').animate({scrollTop:0}, 0);

    $(window).on("scroll",function() {
        var hb = $('.header').outerHeight();
        if ($(this).scrollTop() > hb ) {
            $('.header-stick').addClass('active');
        } else {
            $('.header-stick').removeClass('active');
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

    setTimeout(function(){
        var hb = $('.header').outerHeight();
        $('header').outerHeight(hb);
    }, 2000);

    $(window).resize(function(){
        setTimeout(function() {
            var hb = $('.header').outerHeight();
            $('header').outerHeight(hb);
        }, 1000);
    });
});

jQuery(document).ready(function($) {

    // var swiper_slidershow = new Swiper('.swiper-slidershow', {
    //     slidesPerView: 1,
    //     loop: true,
    //     navigation: {
    //         nextEl: '.swiper-button-next',
    //         prevEl: '.swiper-button-prev',
    //     },
    // });

    if ( jQuery().slick ) {
        var slick = jQuery(".swiper-slider");
        slick.each(function(){
            var item        = jQuery(this).data('item'),
                item_lg     = jQuery(this).data('item_lg'),
                item_md     = jQuery(this).data('item_md'),
                item_sm     = jQuery(this).data('item_sm'),
                item_mb     = jQuery(this).data('item_mb'),
                row         = jQuery(this).data('row'),
                arrows      = jQuery(this).data('arrows'),
                dots        = jQuery(this).data('dots'),
                vertical    = jQuery(this).data('vertical');
                autoplay    = jQuery(this).data('autoplay');
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

});

// js popups
jQuery(document).ready(function($) {
    // popups
    $('.btn-popup').click(function(e){
        e.preventDefault();

        var adat = $(this).attr('data_popup');

        var hg_pop = $('.' + adat + ' .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {    
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({'top': '15px'});
        } else {    
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({'top': 'auto'});
        } 
        
        $('.popups.' + adat).addClass('active');
    });
    ////////////////////
    setTimeout(function(){
        var hg_pop = $('.popups .show .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {    
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({'top': '15px'});
        } else {    
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({'top': 'auto'});
        } 

        // $('.popups').addClass('active');
    }, 2000);  
    ////////////////////
    $('.popups').click(function(e){
        e.preventDefault();

        $('.popups').removeClass('active');
    });
    ////////////////////
    $('.popups .content-box').click(function(e){
        e.stopPropagation();
    });
    ////////////////////
    $(window).resize(function(){
        var hg_pop = $('.popups .show .content-box').outerHeight();
        var hg_win = $(window).height();
        if (hg_pop >= hg_win) {    
            $('.popups .popups-box').height(hg_win - 30);
            $('.popups .popups-box').css({'top': '15px'});
        } else {    
            $('.popups .popups-box').height('auto');
            $('.popups .popups-box').css({'top': 'auto'});
        } 
    });

    $('.popup-content form.wpcf7-form .form-group-button .form-button .wpcf7-submit').click(function(){
        setTimeout(function(){
            var hg_pop = $('.popups.active .content-box').outerHeight();
            var hg_win = $(window).height();
            if (hg_pop >= hg_win) {    
                $('.popups .popups-box').height(hg_win - 30);
                $('.popups .popups-box').css({'top': '15px'});
            } else {    
                $('.popups .popups-box').height('auto');
                $('.popups .popups-box').css({'top': 'auto'});
            } 
        }, 2000);        
    });
});
// end js popups

// js tab
jQuery(document).ready(function($) {
    $('.title-tab .title').click(function(e){
        e.preventDefault();

        var ac = $(this).hasClass('active');

        if (!ac) {
            var tp = $(this).attr('data_tab');
            $('.title-tab .title').removeClass('active');
            $(this).addClass('active');
            $('.tab-panel').removeClass('active');
            $('.tab-panel.'+tp).addClass('active');
        }
    });
});
// end js tab

// menu mobile
jQuery(document).ready(function($) {
    $('.megamenus .close a').click(function(e){
        e.preventDefault();
        $('.megamenu-mobile .content-box').removeClass('active');
    });

    $(document).on('click', '.megamenu-mobile .open a', function (e) {
        e.preventDefault();
        var whg = $(window).height();
        var whgtp = $('.header-top').outerHeight();
        $('.megamenu-mobile .content-box').height(whg).delay(300).queue(function(next){
            $('.megamenu-mobile .content-box').css({'top': '-' + whgtp + 'px'}).delay(300).queue(function(next){
                $(this).addClass('active');
                next();
            });
            next();
        });
    });

    $(window).resize(function(){
        var whg = $(window).height();
        var whgtp = $('.header-top').outerHeight();
        $('.megamenu-mobile .content-box').height(whg);
        $('.megamenu-mobile .content-box').css({'top': '-' + whgtp + 'px'});
    });
});
// end menu mobile

jQuery(document).ready(function($) {
    
});
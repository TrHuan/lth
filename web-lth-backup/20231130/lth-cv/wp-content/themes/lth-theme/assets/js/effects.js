jQuery(document).ready(function ($) {
    jQuery().slick && jQuery(".swiper-slider").each((function() {
        var a = jQuery(this).data("item"),
        s = jQuery(this).data("item_lg"),
        e = jQuery(this).data("item_md"),
        i = jQuery(this).data("item_sm"),
        t = jQuery(this).data("item_mb"),
        o = jQuery(this).data("row"),
        r = jQuery(this).data("arrows"),
        l = jQuery(this).data("dots"),
        n = jQuery(this).data("vertical");
        autoplay = jQuery(this).data("autoplay"),
        jQuery(this).slick({
            loop: !0,
            autoplay: autoplay,
            infinite: !0,
            autoplaySpeed: 10000,
            vertical: n,
            rows: o,
            slidesToShow: a,
            slidesToScroll: 1,
            lazyLoad: "ondemand",
            adaptiveHeight: "true",
            dots: l,
            arrows: r,
            prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
            nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: s,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 992,
                settings: {
                    slidesToShow: e,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: i,
                    slidesToScroll: 1,
                    rows: 1
                }
            }, {
                breakpoint: 576,
                settings: {
                    slidesToShow: t,
                    slidesToScroll: 1,
                    rows: 1
                }
            }]
        })
    }));

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
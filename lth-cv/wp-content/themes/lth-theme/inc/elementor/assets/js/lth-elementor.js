jQuery(document).ready(function ($) {
    if (jQuery().slick) {
        var slick = jQuery(".elementor-slider");
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
                prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="fal fa-angle-left icon"></i></a>',
                nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="fal fa-angle-right icon"></i></a>',
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
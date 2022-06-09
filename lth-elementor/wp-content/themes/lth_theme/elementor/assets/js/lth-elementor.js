// (function($) {
//     // "use strict";

//     var slider = function ($scope, $) {
//         var slick = $(".swiper-slidershow");
//         slick.each(function(){
//             var item        = $(this).data('item'),
//                 item_lg     = $(this).data('item_lg'),
//                 item_md     = $(this).data('item_md'),
//                 item_sm     = $(this).data('item_sm'),
//                 item_mb     = $(this).data('item_mb'),
//                 row         = $(this).data('row'),
//                 arrows      = $(this).data('arrows'),
//                 dots        = $(this).data('dots'),
//                 vertical    = $(this).data('vertical');
//                 autoplay    = $(this).data('autoplay');
//             $(this).slick({
//                 loop: true,
//                 autoplay: autoplay,
//                 infinite: true,
//                 autoplaySpeed: 2000,
//                 vertical: vertical,
//                 rows: row,
//                 slidesToShow: item,
//                 slidesToScroll: 1,
//                 lazyLoad: 'ondemand',
//                 // verticalSwiping: true,
//                 dots: dots,
//                 arrows: arrows,
//                 prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//                 nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//                 responsive: [
//                     {
//                         breakpoint: 1200,
//                         settings: {
//                             slidesToShow: item_lg,
//                             slidesToScroll: 1,
//                         }
//                     },
//                     {
//                         breakpoint: 992,
//                         settings: {
//                             slidesToShow: item_md,
//                             slidesToScroll: 1,
//                         }
//                     },
//                     {
//                         breakpoint: 768,
//                         settings: {
//                             slidesToShow: item_sm,
//                             slidesToScroll: 1,
//                         }
//                     },
//                     {
//                         breakpoint: 576,
//                         settings: {
//                             slidesToShow: item_mb,
//                             slidesToScroll: 1,
//                         }
//                     }
//                 ]
//             });
//         });
//     };

//     var posts = function ($scope, $) {
//         var slick = $(".swiper-blogs");
//         slick.each(function(){
//             var item        = $(this).data('item'),
//                 item_lg     = $(this).data('item_lg'),
//                 item_md     = $(this).data('item_md'),
//                 item_sm     = $(this).data('item_sm'),
//                 item_mb     = $(this).data('item_mb'),
//                 row         = $(this).data('row'),
//                 arrows      = $(this).data('arrows'),
//                 dots        = $(this).data('dots'),
//                 vertical    = $(this).data('vertical');
//                 autoplay    = $(this).data('autoplay');
//             $(this).slick({
//                 loop: true,
//                 autoplay: autoplay,
//                 infinite: true,
//                 autoplaySpeed: 2000,
//                 vertical: vertical,
//                 rows: row,
//                 slidesToShow: item,
//                 slidesToScroll: 1,
//                 lazyLoad: 'ondemand',
//                 // verticalSwiping: true,
//                 dots: dots,
//                 arrows: arrows,
//                 prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//                 nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//                 responsive: [
//                     {
//                         breakpoint: 1200,
//                         settings: {
//                             slidesToShow: item_lg,
//                             slidesToScroll: 1,
//                         }
//                     },
//                     {
//                         breakpoint: 992,
//                         settings: {
//                             slidesToShow: item_md,
//                             slidesToScroll: 1,
//                         }
//                     },
//                     {
//                         breakpoint: 768,
//                         settings: {
//                             slidesToShow: item_sm,
//                             slidesToScroll: 1,
//                         }
//                     },
//                     {
//                         breakpoint: 576,
//                         settings: {
//                             slidesToShow: item_mb,
//                             slidesToScroll: 1,
//                         }
//                     }
//                 ]
//             });
//         });
//     };

//     // var products = function ($scope, $) {
//     //     var slick = $(".swiper-products");
//     //     slick.each(function(){
//     //         var item        = $(this).data('item'),
//     //             item_lg     = $(this).data('item_lg'),
//     //             item_md     = $(this).data('item_md'),
//     //             item_sm     = $(this).data('item_sm'),
//     //             item_mb     = $(this).data('item_mb'),
//     //             row         = $(this).data('row'),
//     //             arrows      = $(this).data('arrows'),
//     //             dots        = $(this).data('dots'),
//     //             vertical    = $(this).data('vertical'),
//     //             autoplay    = $(this).data('autoplay');
//     //         $(this).slick({
//     //             loop: true,
//     //             autoplay: autoplay,
//     //             infinite: true,
//     //             autoplaySpeed: 2000,
//     //             vertical: vertical,
//     //             rows: row,
//     //             slidesToShow: item,
//     //             slidesToScroll: 1,
//     //             lazyLoad: 'ondemand',
//     //             // verticalSwiping: true,
//     //             dots: dots,
//     //             arrows: arrows,
//     //             prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//     //             nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//     //             responsive: [
//     //                 {
//     //                     breakpoint: 1200,
//     //                     settings: {
//     //                         slidesToShow: item_lg,
//     //                         slidesToScroll: 1,
//     //                     }
//     //                 },
//     //                 {
//     //                     breakpoint: 992,
//     //                     settings: {
//     //                         slidesToShow: item_md,
//     //                         slidesToScroll: 1,
//     //                     }
//     //                 },
//     //                 {
//     //                     breakpoint: 768,
//     //                     settings: {
//     //                         slidesToShow: item_sm,
//     //                         slidesToScroll: 1,
//     //                     }
//     //                 },
//     //                 {
//     //                     breakpoint: 576,
//     //                     settings: {
//     //                         slidesToShow: item_mb,
//     //                         slidesToScroll: 1,
//     //                     }
//     //                 }
//     //             ]
//     //         });
//     //     });
//     // };

//     $(window).on('elementor/frontend/init', function () {
//         elementorFrontend.hooks.addAction('frontend/element_ready/lth-slider.default', slider);

//         elementorFrontend.hooks.addAction('frontend/element_ready/lth-posts.default', posts);

//         // elementorFrontend.hooks.addAction('frontend/element_ready/lth-products.default', products);
//     });

// })(jQuery);


// class SwiperSlickOption {
//     getOptions(selector, settings, breakpoints, check = true, checkBreak = true){
//         const   options = {
//                     // loop            : 'yes' === settings.infinite,
//                     // autoplay        : 'yes' === settings.autoplay,
//                     // speed           : settings.autoplay_speed,
//                     // watchOverflow   : true,
//                     // pagination: {
//                     //    el: selector.find('.swiper-pagination'),
//                     //    type: 'bullets',
//                     //    clickable: true
//                     // },
//                     // on              : {
//                     //     init: function() {
//                     //         selector.css( 'opacity', 1 );
//                     //     }
//                     // },
//                     // breakpoints     : {}
                    
//                     loop: true,
//                     autoplay: settings.autoplay,
//                     infinite: true,
//                     autoplaySpeed: 2000,
//                     vertical: settings.vertical,
//                     rows: settings.row,
//                     slidesToShow: settings.item,
//                     slidesToScroll: 1,
//                     lazyLoad: 'ondemand',
//                     // verticalSwiping: true,
//                     dots: dots,
//                     arrows: arrows,
//                     prevArrow: '<a class="slick-arrow slick-prev" href="javascript:0"><i class="icofont-thin-left icon"></i></a>',
//                     nextArrow: '<a class="slick-arrow slick-next" href="javascript:0"><i class="icofont-thin-right icon"></i></a>',
//                     responsive: [
//                         {
//                             breakpoint: 1200,
//                             settings: {
//                                 slidesToShow: settings.item_lg,
//                                 slidesToScroll: 1,
//                             }
//                         },
//                         {
//                             breakpoint: 992,
//                             settings: {
//                                 slidesToShow: settings.item_md,
//                                 slidesToScroll: 1,
//                             }
//                         },
//                         {
//                             breakpoint: 768,
//                             settings: {
//                                 slidesToShow: settings.item_sm,
//                                 slidesToScroll: 1,
//                             }
//                         },
//                         {
//                             breakpoint: 576,
//                             settings: {
//                                 slidesToShow: settings.item_mb,
//                                 slidesToScroll: 1,
//                             }
//                         }
//                     ]
//                 };

//         return options;
//     }
// }

// class SwiperProductsWidgetHandler extends elementorModules.frontend.handlers.Base {
//     getDefaultSettings() {
//         return {
//             selectors: {
//                 container: '.swiper-products'
//             },
//         };
//     }

//     // getDefaultElements() {
//     //     const selectors = this.getSettings( 'selectors' );

//     //     return {
//     //         $container: this.$element.find( selectors.container )
//     //     };
//     // }

//     getSwiperOption() {
//         let el = new RaziiSwiperCarouselOption();

//         const ops = el.getOptions(this.elements.$container, this.getElementSettings(), elementorFrontend.config.breakpoints);

//         return ops;
//     }

//     // getSwiperInit() {
//     //     new Swiper( this.elements.$container.find('.razzi-testimonials-carousel__wrapper'), this.getSwiperOption() );
//     // }

//     onInit() {
//         super.onInit();

//         if ( ! this.elements.$container.length ) {
//             return;
//         }

//         this.getSwiperInit();
//     }
// }

// $(window).on('elementor/frontend/init', function () {
//     elementorFrontend.hooks.addAction( 'frontend/element_ready/lth-products.default', ( $element ) => {
//         elementorFrontend.elementsHandler.addHandler( ProductsWidgetHandler, { $element } );
//     } );
// });

(function ($) {

    "use strict";

    $(document).ready(function () {
        swiper_slick_slider.ready();
    });

    var swiper_slick_slider = {
        /*  Call functions when document ready */
        ready: function () {
            this.swiper_slick();
        },

        swiper_slick: function($scope){           

            // var products = function ($scope, $) {
                var slick = $(".swiper-slider");
                slick.each(function(){
                    var item        = $(this).data('item'),
                        item_lg     = $(this).data('item_lg'),
                        item_md     = $(this).data('item_md'),
                        item_sm     = $(this).data('item_sm'),
                        item_mb     = $(this).data('item_mb'),
                        row         = $(this).data('row'),
                        arrows      = $(this).data('arrows'),
                        dots        = $(this).data('dots'),
                        vertical    = $(this).data('vertical'),
                        autoplay    = $(this).data('autoplay');
                    $(this).slick({
                        loop: 'true',
                        autoplay: autoplay,
                        infinite: 'true',
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
            // };

        }
    };

    $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/lth-slider.default', swiper_slick_slider.swiper_slick);
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-posts.default', swiper_slick_slider.swiper_slick);
        elementorFrontend.hooks.addAction('frontend/element_ready/lth-products.default', swiper_slick_slider.swiper_slick);

    });

})(jQuery);
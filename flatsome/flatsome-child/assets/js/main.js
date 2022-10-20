jQuery(document).ready(function($) {
    $(document).on('click', '.cart-container-list .cart_list .remove', function (e) { 
        e.preventDefault();     
        var wd = $(window).width();
//         if (wd < 850) {  
            setTimeout(function(){
                setTimeout(function(){
                    $('.notification-product .remove-product').addClass('active');

                    setTimeout(function(){
                        $('.notification-product .remove-product').removeClass('active');
                    }, 2000);
                }, 400);
            }, 1000);
//         }
    });

    $(document).on('click', '.add-to-cart-button .ajax_add_to_cart, .product-content-box .single_add_to_cart_button, .product-content-box .ajax_add_to_cart', function () {   
        var wd = $(window).width();
//         if (wd < 850) {         
            setTimeout(function(){
                setTimeout(function(){
                    $('.notification-product .add-product').addClass('active');

                    setTimeout(function(){
                        $('.notification-product .add-product').removeClass('active');
                    }, 2000);
                }, 400);
            }, 1000);
//         }
    });

    $(window).on("scroll",function() {
        setTimeout(function(){
            var teshg = $('.portfolio-element-wrapper .flickity-slider > div').height();
            var teshg2 = parseInt(teshg) + 0;
            $('.portfolio-element-wrapper .flickity-viewport').css({'padding-top': teshg2});
        }, 1000);
    });
});
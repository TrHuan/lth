jQuery(document).ready(function ($) {
    $('.module_addon .addon-button button').click(function () {
        $('.module_shippinginformation form.wpcf7-form .wpcf7-submit').click();
    });

    $('.module_toggle li a').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
    });

    // Tinh gia khi load trang
    var price = $('.module_selectpackage .post-box.active .post-price-total span.total').html();
    var post_name = $('.module_selectpackage .post-box.active .post-name').html();
    $('.item-selectpackage .selectpackage-name-price').append( "<span>"+post_name+"</span><span>"+price+"</span>" );

    var data_price = $('.module_selectpackage .post-box.active .post-price-total span.total').attr('data_price');
    var data_price_shipping = $('.item-selectpackage .price-shipping').attr('data_price');
    var data_price_kq = parseFloat(data_price) + parseFloat(data_price_shipping);
    $('.item-selectpackage strong.price-kq').append( '<span data_kq="'+data_price_kq+'">$'+data_price_kq+'</span>' );

    $('.module_paymentoption #smart-button-container #item-options option').attr('value', post_name);
    $('.module_paymentoption #smart-button-container #item-options option').attr('price', data_price_kq);
    $('.module_paymentoption #smart-button-container #item-options option').html(post_name + ' - ' + data_price_kq); 
    
    var image = $('.module_selectpackage .post-box.active .post-image img').attr('src');
    $('.item-selectpackage .post-image img').attr('src', image);
    
    var data_qty = $('.module_selectpackage .active .post-content .post-qty').attr('data_qty');
    $('.module_shippinginformation .form-group-product input[name="your-product-name"]').val(post_name);
    $('.module_shippinginformation .form-group-product input[name="your-product-qty"]').val(data_qty);
    $('.module_shippinginformation .form-group-product input[name="your-product-price"]').val('$'+data_price_kq);

    // Tinh gia khi click vao step select package
    $(document).on('click', '.module_selectpackage .post-box', function (e) {
        e.preventDefault();
        var hsac = $(this).hasClass('active');
        if (!hsac) {
            $('.module_selectpackage .post-box').removeClass('active');
            $(this).addClass('active');

            var price = $('.module_selectpackage .post-box.active .post-price-total span.total').html();
            var post_name = $('.module_selectpackage .post-box.active .post-name').html();
            $('.item-selectpackage .selectpackage-name-price span').remove();
            $('.item-selectpackage .selectpackage-name-price').append( '<span class="name">'+post_name+'</span><span>'+price+'</span>' );

            var data_price = $('.module_selectpackage .post-box.active .post-price-total span.total').attr('data_price');
            var data_price_shipping = $('.item-selectpackage .price-shipping').attr('data_price');
            var data_package_addon_all = $('.module_selectpackage .item-selectpackage .post-content .package_addon_all').attr('data_package_addon_all');

            if (data_package_addon_all) {
                var data_price_kq = parseFloat(data_price) + parseFloat(data_price_shipping) + parseFloat(data_package_addon_all);
            } else {
                var data_price_kq = parseFloat(data_price) + parseFloat(data_price_shipping);
            }
            $('.item-selectpackage strong.price-kq span').remove();
            $('.item-selectpackage strong.price-kq').append( '<span data_kq="'+data_price_kq+'">$'+data_price_kq+'</span>' );

            $('.module_paymentoption #smart-button-container #item-options option').attr('price', data_price_kq);
            $('.module_paymentoption #smart-button-container #item-options option').html(post_name + ' - ' + data_price_kq); 
    
            var image = $('.module_selectpackage .post-box.active .post-image img').attr('src');
            $('.item-selectpackage .post-image img').attr('src', image);            
    
            var data_qty = $('.module_selectpackage .active .post-content .post-qty').attr('data_qty');
            $('.module_shippinginformation .form-group-product input[name="your-product-name"]').val(post_name);
            $('.module_shippinginformation .form-group-product input[name="your-product-qty"]').val(data_qty);
            $('.module_shippinginformation .form-group-product input[name="your-product-price"]').val('$'+data_price_kq);
        }
    });
    
    $(document).on('click', '.module_shippinginformation .form-group-checkbox input', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('active');
    });

    // Tinh gia khi click vao step add ons
    $(document).on('click', '.module_addon .add-box', function (e) {
        e.preventDefault();

        var hsac = $(this).hasClass('active');

        var data_select_package = $(this).attr('data_select_package');
        var data_add_price = $(this).attr('data_add_price');
        var data_i = $(this).attr('data_i');
        var data_order = parseFloat(data_i) + 3;

        var post_name = $('.module_selectpackage .selectpackage-name-price .name').html();

        if (hsac) {
            $(this).removeClass('active');
            $('.module_selectpackage .item-selectpackage .post-content .package_addon_'+data_i).remove();

            var data_kq = $('.item-selectpackage strong.price-kq span').attr('data_kq');
            var data_kq2 = parseFloat(data_kq) - parseFloat(data_add_price);
            $('.item-selectpackage strong.price-kq span').remove();
            $('.item-selectpackage strong.price-kq').append( '<span data_kq="'+data_kq2+'">$'+data_kq2+'</span>' );

            $('.module_paymentoption #smart-button-container #item-options option').attr('price', data_kq2);
            $('.module_paymentoption #smart-button-container #item-options option').html(post_name + ' - ' + data_kq2); 

            var data_package_addon_all = $('.module_selectpackage .item-selectpackage .post-content .package_addon_all').attr('data_package_addon_all');
            var data_package_addon_all2 = data_package_addon_all - data_add_price;
            $('.module_selectpackage .item-selectpackage .post-content .package_addon_all').attr('data_package_addon_all', data_package_addon_all2);

            $('.module_selectpackage .item-selectpackage .post-content .package_addon_all span.'+data_i).remove();
        } else {
            $(this).addClass('active');

            $('.module_selectpackage .item-selectpackage .post-content ul').append( 
                '<li class="package_addon package_addon_'+data_i+'" style="order:'+data_order+'"><span>'+data_select_package+'</span><span>$'+data_add_price+'</span></li>'
            );
            
            var data_kq = $('.item-selectpackage strong.price-kq span').attr('data_kq');
            var data_kq2 = parseFloat(data_kq) + parseFloat(data_add_price);
            $('.item-selectpackage strong.price-kq span').remove();
            $('.item-selectpackage strong.price-kq').append( '<span data_kq="'+data_kq2+'">$'+data_kq2+'</span>' );

            $('.module_paymentoption #smart-button-container #item-options option').attr('price', data_kq2);
            $('.module_paymentoption #smart-button-container #item-options option').html(post_name + ' - ' + data_kq2);  

            $('.module_selectpackage .item-selectpackage .post-content .package_addon_all').append('<span class="'+data_i+'" data_package_addon_all_item="'+data_add_price+'"></span>');

            var addon_leg = $('.module_selectpackage .item-selectpackage .post-content .package_addon_all span').length;
            if (addon_leg > 1) {
                var data_package_addon_all_item = $('.module_selectpackage .item-selectpackage .post-content .package_addon_all span').attr('data_package_addon_all_item');
                var data_add_price2 = parseFloat(data_add_price) + parseFloat(data_package_addon_all_item);

                $('.module_selectpackage .item-selectpackage .post-content .package_addon_all').attr('data_package_addon_all',data_add_price2);
            } else {
                $('.module_selectpackage .item-selectpackage .post-content .package_addon_all').attr('data_package_addon_all',data_add_price);
            } 
        }
    });
    
});
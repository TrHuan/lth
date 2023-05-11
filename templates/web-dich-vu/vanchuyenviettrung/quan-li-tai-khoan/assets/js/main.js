jQuery(document).ready(function($) {
    $('.use-block .use-title').click(function(){
        $(this).parent().toggleClass('active');
        $('body').toggleClass('active');
    });
    $('.main-site').click(function(){
        $('.use-block .use-box').removeClass('active');
        $('body').removeClass('active');
    });

    $('.recharges-content .title, .recharge-block li').click(function(){
    	var hac = $(this).hasClass('active');
    	if (!hac) {
    		$('.recharges-content .title, .recharge-block li').removeClass('active');
    		$(this).addClass('active');
    	}
    });

    $('.transport-setting .radio input').click(function(){
    	var hac = $(this).parent().hasClass('active');
    	if (!hac) {
    		$(this).parent().parent().children().removeClass('active');
    		$(this).parent().addClass('active');
    	}
    });

    $('.address-setting .radio input').click(function(){
    	var hac = $(this).parent().hasClass('active');
    	if (!hac) {
    		$(this).parent().parent().parent().parent().children().children().children().removeClass('active');
    		$(this).parent().addClass('active');
    	}
    });

    $('.purchase-orders .number .icon-minus').click(function(){
    	var vlms = $(this).parent().next().val();
    	
    	if (vlms != ' ' || vlms != '0') {
    		$(this).parent().next().val(vlms - 1);
    	}
    });

    $('.purchase-orders .number .icon-plus').click(function(){
    	var vlms = $(this).parent().prev().val();
    	if (vlms != ' ' || vlms != '0') {
    		valms = parseInt(vlms);
	    	$(this).parent().prev().val(valms + 1);
	    } else {
	    	$(this).parent().prev().val('1');
	    }
    });

	$( ".purchase-orders .number input" ).keyup(function() {
		var value = $( this ).val();
		$(this).val(value);
	}).keyup();

	$('.megamenu-mobile .icon').click(function(){
		$('.megamenu-block').toggleClass('active');
		// $(this).toggleClass('fa-bars');
		// $(this).toggleClass('fa-times');
	});

    $('.megamenu-block .item > .title-submenu').click(function(e){
        e.preventDefault();
        
        var ac = $(this).hasClass('active');
        if (ac) {
            $(this).removeClass('active');
            // $(this).next().slideToggle('slow');
            $(this).next().slideUp("slow");
        } else {
            $('.megamenu-block .item > .title-submenu').removeClass('active');
            $(this).addClass('active');
            $('.megamenu-block .item .submenu').slideUp("slow");
            $(this).next().slideDown("slow");
        }
    });

    var ww = $(window).width();
    var wh2 = $(window).height();
    var ms = $('.main-sticky').outerHeight( true );
    var wh = wh2 - ms;
    var navh = $('.megamenu-block .megamenu-content').outerHeight( true );
    if (ww > 991) {
        if (navh >= wh) {
            $('.megamenu-block').css({'height':wh});
        } else {
            $('.megamenu-block').css({'height':'100%'});
        }
    } else {
        if (navh >= wh2) {
            $('.megamenu-block').css({'height':wh2});
        } else {
            $('.megamenu-block').css({'height':'100%'});
        }
    }
    $(window).resize(function(){
        var ww = $(window).width();
        var wh2 = $(window).height();
        var ms = $('.main-sticky').outerHeight( true );
        var wh = wh2 - ms;
        var navh = $('.megamenu-block .megamenu-content').outerHeight( true );
        if (ww > 991) {
            if (navh >= wh) {
                $('.megamenu-block').css({'height':wh});
            } else {
                $('.megamenu-block').css({'height':'100%'});
            }
        } else {
            if (navh >= wh2) {
                $('.megamenu-block').css({'height':wh2});
            } else {
                $('.megamenu-block').css({'height':'100%'});
            }
        }
    });
});

<a href="<?php echo wc_get_cart_url(); ?>" title="" class="cart-btn">
    <!-- <span class="fas fa-shopping-cart icon-cart" aria-hidden="true"></span> -->
    <img src="<?php echo ASSETS_URI . '/images/icon-02.png' ?>" alt="Icon" width="25" height="31">
    <span class="item-count"><?php echo  $woocommerce->cart->cart_contents_count ?></span>
</a>
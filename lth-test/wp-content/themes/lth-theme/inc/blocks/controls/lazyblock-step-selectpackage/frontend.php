<?php

/**
 * @block-slug  :   lth-step-selectpackage
 * @block-output:   lth_step_selectpackage_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-step-selectpackage/frontend_callback', 'lth_step_selectpackage_output_fe', 10, 2);

if (!function_exists('lth_step_selectpackage_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_step_selectpackage_output_fe($output, $attributes)
    {
        ob_start();

?>
        <artice class="lth-selectpackage <?php echo $attributes['class']; ?>">
            <div class="module module_selectpackage">
                <?php if ($attributes['title'] || $attributes['description']) : ?>
                    <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                        <?php if ($attributes['title']) : ?>
                            <h2 class="title">
                                <?php if ($attributes['title_url']) : ?>
                                    <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                    <?php else : ?>
                                        <span>
                                        <?php endif; ?>
                                        <?php echo wpautop(esc_html($attributes['title'])); ?>
                                        <?php if ($attributes['title_url']) : ?>
                                    </a>
                                <?php else : ?>
                                    </span>
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($attributes['description']) : ?>
                            <div class="infor">
                                <?php echo wpautop(esc_html($attributes['description'])); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="module_content">
                    <?php $i = 0;
                    foreach ($attributes['items'] as $inner) :
                        $i++;  ?>
                        <div class="item">
                            <div class="post-box <?php if ($i == 1) {echo 'active';} ?>">
                                <?php $price_old = $attributes['price_items'] * $inner['item_qty'];
                                $price_total = $inner['item_price'] * $inner['item_qty'];
                                $price_save = $price_old - $price_total; ?>
                                
                                <div class="post-header">
                                    <div>
                                        <span class="name">
                                            <?php echo __('Buy'); ?>
                                            <?php echo $inner['item_qty']; ?>
                                            <?php echo $attributes['name_items']; ?>
                                        </span>
                                        <span class="sale">
                                            <?php $sale = ($attributes['price_items'] -  $inner['item_price']) * 100 / $attributes['price_items'];
                                            echo round($sale) . '%'; ?>
                                        </span>
                                    </div>
                                    <div class="freeship">
                                        <i class="fas fa-truck"></i>
                                        <span><?php echo __('FAST SHIPPING'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="post-content">
                                    <?php if ($inner['item_image']) { ?>
                                        <div class="post-image">
                                            <div class="image">
                                                <img src="<?php echo esc_url($inner['item_image']['url']); ?>" alt="Team" width="auto" height="auto">
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="post-infor">
                                        <h3 class="post-name"><?php echo $inner['item_title']; ?></h3>
                                        <div class="post-qty" data_qty="<?php echo  $inner['item_qty']; ?>">
                                            <?php echo  $inner['item_qty'] . 'x ' . $inner['item_title']; ?>
                                        </div>
                                        <div class="post-price">
                                            <smail><?php echo __('Only'); ?></smail>
                                            <span><?php echo __('$') . $inner['item_price']; ?></span>
                                        </div>
                                        <div class="post-price-old">
                                            <span>
                                                <?php echo __('Orgi $') . $price_old; ?>
                                            </span>
                                        </div>
                                        <div class="post-price-save">
                                            <span><?php echo __('You Save: $') . $price_save . '!'; ?></span>
                                        </div>
                                        <div class="post-price-total">
                                            <span><?php echo __('Total: '); ?></span>
                                            <span class="total" data_price="<?php echo $price_total; ?>"><?php echo '$' . $price_total; ?></span>
                                        </div>
                                    </div>
                                    <div class="post-button">
                                        <span class="btn">
                                            <?php echo __('Select Package'); ?>
                                        </span>
                                        <span class="btn btn-Selected">
                                            <?php echo __('Selected'); ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="post-footer">
                                    <ul>
                                        <li><?php echo __('Built in timer with 4 modes'); ?></li>
                                        <li><?php echo __('Portable and compact design'); ?></li>
                                        <li><?php echo __('PTC ceramic technology'); ?></li>
                                        <li><?php echo __('Tip over safety feature'); ?></li>
                                        <li><?php echo __('Child, family & pet friendly'); ?></li>
                                        <li><?php echo __('3 second heat up time'); ?></li>
                                        <li><?php echo __('Energy efficient'); ?></li>
                                        <li><?php echo __('Environmentally friendly'); ?></li>
                                    </ul>
                                    <div class="post-bullet">
                                        <ul>
                                            <li>
                                                <?php echo __('Sell-Out Risk: '); ?>
                                                <span style="color:red;"><?php echo __('High'); ?></span>
                                            </li>
                                            <li>
                                                <strong><?php echo __('FAST SHIPPING'); ?></strong>
                                            </li>
                                            <li>
                                                <strong style="color:red;"><?php echo __('Discount: 70%'); ?></strong>
                                            </li>
                                            <li>
                                                <i class="fal fa-signal"></i>
                                                <strong><?php echo __(' Moderate'); ?></strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>  
                    
                    <div class="item item-selectpackage">
                        <div class="post-image">
                            <div class="image">
                                <img src="#" alt="Team" width="auto" height="auto">
                            </div>
                        </div>
                        <div class="post-content">
                            <ul>
                                <li class="order-summary-header">
                                    <i class="fad fa-shopping-cart"></i>
                                    <span class="order-summary-header-text">
                                        <?php echo __('Order Summary'); ?>
                                    </span>
                                </li>
                                <li>
                                    <strong><?php echo __('Item'); ?></strong>
                                    <strong><?php echo __('Price'); ?></strong>
                                </li>
                                <li class="selectpackage-name-price"></li>
                                <!-- <li>
                                    <span><?php //echo __('Alpha Heater - 3 Year Extended Warranty)') ?></span>
                                    <span class="price-02" data_price="10"><?php //echo __('$10'); ?></span>
                                </li>
                                <li>
                                    <span><?php //echo __('Remote Upgrade (Covers 3 Units)') ?></span>
                                    <span class="price-03" data_price="10"><?php //echo __('$10'); ?></span>
                                </li> -->
                                <li>
                                    <span><?php echo __('Shipping: (Est. 3-5 Business Days)') ?></span>
                                    <span class="price-shipping" data_price="5"><?php echo __('$5'); ?></span>
                                </li>
                                <li>
                                    <span><?php echo __('Shipping Method:') ?></span>
                                    <span><?php echo __('UPS Ground') ?></span>
                                </li>
                                <li>
                                    <strong><?php echo __("Today's Total:"); ?></strong>
                                    <strong class="price-kq"></strong>
                                </li>
                                <li class="package_addon_all d-none" data_package_addon_all=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </artice>

<?php
        return ob_get_clean();
    }
endif;
?>
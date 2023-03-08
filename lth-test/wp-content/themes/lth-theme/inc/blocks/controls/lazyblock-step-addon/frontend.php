<?php

/**
 * @block-slug  :   lth-step-addon
 * @block-output:   lth_step_addon_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-step-addon/frontend_callback', 'lth_step_addon_output_fe', 10, 2);

if (!function_exists('lth_step_addon_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_step_addon_output_fe($output, $attributes)
    {
        ob_start();
?>

        <article class="lth-addon">
            <div class="module module_addon">
                <?php if ($attributes['title'] || $attributes['description']) : ?>
                    <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                        <?php if ($attributes['title']) : ?>
                            <h2 class="title">
                                <?php if ($attributes['title_url']) : ?>
                                    <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                    <?php else : ?>
                                        <span>
                                        <?php endif; ?>
                                        <?php echo esc_html($attributes['title']); ?>
                                        <?php if ($attributes['title_url']) : ?>
                                    </a>
                                <?php else : ?>
                                    </span>
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($attributes['description']) : ?>
                            <div class="infor">
                                <p><?php echo esc_html($attributes['description']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="module_content">
                    <ul class="addon-box">
                        <?php $i = 0;
                        foreach ($attributes['items'] as $inner) :
                        $i++; ?>
                            <li class="add-box" data_i=<?php echo $i; ?> <?php if($inner['item_price']) { ?>data_add_price="<?php echo $inner['item_price']; ?>"<?php } else {?>data_add_price="0"<?php } ?>
                            data_select_package="<?php echo $inner['item_title_select_package']; ?>">
                                <label>
                                    <?php echo $inner['item_title']; ?>
                                </label>

                                <div class="content">
                                    <?php echo $inner['item_content']; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="addon-box-footer">
                    <div class="addon-button">
                        <button>
                            <?php echo __('Yes, Complete My Order '); ?>
                            <i class="fad fa-angle-double-right"></i>
                        </button>

                        <p><i class="fad fa-lock"></i><?php echo __(' 256-bit SSL Encrypted Checkout'); ?></p>
                    </div>

                    <div class="addon-guarantee">
                        <ul>
                            <li>
                                <div class="guarantee-container">
                                    <h3><?php echo __('Our Guarantee'); ?></h3>
                                    <div class="guarantee-item">
                                        <i class="fad fa-check-square"></i> 
                                        <?php echo __('No Hidden Fees'); ?>                                        
                                    </div>
                                    <div class="guarantee-item">
                                        <i class="fad fa-check-square"></i> 
                                        <?php echo __('30-DAYS MONEY BACK GUARANTEE'); ?>                                        
                                    </div>
                                </div>
                            </li>

                            <?php foreach ($attributes['items_2'] as $inner2) : ?>
                            <li>
                                <div class="item">
                                    <div class="item-image">
                                        <img src="<?php echo esc_url($inner2['item_image_2']['url']); ?>" alt="Team" width="auto" height="auto">
                                    </div>
                                    
                                    <div class="item-content">
                                        <h4><?php echo $inner2['item_title_2']; ?></h4>
                                        <p><?php echo $inner2['item_content_2']; ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </article>

<?php
        return ob_get_clean();
    }
endif;
?>
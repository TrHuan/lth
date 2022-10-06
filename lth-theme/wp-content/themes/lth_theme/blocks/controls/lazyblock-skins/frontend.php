<?php
/**
 * @block-slug  :   lth-skins
 * @block-output:   lth_skins_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-skins/frontend_callback', 'lth_skins_output_fe', 10, 2);

if (!function_exists('lth_skins_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_skins_output_fe($output, $attributes) {
        ob_start();
?>  
<article class="lth-skins">
    <div class="module module_skins">
        <?php if ($attributes['title'] || $attributes['description']) : ?>
            <div class="module_header title-box">
                <?php if (isset($attributes['title'])) : ?>
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

        <div class="module_content group-box">
            <?php foreach( $attributes['items'] as $inner ): ?>
                <div class="item">
                    <div class="content">
                        <div class="content-box">
                            <div class="content-line <?php echo $inner['animate']; ?>" style="overflow-x: hidden; position: relative;">
                                <h3 class="content-name" style="margin-bottom: 0;">
                                    <?php echo wpautop($inner['item_title']); ?>
                                </h3>
                                <div class="line-bg" style="width: 100%; height: 3px; background-color: #ebebeb; position: relative; z-index: 1;"></div>
                                <?php if ($inner['animate'] == 'yes') { ?>
                                    <div class="line-number wow slideInLeft" data-wow-duration="<?php echo $inner['animate_duration']; ?>" data-wow-delay="<?php echo $inner['animate_delay']; ?>" style="width:<?php echo $inner['item_number']; ?>; height: 3px; background-color: #000; position: absolute; bottom: 0; left: 0; z-index: 2;">
                                <?php } else { ?>
                                    <div class="line-number" style="width:<?php echo $inner['item_number']; ?>; height: 3px; background-color: #000; position: absolute; bottom: 0; left: 0; z-index: 2;">
                                <?php } ?>
                                    <span class="content-number" style="position: absolute; top: 0; right: 0; transform: translateY(-100%);">
                                        <?php echo $inner['item_number']; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="content-excerpt">
                                <?php echo wpautop($inner['item_text']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</article>
<?php
        return ob_get_clean();
    }
endif;
?>
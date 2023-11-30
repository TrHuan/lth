<?php

/**
 * @block-slug  :   lth-skills
 * @block-output:   lth_skills_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-skills/frontend_callback', 'lth_skills_output_fe', 10, 2);

if (!function_exists('lth_skills_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_skills_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-skills">
            <div class="module module_skills">
                <div class="module_content groups-box">
                    <?php foreach ($attributes['items'] as $inner) : ?>
                        <div class="item">
                            <div class="content">
                                <div class="content-box content-<?php echo $inner['animate_style']; ?>">
                                    <?php if ($inner['animate_style'] == 'circle') { ?>
                                        <div class="partial-circle">
                                            <div class="partial-border-circle wow flip" data-wow-duration="<?php echo $inner['animate_duration']; ?>" data-wow-delay="<?php echo $inner['animate_delay']; ?>">
                                                <span>
                                                    <?php echo $inner['item_number']; ?>
                                                </span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($inner['item_title']) { ?>
                                        <h3 class="content-name">
                                            <?php echo wpautop($inner['item_title']); ?>
                                        </h3>
                                    <?php } ?>
                                    <?php if ($inner['animate_style'] == 'line') { ?>
                                        <div class="content-line <?php echo $inner['animate']; ?>">
                                            <div class="line-bg"></div>
                                            <?php if ($inner['animate'] == 'yes') { ?>
                                                <div class="line-number wow slideInLeft" data-wow-duration="<?php echo $inner['animate_duration']; ?>" data-wow-delay="<?php echo $inner['animate_delay']; ?>" style="width:<?php echo $inner['item_number']; ?>;">
                                            <?php } else { ?>
                                                <div class="line-number" style="width:<?php echo $inner['item_number']; ?>;">
                                            <?php } ?>
                                                <span class="content-number">
                                                    <?php echo $inner['item_number']; ?>
                                                </span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($inner['item_text']) { ?>
                                        <div class="content-excerpt">
                                            <?php echo wpautop($inner['item_text']); ?>
                                        </div>
                                    <?php } ?>
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
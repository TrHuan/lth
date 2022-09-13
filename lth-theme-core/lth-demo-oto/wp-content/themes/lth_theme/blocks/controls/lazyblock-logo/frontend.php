<?php

/**
 * @block-slug  :   lth-logo
 * @block-output:   lth_logo_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-logo/frontend_callback', 'lth_logo_output_fe', 10, 2);

if (!function_exists('lth_logo_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_logo_output_fe($output, $attributes) {
        ob_start();
    
    if (!$attributes['logo_image']['url']) {
        $logo = get_field('logo', 'option');
        $w = get_field('width_logo', 'option');
        $h = get_field('height_logo', 'option');
    }
?>
<div class="lth-logo">
    <?php if ( is_front_page() || is_home() ) { ?>
        <?php if ($attributes['logo_image']['url']) { ?>
            <h1>
                <a href="<?php echo get_home_url( $lang ); ?>" title="">
                    <img src="<?php echo esc_url( $attributes['logo_image']['url']); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                </a>
                <a href="<?php echo get_home_url( $lang ); ?>" title="" class="title d-none">
                    <?php bloginfo('title'); ?>
                </a>
                <p class="infor d-none"><?php bloginfo('description'); ?></p>
            </h1>
        <?php } else {            
            if ($logo) { ?>
                <h1>
                    <a href="<?php echo get_home_url( $lang ); ?>" title="">
                        <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                    </a>
                    <a href="<?php echo get_home_url( $lang ); ?>" title="" class="title d-none">
                        <?php bloginfo('title'); ?>
                    </a>
                    <p class="infor d-none"><?php bloginfo('description'); ?></p>
                </h1>
            <?php } else { ?>
                <h1>
                    <a href="<?php echo get_home_url( $lang ); ?>" title="" class="title">
                        <?php bloginfo('title'); ?>
                    </a>
                    <p class="infor"><?php bloginfo('description'); ?></p>
                </h1>
            <?php }
        } ?>
    <?php } else { ?>
        <?php if ($attributes['logo_image']['url']) { ?>
            <a href="<?php echo get_home_url( $lang ); ?>" title="">
                <img src="<?php echo esc_url( $attributes['logo_image']['url']); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
            </a>
            <a href="<?php echo get_home_url( $lang ); ?>" title="" class="title d-none">
                <?php bloginfo('title'); ?>
            </a>
            <p class="infor d-none"><?php bloginfo('description'); ?></p>
        <?php } else {
            if ($logo) { ?>
                <a href="<?php echo get_home_url( $lang ); ?>" title="">
                    <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
                </a>
                <a href="<?php echo get_home_url( $lang ); ?>" title="" class="title d-none">
                    <?php bloginfo('title'); ?>
                </a>
                <p class="infor d-none"><?php bloginfo('description'); ?></p>
            <?php } else { ?>
                <h2>
                    <a href="<?php echo get_home_url( $lang ); ?>" title="" class="title">
                        <?php bloginfo('title'); ?>
                    </a>
                    <p class="infor"><?php bloginfo('description'); ?></p>
                </h2>
            <?php }
        } ?>
    <?php } ?>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>
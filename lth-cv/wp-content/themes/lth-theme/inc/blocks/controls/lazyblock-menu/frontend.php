<?php

/**
 * @block-slug  :   lth-menu
 * @block-output:   lth_menu_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-menu/frontend_callback', 'lth_menu_output_fe', 10, 2);

if (!function_exists('lth_menu_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_menu_output_fe($output, $attributes)
    {
        ob_start();

        $nav_menu    = get_term_by('slug', $attributes['menu_name'], 'nav_menu');
?>
        <article class="lth-menu <?php echo $attributes['class'];
        if ($attributes['menu_toggle'] != 'toggle_none') {
            echo 'menu_toggle';
        } ?>">
            <?php if (!empty($attributes['title']) || !empty($attributes['description'])) : ?>
                <div class="module_header title-box title-align-<?php echo $attributes['title_align'];
                if ($attributes['menu_toggle'] == 'toggle_show') {
                    echo ' active';
                } ?>">
                    <?php if (!empty($attributes['title'])) : ?>
                        <h2 class="title">
                            <?php if (!empty($attributes['url'])) : ?>
                                <a href="<?php echo esc_url($attributes['url']); ?>" title="">
                            <?php endif; ?>
                        <?php echo wpautop(esc_html($attributes['title'])); ?>
                            <?php if (!empty($attributes['url'])) : ?>
                                </a>
                            <?php endif; ?>
                                
                            <?php if ($attributes['menu_toggle'] != 'toggle_none') { ?>
                                <i class="fal fa-angle-down icon"></i>
                                <!-- <i class="fal fa-angle-down icon icon-plus"></i> -->
                                <!-- <i class="fal fa-angle-up icon icon-minus"></i> -->
                            <?php } ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($attributes['description'])) : ?>
                        <div class="infor">
                            <?php echo wpautop(esc_html($attributes['description'])); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="module_content <?php if ($attributes['menu_toggle'] == 'toggle_show') {
                echo 'slow';
            } ?>" <?php 
            if ($attributes['menu_toggle'] == 'toggle_hidden') {
                echo 'style="display: none;"';
            } ?>>
                <div class="menus">
                    <?php if (!is_wp_error($nav_menu) && is_object($nav_menu) && !empty($nav_menu)) : ?>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu'            => $nav_menu->slug,
                                'theme_location'  => $nav_menu->slug,
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu',
                            )
                        );
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </article>
<?php
        return ob_get_clean();
    }
endif;
?>
<?php
class create_widget_menu extends WP_Widget
{

    /*constructor*/
    function create_widget_menu()
    {
        parent::WP_Widget(false, $name = 'Menu');
    }

    /**/
    function widget($args, $instance)
    {
        extract($args);

        // widget options
        $title = apply_filters('widget_title', $instance['title']);
        $nav_menu1 = !empty($instance['nav_menu']) ? wp_get_nav_menu_object($instance['nav_menu']) : false;

        echo $before_widget;

        echo '<div class="nav-menus">';

        if ($title) {
            echo $before_title . $title . $after_title;
        }

        if ($nav_menu1) { ?>
            <div class="menus <?php if (get_field('class', 'widget_' . $widget_id) != 'none') { ?> megamenu-<?php the_field('class', 'widget_' . $widget_id); ?><?php } ?>">
                <div class="menu-open d-none">
                    <a href="#" title="" data_toggle="menu-content" class="menu-icon">
                        <i class="icofont-minus"></i>
                        <i class="icofont-minus"></i>
                        <i class="icofont-minus"></i>
                    </a>
                </div>

                <div class="menu-content">
                    <div class="menu-close d-none">
                        <a href="#" title="" data_toggle="menu-content" class="menu-icon">
                            <i class="icofont-close"></i>
                        </a>
                    </div>

                    <?php echo wp_nav_menu(array('fallback_cb' => '', 'menu' => $nav_menu1)); ?>
                </div>
            </div>
        <?php }


        if ($checkbox == true) {
            echo 'This message is displayed if our checkbox is checked.';
        }

        echo '</div>';

        echo $after_widget;
    }

    /* display widget in widgets panel */
    function form($instance)
    {
        $title = esc_attr($instance['title']);

        $nav_menu = isset($instance['nav_menu']) ? $instance['nav_menu'] : '';
        $menus = get_terms('nav_menu', array('hide_empty' => false));

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Tiêu Đề:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
                <?php
                foreach ($menus as $menu) {
                    echo '<option value="' . $menu->term_id . '"'
                        . selected($nav_menu, $menu->term_id, false)
                        . '>' . $menu->name . '</option>';
                }
                ?>
            </select>
        </p>

<?php
    }

    /* saves options chosen from the widgets panel */
    function update($new_instance, $old_instance)
    {
        parent::update($new_instance, $old_instance);
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        return $instance;
    }
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("create_widget_menu");'));

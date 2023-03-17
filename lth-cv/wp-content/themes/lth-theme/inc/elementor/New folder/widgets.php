<?php
function register_new_widgets( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/widget-1.php' );
    $widgets_manager->register( new \Elementor_Widget_1() );

    require_once( __DIR__ . '/widgets/brands.php' );
    $widgets_manager->register( new \Elementor_Widget_Brands() );

}
add_action( 'elementor/widgets/register', 'register_new_widgets' );
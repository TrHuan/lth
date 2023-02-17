<?php

// https://developers.elementor.com/docs/widgets/

function unregister_widgets( $widgets_manager ) {
    $widgets_manager->unregister( 'heading' );
    $widgets_manager->unregister( 'image' );
    $widgets_manager->unregister( 'text-editor' );
    $widgets_manager->unregister( 'button' );
    $widgets_manager->unregister( 'icon' );
    
	$widgets_manager->unregister( 'image-box' );
	$widgets_manager->unregister( 'icon-box' );
	$widgets_manager->unregister( 'star-rating' );
	// $widgets_manager->unregister( 'carousel' );
	$widgets_manager->unregister( 'image-gallery' );
	$widgets_manager->unregister( 'icon-list' );
	$widgets_manager->unregister( 'counter' );
	$widgets_manager->unregister( 'progress' );
	$widgets_manager->unregister( 'testimonial' );
	$widgets_manager->unregister( 'accordion' );
	$widgets_manager->unregister( 'toggle' );
	$widgets_manager->unregister( 'social-icons' );
	$widgets_manager->unregister( 'alert' );
	$widgets_manager->unregister( 'html' );
	$widgets_manager->unregister( 'menu-anchor' );
	$widgets_manager->unregister( 'sidebar' );
	// $widgets_manager->unregister( 'excerpt' );
	// $widgets_manager->unregister( 'textpath' );
}
add_action( 'elementor/widgets/register', 'unregister_widgets' );

function unregister_elementor_widgets_categories() {
    $elementor = \Elementor\Plugin::instance();
    $widgets = $elementor->widgets_manager->get_widget_types();
    foreach ( $widgets as $widget ) {
        if ( in_array( 'wordpress', $widget->get_categories() ) ) {
            $elementor->widgets_manager->unregister_widget_type( $widget->get_name() );
        }
    }
}
add_action( 'elementor/widgets/widgets_registered', 'unregister_elementor_widgets_categories' );

require_once(LIBS_DIR . '/elementor/widgets.php');
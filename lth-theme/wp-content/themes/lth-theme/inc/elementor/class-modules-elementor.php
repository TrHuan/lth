<?php

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

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Modules class
 */
class Modules {

    /**
     * @var Module_Base[]
     */
    private static $instance = null;
    private $mod_path = ELEMENTOR_DIR . '/components';

    public static function get_instance() {
        if ( ! self::$instance )
            self::$instance = new self;
        return self::$instance;
    }

    public function init(){        
        add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );        
        add_action( 'elementor/widget/posts/skins_init',  array( $this,'skin_registered'), 1 );
    }

    public function skin_registered($widget) {
        // We check if the Elementor plugin has been installed / activated.
        if(defined('ELEMENTOR_PATH') && class_exists('ElementorPro\Modules\Posts\Skins\Skin_Cards')){
            $path = $this->mod_path .'/*/skins'; 
            $skin_name = glob($path.'/skin-*.php');
            foreach ( $skin_name as $skin ) {
                require_once $skin;
            }
        }
    }

    public function widgets_registered() {

        // We check if the Elementor plugin has been installed / activated.
        if( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ){

            $path = $this->mod_path .'/*/widgets'; 
            // echo $path;

            $module_name = glob($path.'/widget-*.php');
            foreach ( $module_name as $widget ) {
                require_once( $widget );
            }
        }
    }   
}

Modules::get_instance()->init();
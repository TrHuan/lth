<?php

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
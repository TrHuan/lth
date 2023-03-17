<?php
namespace Elementor;

use Modules;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Lth_Banner extends Widget_Base {

	// public $repeater = new \Elementor\Repeater();	

   public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      // wp_register_script( 'lth-custom-elementor-scripts', plugin_dir_url(__FILE__) . 'assets/js/lth-elementor.js', [], '1.0.0', true );
      // wp_register_style( 'style-handle', 'path/to/file.css');
   }

   // public function get_script_depends() {
   //     return [ 'lth-custom-elementor-scripts' ];
   // }

   // public function get_style_depends() {
   //     return [ 'style-handle' ];
   // }

	// 1. Config settings
	private $settings = [
		'name'	=> 'lth-banner',
		'title'	=> 'LTH: Banner',
		'icon'	=> 'eicon-parallax',
	];

	// method list
	public function get_name() {
		return $this->settings['name'];
	}

	public function get_title() {
		return __( $this->settings['title'] , 'lth' );
	}

	public function get_icon() {
		return $this->settings['icon'];
	}

	// public function get_categories() {
	// 	return [ 'LTH' ];
	// }

	// 2. Define Controls
	protected function _register_controls() {

		/*
		 * start control section and followup with adding control fields.
		 * end control after all control field and repeat if you need other control section respectively.
		*/	

		// Start Section
		$this->start_controls_section(
			'section_query_basic',
			[
				'label' => esc_html__( 'Basic', 'lth' ),
			]
		);

		$this->add_control(
			'widget_image', [
				'label' => __( 'Image', 'lth' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'widget_text', [
				'label' => __( 'Text', 'lth' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'widget_url', [
				'label' => __( 'Url', 'lth' ),
				'type' => \Elementor\Controls_Manager::URL,
			]
		);

		$this->add_control(
			'widget_text_top', [
				'label' => __( 'Top', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_text_bottom', [
				'label' => __( 'Bottom', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_text_left', [
				'label' => __( 'Left', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_text_right', [
				'label' => __( 'Right', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_text_translate', [
				'label' => __( 'Translate', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_class', [
				'label' => __( 'Class', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();
		// End Section

	}

	// 3. Render views
	protected function render( $instance = [] ) {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display(); ?>		

		<?php // include all views files
		require dirname(__DIR__) . '/views/frontend.tpl.php';

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Lth_Banner() );

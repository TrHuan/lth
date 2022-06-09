<?php
namespace Elementor;

use Modules;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Lth_Banner extends Widget_Base {

	// public $repeater = new \Elementor\Repeater();	

   public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'lth-custom-elementor-scripts', ELEMENTOR_URI . '/assets/js/lth-elementor.js', [], '1.0.0', true );

      wp_register_style( 'lth-custom-elementor-style', ELEMENTOR_URI . '/assets/css/lth-elementor.css');
   }

   public function get_script_depends() {
       return [ 'lth-custom-elementor-scripts' ];
   }

   public function get_style_depends() {
       return [ 'lth-custom-elementor-style' ];
   }

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

	public function get_categories() {
		return [ 'basic' ];
	}

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
			'image',
			[
				'label' => __( 'Image', 'lth' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => 'true',
				'title' => __( 'Image', 'lth' ),
			]
		);

		$this->add_control(
			'text_1',
			[
				'label' => __( 'Text 1', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => 'true',
				'title' => __( 'Text 1', 'lth' ),
			]
		);

		$this->add_control(
			'text_2',
			[
				'label' => __( 'Text 2', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => 'true',
				'title' => __( 'Text 2', 'lth' ),
			]
		);

		$this->add_control(
			'text_3',
			[
				'label' => __( 'Text 3', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => 'true',
				'title' => __( 'Text 3', 'lth' ),
			]
		);

		$this->add_control(
			'text_url',
			[
				'label' => __( 'Text Url', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => 'true',
				'title' => __( 'Text Url', 'lth' ),
			]
		);

		$this->add_control(
			'text_url_link',
			[
				'label' => __( 'Url', 'lth' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => 'true',
				'title' => __( 'Url', 'lth' ),
			]
		);

		$this->end_controls_section();
		// End Section

		// Start Section
		$this->start_controls_section(
			'section_query_image',
			[
				'label' => esc_html__( 'Setting Image', 'lth' ),
			]
		);

		$this->add_control(
			'image_width',
			[
				'label' => __( 'Width', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Width', 'lth' ),
				'default' => '',
			]
		);

		$this->add_control(
			'image_height',
			[
				'label' => __( 'Height', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Height', 'lth' ),
				'default' => '',
			]
		);

		$this->end_controls_section();
		// End Section

		// Start Section
		$this->start_controls_section(
			'section_query_text',
			[
				'label' => esc_html__( 'Setting Text', 'lth' ),
			]
		);

		$this->add_control(
			'text_align',
			[
				'label' => __( 'Text Align', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Text Align', 'lth' ),
				'default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'lth' ),
					'center'  => __( 'Center', 'lth' ),
					'right'  => __( 'Right', 'lth' ),
				]
			]
		);

		$this->end_controls_section();
		// End Section

		// Start Section
		$this->start_controls_section(
			'section_query_class',
			[
				'label' => esc_html__( 'Class', 'lth' ),
			]
		);

		$this->add_control(
			'class',
			[
				'label' => __( 'Class', 'lth' ),
				'type' => Controls_Manager::TEXTAREA ,
				'label_block' => 'true',
				'title' => __( 'Class', 'lth' ),
				'default' => '',
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

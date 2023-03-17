<?php
namespace Elementor;

use Modules;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Lth_Brand extends Widget_Base {

	// public $repeater = new \Elementor\Repeater();	

	public function get_style_depends() {
		// wp_register_style( 'widget-style-1', plugins_url( 'assets/css/widget-style-1.css', __FILE__ ) );

		// return [
		// 	'widget-style-1',
		// ];

	}

    public function get_script_depends() {
		// wp_register_script( 'lth-custom-elementor-scripts', ELEMENTOR_DIR . '/assets/js/lth-elementor.js', [], '1.0.0', true );

		// return [
		// 	'lth-custom-elementor-scripts',
		// ];
	}

	// 1. Config settings
	private $settings = [
		'name'	=> 'lth-brand',
		'title'	=> 'LTH: Brand',
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
	protected function register_controls() {
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'widget_item_image', [
				'label' => __( 'Image', 'lth' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'widget_item_url', [
				'label' => __( 'Url', 'lth' ),
				'type' => \Elementor\Controls_Manager::URL,
			]
		);

		$this->add_control(
			'widget_items',
			[
				'label' => __( 'Brand', 'lth' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->add_control(
			'widget_item', [
				'label' => __( 'Item', 'lth' ),
				'default' => '4',
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_item_lg', [
				'label' => __( 'Item (1199 >= item >= 992)', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_item_md', [
				'label' => __( 'Item (991 >= item >= 768)', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_item_sm', [
				'label' => __( 'Item (767 >= item >= 576)', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_item_mb', [
				'label' => __( 'Item (575 >= item)', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_item_row', [
				'label' => __( 'Row', 'lth' ),
				'default' => '1',
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'widget_item_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'lth' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'True', 'lth' ),
					'false' => esc_html__( 'False', 'lth' ),
				],
				'selectors' => [
					'{{WRAPPER}} .your-class-select' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'widget_item_arrows',
			[
				'label' => esc_html__( 'Arrows', 'lth' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'True', 'lth' ),
					'false' => esc_html__( 'False', 'lth' ),
				],
				'selectors' => [
					'{{WRAPPER}} .your-class-select' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'widget_item_dots',
			[
				'label' => esc_html__( 'Dots', 'lth' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'True', 'lth' ),
					'false' => esc_html__( 'False', 'lth' ),
				],
				'selectors' => [
					'{{WRAPPER}} .your-class-select' => 'border-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'widget_item_vertical',
			[
				'label' => esc_html__( 'Vertical', 'lth' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'True', 'lth' ),
					'false' => esc_html__( 'False', 'lth' ),
				],
				'selectors' => [
					'{{WRAPPER}} .your-class-select' => 'border-style: {{VALUE}};',
				],
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
		$settings = $this->get_settings_for_display();
		
		// include all views files
		require dirname(__DIR__) . '/views/frontend.tpl.php';

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Lth_Brand() );

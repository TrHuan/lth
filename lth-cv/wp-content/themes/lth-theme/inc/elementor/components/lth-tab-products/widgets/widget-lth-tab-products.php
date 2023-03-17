<?php
namespace Elementor;

use Modules;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Lth_Tab_Products extends Widget_Base {

	// $categories = get_terms('product_cat');

 //   $cat_list = array();
 //   $cat_select_list = array();
 //   foreach ($categories as $cat) {
 //      $cat->cat_ID => $cat->cat_name;
 //   }

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
		'name'	=> 'lth-tab-products',
		'title'	=> 'LTH: Tab Products',
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
			'heading_text',
			[
				'label' => __( 'Heading Text', 'lth' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __( 'Enter some text', 'lth' ),
			]
		);

		$this->add_control(
			'url_text',
			[
				'label' => __( 'URL', 'lth' ),
				'type' => Controls_Manager::URL,
				'default' => '',
				'title' => __( 'Enter some text', 'lth' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => __( 'Description Text', 'lth' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'title' => __( 'Enter some text', 'lth' ),
			]
		);

		$this->add_control(
			'style_items',
			[
				'label' => __( 'Styles', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'title' => __( 'Enter some text', 'lth' ),
				'default' => 1,
				'options' => [
					1  => __( 'Style 01', 'lth' ),
					2  => __( 'Style 02', 'lth' ),
				]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$repeater->add_control(
			'list_products', [
				'label' => __( 'Products', 'lth' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 1,
				'options' => [
					1  => __( 'New', 'lth' ),
					2  => __( 'Featured', 'lth' ),
					3  => __( 'Best Seller', 'lth' ),
				]
			]
		);

		$repeater->add_control(
			'list_categories', [
				'label' => __( 'Categories', 'lth' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Tab Item', 'lth' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Lth_Tab_Products() );

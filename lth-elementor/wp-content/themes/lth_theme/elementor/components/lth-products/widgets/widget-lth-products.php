<?php
namespace Elementor;

use Modules;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Lth_Products extends Widget_Base {

	private $choices_cat = array();
	private $choices_post = array();

   public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      $cat_args = array(
			'orderby'    => 'name',
			'order'      => 'asc',
			'hide_empty' => 'false',
		);
		$categories = get_terms('product_cat', $cat_args);
		foreach( $categories as $cat ) {
			$this->choices_cat[$cat->term_id] = $cat->name.' (Id = '.$cat->term_id.')';
		}

		$args     = array('post_type' => 'product');
    	$products = get_posts( $args );
    	foreach($products as $product) {
        $this->choices_post[$product->ID] = $product->post_title.' (Id = '.$product->ID.')';
    }

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
		'name'	=> 'lth-products',
		'title'	=> 'LTH: Products',
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
			'style_items',
			[
				'label' => __( 'Styles', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Enter some text', 'lth' ),
				'default' => 1,
				'options' => [
					1  => __( 'Style 01', 'lth' ),
					2  => __( 'Style 02', 'lth' ),
				]
			]
		);

		$this->add_control(
			'heading_text',
			[
				'label' => __( 'Heading Text', 'lth' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => 'true',
				'default' => '',
				'title' => __( 'Enter some text', 'lth' ),
			]
		);

		$this->add_control(
			'url_text',
			[
				'label' => __( 'URL', 'lth' ),
				'type' => Controls_Manager::URL,
				'label_block' => 'true',
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

		$this->end_controls_section();
		// End Section

		// Start Section
		$this->start_controls_section(
			'section_query_posts',
			[
				'label' => esc_html__( 'Products', 'lth' ),
			]
		);		

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_item',
			[
				'label' => __( 'Category', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Enter some text', 'lth' ),
				'multiple' => true,
				'default' => '',
				'options' => $this->choices_cat,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Categories', 'lth' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->add_control(
			'show_cat',
			[
				'label' => __( 'Show Categories', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Show Categories', 'lth' ),
				'default' => 'yes',
				'options' => [
					'yes'  => __( 'Yes', 'lth' ),
					'no'  => __( 'No', 'lth' ),
				]
			]
		);

		$this->add_control(
			'post_number',
			[
				'label' => __( 'Post Number', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Post Number', 'lth' ),
				'default' => '',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Orderby', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Orderby', 'lth' ),
				'default' => 'id',
				'options' => [
					'title'  => __( 'Title', 'lth' ),
					'id'  => __( 'ID', 'lth' ),
					'rand'  => __( 'Rand', 'lth' ),
				]
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Order', 'lth' ),
				'default' => 'DESC',
				'options' => [
					'DESC'  => __( 'DESC', 'lth' ),
					'ASC'  => __( 'ASC', 'lth' ),
				]
			]
		);

		$this->end_controls_section();
		// End Section

		// Start Section
		$this->start_controls_section(
			'section_query_choices_posts',
			[
				'label' => esc_html__( 'Choices Products', 'lth' ),
			]
		);

		$this->add_control(
			'choice_posts',
			[
				'label' => __( 'Choice Products', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Choice Products', 'lth' ),
				'default' => 'no',
				'options' => [
					'yes'  => __( 'Yes', 'lth' ),
					'no'  => __( 'No', 'lth' ),
				]
			]
		);

		// $this->add_control(
		// 	'posts',
		// 	[
		// 		'label' => __( 'Posts', 'lth' ),
		// 		'type' => Controls_Manager::SELECT2 ,
		// 		'label_block' => 'true',
		// 		'title' => __( 'Posts', 'lth' ),
		// 		'multiple' => true,
		// 		'default' => 'DESC',
		// 		'options' => $this->choices_post,
		// 	]
		// );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_post_item',
			[
				'label' => __( 'Product', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Enter some text', 'lth' ),
				'multiple' => true,
				'default' => '',
				'options' => $this->choices_post,
			]
		);

		$this->add_control(
			'list_post',
			[
				'label' => __( 'Products', 'lth' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();
		// End Section

		// Start Section
		$this->start_controls_section(
			'section_query_item',
			[
				'label' => esc_html__( 'Setting Item', 'lth' ),
			]
		);

		$this->add_control(
			'item',
			[
				'label' => __( 'Item (Item >= 1200)', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Item', 'lth' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'item_lg',
			[
				'label' => __( 'Item (1199 >= Item >= 992)', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Item', 'lth' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'item_md',
			[
				'label' => __( 'Item (991 >= Item >= 768)', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Item', 'lth' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'item_sm',
			[
				'label' => __( 'Item (767 >= Item >= 576)', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Item', 'lth' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'item_mb',
			[
				'label' => __( 'Item (575 >= Item)', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Item', 'lth' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'item_row',
			[
				'label' => __( 'Row', 'lth' ),
				'type' => Controls_Manager::TEXT ,
				'label_block' => 'true',
				'title' => __( 'Row', 'lth' ),
				'default' => '1',
			]
		);

		$this->add_control(
			'item_autoplay',
			[
				'label' => __( 'Autoplay', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Autoplay', 'lth' ),
				'default' => 'false',
				'options' => [
					'true'  => __( 'True', 'lth' ),
					'false'  => __( 'False', 'lth' ),

				]
			]
		);

		$this->add_control(
			'item_arrows',
			[
				'label' => __( 'Arrows', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Arrows', 'lth' ),
				'default' => 'false',
				'options' => [
					'true'  => __( 'True', 'lth' ),
					'false'  => __( 'False', 'lth' ),

				]
			]
		);

		$this->add_control(
			'item_dots',
			[
				'label' => __( 'Dots', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Dots', 'lth' ),
				'default' => 'false',
				'options' => [
					'true'  => __( 'True', 'lth' ),
					'false'  => __( 'False', 'lth' ),

				]
			]
		);

		$this->add_control(
			'item_vertical',
			[
				'label' => __( 'Vertical', 'lth' ),
				'type' => Controls_Manager::SELECT ,
				'label_block' => 'true',
				'title' => __( 'Vertical', 'lth' ),
				'default' => 'false',
				'options' => [
					'true'  => __( 'True', 'lth' ),
					'false'  => __( 'False', 'lth' ),

				]
			]
		);

		$this->end_controls_section();
		// End Section

		// Start Section
		// $this->start_controls_section(
		// 	'section_query_image',
		// 	[
		// 		'label' => esc_html__( 'Setting Image', 'lth' ),
		// 	]
		// );

		// $this->add_control(
		// 	'image_width',
		// 	[
		// 		'label' => __( 'Width', 'lth' ),
		// 		'type' => Controls_Manager::TEXT ,
		//			'label_block' => 'true',
		// 		'title' => __( 'Width', 'lth' ),
		// 		'default' => '',
		// 	]
		// );

		// $this->add_control(
		// 	'image_height',
		// 	[
		// 		'label' => __( 'Height', 'lth' ),
		// 		'type' => Controls_Manager::TEXT ,
		//			'label_block' => 'true',
		// 		'title' => __( 'Height', 'lth' ),
		// 		'default' => '',
		// 	]
		// );

		// $this->end_controls_section();
		// End Section

		// Start Section
		// $this->start_controls_section(
		// 	'section_query_text',
		// 	[
		// 		'label' => esc_html__( 'Setting Text', 'lth' ),
		// 	]
		// );

		// $this->add_control(
		// 	'text_align',
		// 	[
		// 		'label' => __( 'Text Align', 'lth' ),
		// 		'type' => Controls_Manager::SELECT ,
		//			'label_block' => 'true',
		// 		'title' => __( 'Text Align', 'lth' ),
		// 		'default' => 'left',
		// 		'options' => [
		// 			'left'  => __( 'Left', 'lth' ),
		// 			'center'  => __( 'Center', 'lth' ),
		// 			'right'  => __( 'Right', 'lth' ),
		// 		]
		// 	]
		// );

		// $this->end_controls_section();
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
		$settings = $this->get_settings_for_display();

		// include all views files
		require dirname(__DIR__) . '/views/frontend.tpl.php';

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Lth_Products() );

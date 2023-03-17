<?php
class Elementor_Widget_Brands extends \Elementor\Widget_Base {

    public function get_style_depends() {

		// wp_register_style( 'widget-style-1', plugins_url( 'assets/css/widget-style-1.css', __FILE__ ) );

		// return [
		// 	'widget-style-1',
		// ];

	}

    public function get_script_depends() {
		// wp_register_script( 'widget-script-1', plugins_url( 'assets/js/widget-script-1.js', __FILE__ ) );

		// return [
		// 	'widget-script-1',
		// ];
	}

	public function get_name() {
		return 'lth-brands';
	}

	public function get_title() {
		return esc_html__( 'LTH: Brands', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'keyword', 'keyword' ];
	}

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
    
	protected function render() {
        $settings = $this->get_settings_for_display(); ?>

		<article class="lth-brands <?php echo $settings['widget_class']; ?>">
			<div class="module module_brands">
				<div class="module_content">
					<div class="swiper swiper-slider swiper-brands" data-item="<?php echo $settings['widget_item']; ?>" 
					data-item_lg="<?php echo $settings['widget_item_lg']; ?>" data-item_md="<?php echo $settings['widget_item_md']; ?>" 
					data-item_sm="<?php echo $settings['widget_item_sm']; ?>" data-item_mb="<?php echo $settings['widget_item_mb']; ?>" 
					data-row="<?php echo $settings['widget_item_row']; ?>" data-dots="<?php echo $settings['widget_item_dots']; ?>" 
					data-arrows="<?php echo $settings['widget_item_arrows']; ?>" data-vertical="<?php echo $settings['widget_item_vertical']; ?>" 
					data-autoplay="<?php echo $settings['widget_item_autoplay']; ?>">
					<?php foreach ($settings['widget_items'] as $item) : ?>
							<div class="swiper-slide item">
								<div class="content">
								<div class="content-image">
										<a href="<?php echo esc_url($item['widget_item_url']['url']); ?>" title="" class="image">
											<img src="<?php echo esc_url($item['widget_item_image']['url']); ?>" alt="Brand" width="auto" height="auto">
										</a>
								</div>
								</div>
							</div>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
		</article>
    <?php }

	protected function content_template() { ?>
    
        <!-- Text Control -->
        <h2>
			{{{ settings.widget_class }}}
		</h2>
    <?php }

}
<?php
class Elementor_Widget_1 extends \Elementor\Widget_Base {

    public function get_style_depends() {

		wp_register_style( 'widget-style-1', plugins_url( 'assets/css/widget-style-1.css', __FILE__ ) );

		return [
			'widget-style-1',
		];

	}

    public function get_script_depends() {
		wp_register_script( 'widget-script-1', plugins_url( 'assets/js/widget-script-1.js', __FILE__ ) );

		return [
			'widget-script-1',
		];
	}

	public function get_name() {
		return 'widget_name';
	}

	public function get_title() {
		return esc_html__( 'My Widget Name', 'textdomain' );
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

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        // Text Control
        $this->add_control(
			'widget_text',
			[
				'label' => esc_html__( 'Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Text', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your text here', 'textdomain' ),
			]
		);

        // Number Control
        $this->add_control(
			'widget_number',
			[
				'label' => esc_html__( 'Number', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 5,
				'default' => 10,
			]
		);

        // Textarea Control
        $this->add_control(
			'widget_textarea',
			[
				'label' => esc_html__( 'Textarea', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Textarea', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your textarea here', 'textdomain' ),
			]
		);

        // WYSIWYG Control
        $this->add_control(
			'widget_wysiwyg',
			[
				'label' => esc_html__( 'Wysiwyg', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default wysiwyg', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your wysiwyg here', 'textdomain' ),
			]
		);

        // Code Control
        $this->add_control(
			'widget_code',
			[
				'label' => esc_html__( 'Code', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 20,
			]
		);

        // Hidden Control
        $this->add_control(
			'widget_hidden',
			[
				'label' => esc_html__( 'Hidden', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HIDDEN,
				'default' => 'Hidden',
			]
		);

        // Switcher Control
        $this->add_control(
			'widget_switcher',
			[
				'label' => esc_html__( 'Switcher', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        // Popover Toggle Control
        $this->add_control(
			'widget_popover_toggle',
			[
				'label' => esc_html__( 'Popover Toggle', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => esc_html__( 'Default', 'textdomain' ),
				'label_on' => esc_html__( 'Custom', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->start_popover();

		$this->add_control(
			'widget_popover_toggle_text',
			[
				'label' => esc_html__( 'Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Text', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your text here', 'textdomain' ),
			]
		);

		$this->end_popover();
        // End Popover Toggle Control

        // Select Control
        $this->add_control(
			'widget_select',
			[
				'label' => esc_html__( 'Select', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'' => esc_html__( 'Default', 'textdomain' ),
					'none' => esc_html__( 'None', 'textdomain' ),
					'solid'  => esc_html__( 'Solid', 'textdomain' ),
					'dashed' => esc_html__( 'Dashed', 'textdomain' ),
					'dotted' => esc_html__( 'Dotted', 'textdomain' ),
					'double' => esc_html__( 'Double', 'textdomain' ),
				],
				'selectors' => [
					'{{WRAPPER}} .your-class-select' => 'border-style: {{VALUE}};',
				],
			]
		);

        // Select2 Control
        $this->add_control(
			'widget_select2',
			[
				'label' => esc_html__( 'Select2', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => [
					'title'  => esc_html__( 'Title', 'textdomain' ),
					'description' => esc_html__( 'Description', 'textdomain' ),
					'button' => esc_html__( 'Button', 'textdomain' ),
				],
				'default' => [ 'title', 'description' ],
			]
		);

        // Choose Control
        $this->add_control(
			'widget_choose',
			[
				'label' => esc_html__( 'Choose', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .your-class-choose' => 'text-align: {{VALUE}};',
				],
			]
		);

        // Color Control
        $this->add_control(
			'widget_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class-color' => 'color: {{VALUE}}',
				],
			]
		);

        // Icon Control
        $this->add_control(
			'widget_icon',
			[
				'label' => esc_html__( 'Icons', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'include' => [
					'fa fa-facebook',
					'fa fa-flickr',
					'fa fa-google-plus',
					'fa fa-instagram',
					'fa fa-linkedin',
					'fa fa-pinterest',
					'fa fa-reddit',
					'fa fa-twitch',
					'fa fa-twitter',
					'fa fa-vimeo',
					'fa fa-youtube',
				],
				'default' => 'fa fa-facebook',
			]
		);

        // Font Control
        $this->add_control(
			'widget_font_family',
			[
				'label' => esc_html__( 'Font Family', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .your-class-font-family' => 'font-family: {{VALUE}}',
				],
			]
		);

        // Date Time Control
        $this->add_control(
			'widget_date_time',
			[
				'label' => esc_html__( 'Date Time', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);

        // Gallery Control
        $this->add_control(
			'widget_gallery',
			[
				'label' => esc_html__( 'Add Images', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);

        // Repeater Control
        $this->add_control(
			'widget_repeater',
			[
				'label' => esc_html__( 'Repeater List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'textdomain' ),
						'label_block' => true,
					],
					[
						'name' => 'list_content',
						'label' => esc_html__( 'Content', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'List Content' , 'textdomain' ),
						'show_label' => false,
					],
					[
						'name' => 'list_color',
						'label' => esc_html__( 'Color', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
						],
					]
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

        // Animation Control
        $this->add_control(
			'widget_animation',
			[
				'label' => esc_html__( 'Animation', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			]
		);

        // Exit Animation Control
        $this->add_control(
			'widget_exit_animation',
			[
				'label' => esc_html__( 'Exit Animation', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::EXIT_ANIMATION,
				'prefix_class' => 'animated ',
			]
		);

        // Hover Animation Control
        $this->add_control(
			'widget_hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

        // URL Control
        $this->add_control(
			'widget_url',
			[
				'label' => esc_html__( 'Url', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

        // Media Control
        $this->add_control(
			'widget_media',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        // Slider Control
        $this->add_control(
			'widget_slider',
			[
				'label' => esc_html__( 'Width', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .your-class-slider' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        // Dimensions Control
        $this->add_control(
			'widget_dimensions',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .your-class-dimensions' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}
    
	protected function render() {
        $settings = $this->get_settings_for_display(); ?>

        <!-- Text Control -->
        <h2>
			<?php echo $settings['widget_text']; ?>
		</h2>

        <!-- Number Control -->
        <p>
			<?php echo $settings['widget_number']; ?>
        </p>

        <!-- Textarea Control -->
        <p>
			<?php echo $settings['widget_textarea']; ?>
		</p>

        <!-- WYSIWYG Control -->
        <div>
			<?php echo $settings['widget_wysiwyg']; ?>
		</div>

        <!-- Code Control -->
        <?php echo $settings['widget_code']; ?>

        <!-- Hidden Control -->
        <?php echo $settings['widget_hidden']; ?>

        <!-- Switcher Control -->
        <p>
            <?php if ( 'yes' === $settings['widget_switcher'] ) {
                echo 'Switcher';
            } ?>
        </p>

        <!-- Popover Toggle Control -->
        <h2>
			<?php echo $settings['widget_popover_toggle_text']; ?>
		</h2>

        <!-- Select Control -->
        <div class="your-class-select">
			... Select ...
		</div>

        <!-- Select2 Control -->
        <?php if ( $settings['widget_select2'] ) {
			echo '<ul>';
			foreach ( $settings['widget_select2'] as $item ) {
				echo '<li>' . $item . '</li>';
			}
			echo '</ul>';
		} ?>

        <!-- Choose Control -->
        <div class="your-class-choose">
			... Alignment ...
		</div>

        <!-- Color Control -->
        <div class="your-class-color">
			... Color ...
		</div>

        <!-- Icon Control -->
        <p>
            <i class="<?php echo esc_attr( $settings['widget_icon'] ); ?>" aria-hidden="true"></i>
        </p>

        <!-- Font Control -->
        <h2 class="your-class-font-family">
			... Font Family ...
		</h2>

        <!-- Date Time Control -->
        <p><?php echo $settings['widget_date_time']; ?></p>

        <!-- Gallery Control -->
        <?php foreach ( $settings['widget_gallery'] as $image ) {
			echo '<img src="' . esc_attr( $image['url'] ) . '">';
		} ?>

        <!-- Repeater Control -->
        <?php if ( $settings['widget_repeater'] ) {
			echo '<ul>';
			foreach (  $settings['widget_repeater'] as $item ) {
				echo '<li class="elementor-repeater-item-' . esc_attr( $item['_id'] ) . '">
                        <p>' . $item['list_title'] . '</p>
                        <p>' . $item['list_content'] . '</p>
                    </li>';
                
			}
			echo '</ul>';
		} ?>

        <!-- Animation Control -->
        <div class="<?php echo esc_attr( $settings['widget_animation'] ); ?>">
			... Animation ...
		</div>

        <!-- Exit Animation Control -->
        <div class="<?php echo esc_attr( $settings['widget_exit_animation '] ); ?>">
			... Exit Animation ...
		</div>

        <!-- Hover Animation Control -->
        <?php $elementClass = 'container';
		if ( $settings['widget_hover_animation'] ) {
			$elementClass .= ' elementor-animation-' . $settings['widget_hover_animation'];
		}
		$this->add_render_attribute( 'wrapper', 'class', $elementClass );
		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			... Hover Animation ...
		</div>

        <!-- URL Control -->
        <?php if ( ! empty( $settings['widget_url']['url'] ) ) {
			$this->add_link_attributes( 'widget_url', $settings['widget_url'] );
		}
		?>
		<a <?php echo $this->get_render_attribute_string( 'widget_url' ); ?>>
			... Url ...
		</a>

        <!-- Media Control -->
        <?php // Get image URL
		echo '<p><img src="' . $settings['widget_media']['url'] . '"></p>'; ?>

        <!-- Slider Control -->
        <div class="your-class-slider">
			... Slider ...
		</div>

        <!-- Dimensions Control -->
        <div class="your-class-dimensions">
			... Dimensions ...
		</div>

    <?php }

	protected function content_template() { ?>
    
        <!-- Text Control -->
        <h2>
			{{{ settings.widget_text }}}
		</h2>

        <!-- Number Control -->
        <p>
			{{{ settings.widget_number }}}
        </p>

        <!-- Textarea Control -->
        <p>
			{{{ settings.widget_textarea }}}
		</p>

        <!-- WYSIWYG Control -->
        <div>
            {{{ settings.widget_wysiwyg }}}
		</div>

        <!-- Code Control -->
        {{{ settings.widget_code }}}

        <!-- Hidden Control -->
        <p>
            {{{ settings.widget_hidden }}}
        </p>

        <!-- Switcher Control -->
        <# if ( 'yes' === settings.widget_switcher ) { #>
			Switcher
		<# } #>

        <!-- Popover Toggle Control -->
        <h2>
			{{{ settings.widget_popover_toggle_text }}}
		</h2>

        <!-- Select Control -->
        <div class="your-class-select">
			... Select ...
		</div>

        <!-- Select2 Control -->
        <# if ( settings.widget_select2.length ) { #>
			<ul>
			<# _.each( settings.widget_select2, function( item ) { #>
				<li>{{{ item }}}</li>
			<# } ) #>
			</ul>
		<# } #>

        <!-- Choose Control -->
        <div class="your-class-choose">
            ... Alignment ...
		</div>

        <!-- Color Control -->
        <div class="your-class-color">
			... Color ...
		</div>

        <!-- Icon Control -->
        <p>
            <i class="{{ settings.widget_icon }}" aria-hidden="true"></i>
        </p>

        <!-- Font Control -->
        <h2 class="your-class-font-family">
			... Font Family ...
		</h2>

        <!-- Date Time Control -->
        <p>{{{settings.widget_date_time}}}</p>

        <!-- Gallery Control -->
        <# _.each( settings.widget_gallery, function( image ) { #>
			<img src="{{ image.url }}">
		<# }); #>

        <!-- Repeater Control -->
        <# if ( settings.widget_repeater.length ) { #>
			<ul>
			<# _.each( settings.widget_repeater, function( item ) { #>
				<li class="elementor-repeater-item-{{ item._id }}">
                    {{{ item.list_title }}}
                    {{{ item.list_content }}}
                </li>
			<# }); #>
			</ul>
		<# } #>

        <!-- Animation Control -->
        <div class="{{ settings.widget_animation }}">
			... Animation ...
		</div>

        <!-- Exit Animation Control -->
        <div class="{{ settings.widget_exit_animation }}">
			... Exit Animation ...
		</div>

        <!-- Hover Animation Control -->
        <#
		var elementClass = 'container';
		if ( '' !== settings.widget_hover_animation ) {
			elementClass += ' elementor-animation-' + settings.widget_hover_animation;
		}
		view.addRenderAttribute( 'wrapper', { 'class': elementClass } );
		#>
		<div {{{ view.getRenderAttributeString( 'wrapper' ) }}}>
			... Hover Animation ...
		</div>

        <!-- URL Control -->
        <a href="{{ settings.widget_url.url }}">
			... Url ...
		</a>

        <!-- Media Control -->
        <#
		if ( settings.widget_media.url ) {
			var image = {
				id: settings.widget_media.id,
				url: settings.widget_media.url,
				size: settings.widget_media,
				dimension: settings.image_custom_dimension,
				model: view.getEditModel()
			};

			var image_url = elementor.imagesManager.getImageUrl( image );

			if ( ! image_url ) {
				return;
			}
		}
		#>
		<p><img src="{{ image_url }}"></p>

        <!-- Slider Control -->
        <div class="your-class-slider">
			... Slider ...
		</div>

        <!-- Dimensions Control -->
        <div class="your-class-dimensions">
			... Dimensions ...
		</div>

    <?php }

}

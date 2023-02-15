<?php
class Elementor_Widget_1 extends \Elementor\Widget_Base {

    public function get_style_depends() {

		wp_register_style( 'widget-style-1', plugins_url( 'assets/css/widget-style-1.css', __FILE__ ) );
		wp_register_style( 'widget-style-2', plugins_url( 'assets/css/widget-style-2.css', __FILE__ ), [ 'external-framework' ] );
		wp_register_style( 'external-framework', plugins_url( 'assets/css/libs/external-framework.css', __FILE__ ) );

		return [
			'widget-style-1',
			'widget-style-2',
		];

	}

    public function get_script_depends() {
		wp_register_script( 'widget-script-1', plugins_url( 'assets/js/widget-script-1.js', __FILE__ ) );
		wp_register_script( 'widget-script-2', plugins_url( 'assets/js/widget-script-2.js', __FILE__ ), [ 'external-library' ] );
		wp_register_script( 'external-library', plugins_url( 'assets/js/libs/external-library.js', __FILE__ ) );

		return [
			'widget-script-1',
			'widget-script-2',
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

		/**
         * TEXT control.
         */
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'This is the heading', 'elementor' ),
                'placeholder' => __( 'Enter your title', 'elementor' ),
                'label_block' => true,
            ]
        );

        /**
         * TEXTAREA control.
         */
        $this->add_control(
            'description',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
                'placeholder' => __( 'Enter your description', 'elementor' ),
                'rows' => 10,
                'separator' => 'none',
                'show_label' => false,
            ]
        );

        /**
         * WYSIWYG control.
         */
        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'elementor' ),
                'default' => __( 'Content', 'elementor' ),
                'placeholder' => __( 'Content', 'elementor' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'show_label' => false,
            ]
        );

        /**
         * URL control.
         */
        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'https://your-link.com', 'elementor' ),
                'default' => [
                    'url' => '',
                ],
                'separator' => 'before',
            ]
        );

        /**
         * SELECT control.
         */
        $this->add_control(
            'size',
            [
                'label' => __( 'Size', 'elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Default', 'elementor' ),
                    'small' => __( 'Small', 'elementor' ),
                    'medium' => __( 'Medium', 'elementor' ),
                    'large' => __( 'Large', 'elementor' ),
                    'xl' => __( 'XL', 'elementor' ),
                    'xxl' => __( 'XXL', 'elementor' ),
                ],
            ]
        );

        /**
         * CHOOSE control.
         */
        $this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'textdomain' ),
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
			]
		);

        /**
         * HIDDEN control.
         */
        $this->add_control(
            'view',
            [
                'label' => __( 'View', 'elementor' ),
                'type' => \Elementor\Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );

        /**
         * COLOR control.
         */
        $this->add_control(
            'color',
            [
                'label' => __( 'Text Color', 'elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
            ]
        );

        /**
         * TYPOGRAPHY control.
         */
        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     [
        //         'name' => 'typography',
        //         'scheme' => Scheme_Typography::TYPOGRAPHY_1, // TYPOGRAPHY_1, TYPOGRAPHY_2, TYPOGRAPHY_3, TYPOGRAPHY_4.
        //         'selector' => '{{WRAPPER}} .elementor-heading-title',
        //     ]
        // );

        /**
         * TYPOGRAPHY control.
         */
        // $this->add_group_control(
        //     Group_Control_Text_Shadow::get_type(),
        //     [
        //         'name' => 'text_shadow',
        //         'selector' => '{{WRAPPER}} .elementor-heading-title',
        //     ]
        // );

        /**
         * DIMENSIONS control.
         */
        $this->add_responsive_control(
            'margin',
            [
                'label' => __( 'Margin', 'pd-framework' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .lth-title .lth-title__line' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        /**
         * CODE control.
         */
        $this->add_control(
            'html',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::CODE,
                'default' => '',
                'placeholder' => __( 'Enter your code', 'elementor' ),
                'show_label' => false,
            ]
        );

        /**
         * ICON control.
         */
        $this->add_control(
            'icon',
            [
                'label' => __( 'Icon', 'elementor' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-star',
            ]
        );

        /**
         * ANIMATION control.
         */
        $this->add_control(
            'animation',
            [
                'label' => __( 'Animation', 'elementor' ),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'default' => '',
                'frontend_available' => true,
                'label_block' => true,
            ]
        );

        /**
         * HOVER_ANIMATION control.
         */
        $this->add_control(
            'hover_animation',
            [
                'label' => __( 'Hover Animation', 'elementor' ),
                'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
            ]
        );

        /**
         * SLIDER control.
         */
        $this->add_responsive_control(
            'icon_space',
            [
                'label' => __( 'Spacing', 'elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}.elementor-position-right .elementor-icon-box-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.elementor-position-left .elementor-icon-box-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.elementor-position-top .elementor-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}} .elementor-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        /**
         * HEADING control.
         */
        $this->add_control(
            'heading_title',
            [
                'label' => __( 'Title', 'elementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        /**
         * REPEATER control.
         */
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'List Item', 'textdomain' ),
						'default' => esc_html__( 'List Item', 'textdomain' ),
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
					],
				],
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'textdomain' ),
						'link' => 'https://elementor.com/',
					],
					[
						'text' => esc_html__( 'List Item #2', 'textdomain' ),
						'link' => 'https://elementor.com/',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

        /**
         * SWITCHER control.
         */
        $this->add_control(
            'divider',
            [
                'label' => __( 'Divider', 'elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_off' => __( 'Off', 'elementor' ),
                'label_on' => __( 'On', 'elementor' ),
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'content: ""',
                ],
                'separator' => 'before',
            ]
        );

        /**
         * MEDIA control.
         */
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        /**
         * MEDIA Group control.
         */
        // $this->add_group_control(
        //     Group_Control_Image_Size::get_type(),
        //     [
        //         'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
        //         'default' => 'full',
        //         'separator' => 'none',
        //     ]
        // );

        /**
         * GALLERY control.
         */
        $this->add_control(
            'gallary',
            [
                'label' => __( 'Add Images', 'elementor' ),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        /**
         * Image_Size Group control.
         */
        // $this->add_group_control(
        //     Group_Control_Image_Size::get_type(),
        //     [
        //         'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
        //         'separator' => 'none',
        //     ]
        // );

        /**
         * NUMBER control.
         */
        $this->add_control(
            'number',
            [
                'label' => __( 'Number', 'elementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5000,
                'frontend_available' => true,
            ]
        );

        /**
         * Group_Control_Border control.
         */
        // $this->add_group_control(
        //     Group_Control_Border::get_type(),
        //     [
        //         'name' => 'image_border',
        //         'selector' => '{{WRAPPER}} .gallery-item img',
        //         'separator' => 'before',
        //     ]
        // );

        /**
         * RAW_HTML control.
         */
        $this->add_control(
            'anchor_description',
            [
                'raw' => __( 'This ID will be the CSS ID you will have to use in your own page, Without #.', 'elementor' ),
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-descriptor',
            ]
        );

		$this->end_controls_section();

	}
    
	protected function render() {
        $settings = $this->get_settings_for_display();

		echo '<h3>' . $settings['title'] . '</h3>';

		echo '<p>' . $settings['description'] . '</p>';

		echo '<div>' . $settings['content'] . '</div>';

        echo '<a href="'.esc_url( $settings['link']['url'] ).'">abc</a>';

		echo '<p>' . $settings['size'] . '</p>';

		echo '<p>' . $settings['alignment'] . '</p>';

		echo '<p>' . $settings['view'] . '</p>';

		echo '<p>' . $settings['color'] . '</p>';

		echo '<p>' . $settings['margin'] . '</p>';

        echo '<img src="' . esc_url( $settings['image']['url'] ) . '" alt="">';

        echo '<ul>';
        foreach ( $settings['list'] as $index => $item ) :
            echo '<li>';
            if ( ! $item['link']['url'] ) {
                echo $item['text'];
            } else {
                echo '<a href="'.esc_url( $item['link']['url'] ).'">';
                    echo $item['text'];
                echo '</a>';
            }
            echo '</li>';
        endforeach;
        echo '</ul>';
    }

	protected function content_template() { ?>
        <h3>{{{ settings.title }}}</h3>

        <p>{{{ settings.description }}}</p>

        <div>{{{ settings.content }}}</div>

        <a href="{{{ settings.link.url }}}">abc</a>

        <p>{{{ settings.size }}}</p>

        <p>{{{ settings.alignment }}}</p>

        <p>{{{ settings.view }}}</p>

        <p>{{{ settings.color }}}</p>

        <p>{{{ settings.margin }}}</p>

        <img src="{{{ settings.image.url }}}">

        <ul>
		<#
		if ( settings.list ) {
			_.each( settings.list, function( item, index ) {
			#>
			<li>
				<# if ( item.link && item.link.url ) { #>
					<a href="{{{ item.link.url }}}">{{{ item.text }}}</a>
				<# } else { #>
					{{{ item.text }}}
				<# } #>
			</li>
			<#
			} );
		}
		#>
		</ul>
    <?php }

}

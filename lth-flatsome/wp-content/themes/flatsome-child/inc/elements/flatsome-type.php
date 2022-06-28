<?php
add_ux_builder_shortcode('flatsome_type', array(
        'name'      => __('Flatsome Type'),
        'category'  => __('Content'),
        'styles' => array(
            'lth-bootstrap-style' => LTH_CHILD_URI . '/assets/css/bootstrap.min',
            'lth-slick-style' => LTH_CHILD_URI . '/assets/css/slick.min',
            'lth-elements-style' => LTH_CHILD_URI . '/assets/css/lth-elements',
        ),
        'scripts' => array(
            // 'lth-jquery-script' => LTH_CHILD_URI . '/assets/js/jquery.min',
            'lth-slick-script' => LTH_CHILD_URI . '/assets/js/slick.min',
            'lth-elements-script' => LTH_CHILD_URI . '/assets/js/lth-elements',
        ),
        'options' => array(
            // trường text nhập liệu
            'lth_textfield'    =>  array(
                'type' => 'textfield',
                'heading' => 'Input',
                'default' => '',
                'step' => '',
            ),
            // trường text nhập liệu
            'lth_textarea'    =>  array(
                'type' => 'textarea',
                'heading' => 'Textarea',
                'default' => '',       
            ),
            // select field
            'lth_select'    =>  array(
                'type' => 'select',
                'heading' => 'Select',
                'default' => 'h3',
                'options' => array(
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                ),                  
            ),
            // dãy số tăng giảm = cách rê chuột hoặc dùng bàn phím
            'lth_slider'    =>  array(
                'type' => 'slider',
                'heading' => 'Slider',
                'default' => 100,
                'unit'    => 'px',
                'min'     => 20,
                'max'     => 300,
                'step'    => 1,              
            ),
            // button chọn
            'lth_radio_buttons'    =>  array(
                'type' => 'radio-buttons',
                'heading' => 'Radio Buttons',
                'default' => '', 
                'options' => array(
                    'left'   => array('title' => 'Left'),
                    'center'  => array( 'title' => 'Center'),
                    'right'  => array( 'title' => 'Right'),
                ),              
            ),
            // checkbox
            'lth_checkbox'    =>  array(
                'type' => 'checkbox',
                'heading' => 'Checkbox',
                'default' => '',              
            ),
            // image upload
            'lth_image'    =>  array(
                'type' => 'image',
                'heading' => 'Image',
                'default' => '',               
            ),
            // chọn màu
            'lth_colorpicker'    =>  array(
                'type' => 'colorpicker',
                'heading' => 'Colorpicker',
                'default' => '',               
            ),
            // box tạo margin
            'lth_margins'    =>  array(
                'type' => 'margins',
                'heading' => 'Margins',
                'default' => '',               
            ),
            // thường để dùng tạo chiều cao, kéo chuột qua lại trong để tăng giảm px
            'lth_scrubfield'    =>  array(
                'type' => 'scrubfield',
                'heading' => 'Scrubfield',
                'default' => '', 
                'min'     => 20,
                'max'     => 300,
                'step'    => 1,               
            ),
            // Group Post
            'group_post' => array(
                'type' => 'group',
                'heading' => __( 'Post' ),
                'options' => array(
                    // Posts
                    'lth_posts' => array(
                        'type' => 'select',
                        'heading' => 'Posts',
                        'param_name' => 'ids',
                        'config' => array(
                            'multiple' => true,
                            'placeholder' => 'Select..',
                            'postSelect' => array(
                                'post_type' => 'post',
                            ),
                        ),
                    ),
                    // Post Categories
                    'lth_post_cat' => array(
                        'type' => 'select',
                        'heading' => 'Post Categories',
                        'param_name' => 'ids',
                        'config' => array(
                            'multiple' => true,
                            'placeholder' => 'Select…',
                            'termSelect' => array(
                                'post_type' => 'post',
                                'taxonomies' => 'category',
                            ),
                        ),
                    ),
                    // Post Tag
                    'lth_post_tag' => array(
                        'type' => 'select',
                        'heading' => 'Tags',
                        'param_name' => 'ids',
                        'config' => array(
                            'multiple' => true,
                            'placeholder' => 'Select…',
                            'termSelect' => array(
                                'post_type' => 'post',
                                'taxonomies' => 'post_tag',
                            ),
                        ),
                    ),
                )
            ),
            // Group Product
            'group_product' => array(
                'type' => 'group',
                'heading' => __( 'Product' ),
                'options' => array(
                    // Products
                    'lth_products' => array(
                        'type' => 'select',
                        'heading' => 'Products',
                        'param_name' => 'ids',
                        'config' => array(
                            'multiple' => true,
                            'placeholder' => 'Select..',
                            'postSelect' => array(
                                'post_type' => 'product',
                            ),
                        ),
                    ),
                    // Product Categories
                    'lth_product_cat' => array(
                        'type' => 'select',
                        'heading' => 'Product Categories',
                        'param_name' => 'ids',
                        'config' => array(
                            'multiple' => true,
                            'placeholder' => 'Select…',
                            'termSelect' => array(
                                'post_type' => 'product',
                                'taxonomies' => 'product_cat',
                            ),
                        ),
                    ),
                    // Product Tag
                    'lth_product_tag' => array(
                        'type' => 'select',
                        'heading' => 'Product Tags',
                        'param_name' => 'ids',
                        'config' => array(
                            'multiple' => true,
                            'placeholder' => 'Select…',
                            'termSelect' => array(
                                'post_type' => 'product',
                                'taxonomies' => 'product_tag',
                            ),
                        ),
                    ),
                )
            ),
        ),
    ));
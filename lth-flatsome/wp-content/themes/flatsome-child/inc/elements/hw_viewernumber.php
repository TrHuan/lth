<?php
add_ux_builder_shortcode('hw_viewnumber', array(
        'name'      => __('GCO View Number'),
        'category'  => __('Content'),
		'scripts' => array(
			'gco-viewnumber-script' => GCO_CHILD_URI . '/assets/gco-viewnumber.js',
		),
		'styles' => array(
			'gco-viewnumber-style' => GCO_CHILD_URI . '/assets/gco-viewnumber.css',
		),
        'options' => array(
            'img'         => array(
              'type'    => 'image',
              'heading' => 'Icon',
              'value'   => '',
            ),
            'inline_svg'  => array(
              'type'    => 'checkbox',
              'heading' => 'Inline SVG',
              'default' => 'true',
            ),
            'number'    =>  array(
                'type' => 'scrubfield',
                'heading' => 'Número',
                'default' => '1',
                'step' => '1',
                'unit' => '',
                'min'   =>  1,
                //'max'   => 2
            ),
            'title'    =>  array(
                'type' => 'textfield',
                'heading' => 'Complemento',
                'default' => '',                
            ),
            'description'    =>  array(
                'type' => 'textarea',
                'heading' => 'Descrição',
                'default' => '',               
            ),
            'btn'    =>  array(
                'type' => 'textfield',
                'heading' => 'Botão',
                'default' => '',
            ),
            'link'    =>  array(
                'type' => 'textfield',
                'heading' => 'Link',
                'default' => '',       
            ),
        ),
    ));
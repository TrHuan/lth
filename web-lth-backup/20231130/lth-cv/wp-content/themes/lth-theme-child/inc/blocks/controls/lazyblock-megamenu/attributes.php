<?php

/**
 * Create gutenberg attributes fields
 * @link: https://lazyblocks.com/documentation/blocks-controls/
 */

// load block attributes 
if (function_exists('lazyblocks')) :

   $menus = wp_get_nav_menus();
   $choices = array();
   foreach ($menus as $men) {
      array_push($choices, array(
         'label' => $men->name,
         'value' => $men->slug,
      ));
   }

   $block_fields = array(
      'id'           => 'lth_megamenu',
      'title'        => 'LTH: Megamenu',
      'description'  => 'Example block that helps you to get started with Lazy Blocks plugin',
      'icon'         => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect opacity="0.25" width="15" height="15" rx="4" transform="matrix(-1 0 0 1 22 7)" fill="currentColor" /><rect width="15" height="15" rx="4" transform="matrix(-1 0 0 1 17 2)" fill="currentColor" /></svg>',
      'slug'         => 'lazyblock/lth-megamenu',
      'category'     => 'LTH'
   );

   lazyblocks()->add_block(array(
      'id' => $block_fields['id'],
      'title' => $block_fields['title'],
      'icon' => $block_fields['icon'],
      'keywords' => array(
         0 => 'photo',
         1 => 'picture',
         2 => 'template',
      ),
      'slug' => $block_fields['slug'],
      'description' => $block_fields['description'],
      'category' => $block_fields['category'],
      'category_label' => $block_fields['category'],
      'supports' => array(
         'customClassName' => true,
         'anchor' => false,
         'align' => array(
            0 => 'wide',
            1 => 'full',
         ),
         'html' => false,
         'multiple' => true,
         'inserter' => true,
      ),
      'ghostkit' => array(
         'supports' => array(
            'spacings' => false,
            'display' => false,
            'scrollReveal' => false,
            'frame' => false,
            'customCSS' => false,
         ),
      ),
      'controls' => array(
         'control_select_menu_name' => array(
            'type' => 'select',
            'name' => 'menu_name',
            'default' => '',
            'label' => 'Menu',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'choices' => $choices,
            'allow_null' => 'true',
            'multiple' => 'false',
            'output_format' => '',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_select_megamenu' => array(
            'type' => 'select',
            'name' => 'select_megamenu',
            'default' => 'show_all',
            'label' => 'Select',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'choices' => array(
               array(
                  'label' => 'Show All',
                  'value' => 'show_all',
               ),
               array(
                  'label' => 'Show Icon',
                  'value' => 'show_icon',
               ),
            ),
            'allow_null' => 'false',
            'multiple' => 'false',
            'output_format' => '',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_text_lth_class' => array(
            'type' => 'text',
            'name' => 'class',
            'default' => '',
            'label' => 'Class',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'multiline' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
      ),
      'code' => array(
         'output_method' => 'php',
         'editor_html' => '',
         'editor_callback' => '',
         'editor_css' => '',
         'frontend_html' => '',
         'frontend_callback' => '',
         'frontend_css' => '',
         'show_preview' => 'always',
         'single_output' => false,
      ),
      'condition' => array(),
   ));
endif;

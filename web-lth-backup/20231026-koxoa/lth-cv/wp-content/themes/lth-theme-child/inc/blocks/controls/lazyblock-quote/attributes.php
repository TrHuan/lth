<?php

/**
 * Create gutenberg attributes fields
 * @link: https://lazyblocks.com/documentation/blocks-controls/
 */

// load block attributes 
if (function_exists('lazyblocks')) :

   $block_fields = array(
      'id'           => 'lth_quote',
      'title'        => 'LTH: Quote',
      'description'  => 'Example block that helps you to get started with Lazy Blocks plugin',
      'icon'         => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect opacity="0.25" width="15" height="15" rx="4" transform="matrix(-1 0 0 1 22 7)" fill="currentColor" /><rect width="15" height="15" rx="4" transform="matrix(-1 0 0 1 17 2)" fill="currentColor" /></svg>',
      'slug'         => 'lazyblock/lth-quote',
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
         'control_textarea_lth_quote' => array(
            'type' => 'textarea',
            'name' => 'quote',
            'default' => '',
            'label' => 'Quote',
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
         'control_select_lth_quote_tag' => array(
            'type' => 'select',
            'name' => 'quote_tag',
            'default' => 'blockquote',
            'label' => 'Quote Tag',
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
                  'label' => 'Blockquote',
                  'value' => 'blockquote',
               ),
               array(
                  'label' => 'Pre',
                  'value' => 'pre',
               ),
            ),
            'allow_null' => 'false',
            'multiple' => 'false',
            'output_format' => '',
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

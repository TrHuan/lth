<?php

/**
 * Create gutenberg attributes fields
 * @link: https://lazyblocks.com/documentation/blocks-controls/
 */

// load block attributes 
if (function_exists('lazyblocks')) :

   $block_fields = array(
      'id'           => 'lth_products',
      'title'        => 'LTH: Products',
      'description'  => 'Example block that helps you to get started with Lazy Blocks plugin',
      'icon'         => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect opacity="0.25" width="15" height="15" rx="4" transform="matrix(-1 0 0 1 22 7)" fill="currentColor" /><rect width="15" height="15" rx="4" transform="matrix(-1 0 0 1 17 2)" fill="currentColor" /></svg>',
      'slug'         => 'lazyblock/lth-products',
      'category'     => 'common'
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
         'control_textarea_lth_title' => array(
            'type' => 'textarea',
            'name' => 'title',
            'default' => '',
            'label' => 'Title',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_url_lth_title_url' => array(
            'type' => 'url',
            'name' => 'title_url',
            'default' => '',
            'label' => 'Title Url',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_textarea_lth_description' => array(
            'type' => 'textarea',
            'name' => 'description',
            'default' => '',
            'label' => 'Description',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_repeater_lth_items' => array(
            'type' => 'repeater',
            'name' => 'items',
            'default' => '',
            'label' => 'Items',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'rows_min' => '1',
            'rows_max' => '',
            'rows_label' => '',
            'rows_add_button_label' => '',
            'rows_collapsible' => 'true',
            'rows_collapsed' => 'true',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_select_lth_items' => array(
            'type' => 'select_dynamic',
            'name' => 'item',
            'default' => '',
            'label' => 'Item',
            'help' => '',
            'child_of' => 'control_repeater_lth_items',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'select_dynamic_custom_attribute' => 'default_value',
            'placeholder' => '',
            'characters_limit' => '',
            'entity_type' => 'taxonomy',
            'taxonomy_type' => 'product_cat',
            'parent_entity' => '',
         ),
         'control_repeater_lth_products' => array(
            'type' => 'repeater',
            'name' => 'products',
            'default' => '',
            'label' => 'Products',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'rows_min' => '1',
            'rows_max' => '',
            'rows_label' => '',
            'rows_add_button_label' => '',
            'rows_collapsible' => 'true',
            'rows_collapsed' => 'true',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_select_lth_product' => array(
            'type' => 'select_dynamic',
            'name' => 'product',
            'default' => '',
            'label' => 'Product',
            'help' => '',
            'child_of' => 'control_repeater_lth_products',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'select_dynamic_custom_attribute' => 'default_value',
            'placeholder' => '',
            'characters_limit' => '',
            'entity_type' => 'post',
            'taxonomy_type' => 'category',
            'parent_entity' => '',
            'post_type' => 'product',
         ),
         'control_checkbox_lth_show_items' => array(
            'type' => 'checkbox',
            'name' => 'show_items',
            'default' => '',
            'label' => '',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'checked' => 'false',
            'alongside_text' => 'Show Items',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_number_lth_post_number' => array(
            'type' => 'number',
            'name' => 'post_number',
            'default' => '5',
            'label' => 'Post Number',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'min' => '',
            'max' => '',
            'step' => '',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_select_lth_post_orderby' => array(
            'type' => 'select',
            'name' => 'post_orderby',
            'default' => 'ID',
            'label' => 'Orderby',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
            'choices' => array(
               array(
                  'label' => 'Title',
                  'value' => 'title',
               ),
               array(
                  'label' => 'ID',
                  'value' => 'ID',
               ),
               array(
                  'label' => 'Rand',
                  'value' => 'rand',
               ),
            ),
         ),
         'control_select_lth_post_order' => array(
            'type' => 'select',
            'name' => 'post_order',
            'default' => 'DESC',
            'label' => 'Order',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
            'choices' => array(
               array(
                  'label' => 'DESC',
                  'value' => 'DESC',
               ),
               array(
                  'label' => 'ASC',
                  'value' => 'ASC',
               ),
            ),
         ),
         'control_text_lth_button_text' => array(
            'type' => 'text',
            'name' => 'button_text',
            'default' => '',
            'label' => 'Button Text',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_url_lth_button_url' => array(
            'type' => 'url',
            'name' => 'button_url',
            'default' => '',
            'label' => 'Button Url',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_select_lth_post_orderby' => array(
            'type' => 'select',
            'name' => 'post_orderby',
            'default' => 'ID',
            'label' => 'Orderby',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
            'choices' => array(
               array(
                  'label' => 'Title',
                  'value' => 'title',
               ),
               array(
                  'label' => 'ID',
                  'value' => 'ID',
               ),
               array(
                  'label' => 'Rand',
                  'value' => 'rand',
               ),
            ),
         ),
         'control_select_lth_post_order' => array(
            'type' => 'select',
            'name' => 'post_order',
            'default' => 'DESC',
            'label' => 'Order',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
            'choices' => array(
               array(
                  'label' => 'DESC',
                  'value' => 'DESC',
               ),
               array(
                  'label' => 'ASC',
                  'value' => 'ASC',
               ),
            ),
         ),
         'control_text_lth_button_text' => array(
            'type' => 'text',
            'name' => 'button_text',
            'default' => '',
            'label' => 'Button Text',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_url_lth_button_url' => array(
            'type' => 'url',
            'name' => 'button_url',
            'default' => '',
            'label' => 'Button Url',
            'help' => '',
            'child_of' => '',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_select_lth_text_align' => array(
            'type' => 'select',
            'name' => 'text_align',
            'default' => '',
            'label' => 'Text Align',
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
                  'label' => 'Auto',
                  'value' => 'auto',
               ),
               array(
                  'label' => 'Left',
                  'value' => 'left',
               ),
               array(
                  'label' => 'Center',
                  'value' => 'center',
               ),
               array(
                  'label' => 'Right',
                  'value' => 'right',
               ),
            ),
            'allow_null' => 'false',
            'multiple' => 'false',
            'output_format' => '',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_text_lth_slider_item' => array(
            'type' => 'text',
            'name' => 'item',
            'default' => '3',
            'label' => 'Item (Item >= 1200)',
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
         'control_text_lth_slider_item_lg' => array(
            'type' => 'text',
            'name' => 'item_lg',
            'default' => '2',
            'label' => 'Item (1199 >= Item >= 992)',
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
         'control_text_lth_slider_item_md' => array(
            'type' => 'text',
            'name' => 'item_md',
            'default' => '2',
            'label' => 'Item (991 >= Item >= 768)',
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
         'control_text_lth_slider_item_sm' => array(
            'type' => 'text',
            'name' => 'item_sm',
            'default' => '2',
            'label' => 'Item (767 >= Item >= 576)',
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
         'control_text_lth_slider_item_mb' => array(
            'type' => 'text',
            'name' => 'item_mb',
            'default' => '1',
            'label' => 'Item (575 >= Item)',
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
         'control_text_lth_slider_item_row' => array(
            'type' => 'text',
            'name' => 'item_row',
            'default' => '1',
            'label' => 'Row',
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
         'control_text_lth_slider_item_autoplay' => array(
            'type' => 'select',
            'name' => 'item_autoplay',
            'default' => 'false',
            'label' => 'Autoplay',
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
                  'label' => 'True',
                  'value' => 'true',
               ),
               array(
                  'label' => 'False',
                  'value' => 'false',
               ),
            ),
            'allow_null' => 'false',
            'multiple' => 'false',
            'output_format' => '',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_text_lth_slider_item_arrows' => array(
            'type' => 'select',
            'name' => 'item_arrows',
            'default' => 'false',
            'label' => 'Arrows',
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
                  'label' => 'True',
                  'value' => 'true',
               ),
               array(
                  'label' => 'False',
                  'value' => 'false',
               ),
            ),
            'allow_null' => 'false',
            'multiple' => 'false',
            'output_format' => '',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_text_lth_slider_item_dots' => array(
            'type' => 'select',
            'name' => 'item_dots',
            'default' => 'false',
            'label' => 'Dots',
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
                  'label' => 'True',
                  'value' => 'true',
               ),
               array(
                  'label' => 'False',
                  'value' => 'false',
               ),
            ),
            'allow_null' => 'false',
            'multiple' => 'false',
            'output_format' => '',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_text_lth_slider_item_vertical' => array(
            'type' => 'select',
            'name' => 'item_vertical',
            'default' => 'false',
            'label' => 'Vertical',
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
                  'label' => 'True',
                  'value' => 'true',
               ),
               array(
                  'label' => 'False',
                  'value' => 'false',
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

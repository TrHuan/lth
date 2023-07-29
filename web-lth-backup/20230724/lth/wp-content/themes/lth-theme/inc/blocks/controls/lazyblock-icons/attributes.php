<?php

/**
 * Create gutenberg attributes fields
 * @link: https://lazyblocks.com/documentation/blocks-controls/
 */

// load block attributes 
if (function_exists('lazyblocks')) :

   $block_fields = array(
      'id'           => 'lth_icons', //thay đổi
      'title'        => 'LTH: Icons', //thay đổi
      'description'  => 'Example block that helps you to get started with Lazy Blocks plugin',
      'icon'         => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect opacity="0.25" width="15" height="15" rx="4" transform="matrix(-1 0 0 1 22 7)" fill="currentColor" /><rect width="15" height="15" rx="4" transform="matrix(-1 0 0 1 17 2)" fill="currentColor" /></svg>',
      'slug'         => 'lazyblock/lth-icons', //thay đổi
      'category'     => 'LTH'
   );

   lazyblocks()->add_block(array(
      'id' => $block_fields['id'],
      'title' => $block_fields['title'],
      'icon' => $block_fields['icon'],
      'keywords' => array(),
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
         'control_select_lth_title_align' => array(
            'type' => 'select',
            'name' => 'title_align',
            'default' => 'left',
            'label' => 'Title Align',
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
         'control_image_lth_item_image' => array(
            'type' => 'image',
            'name' => 'item_image',
            'default' => '',
            'label' => 'Image Icon',
            'help' => '',
            'child_of' => 'control_repeater_lth_items',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'preview_size' => 'full',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_textarea_lth_class_icon' => array(
            'type' => 'text',
            'name' => 'item_class_icon',
            'default' => '',
            'label' => 'Class Icon',
            'help' => '',
            'child_of' => 'control_repeater_lth_items',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),         
         'control_select_lth_icon_align' => array(
            'type' => 'select',
            'name' => 'icon_align',
            'default' => 'top',
            'label' => 'Icon Align',
            'help' => '',
            'child_of' => 'control_repeater_lth_items',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'choices' => array(
               array(
                  'label' => 'Top',
                  'value' => 'top',
               ),
               array(
                  'label' => 'Bottom',
                  'value' => 'bottom',
               ),
               array(
                  'label' => 'Left',
                  'value' => 'left',
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
         'control_textarea_lth_item_title' => array(
            'type' => 'textarea',
            'name' => 'item_title',
            'default' => '',
            'label' => 'Title',
            'help' => '',
            'child_of' => 'control_repeater_lth_items',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'placeholder' => '',
            'characters_limit' => '',
         ),
         'control_textarea_lth_item_text' => array(
            'type' => 'textarea',
            'name' => 'item_text',
            'default' => '',
            'label' => 'Text',
            'help' => '',
            'child_of' => 'control_repeater_lth_items',
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
            'default' => 'left',
            'label' => 'Text Align',
            'help' => '',
            'child_of' => 'control_repeater_lth_items',
            'placement' => 'inspector',
            'width' => '100',
            'hide_if_not_selected' => 'false',
            'save_in_meta' => 'false',
            'save_in_meta_name' => '',
            'required' => 'false',
            'choices' => array(
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
         'control_text_lth_image_width' => array(
            'type' => 'text',
            'name' => 'width_image',
            'default' => 'auto',
            'label' => 'Width Image',
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
         'control_text_lth_image_height' => array(
            'type' => 'text',
            'name' => 'height_image',
            'default' => 'auto',
            'label' => 'Height Image',
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
         'output_method' => 'html',
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
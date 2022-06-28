<?php

function flatsome_type_func($atts){
  extract(shortcode_atts(array(
    'lth_textfield'      => '',
    'lth_textarea'       => '',
    'lth_select'         => '',
    'lth_slider'         => '',
    'lth_radio_buttons'  => '',
    'lth_checkbox'       => '',
    'lth_image'          => '',
    'lth_colorpicker'    => '',
    'lth_margins'        => '',
    'lth_scrubfield'     => '',
    'lth_posts'       => '',
    'lth_post_cat'    => '',
    'lth_post_tag'       => '',
    'lth_products'    => '',
    'lth_product_cat'       => '',
    'lth_product_tag'    => '',
  ), $atts));

  if($visibility == 'hidden') return;
  ob_start(); ?>

  <label>Textfield</label>
  <p><?php echo $lth_textfield; ?></p>

  <label>Textarea</label>
  <p><?php echo $lth_textarea; ?></p>

  <label>Select</label>
  <p><?php echo $lth_select; ?></p>

  <label>Slider</label>
  <p><?php echo $lth_slider; ?></p>

  <label>Radio Buttons</label>
  <p><?php echo $lth_radio_buttons; ?></p>

  <label>Checkbox</label>
  <p><?php echo $lth_checkbox; ?></p>

  <label>Image</label>
  <p><?php echo $lth_image; echo '</br>';
  echo $lth_image = wp_get_attachment_url( $lth_image ); ?></p>

  <label>Colorpicker</label>
  <p><?php echo $lth_colorpicker; ?></p>

  <label>Margins</label>
  <p><?php echo $lth_margins; ?></p>

  <label>Scrubfield</label>
  <p><?php echo $lth_scrubfield; ?></p>

  <label>Posts</label>
  <p><?php echo $lth_posts; ?></p>  
  <?php
    $post_ids = explode(',', $lth_posts);
    foreach ($post_ids as $id) {
      $post   = get_post( $id );
      var_dump($post);
    }
  ?>

  <label>Post Cat</label>
  <p><?php echo $lth_post_cat; ?></p>
  <?php
    $categories = explode(',', $lth_post_cat);
    foreach ( $categories as $category ) {
      var_dump(get_category($category));
    }
  ?>

  <label>Post Tags</label>
  <p><?php echo $lth_post_tag; ?></p>
  <?php
    $tags = explode(',', $lth_post_tag);
    foreach ( $tags as $tag ) {
      var_dump(get_tag($tag));
    }
  ?>

  <label>Products</label>
  <p><?php echo $lth_products; ?></p> 
  <?php
    $post_ids = explode(',', $lth_products);
    foreach ($post_ids as $id) {
      $post   = get_post( $id );
      var_dump($post);
    }
  ?>

  <label>Product Cat</label>
  <p><?php echo $lth_product_cat; ?></p>
  <?php
    $cat_ids = explode(',', $lth_product_cat);
    foreach ($cat_ids as $cat_id) {
      echo get_term( $cat_id )->name;
    }
  ?>

  <label>Product Tags</label>
  <p><?php echo $lth_product_tag; ?></p>
  <?php
    $tag_ids = explode(',', $lth_product_tag);
    foreach ($tag_ids as $tag_id) {
      echo get_term( $tag_id )->name;
    }
  ?>

  <?php return ob_get_clean();
}
add_shortcode('flatsome_type', 'flatsome_type_func');
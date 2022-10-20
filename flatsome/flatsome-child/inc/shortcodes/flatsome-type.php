<?php

function flatsome_type_func($atts){
  extract(shortcode_atts(array(
    'gco_textfield'      => '',
    'gco_textarea'       => '',
    'gco_select'         => '',
    'gco_slider'         => '',
    'gco_radio_buttons'  => '',
    'gco_checkbox'       => '',
    'gco_image'          => '',
    'gco_colorpicker'    => '',
    'gco_margins'        => '',
    'gco_scrubfield'     => '',
    'gco_posts'       => '',
    'gco_post_cat'    => '',
    'gco_post_tag'       => '',
    'gco_products'    => '',
    'gco_product_cat'       => '',
    'gco_product_tag'    => '',
  ), $atts));

  if($visibility == 'hidden') return;
  ob_start(); ?>

  <label>Textfield</label>
  <p><?php echo $gco_textfield; ?></p>

  <label>Textarea</label>
  <p><?php echo $gco_textarea; ?></p>

  <label>Select</label>
  <p><?php echo $gco_select; ?></p>

  <label>Slider</label>
  <p><?php echo $gco_slider; ?></p>

  <label>Radio Buttons</label>
  <p><?php echo $gco_radio_buttons; ?></p>

  <label>Checkbox</label>
  <p><?php echo $gco_checkbox; ?></p>

  <label>Image</label>
  <p><?php echo $gco_image; echo '</br>';
  echo $gco_image = wp_get_attachment_url( $gco_image ); ?></p>

  <label>Colorpicker</label>
  <p><?php echo $gco_colorpicker; ?></p>

  <label>Margins</label>
  <p><?php echo $gco_margins; ?></p>

  <label>Scrubfield</label>
  <p><?php echo $gco_scrubfield; ?></p>

  <label>Posts</label>
  <p><?php echo $gco_posts; ?></p>  
  <?php
    $post_ids = explode(',', $gco_posts);
    foreach ($post_ids as $id) {
      $post   = get_post( $id );
      var_dump($post);
    }
  ?>

  <label>Post Cat</label>
  <p><?php echo $gco_post_cat; ?></p>
  <?php
    $categories = explode(',', $gco_post_cat);
    foreach ( $categories as $category ) {
      var_dump(get_category($category));
    }
  ?>

  <label>Post Tags</label>
  <p><?php echo $gco_post_tag; ?></p>
  <?php
    $tags = explode(',', $gco_post_tag);
    foreach ( $tags as $tag ) {
      var_dump(get_tag($tag));
    }
  ?>

  <label>Products</label>
  <p><?php echo $gco_products; ?></p> 
  <?php
    $post_ids = explode(',', $gco_products);
    foreach ($post_ids as $id) {
      $post   = get_post( $id );
      var_dump($post);
    }
  ?>

  <label>Product Cat</label>
  <p><?php echo $gco_product_cat; ?></p>
  <?php
    $cat_ids = explode(',', $gco_product_cat);
    foreach ($cat_ids as $cat_id) {
      echo get_term( $cat_id )->name;
    }
  ?>

  <label>Product Tags</label>
  <p><?php echo $gco_product_tag; ?></p>
  <?php
    $tag_ids = explode(',', $gco_product_tag);
    foreach ($tag_ids as $tag_id) {
      echo get_term( $tag_id )->name;
    }
  ?>

  <?php return ob_get_clean();
}
add_shortcode('flatsome_type', 'flatsome_type_func');
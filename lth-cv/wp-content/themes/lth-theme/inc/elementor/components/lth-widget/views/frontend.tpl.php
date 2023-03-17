<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

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
<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<div class="register-area white-bg ptb-90">
   <div class="container">
      <h3 class="login-header"><?php echo $settings['heading_text']; ?></h3>
      <div class="row">
         <div class="col-xl-12">
            <div class="register-contact  clearfix">
               <?php echo do_shortcode($settings['content_text']); ?>
            </div>
         </div>
      </div>
   </div>
</div>
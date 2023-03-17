<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<div class="slider-area slider-style-four">
    <!-- Slider Area Start Here -->
    <div class="slider-activation owl-carousel">        
         <?php
            if ( $settings['list'] ) {
               foreach (  $settings['list'] as $item ) { ?>                    
                  <div class="slide align-center-left fullscreen animation-style-01" style="background-image: url(<?php echo $item['list_image']['url']; ?>);">
                    <div class="slider-progress"></div>
                    <div class="container">
                       <div class="row">
                          <div class="col-lg-12">
                             <div class="slider-content">
                                <h1><?php echo $item['list_text_1']; ?></h1>
                                <h2><?php echo $item['list_text_2']; ?></h2>
                                <p><?php echo $item['list_text_3']; ?></p>
                                <div class="slide-btn small-btn">
                                   <a href="<?php echo $item['list_link_url']['url']; ?>"><?php echo $item['list_text_url']; ?></a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                  </div>
               <?php }
            }
         ?>
    </div>
    <!-- Slider Area End Here -->
</div>
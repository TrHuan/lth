<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php if ($settings['style_items'] == 1) { ?>
   <div class="support-area">
      <div class="container">
         <div class="col-sm-12">
            <div class="support-inner-style-two">
               <div class="row">                             
                  <?php
                     if ( $settings['list'] ) {
                        foreach (  $settings['list'] as $item ) { ?>
                           <div class="col-lg-3 col-md-6 col-sm-6 mb-all-30">
                              <div class="single-support">
                                 <?php if ($item['list_image']['url']) { ?>
                                    <img src="<?php echo $item['list_image']['url']; ?>" alt="Feature">
                                 <?php } else { ?>
                                    <div class="<?php echo $item['list_icon_class']; ?> icon"></div>
                                 <?php } ?>
                                   
                                 <div class="support-desc">
                                    <h6><?php echo $item['list_text_1']; ?></h6>
                                    <span><?php echo $item['list_text_2']; ?></span>
                                 </div>
                              </div>
                           </div>
                        <?php }
                     }
                  ?>       
               </div>
               <!-- Row End -->
            </div>
         </div>
      </div>
      <!-- Container End -->
   </div>
<?php } ?>
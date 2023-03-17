<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<artice class="lth-banners <?php echo $settings['widget_class']; ?>">
   <div class="module module_banners">
         <div class="module_content">
            <div class="content" style="position: relative;">
               <div class="content-image">
                     <a href="<?php if ($settings['widget_url']['url']) {
                                    echo esc_url($settings['widget_url']['url']);
                                 } else {
                                    echo '#';
                                 } ?>" title="" class="image">
                        <img src="<?php echo esc_url($settings['widget_image']['url']); ?>" alt="Image" width="auto" height="auto">

                        <?php if ($settings['widget_text']) { ?>
                           <div class="bg-image"></div>
                        <?php } ?>
                     </a>
               </div>
               <?php if ($settings['widget_text']) { ?>
                     <div class="content-text" style="position: absolute; top: <?php echo $settings['widget_text_top']; ?>; 
                     bottom: <?php echo $settings['widget_text_bottom']; ?>; left: <?php echo $settings['widget_text_left']; ?>; 
                     right: <?php echo $settings['widget_text_right']; ?>; transform: translate(<?php echo $settings['widget_text_translate']; ?>);">
                        <a href="<?php if ($settings['widget_url']['url']) {
                                       echo esc_url($settings['widget_url']['url']);
                                    } else {
                                       echo '#';
                                    } ?>" title="" class="text">
                           <?php echo $settings['widget_text']; ?>
                        </a>
                     </div>
               <?php } ?>
            </div>
         </div>
   </div>
</artice>
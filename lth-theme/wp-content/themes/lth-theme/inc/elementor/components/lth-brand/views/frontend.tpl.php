<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<article class="lth-brands <?php echo $settings['class']; ?>">
   <div class="module module_brands">
         <div class="module_content">
            <div class="swiper swiper-slider swiper-brands" data-item="<?php echo $settings['widget_item']; ?>" 
            data-item_lg="<?php echo $settings['widget_item_lg']; ?>" data-item_md="<?php echo $settings['widget_item_md']; ?>" 
            data-item_sm="<?php echo $settings['widget_item_sm']; ?>" data-item_mb="<?php echo $settings['widget_item_mb']; ?>" 
            data-row="<?php echo $settings['widget_item_row']; ?>" data-dots="<?php echo $settings['widget_item_dots']; ?>" 
            data-arrows="<?php echo $settings['widget_item_arrows']; ?>" data-vertical="<?php echo $settings['widget_item_vertical']; ?>" 
            data-autoplay="<?php echo $settings['widget_item_autoplay']; ?>">
               <?php foreach ($settings['widget_items'] as $item) : ?>
                     <div class="swiper-slide item">
                        <div class="content">
                           <div class="content-image">
                                 <a href="<?php echo esc_url($item['widget_item_url']['url']); ?>" title="" class="image">
                                    <img src="<?php echo esc_url($item['widget_item_image']['url']); ?>" alt="Brand" width="auto" height="auto">
                                 </a>
                           </div>
                        </div>
                     </div>
               <?php endforeach; ?>
            </div>
         </div>
   </div>
</article>
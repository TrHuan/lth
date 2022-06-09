<?php
   if (!defined('ABSPATH')) exit; // Exit if accessed directly 

   if ($settings['text_align'] == 'left') {
      $text_align = 'left';
   } elseif ($settings['text_align'] == 'center') {
      $text_align = 'center';
   } else {
      $text_align = 'right';
   }
?>

<article class="lth-slider <?php echo $settings['class']; ?>">
  <div class="module module_slider">
      <div class="module_content">
         <div class="swiper swiper-slider swiper-slidershow"
            data-item="<?php echo $settings['item']; ?>" 
            data-item_lg="<?php echo $settings['item_lg']; ?>" 
            data-item_md="<?php echo $settings['item_md']; ?>" 
            data-item_sm="<?php echo $settings['item_sm']; ?>" 
            data-item_mb="<?php echo $settings['item_mb']; ?>" 
            data-row="<?php echo $settings['item_row']; ?>" 
            data-dots="<?php echo $settings['item_dots']; ?>" 
            data-arrows="<?php echo $settings['item_arrows']; ?>" 
            data-vertical="<?php echo $settings['item_vertical']; ?>"
            data-autoplay="<?php echo $settings['item_autoplay']; ?>">
            <?php foreach( $settings['list'] as $item ): ?>
               <div class="swiper-slide item">
                  <div class="content" style="position: relative; display: flex; flex-wrap: wrap; align-items: center;">
                     <div class="content-image" style="width: 100%;">
                        <?php if ($item['list_link_url'] && !$item['list_text_url']) { ?>
                           <a href="<?php echo $item['list_link_url']['url']; ?>" class="image">
                        <?php } ?>
                           <img src="<?php echo $item['list_image']['url']; ?>" alt="Slide" width="<?php echo $settings['image_width']; ?>" height="<?php echo $settings['image_height']; ?>"> 
                        <?php if ($item['list_link_url'] && !$item['list_text_url']) { ?>
                           </a>
                        <?php } ?>
                     </div>

                     <?php if ($item['list_text_1'] || $item['list_text_2'] || $item['list_text_3'] || $item['list_text_url']) { ?>
                        <?php if ($item['list_link_url'] && !$item['list_text_url']) { ?>
                           <a href="<?php echo $item['list_link_url']['url']; ?>" class="content-box" style="position: absolute; width: 100%; text-align: <?php echo $text_align; ?>;">
                        <?php } else { ?>
                           <div class="content-box" style="position: absolute; width: 100%; text-align: <?php echo $text_align; ?>;">
                        <?php } ?>                           
                           <div class="container">                              
                              <?php if ($item['list_text_1']) { ?>
                                 <p class="text-1"><?php echo $item['list_text_1']; ?></p>
                              <?php } ?>
                              <?php if ($item['list_text_2']) { ?>
                                 <p class="text-2"><?php echo $item['list_text_2']; ?></p>
                              <?php } ?>
                              <?php if ($item['list_text_3']) { ?>
                                 <p class="text-3"><?php echo $item['list_text_3']; ?></p>
                              <?php } ?>
                              <?php if ($item['list_text_url']) { ?>
                                 <div class="slide-btn small-btn">
                                   <a href="<?php echo $item['list_link_url']['url']; ?>"><?php echo $item['list_text_url']; ?></a>
                                 </div>
                              <?php } ?>
                           </div>
                        <?php if ($item['list_link_url'] && !$item['list_text_url']) { ?>
                           </a>
                        <?php } else { ?>
                           </div>
                        <?php } ?>
                     <?php } ?>
                  </div>
               </div>
            <?php endforeach; ?>
         </div> 
      </div>
  </div>
</article>
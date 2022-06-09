<?php
   if (!defined('ABSPATH')) exit; // Exit if accessed directly 

   if ($settings['text_align'] == 'left') {
      $text_align = 'left';
   } elseif ($settings['text_align'] == 'left') {
      $text_align = 'center';
   } else {
      $text_align = 'right';
   }
?>

<article class="lth-banners <?php echo $settings['class']; ?>">
  <div class="module module_banners">
      <div class="module_content">         
         <div class="content" style="position: relative; display: flex; flex-wrap: wrap; align-items: center;">
            <div class="content-image" style="width: 100%;">
               <?php if ($settings['text_url_link'] && !$settings['text_url']) { ?>
                  <a href="<?php echo $settings['text_url_link']['url']; ?>" class="image">
               <?php } ?>
                  <img src="<?php echo $settings['image']['url']; ?>" alt="Slide" width="<?php echo $settings['image_width']; ?>" height="<?php echo $settings['image_height']; ?>"> 
               <?php if ($settings['text_url_link'] && !$settings['text_url']) { ?>
                  </a>
               <?php } ?>
            </div>

            <?php if ($settings['text_1'] || $settings['text_2'] || $settings['text_3'] || $settings['text_url']) { ?>
               <?php if ($settings['text_url_link'] && !$settings['text_url']) { ?>
                  <a href="<?php echo $settings['text_url_link']['url']; ?>" class="content-box" style="position: absolute; width: 100%; text-align: <?php echo $text_align; ?>;">
               <?php } else { ?>
                  <div class="content-box" style="position: absolute; width: 100%; text-align: <?php echo $text_align; ?>;">
               <?php } ?>                           
                  <div class="container">                              
                     <?php if ($settings['text_1']) { ?>
                        <p class="text-1"><?php echo $settings['text_1']; ?></p>
                     <?php } ?>
                     <?php if ($settings['text_2']) { ?>
                        <p class="text-2"><?php echo $settings['text_2']; ?></p>
                     <?php } ?>
                     <?php if ($settings['text_3']) { ?>
                        <p class="text-3"><?php echo $settings['text_3']; ?></p>
                     <?php } ?>
                     <?php if ($settings['text_url']) { ?>
                        <div class="slide-btn small-btn">
                          <a href="<?php echo $settings['text_url_link']['url']; ?>"><?php echo $settings['text_url']; ?></a>
                        </div>
                     <?php } ?>
                  </div>
               <?php if ($settings['text_url_link'] && !$settings['text_url']) { ?>
                  </a>
               <?php } else { ?>
                  </div>
               <?php } ?>
            <?php } ?>
         </div>
      </div>
  </div>
</article>
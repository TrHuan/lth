<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php if ($settings['style_items'] == 1) { ?>
   <div class="brand-area ptb-90">
      <div class="container">
         <!-- Brand Logo Active Start Here -->
         <div class="brand-logo-active owl-carousel">
            <?php
               if ( $settings['list'] ) {
                  foreach (  $settings['list'] as $item ) { ?> 
                    <div class="single-brand">
                        <a href="<?php echo $item['list_link_url']['url']; ?>">
                           <img src="<?php echo $item['list_image']['url']; ?>" alt="Brand-img" width="170" height="130">
                        </a>
                    </div>
                  <?php }
               }
            ?>  
         </div>
         <!-- Brand Logo Active End Here -->
      </div>
  </div>
<?php } ?>
<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php if ($settings['style_items'] == 1) { ?>
   <div class="multi-banner pb-60">
      <div class="row">
         <div class="col-md-6 col-sm-6 mb-xsm-30">
             <!-- Single Banner Start Here -->
             <div class="single-banner single-categorie">
                 <div class="cat-img">
                     <a href="<?php echo $settings['link_url_1']['url']; ?>">
                        <img src="<?php echo $settings['image_1']['url']; ?>" alt="categorie-banner">
                     </a>
                     <div class="cat-content">
                        <a href="<?php echo $settings['link_url_1']['url']; ?>">
                           <?php echo $settings['name_1']; ?>                              
                        </a>
                     </div>
                 </div>
             </div>
             <!-- Single Banner End Here -->
         </div>
         <div class="col-md-6 col-sm-6">
             <div class="sub-top-pro">
                 <div class="row">
                     <div class="col-md-6 col-sm-6 col-6">
                          <!-- Single Banner Start Here -->
                          <div class="single-banner single-categorie">
                             <div class="cat-img">
                                 <a href="<?php echo $settings['link_url_2']['url']; ?>">
                                    <img src="<?php echo $settings['image_2']['url']; ?>" alt="categorie-banner">
                                 </a>
                                 <div class="cat-content">
                                    <a href="<?php echo $settings['link_url_2']['url']; ?>">
                                       <?php echo $settings['name_2']; ?>                              
                                    </a>
                                 </div>
                             </div>
                         </div>
                         <!-- Single Banner End Here -->
                     </div>
                     <div class="col-md-6 col-sm-6 col-6">
                         <!-- Single Banner Start Here -->
                          <div class="single-banner single-categorie">
                             <div class="cat-img">
                                 <a href="<?php echo $settings['link_url_3']['url']; ?>">
                                    <img src="<?php echo $settings['image_3']['url']; ?>" alt="categorie-banner">
                                 </a>
                                 <div class="cat-content">
                                    <a href="<?php echo $settings['link_url_3']['url']; ?>">
                                       <?php echo $settings['name_3']; ?>                              
                                    </a>
                                 </div>
                             </div>
                         </div>
                         <!-- Single Banner End Here -->
                     </div>
                 </div>
             </div>
             <div class="sub-bottom-pro mt-25">
                  <!-- Single Banner Start Here -->
                  <div class="single-banner single-categorie">
                     <div class="cat-img">
                        <a href="<?php echo $settings['link_url_4']['url']; ?>">
                           <img src="<?php echo $settings['image_4']['url']; ?>" alt="categorie-banner">
                        </a>
                        <div class="cat-content">
                           <a href="<?php echo $settings['link_url_4']['url']; ?>">
                              <?php echo $settings['name_4']; ?>                              
                           </a>
                        </div>
                     </div>
                 </div>
                 <!-- Single Banner End Here -->
             </div>
         </div>
      </div>
 </div>
<?php } ?>
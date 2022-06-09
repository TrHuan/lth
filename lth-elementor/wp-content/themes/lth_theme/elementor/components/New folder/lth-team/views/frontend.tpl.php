<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php if ($settings['style_items'] == 1) { ?>
   <div class="our-team dark-white-bg ptb-90">
      <div class="container">
        <div class="about-title team-title">
            <h3><?php echo $settings['heading_text']; ?></h3>
        </div>
          <div class="row text-center">
            <?php
               if ( $settings['list'] ) {
                  foreach (  $settings['list'] as $item ) { ?> 
                     <!-- Single Team Start Here -->
                     <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="single-team mb-all-30">
                           <div class="team-img sidebar-img sidebar-banner">
                              <a href="#"><img src="<?php echo $item['list_image']['url']; ?>" alt="team-image"></a>
                              <div class="team-link">
                                 <ul>
                                    <li><a href="<?php echo $item['list_facebook']['url']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?php echo $item['list_twitter']['url']; ?>"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $item['list_google_plus']['url']; ?>"><i class="fab fa-google-plus-g"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="team-info">
                              <h4><?php echo $item['list_name']; ?></h4>
                              <p><?php echo $item['list_description']; ?></p>
                           </div>
                        </div>
                     </div>
                     <!-- Single Team End Here -->
                  <?php }
               }
            ?>                     
          </div>
      </div>
  </div>
<?php } ?>
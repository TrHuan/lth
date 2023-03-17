<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php if ($settings['style_items'] == 1) { ?>
   <div class="skill-area white-bg ptb-90">
      <div class="container">
          <div class="row">
              <div class="col-lg-6">
                  <div class="about-content mb-all-40">
                     <!-- Section Title Start -->
                      <div class="about-title">
                          <h1><?php echo $settings['heading_text']; ?></h1>
                      </div>
                      <!-- Section Title End -->
                      <p><?php echo $settings['description_text']; ?></p>

                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="skill-content">
                     <div class="skill">
                        <?php
                           if ( $settings['list'] ) {
                              foreach (  $settings['list'] as $item ) { ?> 
                                 <div class="progress">
                                    <div class="lead"><?php echo $item['list_text']; ?></div>
                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?php echo $item['list_number']; ?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="90%" class="progress-bar wow fadeInLeft animated"><span><?php echo $item['list_number']; ?>%</span></div>
                                </div>
                              <?php }
                           }
                        ?>                          
                     </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
<?php } ?>
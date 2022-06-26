<?php

function hw_viewnumber_func($atts){
    extract(shortcode_atts(array(
      'img'         => '',
      'inline_svg'  => 'true',
      'number'      => '1234',
      'title'       => 'Título',
      'description' => 'Descrição...',
      'btn'         => 'Ver mais',
      'link'        => '',
    ), $atts));
 
    if($visibility == 'hidden') return;
    ob_start();
 
    echo '
    <a href="'.$link.'" class="nossos-numeros">
    <div>
 
      <div class="head">      
        <div class="icon">'.flatsome_get_image( $img, $size = 'medium', $alt = $title, $inline_svg ).'</div>
        
        <div class="number">        
          <div class="icon g1-numbers" data-g1-start="0" data-g1-stop="'.$number.'">
            <span class="g1-numbers-start"></span>
            <span class="g1-numbers-stop">'.$number.'</span>
          </div>
          <p class="">'.$title.'</p>
        </div>
      </div>
 
      <div class="descripion">
        <p class="">'.$description.'</p>
        <span class="">'.$btn.'</span>
      </div>
      
    </div>
    </a>
    ';
 
    return ob_get_clean();
}
add_shortcode('hw_viewnumber', 'hw_viewnumber_func');
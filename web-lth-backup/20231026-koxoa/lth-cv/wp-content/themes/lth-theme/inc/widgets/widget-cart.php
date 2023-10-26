<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_cart' );

  function create_widget_cart() {

    register_widget('Widget_Cart');

  }



  /**

  * Tạo class Widget_Cart

  */

  class Widget_Cart extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_cart', // id của widget

        'Giỏ Hàng', // tên của widget

        array(

          'description' => 'Mô tả của widget' // mô tả

        )

      );

    }



    /**

    * Tạo form option cho widget

    */

    function form( $instance ) {

      //Biến tạo các giá trị mặc định trong form

      $default = array(

        'title' => 'Tiêu Đề',

      );



      //Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định

      $instance = wp_parse_args( (array) $instance, $default);



      //Tạo biến riêng cho giá trị mặc định trong mảng $default

      $title = esc_attr( $instance['title'] );

      $posts_per_page = esc_attr( $instance['posts_per_page'] );



      //Hiển thị form trong option của widget

      echo'<p>';

      echo "Tiêu Đề:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('title').'" value="'.$title.'" />';

      echo'</p>';

    }



    /**

    * save widget form

    */

    function update( $new_instance, $old_instance ) {

      parent::update( $new_instance, $old_instance );

      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);

      return $instance;

    }



    /**

    * Show widget

    */

    function widget( $args, $instance ) { 

      extract( $args );

      $title = apply_filters( 'widget_title', $instance['title'] );



      echo $before_widget;

      // Nội dung trong widget ?>
      
      <div class="shopcart">  
          <?php
              global $woocommerce;
              $cart_url = wc_get_cart_url();
          ?>
       
          <div class="cart-header clearfix">
              <?php require_once(WOO_DIR . '/cart/mini-cart-ajax.php'); ?>
          </div>
      </div>
      <?php // Kết thúc nội dung trong widget

      echo $after_widget;

    }

  }

?>
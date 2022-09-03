<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_logo' );

  function create_widget_logo() {

    register_widget('Widget_Logo');

  }



  /**

  * Tạo class Widget_Logo

  */

  class Widget_Logo extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_logo', // id của widget

        'Logo', // tên của widget

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

      // Nội dung trong widget
          $logo = get_field('logo', 'option');
          $w = get_field('width_logo', 'option');
          $h = get_field('height_logo', 'option');
      ?>
      <div class="logo">
        <a href="<?php echo get_home_url( $lang ); ?>" title="">
            <img src="<?php echo lth_custom_logo('full', $w, $h); ?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>">
        </a>
      </div>
      <?php // Kết thúc nội dung trong widget

      echo $after_widget;

    }

  }

?>
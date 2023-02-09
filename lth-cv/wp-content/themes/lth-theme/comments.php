<?php
/**
* The template file for displaying the comments and comment form for the
* Twenty Twenty theme.
*
* @package WordPress
* @subpackage Twenty_Twenty
* @since Twenty Twenty 1.0
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() ) {
  return;
} ?>

<div id="review_form_wrapper">
  <?php if (have_comments()) : ?>
  <h3><?php
    printf( // WPCS: XSS OK.
      esc_html( _nx( '1 bình luận', '%1$s bình luận', get_comments_number(), 'comments title' ) ),
      number_format_i18n( get_comments_number() ),
      '<span></span>'
    );
  ?></h3>
  <ol class="comment-list commentlist">
    <?php
      wp_list_comments(array(
        'avatar_size' => 50,
        'style' => 'ol',
      ));
    ?>
  </ol>
  <?php endif; ?>

  <?php comment_form(array(
    'title_reply' => __('Viết bình luận'),
    'label_submit' => __('Gửi bình luận'),
  )); ?>
</div>
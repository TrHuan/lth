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
    <?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>   
        <?php die('You can not access this page directly!'); ?>  
    <?php endif; ?>

    <?php if(!empty($post->post_password)) : ?>
        <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
            <p>This post is password protected. Enter the password to view comments.</p>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(comments_open()) : ?>
        <?php if(get_option('comment_registration') && !$user_ID) : ?>
            <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p><?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <div class="review_form_wrapper">
                    <div class="comment-form-comment">
                        <?php if(is_user_logged_in()) : ?>
                            <p><strong><?php echo __('Xin chào '); ?> <?php echo $user_identity; ?></strong>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account"><?php echo __('Đăng xuất'); ?></a></p>
                        <?php else : ?>
                            <p>
                                <label for="author">Name <?php if($req) { ?><span class="required">*</span><?php } ?></label>
                                <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" class="form-control"/>
                            </p>
                            <p>
                                <label for="email">Mail <?php if($req) { ?><span class="required">*</span><?php } ?></label>
                                <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" class="form-control"/>
                            </p>
                        <?php endif; ?>
                        <p>
                            <label for="comment">Bình luận <span class="required">*</span></label>
                            <textarea name="comment" id="comment" cols="100%" rows="8" class="form-control"></textarea>
                        </p>
                        <p><input name="submit" type="submit" id="submit" value="Gửi đi" class="btn" />
                        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
                        <?php do_action('comment_form', $post->ID); ?>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    <?php else : ?>
        <p>The comments are closed.</p>
    <?php endif; ?>

    <?php if($comments) : ?>
        <ol class="commentlist">
            <?php foreach($comments as $comment) : ?>
            <li id="comment-<?php comment_ID(); ?>" class="comment_container">
                <?php echo get_avatar($userdata->ID); ?>
                <div class="comment-text">
                    <p class="meta"><strong><?php if(is_user_logged_in()) { echo $user_identity; } else { comment_author();  } ?></strong> - <?php comment_date(); ?></p>

                    <?php if ($comment->comment_approved == '0') : ?>
                        <p class="description"><?php echo __('Đánh giá của bạn đang chờ phê duyệt!'); ?></p>
                    <?php else : ?>
                        <div class="description"><?php comment_text(); ?></div>
                    <?php endif; ?>
                </div>
            </li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>
</div>
<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>

    <?php if (is_active_sidebar('main_footer')) {
        dynamic_sidebar('main_footer');
    } ?>

</main>

<footer id="footer" class="footer-wrapper">

	<?php do_action('flatsome_footer'); ?>

</footer>

</div>

<?php if ( class_exists( 'WooCommerce' ) ) { ?>
    <div class="notification-product">
        <span class="remove-product"><?php echo __('Xóa sản phẩm thành công.'); ?></span>
        <span class="add-product"><?php echo __('Thêm vào giỏ hàng thành công.'); ?></span>
    </div>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>

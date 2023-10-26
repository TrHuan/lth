<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="error">
    <p><?php echo __( 'QR code MeCard/vCard generator', 'wp-qrcode-me-v-card' ) . ' ' . __( "error: Your environment doesn't meet all of the system requirements listed below.", 'wp-qrcode-me-v-card' ) ?> </p>

    <ul class="ul-disc">
        <li>
            <strong>PHP <?php echo WQM_REQUIRED_PHP_VERSION; ?>+</strong>
            <em>(<?php echo __( "You're running version ", 'wp-qrcode-me-v-card' ) . PHP_VERSION; ?>)</em>
        </li>

        <li>
            <strong>WordPress <?php echo WQM_REQUIRED_WP_VERSION; ?>+</strong>
            <em>(<?php echo __( "You're running version ", 'wp-qrcode-me-v-card' ) . esc_html( $wp_version ); ?>)</em>
        </li>
    </ul>

    <p><?php _e( 'If you need to upgrade your version of PHP you can ask your hosting company for assistance, and if you need help upgrading WordPress you can refer to the', 'wp-qrcode-me-v-card' ) ?>
        <a href="https://wordpress.org/documentation/article/updating-wordpress">Codex</a>.</p>
</div>

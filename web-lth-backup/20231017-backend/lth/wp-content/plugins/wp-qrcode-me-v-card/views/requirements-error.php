<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="error">
    <p><?php echo WQM_Common::PLUGIN_HUMAN_NAME . _e( 'error: Your environment doesn\'t meet all of the system requirements listed below.', WQM_Common::PLUGIN_SYSTEM_NAME ) ?> </p>

    <ul class="ul-disc">
        <li>
            <strong>PHP <?php echo WQM_REQUIRED_PHP_VERSION; ?>+</strong>
            <em>(<?php echo __( 'You\'re running version', WQM_Common::PLUGIN_SYSTEM_NAME ) . PHP_VERSION; ?>)</em>
        </li>

        <li>
            <strong>WordPress <?php echo WQM_REQUIRED_WP_VERSION; ?>+</strong>
            <em>(<?php echo __( 'You\'re running version', WQM_Common::PLUGIN_SYSTEM_NAME ) . esc_html( $wp_version ); ?>)</em>
        </li>
    </ul>

    <p><?php _e( 'If you need to upgrade your version of PHP you can ask your hosting company for assistance, and if you need help upgrading WordPress you can refer to the', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>
        <a href="http://codex.wordpress.org/Upgrading_WordPress">Codex</a>.</p>
</div>

<?php
/**
 * Plugin Name:     QR code MeCard/vCard generator
 * Description:     Share your contact information such as emails, phone number and much more through QR code with WordPress using shortcode, widget or by direct link.
 * Plugin URI:      https://web-marshal.ru/qr-code-mecard-vcard-generator/
 * Author URI:      https://www.linkedin.com/in/stasionok/
 * Author Telegram: https://t.me/stasionok
 * Author:          Stanislav Kuznetsov
 * Version:     1.6.3
 * License:         GPLv2 or later
 * Text Domain:     wp-qrcode-me-v-card
 * Domain Path:     /languages
 *
 * Network:         false
 */

defined( 'ABSPATH' ) || exit;

const WQM_REQUIRED_PHP_VERSION = '7.3'; // because of vendor library require 7.3
const WQM_REQUIRED_WP_VERSION  = '5.0'; // tested just from 5.0

/**
 * Checks if the system requirements are met
 *
 * @return bool True if system requirements are met, false if not
 */
function wqm_requirements_met(): bool {
	global $wp_version;

	if ( version_compare( PHP_VERSION, WQM_REQUIRED_PHP_VERSION, '<' ) ) {
		return false;
	}

	if ( version_compare( $wp_version, WQM_REQUIRED_WP_VERSION, '<' ) ) {
		return false;
	}

	return true;
}

/**
 * Prints an error that the system requirements weren't met.
 */
function wqm_requirements_error() {
	global $wp_version; //for view

	require_once( dirname( __FILE__ ) . '/views/requirements-error.php' );
}

/**
 * Begins execution of the plugin.
 *
 * Plugin run entry point
 *
 */
function wqm_run_qrcode_me_v_card() {
	$plugin = new WQM_Common();
	$plugin->run();
}

/**
 * Check requirements and load main class
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met. Otherwise older PHP installations could crash when trying to parse it.
 */
require_once( __DIR__ . '/controller/class-wqm-common.php' );

if ( wqm_requirements_met() ) {
	if ( method_exists( WQM_Common::class, 'activate' ) ) {
		register_activation_hook( __FILE__, array( WQM_Common::class, 'activate' ) );
	}

	wqm_run_qrcode_me_v_card();
} else {
	add_action( 'admin_notices', 'wqm_requirements_error' );
}

if ( method_exists( WQM_Common::class, 'deactivate' ) ) {
	register_deactivation_hook( __FILE__, array( WQM_Common::class, 'deactivate' ) );
}

if ( method_exists( WQM_Common::class, 'uninstall' ) ) {
	register_uninstall_hook( __FILE__, array( WQM_Common::class, 'uninstall' ) );
}



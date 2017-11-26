<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.woocommerce.expert
 * @since             1.0.0
 * @package           Consent_Cookies
 *
 * @wordpress-plugin
 * Plugin Name:       Consent Cookies
 * Plugin URI:        http://consentprotect.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ali Raza
 * Author URI:        http://www.woocommerce.expert
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       consent-cookies
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-consent-cookies-activator.php
 */
function activate_consent_cookies() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-consent-cookies-activator.php';
	Consent_Cookies_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-consent-cookies-deactivator.php
 */
function deactivate_consent_cookies() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-consent-cookies-deactivator.php';
	Consent_Cookies_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_consent_cookies' );
register_deactivation_hook( __FILE__, 'deactivate_consent_cookies' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-consent-cookies.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_consent_cookies() {

	$plugin = new Consent_Cookies();
	$plugin->run();

}




run_consent_cookies();


// [footag foo="bar"]
function consent_cookies_shortcode( $atts ) {

   return '<div id="consent-managment-hook"></div>';



}
add_shortcode( 'consent_management_page', 'consent_cookies_shortcode' );

//consent_management_page

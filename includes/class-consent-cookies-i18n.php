<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.woocommerce.expert
 * @since      1.0.0
 *
 * @package    Consent_Cookies
 * @subpackage Consent_Cookies/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Consent_Cookies
 * @subpackage Consent_Cookies/includes
 * @author     Ali Raza <razaminhas11@gmail.com>
 */
class Consent_Cookies_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'consent-cookies',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

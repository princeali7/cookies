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
 * Plugin Name:       Consent Protect 
 * Plugin URI:        http://consentprotect.com
 * Description:       Managing consents using smart contracts.
 * Version:           1.1.5  
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
function consent_cookies_shortcode( $atts ) {

   return '<div id="consent-managment-hook"></div>';



} 
add_shortcode( 'consent_management_page', 'consent_cookies_shortcode' );


add_action('wp_head','consent_scripts_loader');

function consent_scripts_loader(){
$siteurl= get_site_url(null, '', 'http');
$siteurl=str_replace('http://','',$siteurl);
$scripts= file_get_contents("https://consent-app.consentprotect.com/api/v1/get-forms-services?shop=".$siteurl);

$scriptjson= json_decode($scripts);
    try{
foreach($scriptjson->services as $script){
 
$isconsentgiven=  @$_COOKIE['consent-banner-'.$script->consentId];  
if($isconsentgiven=='accepted'){
    
    if(!empty($script->serviceCode)){
    
    echo "<!-- script for banner $script->serviceName inserted-->\n";
    echo "<script> console.warn('$script->serviceName script inserted after consent verfied');</script> ";    
    echo $script->serviceCode; 
    }
    }     


}  
    } 
    catch(Exception $e){
        echo '<script>console.warn("something bad happend");</script>';
    } 



 
?> 
<?php
}

 


require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4p3_Factory::buildUpdateChecker(
	'https://github.com/princeali7/cookies',
	__FILE__,
	'consent-cookie'
); 
 
//consent_management_page

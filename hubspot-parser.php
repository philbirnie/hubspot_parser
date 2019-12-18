<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://7thstreetweb.com
 * @since             0.0.1
 * @package           Hubspot_Feed
 *
 * @wordpress-plugin
 * Plugin Name:       Hubspot Feed Parser
 * Plugin URI:        http://7thstreetweb.com/
 * Description:       Parser to pull in Hubspot Data from Blogs
 * Version:           0.0.1
 * Author:            7th Street Web
 * Author URI:        http://7thstreetweb.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hubspot-feed
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'Hubspot_Feed_Version', '1.0.0' );

/** Table Constants */


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_hubspot_feed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hubspot-feed-activator.php';
	Hubspot_Feed_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_hubspot_feed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hubspot-feed-deactivator.php';
	Hubspot_Feed_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hubspot_feed' );
register_deactivation_hook( __FILE__, 'deactivate_hubspot_feed' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hubspot-feed.php';
require plugin_dir_path( __FILE__ ) . 'includes/autoload.php';

add_filter( 'http_request_host_is_external', '__return_true' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Hubspot_Feed();
	$plugin->run();

}
run_plugin_name();

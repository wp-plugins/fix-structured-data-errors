<?php

/**
 * @link              https://www.acceleratormarketing.com
 * @since             1.0.0
 * @package           Fix_Structured_Data_Errors
 *
 * @wordpress-plugin
 * Plugin Name:       Fix Structured Data Errors
 * Plugin URI:        https://www.acceleratormarketing.com/fix-structured-data-errors
 * Description:       This plugin attempts to fix structured data errors in your wordpress site so they don't show up in Google Webmaster Tools.
 * Version:           1.0.0
 * Author:            Accelerator Marketing
 * Author URI:        https://www.acceleratormarketing.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fix-structured-data-errors
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fix-structured-data-errors-activator.php
 */
function activate_fix_structured_data_errors() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fix-structured-data-errors-activator.php';
	Fix_Structured_Data_Errors_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fix-structured-data-errors-deactivator.php
 */
function deactivate_fix_structured_data_errors() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fix-structured-data-errors-deactivator.php';
	Fix_Structured_Data_Errors_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fix_structured_data_errors' );
register_deactivation_hook( __FILE__, 'deactivate_fix_structured_data_errors' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fix-structured-data-errors.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fix_structured_data_errors() {

	$plugin = new Fix_Structured_Data_Errors();
	$plugin->run();

}
run_fix_structured_data_errors();

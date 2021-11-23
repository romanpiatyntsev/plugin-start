<?php
/**
 * Plugin Name: CodeTest
 * Plugin URI: https://github.com/
 * Description: This description of the plugin
 * Version: 1.0.0
 * Author: Rian Pono
 * Author URI: https://github.com/romanpiatyntsev
 * Text Domain: codetest
 * Domain Path: /languages
 * Requires at least: 5.6
 * Requires PHP: 7.4
 *
 * @package CodeTest
 */

/**
 * If this file is called directly, abort.
 */
defined( 'ABSPATH' ) || exit;

/**
 * Currently plugin version.
 */
define( 'CTP_VERSION', '1.0.0' );
define( 'CTP_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Registration autoload plugin's PHP classes.
 *
 * @since    1.0.0
 */
require_once CTP_DIR . 'includes/config/class-ctp-auto-loader.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ctp-code-test-install.php
 */
register_activation_hook( __FILE__, array( 'CTP_Code_Test_Install', 'activate' ) );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ctp-code-test-install.php
 */
register_deactivation_hook( __FILE__, array( 'CTP_Code_Test_Install', 'deactivate' ) );

/**
 * Init and run plugin's core
 */
function run_ctp_code_test() {
	new CTP_Code_Test_Manager();
}

run_ctp_code_test();

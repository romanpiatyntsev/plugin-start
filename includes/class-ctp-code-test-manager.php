<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.0.0
 *
 * @package     CodeTest
 * @subpackage  CodeTest/include
 */

/**
 * If this file is called directly, abort.
 */
defined( 'ABSPATH' ) || exit;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package     CodeTest
 * @subpackage  CodeTest/include
 */
class CTP_Code_Test_Manager {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      CTP_Code_Test_Hooks_Loader    $hooks_loader    Maintains and registers all hooks for the plugin.
	 */
	protected $hooks_loader;

	/**
	 * The loader that's responsible for maintaining and registering all plugin's shortcodes
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      CTP_Code_Test_Shortcodes_Loader    $shortcodes_loader    Maintains and registers all shortcodes for the plugin.
	 */
	protected $shortcodes_loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Init instance and run core of plugin
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function __construct() {
		$this->plugin_name = 'code-test';

		if ( defined( 'CTP_VERSION' ) ) {
			$this->version = CTP_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		$this->hooks_loader      = new CTP_Code_Test_Hooks_Loader();
		$this->shortcodes_loader = new CTP_Code_Test_Shortcodes_Loader();

		$this->add_plugins_hooks();
		$this->add_plugins_shortcodes();
	}

	/**
	 * Add and register plugin's hooks
	 *
	 * @since 1.0.0
	 */
	public function add_plugins_hooks() {

		/**
		 * Set plugin text domain
		 */
		$this->set_locale();

		/**
		 * Add hooks for admin
		 */
		$this->add_admin_hooks();

		/**
		 * Add hooks for public
		 */
		$this->add_public_hooks();

		/**
		 * Registration WP actions and filters
		 */
		$this->hooks_loader->run();
	}

	/**
	 * Add and register plugin's shortcodes
	 *
	 * @since 1.0.0
	 */
	public function add_plugins_shortcodes() {
		$shortcode_list = array(
			'foobar',
			'footer-images',
		);
		$this->shortcodes_loader->add_shortcode( $shortcode_list );
	}

	/**
	 * Get plugin name
	 *
	 * @since    1.0.0
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Get plugin version
	 *
	 * @since    1.0.0
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new CTP_Code_Test_I18n();
		$this->hooks_loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function add_admin_hooks() {

		$plugin_admin = new CTP_Code_Test_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->hooks_loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->hooks_loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function add_public_hooks() {

		$plugin_public = new CTP_Code_Test_Public( $this->get_plugin_name(), $this->get_version() );

		$this->hooks_loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->hooks_loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}
}

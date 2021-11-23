<?php
/**
 * Register all shortcode of the plugin.
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
 * Register all shortcode of the plugin.
 *
 * @package     CodeTest
 * @subpackage  CodeTest/include
 */
class CTP_Code_Test_Shortcodes_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $shortcodes_list;

	/**
	 * Shortcode class handler prefix
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $class_prefix    Shortcode class handler prefix.
	 */
	protected $class_prefix;

	/**
	 * Initialize the collections used to maintain the shortcodes.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->class_prefix    = 'CTP_Shortcode_';
		$this->shortcodes_list = array();
	}

	/**
	 * Add a new shortcode to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    array $shortcode_list  The list of the WordPress shortcodes that is being registered.
	 */
	public function add_shortcode( $shortcode_list ) {
		$this->shortcodes_list = $shortcode_list;

		foreach ( $this->shortcodes_list as $shortcode ) {
			/**
			 * Generate class handler name
			 */
			$shortcode_classpart = str_replace( '-', '_', ucwords( $shortcode, '-' ) );
			$class_handler_name  = $this->class_prefix . $shortcode_classpart;

			/**
			 * Check if a shorcode has a handler.
			 */
			if ( class_exists( $class_handler_name, true ) ) {
				add_shortcode( $shortcode, array( new $class_handler_name(), 'shortcode_handler' ) );
			}
		}
	}
}

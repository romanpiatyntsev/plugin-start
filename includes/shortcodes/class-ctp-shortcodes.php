<?php
/**
 * Register shortcode of the plugin.
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
 * Abstract class for shortcode of the plugin.
 *
 * @package     CodeTest
 * @subpackage  CodeTest/include
 */
abstract class CTP_Shortcodes {

	/**
	 * Abstract method for shorcode handling
	 *
	 * @param array|string $atts Array of shortcode attributes.
	 * @param string       $content Content of shortcode [scode]conntent[/scode].
	 * @param string       $name Name of shorcode.
	 */
	abstract public function shortcode_handler( $atts = '', $content = '', $name );
}

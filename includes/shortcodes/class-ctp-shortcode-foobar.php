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
 * Register [foobar] shortcode of the plugin.
 * Shortcode return own name.
 *
 * @package     CodeTest
 * @subpackage  CodeTest/include
 */
class CTP_Shortcode_Foobar extends CTP_Shortcodes {

	/**
	 * Handler of shortcode
	 *
	 * @param array|string $atts Array of shortcode attributes.
	 * @param string       $content Content of shortcode [scode]conntent[/scode].
	 * @param string       $name Name of shorcode.
	 */
	public function shortcode_handler( $atts = '', $content = '', $name ) {
		return '***' . $name;
	}
}

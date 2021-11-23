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
 * Register [footer-image border=$val caption=$val] shortcode of the plugin.
 * Shortcode return own name.
 *
 * @package     CodeTest
 * @subpackage  CodeTest/include
 */
class CTP_Shortcode_Footer_Images extends CTP_Shortcodes {

	/**
	 * Handler of shortcode
	 *
	 * @param array|string $atts Array of shortcode attributes.
	 * @param string       $content Content of shortcode [scode]conntent[/scode].
	 * @param string       $name Name of shorcode.
	 */
	public function shortcode_handler( $atts = '', $content = '', $name ) {

		/**
		 * Check $atts and set default values if not exist.
		 */
		$atts = shortcode_atts(
			array(
				'border'  => '1px',
				'caption' => 'image caption',
			),
			$atts
		);

		return "*** {$name} = {$atts['border']} and {$atts['caption']}";
	}
}

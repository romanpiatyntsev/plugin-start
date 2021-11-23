<?php
/**
 * Register autoloader of PHP classes
 *
 * @since 1.0.0
 *
 * @package     CodeTest
 * @subpackage  CodeTest/config
 */

/**
 * If this file is called directly, abort.
 */
defined( 'ABSPATH' ) || exit;

/**
 * Register autoloader of PHP classes
 * Load and register spl_autoload_register() function
 * https://www.php.net/manual/ru/function.spl-autoload-register.php
 *
 * @since 1.0.0
 *
 * @package     CodeTest
 * @subpackage  CodeTest/config
 */
class CTP_Auto_Loader {

	/**
	 * The array of dir's PHP classes.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array
	 */
	private $dirs = array();

	/**
	 * Initialization of the autoloader class instance
	 * and registering handler for PHP classes autoload function
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		spl_autoload_register( array( $this, 'loader' ) );
	}

	/**
	 * Add existing plugins PHP classes dirs
	 *
	 * @since    1.0.0
	 */
	public function register() {
		$this->dirs = array(
			CTP_DIR,
			CTP_DIR . 'includes/',
			CTP_DIR . 'includes/config/',
			CTP_DIR . 'includes/shortcodes/',
			CTP_DIR . 'public/',
			CTP_DIR . 'admin/',
		);
	}

	/**
	 * Handler of PHP autoload function.
	 *
	 * Convert file name to class name
	 * and if exist require the file.
	 *
	 * @since 1.0.0
	 * @param string $classname Name of needed PHP class.
	 */
	public function loader( $classname ) {
		$classname = strtolower( $classname );
		$classname = str_replace( '_', '-', $classname );
		foreach ( $this->dirs as $dir ) {
			$file = "{$dir}class-{$classname}.php";
			if ( file_exists( $file ) ) {
				require_once $file;
				return;
			}
		}
	}
}

/**
 * Init instance and register PHP plugin's classes autoload
 */
$auto_loader = new CTP_Auto_Loader();
$auto_loader->register();

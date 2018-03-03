<?php
/**
 * Search Inside WordPress Plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/search-inside
 * @copyright 2017 - 2018 (c) Josantonius - Search Inside
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/search-inside.git
 * @since     1.2.1
 */

namespace SearchInside\Tests;

use Eliasis\Framework\App;

/**
 * Tests class for Search Inside plugin.
 */
final class Plugin_Test extends \WP_UnitTestCase {

	/**
	 * App instance.
	 *
	 * @var object
	 */
	protected $app;

	/**
	 * Launcher instance.
	 *
	 * @var object
	 */
	protected $launcher;

	/**
	 * Set up.
	 */
	public function setUp() {

		parent::setUp();

		$this->app = new App();

		$app = $this->app;

		$app::run( __DIR__ . '/../', 'wordpress-plugin', 'SearchInside' );

		$this->launcher = $app::getControllerInstance( 'Launcher' );

		register_activation_hook( __FILE__, [ $this->launcher, 'activation' ] );

		register_deactivation_hook( __FILE__, [ $this->launcher, 'deactivation' ] );

		$this->launcher->init();
	}

	/**
	 * Check if it is an instance of.
	 */
	public function test_is_instance_of() {

		$this->assertInstanceOf(
			'Eliasis\Framework\App',
			$this->app
		);

		$this->assertInstanceOf(
			'SearchInside\Controller\Launcher',
			$this->launcher
		);
	}
}

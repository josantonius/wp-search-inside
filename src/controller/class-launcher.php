<?php
/**
 * Search Inside WordPress Plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/search-inside
 * @copyright 2017 - 2018 (c) Josantonius - Search Inside
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/search-inside.git
 * @since     1.1.7
 */

namespace SearchInside\Controller;

use Josantonius\WP_Register\WP_Register;
use Eliasis\Framework\App;
use Eliasis\Framework\Controller;

/**
 * Main plugin launcher.
 */
class Launcher extends Controller {

	/**
	 * Class initializer method.
	 *
	 * @return boolean
	 */
	public function init() {

		add_shortcode( 'add-search-inside', [ $this, 'add_shortcode' ] );

		add_action( 'init', [ $this, 'set_language' ] );

		if ( is_admin() ) {
			return $this->admin();
		}

		$this->front();
	}

	/**
	 * Hook plugin activation | Executed only when activating the plugin.
	 *
	 * @uses check_admin_referer() → user was referred from admin page
	 * @uses flush_rewrite_rules() → remove rewrite rules and recreate
	 */
	public function activation() {

		$plugin = isset( $_REQUEST['plugin'] ) ? filter_var( wp_unslash( $_REQUEST['plugin'] ), FILTER_SANITIZE_STRING ) : null;

		check_admin_referer( "activate-plugin_$plugin" );

		$this->model->set_options();

		flush_rewrite_rules();
	}

	/**
	 * Hook plugin deactivation. Executed when deactivating the plugin.
	 *
	 * @uses check_admin_referer() → tests if the current request is valid
	 * @uses flush_rewrite_rules() → remove rewrite rules and recreate
	 */
	public function deactivation() {

		$plugin = isset( $_REQUEST['plugin'] ) ? filter_var( wp_unslash( $_REQUEST['plugin'] ), FILTER_SANITIZE_STRING ) : null;

		check_admin_referer( "deactivate-plugin_$plugin" );

		flush_rewrite_rules();
	}

	/**
	 * Admin initializer method.
	 *
	 * @uses add_action() → hooks a function on to a specific action
	 */
	public function admin() {

		$this->set_menus(
			App::SearchInside()->getOption( 'pages' ),
			App::SearchInside()->getOption( 'namespaces', 'admin-page' )
		);
	}

	/**
	 * Set plugin texdomain for translations.
	 */
	public function set_language() {

		$slug = App::SearchInside()->getOption( 'slug' );

		load_plugin_textdomain(
			$slug,
			false,
			$slug . '/languages/'
		);
	}

	/**
	 * Add shortcode.
	 *
	 * @return string → html div tag
	 */
	public function add_shortcode() {

		return '<div id="search-inside-sc"></div>';
	}

	/**
	 * Get current page and load submenu.
	 *
	 * @param array  $pages → class pages.
	 * @param string $namespace → namespace.
	 */
	public function set_menus( $pages = [], $namespace = '' ) {

		foreach ( $pages as $page ) {

			$page = $namespace . $page;

			if ( ! class_exists( $page ) ) {
				continue;
			}

			$instance = call_user_func( $page . '::getInstance' );

			if ( method_exists( $instance, 'init' ) ) {
				call_user_func( [ $instance, 'init' ] );
			}

			if ( method_exists( $instance, 'set_menu' ) ) {
				call_user_func( [ $instance, 'set_menu' ] );
			}

			if ( method_exists( $instance, 'set_submenu' ) ) {
				call_user_func( [ $instance, 'set_submenu' ] );
			}
		}
	}

	/**
	 * Front initializer method.
	 */
	public function front() {

		$this->add_styles();
		$this->add_scripts();
	}

	/**
	 * Add scripts.
	 */
	protected function add_scripts() {

		WP_Register::add(
			'script',
			App::SearchInside()->getOption( 'assets', 'js', 'searchInside' )
		);
	}

	/**
	 * Add scripts.
	 */
	protected function add_styles() {

		WP_Register::add(
			'style',
			App::SearchInside()->getOption( 'assets', 'css', 'searchInside' )
		);
	}
}

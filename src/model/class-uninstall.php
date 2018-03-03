<?php
/**
 * Search Inside WordPress Plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/search-inside
 * @copyright 2017 - 2018 (c) Josantonius - Search Inside
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/search-inside.git
 * @since     1.1.3
 */

namespace SearchInside\Model;

use Eliasis\Framework\App,
	Eliasis\Framework\Model;

/**
 * Main method for cleaning and removal of components.
 */
class Uninstall extends Model {

	/**
	 * Remove and uninstall the plugin components.
	 *
	 * @uses delete_option()      → removes option by name
	 * @uses delete_site_option() → removes a option by name
	 */
	public function remove_all() {

		$slug = App::SearchInside()->getOption( 'slug' );

		delete_option( $slug . '-version' );

		delete_site_option( $slug . '-version' );
	}
}

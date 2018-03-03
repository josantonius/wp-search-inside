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

namespace SearchInside\Model;

use Eliasis\Framework\Model;
use Eliasis\Framework\App;

/**
 * Main plugin launcher model.
 */
class Launcher extends Model {

	/**
	 * Set plugin options.
	 *
	 * @uses get_option()    → option value based on an option name.
	 * @uses add_option()    → add a new option to WordPress options.
	 * @uses update_option() → update a named option/value.
	 */
	public function set_options() {

		$slug = App::SearchInside()->getOption( 'slug' );

		$actual_version    = App::SearchInside()->getOption( 'version' );
		$installed_version = get_option( $slug ) . '-version';

		if ( ! $installed_version ) {
			add_option( $slug . '-version', $actual_version );
		} else {
			if ( $installed_version < $actual_version ) {
				update_option( $slug . '-version', $actual_version );
			}
		}
	}
}

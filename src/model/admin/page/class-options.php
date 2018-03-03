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

namespace SearchInside\Model\Admin\Page;

use Eliasis\Framework\Model;
use Eliasis\Framework\App;
use Josantonius\Json\Json;

/**
 * Model class.
 */
class Options extends Model {

	/**
	 * Model constructor.
	 */
	protected function __construct() {

		$json_path = App::SearchInside()->getOption( 'path', 'json' );
		$file      = App::SearchInside()->getOption( 'file', 'settings' );

		$this->filepath = $json_path . $file;
	}

	/**
	 * Get settings.
	 *
	 * @return array → settings
	 */
	public function get_settings() {

		return Json::fileToArray( $this->filepath );
	}

	/**
	 * Set settings.
	 *
	 * @param array $options → options.
	 *
	 * @return boolean
	 */
	public function set_settings( $options ) {

		return Json::arrayToFile( $options, $this->filepath );
	}
}

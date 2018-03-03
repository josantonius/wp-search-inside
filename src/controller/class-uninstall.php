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

use Eliasis\Framework\App,
	Eliasis\Framework\Controller;

/**
 * Main method for cleaning and removal of components.
 */
class Uninstall extends Controller {

	/**
	 * Remove and uninstall the plugin components.
	 */
	public function remove_all() {

		$this->model->remove_all();
	}
}

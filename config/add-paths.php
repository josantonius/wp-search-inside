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

use Eliasis\Framework\App;

$root_path = App::ROOT();

return [

	'path' => [

		'modules'   => $root_path . 'modules/',
		'public'    => $root_path . 'public/',
		'json'      => $root_path . 'public/json/',
		'layout'    => $root_path . 'src/template/layout/',
		'page'      => $root_path . 'src/template/page/',
	],
];

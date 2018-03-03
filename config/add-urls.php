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

use Eliasis\Framework\App;

$url = App::PUBLIC_URL();

return [
	'url' => [
		'js'    => $url . 'js/',
		'css'   => $url . 'css/',
		'json'  => $url . 'json/',
		'icons' => $url . 'images/icons/',
	],
];

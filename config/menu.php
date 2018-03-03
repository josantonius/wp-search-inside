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

$icons_url = App::SearchInside()->getOption( 'url', 'icons' );

return [

	'menu' => [
		'top-level' => [
			'title'      => __( 'Search Inside', 'search-iniside' ),
			'name'       => __( 'Search Inside', 'search-iniside' ),
			'capability' => 'manage_options',
			'slug'       => 'search-inside-options',
			'function'   => '',
			'icon_url'   => $icons_url . 'search-inside-menu-admin.png',
			'position'   => 25,
		],
	],
	'submenu' => [
		'options' => [
			'parent'     => 'searchinside-options',
			'title'      => __( 'Options', 'search-iniside' ),
			'name'       => __( 'Options', 'search-iniside' ),
			'capability' => 'manage_options',
			'slug'       => 'search-inside-options',
			'function'   => '',
		],
	],
];

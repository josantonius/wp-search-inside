<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Search-Inside.git
 * @since      1.1.3
 */

use Eliasis\App\App;

$iconsUrl = App::SearchInside()->get('url', 'icons');

return [

	'menu' => [
		'top-level' => [
			'title'      => __('Search Inside', 'search-iniside'),
			'name'       => __('Search Inside', 'search-iniside'),
			'capability' => 'manage_options',
			'slug'       => 'searchinside-options',
			'function'   => '',
			'icon_url'   => $iconsUrl . 'searchinside-menu-admin.png',
			'position'   => 25,
		],
	],
	'submenu' => [
		'options' => [
			'parent'     => 'searchinside-options',
			'title'      => __('Options', 'search-iniside'),
			'name'       => __('Options', 'search-iniside'),
			'capability' => 'manage_options',
			'slug'       => 'searchinside-options',
			'function'   => '',
		],
	],
];

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

$icons = App::SearchInside()->getOption( 'url', 'icons' );
$json  = App::SearchInside()->getOption( 'url', 'json' );
$css   = App::SearchInside()->getOption( 'url', 'css' );
$js    = App::SearchInside()->getOption( 'url', 'js' );

return [

	'assets' => [

		'js' => [
			'searchInside' => [
				'name'      => 'searchInside',
				'url'       => $js . 'search-inside.min.js',
				'place'     => 'front',
				'deps'      => [ 'jquery' ],
				'version'   => '1.2.1',
				'footer'    => true,
				'params'    => [
					'settings' => $json . App::SearchInside()->getOption(
						'file',
						'settings'
					),
				],
			],
			'searchInsideAdmin' => [
				'name'      => 'searchInsideAdmin',
				'url'       => $js . 'search-inside-admin.min.js',
				'place'     => 'admin',
				'deps'      => [ 'jquery' ],
				'version'   => '1.2.1',
				'footer'    => true,
				'params'    => [
					'icons_url' => $icons,
				],
			],
		],

		'css' => [
			'searchInside' => [
				'name'      => 'searchInside',
				'url'       => $css . 'search-inside.min.css',
				'place'     => 'front',
				'deps'      => [],
				'version'   => '1.2.1',
				'media'     => '',
			],
			'searchInsideAdmin' => [
				'name'      => 'searchInsideAdmin',
				'url'       => $css . 'search-inside-admin.min.css',
				'place'     => 'admin',
				'deps'      => [],
				'version'   => '1.2.1',
				'media'     => '',
			],
		],
	],
];

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

$plugin_name = 'SearchInside';

return [
	'namespaces' => [
		'modules'         => $plugin_name . '\\Modules\\',
		'admin-page'      => $plugin_name . '\\Controller\\Admin\\Page\\',
		'controller'      => $plugin_name . '\\Controller\\',
	],
];

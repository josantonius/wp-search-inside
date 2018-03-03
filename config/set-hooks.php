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

$namespace = App::SearchInside()->getOption( 'namespaces', 'admin-page' );

return [
	'hooks' => [
		[ 'select-options-one', [ $namespace . 'Options', 'select_options_one' ] ],
		[ 'select-options-two', [ $namespace . 'Options', 'select_options_two' ] ],
	],
];

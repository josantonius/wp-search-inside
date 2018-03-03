<?php
/**
 * Search Inside WorPress Plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/search-inside
 * @copyright 2017 - 2018 (c) Josantonius - Search Inside
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/search-inside.git
 * @since     1.0.0
 */

require 'vendor/autoload.php';

use Eliasis\Framework\App;

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

App::run( __DIR__, 'wordpress-plugin', 'SearchInside' );

App::SearchInside()->getControllerInstance(
	'Uninstall',
	'controller'
)->remove_all();

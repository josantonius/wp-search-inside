<?php
/**
 * Search Inside WordPress Plugin.
 *
 * Plugin Name: Search Inside
 * Plugin URI:  https://github.com/josantonius/search-inside.git
 * Description: Easily search text within your pages or blog posts.
 * Version:     1.2.1
 * Author:      Josantonius
 * Author URI:  https://josantonius.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: search-inside
 * Domain Path: /languages
 */

use Eliasis\Framework\App;

/**
 * Don't expose information if this file called directly.
 */
if ( ! function_exists( 'add_action' ) || ! defined( 'ABSPATH' ) ) {

	echo 'I can do when called directly.';
	die;
}

/**
 * Classloader.
 */
require 'vendor/autoload.php';

/**
 * Start application.
 */
App::run( __DIR__, 'wordpress-plugin', 'SearchInside' );

/**
 * Get main instance.
 */
$launcher = App::getControllerInstance( 'Launcher', 'controller' );

/**
 * Register hooks.
 */
register_activation_hook( __FILE__, [ $launcher, 'activation' ] );

register_deactivation_hook( __FILE__, [ $launcher, 'deactivation' ] );

/**
 * Launch application.
 */
$launcher->init();

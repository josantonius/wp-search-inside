<?php
/**
 * Search Inside Wordpress Plugin.
 *
 * Plugin Name: Search Inside
 * Plugin URI:  https://github.com/Josantonius/Search-Inside.git
 * Description: Easily search text within your pages or blog posts.
 * Version:     1.1.7
 * Author:      Josantonius
 * Author URI:  https://josantonius.com/ 
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: search-inside
 * Domain Path: /languages
 */

use Eliasis\App\App;

$DS = DIRECTORY_SEPARATOR;                                                                         
/** 
 * Don't expose information if this file called directly.
 */
if (!function_exists('add_action') || !defined('ABSPATH')) {

    echo 'I can do when called directly.'; die;
}

/** 
 * Classloader.
 */
require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

/** 
 * Start application.
 */
App::run(__DIR__, 'wordpress-plugin', 'SearchInside');

/** 
 * Get main instance.
 */
$Launcher = App::instance('Launcher', 'controller');

/** 
 * Register hooks.
 */
register_activation_hook(__FILE__, [$Launcher, 'activation']);

register_deactivation_hook(__FILE__, [$Launcher, 'deactivation']);

/** 
 * Launch application.
 */
$Launcher->init();
?>
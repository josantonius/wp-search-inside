<?php
/**
 * Search Inside Wordpress Plugin.
 *
 * Plugin Name: Search Inside
 * Plugin URI:  https://github.com/Josantonius/Search-Inside.git
 * Description: Easily search text within your pages or blog posts.
 * Version:     1.1.6
 * Author:      Josantonius
 * Author URI:  https://josantonius.com/ 
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: search-inside
 * Domain Path: /languages
 */

use Eliasis\App\App;

/** 
 * Don't expose information if this file called directly.
 */
if (!function_exists('add_action') || !defined('ABSPATH')) {

    echo 'I can do when called directly.'; die;
}

$DS = DIRECTORY_SEPARATOR;

define('SEARCHINSIDE', 'SearchInside');

require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

App::run(__DIR__, 'wordpress-plugin', SEARCHINSIDE);

$namespace = App::SearchInside('namespace', 'controller');

$method =  $namespace . 'Launcher::getInstance';

$Launcher = call_user_func($method);

register_activation_hook(__FILE__, [$Launcher, 'activation']);

register_deactivation_hook(__FILE__, [$Launcher, 'deactivation']);

$Launcher->init();
?>
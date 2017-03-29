<?php
/**
 * Search Inside Wordpress Plugin.
 *
 * Plugin Name: Search Inside
 * Plugin URI:  https://github.com/Josantonius/Search-Inside.git
 * Description: Easily search text within your pages or blog posts.
 * Version:     1.1.3
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

require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

new App(__DIR__, 'wordpress-plugin');

$method = App::namespace('controller') . 'Launcher::getInstance';

$Launcher = call_user_func($method);

$Launcher->init();
?>
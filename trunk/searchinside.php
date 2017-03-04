<?php
/**
 * Search Inside Wordpress Plugin.
 *
 * Plugin Name: Search Inside
 * Plugin URI:  https://github.com/Search-Inside/SearchInside.git
 * Description: Easily search text within your pages or blog posts.
 * Version:     1.1.0
 * Author:      Josantonius
 * Author URI:  http://josantonius.com/ 
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: searchinside
 */

/** 
 * Don't expose information if this file called directly.
 */
if (!function_exists('add_action') || !defined('ABSPATH')) {

    echo 'I can do when called directly.'; die;
}

require __DIR__ . '/vendor/autoload.php';

use SearchInside\Core\SearchInside,
    SearchInside\Core\Admin,
    Josantonius\WP\Language\Language;

/**
 * Load the plugin text domain for translation.
 */
Language::load(
    'searchinside', dirname(plugin_basename(__FILE__)).'/languages/'
);

$SearchInside = new SearchInside;

register_activation_hook(__FILE__, array($SearchInside, 'activation'));

register_deactivation_hook(__FILE__, array($SearchInside, 'deactivation'));

if (is_admin()) {

    $SearchInside_admin = new Admin($SearchInside);
    $SearchInside_admin->init();
}
?>
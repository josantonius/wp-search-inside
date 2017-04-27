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

namespace SearchInside\Controller;


use Eliasis\App\App;

/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.1.3
 */
class Uninstall { 

    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.1.3
     *
     * @uses delete_option()      → removes option by name
     * @uses delete_site_option() → removes a option by name
     */
    public static function removeAll() {

        $pluginName = App::SearchInside('plugin', 'name');

        delete_option($pluginName . '-version');
        // For site options in Multisite
        delete_site_option($pluginName . '-version');
    }
}

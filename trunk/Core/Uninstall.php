<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hola@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Search-Inside/SearchInside.git
 * @since      1.0.0
 */

namespace SearchInside\Core;

/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.0.0
 */
class Uninstall { 

    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.0.0
     *
     * @uses delete_option()      → removes option by name
     * @uses delete_site_option() → removes a option by name
     */
    public static function removeAll() {

        delete_option('searchinside_version');
        // For site options in Multisite
        delete_site_option('searchinside_version');
    }
}

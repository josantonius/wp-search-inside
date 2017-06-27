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

namespace SearchInside\Model\Uninstall;

use Eliasis\App\App,
    Eliasis\Model\Model;

/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.1.3
 */
class Uninstall extends Model { 
    
    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.1.3
     *
     * @uses delete_option()      → removes option by name
     * @uses delete_site_option() → removes a option by name
     */
    public function removeAll() {

        $slug = App::SearchInside()->get('slug'); 

        delete_option($pluginName . '-version');
        // For site options in Multisite
        delete_site_option($pluginName . '-version');
    }
}

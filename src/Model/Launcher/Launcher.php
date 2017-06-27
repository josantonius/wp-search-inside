<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Search-Inside.git
 * @since      1.1.7
 */

namespace SearchInside\Model\Launcher;

use Eliasis\Model\Model,
    Eliasis\App\App;

/**
 * Main plugin launcher model.
 *
 * @since 1.1.7
 */
class Launcher extends Model {

    /**
     * Set plugin options.
     * 
     * @since 1.1.7
     *
     * @uses get_option()    → option value based on an option name
     * @uses add_option()    → add a new option to Wordpress options
     * @uses update_option() → update a named option/value
     */
    public function setOptions() {

        $pluginName = App::SearchInside()->get('slug');

        $actualVersion = App::SearchInside()->get('version');

        if (!$installed_version = get_option($pluginName) . '-version') {

            add_option($pluginName . '-version', $actualVersion);
        
        } else {

            if ($installed_version < $actualVersion) {

                update_option($pluginName . '-version', $actualVersion);
            }
        }
    }
}

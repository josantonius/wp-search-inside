<?php
/**
 * WP Plugin Info · Eliasis module for WordPress plugins
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/WP_Plugin-Info.git
 * @since      1.0.0
 */

namespace Eliasis\Modules\WP_Plugin_Info\Model\Admin\Info;


use Josantonius\Json\Json,
    Eliasis\Module\Module,
    Eliasis\Model\Model;
    
/**
 * Info model.
 *
 * @since 1.0.0
 */
class Info extends Model {

    /**
     * Get current plugins information.
     * 
     * @since 1.0.0
     *
     * @return array → plugins info
     */
    public function getPluginsInfo() {

        $file = Module::WP_Plugin_Info()->get('file', 'plugins');

        return Json::fileToArray($file);
    }

    /**
     * Set plugins Info.
     *
     * @param array $plugins → plugins information
     *
     * @since 1.0.0
     */
    public function setPluginsInfo($plugins) {
        
        $file = Module::WP_Plugin_Info()->get('file', 'plugins');

        Json::arrayToFile($plugins, $file);
    }
}

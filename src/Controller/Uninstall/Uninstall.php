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

namespace SearchInside\Controller\Uninstall;

use Eliasis\App\App,
    Eliasis\Controller\Controller;

/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.1.7
 */
class Uninstall extends Controller { 
    
    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.1.7
     *
     * @uses delete_option()      → removes option by name
     * @uses delete_site_option() → removes a option by name
     */
    public function removeAll() {

        $this->model->removeAll();
    }
}

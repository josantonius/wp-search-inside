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

use SearchInside\Core\SearchInside;

/**
 * Main method of the administrative part of the plugin.
 *
 * @since 1.0.0
 */
class Admin {

    /**
     * Instance of the plugin.
     *
     * @since 1.0.0
     *
     * @var object $instance 
     */
    protected $instance;

    /**
     * Class name of the pages of administration panel.
     *
     * @since 1.0.0
     *
     * @var array $pages
     */
    public $pages = ['Options'];

    /**
     * Construct.
     *
     * @since 1.0.0
     *
     * @param object $instance → instance of the plugin
     */
    public function __construct($instance) {

        $this->instance = $instance;
    }

    /**
     * Initiator settings for the admin panel.
     *
     * @since 1.0.0
     *
     * @uses add_action() → hooks a function on to a specific action
     */
    public function init() {

        add_action('admin_menu',      array($this, 'customAdminMenu'));
        add_action( 'plugins_loaded', array($this, 'getCurrentScreen'));
    }

    /**
     * Custom admin menu.
     *
     * @uses add_menu_page() → add a top-level menu page
     *
     * @since 1.0.0
     */
    public function customAdminMenu() {

         add_menu_page(
            __('SearchInside', 'searchinside'), 
            __('SearchInside', 'searchinside'), 
            'manage_options', 
            'searchinside-options', 
            array(
                $this,
                'validatePermissions'
            ),
            SearchInside::$PLUGIN_URL . 'assets/images/icons/searchinside-menu-admin.png', 
            27
        );
    }

    /**
     * Get only current page.
     *
     * @since 1.0.0
     *
     * @uses $class::init() → initialize only the methods of the page visited
     */
    public function getCurrentScreen() {

        $namespace = 'SearchInside\Admin\Pages\\';

        foreach ($this->pages as $page) {

            $class = $namespace . $page;

            $currentPage = (isset($_GET['page']) && $_GET['page'] == $class::$page) ? true : false;

            if (class_exists($class)) {
      
                $class = $class::init($currentPage);
            }
        }
    }

    /**
     * Validate permissions.
     *
     * @since 1.0.0
     *
     * @uses current_user_can() → whether current user has a specific capability
     * @uses wp_die()           → kill WordPress execution and show error message
     */
    public function validatePermissions() {

        if (!current_user_can('manage_options')) {

            $message = __('You don\'t have permissions to access this page.');

            wp_die($message);
        }
    }
}

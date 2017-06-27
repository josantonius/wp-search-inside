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

namespace SearchInside\Controller\Launcher;

use Josantonius\WP_Register\WP_Register,
    Eliasis\App\App,
    Eliasis\Controller\Controller;

/**
 * Main plugin launcher.
 *
 * @since 1.1.7
 */
class Launcher extends Controller {

    /**
     * Class initializer method.
     * 
     * @since 1.1.7
     *
     * @return boolean
     */
    public function init() {

        add_shortcode('add-search-inside', [$this, 'addShortcode']);
        
        add_action('init', [$this, 'setLanguage']);

        if (is_admin()) {

            return $this->admin();
        }

        $this->front();
    }

    /**
     * Hook plugin activation | Executed only when activating the plugin.
     * 
     * @since 1.1.7
     *
     * @uses check_admin_referer() → user was referred from admin page
     * @uses flush_rewrite_rules() → remove rewrite rules and recreate
     */
    public function activation() {

        check_admin_referer("activate-plugin_{$_REQUEST['plugin']}");

        $this->model->setOptions();

        flush_rewrite_rules();
    }

    /**
     * Hook plugin deactivation. Executed when deactivating the plugin.
     * 
     * @since 1.1.7
     *
     * @uses check_admin_referer() → tests if the current request is valid 
     * @uses flush_rewrite_rules() → remove rewrite rules and recreate
     */
    public function deactivation() {

        check_admin_referer("deactivate-plugin_{$_REQUEST['plugin']}");

        flush_rewrite_rules();
    }

    /**
     * Admin initializer method.
     * 
     * @since 1.1.7
     *
     * @uses add_action() → hooks a function on to a specific action
     */
    public function admin() {

        $this->setMenus(

            App::SearchInside()->get('pages'),
            App::SearchInside()->get('namespaces', 'admin-page')
        );
    }

    /**
     * Set plugin texdomain for translations.
     * 
     * @since 1.1.7 
     */
    public function setLanguage() {

        $slug = App::SearchInside()->get('slug');
        
        load_plugin_textdomain(
            $slug, 
            false, 
            $slug . App::DS . 'languages' . App::DS
        );
    }

    /**
     * Add shortcode.
     * 
     * @since 1.1.7
     *
     * @return string → html div tag
     */
    public function addShortcode() {

        return '<div id="search-inside-sc"></div>';
    }

    /**
     * Get current page and load submenu.
     *
     * @since 1.1.7
     *
     * @param array  $pages 
     * @param string $namespace
     *
     * @return
     */
    public function setMenus($pages = [], $namespace = '') {

        foreach ($pages as $page) {

            $page = $namespace . $page . '\\' . $page;

            if (!class_exists($page)) { continue; }

            $instance = call_user_func($page . '::getInstance');

            if (method_exists($instance, 'init')) {
                
                call_user_func([$instance, 'init']);
            }

            if (method_exists($instance, 'setMenu')) {
                
                call_user_func([$instance, 'setMenu']);
            }

            if (method_exists($instance, 'setSubmenu')) {
                
                call_user_func([$instance, 'setSubmenu']);
            }
        }
    }

    /**
     * Front initializer method.
     * 
     * @since 1.1.7
     */
    public function front() {

        $this->addStyles();

        $this->addScripts();
    }

    /**
     * Add scripts.
     * 
     * @since 1.1.7
     */
    protected function addScripts() {
        
        $scripts = [
            'searchinside', 
            'hilitor',
        ];

        foreach ($scripts as $script) {

            WP_Register::add(
                'script', 
                App::SearchInside()->get('assets', 'js', $script)
            );
        }
    }

    /**
     * Add scripts.
     * 
     * @since 1.1.7
     */
    protected function addStyles() {

        WP_Register::add(
            'style',  
            App::SearchInside()->get('assets', 'css', 'searchinside')
        );
    }
}

<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/WP-SearchInside.git
 * @since      1.0.0
 */

namespace SearchInside\Core;

/**
 * Plugin core, configurations and registration of principal methods.
 *
 * @since 1.0.0
 */
class SearchInside {

    /**
     * Plugin dir path.
     *
     * @since 1.0.0
     *
     * @var string $PLUGIN_PATH
     */
    public static $PLUGIN_PATH;
                                                                                
    /**
     * Plugin url.
     *
     * @since 1.0.0
     *
     * @var string $PLUGIN_URL
     */
    public static $PLUGIN_URL;

    /**
     * Array with configurations of the plugin.
     *
     * @since 1.0.0
     *
     * @var array $config 
     */
    public static $config = [];

    /**
     * Establish routes and load configurations and debug.
     *
     * @since 1.0.0
     */
    public function __construct() {

        $pluginName = dirname(plugin_basename( __FILE__));

        self::$PLUGIN_PATH = WP_PLUGIN_DIR . '/' . dirname($pluginName) . '/';

        self::$PLUGIN_URL  = plugins_url( '/', $pluginName);

        add_shortcode('add-search-inside', 'addShortcode');

        self::loadConfigurations();

        if (!is_admin()) {

            add_action('wp_enqueue_scripts', array($this, 'addScripts'));
            add_action('wp_enqueue_scripts', array($this, 'addStyles'));
        }
    }

    /**
     * Add shortcode.
     * 
     * @since 1.1.2
     *
     * @return string → html div tag
     */
    private static function addShortcode() {

        return '<div id="search-inside-sc"></div>';
    }

    /**
     * Load default settings.
     * 
     * @since 1.0.0
     */
    private static function loadConfigurations() {

        $settings = self::$PLUGIN_PATH . 'inc/settings.inc.php';

        if (file_exists($settings)) {

            $params = require_once($settings);

            self::$config = array_merge(self::$config, $params);
        }
    }

    /**
     * Load scripts.
     *
     * @since 1.0.0
     *
     * @uses wp_register_script() → registers a script
     * @uses wp_enqueue_script()  → enqueue a script
     * @uses wp_localize_script() → localizes a registered script
     * @uses admin_url()          → URL to the admin area for the current site
     * @uses wp_create_nonce()    → creates a cryptographic token
     */
    public function addScripts() {

        wp_register_script(
            'searchinside',
            SearchInside::$PLUGIN_URL . 'assets/js/searchinside.js',
            array( 'jquery' ) 
        );
        wp_enqueue_script( 'searchinside' );

        wp_localize_script( 
            'searchinside', 
            'searchInside', 
            array( 
                'urlPlugin' => SearchInside::$PLUGIN_URL,
                'nonce' => wp_create_nonce('searchinside-post-comment-nonce')  
            ) 
        );

        wp_register_script(
            'hilitor',
            SearchInside::$PLUGIN_URL . 'assets/js/hilitor.js',
            array( 'jquery' ) 
        );
        wp_enqueue_script( 'hilitor' );

        wp_localize_script( 
            'hilitor', 
            'hilitor', 
            array( 
                'urlPlugin' => SearchInside::$PLUGIN_URL,
                'nonce' => wp_create_nonce('hilitor-post-comment-nonce')  
            )
        );
    }

    /**
     * Load styles.
     *
     * @since 1.0.0
     *
     * @uses wp_enqueue_script() → enqueue a script
     * @uses wp_register_style() → register a CSS stylesheet
     */
    public function addStyles() {

        $styles = ['searchinside.css'];

        foreach ($styles as $style) {

            wp_register_style( 
              'searchinside.' . $style, 
              SearchInside::$PLUGIN_URL . 'assets/css/' . $style, 
              '', 
              '', 
              false
            );

            wp_enqueue_style('searchinside.' . $style);
        }
    }

    /**
     * Static function for add the plugin parameters.
     * 
     * @since 1.0.0
     *
     * @param  string $param → name of setting param
     * @param  string $value → value of setting param
     *
     * @return string|array  → parameter value required configuration 
     */
    public static function add_option($param, $value) {

        if (is_null(self::$config)) {

            self::loadConfigurations();
        }

        self::$config[$param] = $value;

        return $value;
    }

    /**
     * Static function for obtaining the plugin parameters.
     * 
     * @since 1.0.0
     *
     * @param  string $param      → name of setting param
     *
     * @return string|array|false → parameter value or false if not exists
     */
    public static function get_option($param) {

        if (is_null(self::$config)) {

            self::loadConfigurations();
        }

        if (!empty(self::$config[$param])) {

            return self::$config[$param];
        }

        return false;
    }

    /**
     * Hook plugin activation. | Executed only when activating the plugin.
     * 
     * @since 1.0.0
     *
     * @uses check_admin_referer() → user was referred from another admin page
     * @uses get_option()          → option value based on an option name
     * @uses add_option()          → add a new option to Wordpress options
     * @uses update_option()       → update a named option/value
     * @uses flush_rewrite_rules() → remove rewrite rules and then recreate news
     */
    public function activation() {

        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';

        check_admin_referer("activate-plugin_{$plugin}");

        $actualVersion = self::get_option('version');

        if (!$installed_version = get_option('searchinside_version')) {

            add_option('searchinside_version', $actualVersion);
        
        } else {

            if ($installed_version < $actualVersion) {

                update_option('searchinside_version', $actualVersion);
            }
        }

        flush_rewrite_rules();
    }

    /**
     * Hook plugin deactivation. Executed when deactivating the plugin.
     * 
     * @since 1.0.0
     *
     * @uses check_admin_referer()  → tests if the current request is valid 
     * @uses flush_rewrite_rules()  → remove rewrite rules and then recreate news
     */
    public function deactivation() {

        $plugin = isset($_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';

        check_admin_referer("deactivate-plugin_{$plugin}");

        flush_rewrite_rules();
    }
}

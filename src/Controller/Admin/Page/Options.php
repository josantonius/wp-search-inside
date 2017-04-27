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

namespace SearchInside\Controller\Admin\Page;

use Josantonius\WP_Register\WP_Register,
    Josantonius\WP_Menu\WP_Menu,
    Josantonius\Hook\Hook,
    Eliasis\App\App,
    Eliasis\Controller\Controller;

/**
 * Handler options page.
 *
 * @since 1.1.3
 */
class Options extends Controller {

    /**
     * Slug for this administration page.
     *
     * @since 1.1.3
     *
     * @var string $page
     */
    public $slug = 'searchinside-options';

    /**
     * Class initializer method.
     *
     * @since 1.1.3
     */
    public function init() {
        
        $this->addScripts();
        $this->addStyles();
        $this->checkRequest();
        $this->addHooks();
    }

    /**
     * Add submenu for this page.
     *
     * @since 1.1.3
     *
     * @uses add_submenu_page() → add a submenu page
     */
    public function addSubmenuPage() {

        WP_Menu::add(
            'submenu', 
            App::SearchInside('submenu', 'options'), 
            [$this, 'render']
        );
    }

    /**
     * Load scripts.
     *
     * @since 1.1.3
     */
    public function addScripts() {

        $scripts = [
            'material', 
            'mdlselect', 
            'searchinsideadmin'
        ];

        foreach ($scripts as $script) {

            WP_Register::add(
                'script', 
                App::SearchInside('assets', 'js', $script)
            );
        }
    }

    /**
     * Load styles.
     *
     * @since 1.1.3
     */
    public function addStyles() {

        $styles = [
            'searchinsideadmin', 
            'material', 
            'materialicons'
        ];

        foreach ($styles as $style) {

            WP_Register::add(
                'style',  
                App::SearchInside('assets', 'css', $style)
            );
        }
    }

    /** 
     * Check request before loading page.
     * 
     * @since 1.1.3
     *
     * @uses get_option() → retrieves an option value
     */
    public function checkRequest() { 

        App::id(SEARCHINSIDE);

        App::addOption('data', $this->model->getSettings());

        App::addOption('data', ['caseSensitive' => false]);

        if (isset($_POST['submit'])) {

            $fields = [

                'idContainer',
                'searchIn',
                'executeWith',
                'searchMode',
                'wordColors',
                'caseSensitive',
            ];

            foreach ($fields as $field) {

                if (!isset($_POST[$field])) {

                    continue;
                }

                App::addOption(
                    'data', 
                    [$field => sanitize_text_field($_POST[$field])]
                );

                if ($field === 'wordColors') {

                    $colors = explode(',', App::data($field));

                    App::addOption('data', [$field => $colors]);

                    App::addOption('data', ['wordColor' => $colors[0]]);
                }
            }

            $this->model->setSettings(App::data());
        }

        $caseSensitive = App::SearchInside('data', 'caseSensitive');

        $sensitive = ($caseSensitive) ? 'checked' : '';

        App::addOption('data', ['case-sensitive' => $sensitive]);
    }

    /**
     * Add hooks.
     *
     * @since 1.1.3
     */
    public function addHooks() {

        Hook::addHook([

            'select-options-one' => __CLASS__ . '@selectOptionsOne',
            'select-options-two' => __CLASS__ . '@selectOptionsTwo',
        ]);
    }

    /** 
     * Options for the first select box.
     * 
     * @since 1.1.3
     *
     * @return string → options html code
     */
    public function selectOptionsOne() {

        $executeWith = [
            'off'          => __('Off - Don\'t show', 
                                 'search-inside'),
            'alphanumeric' => __('Show by pressing alphanumeric key', 
                                 'search-inside'),
            'alphabetic'   => __('Show by pressing alphabetic key', 
                                 'search-inside'),
            'numeric'      => __('Show by pressing numeric key', 
                                 'search-inside'),
            'append'       => __('Append to a html tag', 
                                 'search-inside'),
            'shortcode'    => __('Add from shortcode', 
                                 'search-inside'),
        ];

        $options = '';

        foreach ($executeWith as $key => $value) {

            $execWith = App::SearchInside('data', 'executeWith');

            $selected = ($execWith == $key) ? 'selected' : '';

            $options .= '<option value="' . $key . '" ' . $selected . '>' . 
                            $value . 
                        '</option>';
        }

        print($options);
    }

    /** 
     * Options for the second select box.
     * 
     * @since 1.1.3
     *
     * @return string → options html code
     */
    public function selectOptionsTwo() {

        $searchMode = [
            'quotes' => __('Phrases and paragraphs', 'search-inside'),
            'words'  => __('Words', 'search-inside')
        ];

        $options = '';

        foreach ($searchMode as $key => $value) {

            $mode = App::SearchInside('data', 'searchMode');

            $selected = ($mode == $key) ? 'selected' : '';

            $options .= '<option value="' . $key . '" ' . $selected . '>' . 
                            $value . 
                        '</option>';
        }

        print($options);
    }

    /**
     * Renderizate admin page.
     *
     * @since 1.1.3
     */
    public function render() {
        
        $this->view->renderizate(
            App::SearchInside('path', 'layout') . 'default'
        );
    }
}
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

namespace SearchInside\Controller\Admin\Page\Options;

use Josantonius\WP_Register\WP_Register,
    Josantonius\WP_Menu\WP_Menu,
    Josantonius\Hook\Hook,
    Eliasis\App\App,
    Eliasis\Controller\Controller;

/**
 * Handler options page.
 *
 * @since 1.1.7
 */
class Options extends Controller {

    /**
     * Slug for this administration page.
     *
     * @since 1.1.7
     *
     * @var string $page
     */
    public $slug = 'searchinside-options';

    /**
     * Data for the view.
     *
     * @since 1.1.7
     *
     * @var array $data
     */
    public $data = 'searchinside-options';

    /**
     * Class initializer method.
     *
     * @since 1.1.7
     */
    public function init() {
        
        $this->addScripts();
        $this->addStyles();
        $this->checkRequest();
    }

    /**
     * Add menu and instance to associated method to display the page.
     * 
     * @since 1.1.7
     */
    public function setMenu() {
        
        WP_Menu::add(
            'menu', 
            App::SearchInside()->get('menu', 'top-level'), 
            [$this, 'render']
        );
    }

    /**
     * Add submenu for this page.
     *
     * @since 1.1.7
     *
     * @uses add_submenu_page() → add a submenu page
     */
    public function setSubmenu() {

        WP_Menu::add(
            'submenu', 
            App::SearchInside()->get('submenu', 'options'), 
            [$this, 'render']
        );
    }

    /**
     * Load scripts.
     *
     * @since 1.1.7
     */
    public function addScripts() {

        $scripts = [
            'material', 
            'mdlselect', 
            'searchinsideAdmin'
        ];

        foreach ($scripts as $script) {

            WP_Register::add(
                'script', 
                App::SearchInside()->get('assets', 'js', $script)
            );
        }
    }

    /**
     * Load styles.
     *
     * @since 1.1.7
     */
    public function addStyles() {

        WP_Register::add(
            'style',  
            App::SearchInside()->get('assets', 'css', 'searchinsideAdmin')
        );
    }

    /** 
     * Check request before loading page.
     * 
     * @since 1.1.7
     *
     * @uses get_option() → retrieves an option value
     */
    public function checkRequest() { 

        $this->data = $this->model->getSettings();

        $this->data['caseSensitive'] = false;

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

                $this->data[$field] = sanitize_text_field($_POST[$field]);

                if ($field === 'wordColors') {

                    $colors = explode(',', $this->data[$field]);

                    $this->data[$field] = $colors;

                    $this->data['wordColor'] = $colors[0];
                }
            }
            
            if ($this->data['executeWith'] === 'shortcode') {

                $this->data['idContainer'] = 'search-inside-sc';
            }

            $this->model->setSettings($this->data);
        }

        $sensitive = ($this->data['caseSensitive']) ? 'checked' : '';

        $this->data['case-sensitive'] = $sensitive;
    }

    /** 
     * Options for the first select box.
     * 
     * @since 1.1.7
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

            $execWith = $this->data['executeWith'];

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
     * @since 1.1.7
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

            $mode = $this->data['searchMode'];

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
     * @since 1.1.7
     */
    public function render() {

        Hook::getInstance(App::$id);

        $page = App::SearchInside()->get('path', 'page');

        $layout = App::SearchInside()->get('path', 'layout');

        $this->view->renderizate($layout, 'header');

        $this->view->renderizate($page, 'options', $this->data);

        $this->view->renderizate($layout, 'footer');     
    }
}
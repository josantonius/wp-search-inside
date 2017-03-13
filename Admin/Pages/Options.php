<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hola@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/WP-SearchInside.git
 * @since      1.0.0
 */

namespace SearchInside\Admin\Pages;

use SearchInside\Core\SearchInside,
    Josantonius\Json\Json;

/**
 * Handler options page.
 *
 * @since 1.0.0
 */
class Options {

    /**
     * Options for the page.
     *
     * @since 1.0.0
     *
     * @var array $options
     */
    protected $options = NULL;

    /**
     * Slug for this administration page.
     *
     * @since 1.0.0
     *
     * @var string $_page
     */
    public static $page = 'searchinside-options';

    /**
     * Load content only if it is the current page. 
     * If not is the current page, load only menu admin.
     * 
     * @since 1.0.0
     *
     * @var bool $actualPage → If the current page will be of true value
     */
    protected static $currentPage = NULL;

    /**
     * Plugin instance.
     *
     * @since 1.0.0
     *
     * @var object $instance 
     */
    protected static $instance = NULL;

    /**
     * Get static instance or get instantiate object if doesn't exist.
     *
     * @since 1.0.0
     *
     * @return object self::$instance
     */
    public static function getInstance() {

        NULL === self::$instance and self::$instance = new self;

        return self::$instance;

    }

    /**
     * Get static instance or get instantiate object if doesn't exist.
     *
     * @since 1.0.0
     */
    public static function getOptions() { }

    /**
     * Load class handler page if it's current page, if not load only menu.
     *
     * @since 1.0.0
     *
     * @uses add_action(admin_init) → before any other hook
     * @uses add_action(admin_menu) → add extra submenus and menu options
     * 
     * @var bool true|false $currentPage → if true it is the current page
     * 
     * @return object self::$instance
     */
    public static function init($currentPage) {

        self::getInstance();

        self::$currentPage = $currentPage;

        if (self::$currentPage) {
            
            add_action('admin_init', array(self::$instance, 'addScripts'));
            add_action('admin_init', array(self::$instance, 'addStyles'));
        }

        add_action('admin_menu', array(self::$instance, 'addSubmenuPage'));

        return self::$instance;
    }

    /**
     * Add submenu for this page.
     *
     * @since 1.0.0
     *
     * @uses add_submenu_page() → add a submenu page
     */
    public function addSubmenuPage() {

        $adminPage = (self::$currentPage) ? 'createAdminPage' : 'getInstance';

        add_submenu_page(
            'searchinside-options', 
            __('Options', 'searchinside'), 
            __('Options', 'searchinside'), 
            'manage_options', 
            'searchinside-options', 
            array(
                $this,
                $adminPage
            )
        );
    }

    /**
     * Load scripts.
     *
     * @since 1.0.0
     * 
     * @uses wp_enqueue_script()  → enqueue a script
     * @uses wp_register_script() → registers a script to be enqueued
     * @uses wp_localize_script() → localizes a registered script
     */
    public function addScripts() {

        wp_register_script(
            'searchinside-js-material',
            SearchInside::$PLUGIN_URL . 'assets/js/material.min.js',
            array( 'jquery' ) 
        );
        wp_enqueue_script( 'searchinside-js-material' );

        wp_localize_script( 
            'searchinside-js-material', 
            'Material', 
            array( 
                'url' => SearchInside::$PLUGIN_URL . 'assets/js/material.min.js',
                'nonce' => wp_create_nonce('material-post-comment-nonce')  
            ) 
        );

        wp_register_script(
            'searchinside-mdl-select',
            SearchInside::$PLUGIN_URL . 'assets/js/mdl-select.js',
            array( 'jquery' ) 
        );
        wp_enqueue_script( 'searchinside-mdl-select' );

        wp_localize_script( 
            'searchinside-mdl-select', 
            'Material', 
            array( 
                'url' => SearchInside::$PLUGIN_URL .'assets/js/mdl-select.js',
                'nonce' => wp_create_nonce('material-post-comment-nonce')  
            ) 
        );

        wp_register_script(
            'searchinside-searchinside-admin',
            SearchInside::$PLUGIN_URL . 'assets/js/searchinside-admin.js',
            array( 'jquery' ) 
        );
        wp_enqueue_script( 'searchinside-searchinside-admin' );

        wp_localize_script( 
            'searchinside-searchinside-admin', 
            'Material', 
            array( 
                'url' => SearchInside::$PLUGIN_URL . 'assets/js/searchinside-admin.js',
                'nonce' => wp_create_nonce('material-post-comment-nonce')  
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

        $styles = [
            'searchinside-admin.css', 
            'material.css', 
            'material-icons.css'
        ];

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
     * Create admin page.
     *
     * @since 1.0.0
     */
    public function createAdminPage() {

        if ($this->options == NULL) {

            $this->getOptions();
        }

        $this->beforeLoadingPage();
        $this->headerSection();
        $this->optionsSection();
        $this->footerSection();
    }


    /** 
     * Actions to before to load the page.
     * 
     * @since 1.0.0
     */
    public function beforeLoadingPage() { 

        $this->checkRequest();
    }

    /** 
     * Check request before loading page.
     * 
     * @since 1.0.0
     *
     * @uses Json::arrayToFile() → save array in json file.
     * @uses Json::fileToArray() → open json file and convert it into an array
     * @uses get_option()        → retrieves an option value
     */
    public function checkRequest() { 

        $path   = SearchInside::$PLUGIN_PATH;

        $folder = SearchInside::get_option('settings-json-path');

        $file   = SearchInside::get_option('settings-json-file');

        $this->options = Json::fileToArray($path . $folder . $file);

        $this->options['caseSensitive'] = false;

        $fields = [

            'idContainer',
            'searchIn',
            'executeWith',
            'searchMode',
            'wordColors',
            'caseSensitive',
        ];

        if (isset($_POST['submit'])) {

            foreach ($fields as $field) {

                if (!isset($_POST[$field])) {

                    continue;
                }

                $this->options[$field] = sanitize_text_field($_POST[$field]);

                if ($field === 'wordColors') {

                    $colors = explode(',', $this->options[$field]);

                    $this->options[$field] = $colors;

                    $this->options['wordColor'] = $colors[0];
                }
            }

            Json::arrayToFile($this->options, $path . $folder . $file);
        }
    }

    /** 
     * Print the header section.
     * 
     * @since 1.0.0
     */
    public function headerSection() { 

        require SearchInside::$PLUGIN_PATH . 'Admin/includes/header.php';
        ?>
            <h2 class="jst-header-title mdl-card__title-text">
                <?php echo __('Search Inside · Options', 'searchinside'); ?>
            </h2>
        </div>
        <?php
    }

    /** 
     * Print the options section.
     * 
     * @since 1.0.0
     */
    public function optionsSection() {

        ?>   
        <form enctype="multipart/form-data" id="search-inside-form" method="post" action="">
            
            <div class="mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet mdl-cell--8-col-desktop mdl-grid mdl-grid--no-spacing-off">
                
                <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop jst-card">
                    
                    <div class="mdl-card__title mdl-card--expand mdl-color--blue-200">
                        <h2 class="mdl-card__title-text">
                            <?php echo __('Plugin options', 'searchinside'); ?>
                        </h2>
                    </div>
  
                    <div class="mdl-card__supporting-text mdl-color-text--grey-600"><br />
                        <?php 
                        echo __('Choose the search engine settings', 'searchinside');
                        $this->optionsSearchSection();
                        ?>
                    </div>
                    <div class="wpsi-color-picker mdl-card__supporting-text mdl-color-text--grey-600"><br />
                        <?php 
                        echo __('Customize words colors', 'searchinside');
                        $this->optionsColorPickerSection();
                        ?>
                    </div>
                    <div class="jst-card-button mdl-card__actions mdl-card--border">

                        <div id="jst-buttons-form">

                        <button id="load-images-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent" type="submit" name="submit">
                            <?php echo __('Save', 'searchinside'); ?>
                        </button>
                           
                    </div>

                </div>

            </div>

        </form>
        <?php
    }

    /** 
     * Print options search section.
     * 
     * @since 1.0.0
     */
    public function optionsSearchSection() {

        ?>
        <div id="search-section" class="mdl-list__item">

            <div class="search-fields">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="searchIn" id="searchIn" type="text" id="searchIn" value="<?= $this->options['searchIn'] ?>">
                    <label class="mdl-textfield__label" for="searchIn"><?= __('HTML TAG ID WHERE TO SEARCH', 'searchinside') ?></label>
                </div>
                <div class="mdl-select mdl-js-select mdl-select--floating-label">
                    <select class="mdl-select__input" id="executeWith" name="executeWith">
                        <?= $this->optionsSearchSelectOneSection(); ?>
                    </select>
                    <label class="mdl-select__label" for="executeWith">&nbsp;<?php echo __('SEARCH a', 'searchinside') ?></label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="wpsi-html-tag">
                    <input class="mdl-textfield__input" name="idContainer" id="idContainer" type="text" value="<?= $this->options['idContainer'] ?>">
                    <label class="mdl-textfield__label" for="idContainer"><?= __('HTML TAG ID WHERE TO INSERT FORM', 'searchinside') ?></label>
                </div>
                <div id="wpsi-shortcode">
                   <p class="shortcode-example">[add-search-inside]</p>
                </div>
                <div class="mdl-select mdl-js-select mdl-select--floating-label">
                    <select class="mdl-select__input" id="searchMode" name="searchMode">
                        <?= $this->optionsSearchSelectTwoSection(); ?>
                    </select>
                    <label class="mdl-select__label" for="searchMode">&nbsp;<?php echo __('SEARCH FOR', 'searchinside') ?></label>
                </div>
                <div class="jst-checkbox">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                        <input type="checkbox" id="checkbox-1" name="caseSensitive" class="mdl-checkbox__input" <?= ($this->options['caseSensitive']) ? 'checked' : ''; ?>>
                        <span class="mdl-checkbox__label">
                            <?php echo __('Case sensitive', 'searchinside') ?>
                        </span>
                    </label>
                </div>
            </div>
        </div>
        <?php
    }

    /** 
     * Options for the first select box.
     * 
     * @since 1.0.0
     *
     * @return string → options html code
     */
    public function optionsSearchSelectOneSection() {

        $executeWith = [
            'off'          => __('Off - Don\'t show', 'searchinside'),
            'alphanumeric' => __('Show by pressing alphanumeric key', 
                                 'searchinside'),
            'alphabetic'   => __('Show by pressing alphabetic key',
                                 'searchinside'),
            'numeric'      => __('Show by pressing numeric key',
                                 'searchinside'),
            'append'       => __('Append to a html tag', 'searchinside'),
            'shortcode'    => __('Add from shortcode', 'searchinside'),
        ];

        $selectOne = '';

        foreach ($executeWith as $key => $value) {

            $selected = ($this->options['executeWith'] == $key) ? 'selected' : '';

            $selectOne .= '<option value="' . $key . '" ' . $selected . '>' . 
                            $value . 
                        '</option>';
        }

        return $selectOne;
    }

    /** 
     * Options for the second select box.
     * 
     * @since 1.0.0
     *
     * @return string → options html code
     */
    public function optionsSearchSelectTwoSection() {

        $searchMode = [
            'quotes' => __('Phrases and paragraphs', 'searchinside'),
            'words'  => __('Words', 'searchinside')
        ];

        $selectOne = '';

        foreach ($searchMode as $key => $value) {

            $selected = ($this->options['searchMode'] == $key) ? 'selected' : '';

            $selectOne .= '<option value="' . $key . '" ' . $selected . '>' . 
                            $value . 
                        '</option>';
        }

        return $selectOne;
    }

    /** 
     * Print the color picker section.
     * 
     * @since 1.0.0
     */
    public function optionsColorPickerSection() {

        ?>
        <div id="color-picker-section" class="mdl-list__item">

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <div class="mdl-checkbox-colors">
                    <div id="wpsi-colorPicker" class="m-card">
                        <div id="colorsWrapper">
                        <?php foreach ($this->options['wordColors'] as $value) : ?>
                            <div class="colorOption" data-color="<?= $value ?>"></div>
                        <?php endforeach; ?>
                        </div>
                        <div id="wordColorsSection" class="mdl-textfield mdl-js-textfield">
                            <input id="wordColors" name="wordColors" class="mdl-textfield__input" type="text">
                            <label id="wordColorsLabel" class="mdl-textfield__label" for="wordColors"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /** 
     * Print the footer section.
     * 
     * @since 1.0.0
     */
    public function footerSection() { 

        require SearchInside::$PLUGIN_PATH . 'Admin/includes/footer.php';
    }
}
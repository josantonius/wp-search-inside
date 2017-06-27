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

use Eliasis\App\App,
    Eliasis\Module\Module;

$url = App::MODULES_URL() . Module::WP_Plugin_Info()->get('folder');

return [

    'url' => [

        'wp-api' => 'https://api.wordpress.org/plugins/info/1.0/',
    ],
];

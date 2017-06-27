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

use Eliasis\App\App;

$url = App::PUBLIC_URL();

return [

    'url' => [

        'js'         => $url . 'js/',
        'css'        => $url . 'css/',
        'json'       => $url . 'json/',
        'icons'      => $url . 'images/icons/',
        'wp-plugins' => 'https://wordpress.org/support/plugin/',
    ],
];

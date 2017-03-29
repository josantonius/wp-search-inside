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

        'js'    => $url . 'js'     . App::DS,
        'css'   => $url . 'css'    . App::DS,
        'json'  => $url . 'json'   . App::DS,
        'icons' => $url . 'images' . App::DS . 'icons' . App::DS,
    ],
];

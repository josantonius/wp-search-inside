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

$icons = App::SearchInside()->get('url', 'icons');
$json  = App::SearchInside()->get('url', 'json');
$css   = App::SearchInside()->get('url', 'css');
$js    = App::SearchInside()->get('url', 'js');

return [

    'assets' => [

        'js' => [
            'searchinside' => [
                'name'      => 'searchinside',
                'url'       => $js . 'searchinside.js',
                'place'     => 'front',
                'deps'      => ['jquery'],
                'version'   => '1.1.6',
                'footer'    => true,
                'params'    => [
                    'settings' => $json . App::SearchInside()->get('file', 'settings'),
                ],
            ],
            'hilitor' => [
                'name'      => 'hilitor',
                'url'       => $js . 'hilitor.js',
                'place'     => 'front',
                'deps'      => ['jquery'],
                'version'   => '1.1.6',
                'footer'    => true,
                'params'    => [],
            ],
            'material' => [
                'name'      => 'material',
                'url'       => $js . 'material.min.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.1.6',
                'footer'    => true,
                'params'    => [],
            ],
            'mdlselect' => [
                'name'      => 'mdlselect',
                'url'       => $js . 'mdl-select.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.1.6',
                'footer'    => true,
                'params'    => [],
            ],
            'searchinsideAdmin' => [
                'name'      => 'searchinsideAdmin',
                'url'       => $js . 'searchinside-admin.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.1.6',
                'footer'    => true,
                'params'    => [
                    'icons_url' => $icons,
                ],
            ],
        ],

        'css' => [
            'searchinside' => [
                'name'      => 'searchinside',
                'url'       => $css . 'searchinside.css',
                'place'     => 'front',
                'deps'      => [],
                'version'   => '1.1.6',
                'media'     => '',
            ],
            'searchinsideAdmin' => [
                'name'      => 'searchinsideAdmin',
                'url'       => $css . 'searchinside-admin.css',
                'place'     => 'admin',
                'deps'      => [],
                'version'   => '1.1.6',
                'media'     => '',
            ],
        ],
    ],
];

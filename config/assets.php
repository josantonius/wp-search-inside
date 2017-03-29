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

$css = App::url('css');
$js  = App::url('js');

return [

    'assets' => [

        'js' => [
            'searchinside' => [
                'name'      => 'searchinside',
                'url'       => $js . 'searchinside.js',
                'place'     => 'front',
                'deps'      => ['jquery'],
                'version'   => '1.1.3',
                'footer'    => true,
                'params'    => [
                    'settings' => App::url('json') . App::file('settings'),
                ],
            ],
            'hilitor' => [
                'name'      => 'hilitor',
                'url'       => $js . 'hilitor.js',
                'place'     => 'front',
                'deps'      => ['jquery'],
                'version'   => '1.1.3',
                'footer'    => true,
                'params'    => [],
            ],
            'material' => [
                'name'      => 'material',
                'url'       => $js . 'material.min.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.1.3',
                'footer'    => true,
                'params'    => [],
            ],
            'mdlselect' => [
                'name'      => 'mdlselect',
                'url'       => $js . 'mdl-select.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.1.3',
                'footer'    => true,
                'params'    => [],
            ],
            'searchinsideadmin' => [
                'name'      => 'searchinsideadmin',
                'url'       => $js . 'searchinside-admin.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.1.3',
                'footer'    => true,
                'params'    => [],
            ],
        ],

        'css' => [
            'searchinside' => [
                'name'      => 'searchinside',
                'url'       => $css . 'searchinside.css',
                'place'     => 'front',
                'deps'      => [],
                'version'   => '1.1.3',
                'media'     => '',
            ],
            'searchinsideadmin' => [
                'name'      => 'searchinsideadmin',
                'url'       => $css . 'searchinside-admin.css',
                'place'     => 'admin',
                'deps'      => [],
                'version'   => '1.1.3',
                'media'     => '',
            ],
            'material' => [
                'name'      => 'material',
                'url'       => $css . 'material.css',
                'place'     => 'admin',
                'deps'      => [],
                'version'   => '1.1.3',
                'media'     => '',
            ],
            'materialicons' => [
                'name'      => 'materialicons',
                'url'       => $css . 'material-icons.css',
                'place'     => 'admin',
                'deps'      => [],
                'version'   => '1.1.3',
                'media'     => '',
            ],
        ],
    ],
];

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

use Eliasis\App\App;

$DS   = App::DS;
$ROOT = App::ROOT();

return [

    'path' => [

        'modules'   => $ROOT. 'modules'.$DS,
        'public'    => $ROOT. 'public' .$DS,
        'json'      => $ROOT. 'public' .$DS.'json'     .$DS,
        'layout'    => $ROOT. 'src'    .$DS.'template' .$DS.'layout'   .$DS,
        'page'      => $ROOT. 'src'    .$DS.'template' .$DS.'page'     .$DS,
        'component' => $ROOT. 'src'    .$DS.'template' .$DS.'component'.$DS,
    ],
];

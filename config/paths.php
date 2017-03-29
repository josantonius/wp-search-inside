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

$DS   = App::DS;
$ROOT = App::ROOT();

return [

    'path' => [

        'public'    => $ROOT.'public'   .$DS,
        'json'      => $ROOT.'public'   .$DS.'json'    .$DS,
        'layout'    => $ROOT.'src'      .$DS.'template'.$DS.'layout'  .$DS,
        'pages'     => $ROOT.'src'      .$DS.'template'.$DS.'pages'   .$DS,
        'elements'  => $ROOT.'src'      .$DS.'template'.$DS.'elements'.$DS,
    ],
];

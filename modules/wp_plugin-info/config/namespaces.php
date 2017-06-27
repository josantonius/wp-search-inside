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

$namespace = 'Eliasis\\Modules\\';

$module = 'WP_Plugin_Info\\Controller\\';

return [

    'namespaces' => [

        'controller'       => $namespace . $module,
        'controller-admin' => $namespace . $module . 'Admin\\',
    ],
];

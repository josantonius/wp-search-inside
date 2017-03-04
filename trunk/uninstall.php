<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hola@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Search-Inside/SearchInside.git
 * @since      1.0.0
 */

require __DIR__ . '/vendor/autoload.php';

use SearchInside\Core\Uninstall;

if (!defined('WP_UNINSTALL_PLUGIN')) {

    exit();
}

Uninstall::removeAll();

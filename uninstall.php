<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Search-Inside.git
 * @since      1.0.0
 */

$DS = DIRECTORY_SEPARATOR;

require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

use SearchInside\Controller\Uninstall;

if (!defined('WP_UNINSTALL_PLUGIN')) {

    exit();
}

Uninstall::removeAll();

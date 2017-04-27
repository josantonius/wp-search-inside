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
        
require(App::SearchInside('path', 'elements') . 'header.php');
require(App::SearchInside('path', 'pages')    . 'options.php');
require(App::SearchInside('path', 'elements') . 'footer.php');

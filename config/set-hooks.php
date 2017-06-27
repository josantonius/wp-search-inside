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

use Eliasis\App\App,
	Eliasis\Module\Module;

$namespace = App::SearchInside()->get('namespaces', 'admin-page');

$Options = $namespace . 'Options\Options';

return [

    'hooks' => [

        ['select-options-one', [$Options, 'selectOptionsOne'], 8, 0],
        ['select-options-two', [$Options, 'selectOptionsTwo'], 8, 0],
    ]
];

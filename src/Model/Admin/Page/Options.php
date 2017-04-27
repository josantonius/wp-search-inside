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

namespace SearchInside\Model\Admin\Page;

use Eliasis\Model\Model,
	Eliasis\App\App,
	Josantonius\Json\Json;

/**
 * Model class.
 *
 * @since 1.1.3
 */
class Options extends Model {

	protected function __construct() {

        $jsonPath = App::SearchInside('path', 'json');

		$this->filepath = $jsonPath . App::SearchInside('file', 'settings');
	}

    /** 
     * Get settings.
     * 
     * @since 1.1.3
     *
     * @return array → settings
     */
    public function getSettings() { 

        return Json::fileToArray($this->filepath);
    }

    /** 
     * Set settings.
     * 
     * @since 1.1.3
     *
     * @return boolean
     */
    public function setSettings($data) { 

        return Json::arrayToFile($data, $this->filepath);
    }
}

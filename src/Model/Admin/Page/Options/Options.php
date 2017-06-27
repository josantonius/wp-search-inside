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

namespace SearchInside\Model\Admin\Page\Options;

use Eliasis\Model\Model,
	Eliasis\App\App,
	Josantonius\Json\Json;

/**
 * Model class.
 *
 * @since 1.1.7
 */
class Options extends Model {

	protected function __construct() {

        $jsonPath = App::SearchInside()->get('path', 'json');

        $file = App::SearchInside()->get('file', 'settings');

		$this->filepath = $jsonPath . $file;
	}

    /** 
     * Get settings.
     * 
     * @since 1.1.7
     *
     * @return array → settings
     */
    public function getSettings() { 

        return Json::fileToArray($this->filepath);
    }

    /** 
     * Set settings.
     * 
     * @since 1.1.7
     *
     * @return boolean
     */
    public function setSettings($data) { 

        return Json::arrayToFile($data, $this->filepath);
    }
}

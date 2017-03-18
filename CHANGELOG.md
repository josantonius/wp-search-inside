# CHANGELOG

## 1.1.2 - 2017-03-12
* New improvements were added: now you can add the search engine in any HTML tag or from through shortcode. Also, some bugs were fixed and the code was optimized.

* Added `search-inside/assets/js/searchinside-admin.js` file.

* Added `SearchInside\Core\SearchInside->addShortcode()` method.

* Deleted `search-inside/assets/js/mdl-color-picker.js` file.

* Deleted `Josantonius\WP\Language\Language` class.
* Deleted `Josantonius\WP\Language\Language->__construct()` method.

## 1.1.1 - 2017-03-04
* The repository were modified in GitHub.

## 1.1.0 - 2017-02-20
* Bug fix - Don't display search engine when typing on input or textarea.

## 1.0.0 - 2017-02-16
* Added `SearchInside\Admin\Pages\Options` class.
* Added `SearchInside\Admin\Pages\Options::getInstance()` method.
* Added `SearchInside\Admin\Pages\Options::getOptions()` method.
* Added `SearchInside\Admin\Pages\Options::init()` method.
* Added `SearchInside\Admin\Pages\Options->addSubmenuPage()` method.
* Added `SearchInside\Admin\Pages\Options->addScripts()` method.
* Added `SearchInside\Admin\Pages\Options->addStyles()` method.
* Added `SearchInside\Admin\Pages\Options->createAdminPage()` method.
* Added `SearchInside\Admin\Pages\Options->beforeLoadingPage()` method.
* Added `SearchInside\Admin\Pages\Options->checkRequest()` method.
* Added `SearchInside\Admin\Pages\Options->headerSection()` method.
* Added `SearchInside\Admin\Pages\Options->optionsSection()` method.
* Added `SearchInside\Admin\Pages\Options->optionsSearchSection()` method.
* Added `SearchInside\Admin\Pages\Options->optionsSearchSelectOneSection()` method.
* Added `SearchInside\Admin\Pages\Options->optionsSearchSelectTwoSection()` method.
* Added `SearchInside\Admin\Pages\Options->optionsColorPickerSection()` method.
* Added `SearchInside\Admin\Pages\Options->footerSection()` method.

* Added `SearchInside\Core\Uninstall` class.
* Added `SearchInside\Core\Uninstall::removeAll()` method.

* Added `SearchInside\Core\SearchInside` class.
* Added `SearchInside\Core\SearchInside->__construct()` method.
* Added `SearchInside\Core\SearchInside::loadConfigurations()` method.
* Added `SearchInside\Core\SearchInside->addScripts()` method.
* Added `SearchInside\Core\SearchInside->addStyles()` method.
* Added `SearchInside\Core\SearchInside::add_option()` method.
* Added `SearchInside\Core\SearchInside::get_option()` method.
* Added `SearchInside\Core\SearchInside->activation()` method.
* Added `SearchInside\Core\SearchInside->deactivation()` method.

* Added `SearchInside\Core\Admin` class.
* Added `SearchInside\Core\Admin->__construct()` method.
* Added `SearchInside\Core\Admin->init()` method.
* Added `SearchInside\Core\Admin->customAdminMenu()` method.
* Added `SearchInside\Core\Admin->getCurrentScreen()` method.
* Added `SearchInside\Core\Admin->validatePermissions()` method.

* Added `Josantonius\Json\Json` class.
* Added `Josantonius\Json\Json::arrayToFile()` method.
* Added `Josantonius\Json\Json::fileToArray()` method.
* Added `Josantonius\Json\Json::jsonLastError()` method.

* Added `Josantonius\Json\Exception\JsonException` class.
* Added `Josantonius\Json\Exception\Exceptions` abstract class.
* Added `Josantonius\Json\Exception\JsonException->__construct()` method.

* Added `Josantonius\WP\Language\Language` class.
* Added `Josantonius\WP\Language\Language->__construct()` method.

* Added `search-inside/assets/js/hilitor.js` file.
* Added `search-inside/assets/js/material.min.js` file.
* Added `search-inside/assets/js/mdl-color-picker.js` file.
* Added `search-inside/assets/js/mdl-select.js` file.
* Added `search-inside/assets/js/searchinside.js` file.

* Added `search-inside/assets/css/material.css` file.
* Added `search-inside/assets/css/material-icons.css` file.
* Added `search-inside/assets/css/searchinside.css` file.
* Added `search-inside/assets/css/searchinside-admin.css` file.

* Added `search-inside/assets/images/icons/searchinside-menu-admin.png` file.

* Added `search-inside/assets/inc/settings.inc.php` file.
* Added `search-inside/assets/inc/settings.jsond` file.
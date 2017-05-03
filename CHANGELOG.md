# CHANGELOG

## 1.1.6 - 2017-05-03

* Eliasis Framework has been updated to version 1.0.5.

* Fixed bug that prevented the shortcode from being displayed.

* Now the search engine will remain visible only when it is used.

* Header and Footer options in the admin panel were updated.

* Added `SearchInside\Controller\Launcher->getPluginRating()` method.
* Added `SearchInside\Controller\Launcher->_getRatingInWordPress()` method.

* Added `search-inside/public/sass/front/searchinside.sass` file.
* Added `search-inside/public/sass/front/layout/_search.sass` file.

* Added `search-inside/public/sass/admin/searchinside-admin.sass` file.
* Added `search-inside/public/sass/admin/custom/_global.sass` file.
* Added `search-inside/public/sass/admin/custom/_layout.sass` file.
* Added `search-inside/public/sass/admin/layout/_footer.sass` file.
* Added `search-inside/public/sass/admin/layout/_header.sass` file.
* Added `search-inside/public/sass/admin/layout/_options.sass` file.
* Added `search-inside/public/sass/admin/partials/_cards.sass` file.
* Added `search-inside/public/sass/admin/partials/_checkbox.sass` file.
* Added `search-inside/public/sass/admin/partials/_color-picker.sass` file.
* Added `search-inside/public/sass/admin/partials/_dialogs.sass` file.
* Added `search-inside/public/sass/admin/partials/_donation.sass` file.
* Added `search-inside/public/sass/admin/partials/_form.sass` file.
* Added `search-inside/public/sass/admin/partials/_input.sass` file.
* Added `search-inside/public/sass/admin/partials/_nav.sass` file.
* Added `search-inside/public/sass/admin/partials/_select.sass` file.
* Added `search-inside/public/sass/admin/partials/_shortcode.sass` file.
* Added `search-inside/public/sass/admin/partials/_wp.rating.sass` file.

## 1.1.5 - 2017-04-26

* Eliasis Framework has been updated to version 1.0.4.

## 1.1.4 - 2017-04-07

* Eliasis Framework was modified for to used on several WordPress plugins without any conflict between them.

## 1.1.3 - 2017-03-29

* Bug fixed in shortcode.

* Eliasis PHP Framework was added to the plugin core.

* Plugin structure was modified to use MVC and OOP.

* Deleted `SearchInside\Core\SearchInside` class.
* Deleted `SearchInside\Core\SearchInside->__construct()` method.
* Deleted `SearchInside\Core\SearchInside::loadConfigurations()` method.
* Deleted `SearchInside\Core\SearchInside->addScripts()` method.
* Deleted `SearchInside\Core\SearchInside->addStyles()` method.
* Deleted `SearchInside\Core\SearchInside->addShortcode()` method.
* Deleted `SearchInside\Core\SearchInside::add_option()` method.
* Deleted `SearchInside\Core\SearchInside::get_option()` method.
* Deleted `SearchInside\Core\SearchInside->activation()` method.
* Deleted `SearchInside\Core\SearchInside->deactivation()` method.

* Added `SearchInside\Controller\Launcher` class.
* Added `SearchInside\Controller\Launcher::init()` method.
* Added `SearchInside\Controller\Launcher->activation()` method.
* Added `SearchInside\Controller\Launcher->setVersion()` method.
* Added `SearchInside\Controller\Launcher->deactivation()` method.
* Added `SearchInside\Controller\Launcher->addShortcode()` method.
* Added `SearchInside\Controller\Launcher->setLanguage()` method.
* Added `SearchInside\Controller\Launcher->setHooks()` method.
* Added `SearchInside\Controller\Launcher->admin()` method.
* Added `SearchInside\Controller\Launcher->getCurrentScreen()` method.
* Added `SearchInside\Controller\Launcher->front()` method.
* Added `SearchInside\Controller\Launcher->addScripts()` method.
* Added `SearchInside\Controller\Launcher->addStyles()` method.

* Deleted `SearchInside\Core\Uninstall` class.
* Deleted `SearchInside\Core\Uninstall::removeAll()` method.

* Added `SearchInside\Controller\Uninstall` class.
* Added `SearchInside\Controller\Uninstall::removeAll()` method.

* Deleted `SearchInside\Admin\Pages\Options` class.
* Deleted `SearchInside\Admin\Pages\Options::getInstance()` method.
* Deleted `SearchInside\Admin\Pages\Options::getOptions()` method.
* Deleted `SearchInside\Admin\Pages\Options::init()` method.
* Deleted `SearchInside\Admin\Pages\Options->addSubmenuPage()` method.
* Deleted `SearchInside\Admin\Pages\Options->addScripts()` method.
* Deleted `SearchInside\Admin\Pages\Options->addStyles()` method.
* Deleted `SearchInside\Admin\Pages\Options->createAdminPage()` method.
* Deleted `SearchInside\Admin\Pages\Options->beforeLoadingPage()` method.
* Deleted `SearchInside\Admin\Pages\Options->checkRequest()` method.
* Deleted `SearchInside\Admin\Pages\Options->headerSection()` method.
* Deleted `SearchInside\Admin\Pages\Options->optionsSection()` method.
* Deleted `SearchInside\Admin\Pages\Options->optionsSearchSection()` method.
* Deleted `SearchInside\Admin\Pages\Options->optionsSearchSelectOneSection()` method.
* Deleted `SearchInside\Admin\Pages\Options->optionsSearchSelectTwoSection()` method.
* Deleted `SearchInside\Admin\Pages\Options->optionsColorPickerSection()` method.
* Deleted `SearchInside\Admin\Pages\Options->footerSection()` method.

* Added `SearchInside\Controller\Admin\Page\Options` class.
* Added `SearchInside\Controller\Admin\Page\Options::init()` method.
* Added `SearchInside\Controller\Admin\Page\Options->addSubmenuPage()` method.
* Added `SearchInside\Controller\Admin\Page\Options->addScripts()` method.
* Added `SearchInside\Controller\Admin\Page\Options->addStyles()` method.
* Added `SearchInside\Controller\Admin\Page\Options->checkRequest()` method.
* Added `SearchInside\Controller\Admin\Page\Options->addHooks()` method.
* Added `SearchInside\Controller\Admin\Page\Options->selectOptionsOne()` method.
* Added `SearchInside\Controller\Admin\Page\Options->selectOptionsTwo()` method.
* Added `SearchInside\Controller\Admin\Page\Options->render()` method.

* Added `SearchInside\Model\Admin\Page\Options` class.
* Added `SearchInside\Model\Admin\Page\Options->__construct()` method.
* Added `SearchInside\Model\Admin\Page\Options->getSettings()` method.
* Added `SearchInside\Model\Admin\Page\Options->setSettings()` method.

* Deleted `search-inside/assets/inc/settings.inc.php` file.

* Deleted `search-inside/assets/inc/settings.jsond` file.
* Added   `search-inside/public/settings.jsond` file.

* Added `search-inside/elements/footer.php` file.
* Added `search-inside/elements/header.php` file.

* Added `search-inside/layout/default.php` file.

* Added `search-inside/pages/options.php` file.

* Added `search-inside/config/add-files.php` file.
* Added `search-inside/config/add-urls.php` file.
* Added `search-inside/config/assets.php` file.
* Added `search-inside/config/hooks.php` file.
* Added `search-inside/config/info.php` file.
* Added `search-inside/config/menu.php` file.
* Added `search-inside/config/namespaces.php` file.
* Added `search-inside/config/pages.php` file.
* Added `search-inside/config/paths.php` file.

* Added `eliasis-framework/eliasis` library.
* Added `Josantonius/Json` library.
* Added `Josantonius/Hook` library.
* Added `Josantonius/WP_Register` library.
* Added `Josantonius/WP_Menu` library.
* Added `composer/installers` library.

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
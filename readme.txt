=== Search Inside ===
Contributors: josantonius
Donate link: https://paypal.me/Josantonius
Tags: search-engine,wp-search-engine,highlight-words,highlight-phrases,highlight-paragraphs
Tested up to: 4.8
Stable tag: 1.1.7
Requires at least: 3.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Easily search text within your pages or blog posts.

== Description ==

With Search Inside now you can search within your posts or pages.

[youtube https://youtu.be/MCl9j7119uU]

= There are different ways to display the search engine =

* The search engine appears when you press any alphabetic or numeric key.
* Appended on a HTML tag.
* Inserted from a shortcode.

= Two search modes =

* Look for complete sentences.
* Search words separated by spaces. 

Don't forget to turn on case sensitive mode if you need it!

[Descripción en español](https://github.com/Josantonius/WP-SearchInside/blob/master/README-ES.md)

== Installation ==

= From your WordPress dashboard =

1. Visit 'Plugins > Add New'
2. Search for 'Search Inside'
3. Activate Search Inside from your Plugins page.

= From WordPress.org =

1. Download Search Inside.
2. Upload the 'search-inside' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate Search Inside from your Plugins page.

= Once Activated =

1. Visit 'Search Inside > Options' to configure the plugin.

== Frequently Asked Questions ==

= Can I add the search engine from a shortcode? =

Yes. Since version 1.1.2 this is already possible.

= Can I insert the search engine anywhere in my web? =

That's right, Search engine can be inserted in any site of your web, you only have to indicate the ID of the HTML tag.

= Is it compatible with HipHop Virtual Machine (HHVM)? =

Yes, it is compatible.

= Minimum Requirements =

* WordPress 3.5 or greater
* PHP version 5.3 or greater

== Screenshots ==
 
1. Admin panel (English)
2. Admin panel (English)
3. Admin panel (English)
4. Admin panel (Español)
5. Admin panel (Español)
6. Admin panel (Español)
7. Front search words append HTML tag id
8. Front search words search engine fixed
9. Front search phrases append HTML tag id
10. Front search phrases search engine fixed

== Languages ==

Search Inside is available in english and spanish language.

== Changelog ==

= 1.1.7 =
* Added `SearchInside\Controller\Launcher\Launcher` class.
* Added `SearchInside\Controller\Launcher\Launcher::init()` method.
* Added `SearchInside\Controller\Launcher\Launcher->activation()` method.
* Added `SearchInside\Controller\Launcher\Launcher->deactivation()` method.
* Added `SearchInside\Controller\Launcher\Launcher->addShortcode()` method.
* Added `SearchInside\Controller\Launcher\Launcher->setLanguage()` method.
* Added `SearchInside\Controller\Launcher\Launcher->admin()` method.
* Added `SearchInside\Controller\Launcher\Launcher->front()` method.
* Added `SearchInside\Controller\Launcher\Launcher->addScripts()` method.
* Added `SearchInside\Controller\Launcher\Launcher->addStyles()` method.
* Added `SearchInside\Controller\Launcher\Launcher->setMenus()` method.

* Deleted `SearchInside\Controller\Launcher` class.
* Deleted `SearchInside\Controller\Launcher::init()` method.
* Deleted `SearchInside\Controller\Launcher->activation()` method.
* Deleted `SearchInside\Controller\Launcher->setVersion()` method.
* Deleted `SearchInside\Controller\Launcher->deactivation()` method.
* Deleted `SearchInside\Controller\Launcher->addShortcode()` method.
* Deleted `SearchInside\Controller\Launcher->setLanguage()` method.
* Deleted `SearchInside\Controller\Launcher->setHooks()` method.
* Deleted `SearchInside\Controller\Launcher->admin()` method.
* Deleted `SearchInside\Controller\Launcher->getCurrentScreen()` method.
* Deleted `SearchInside\Controller\Launcher->front()` method.
* Deleted `SearchInside\Controller\Launcher->addScripts()` method.
* Deleted `SearchInside\Controller\Launcher->addStyles()` method.
* Deleted `SearchInside\Controller\Launcher->getPluginRating()` method.
* Deleted `SearchInside\Controller\Launcher->_getRatingInWordPress()` method.

* Added `SearchInside\Model\Launcher\Launcher->setOptions()` method.

* Deleted `SearchInside\Controller\Uninstall` class.
* Deleted `SearchInside\Controller\Uninstall::removeAll()` method.

* Added `SearchInside\Controller\Uninstall\Uninstall` class.
* Added `SearchInside\Controller\Uninstall\Uninstall::removeAll()` method.

* Added `SearchInside\Model\Uninstall\Uninstall` class.
* Added `SearchInside\Model\Uninstall\Uninstall::removeAll()` method.

* Deleted `SearchInside\Controller\Admin\Page\Options` class.
* Deleted `SearchInside\Controller\Admin\Page\Options::init()` method.
* Deleted `SearchInside\Controller\Admin\Page\Options->addSubmenuPage()` method.
* Deleted `SearchInside\Controller\Admin\Page\Options->addScripts()` method.
* Deleted `SearchInside\Controller\Admin\Page\Options->addStyles()` method.
* Deleted `SearchInside\Controller\Admin\Page\Options->checkRequest()` method.
* Deleted `SearchInside\Controller\Admin\Page\Options->addHooks()` method.
* Deleted `SearchInside\Controller\Admin\Page\Options->selectOptionsOne()` method.
* Deleted `SearchInside\Controller\Admin\Page\Options->selectOptionsTwo()` method.
* Deleted `SearchInside\Controller\Admin\Page\Options->render()` method.

* Deleted `SearchInside\Model\Admin\Page\Options` class.
* Deleted `SearchInside\Model\Admin\Page\Options->__construct()` method.
* Deleted `SearchInside\Model\Admin\Page\Options->getSettings()` method.
* Deleted `SearchInside\Model\Admin\Page\Options->setSettings()` method.

* Added `SearchInside\Controller\Admin\Page\Options\Options` class.
* Added `SearchInside\Controller\Admin\Page\Options\Options::init()` method.
* Added `SearchInside\Controller\Admin\Page\Options\Options->addScripts()` method.
* Added `SearchInside\Controller\Admin\Page\Options\Options->addStyles()` method.
* Added `SearchInside\Controller\Admin\Page\Options\Options->checkRequest()` method.
* Added `SearchInside\Controller\Admin\Page\Options\Options->selectOptionsOne()` method.
* Added `SearchInside\Controller\Admin\Page\Options\Options->selectOptionsTwo()` method.
* Added `SearchInside\Controller\Admin\Page\Options\Options->setMenu()` method.
* Added `SearchInside\Controller\Admin\Page\Options\Options->setSubmenu()` method.
* Added `SearchInside\Controller\Admin\Page\Options\Options->render()` method.

* Added `SearchInside\Model\Admin\Page\Options\Options` class.
* Added `SearchInside\Model\Admin\Page\Options\Options->__construct()` method.
* Added `SearchInside\Model\Admin\Page\Options\Options->getSettings()` method.
* Added `SearchInside\Model\Admin\Page\Options\Options->setSettings()` method.

* Added `SearchInside\Model\Admin\Component\Rating\Rating->getPluginRating()` method.
* Added `SearchInside\Model\Admin\Component\Rating\Rating->prepareStars()` method.

* Deleted `search-inside/config/paths.php` file.
* Added   `search-inside/config/add-paths.php` file.
* Deleted `search-inside/config/hooks.php` file.
* Added   `search-inside/config/set-hooks.php` file.

* Deleted `search-inside/public/css/material.css` file.
* Deleted `search-inside/public/css/material-icons.css` file.

* Deleted `search-inside/public/sass/admin/custom/_global.sass` file.
* Deleted `search-inside/public/sass/admin/custom/_layout.sass` file.

* Deleted `search-inside/public/sass/admin/partials/_wp.rating.sass` file.
* Added   `search-inside/public/sass/admin/partials/_rating.sass` file.
* Added   `search-inside/public/sass/admin/partials/_global.sass` file.
* Added   `search-inside/public/sass/admin/partials/_layout.sass` file.

* Added   `search-inside/public/sass/admin/external/_material.sass` file.
* Added   `search-inside/public/sass/admin/external/_material-icons.sass` file.

* Deleted `search-inside/src/template/layout/default.php` file.
* Added   `search-inside/src/template/layout/header.php` file.
* Added   `search-inside/src/template/layout/footer.php` file.

* Deleted `search-inside/src/template/pages/options.php` file.

* Added `search-inside/src/template/page/options.php` file.

* Added `search-inside/src/template/component/rating.php` file.

* Added `Josantonius/WP_Plugin-Info` library.
* Added `eliasis-framework/module` library.

= 1.1.6 =
* Eliasis Framework has been updated to version 1.0.5.

* Fixed bug that prevented the shortcode from being displayed.

* Now the search engine will remain visible only when it is used.

* Header and Footer options in the admin panel were updated.

* Added `SearchInside\Controller\Launcher->getPluginRating()` method.
* Added `SearchInside\Controller\Launcher->_getRatingInWordPress()` method.

= 1.1.5 =
* Eliasis Framework has been updated to version 1.0.4.

= 1.1.4 =
* Eliasis Framework was modified for to used on several WordPress plugins without any conflict between them.

= 1.1.3 =
* Fixed bug in shortcode.

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

= 1.1.2 =
* New improvements were added: now you can add the search engine in any HTML tag or from through shortcode. Also, some bugs were fixed and the code was optimized.

* Added `search-inside/assets/js/searchinside-admin.js` file.

* Added `SearchInside\Core\SearchInside->addShortcode()` method.

* Deleted `search-inside/assets/js/mdl-color-picker.js` file.

* Deleted `Josantonius\WP\Language\Language` class.
* Deleted `Josantonius\WP\Language\Language->__construct()` method.

= 1.1.1 =
* Bug fix `The repository were modified in GitHub`.

= 1.1.0 =
* Bug fix `Don't display search engine when typing on input or textarea`.

= 1.0.0 =
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

== Upgrade Notice ==
= 1.1.6 =
* Eliasis Framework has been updated to version 1.0.5.

* Fixed bug that prevented the shortcode from being displayed.

* Now the search engine will remain visible only when it is used.

* Header and Footer options in the admin panel were updated.

= 1.1.5 =
* Eliasis Framework has been updated to version 1.0.4.

= 1.1.4 =
* Eliasis Framework was modified for to used on several WordPress plugins without any conflict between them.

= 1.1.3 =
* Fixed bug in shortcode.

* Eliasis PHP Framework was added to the plugin core.

* Plugin structure was modified to use MVC and OOP.

= 1.1.2 =
* New improvements were added: now you can add the search engine in any HTML tag or from through shortcode. Also, some bugs were fixed and the code was optimized.

= 1.1.1 =
* The repository were modified in GitHub.

= 1.1.0 =
* Don't display search engine when typing on input or textarea.

= 1.0.0 =
* First version.

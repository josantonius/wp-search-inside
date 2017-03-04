=== Search Inside ===
Contributors: josantonius
Donate link: https://github.com/Josantonius
Tags: search engine, search inside entries, search inside pages, Wordpress search engine, highlighting words, highlight phrases, highlight paragraphs

Requires at least: 3.5
Tested up to: 4.7
Stable tag: 1.1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Easily search text within your pages or blog posts.

== Description ==

With Search Inside now you can search within your posts or pages. 

The search engine appears when you press any alphabetic or numeric key.

Look for complete sentences or words separated by spaces. 

Don't forget to turn on case sensitive mode if you need it!

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

= Is it compatible with HipHop Virtual Machine (HHVM)? =

Yes, it is compatible.

= Minimum Requirements =

* WordPress 3.5 or greater
* PHP version 5.3 or greater

== Screenshots ==
 
1. Admin panel (English)
2. Admin panel (Spanish)
3. Admin panel (English)
4. Admin panel (Spanish)
5. Front search words
6. Front search phrases

== Languages ==

Search Inside is available in english and spanish language.

== Changelog ==

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

== Upgrade Notice ==

= 1.0.0 =
* First version.

= 1.1.0 =
* Don't display search engine when typing on input or textarea.
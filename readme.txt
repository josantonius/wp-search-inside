=== Search Inside ===
Contributors: josantonius
Donate link: https://paypal.me/Josantonius
Tags: search-engine,wp-search-engine,highlight-words,highlight-phrases,highlight-paragraphs
Tested up to: 4.9
Stable tag: 1.1.9
Requires at least: 4.0
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

* WordPress 4.0 or greater
* PHP version 5.6 or greater

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

== Supported languages ==

Search Inside has full support for UTF-8 encoding and can search in any language.

== Changelog ==

= 1.1.9 =

* Fixed error in options page when activating sensitive case.

* Full support for UTF-8 has been implemented and now searchable in any language.

* An error was provisionally patched when the plugin rating was displayed.

= 1.1.8 =

* Fixed bug in `WP_ Register` Library: the `IsSet()` method was renamed to `isEnqueued()` to avoid errors with the reserved word `Isset` in versions prior to php 7.0.

= 1.1.7 =
Changes in methods.

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

== Upgrade Notice ==

= 1.1.9 =

* Fixed error in options page when activating sensitive case.

* Full support for UTF-8 has been implemented and now searchable in any language.

* An error was provisionally patched when the plugin rating was displayed.

= 1.1.8 =

* Fixed bug in `WP_ Register` Library: the `IsSet()` method was renamed to `isEnqueued()` to avoid errors with the reserved word `Isset` in versions prior to php 7.0.

= 1.1.7 =
Changes in methods.

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

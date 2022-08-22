# Search Inside WordPress Plugin

[![License](https://poser.pugx.org/josantonius/wp-search-inside/license)](https://packagist.org/packages/josantonius/wp-search-inside)

[Versión en español](README-ES.md)

Easily search text within your pages or blog posts.

![image](resources/banner-1544x500.png)

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Images](#images)
- [Tests](#tests)
- [Sponsor](#Sponsor)
- [License](#license)

---

With Search Inside now you can search within your posts or pages.

**There are different ways to display the search engine**

- The search engine appears when you press any alphabetic or numeric key.

- Appended on a HTML tag.

- Inserted from a shortcode.

**Two search modes**

- Look for complete sentences.

- Search words separated by spaces.

Don't forget to turn on case sensitive mode if you need it!

**Search Inside has full support for UTF-8 encoding and can search in any language.**

<p align="center">
  <a href="resources/search-inside-wordpress-plugin-english.mp4" title="Search Inside">
    <img src="resources/thumbnail-english-video.png">
  </a>
</p>

## Requirements

This WordPress plugin is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

You can download this plugin from the [official repository](https://es.wordpress.org/plugins/search-inside/) in WordPress.

From your WordPress dashboard:

 1. Visit 'Plugins > Add New'
 2. Search for 'Search Inside'
 3. Activate Search Inside from your Plugins page.

From WordPress.org:

 1. Download [Search Inside](https://es.wordpress.org/plugins/search-inside/).
 2. Upload the 'search-inside' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...).
 3. Activate Search Inside from your Plugins page.

Once Activated:

Go to `Search Inside > Options` to configure the plugin.

## Images

![image](resources/screenshot-1.png)
![image](resources/screenshot-2.png)
![image](resources/screenshot-3.png)
![image](resources/screenshot-7.png)
![image](resources/screenshot-8.png)
![image](resources/screenshot-9.png)
![image](resources/screenshot-10.png)

## Tests

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    git clone https://github.com/josantonius/wp-search-inside.git
    
    cd wp-search-inside

    bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    composer phpunit

Run [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    composer phpmd

Run all previous tests:

    composer tests

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [GPL-2.0+ License](LICENSE).

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius#contact)

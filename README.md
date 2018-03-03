# Search Inside WordPress Plugin

[![WordPress plugin](https://img.shields.io/wordpress/plugin/v/search-inside.svg)](https://wordpress.org/plugins/search-inside/) [![WordPress](https://img.shields.io/wordpress/plugin/dt/search-inside.svg)](https://wordpress.org/plugins/search-inside/) [![WordPress](https://img.shields.io/wordpress/v/search-inside.svg)](https://wordpress.org/plugins/search-inside/) [![License](https://poser.pugx.org/josantonius/search-inside/license)](https://packagist.org/packages/josantonius/search-inside) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/d1387a03980b4e19a40e568942d92e2c)](https://www.codacy.com/app/Josantonius/search-inside?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/search-inside&amp;utm_campaign=Badge_Grade) [![Travis](https://travis-ci.org/josantonius/search-inside.svg)](https://travis-ci.org/josantonius/search-inside) [![WP](https://img.shields.io/badge/WordPress-Standar-1abc9c.svg)](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) [![CodeCov](https://codecov.io/gh/josantonius/search-inside/branch/master/graph/badge.svg)](https://codecov.io/gh/josantonius/search-inside)

[Versión en español](README-ES.md)

Easily search text within your pages or blog posts.

![image](resources/banner-1544x500.png)

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Images](#images)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [License](#license)
- [Copyright](#copyright)

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
  <a href="https://youtu.be/MCl9j7119uU" title="Search Inside">
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

    $ git clone https://github.com/josantonius/search-inside.git
    
    $ cd search-inside

    $ bash bin/install-wp-tests.sh wordpress_test root '' localhost latest

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [WordPress](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add more tests.
- [ ] Add new feature.
- [ ] Improve documentation.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [.php_cs.dist](.php_cs.dist).

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/josantonius/search-inside/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

## License

This project is licensed under **GPL-2.0+ license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).
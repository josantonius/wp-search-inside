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

use Eliasis\View\View;

$data = View::get();
?>

<div id="jst-stars">
   <a id="plugin-rating" href="<?= $data['plugin-url-review'] ?>/" title="<?= __('Rate plugin', 'eliasis-wp-plugin-rating') ?>" target="_blank">
      <div class="rating">

         <?php foreach ($data['stars'] as $star): ?>

            <span class="dashicons dashicons-star-<?= $star ?>"></span>
         
         <?php endforeach; ?>

      </div>
   </a>
</div>

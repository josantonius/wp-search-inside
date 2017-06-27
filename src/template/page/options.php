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

use Eliasis\App\App,
    Eliasis\View\View,
    Josantonius\Hook\Hook;

$data = View::get();
?>

<form enctype="multipart/form-data" id="search-inside-form" method="post" action="">
   <div class="mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet mdl-cell--8-col-desktop mdl-grid mdl-grid--no-spacing-off">
      <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop jst-card">
         <div class="mdl-card__title mdl-card--expand mdl-color--blue-200">
            <h2 class="mdl-card__title-text">

               <?= __('Plugin options', 'search-inside') ?>

            </h2>
         </div>
         <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                
            <br /><?= __('Choose the search engine settings', 'search-inside') ?>

            <div id="search-section" class="mdl-list__item">
               <div class="search-fields">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                     <?php $searchIn = $data['searchIn'] ?>

                     <input class="mdl-textfield__input" name="searchIn" id="searchIn" type="text" id="searchIn" value="<?= $searchIn ?>">
                     <label id="htmlTag" class="mdl-textfield__label" for="searchIn">

                        <?= __('HTML TAG ID WHERE TO SEARCH', 'search-inside') ?>

                     </label>
                  </div>
                  <div class="mdl-select mdl-js-select mdl-select--floating-label">
                     <select class="mdl-select__input" id="executeWith" name="executeWith">

                        <?php Hook::doAction('select-options-one') ?>

                     </select>
                     <label class="mdl-select__label" for="executeWith">
                        
                        &nbsp;<?= __('SEARCH ENGINE', 'search-inside') ?>

                     </label>
                  </div>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="wpsi-html-tag">

                     <?php $idContainer = $data['idContainer'] ?>

                     <input class="mdl-textfield__input" name="idContainer" id="idContainer" type="text" value="<?= $idContainer ?>">
                     <label class="mdl-textfield__label" for="idContainer">

                        <?= __('HTML TAG ID WHERE TO INSERT FORM', 'search-inside') ?>
                                
                     </label>
                  </div>
                  <div id="wpsi-shortcode">
                     <p class="shortcode-example">[add-search-inside]</p>
                  </div>
                  <div class="mdl-select mdl-js-select mdl-select--floating-label">
                     <select class="mdl-select__input" id="searchMode" name="searchMode">

                        <?php Hook::doAction('select-options-two') ?>

                     </select>
                     <label class="mdl-select__label" for="searchMode">

                        &nbsp;<?= __('SEARCH FOR', 'search-inside') ?>
                        
                     </label>
                  </div>
                  <div class="jst-checkbox">
                     <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">

                        <?php $checked = $data['caseSensitive'] ?>

                        <input type="checkbox" id="checkbox-1" name="caseSensitive" class="mdl-checkbox__input" <?= $checked ?>>
                        <span class="mdl-checkbox__label">

                           <?= __('Case sensitive', 'search-inside') ?>
                        
                        </span>
                     </label>
                  </div>
               </div>
            </div>
         </div>
         <div class="wpsi-color-picker mdl-card__supporting-text mdl-color-text--grey-600"><br />

            <?= __('Customize words colors', 'search-inside') ?>

            <div id="color-picker-section" class="mdl-list__item">
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <div class="mdl-checkbox-colors">
                     <div id="wpsi-colorPicker" class="m-card">
                        <div id="colorsWrapper">
                           
                        <?php foreach ($data['wordColors'] as $value) : ?>

                           <div class="colorOption" data-color="<?=$value?>"></div>

                        <?php endforeach; ?>

                        </div>
                        <div id="wordColorsSection" class="mdl-textfield mdl-js-textfield">
                            <input id="wordColors" name="wordColors" class="mdl-textfield__input" type="text">
                            <label id="wordColorsLabel" class="mdl-textfield__label" for="wordColors"></label>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         </div>
         <div class="jst-card-button mdl-card__actions mdl-card--border">
            <div id="jst-buttons-form">
               <button id="load-images-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent" type="submit" name="submit">
               
                  <?= __('Save', 'search-inside') ?>

               </button>
            </div>
         </div>
      </div>
   </div>
</form>

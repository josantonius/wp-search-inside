<?php
/**
 * Search Inside WordPress Plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/search-inside
 * @copyright 2017 - 2018 (c) Josantonius - Search Inside
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/search-inside.git
 * @since     1.1.7
 */

use Eliasis\Framework\View;
use Josantonius\Hook\Hook;

$data = View::getOption();
?>

<form enctype="multipart/form-data" id="search-inside-form" method="post" action="">
   <div class="mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet mdl-cell--8-col-desktop mdl-grid mdl-grid--no-spacing-off">
	  <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop jst-card">
		 <div class="mdl-card__title mdl-card--expand mdl-color--blue-200">
			<h2 class="mdl-card__title-text">

				<?php echo __( 'Plugin options', 'search-inside' ); ?>

			</h2>
		 </div>
		 <div class="mdl-card__supporting-text mdl-color-text--grey-600">
				
			<br /><?php echo __( 'Choose the search engine settings', 'search-inside' ); ?>

			<div id="search-section" class="mdl-list__item">
			   <div class="search-fields">
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

						<?php $search_in = $data['searchIn']; ?>

					 <input class="mdl-textfield__input" name="searchIn" id="searchIn" type="text" id="searchIn" value="<?php echo $search_in; ?>">
					 <label id="htmlTag" class="mdl-textfield__label" for="searchIn">

						<?php echo __( 'HTML TAG ID WHERE TO SEARCH', 'search-inside' ); ?>

					 </label>
				  </div>
				  <div class="mdl-select mdl-js-select mdl-select--floating-label">
					 <select class="mdl-select__input" id="executeWith" name="executeWith">

						<?php Hook::doAction( 'select-options-one' ); ?>

					 </select>
					 <label class="mdl-select__label" for="executeWith">
						
						&nbsp;<?php echo __( 'SEARCH ENGINE', 'search-inside' ); ?>

					 </label>
				  </div>
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="wpsi-html-tag">

						<?php $id_container = $data['idContainer']; ?>

					 <input class="mdl-textfield__input" name="idContainer" id="idContainer" type="text" value="<?php echo $id_container; ?>">
					 <label class="mdl-textfield__label" for="idContainer">

						<?php echo __( 'HTML TAG ID WHERE TO INSERT FORM', 'search-inside' ); ?>
								
					 </label>
				  </div>
				  <div id="wpsi-shortcode">
					 <p class="shortcode-example">[add-search-inside]</p>
				  </div>
				  <div class="mdl-select mdl-js-select mdl-select--floating-label">
					 <select class="mdl-select__input" id="searchMode" name="searchMode">

						<?php Hook::doAction( 'select-options-two' ); ?>

					 </select>
					 <label class="mdl-select__label" for="searchMode">

						&nbsp;<?php echo __( 'SEARCH FOR', 'search-inside' ); ?>
						
					 </label>
				  </div>
				  <div class="jst-checkbox">
					 <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">

						<?php $checked = $data['case-sensitive']; ?>

						<input type="checkbox" id="checkbox-1" name="caseSensitive" class="mdl-checkbox__input" <?php echo $checked; ?>>
						<span class="mdl-checkbox__label">

							<?php echo __( 'Case sensitive', 'search-inside' ); ?>

						</span>
					 </label>
				  </div>
			   </div>
			</div>
		 </div>
		 <div class="wpsi-color-picker mdl-card__supporting-text mdl-color-text--grey-600"><br />

			<?php echo __( 'Customize words colors', 'search-inside' ); ?>

			<div id="color-picker-section" class="mdl-list__item">
			   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				  <div class="mdl-checkbox-colors">
					 <div id="wpsi-colorPicker" class="m-card">
						<div id="colorsWrapper">
						   
						<?php foreach ( $data['wordColors'] as $value ) : ?>

						   <div class="colorOption" data-color="<?php echo $value; ?>"></div>

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
			   
					<?php echo __( 'Save', 'search-inside' ); ?>

			   </button>
			</div>
		 </div>
	  </div>
   </div>
</form>

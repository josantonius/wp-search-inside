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

use Eliasis\App\App;

$slug = App::SearchInside()->get('slug');

$data = App::instance('Rating', 'admin-component')->getPluginRating($slug);
?>

<div class="mdl-layout__container">

    <main class="jst-layout mdl-layout__content mdl-color--grey-10">

        <div class="mdl-grid">
            <div class="jst-header-content mdl-color--teal mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                <h2 class="jst-header-title mdl-card__title-text">
                    <?= __('Search Inside', 'search-inside') ?>
                </h2>
                <div id="jst-stars">
                   <a id="plugin-rating" href="<?= $data['plugin-url-review'] ?>/" title="<?= __('Rate plugin', 'search-inside') ?>" target="_blank">
                      <div class="rating">

                         <?php foreach ($data['stars'] as $star): ?>

                            <span class="dashicons dashicons-star-<?= $star ?>"></span>
                         
                         <?php endforeach; ?>

                      </div>
                   </a>
                </div>
            </div>
        </div>

        <div class="mdl-card__menu">

            <button id="donate-button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored mdl-js-ripple-effect">
                <i class="material-icons">widgets</i>
            </button>

            <dialog class="mdl-dialog jst-dialog-content">

                <h4 class="mdl-dialog__title jst-dialog">
                    <?= __('Search Inside', 'search-inside') ?>
                </h4>

                <div class="mdl-dialog__content">
                    <p class="jst-dialog-subtitle"><?= __('Hi! I\'m Josantonius, the developer of this plugin. I would like to tell you something...', 'search-inside') ?>
                    </p><br>
                    <p class="jst-dialog-subtitle"><?= __('Did you know that you aren\'t using the free version of the plugin? This is the pro version at no cost to you. Why do I do this? Maybe some can not afford to buy it and I want to prevent it from being downloaded from any place infected with malicious code and ruin your website, I want you to try it freely and I want you to have the opportunity to collaborate on this', 'search-inside') ?> <a href="https://github.com/Josantonius/Search-Inside.git/" target="_blank"><?= __('open source project', 'search-inside') ?></a> <?= __('if you want it.', 'search-inside') ?>
                    </p><br>
                    <p class="jst-dialog-subtitle"><?= __('Your contribution and', 'search-inside') ?> <a href="#" target="_blank"><?= __('feedback', 'search-inside') ?></a> <?= __('will help me keep updated and keep developing new versions for this plugin. Thank you!', 'search-inside') ?>
                        <i class="material-icons icon-satisfied">sentiment_very_satisfied</i>
                    </p><br><br>
                    <a href="https://www.paypal.me/Josantonius" class="api-key-button" target="_blank">
                        <button id="paypal-button" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                            <svg class="svg-paypal" viewBox="0 0 512 512">
                                <path class="svg-paypal-letter1to3" d="M104.955,202.144H62.86l-18.652,85.61h24.705l6.048-28.363h17.642c16.888,0,31.006-10.408,34.785-28.104 C131.671,211.252,117.305,202.144,104.955,202.144z M104.198,231.287c-1.512,6.506-7.813,11.71-14.115,11.71H78.488l5.294-23.418 H95.88C101.932,219.579,105.963,224.783,104.198,231.287z" />
                                <path class="svg-paypal-letter1to3" d="M161.04,219.579c-10.655,0-19.083,2.862-25.277,4.165l-1.981,16.392 c2.973-1.562,13.136-4.422,21.557-4.684c8.427-0.261,13.384,1.559,11.895,8.847c-25.026,0-41.876,5.202-45.346,21.598 c-4.958,28.104,25.521,27.322,37.414,15.092l-1.484,6.767h22.55l9.663-44.757C193.996,224,176.648,219.32,161.04,219.579z M162.772,265.375c-1.238,5.982-6.195,8.589-11.894,8.852c-4.957,0.256-9.168-4.17-5.947-9.371 c2.477-4.422,9.415-5.465,13.381-5.465c1.983,0,3.715,0,5.699,0C163.517,261.473,163.021,263.297,162.772,265.375z" />
                                <polygon class="svg-paypal-letter1to3" points="199.855,220.809 222.402,220.809 226.04,260.68 248.103,220.809 271.371,220.809 217.796,316.229 192.582,316.229 209.064,288.175 199.855,220.809" />
                                <path class="svg-paypal-letter4to6" d="M323.965,202.144h-41.985l-18.605,85.61h24.387l6.287-28.363h17.35c17.093,0,31.174-10.408,34.947-28.104 C350.614,211.252,336.033,202.144,323.965,202.144z M323.215,231.287c-1.513,6.506-8.05,11.71-14.338,11.71h-11.311l5.03-23.418 h12.066C320.952,219.579,324.722,224.783,323.215,231.287z" />
                                <path class="svg-paypal-letter4to6" d="M380.913,219.579c-10.783,0-19.312,2.862-25.833,4.165l-2.01,16.392 c3.263-1.562,13.545-4.422,22.076-4.684c8.528-0.261,13.544,1.559,11.791,8.847c-25.336,0-42.396,5.202-45.907,21.598 c-5.021,28.104,25.841,27.322,38.13,15.092l-1.507,6.767h22.576l9.787-44.757C414.025,224,396.716,219.32,380.913,219.579z M382.418,265.375c-1.254,5.982-6.017,8.589-11.786,8.852c-5.016,0.256-9.535-4.17-6.272-9.371 c2.513-4.422,9.535-5.465,13.799-5.465c1.753,0,3.769,0,5.519,0C383.171,261.473,382.915,263.297,382.418,265.375z" />
                                <polygon class="svg-paypal-letter4to6" points="429.327,201.88 410.649,287.754 433.583,287.754 452.491,201.88 429.327,201.88" />
                            </svg>
                        </button>
                    </a>
                    
                    <div class="btn-dogecoin mdl-button--raised" data-address="3MYJPAEHj6zp9Lwc15jYT1z22yDAmfhUr2"></div>

                </div>
                
                <div class="mdl-dialog__actions">
                    <button type="button" class="mdl-button close">
                        <?= __('CLOSE', 'search-inside') ?>
                    </button>
                </div>

            </dialog>

        </div>

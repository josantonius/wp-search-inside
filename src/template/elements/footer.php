<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Search-Inside.git
 * @since      1.1.3
 */
?>
        </div>
    </main>
</div>
<?php
$footer = '
    <div id="jst-footer">
        <footer class="mdl-mini-footer">  
            <div class="jst-made-with">  
                ' . __('Made with ', "search-inside") . '  <i class="jst-made-with-icon material-icons">favorite</i> ' . __('by ', "search-inside") . ' <a target="_blank" href="http://josantonius.com" title="' . __('App Developer', "search-inside") . '"> Josantonius</a>
            </div>
        </footer>
    </div>';
$footer = trim(preg_replace('/\s+/S', " ", $footer));
?>
<script type="text/javascript">
(function ($) {
    $(document).ready(function () {
        $('#wpfooter').append(<?php echo "'" . $footer . "'"; ?>).fadeIn();
    });
})(jQuery);
</script>
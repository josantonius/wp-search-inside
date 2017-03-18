<?php
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/WP-SearchInside.git
 * @since      1.0.0
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
                ' . __('Made with ', 'searchinside') . '  <i class="jst-made-with-icon material-icons">favorite</i> ' . __('by ', 'searchinside') . ' <a target="_blank" href="http://josantonius.com" title="' . __('App Developer', 'searchinside') . '"> Josantonius</a>
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
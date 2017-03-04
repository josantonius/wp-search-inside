/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @version    1.0.0
 * @link       https://github.com/Josantonius/SearchInside.git
 * @since      Available since 1.0.0 - Update: 2017-02-14
 */

(function ($) {
    
   $(document).ready(function () {

      $('#colorsWrapper div').each(function() {
         
         $(this).css('background', $(this).attr('data-color'));
      });

      $('#colorsWrapper div').click(function() {

         $('#wordColors').css('display', 'table');

         $('.colorOption').removeClass('selected');

         $(this).addClass('selected');
         
         $('#wordColors').val($(this).attr('data-color'));
      });

      $('#wordColors').on('input', function() {

         $('.colorOption.selected').attr('data-color', $(this).val());

         $('.colorOption.selected').css('background', $(this).val());
      });

      $(document).on('submit','#search-inside-form',function(e){
         
         var colors = [];

         $('#wordColors').css('visibility', 'hidden');

         $('#colorsWrapper div').each(function(index) {
            
            colors[index] = $(this).attr('data-color');
         });

         $('#wordColors').val(JSON.parse(JSON.stringify(colors)));
      
      });

    });

})(jQuery);
/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Search-Inside.git
 * @since      1.0.0
 */

(function ($) {
    
   $(document).ready(function () {

      /* Color picker */

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

      /* Select fields */

      if ($('#executeWith option:selected').val() !== 'append') {

         $('#wpsi-html-tag').fadeOut(200);
      }

      if ($('#executeWith option:selected').val() !== 'shortcode') {

         $('#wpsi-shortcode').fadeOut(200);
      }

      $('#executeWith').on('change', function() {

         if (this.value == 'append') {
            
            $('#wpsi-shortcode').fadeOut(200);
            $('#wpsi-html-tag').fadeIn(200);
         
         } else if (this.value == 'shortcode') {
            
            $('#wpsi-html-tag').fadeOut(200);
            $('#wpsi-shortcode').fadeIn(200);
         
         } else {

            $('#wpsi-html-tag').fadeOut(200);
            $('#wpsi-shortcode').fadeOut(200);
         }

      })

    });

})(jQuery);

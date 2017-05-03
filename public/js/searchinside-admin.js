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

      });

      function setModal(id) {

          var dialog = document.querySelector('dialog');
          var showDialogButton = document.querySelector(id);
          if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
          }
          showDialogButton.addEventListener('click', function() {
            dialog.showModal();
          });

         dialog.addEventListener('click', function (event) {
            var rect = dialog.getBoundingClientRect();
            var isInDialog=(rect.top <= event.clientY && event.clientY <= rect.top + rect.height && rect.left <= event.clientX && event.clientX <= rect.left + rect.width);
            if (!isInDialog) {
              dialog.close();
            }
         });
        dialog.querySelector('.close').addEventListener('click', function() {
          dialog.close();
        });
      }

      /**
       * Dogecoin Donate Button
       * @author Felix Yadomi
       * @link   http://codepen.io/yadomi/pen/EGiKD
       */
      function bitcoinButton() {

         $(function(){
           var btn = '<div class="symbol"><img id ="symbol" src="' + searchinsideadmin.icons_url +'bitcoin.png"> </div><p><span class="currency">Bitcoin</span></p>';
           $('.btn-dogecoin').each(function(){
             $(this).append(btn);
           });
            $('.btn-dogecoin').click(function(event) {
               var that = this;
               $(this).addClass('opened');  
               $(this).children('p').children('.currency').text($(this).data('address')); 
               $('html').one('click',function() {
                  $(that).removeClass('opened');
                  $(that).children('p').children('.currency').text('Bitcoin');  
               });
               event.stopPropagation();
            });
         });
      }

      animation = function(){
        
         $("#donate-button i").fadeTo(1000, .1)
                              .fadeTo(1000, 1);
      }

      setInterval(animation, 60000);

      bitcoinButton();

      setModal('#donate-button');

      $('#jst-footer').appendTo("#wpfooter").fadeIn();

    });

})(jQuery);

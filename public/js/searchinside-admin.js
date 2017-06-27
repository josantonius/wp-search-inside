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

      /**
       * Color picker.
       *
       * @since 1.1.7
       */
      function colorPicker() {

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
      }

      /**
       * On submit form.
       *
       * @since 1.1.7
       */
      function submitForm() {

         $(document).on('submit','#search-inside-form',function(e){
            
            var colors = [];

            $('#wordColors').css('visibility', 'hidden');

            $('#colorsWrapper div').each(function(index) {
               
               colors[index] = $(this).attr('data-color');
            });

            $('#wordColors').val(JSON.parse(JSON.stringify(colors)));
         
         });
      }

      /**
       * Select fields.
       *
       * @since 1.1.7
       */
      function selectsHandler() {

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
      }

      /**
       * Dialog settings.
       *
       * @since 1.0.0
       */
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
       * @since 1.1.6
       */
      function bitcoinButton() {

         $(function(){
            var url = searchinsideAdmin.icons_url;
            var btn = '<div class="symbol">' +
                        '<img id ="symbol" src="' + url +'bitcoin.png">' +
                      '</div>' +
                      '<p>' +
                        '<span class="currency">Bitcoin</span>' +
                      '</p>';
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

      /**
       * Footer handler.
       *
       * @since 1.1.6
       */
      function appendToFooter() {

         if ($('body').width() < 783) {

            $('#jst-footer').appendTo("#wpwrap").fadeIn();

         } else {

            $('#jst-footer').appendTo("#wpfooter").fadeIn();
         }

         $('#jst-support').appendTo("#wpwrap").fadeIn();
      }

      /**
       * Header button right.
       *
       * @since 1.1.6
       */
      function animateButton() {

         var animation = function(){
           
            $("#donate-button i").fadeTo(1000, .1)
                                 .fadeTo(1000, 1);
         }

         setInterval(animation, 60000);
      }

      colorPicker();

      submitForm();

      selectsHandler()

      animateButton();

      bitcoinButton();

      setModal('#donate-button');

      appendToFooter();

      $(window).resize(function() {

         appendToFooter();
      });

    });

})(jQuery);

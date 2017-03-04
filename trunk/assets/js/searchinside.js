/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hola@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Search-Inside/SearchInside.git
 * @since      1.0.0
 */

(function ($) {
    
   $(document).ready(function () {

        $(document).keypress(function(e) {

            if (!$('#searchinside').length) {
                
                if ($("input, textarea").is(":focus")) {

                    return;
                }

                $.getJSON(searchInside.urlPlugin + "/inc/settings.jsond", function(config) {
                    
                   switch(config.executeWith) {

                      case "alphanumeric":
                            config.executeWith = /[a-zA-Z0-9]/;
                            break;

                      case "numeric":
                            config.executeWith = /[0-9]/;
                            break;

                      case "alphabetic":
                            config.executeWith = /[a-zA-Z]/;
                            break;
                   }
                    
                    var inp = String.fromCharCode(e.keyCode);

                    if (config.executeWith.test(inp)) {
                        showForm(e);
                        if (config.searchMode == "quotes") {
                            wordColors = config.wordColor;
                        } else {
                            wordColors = config.wordColors;
                        }

                        config.tag = "EM";
                        
                        startSearch(config.searchIn, config.tag, config.searchMode, config.caseSensitive, wordColors);
                    }
                   
                });

            }

        });

        function showForm(e) {

            $form = $('<form id="searchinside"></form>');
            form1 = '<div id="wpsi-content">';
            form2 = '<input type="text" id="wpsi-search-input" value="' + String.fromCharCode(e.which) + '">';
            form3 = '<span id="wpsi-counter"><!-- --></span>';
            form4 = '<span id="wpsi-bar">&#124;</span>';
            form5 = '<div id="wpsi-buttons">';
            form6 = '<span id="wpsi-prev-button">&#8673;</span>';
            form7 = '<span id="wpsi-next-button">&#8675;</span>';
            form8 = '<span id="wpsi-cancel-button" class="wpsi-active-button">&#215;</span>';
            form9 = '</div></div>';
            
            $form.append(form1+form2+form3+form4+form5+form6+form7+form8+form9).appendTo($('body'));

            /* Place it under the administration bar */
            if ($('#wpadminbar').length) {
                length = $('#wpadminbar').height();
                $('#searchinside').css('margin-top',length+'px');
            }

            /* Show form */
            $('#searchinside').fadeIn(200);

            $('#wpsi-buttons').mousedown(function(e){ e.preventDefault(); });

            var searchInput = $('#wpsi-search-input');
            var strLength = searchInput.val().length * 2;
            searchInput.focus();
            searchInput[0].setSelectionRange(strLength, strLength);
        }

        function startSearch(searchIn, tag, searchMode, caseSensitive, colors) {

            var myHilitor=new Hilitor2(searchIn, tag, colors);

            myHilitor.setMatchType("left");
            myHilitor.setSearchMode(searchMode);
            myHilitor.setCaseSensitive(caseSensitive);

            var matchIndex=-1;
            var matchArr=[];
            var countText;

            var container=document.getElementById(searchIn);
            var searchEl=document.getElementById("wpsi-search-input");
            var counterEl=document.getElementById("wpsi-counter");
            var navPre=document.getElementById("wpsi-prev-button");
            var navNext=document.getElementById("wpsi-next-button");
            var navCancel=document.getElementById("wpsi-cancel-button");

            var searchTrigger=function(){myHilitor.apply(searchEl.value);
                displayNavigation();
                doNav(1);
            };

            searchEl.addEventListener("keyup",searchTrigger,false);

            navPre.addEventListener("click",function(e){
                if(matchIndex !== 0) {
                    doNav(-1);
                }
            },false);

            navNext.addEventListener("click",function(e){
                doNav(1);
            },false);

            navCancel.addEventListener("click",function(e){
                searchEl.value="";
                searchTrigger();
                container.scrollTop=0;
                $('#searchinside').remove();
            },false);


            var displayNavigation=function(){

                matchArr = container.getElementsByTagName(tag);
                countText = matchArr.length;
                counterEl.innerHTML = 0 + '/' + countText;
                matchIndex=-1;
            };

            var doNav=function(offset){

                matchIndex+=offset;
                matchIndex=matchIndex%matchArr.length;

                if (!isNaN(matchIndex)) {
                    console.log(matchArr[matchIndex]);
                    matchArr[matchIndex].scrollIntoView();
                    window.scrollBy(0, -200);
                }

                for(var i=0; i<matchArr.length; i++){
                    matchArr[i].style.outline=(matchIndex==i)?"2px solid rgba(204,0,0,0.5)":"";
                }

                if (matchIndex > 0) {
                     $("#wpsi-prev-button").addClass("wpsi-active-button");
                } else {
                    $("#wpsi-prev-button").removeClass("wpsi-active-button");
                }

                if (countText > 1) {
                    $("#wpsi-next-button").addClass("wpsi-active-button");
                } else {
                    $("#wpsi-next-button").removeClass("wpsi-active-button");
                }

                counterEl.innerHTML = (isNaN(matchIndex)) ? '0/0' : matchIndex+1+ '/' + countText;
            };
        }

   });

})(jQuery);
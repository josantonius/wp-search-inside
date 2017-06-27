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

    $(window).load(function () {

        $.getJSON(searchinside.settings, function(config) {

            if (!canSearch(config)) { return; }

            config.wordColor = getColors(config);
            
            if (!showFromKeyboard(config)) { showInTag(config); }
        });
    });

    /**
     * Check if the administration bar is visible and return height.
     *
     * @since 1.1.2
     */
    function ifAdminBar() {
        // Place it under the administration bar
        if ($('#wpadminbar').length && $('body').width() > 600) {
            return $('#wpadminbar').height();
        }
        return 0;
    }

    /**
     * Keep the form always visible.
     *
     * @since 1.1.2
     */
    function keepAlwaysVisible(tag) {

        $(window).scroll(function(){
            
            // Keep visible only if it has been written in the input
            if ($("#wpsi-search-input").val().length) {

                var length = ifAdminBar();
                var top    = $(document).scrollTop() + length;

                if (top < tag) {
                    $('#searchinside').css('margin-top','0px');
                    $("#searchinside").addClass("appended");
                } else {
                    $('#searchinside').css('margin-top',length+'px');
                    $("#searchinside").removeClass("appended");
                }
            }
        });
    }

    /**
     * Don't display if there isn't html tag where to search, if it's 
     * deactivated or if there isn't HTML tag to append the search engine.
     *
     * @since 1.1.2
     *
     * @return boolean
     */
    function canSearch(config) {

        var mode = config.executeWith;

        if (mode === 'off') {

            return false;

        } else if (!$('#' + config.searchIn).length) {

            return false;

        } else if (mode === 'append' && !$('#'+config.idContainer).length) {

            return false;

        } else if (mode === 'shortcode' && !$('#search-inside-sc').length) {

            return false;
        }

        return true;
    }

    /**
     * Get one or more colors depending on the chosen search mode.
     *
     * @since 1.1.2
     *
     * @return mixed
     */
    function getColors(config) {

        if (config.searchMode == "quotes") {
            
            return [config.wordColor];
        } 

        return config.wordColors;
    }

    /**
     * Insert search engine if any key is pressed in case it is activated.
     *
     * @since 1.1.2
     *
     * @return mixed
     */
    function showFromKeyboard(config) {

        var type = ['alphanumeric', 'alphabetic', 'numeric'];

        if (jQuery.inArray(config.executeWith, type) === -1) {

            return false;
        }

        $(document).keypress(function(e) {

            // If already been inserted 
            if (!$('#searchinside').length) {

                var regExp = '';

                // If key is pressed in another input
                if ($("input, textarea").is(":focus")) { return; }

                switch(config.executeWith) {
                    case "alphanumeric":
                            regExp = /[a-zA-Z0-9]/;
                            break;
                    case "numeric":
                            regExp = /[0-9]/;
                            break;
                    case "alphabetic":
                            regExp = /[a-zA-Z]/;
                            break;
                }
                
                var pressedKey = String.fromCharCode(e.keyCode);

                // If the pressed key matches the regular expression
                if (regExp.test(pressedKey)) {

                    config.idContainer = 'body';
                    appendForm(e, config);
                    runSearch(config);
                }
            }
        });

        return true;       
    }

    /**
     * Show form in HTML tag.
     *
     * @since 1.1.2
     *
     * @return mixed
     */
    function showInTag(config) {

            appendForm(null, config);
            $("#searchinside").removeClass("nodisplay");
            config.Position = $('#searchinside').offset().top;
            runSearch(config);
            keepAlwaysVisible(config.Position);
    }

    /**
     * Insert search engine form.
     *
     * @since 1.1.2
     */
    function appendForm(e, config) {

        var searching = '';

        if (e && e.which) {

           searching = String.fromCharCode(e.which);
        }

        $form = $('<form id="searchinside" class="nodisplay"></form>');
        form1 = '<div id="wpsi-content">';
        form2 = '<input type="text" id="wpsi-search-input" value="">';
        form3 = '<span id="wpsi-counter"><!-- --></span>';
        form4 = '<span id="wpsi-bar">&#124;</span>';
        form5 = '<div id="wpsi-buttons">';
        form6 = '<span id="wpsi-prev-button">&#8673;</span>';
        form7 = '<span id="wpsi-next-button">&#8675;</span>';
        form8 = '<span id="wpsi-cancel-button" class="wpsi-active-button">';
        form9 = '&#215;</span></div></div>';

        $form.append(form1+form2+form3+form4+form5+form6+form7+form8+form9);

        // If we have to show the search engine at the top of the web.
        if ((config.idContainer === 'body')) {

            $form.appendTo(config.idContainer);

            length = ifAdminBar();

            $('#searchinside').css('margin-top',length+'px');
        
        } else {
            
            $form.appendTo('#' + config.idContainer);
            $form.addClass('appended');
        } 

        // Show form
        $('#searchinside').fadeIn(200);

        if (searching.length > 0){
            $('#wpsi-search-input').focus();
        }

        // Prevent submit form with enter key
        $("#searchinside").submit(function( event ) {
            event.preventDefault();
        });

        // Avoid double-clicking with the mouse
        $('#wpsi-buttons').mousedown(function(e){ e.preventDefault(); });
    }

    /**
     * Activate the search.
     *
     * @since 1.1.2
     */
    function runSearch(config) {

        $('#searchinside').fadeIn(200);

        var tag = "EM";

        var myHilitor=new Hilitor2(config.searchIn, tag, config.wordColor);

        myHilitor.setMatchType("left");
        myHilitor.setSearchMode(config.searchMode);
        myHilitor.setCaseSensitive(config.caseSensitive);

        var matchIndex=-1;
        var matchArr=[];
        var countText;

        var container=document.getElementById(config.searchIn);
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
            if ((config.idContainer === 'body')) {
                $('#searchinside').remove();
            } else {
                $(window).scrollTop(config.Position - 100);
                $("#searchinside").addClass("appended");
            }
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
                matchArr[matchIndex].scrollIntoView();
                window.scrollBy(0, -200);
            }

            var border = "rgba(204, 75, 0, 0.498039) solid 2px";

            for(var i=0; i<matchArr.length; i++){
                matchArr[i].style.outline=(matchIndex==i) ? border : "";
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

            var counter = matchIndex+1+ '/' + countText;

            counterEl.innerHTML = (isNaN(matchIndex)) ? '0/0' : counter;
        };
    }

})(jQuery);

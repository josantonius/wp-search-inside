/**
 * Search Inside Wordpress Plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Search-Inside.git
 * @since      1.0.0
 *
 * Original JavaScript code by Chirp Internet: www.chirp.com.au
 * Please acknowledge use of this code by including this header.
 */
function Hilitor2(id, tag, colors)
{
  var tag = tag || "EM";
  var targetNode = document.getElementById(id) || document.body;
  var skipTags = new RegExp("^(?:" + tag + "|SCRIPT|FORM)$");

  var wordColor = [];
  var colorIdx = 0;
  var matchRegex = "";
  var openLeft = false;
  var openRight = false;

  var searchMode = "|";
  var searchModeRegex = /[^\w\\\s']+/g;
  var caseSensitive = "i";

  this.setMatchType = function(type)
  {
    switch(type)
    {
      case "left":
        this.openLeft = false;
        this.openRight = true;
        break;

      case "right":
        this.openLeft = true;
        this.openRight = false;
        break;

      case "open":
        this.openLeft = this.openRight = true;
        break;

      default:
        this.openLeft = this.openRight = false;

    }
  };

  this.setSearchMode = function(searchMode)
  {
    switch(searchMode)
    {
      case "words":
        this.searchMode = "|"; // Search for single words
        this.searchModeRegex = /[^\w\\\s']+/g;
        break;

      case "quotes":
        this.searchMode = " "; // Look for complete sentences
        this.searchModeRegex = /[^\w\W\\\s']+/g;
        break;
    }
  };

  this.setCaseSensitive = function(value)
  {
    switch(value)
    {
      case true:
        this.caseSensitive = "";
        break;

      case false:
        this.caseSensitive = "i";
        break;
    }
  };

  function addAccents(input)
  {
    retval = input;
    retval = retval.replace(/([ao])e/ig, "$1");
    retval = retval.replace(/\\u00E[024]/ig, "a");
    retval = retval.replace(/\\u00E7/ig, "c");
    retval = retval.replace(/\\u00E[89AB]/ig, "e");
    retval = retval.replace(/\\u00E[EF]/ig, "i");
    retval = retval.replace(/\\u00F[46]/ig, "o");
    retval = retval.replace(/\\u00F[9BC]/ig, "u");
    retval = retval.replace(/\\u00FF/ig, "y");
    retval = retval.replace(/\\u00DF/ig, "s");
    retval = retval.replace(/a/ig, "([aàâäá]|ae)");
    retval = retval.replace(/c/ig, "[cç]");
    retval = retval.replace(/e/ig, "[eèéêëé]");
    retval = retval.replace(/i/ig, "[iîïí]");
    retval = retval.replace(/o/ig, "([oôöó]|oe)");
    retval = retval.replace(/u/ig, "[uùûüú]");
    retval = retval.replace(/y/ig, "[yÿ]");
    retval = retval.replace(/s/ig, "(ss|[sß])");
    return retval;
  }

  this.setRegex = function(input)
  {
    input = input.replace(/\\([^u]|$)/g, "$1");
    input = input.replace(this.searchModeRegex, "").replace(/\s+/g, this.searchMode);
    input = input.replace(/^\||\|$/g, "");
    input = addAccents(input);
    if(input) {
      var re = "(" + input + ")";
      if(!this.openLeft) re = "(?:^|[\\b\\s])" + re;
      if(!this.openRight) re = re + "(?:[\\b\\s]|$)";
      matchRegex = new RegExp(re, this.caseSensitive);
      return true;
    }
    return false;
  };

  this.getRegex = function()
  {
    var retval = matchRegex.toString();
    retval = retval.replace(/(^\/|\(\?:[^\)]+\)|\/i$)/g, "");
    return retval;
  };

  // recursively apply word highlighting
  this.hiliteWords = function(node)
  {
    if(node === undefined || !node) return;
    if(!matchRegex) return;
    if(skipTags.test(node.nodeName)) return;

    if(node.hasChildNodes()) {
      for(var i=0; i < node.childNodes.length; i++)
        this.hiliteWords(node.childNodes[i]);
    }
    if(node.nodeType == 3) { // NODE_TEXT
      if((nv = node.nodeValue) && (regs = matchRegex.exec(nv))) {
        if(!wordColor[regs[1].toLowerCase()]) {
          wordColor[regs[1].toLowerCase()] = colors[colorIdx++ % colors.length];
        }

        var match = document.createElement(tag);
        match.appendChild(document.createTextNode(regs[1]));
        match.style.backgroundColor = wordColor[regs[1].toLowerCase()];
        match.style.fontStyle = "inherit";
        match.style.color = "#000";
        
        // Expand padding if it is a phrase search so that the color stay unified
        if (this.searchMode === " ") {
          match.style.padding = "2px";
        }

        var after;
        if(regs[0].match(/^\s/)) { // in case of leading whitespace
          after = node.splitText(regs.index + 1);
        } else {
          after = node.splitText(regs.index);
        }
        after.nodeValue = after.nodeValue.substring(regs[1].length);
        node.parentNode.insertBefore(match, after);
      }
    };
  };

  // remove highlighting
  this.remove = function()
  {
    var arr = document.getElementsByTagName(tag);
    while(arr.length && (el = arr[0])) {
      var parent = el.parentNode;
      parent.replaceChild(el.firstChild, el);
      parent.normalize();
    }
  };

  // start highlighting at target node
  this.apply = function(input)
  {
    this.remove();
    if(input === undefined || !(input = input.replace(/(^\s+|\s+$)/g, ""))) return;
    input = convertCharStr2jEsc(input);
    if(this.setRegex(input)) {
      this.hiliteWords(targetNode);
    }
  };

  // added by Yanosh Kunsh to include utf-8 string comparison
  function dec2hex4(textString)
  {
    var hexequiv = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F");
    return hexequiv[(textString >> 12) & 0xF] + hexequiv[(textString >> 8) & 0xF] + hexequiv[(textString >> 4) & 0xF] + hexequiv[textString & 0xF];
  }

  function convertCharStr2jEsc(str, cstyle)
  {
    // Converts a string of characters to JavaScript escapes
    // str: sequence of Unicode characters
    var highsurrogate = 0;
    var suppCP;
    var pad;
    var n = 0;
    var outputString = '';
    for(var i=0; i < str.length; i++) {
      var cc = str.charCodeAt(i);
      if(cc < 0 || cc > 0xFFFF) {
        outputString += '!Error in convertCharStr2UTF16: unexpected charCodeAt result, cc=' + cc + '!';
      }
      if(highsurrogate != 0) { // this is a supp char, and cc contains the low surrogate
        if(0xDC00 <= cc && cc <= 0xDFFF) {
          suppCP = 0x10000 + ((highsurrogate - 0xD800) << 10) + (cc - 0xDC00);
          if(cstyle) {
            pad = suppCP.toString(16);
            while(pad.length < 8) {
              pad = '0' + pad;
            }
            outputString += '\\U' + pad;
          } else {
            suppCP -= 0x10000;
            outputString += '\\u' + dec2hex4(0xD800 | (suppCP >> 10)) + '\\u' + dec2hex4(0xDC00 | (suppCP & 0x3FF));
          }
          highsurrogate = 0;
          continue;
        } else {
          outputString += 'Error in convertCharStr2UTF16: low surrogate expected, cc=' + cc + '!';
          highsurrogate = 0;
        }
      }
      if(0xD800 <= cc && cc <= 0xDBFF) { // start of supplementary character
        highsurrogate = cc;
      } else { // this is a BMP character
        switch(cc)
        {
          case 0:
            outputString += '\\0';
            break;
          case 8:
            outputString += '\\b';
            break;
          case 9:
            outputString += '\\t';
            break;
          case 10:
            outputString += '\\n';
            break;
          case 13:
            outputString += '\\r';
            break;
          case 11:
            outputString += '\\v';
            break;
          case 12:
            outputString += '\\f';
            break;
          case 34:
            outputString += '\\\"';
            break;
          case 39:
            outputString += '\\\'';
            break;
          case 92:
            outputString += '\\\\';
            break;
          default:
            if(cc > 0x1f && cc < 0x7F) {
              outputString += String.fromCharCode(cc);
            } else {
              pad = cc.toString(16).toUpperCase();
              while(pad.length < 4) {
                pad = '0' + pad;
              }
              outputString += '\\u' + pad;
            }
        }
      }
    }
    return outputString;
  }
}
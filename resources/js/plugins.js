var TRUTH = [true, 'true', 1, 'on'],
  NULL = [null, 'null', undefined, 'undefined', ''],
  kb = {
    TAB: 9,
    ESC: 27,
    ENTER: 13,
    UP: 38,
    DOWN: 40,
    LEFT: 37,
    RIGHT: 39
  };

// Animations
var Ai;
(function (Ai) {
  Ai[Ai["bounceIn"] = 0] = "bounceIn";
  Ai[Ai["bounceInDown"] = 1] = "bounceInDown";
  Ai[Ai["bounceInLeft"] = 2] = "bounceInLeft";
  Ai[Ai["bounceInRight"] = 3] = "bounceInRight";
  Ai[Ai["bounceInUp"] = 4] = "bounceInUp";
  Ai[Ai["fadeIn"] = 5] = "fadeIn";
  Ai[Ai["fadeInDown"] = 6] = "fadeInDown";
  Ai[Ai["fadeInDownBig"] = 7] = "fadeInDownBig";
  Ai[Ai["fadeInLeft"] = 8] = "fadeInLeft";
  Ai[Ai["fadeInLeftBig"] = 9] = "fadeInLeftBig";
  Ai[Ai["fadeInRight"] = 10] = "fadeInRight";
  Ai[Ai["fadeInRightBig"] = 11] = "fadeInRightBig";
  Ai[Ai["fadeInUp"] = 12] = "fadeInUp";
  Ai[Ai["fadeInUpBig"] = 13] = "fadeInUpBig";
  Ai[Ai["flip"] = 14] = "flip";
  Ai[Ai["flipInX"] = 15] = "flipInX";
  Ai[Ai["flipInY"] = 16] = "flipInY";
  Ai[Ai["lightSpeedIn"] = 17] = "lightSpeedIn";
  Ai[Ai["rotateIn"] = 18] = "rotateIn";
  Ai[Ai["rotateInDownLeft"] = 19] = "rotateInDownLeft";
  Ai[Ai["rotateInDownRight"] = 20] = "rotateInDownRight";
  Ai[Ai["rotateInUpLeft"] = 21] = "rotateInUpLeft";
  Ai[Ai["rotateInUpRight"] = 22] = "rotateInUpRight";
  Ai[Ai["slideInUp"] = 23] = "slideInUp";
  Ai[Ai["slideInDown"] = 24] = "slideInDown";
  Ai[Ai["slideInLeft"] = 25] = "slideInLeft";
  Ai[Ai["slideInRight"] = 26] = "slideInRight";
  Ai[Ai["zoomIn"] = 27] = "zoomIn";
  Ai[Ai["zoomInDown"] = 28] = "zoomInDown";
  Ai[Ai["zoomInLeft"] = 29] = "zoomInLeft";
  Ai[Ai["zoomInRight"] = 30] = "zoomInRight";
  Ai[Ai["zoomInUp"] = 31] = "zoomInUp";
  Ai[Ai["hinge"] = 32] = "hinge";
  Ai[Ai["jackInTheBox"] = 33] = "jackInTheBox";
  Ai[Ai["rollIn"] = 34] = "rollIn";
})(Ai || (Ai = {}));
var Ao;
(function (Ao) {
  Ao[Ao["bounceOut"] = 0] = "bounceOut";
  Ao[Ao["bounceOutDown"] = 1] = "bounceOutDown";
  Ao[Ao["bounceOutLeft"] = 2] = "bounceOutLeft";
  Ao[Ao["bounceOutRight"] = 3] = "bounceOutRight";
  Ao[Ao["bounceOutUp"] = 4] = "bounceOutUp";
  Ao[Ao["fadeOut"] = 5] = "fadeOut";
  Ao[Ao["fadeOutDown"] = 6] = "fadeOutDown";
  Ao[Ao["fadeOutDownBig"] = 7] = "fadeOutDownBig";
  Ao[Ao["fadeOutLeft"] = 8] = "fadeOutLeft";
  Ao[Ao["fadeOutLeftBig"] = 9] = "fadeOutLeftBig";
  Ao[Ao["fadeOutRight"] = 10] = "fadeOutRight";
  Ao[Ao["fadeOutRightBig"] = 11] = "fadeOutRightBig";
  Ao[Ao["fadeOutUp"] = 12] = "fadeOutUp";
  Ao[Ao["fadeOutUpBig"] = 13] = "fadeOutUpBig";
  Ao[Ao["flipOutX"] = 14] = "flipOutX";
  Ao[Ao["flipOutY"] = 15] = "flipOutY";
  Ao[Ao["lightSpeedOut"] = 16] = "lightSpeedOut";
  Ao[Ao["rotateOut"] = 17] = "rotateOut";
  Ao[Ao["rotateOutDownLeft"] = 18] = "rotateOutDownLeft";
  Ao[Ao["rotateOutDownRight"] = 19] = "rotateOutDownRight";
  Ao[Ao["rotateOutUpLeft"] = 20] = "rotateOutUpLeft";
  Ao[Ao["rotateOutUpRight"] = 21] = "rotateOutUpRight";
  Ao[Ao["slideOutUp"] = 22] = "slideOutUp";
  Ao[Ao["slideOutDown"] = 23] = "slideOutDown";
  Ao[Ao["slideOutLeft"] = 24] = "slideOutLeft";
  Ao[Ao["slideOutRight"] = 25] = "slideOutRight";
  Ao[Ao["zoomOut"] = 26] = "zoomOut";
  Ao[Ao["zoomOutDown"] = 27] = "zoomOutDown";
  Ao[Ao["zoomOutLeft"] = 28] = "zoomOutLeft";
  Ao[Ao["zoomOutRight"] = 29] = "zoomOutRight";
  Ao[Ao["zoomOutUp"] = 30] = "zoomOutUp";
  Ao[Ao["rollOut"] = 31] = "rollOut";
})(Ao || (Ao = {}));
var Aa;
(function (Aa) {
  Aa[Aa["bounce"] = 0] = "bounce";
  Aa[Aa["flash"] = 1] = "flash";
  Aa[Aa["pulse"] = 2] = "pulse";
  Aa[Aa["rubberBand"] = 3] = "rubberBand";
  Aa[Aa["shake"] = 4] = "shake";
  Aa[Aa["swing"] = 5] = "swing";
  Aa[Aa["tada"] = 6] = "tada";
  Aa[Aa["wobble"] = 7] = "wobble";
  Aa[Aa["jello"] = 8] = "jello";
})(Aa || (Aa = {}));
// /* Enum Size */
// Object.keys(animation.in).length / 2
// Object.keys(animation.out).length / 2
// Object.keys(animation.adv).length / 2
var animation = {
  adv: Aa,
  in: Ai,
  out: Ao
};

String.prototype.toCapitalCase = String.prototype.toCapitalCase || function () {
  return this.charAt(0).toUpperCase() + this.slice(1);
};

function getBoolean(a) { return TRUTH.some(function (t) { return t === a; }); }
function isNull(v) { return (v === null || v === 'null' || v === '' || v === undefined || v === 'undefined'); }
function onlyUnique(value, index, self) { return self.indexOf(value) === index; }
function abs(n) { return Math.abs(n); }
function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min; // The maximum is inclusive and the minimum is inclusive 
}
function getRandomStr(l) {
  l = l || 8;
  return Math.random().toString(36).substr(2, l);
}

// Unit Conversion plugin
var units = {
  _baseFS: 10,
  getBaseFontSize: function () {
    this._baseFS = parseInt($('html').css('font-size'));
    return this._baseFS;
  },
  getFontSize: function (el) {
    return parseInt($(el).css('font-size'));
  },
  pxToRem: function (px, bsFs) {
    bsFs = bsFs || this.getBaseFontSize();
    return px / bsFs;
  },
  remToPx: function (px, bsFs) {
    bsFs = bsFs || this.getBaseFontSize();
    return px * bsFs;
  },
  pxToEm: function (el) {
    return px / this.getFontSize(el);
  },
  emToPx: function (el) {
    return px * this.getFontSize(el);
  }
};

function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function openFullscreen() {
  var elem = document.documentElement;
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) {
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) {
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) {
    elem.msRequestFullscreen();
  }
}

function isElemSupportsAttr(element, attribute) {
  var test = document.createElement(element);
  if (attribute in test) {
    return true;
  } else {
    return false;
  }
};

/**!
 * POPUP Javascript
 * @version 4.0.2
 * @author Ajith S Punalur
 * @method popup.init()
 * @method popup.open()
 * @method popup.refresh()
 * @method popup.setData()
 * @method popup.close()
 * @method popup.loader()
 * @date 26-10-2020
 * @implements 3.2.2
 */
var popup = {
  TOP: 0,
  LEFT: 0,
  LEVEL: 0,
  WIDTH: 50,
  HEIGHT: 50,
  CC: 'none transparent inlineMock',
  _error: { message: 'No Errors' },
  _events: {
    opening: function (e) { },
    opened: function (e) { },
    closing: function (e) { },
    closed: function (e) { },
    refresh: function (e) { },
    setter: function (e) { }
  },
  /**
   * @see popup.init width, height, top, left
   */
  init: function (w, h, t, l) {
    "use strict";
    // Dependency Check
    this._error.message = 'No Errors';
    try {
      if (animation === undefined) { };
      if (TRUTH === undefined) { };
      if (NULL === undefined) { };
      if (kb === undefined) { };
      if (isNull === undefined) { };
      if (getBoolean === undefined) { };
      if (onlyUnique === undefined) { };
      if (getRandomInt === undefined) { };
      if (abs === undefined) { };
    } catch (err) {
      // console.log(err);
      this._error.message = err.message + "\n Hi DEV!,\nInclude the dependancies and RETRY...";
      console.error(this._error.message);
      return;
    }
    $('[data-popup]').each(function (i, el) {
      $(this).attr('tabindex', 0);
    });
    $('[data-modal].popup').each(function (i, el) {
      var dataset = $(el).data(),
        ovClass = '',
        toggleclasses = " none transparent inlineMock ";
      dataset.level = parseInt(dataset.level) || 0;

      popup.LEVEL = (dataset.level !== undefined && typeof (dataset.level) === 'number') ? parseInt(dataset.level, 10) : 0;

      if (dataset.block === false) {
        ovClass = 'none';
      } else if (dataset.block === "transparent") {
        ovClass = 'transparent';
      } else {
        ovClass = '';
        if ($(el).closest('.modalOverlay').length > 0) {
          $(el).closest('.modalOverlay').removeClass(toggleclasses + ' ' + dataset.oClass + ' ' + popup.CC);
        }
      }
      if ($(el).closest('.modalOverlay').length < 1) {
        $(el).wrap('<div class="modalOverlay ' + ovClass + '">&nbsp;</div>');
      }
    });

    w = w || 50;
    h = h || 50;
    t = t || 0;
    l = l || 0;

    $('[data-popup]').off('click.popup').on('click.popup', function (e) {
      var thisOb = ($(this).is('[data-popup]')) ? this : $(this).closest('[data-popup]'),
        dataset = $(thisOb).data(),
        modal = $(thisOb).data('popup'),
        ob = '[data-modal=' + modal + '].popup:nth-of-type(1)';
      if ($.trim(modal) === '') { return; }
      dataset.offsetX = !(dataset.hasOwnProperty("offsetX")) ? 0 : dataset.offsetX;
      dataset.offsetY = !(dataset.hasOwnProperty("offsetY")) ? 0 : dataset.offsetY;

      $(thisOb).attr('data-offset-x', dataset.offsetX);
      $(thisOb).attr('data-offset-y', dataset.offsetY);

      w = $(thisOb).data('width') || 50;
      h = $(thisOb).data('height') || 50;
      t = $(thisOb).data('top') || h / 2;
      l = $(thisOb).data('left') || w / 2;

      if (dataset.position === 'inline' || $(ob).attr('data-position') === 'inline') {
        var rel = dataset.relate;

        if ($(rel).length > 0) {
          t = $(rel).offset().top + dataset.offsetY;
          l = $(rel).offset().left + dataset.offsetX;
          // console.log(t,l);
        } else {
          // DONT DELETE FOLLOWING COMMENTS > Needs to Check
          t = (e.pageY - e.offsetY) + $(this).innerHeight() + dataset.offsetY;
          l = (e.pageX - e.offsetX) + dataset.offsetX;
          // t = $(this).offset().top + dataset.offsetY;
          // l = $(this).offset().left + dataset.offsetX;
        }

        $(ob).attr({
          'data-top': t,
          'data-left': l
        });

        // console.log(t,l)
        // console.log(e);
        popup.TOP = t;
        popup.LEFT = l;

        var ww = $(document).width(),
          wh = $(document).height();
        // popup.LEFT = ((l + w) > $(window).width())? abs(l - w) + e.offsetX: l;
        // console.log("POPUP{\n left: %s,\n width: %s}\nWINDOW{width: %s}", l, w, ww);
        popup.TOP = ((t + h) > wh) ? t - ((t + h) - wh) : t;
        popup.LEFT = ((l + w) > ww) ? l - ((l + w) - ww) : l;
        // popup.WIDTH = w;
        // popup.HEIGHT = h;
        // console.log('init >> %d X %d @ X=%d and Y=%d', w, h, l, t);
      }

      if (dataset.units === 'px' || dataset.units === 'pixel') {
        $(ob).attr('data-units', 'px');
        t = $(thisOb).data('top') || 0;
        l = $(thisOb).data('left') || 0;
        w = $(thisOb).data('width') || $(window).width() - 20;
        h = $(thisOb).data('height') || $(window).height() - 20;
        //console.log(w)
      } else {
        //console.log('init : %')
        $(ob).attr('data-units', '%');
        w = (w >= 100) ? 100 : w;
        h = (h >= 100) ? 100 : h;
        t = (t >= h / 2) ? 0 : t;
        l = (l >= w / 2) ? 0 : l;
      }
      //console.log($(ob).attr('data-units'));
      if ($(this).is('[data-xpopup="true"]')) {
        parent.popup.open(ob, w, h, dataset, t, l);
      } else {
        popup.open(ob, w, h, dataset, t, l);
      }
    });

    $('.popup [data-hide]').off('click.popup').on('click.popup', function () {
      popup.close($(this).closest('.popup'));
    });
    $('[data-modal].popup').each(function (i, el) {
      $(el).trigger("popup.init", $(el));
    });
  },
  open: function (obPop, w, h) {
    "use strict";
    // console.log(obPop);
    var vArgs = Array.prototype.slice.call(arguments, 3),
      t = Array.prototype.slice.call(arguments, 4, 5),
      l = Array.prototype.slice.call(arguments, 5),
      ob,
      key,
      tgt,
      dataset = vArgs[0] || $(obPop).data(),
      video = $(obPop).find('video'),
      ovClass = '',
      // toggleclasses = "none transparent inlineMock",
      modal = $(obPop).data('modal');

    ob = obPop || '[data-modal=' + modal + '].popup:nth-of-type(1)';
    dataset.class = dataset.class || $(obPop).data('modal');
    dataset.oClass = dataset.oClass || '';
    dataset.level = parseInt(dataset.level, 10) || 0;
    dataset.animateIn = dataset.animateIn || '';
    dataset.animateOut = dataset.animateOut || '';
    dataset.modal = dataset.modal !== undefined ? getBoolean(dataset.modal) : true;
    dataset.block = dataset.block !== undefined ? getBoolean(dataset.block) : true;
    dataset.scroll = dataset.scroll !== undefined ? getBoolean(dataset.scroll) : false;
    dataset.position = dataset.position || 'center';

    dataset.events = (dataset.events === undefined || dataset.events === {}) ? popup._events : $.extend(popup._events, dataset.events);;
    $.extend(popup._events, dataset.events);

    // callback before opening
    $(document).trigger($.Event('popup.close'), $(obPop));
    $(obPop).trigger($.Event('popup.close'), $(obPop));
    var cb = dataset.events.opening({
      target: $(obPop)[0],
      type: 'opening'
    });
    if (getBoolean(cb)) { return; }

    // console.log(dataset.level);
    popup.LEVEL = (dataset.level !== NaN && typeof (dataset.level) === 'number') ? parseInt(dataset.level, 10) : 0;

    if (dataset.block === false) {
      ovClass = 'none';
    } else if (dataset.block === "transparent") {
      ovClass = 'transparent';
    } else {
      ovClass = '';
    }

    $(obPop).closest('.modalOverlay').removeClass(ovClass + ' ' + dataset.oClass + ' ' + popup.CC);
    $(obPop).closest('.modalOverlay').addClass(ovClass + ' ' + dataset.oClass);

    // console.log(dataset);
    dataset.offsetX = !(dataset.hasOwnProperty("offsetX")) ? 0 : parseInt(dataset.offsetX, 10);
    dataset.offsetY = !(dataset.hasOwnProperty("offsetY")) ? 0 : parseInt(dataset.offsetY, 10);

    $(obPop).attr('data-offset-x', dataset.offsetX);
    $(obPop).attr('data-offset-y', dataset.offsetY);

    /**
     * @deprecated: InlineSetter
     */
    for (var i = 0; i < vArgs.length; i += 1) {
      // t = vArgs[i]
      for (key in vArgs[i]) {
        // console.log(key)
        if (vArgs[i].hasOwnProperty(key)) {
          if (key.match(/^xsource/)) {
            // console.log('xs');
            $(obPop).attr('data-xsource', true);
            $(obPop).find('.popContent').html('<iframe id="' + $(obPop).attr('id') + '_iframe" onload="popup.loader(\'' + obPop + '\',false)" src="' + vArgs[i][key] + '" frameborder="0"></iframe>');
          }
          // will be DEPRECATED on future versions
          // else if (key.match(/^setAttr/)) {
          //   tgt = key.replace(/^setAttr/, '').toLowerCase();
          //   //console.log(key + ' >>> ' + tgt);
          //   $(obPop).find('[data-get-attr-' + tgt + ']').attr(tgt, vArgs[i][key]);
          // } else if (key.match(/^setData/)) {
          //   tgt = key.replace(/^setData/, '').toLowerCase();
          //   // console.log(tgt, $(obPop).find('[data-get-data-' + tgt + ']'));
          //   // console.log(key + ' >>> ' + tgt);
          //   $(obPop).find('[data-get-data-' + tgt + ']').attr('data-' + tgt, vArgs[i][key]);
          // } else if (key.match(/^setText/)) {
          //   $(obPop).find('[data-get-text]').text(vArgs[i][key]);
          // } else if (key.match(/^setTemplate/)) {
          //   $(obPop).find('[data-get-template]').html(vArgs[i][key]);
          // }
          // --ENDS will be DEPRECATED on future versions
          else if (key.match(/^set/)) {
            // tgt = key.replace(/^set/, '').toLowerCase();
            // console.log(dataset[key]);
            try {
              var ds = JSON.parse(dataset[key].replace(/'/g, '"'));
            } catch (e) {
              // error
              if (typeof (dataset[key]) === 'object') {
                ds = dataset[key];
              } else if (typeof (dataset[key]) === 'string') {
                console.error('SYNTAX Error: Datatype Mismatch / Incorrect Data Format. \n ::: %s', dataset[key]);
                return;
              }
            }
            if (ds.datatype === 'JSON_encoded' && typeof ds.data === 'string') {
              if ($(ds.data).length > 0) {
                var json = hardDecode($(ds.data).val());
                // console.log(json);
                this.setData(obPop, json);
              } else {
                console.error('EXCEPTION: Datasource not found.');
              }
            } else if (ds.datatype === 'JSON_string') {
              var json = ds.data;
              // console.log(json);
              this.setData(obPop, json);
            } else if (ds.datatype === 'JSON_object' || typeof ds.data === 'object') {
              var json = ds.data;
              // console.log(json);
              this.setData(obPop, json);
            } else {
              console.error(json);
            }
          }
        }
      }
    }

    if (video) {
      $(video).each(function (i, el) {
        if ($(el).data('autoplay') === true) {
          el.play();
        }
      });
    }
    // (Called on document.ready) popup.activate();
    if (dataset.units === 'px' || dataset.units === 'pixel') {
      //console.log('open : px')
      w = w || $(window).width() - 20;
      h = h || $(window).height() - 20;

      if (!(dataset.position === 'inline') || getBoolean(dataset.responsive) === true) {
        w = (w >= $(window).width()) ? $(window).width() : w;
        h = (h >= $(window).height()) ? $(window).height() : h;
      }

      if (dataset.position === 'center') {
        t = (abs($(window).height() - h) / 2);
        l = (abs($(window).width() - w) / 2);
      } else if (dataset.position === 'absolute') {
        t = (dataset.top > ($(window).height() - h)) ? $(window).height() - h : dataset.top;
        l = (dataset.left > ($(window).width() - w)) ? $(window).width() - w : dataset.left;
      } else if (dataset.position === 'inline') {
        var rel = dataset.relate;
        // console.log(rel);
        var ww = $(document).width(),
          wh = $(document).height();
        if ($(rel).length > 0) {
          // console.log(dataset.offsetX);
          t = $(rel).offset().top + dataset.offsetY;
          l = $(rel).offset().left + dataset.offsetX;
          // console.log(t,l);
          // console.log("POPUP{\n left: %s,\n width: %s}\nWINDOW{width: %s}", l, w, ww);

          l = ((l + w) > ww) ? l - ((l + w) - ww) : l;
          t = ((t + h) > wh) ? t - ((t + h) - wh) : t;
        } else {
          t = popup.TOP;
          l = popup.LEFT;
          l = ((l + w) > ww) ? l - ((l + w) - ww) : l;
          t = ((t + h) > wh) ? t - ((t + h) - wh) : t;

          l = (l < 0) ? 0 : l;
          t = (t < 0) ? 0 : t;

          // DONT DELETE FOLLOWING COMMENTS > Needs to Check
          // t = $(this).offset().top + dataset.offsetY;
          // l = $(this).offset().left + dataset.offsetX;
        }

        $('body').css('position', 'relative');
        $(obPop).closest('.modalOverlay').addClass('inlineMock');
        popup.TOP = t;
        popup.LEFT = l;
      }
      $(ob).attr({
        'data-units': 'px',
        'data-width': w,
        'data-height': h,
        'data-class': dataset.class,
        'data-relate': dataset.relate,
        'data-top': t + dataset.offsetY,
        'data-left': l + dataset.offsetX,
        'data-offset-x': dataset.offsetX,
        'data-offset-y': dataset.offsetY,
        'data-animate-in': dataset.animateIn,
        'data-animate-out': dataset.animateOut,
        'data-position': dataset.position || 'center'
      });
    } else {
      //console.log('open : %')
      w = w || 50;
      h = h || 50;

      w = (w >= 100) ? 100 : w;
      h = (h >= 100) ? 100 : h;

      $(ob).attr({
        'data-top': t,
        'data-left': l,
        'data-width': w,
        'data-height': h,
        'data-units': '%',
        'data-class': dataset.class,
        'data-animate-in': dataset.animateIn,
        'data-animate-out': dataset.animateOut,
        'data-position': dataset.position || 'center'
      });
    }

    popup.TOP = t;
    popup.LEFT = l;
    popup.WIDTH = w;
    popup.HEIGHT = h;

    // console.log(modal +" "+ w  +" "+ h);
    if (dataset.block === true || dataset.block === undefined || dataset.block === 'transparent') {
      $('body').addClass('modalOpen');
    }
    if ((dataset.scroll === true || dataset.position === 'inline') && (dataset.block === false || dataset.block === undefined)) {
      $('body').removeClass('modalOpen');
    }

    if ($.trim(dataset.animateIn) !== '') {
      $(ob).addClass('open ' + dataset.class + ' ' + dataset.animateIn);
      $(ob).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function (e) {
        if ($(e.target).is('.popup')) {
          $(ob).removeClass(dataset.animateIn);
          popup.refresh();
        }
      }).parent('.modalOverlay').addClass('active ' + dataset.oClass).css({
        // 'display': 'block',
        // 'visibility': 'visible',
        'z-index': 1050 + dataset.level
      });
    } else {
      $(ob).addClass('open ' + dataset.class).parent('.modalOverlay').addClass('active ' + dataset.oClass).css({
        // 'display': 'block',
        // 'visibility': 'visible',
        'z-index': 1050 + dataset.level
      });
    }

    if (dataset.units === 'px' || dataset.units === 'pixel') {
      $(ob).attr('data-units', 'px');
      // console.log(t)
      var mw = ((abs(l) + w) > $(window).width()) ? 1 : abs(l);
      // console.log(mw);
      $(ob).css({
        'top': t + 'px',
        'left': l + 'px', // (abs($(window).width() - w) / 2) + 'px',
        'width': w + 'px',
        'height': h + 'px',
        'max-width': 'calc(100% - ' + mw + 'px)'
      });
    } else {
      $(ob).attr('data-units', '%');
      $(ob).css({
        'top': (abs(100 - h) / 2) + '%',
        'left': (abs(100 - w) / 2) + '%',
        'width': w + '%',
        'height': h + '%'
      });
    }

    dataset.top = popup.TOP;
    dataset.left = popup.LEFT;
    dataset.width = popup.WIDTH;
    dataset.height = popup.HEIGHT;

    $(obPop)[0]._config = dataset;

    // console.log('after Open:  ' + $(ob).attr('data-units'));
    popup.refresh(ob);

    $(document).trigger($.Event('popup.open'), $(obPop));
    $(obPop).trigger($.Event('popup.open'), $(obPop));
    dataset.events.opened({
      target: $(obPop)[0],
      type: 'opened'
    });
  },
  refresh: function () {
    "use strict";
    var ob = '.popup.open', dataset, hdr, ftr;

    $(ob).each(function (i, el) {
      // dataset = $(el)[0]._config;
      dataset = $(el)[0]._config || $(el)[0].dataset;
      // console.log(dataset);
      dataset.events = (dataset.events === undefined || dataset.events === {}) ? popup._events : $.extend(popup._events, dataset.events);;
      $.extend(popup._events, dataset.events);

      popup.WIDTH = parseInt(dataset.width, 10);
      popup.HEIGHT = parseInt(dataset.height, 10);
      popup.TOP = parseInt(dataset.top, 10) || 0;
      popup.LEFT = parseInt(dataset.left, 10) || 0;

      $('.popup [data-hide]').off('click.popup').on('click.popup', function () {
        popup.close($(this).closest('.popup'));
      });

      $('.modalOverlay').off('click.popup').on('click.popup', function (e) {
        // e.stopPropagation();
        // console.log(e.target);
        if ($(e.target).is('.modalOverlay') && $(e.target).find('[data-dismiss="true"].popup').length > 0) {
          popup.close($(this).find('.popup'));
        }
      });

      $(document).off('keydown.popup').on('keydown.popup', function (e) {
        if (e.which === kb.ESC) {
          $('.modalOverlay.active').each(function (i, el) {
            if ($(el).find('.popup[data-dismiss="true"]').length > 0) {
              popup.close($(this).find('.popup'));
            }
          });
        }
      });

      if (dataset.units === 'px' || dataset.units === 'pixel') {
        $(el).attr('data-units', 'px');
        var w = (popup.WIDTH >= $(window).width()) ? $(window).width() : popup.WIDTH,
          h = (popup.HEIGHT >= $(window).height()) ? $(window).height() : popup.HEIGHT,
          t = popup.TOP,
          l = popup.LEFT;
        // console.log(dataset.position);
        if (dataset.position === 'center') {
          t = (abs($(window).height() - h) / 2);
          l = (abs($(window).width() - w) / 2);
        } else if (dataset.position === 'absolute') {
          t = (dataset.top > ($(window).height() - h)) ? $(window).height() - h : dataset.top;
          l = (dataset.left > ($(window).width() - w)) ? $(window).width() - w : dataset.left;
        } else if (dataset.position === 'inline') {
          $('body').css('position', 'relative');
          $(el).closest('.modalOverlay').addClass('inlineMock');
          t = popup.TOP;
          l = popup.LEFT;
          w = popup.WIDTH;
          h = popup.HEIGHT;

          l = (l < 0) ? 0 : l;
          t = (t < 0) ? 0 : t;
          // l = ((l + w) > $(window).width())? abs(l - w): l;
        }
        // console.log(t);
        // t = (popup.TOP >= $(window).height()/2) ? 0 : (abs($(window).height() - h) / 2) + 'px',
        // l = (popup.LEFT >= $(window).width()/2) ? 0 : (abs($(window).width() - w) / 2) + 'px';
        // console.log('Refresh : px', popup.WIDTH, $(window).width(), w);

        $(el).css({
          'top': t,
          'left': l,
          'width': w + 'px',
          'height': h + 'px'
        });
      } else {
        // console.log('refresh : %');
        $(el).attr('data-units', '%');
      }

      hdr = ($(el).find('.popHeader').is(':hidden')) ? 0 : $(el).find('.popHeader').outerHeight();
      ftr = ($(el).find('.popFooter').is(':hidden')) ? 0 : $(el).find('.popFooter').outerHeight();
      hdr = hdr ? hdr : 0;
      ftr = ftr ? ftr : 0;

      $(el).find('.popContent').css('height', $(el).outerHeight() - (hdr + ftr));
      // $(el).trigger("popup.refresh", $(el));
      // console.log(dataset);

      $(document).trigger($.Event('popup.refresh'), $(el));
      $(el).trigger($.Event('popup.refresh'), $(el));
      dataset.events.refresh({
        target: el,
        type: 'refresh'
      });
    });
  },
  setData: function (obPop, json) {


    if (typeof json === "string" && json !== '') {
      json = JSON.parse(json);
    } else if (typeof json !== "object") {
      console.error("Invalid JSON Format: ", json);
    }
    // console.log(obPop, json);
    $(json).each(function (di, dx) {
      // for (var k in dx) {
      var k = 'selector';
      if (dx.hasOwnProperty(k)) {
        // console.log(k, dx[k]);
        if ($(obPop).find(dx[k]).length <= 0) {
          return;
        }
        if (dx.hasOwnProperty('attr')) {
          $(obPop).find(dx[k]).attr(dx['attr']);
        }
        if (dx.hasOwnProperty('removeAttr')) {
          $(obPop).find(dx[k]).removeAttr(dx['removeAttr']);
        }
        if (dx.hasOwnProperty('class')) {
          $(obPop).find(dx[k]).addClass(dx['class']);
        }
        if (dx.hasOwnProperty('removeClass')) {
          $(obPop).find(dx[k]).removeClass(dx['removeClass']);
        }
        if (dx.hasOwnProperty('val')) {
          if ($(dx[k]).is('input:checkbox') || $(dx[k]).is('input:radio')) {
            $(obPop).find(dx[k])[0].checked = getBoolean(dx['val']);
          } else if ($(dx[k]).is('[data-range-slider]')) {
            $(dx[k]).slider('value', dx['val']);
          } else {
            $(obPop).find(dx[k]).val(dx['val']).trigger('keyup');
          }
        }
        if (dx.hasOwnProperty('text')) { // k === 'selector'
          $(obPop).find(dx[k]).text(dx['text']);
        }
        if (dx.hasOwnProperty('template')) { // k === 'selector'
          $(obPop).find(dx[k]).html(dx['template']);
        }
        if (dx.hasOwnProperty('html')) { // k === 'selector'
          $(obPop).find(dx[k]).html(dx['html']);
        }
      }
      // }
    });
  },
  close: function (obPop) {
    "use strict";
    var reset = $(obPop).find('[data-reset="true"]'),
      dataset = $(obPop)[0]._config || $(obPop)[0].dataset;

    // console.log(dataset.events);
    dataset.events = (dataset.events === undefined || dataset.events === {}) ? popup._events : $.extend(popup._events, dataset.events);;
    $.extend(popup._events, dataset.events);

    // callback before opening
    $(document).trigger($.Event('popup.closing'), $(obPop));
    $(obPop).trigger($.Event('popup.closing'), $(obPop));
    var cb = dataset.events.closing({
      target: obPop[0],
      type: 'closing'
    });
    if (getBoolean(cb)) { return; }

    if (reset.length > 0) {
      $(reset).each(function (i, e) {
        switch (e.tagName.toLowerCase()) {
          case 'video':
            e.load();
            break;
          case 'iframe':
            e.src = '';
            break;
          case 'input':
          case 'select':
          case 'textarea':
            if ($(e).attr('type') === 'radio' || $(e).attr('type') === 'checkbox') {
              if ($(e).is('[data-init]')) {
                e.checked = $(e).attr('data-init');
              } else {
                e.checked = false;
              }
            } else {
              e.value = '';
            }
            break;
          default:
            $(obPop).find(e).html('');
            // console.log(e.tagName.toLowerCase());
            break;
        }
      });
    }

    $('body').removeClass('modalOpen');

    if ($.trim(dataset.animateOut) !== '') {
      $(obPop).addClass(dataset.animateOut).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass('open ' + dataset.class + ' ' + dataset.animateOut)
          .parent('.modalOverlay').removeClass('active' + ' ' + dataset.oClass + ' ' + popup.CC).removeAttr('style');
      });
      popup.refresh();
    } else {
      $(obPop).removeClass('open ' + dataset.class).closest('.modalOverlay').removeClass('active' + ' ' + dataset.oClass + ' ' + popup.CC).removeAttr('style');
    }

    // $(document).trigger("popup.close", $(obPop));
    // $(obPop).trigger("popup.close", $(obPop));
    $(document).trigger($.Event('popup.close'), $(obPop));
    $(obPop).trigger($.Event('popup.close'), $(obPop));
    // console.log(dataset.events);
    dataset.events.closed({
      target: obPop[0],
      type: 'closed'
    });
  },
  loader: function (obPop, opt) {
    "use strict";
    $(obPop).attr('data-loader', opt);
  }
};
$(function () { "use strict"; popup.init(); });
$(window).on('resize', function () { "use strict"; popup.refresh(); });

/**!
 * Owl Carousel with Data Attributes
 * @author: Ajith S Punalur
 * @version: 2.1.0
 * */
var carousel = {
  _error: { message: 'No Errors' },
  init: function () {
    "use strict";
    // Dependancy Check
    this._error.message = 'No Errors';
    try {
      if (TRUTH === undefined) { };
      if (NULL === undefined) { };
      if (isNull === undefined) { };
      if (getBoolean === undefined) { };
      if (onlyUnique === undefined) { };
    } catch (err) {
      // console.log(err);
      this._error.message = err.message + "\n Include the dependancy it and retry...!";
      console.error(this._error.message);
      return;
    }
    $('[data-carousel="owl"]').each(function (i, el) {
      // var mgn = ($(el).data('margin') !== undefined)? parseInt($(el).data('margin')): 10;
      // console.log($('html').attr('dir')==='rtl')
      var nav = ($(el).data('nav') !== undefined) ?
        $(el).data('nav').split('{{,}}')
        : ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"];
      $(el).owlCarousel({
        singleItem: true,
        rtl: ($('html').attr('dir') === 'rtl') ? true : false,
        stagePadding: $(el).data('stagePadding') || 0,
        smartSpeed: $(el).data('duration') || 1000,
        animateOut: $(el).data('animateOut') || false,
        animateIn: $(el).data('animateIn') || false,
        items: $(el).data('items') || 3,
        loop: $(el).data('loop') || true,
        dots: $(el).data('dots') || false,
        nav: $(el).data('arrows') || false,
        margin: ($(el).data('margin') === undefined) ? 0 : parseInt($(el).data('margin')),
        center: ($(el).data('center') === undefined) ? false : getBoolean($(el).data('center')),
        autoplay: ($(el).data('autoplay') === undefined) ? true : getBoolean($(el).data('autoplay')),
        autoplayTimeout: $(el).data('timeout') || 2000,
        autoplayHoverPause: $(el).data('pause') || false,
        navText: nav,
        responsive: {
          0: {
            stagePadding: $(el).data('xsStagePadding') || 0,
            items: $(el).data('xsItems') || 1
          },
          480: {
            stagePadding: $(el).data('smStagePadding') || 0,
            items: $(el).data('smItems') || 1
          },
          991: {
            stagePadding: $(el).data('mdStagePadding') || $(el).data('stagePadding') || 0,
            items: $(el).data('mdItems') || $(el).data('items') || 3
          },
          1200: {
            stagePadding: $(el).data('stagePadding') || 0,
            items: $(el).data('items') || 3
          }
        },
        video: true
      });
    });
  },
  forceRefresh: function () {
    "use strict";
    console.log('refreshed');
    window.dispatchEvent(new Event('resize'));
  }
}; $(document).on('ready resize', function () { carousel.init(); });

/**
 * MultiSelector ComboBox
 * @version 1.0.3
 * @build 11-10-2020 (dd-mm-yyyy)
 * */
$.fn.multiselector = function (settings) {
  var s = {
    class: settings.class || '',
    placeholder: settings.placeholder || 'Choose',
    max: settings.max || 3,
    selectMsg: settings.selectMsg || '{0} Selected',
    selectMsgAll: settings.selectMsgAll || '{0} all selected!',
    screen: settings.screen || 500,
    forceCustom: (settings.forceCustom === undefined) ? false : getBoolean(settings.forceCustom),
    devices: settings.devices || ['Android', 'BlackBerry', 'iPhone', 'iPad', 'iPod', 'Opera Mini', 'IEMobile', 'Silk'],
    csv: (settings.csv === undefined) ? false : getBoolean(settings.csv),
    csvSeperator: settings.csvSeperator || ',',
    buttons: (settings.buttons === undefined) ? false : getBoolean(settings.buttons),
    live: (settings.live === undefined) ? true : getBoolean(settings.live),
    selectAll: (settings.selectAll === undefined) ? false : getBoolean(settings.selectAll),
    search: (settings.search === undefined) ? false : getBoolean(settings.search),
    searchText: settings.searchText || 'Search...',
    error: settings.error || 'No matches for "{0}"',
    prefix: settings.prefix || '',
    locale: settings.locale || ['OK', 'Cancel', 'Select All'],
    top: (settings.top === undefined) ? false : getBoolean(settings.top),
    tooltip: (settings.tooltip === undefined) ? true : getBoolean(settings.tooltip),
    outputTo: settings.outputTo || '',
    outputTemplate: settings.outputTemplate || "<b> &gt; {{$}} </b>",
    outputSrcAttr: settings.outputSrcAttr || "value"
  };
  // console.log(s.floatWidth)
  return this.each(function (idx, el) {
    var ds = $(el).data();
    ds.locale = (ds.locale) ? (typeof ds.locale === 'string' ? ds.locale.split(',') : ds.locale) : s.locale;
    ds.devices = (ds.locale) ? (typeof ds.devices === 'string' ? ds.devices.split(',') : ds.devices) : s.devices;
    // console.log(s.screen)
    settings = {
      class: ds.class || s.class,
      placeholder: ds.placeholder || s.placeholder,
      csvDispCount: ds.max || s.max,
      captionFormat: ds.selectMsg || s.selectMsg,
      captionFormatAllSelected: ds.selectMsgAll || s.selectMsgAll,
      floatWidth: ds.screen || s.screen,
      forceCustomRendering: (ds.forceCustom === undefined) ? s.forceCustom : getBoolean(ds.forceCustom),
      nativeOnDevice: ds.devices || s.devices,
      outputAsCSV: (ds.csv === undefined) ? s.csv : getBoolean(ds.csv),
      csvSepChar: ds.csvSeperator || s.csvSeperator,
      okCancelInMulti: (ds.buttons === undefined) ? s.buttons : getBoolean(ds.buttons),
      triggerChangeCombined: (ds.live === undefined) ? s.live : getBoolean(ds.live),
      selectAll: (ds.all === undefined) ? s.all : getBoolean(ds.all),
      search: (ds.search === undefined) ? s.search : getBoolean(ds.search),
      searchText: ds.searchText || s.searchText,
      noMatch: ds.error || s.error,
      prefix: ds.prefix || s.prefix,
      locale: ds.locale || s.locale,
      up: (ds.top === undefined) ? s.top : getBoolean(ds.top),
      showTitle: (ds.tooltip === undefined) ? s.tooltip : getBoolean(ds.tooltip),
      outputTo: ds.outputTo || s.outputTo,
      outputTemplate: ds.outputTemplate || s.outputTemplate,
      outputSrcAttr: ds.outputSrcAttr || s.outputSrcAttr
    };
    // console.log(settings);
    $(el).SumoSelect(settings);

    $(el).closest('.SumoSelect').addClass(settings.class);

    if ($.trim(settings.outputTo) !== '') {
      var output = settings.outputTo,
        outputTemplate = settings.outputTemplate.replace(/'/g, '"'),
        outputSrc = settings.outputSrcAttr,
        act = null;

      outputTemplate = outputTemplate.replace(/{{\$action\=([a-z-]+)\(\)}}/, '').split('{{$}}');
      act = settings.outputTemplate.match(/{{\$action\=([a-z-]+)\(\)}}/);

      if (act !== null) {
        act = act[0].split('{{')[1].split('}}')[0].split('=')[1];
      }

      $(el).attr('data-action', act);

      if ($(output).length <= 0) { return; }

      // $(el).attr('data-output-to', settings.outputTo);
      // console.log(el)
      $(el).off('change.multiselector').on('change.multiselector', function () {
        // console.log( $(this).attr('data-output-to') )
        var av = new Array,
          sv = new Array;
        // console.log(outputSrc)
        $(this).find('option:selected').each(function () {
          var ov = $(this).attr(outputSrc),
            v = $(this).attr('value');
          sv.push(v);
          av.push(ov);
          sv = sv.filter(onlyUnique);
          av = av.filter(onlyUnique);
        });

        $(output).html('');
        for (k in av) {
          // console.log(outputTemplate, sv[k]);
          var d =
            (outputTemplate[0].replace('>', ' data-val="' + sv[k] + '">')) +
            av[k] +
            outputTemplate[1];

          $(output).attr('data-rel', '#' + $(el).attr('id'));
          $(output).append(d);
          $(output + ' > *').off('click.multiselector').on('click.multiselector', function () {
            $($(output).attr('data-rel'))[0].sumo.unSelectItem($(this).attr('data-val'));
            if ($.trim(act) !== '') {
              if (typeof act === "function") {
                act.apply();
              } else if (typeof act === "string") {
                var fnName = act.split('('),
                  fnparams = fnName[1].split(')')[0].split(','),
                  fn = window[fnName[0]];
                if (typeof fn === "function") { fn.apply(null, fnparams) };
              }
            }
          });
        }
      });
    }
  });
}; $(function () {
  $('[data-type="selector"]').multiselector({
    search: true,
    selectAll: true,
    captionFormat: '{0} selected',
    outputTemplate: "<span class='badge bg-info m-r-5 m-b-5'> {{$}} <i class='fa fa-times' {{$action=removeTag()}}></i> </span>",
    selectMsgAll: 'All selected'
  });
});

/**!
 * NitroDialog Javascript
 * @version 1.0.1
 * @author Ajith S Punalur
 * Licence: MIT
 * @date: 06-12-2018
 **/
var nmDialog = {
  init: function (ob) {
    if ($(ob).closest('.dialogBackdrop').length < 1) {
      $(ob).wrap('<div class="dialogBackdrop ">&nbsp;</div>');
    }
    // if (data.backdrop === true) {
    // }
    $(ob).trigger("nm.dialog.init", $(ob));
  },
  open: function (ob, data) {
    $(ob).trigger("nm.dialog.opening", $(ob));
    $(ob).addClass(data.class);
    $(ob).find('.dialog-message').html(data.message);
    $(ob).find('.dialog-footer').find('button').remove();
    $(ob).find('.dialog-footer').html('');
    if ($(data.buttons).length <= 0) {
      $(ob).find('.dialog-footer').hide();
    } else {
      $(ob).find('.dialog-footer').show();
    }
    var uid = '' + new Date().getTime() + getRandomStr();
    $(data.buttons).each(function (i, button) {
      var btn = $('<button/>');
      button.class = (button.class === undefined) ? 'btn btn-mtl ' : 'btn btn-mtl ' + button.class;
      if (uid === new Date().getTime()) {
        uid = '' + uid + getRandomStr();
      } else {
        uid = '' + new Date().getTime() + getRandomStr();
      }
      uid = uid + getRandomStr();
      $(btn).attr('id', 'dialogBtn-' + uid).addClass(button.class).html(button.label);
      $(ob).find('.dialog-footer').append(btn);

      $(ob).find('#dialogBtn-' + uid).off('click.nm.dialog.button_i').on('click.nm.dialog.button_i', function () {
        if (button.action !== undefined && typeof button.action === "string") {
          // console.log(button.action);
          var fnName = button.action.split('('),
            fnparams = fnName[1].split(')')[0].split(','),
            fn = window[fnName[0]];
          if (typeof fn === "function") fn.apply(null, fnparams);
        } else if (typeof button.action === "function") {
          button.action.apply(null, fnparams)
        } else {
          console.error("Undefined Error , %o", button.action);
        }
      });

      if (button.focus === true) {
        // console.log('focus', btn);
        setTimeout(function () {
          $('#dialogBtn-' + uid).focus();
        }, 5);
      }
    });

    var bd = $(ob).closest('.dialogBackdrop');

    if (data.keyboard === true) {
      $(document).off('keydown.nm.dialog.keyboard').on('keydown.nm.dialog.keyboard', function (e) {
        if (e.keyCode === kb.ESC) {
          nmDialog.close(ob, data);
        }
      });
    }
    if (bd.length > 0) {
      if (data.dismissible === true) {
        $(bd).off('click.nm.dialog.overlay').on('click.nm.dialog.overlay', function (e) {
          if ($(e.target).is('.dialogBackdrop')) {
            nmDialog.close(ob, data);
          }
        });
      } else {
        $(bd).off('click.nm.dialog.overlay');
      }
    }

    if (data.backdrop === true) {
      $(bd).addClass('active');
    } else {
      $(bd).addClass('transparent');
    }
    $(ob).css({
      "width": data.width,
      "height": data.height
    }).addClass('open').attr('open', 'true');
    $(ob).trigger("nm.dialog.opened", $(ob));
  },
  close: function (ob, data) {
    $(ob).trigger("nm.dialog.closing", $(ob));
    $(ob).removeClass('open ' + data.class);
    $(ob).removeAttr('open');
    if (data.backdrop === true) {
      $(ob).closest('.dialogBackdrop').removeClass('active');
    } else {
      $(ob).closest('.dialogBackdrop').removeClass('transparent');
    }
    $(ob).removeAttr('class').addClass('dialog');
    $(ob).closest('.dialogBackdrop').off('click.nm.dialog.overlay');
    $(ob).trigger("nm.dialog.closed", $(ob));
  },
  refresh: function (ob) {
    $(ob).trigger("nm.dialog.refresh", $(ob));
  }
}; $(window).resize(function () {
  nmDialog.refresh('.dialog');
});

(function ($) {
  /**!
  * @name NitroMaterial
  * @version 1.0.b
  * @author Ajith S Punalur
  * @license MIT
  */
  $.fn.setVal = function (v) {
    var p = $(this).val(),
      c = Array.prototype.slice.call(arguments, 1);
    $(this).val(v).change();
    if (c.length !== undefined && c.length > 0 && typeof c === "function") {
      c(p, v);
    }
    return this;
  };
  $.fn.getVal = function () {
    return $(this).val();
  };

  $.fn.NitroMtl = function (opt) {
    var State;
    (function (State) {
      State[State["Error"] = 0] = "Error";
      State[State["Success"] = 1] = "Success";
      State[State["Warning"] = 2] = "Warning";
      State[State["Default"] = 3] = "Default";
    })(State || (State = {}));;
    var o = {
      val: $(this).val(),
      message: {
        type: "",
        text: ""
      }
    };
    $.extend(o, opt);
    o.message.type = o.message.type.toCapitalCase();
    for (key in o) {
      if (typeof o[key] === 'object') {
        if (key === 'message') {
          $(this).closest('.mtl').removeClass('onError onSuccess onWarning');
          if (o[key]['type'] !== "Default" || o[key]['type'] !== "") {
            $(this).closest('.mtl').addClass('hasMessage on' + o[key]['type']);
            $(this).next('label').find('small').html(o[key]['text']);
          } else {
            $(this).closest('.mtl').removeClass('hasMessage onError onSuccess onWarning');
          }
        }
      } else {
        if (o.hasOwnProperty('attr')) {
          if ($(this).length > 0) {
            if ($(o[key]).is('input:checkbox') || $(o[key]).is('input:radio')) {
              $(this)[0].checked = true;
            } else if ($(o[key]).is('[data-range-slider]')) {
              $(o[key]).slider('value', o['attr']);
            } else {
              $(this).attr(o['attr']);
            }
          }
        }
        if (o.hasOwnProperty('removeAttr')) {
          $(this).removeAttr(o['removeAttr']);
        }
        if (o.hasOwnProperty('removeClass')) {
          $(this).removeClass(o['removeClass']);
        } else if (o.hasOwnProperty('class')) {
          $(this).addClass(o['class']);
        } else if (o.hasOwnProperty('val')) {
          $(this).val(o['val']).change();
        } else if (o.hasOwnProperty('text')) {
          if ($(this).length > 0) {
            $(this).text(o['text']);
          }
        } else if (o.hasOwnProperty('template')) {
          if ($(this).length > 0) {
            $(this).html(o['template']);
          }
        }
      }
    }
    $(this).NitroMaterial({});
  };

  $.fn.NitroMaterial = function (custom) {
    var ob = this,
      op = {
        "class": "",
        "message": ""
      },
      mtlClass = 'mtl';

    custom.floatingLabel = (custom.floatingLabel === undefined) ? true : custom.floatingLabel;
    custom.placeholderLabel = (custom.placeholderLabel === undefined) ? true : custom.placeholderLabel;
    custom.validatorMessage = (custom.validatorMessage === undefined) ? false : custom.validatorMessage;
    custom.validation = (custom.validation === undefined || getBoolean(custom.validation) === false) ? ["", "*"] : custom.validation;
    // custom.validatorMessage = (custom.validatorMessage === undefined) ? false : custom.validatorMessage;

    this.each(function (i, el) {
      var mtlWrap = $(el).parents('.' + mtlClass).length,
        mtl = $(el).parent('.' + mtlClass),
        ds = $(el).data(),
        attr = el.attributes;
      if (isElemSupportsAttr(el.tagName, "id")) {
        (attr.id === undefined) ? el.setAttribute('id', 'mtl-ctrl_' + new Date().getTime()) : attr["id"];
        attr = el.attributes;
      } else {
        attr["id"] = (attr.id === undefined) ? document.createAttribute('id') : attr["id"];
        attr["id"].value = (attr.id.value === '') ? ('mtl-ctrl_' + new Date().getTime()) : attr["id"].value;
      }

      ds.floatingLabel = (ds.floatingLabel === undefined) ? custom.floatingLabel : getBoolean(ds.floatingLabel);
      ds.placeholderLabel = (ds.placeholderLabel === undefined) ? custom.placeholderLabel : getBoolean(ds.placeholderLabel);
      ds.validatorMessage = (ds.validatorMessage === undefined) ? custom.validatorMessage : getBoolean(ds.validatorMessage);
      ds.validation = (ds.validation === undefined || ds.validation !== "mandatory") ? custom.validation : ds.validation;

      if (ds.validation === undefined) {
        ds.validation = custom.validation;
      } else if (typeof ds.validation !== 'object') {
        ds.validation = ds.validation.split('|');
      }

      opt = {
        width: ds.width || '100%',
        validation: ds.validation,
        class: ds.class || custom.class,
        label: ds.label || custom.label,
        floatingLabel: ds.floatingLabel,
        validatorMessage: ds.validatorMessage,
        message: ds.message || custom.message,
        placeholderLabel: ds.placeholderLabel,
        placeholder: ds.placeholder || custom.placeholder,
        type: ds.type || $(el).attr('type') || $(el).prop("tagName").toLowerCase()
      };

      opt.class = (opt.class === undefined) ? '' : opt.class;
      $.extend(op, opt);

      if (ds.validatorMessage === false) {
        opt.class = opt.class + " mtl-no-message";
      }

      // init
      if (mtlWrap === 0) {
        $(el).wrap("<div class='" + mtlClass + " " + opt.class + "'></div>");
      } else if (mtlWrap > 1) {
        while (mtlWrap > 1) {
          $($(el).parents('.' + mtlClass)[mtlWrap - 1]).removeClass(mtlClass);
          mtlWrap = $(el).parents('.' + mtlClass).length;
        }
      }

      $(el).closest('.' + mtlClass).addClass(opt.class);

      if ($(el).is(':disabled')) {
        $(el).closest('.' + mtlClass).addClass('disabled');
      }

      // Type of Control
      $(el).parent('.' + mtlClass).addClass(mtlClass + '-' + op.type).attr('data-type', op.type);

      if (getBoolean(op.placeholderLabel) === true && $(el).parent('.' + mtlClass).length === 1) {
        var lbl = $(el).attr('data-placeholder') || $(el).attr('data-label') || $(el).attr('placeholder') || '';
        if (
          lbl !== undefined &&
          $(el).parent('.' + mtlClass).find('.mtl-label').length <= 0
        ) {
          if ($.trim(op.validation[0]) !== '') {
            lbl = lbl + "<i>" + op.validation[1] + "</i>";
          }
          $(el).parent('.' + mtlClass).append
            ('<label class="mtl-label" for="' + attr["id"].value + '">' + lbl + '<small>' + op.message + '</small></label>');
          $(el).removeAttr('placeholder').removeAttr('data-label');
        }
      } else if (
        getBoolean(op.placeholderLabel) === false &&
        $(el).parent('.' + mtlClass).length === 1
      ) {
        $(el).parent('.' + mtlClass).addClass(mtlClass + '-no-label');
        var lbl = $(el).attr('data-placeholder') || $(el).attr('data-label') || $(el).attr('placeholder') || '';
        if (
          lbl !== undefined &&
          $(el).parent('.' + mtlClass).find('.mtl-label').length <= 0
        ) {
          $(el).parent('.' + mtlClass).append('<label class="mtl-label" for="' + attr["id"].value + '"><small>' + op.message + '</small></label>');
        }
      }

      // if (op.placeholder !== '' && op.placeholder !== undefined) {
      // }

      if (getBoolean(op.floatingLabel) === true && getBoolean(op.placeholderLabel) === true) {
        $(el).parent('.' + mtlClass).addClass(mtlClass + '-floatingLabel');
      } else {
        $(el).parent('.' + mtlClass).removeClass(mtlClass + '-floatingLabel');
      }

      // switch ($(el).parent('.' + mtlClass).attr('data-type')) {
      // 	case 'search':
      // 		//$(el).parent('.' + mtlClass).append('<a href="javascript:;" class="btn"><i class="fa fa-search"></i></a>');
      // 		break;
      // 	// default:
      // 	// break;
      // }

      $(el).off('focus.material').on('focus.material',
        function () {
          $(this).closest('.' + mtlClass).addClass('focus');
        });
      $(el)
        .off('change.material input.material click.material blur.material propertychange.material paste.material')
        .on('change.material input.material click.material blur.material propertychange.material paste.material',
          function () {
            if ($.trim($(this).val()) === '') {
              $(this).parent('.' + mtlClass).removeClass('hasValue');
            } else {
              $(this).parent('.' + mtlClass).addClass('hasValue');
            }
          });

      $(el).off('blur.material').on('blur.material', function () {
        $(this).parent('.' + mtlClass).removeClass('focus');
      });

      if ($(el).val() !== '') {
        $(el).parent('.' + mtlClass).addClass('hasValue');
      }
      // $(el).click();
    });
    return this;
  };

  /**!
   * @name NitroToast
   * @version 1.0.b
   * @author Ajith S Punalur
   * @license MIT
   * */
  $.fn.NitroToast = function (data) {
    var sbClass = "snackbar",
      ob = $(this),
      sbTimer = setTimeout(function () { }, 0);
    clearTimeout(sbTimer);

    $.extend(data, {
      class: data.class || "",
      message: data.message || "",
      actionText: data.actionText || "OK",
      position: data.position || "bottom",
      actionHandler: data.actionHandler || void (0),
      afterTimeOut: data.afterTimeOut || void (0)
    });

    $(ob).addClass(data.class);

    if ($('.snackbar.active').length > 0) {
      $('.snackbar').removeClass('active');
    }
    $(ob).attr('data-placement', data.position);
    $(ob).find('.' + sbClass + '-text').html(data.message);
    $(ob).find('.' + sbClass + '-action').html(data.actionText);
    setTimeout(function () {
      $(ob).addClass('active');
    }, 300);
    sbTimer = setTimeout(function () {
      setTimeout(data.afterTimeOut, 0);
      $(ob).removeClass('active ' + data.class);
      $(ob).find('.' + sbClass + '-text').html('');
      $(ob).find('.' + sbClass + '-action').html('');
      var sbEvent = $.Event('snackbar.closed');
      $(ob).trigger(sbEvent, [$(ob)]);
    }, data.timeout);

    $('.' + sbClass + '-action').off('click.snackbar').on('click.snackbar', function () {
      // console.log(sbTimer);
      clearTimeout(sbTimer);
      $(this).parent('.' + sbClass).removeClass('active ' + data.class);
      $(this).parent('.' + sbClass).find('.' + sbClass + '-text').html('');
      $(this).parent('.' + sbClass).find('.' + sbClass + '-action').html('');
      setTimeout(data.actionHandler, 0);
    });
    return this;
  };

  /**!
   * @name NitroDialog - Plugin
   * @version 1.0.b
   * @author Ajith S Punalur
   * @license MIT
  **/
  $.fn.NitroDialog = function (data) {
    var dClass = "dialog";
    this.each(function (i, ob) {
      var ds = $(ob).data();
      if (data.action === 'init') {
        data.backdrop = (data.backdrop === undefined) ? false : getBoolean(data.backdrop);
        ds.backdrop = (ds.backdrop === undefined) ? data.backdrop : getBoolean(ds.backdrop);
      } else {
        ds.backdrop = (ds.backdrop === undefined) ? false : getBoolean(ds.backdrop);
        data.backdrop = (data.backdrop === undefined) ? ds.backdrop : getBoolean(data.backdrop);
        ds.backdrop = data.backdrop;
      }

      ds.dismissible = (ds.dismissible === undefined) ? false : getBoolean(ds.dismissible);
      data.dismissible = (data.dismissible === undefined) ? ds.dismissible : getBoolean(data.dismissible);
      ds.dismissible = data.dismissible;

      ds.keyboard = (ds.keyboard === undefined) ? false : getBoolean(ds.keyboard);
      data.keyboard = (data.keyboard === undefined) ? ds.keyboard : getBoolean(data.keyboard);
      ds.keyboard = data.keyboard;

      if (ds.buttons !== undefined && typeof (ds.buttons) === "string") {
        ds.buttons = JSON.parse(ds.buttons.replace(/'/g, '"'));
      } else {
        ds.buttons = undefined;
      }
      data = {
        action: ds.action || data.action || 'init',
        class: ds.class || data.class || dClass,
        width: ds.width || data.width || 'auto',
        height: ds.height || data.height || 'auto',
        message: ds.message || data.message || '',
        backdrop: ds.backdrop,
        dismissible: ds.dismissible,
        keyboard: ds.keyboard,
        buttons: ds.buttons || data.buttons || [{
          class: 'R',
          label: 'ok',
          action: function () { nmDialog.close(ob, {}); }
        }]
      }

      if (data.action === 'init') {
        nmDialog.init(ob);
      }
      if (data.action === 'open') {
        nmDialog.open(ob, data);
      }
      if (data.action === 'close') {
        nmDialog.close(ob, data);
      }
    });
  };
}(jQuery));

(function ($) {
  /**!
  * @name NitroStepper
  * @version 1.0.0
  * @author Ajith S Punalur
  * @license MIT
  * @date 08/10/2020 (dd/mm/yyyy)
  */

  $.fn.NitroStepper = function (data) {
    this.each(function (i, ob) {
      var ds = $(ob).data();
      var active = $('.tab-pane.active');

      data.basePath = ds.basePath || data.basePath || './forms';
      data.dev = data.dev ? data.dev : false;
      // console.log(ds, data);

      // INIT
      data.id = $(active).attr('id');
      nsLoadStep(ob, data);

      $(ob).find('[data-template]').off('show.bs.tab.stepper').on('show.bs.tab.stepper', function (e) {
        data.id = $(e.target).attr('href').split('#')[1];
        data.event = e;
        // console.log(data.id, e.relatedTarget);
        if (nsValidate('#' + $(e.relatedTarget).attr('href').split('#')[1])) {
          nsLoadStep(ob, data);
        } else {
          e.preventDefault();
          // $(e.relatedTarget).tab('show');
        }
      });

      // private Methods
      function nsLoadStep(ob, data) {
        $('.tab-content').addClass('onLoading');
        var url = $('[href="#' + data.id + '"]').attr('data-template');
        // console.log(data.id, url, ob);
        if (!$(ob).find('#' + data.id).is('.loaded')) {
          $(ob).find('#' + data.id).load(data.basePath + '/' + url, function (html, response) {
            // console.log(html);
            // console.log(data.basePath + '/' + url);
            if (response !== 'success') {
              console.warn(response);
              if (dev) {
                if (html === undefined) {
                  console.info('Hi DEV!,\nPlease check the template URL is valid or not!!\n\t' + data.basePath + '/' + url);
                }
              }
              $('#dialog').NitroDialog({
                action: "open",
                width: '320px',
                height: 'auto',
                class: "thanksDialog",
                message: '<h2 class="h4 f-heavy p-b-10 m-b-15">'
                  + '<i class="i i-warning text-warning m-r-10"></i>'
                  + 'Something went wrong!!'
                  + '</h2>'
                  + '<div class="dtl">'
                  + 'Please try again later!'
                  + '</div>',
                backdrop: true,
                keyboard: true,
                dismissible: true,
                buttons: [
                  {
                    class: 'btn-accent',
                    label: 'OK',
                    action: function () {
                      console.log('Choosen OK');
                      $('#dialog').NitroDialog({ action: 'close' });
                    }
                  }
                ]
              });
              $(data.event.relatedTarget).tab('show');
            }
            nsNavInit();
            $(ob).find('#' + data.id).addClass('loaded');
            $('.tab-content').removeClass('onLoading');
          });
        } else {
          // console.log('form cache');
        }
      }

      function nsNavInit() {
        $(ob).find('[data-nav]').off('click.navigate').on('click.navigate', function () {
          var nav = $(this).attr('data-nav');
          if (nsValidate($(this).closest('.nitroStep'))) {
            $(ob).find('[href="#' + nav + '"]').tab('show');
          }
        });

        $(ob).find('.form-control').off('input.fc blur.fc').on('input.fc blur.fc', function (e) {
          isValid(this);
        });

        $(ob).find('select').off('change.fc blur.fc').on('change.fc blur.fc', function (e) {
          isValid(this);
        });

        function isValid(el) {
          if ($(el).is(':invalid')) {
            $(el).closest('.form-group').addClass('is-invalid');
          } else {
            $(el).closest('.form-group').removeClass('is-invalid');
          }
        }
      }

      function nsValidate(nav) {
        console.log(nav);
        if ($(nav).find(':invalid').length <= 0) {
          console.log('PASSPORT'); // $(ob).find('[href="#' + nav + '"]'));
          return true;
        } else {
          // console.log($(nav).find('form :invalid')[0]);
          $(nav).find('.form-group').removeClass('is-invalid');

          $(nav).find('form :invalid').each(function (i, el) {
            $(el).closest('.form-group').addClass('is-invalid');
          });
          $($(nav).find('form :invalid')[0]).trigger('focus');
          console.log('BLOCK');
          return false;
        }
      }
    });
  };
}(jQuery));

/**!
 * formControls
 * @author Ajith S Punalur
 * @version 1.0.1
 * @date 07-02-2019
**/
var formControls = {
  init: function () {
    $("label.checkbox > input, label.radio > input").off('focus.input.global').on('focus.input.global', function () {
      var it = $(this).attr('type') || "text";
      // console.log("focus", it);
      $(this).closest('label.' + it).addClass('focus');
    });
    $("label.checkbox > input, label.radio > input").off('focusout.input.global').on('focusout.input.global', function () {
      var it = $(this).attr('type') || "text";
      // console.log("focusout", it);
      $(this).closest('label.' + it).removeClass('focus');
    });
    $("label.checkbox > input, label.radio > input").each(function (i, el) {
      $('label.checkbox, label.radio').removeClass('focus');
      if ($(el).is(':checked')) {
        var n = $(this).attr("name") || "";
        if ($(el).is(':radio')) {
          $("input[type='radio'][name='" + n + "']").each(function (i, inpEl) {
            $(inpEl).closest('label.radio').removeClass('checked');
          });
          ($(this).is(':checked')) ? $(this).closest('label.radio').addClass('checked') : $(this).closest('label.radio').removeClass('checked');
          return;
        }
        else if ($(this).is('checkbox')) {
          ($(this).find('input[type=checkbox]').is(':checked')) ? $(this).addClass('checked') : $(this).removeClass('checked');
        }
      }
    });
    $('label.checkbox, label.radio, input:checkbox, input:radio').on('click change input', function () {
      $('label.checkbox, label.radio').removeClass('focus');
      if ($(this).is('label')) {
        $(this).find('input[type=checkbox]').focus();
        if ($(this).find('input[type=checkbox]').length > 0) {
          // console.log($(this).find('input[type=checkbox]').prop('checked'));
          ($(this).find('input[type=checkbox]').is(':checked')) ? $(this).addClass('checked') : $(this).removeClass('checked');
          $(this).trigger('focus');
          return;
        }
        if ($(this).find('input:radio').length > 0) {
          $(this).find('input[type=radio]').focus();
          ($(this).find('input:radio:checked')) ? $(this).addClass('checked') : $(this).removeClass('checked');
          $(this).trigger('focus');
        }
      }
      if ($(this).is('input')) {
        var n = $(this).attr("name");
        $(this).trigger('focus');
        if ($(this).closest('label.checkbox').length > 0) {
          // console.log($(this).find('input[type=checkbox]').prop('checked'));
          ($(this).is(':checked')) ? $(this).closest('label.checkbox').addClass('checked') : $(this).closest('label.checkbox').removeClass('checked');
          return;
        }
        if ($(this).closest('label.radio').length > 0) {
          // console.log($(this).find('input[type=radio]').prop('checked'));
          $("input[type='radio'][name='" + n + "']").each(function (i, el) {
            $(el).closest('label.radio').removeClass('checked');
          });
          ($(this).is(':checked')) ? $(this).closest('label.radio').addClass('checked') : $(this).closest('label.radio').removeClass('checked');
          return;
        }
      }
    });
  },
  set: function (ob, v) {
    if ($(ob).is('[type=checkbox]') || $(ob).is('[type=radio]')) {
      var s = getBoolean(v),
        type = $(ob).attr('type');
      if (s) {
        $(ob).closest('.' + type).addClass('checked');
      } else {
        $(ob).closest('.' + type).removeClass('checked');
      }
      $(ob).prop('checked', s);
    } else {
      $(ob).val(v);
    }
  }
};

$(function () {
  formControls.init();
  /*Table Sorter*/
  $('[aria-table-sort="true"]').each(function (i, el) {
    $(el).tablesorter({
      textExtraction: function (node) {
        // iterates all childs elements inside td and return data from the last child
        if (node === null) { return null; }
        node = $(node);
        while (node.children().length > 0) { node = node.children(":first"); }
        if (node[0].tagName.toUpperCase() === "INPUT") {
          if (node.attr("type").toUpperCase() === "CHECKBOX") {
            return node.attr("checked").toString();
          } else {
            return $.trim(node.val());
          }
        } else {
          return $.trim(node.text());
        }
      },
      headers: {
        // disable sorting of the first & second column - before we would have to had made two entries
        // note that "first-name" is a class on the span INSIDE the first column th cell
        '.disabled': {
          // disable it by setting the property sorter to false
          sorter: false
        }
      }
    });
  });

  $('[data-control="material"]').NitroMaterial({
    floatingLabel: true,
    placeholderLabel: true
  });

  $('[data-control="dialog"]').NitroDialog({
    backdrop: true
  });
});

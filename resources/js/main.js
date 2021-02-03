/*!
 * Author: Infospica, http://www.infospica.com/
 * Copyright @ 2020 Infospica Consultancy Services
 */

var THEME = {
  color: "#AA1B20"
}, dev = true;

var aniGroup = "bounceIn bounceInDown bounceInLeft bounceInRight bounceInUp fadeIn fadeInDown fadeInDownBig fadeInLeft fadeInLeftBig fadeInRight fadeInRightBig fadeInUp fadeInUpBig flip flipInX flipInY lightSpeedIn rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight slideInUp slideInDown slideInLeft slideInRight zoomIn zoomInDown zoomInLeft zoomInRight zoomInUp hinge jackInTheBox rollIn bounceOut bounceOutDown bounceOutLeft bounceOutRight bounceOutUp fadeOut fadeOutDown fadeOutDownBig fadeOutLeft fadeOutLeftBig fadeOutRight fadeOutRightBig fadeOutUp fadeOutUpBig flipOutX flipOutY lightSpeedOut rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight slideOutUp slideOutDown slideOutLeft slideOutRight zoomOut zoomOutDown zoomOutLeft zoomOutRight zoomOutUp rollOut bounce flash pulse rubberBand shake swing tada wobble jello";

var animationstart = "webkitAnimationStart oAnimationStart MSAnimationStart animationstart",
  animationend = "webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend",
  transitionend = "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend";

var themeManager = function (color) {
  // console.log(name);
  color = color || THEME.color;
  $('meta[name="theme-color"]').attr('content', color);
  $('meta[name="msapplication-navbutton-color"]').attr('content', color);
  $('meta[name="apple-mobile-web-app-status-bar-style"]').attr('content', color);
};

$(function () {
  "use strict";
  themeManager();
  page.init();
  page.refresh();

  $('[data-rel="tooltip"]').tooltip();

  // Remove links that don't actually link to anything
  $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').not('[data-toggle]').click(function (event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      var ob = this;
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function () {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) {
            // Checking if the target was focused
            $('.sideMenu .active').removeClass('active');
            if ($(ob).closest('.sideMenu').length > 0) {
              $(ob).closest('li').addClass('active');
            }
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
            $('.sideMenu .active').removeClass('active');
            if ($(ob).closest('.sideMenu').length > 0) {
              $(ob).closest('li').addClass('active');
            }
          };
        });
      }
    }
  });

  $('.scrollTop').on('click.scrolltop', function () {
    $('html, body').animate({
      scrollTop: 0
    }, 1000);
	});
	
	$('#btn-logout').on('click', function(e){
		e.preventDefault();
		$('#dialog').NitroDialog({
			action: "open",
			backdrop: true,
			message: '<h4 class="bold m-b-15"><i class="i i-warning text-warning m-r-10"></i>Confirm</h4><p>Do you want to Sign out?</p>',
			buttons: [
				{
					label: 'Proceed',
					class: "btn btn-primary mr-1",
					action: function () {
						window.location = $('#btn-logout').attr('href');
					}
				},
				{
					label: 'Cancel',
					class: "btn btn-secondary",
					action: function () {
						$('#dialog').NitroDialog({ action: "close" });
					}
				}
			]
		});
	});
});

$(window).on('resize', function () {
  "use strict";
  page.getRatio();
  page.refresh();
});

$(window).on('scroll', function () {
  "use strict";
});

var w, h;
var cRefresh = false;

var page = {
  width: w,
  height: h,
  init: function () {
    page.getRatio();
  },
  refresh: function () {
    "use strict";
    carousel.init();
    formControls.init();

    page.reInitLayout();
  },
  getRatio: function () {
    "use strict";
    w = $(window).width();
    h = $(window).height();
    this.width = w;
    this.height = h;
  },
  // reset: function () {
  //     var tab = getParameterByName('view');
  //     if (tab) {
  //         $('a[href="#' + tab + '"]').tab('show');
  //     }
  // },
  reInitLayout: function () {
    "use strict";
    page.getRatio();

    var hh = $('header.header').outerHeight(true),
      fh = $('footer.footer').outerHeight(true);

    hh = hh || 0;
    fh = fh || 0;

    $('main, .conArea, .sideBar').css('min-height', h - (hh + fh));
    if (w < 768) {
      $('.sideBar').css('min-height', '');
    }
  },
  loader: function (op) {
    op = (op === undefined) ? true : op;
    if (op) {
      $('body').addClass('onLoading');
    } else {
      $('body').removeClass('onLoading');
    }
  }
};

function buildChooserList(list, opt) {
  $.extend(opt, {
    type: opt.type || 'radio',
    label: opt.label || 'label',
    secLabel: opt.secLabel || '',
    idPrefix: opt.idPrefix || 'pre_',
    customClass: opt.customClass || '',
    name: opt.name || 'name_buildChooserList'
  });
  var html = '';
  var uid = getRandomStr(4);
  list.forEach(function (el, i) {
    uid = getRandomStr(4);
    if (opt.secLabel !== '') {
      html += '\
      <li>\
          <input type="'+ opt.type + '" name="' + opt.name + '" id="' + opt.idPrefix + uid + i + '" class="custom ' + opt.customClass + '">\
          <label class="w-120px" for="'+ opt.idPrefix + uid + i + '">' + el[opt.label] + '</label>\
          <label class="m-b-0" for="'+ opt.idPrefix + uid + i + '">' + el[opt.secLabel] + '</label>\
      </li>';
    } else {
      html += '\
      <li>\
          <input type="'+ opt.type + '" name="' + opt.name + '" id="' + opt.idPrefix + uid + i + '" class="custom ' + opt.customClass + '">\
          <label for="'+ opt.idPrefix + uid + i + '">' + el[opt.label] + '</label>\
      </li>';
    }
  });

  return $.parseHTML(html);
}

$(document).ajaxStart(function () {
  //page.loader(true);
});

$(document).ajaxStop(function () {
	setTimeout(function() {
		page.loader(false);
	}, 2000);
});

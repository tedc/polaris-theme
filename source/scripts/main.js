/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  function scrollTo(val) {
    var scrollController = new ScrollMagic.Controller();
    scrollController.scrollTo(function (val) {
      var newPos = val - $('.banner').outerHeight(true);
      TweenMax.to(window, 0.5, {scrollTo: {y: newPos}});
    });
    scrollController.scrollTo(val);
  }
  function customSlick(c) {
    $('.'+c+'__for').slick(
        {
          slidesToShow: 1,
          dots:true,
          appendDots:$('.'+c+'__nav'),
          fade: true,
          prevArrow: '.'+c+' .arrows__prev',
          nextArrow: '.'+c+' .arrows__next',
          swipe: false,
          customPaging: function(slider,i){
            var title = $(slider.$slides[i]).attr("data-title");
            return '<h4 class=\"'+c+'__title '+c+'__title--upper\"><span>'+title+'</span></h4>';
          }
        }
    );
  }

  var MenuTL = new TimelineMax({
    pause: true
  });
  MenuTL.paused(true);
  MenuTL
    .to('.banner__nav', .25, {y : '0%', autoAlpha : true})
    .add([TweenMax.staggerTo('.menu--pages .menu__item', .25, {y: '0%', opacity: 1}, .05), TweenMax.staggerTo('.menu--linee .menu__item', .25, {y: '0%', opacity: 1}, .075)], '-=.125');
  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        $('[data-open]').each(function() {
          $(this).on('click', function() {
            var opts = JSON.parse($(this).attr('data-open'));
            $(opts.el).toggleClass(opts.class);
            if(opts.el == '#banner') {
              if($(opts.el).hasClass(opts.class)) {
                MenuTL.play();
              } else {
                MenuTL.reverse();
              }
            }
          });
        });
        $('[data-slick]').slick();
        $('[data-ps]').perfectScrollbar();
        $('[data-scroll-to]').each(function() {
          $(this).on('click', function() {
            var id = $(this).attr('data-scroll-to');
            scrollTo(id);
          })
        });
        $.each(['custom', 'story'], function(i, e) {
          customSlick(e);
        });
        $('.hcd__slider').slick({
          slidesToShow: 1,
          dots:false,
          fade: true,
          prevArrow: '.hcd .arrows__prev',
          nextArrow: '.hcd .arrows__next'
        })
        .on('afterChange', function(event, slick, currentSlide) {
            $('.hcd__group--active').removeClass('hcd__group--active');
            $('.hcd__group[data-element="'+currentSlide+'"]').addClass('hcd__group--active');
          });
        setTimeout(function() {
          $('.hcd__group').each(function() {
              $(this).on('click', function() {
                var i = $(this).attr('data-element');
                console.log(parseInt(i));
                $('.hcd__slider').slick('slickGoTo', parseInt(i), false);
              });
            });
        }, 20)
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    'store' : {
      init: function() {
        $('#wpsl-stores').perfectScrollbar();
        var qs = window.location.href;
        if(qs.indexOf('?') !== -1) {
          qs = qs.split('?');
          qs = qs[1].split('=');
          $('[name="'+qs[0]+'"]').val(decodeURIComponent(qs[1]));
          setTimeout(function() {
            $('#wpsl-search-btn').trigger('click');
          }, 200)
        }
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    'blog': {
      init: function() {
        $('.cff-wrapper').perfectScrollbar();
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

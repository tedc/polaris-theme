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
    $('.'+c+'__for')
      .on('init', function(event, slick) {
        $(slick.$slider).find('.'+c+'__carousel').slick('slickGoTo', 1, false);
      })
      .on('afterChange', function(event, slick, currentSlide) {
        $(slick.$slider).find('.'+c+'__carousel').slick('slickGoTo', 1, false);
      })
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

  function startScroll() {
    if($(window).scrollTop() < $('#down').offset().top) {
      scrollTo('#down');
    }
  }

  var MenuTL = new TimelineMax({
    pause: true,
    onStart : function() {
       $('[data-ps]').perfectScrollbar('update');
    },
    onComplete : function() {
       $('[data-ps]').perfectScrollbar('update');
    }
  });
  MenuTL.paused(true);
  MenuTL
    .fromTo('.banner__nav', .25, {y : '-100%'}, {y : '0%'})
    .staggerFromTo('.menu--pages .menu__item', .25, {y : '100%'}, {y: '0%', opacity: 1}, .05, '-=.125')
    .staggerFromTo('.menu--linee .menu__item', .25, {y : '100%'}, {y: '0%', opacity: 1}, .075, '-=.275');
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
        setTimeout(startScroll, 3000);
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
            var transformOrigin = ($('.hcd__group[data-element="'+currentSlide+'"]').hasClass('hcd__group--top')) ? '50% 0%' : '50% 100%';
            var y = ($('.hcd__group[data-element="'+currentSlide+'"]').hasClass('hcd__group--top')) ? 5 : -5;
            TweenMax.to('.hcd__group--active text', .25, {
              scale: 1
            })
            $('.hcd__group--active').removeClass('hcd__group--active');
            $('.hcd__group[data-element="'+currentSlide+'"]').addClass('hcd__group--active');
            TweenMax.to('.hcd__group--active text', .5, {
                scale: 1.3, 
                transformOrigin: transformOrigin,
                onComplete: function() {
                  // var Tl = new TimelineMax({
                  //   repeat: -1,
                  //   onRepeat: function() {
                  //     if(!$('.hcd__group[data-element="'+currentSlide+'"]').hasClass('hcd__group--active')) {
                  //       Tl
                  //         .pause()
                  //         .kill()
                  //     }
                  //   }
                  // })
                  // Tl.to('.hcd__group--active text', 2, {
                  //   y : y
                  // })
                  // .to('.hcd__group--active text', 2, {
                  //   x : -8
                  // })
                  // .to('.hcd__group--active text', 2, {
                  //   x : y + 2
                  // })
                  //  .to('.hcd__group--active text', 2, {
                  //   x : -4
                  // })
                  // .to('.hcd__group--active text', 2, {
                  //   x : y * -1
                  // })
                  // .to('.hcd__group--active text', 2, {
                  //   x : 3
                  // })
                  // .to('.hcd__group--active text', 2, {
                  //   x : 0,
                  //   y : 0
                  // });
                }
            });
          });
        setTimeout(function() {
          $('.hcd__group').each(function() {
              $(this).on('click', function() {
                var i = $(this).attr('data-element');
                $('.hcd__slider').slick('slickGoTo', parseInt(i), false);
              });
            });
        }, 20);
        $(window).on('wpcf7submit', function() {
          $('.wpcf7 .wpcf7__loader').addClass('wpcf7__loader--active');
        });
        $(window).on('wpcf7mailsent', function() {
          console.log('sent');

          if(window.ga) {
            ga('send', 'event', 'form contatti', 'submit');
          }
          setTimeout(function() {
            $('.wpcf7 .wpcf7__loader').removeClass('wpcf7__loader--active');
          }, 250);
        });
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
          $('[name="'+qs[0]+'"]').val(decodeURIComponent(qs[1])).trigger('change');
          setTimeout(function() {
            $('#wpsl-search-btn').trigger('click');
          }, 200)
        }
      }
    },
    'single_linee' : {
      init: function() {
        $('.custom__carousel').each(function() {
          var $this = $(this);
          $(this).on('beforeChange', function() {
            $this.addClass('custom__carousel--animated');
          })
          $(this).on('afterChange', function() {
            $this.removeClass('custom__carousel--animated');
          })
        });
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

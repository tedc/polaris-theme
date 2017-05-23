;(function($) {
    'use strict';

    var controller = null;

    $.fn.scrollmagic = function(options) {
        var scenes = [];
        this.each(function(i, element) {
            scenes = scenes.concat(createMultipleScenes(element, options));
        });
        return scenes.length == 1 ? scenes[0] : scenes;
    };

    $.scrollmagic = {
        getController: getController,
        destroyController: destroyController
    };

    function getController() {
        if (controller == null) {
            controller = new ScrollMagic.Controller();
        }
        return controller;
    }

    function destroyController(reset) {
        if (controller != null) {
            controller.destroy(reset);
            controller = null;
        }
    }

    function createMultipleScenes(element, jsOptions) {
        var $element = $(element),
            scenes = [],
            dataOptions = $element.data("scrollmagic");
        if (!Array.isArray(dataOptions)) {
            dataOptions = [dataOptions];
        }
        if (!Array.isArray(jsOptions)) {
            jsOptions = [jsOptions];
        }
        var length = Math.max(dataOptions.length, jsOptions.length);
        for (var i=0; i<length; i++) {
            var options = $.extend(dataOptions[i] || {}, jsOptions[i] || {});
            scenes.push(createSingleScene(element, options));
        }
        return scenes;
    }

    function createSingleScene(element, options) {
        if (options.dataElement) {
            var moreOptions = $(options.dataElement).data("scrollmagic");
            if (typeof moreOptions == "object") {
                options = $.extend(options, moreOptions);
            }
        }
        var scene = createScene(element, options);
        if (options.pin) {
            var pinEl = options.pin.element || element;
            scene.setPin(pinEl, options.pin);
        }
        if (options.tween) {
            var tweenEl = options.tween.element || element;
            if (options.tween.element){
                delete options.tween.element
            }
            if(Array.isArray(options.tween)) {
                var tween = TweenMax.fromTo(tweenEl, .5, options.tween[0], options.tween[1]);
                scene.setTween(tween);
            } else {
                var tween = TweenMax.to(tweenEl, .5, options.tween);
                scene.setTween(tween);
            }
        }
        if (options.class) {
            if (typeof options.class != "object") {
                options.class = {classes: options.class};
            }
            var classEl = options.class.element || element;
            scene.setClassToggle(classEl, options.class.classes, options.class.toggle);
        }
    }

    function createScene(element, options) {
        var triggerElement = options.triggerElement || element;
        if (typeof triggerElement == "function") {
            triggerElement = triggerElement.call(element);
        }

        if (typeof options.duration != "undefined") {
            options.duration = parseDuration(options.duration, triggerElement);
        }
        else {
            options.duration = function() {
                var $triggerElement = $(this.triggerElement());
                return (this.triggerPosition() + $triggerElement.outerHeight(true)) - this.scrollOffset();
            };
        }
        var scene = new ScrollMagic.Scene({
            triggerElement: triggerElement,
            triggerHook: options.triggerHook || 0,
            duration: options.duration
        });
        if (options.events) {
            addSceneEvents(scene, options.events);
        }
        if (options.addIndicators) {
            scene.addIndicators();
        }
        scene.addTo(options.controller || getController());
        return scene;
    }

    function parseDuration(val, triggerElement) {
        if (typeof(val) == "string") {
            if (val.match(/^(\.|\d)*\d+%$/)) {
                // override percentage to refer to triggerElement height
                var perc = parseFloat(val) / 100;
                val = function() {
                    return $(triggerElement).outerHeight(true) * perc;
                }
            }
            else if (val.match(/^(\.|\d)*\d+vh$/)) {
                // make use of default percentage implementation, which refers to controller height
                val = val.slice(0, -2) + "%";
            }
        }
        return val;
    }

    function addSceneEvents(scene, events) {
        for (var event in events) {
            scene.on(event, events[event]);
        }
    }

    $(function() {

        $("[data-scrollmagic]").scrollmagic();

    });

})(jQuery);
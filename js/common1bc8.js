/**
 * Force redraw
 */
$.fn.redraw = function () {
    if(this[0]) {
        var redraw = this[0].offsetHeight;
    }
    return this;
};


var $win = $(window);
var $doc = $(document);
var $html = $('html');
var $body = $('body');
var $htmlBody = $('html, body').removeClass('no-js');
var smState;
var smPage = {};
var $pageScriptsContainer;
$(function () {
    'use strict';
    var curPage;
    var $siteWrap = $('[data-site-wrap]');
    var $loader = $('[data-loader]');
    var $loaderContent = $('[data-loader-content]');
    $.fn.activate = function (options) {
        var $this = this;
        if (options && typeof options.onStart === 'function') {
            options.onStart.apply($this);
        }
        $this.removeClass('u-hidden').redraw();
        setTimeout(function () {
            $this.addClass('is-active');
        }, 1);
    };
    $.fn.deactivate = function () {
        var $this = this;
        if (UIkit.support.transition) {
            $this.one(UIkit.support.transition.end, function(){
                $this.addClass('u-hidden');
            }).removeClass('is-active');
        } else {
            $this.removeClass('is-active').addClass('u-hidden');
        }
    };

//    smState = $('#smoothState').smoothState({
//        prefetch: true,
//        prefetchOn: 'mousedown touchstart',
//        cacheLength: 5,
//        forms: 'form[data-sm-form]',
//        scroll: false,
//        blacklist: '.no-smoothState',
//        debug: true,
//        loadingClass: '',
//        onStart: {
//            duration: 200,
//            render: function ($container) {
//                // подчищаем за страницей
//                $doc.off('.smPage');
//                $win.off('.smPage');
//                curPage = smPage;
//                smPage = {};
//                if (curPage && typeof curPage.clearBinding === 'function') {
//                    curPage.clearBinding();
//                }
//                if (curPage && typeof curPage.smClose === 'function') {
//                    curPage.smClose(this.duration);
//                } else {
//                    $loader.activate({
//                        onStart: function () {
//                            this.css('width', $body.width());
//                        }
//                    });
//                    $loaderContent.activate();
//                    //$siteWrap.css('opacity', 0);
//                }
//                smState.loadCount++;
//            }
//        },
//        onProgress : {
//            duration: 0,
//            render: function ($container) {}
//        },
//        onReady : {
//            duration: 400,
//            render: function ($container, $newContent) {
//                setTimeout(function () {
//                    // закрываем все модальные окна
//                    $('[data-modal]').each(function () {
//                        var modalHideFunc = $(this).data('modal').hide;
//                        if (typeof modalHideFunc == 'function') {
//                            modalHideFunc(true, true);
//                        }
//                    });
//
//                    $htmlBody.scrollTop(0);
//
//                    // Заменяем содержимое
//                    $container.empty().append($newContent).redraw();
//
//                    // Замена en/ru значение в хедере
//                    $.each(smState.cache, function (key, value) {
//                        // кэш может содержать ключи с хостом и без, сначала отсеиваем другие хосты
//                        key = location.origin + key.replace(location.origin, key);
//                        if (location.href == key) {
//                            var $newDoc = $(value.doc);
//                            // Подстановка lang
//                            var lang = $newDoc.find('html').attr('lang');
//                            $html.attr('lang', lang);
//                            // Подстановка ссылок en/ru в шапку
//                            var $links = $newDoc.find('[data-lang-tile]');
//                            $langTile.html($links.html());
//                            // Кнопка открытия ЛК
//                            if ($newDoc.find('[data-authorized-marker]').hasClass('is-authorized')) {
//                                $('[data-open-cabinet-button]').addClass('is-authorized');
//                            } else {
//                                $('[data-open-cabinet-button]').removeClass('is-authorized');
//                            }
//                        }
//                    });
//                    setTimeout(function () {
//                        //$siteWrap.css('opacity', 1);
//                        $loaderContent.deactivate();
//                        $loader.deactivate();
//                    }, 300);
//                }, 200)
//
//            }
//        },
//        onAfter: function($container, $newContent) {
//            //workaround to fix window go down after scrollify page
//            $htmlBody.scrollTop(0);
//            documentReadyHandle();
//            curPage = null;
//            $doc.trigger('content:update');
//        }
//    }).data('smoothState');
//    smState.loadCount = 0;


    $('[data-sm-link]').on('mousedown touchstart', function () {
        var href = $(this).attr('href');
        smState.fetch(href);
    }).on('click', function(e){
        e.preventDefault();
        if (!$(this).is('.no-smoothState')) {
            var href = $(this).attr('href');
            smState.load(href);
        }
    });




    /**
     * Header book button shrink on scroll
     */
    var $header = $('[data-header]');
    $doc.on('scrolling.uk.document.headerShrink', checkHeaderShrink);
    /*$doc.on('showFirstModal.modal', function () {
     $doc.off('scrolling.uk.document.headerShrink');
     $doc.one('hideLastModal.modal', function () {
     $doc.on('scrolling.uk.document.headerShrink', checkHeaderShrink);
     })
     });*/
    function checkHeaderShrink(event, data) {
        if (data.y > 120 && data.dir.y === 1) {
            $header.addClass('header--shrink');
        } else if (data.y < 30 && data.dir.y === -1) {
            $header.removeClass('header--shrink');
        }
    }
    //initial
    if (window.pageYOffset > 0) {
        $header.addClass('header--shrink');
    } else {
        $header.removeClass('header--shrink');
    }


    /**
     * Modal
     * @param options
     */
        //@TODO баг двойного модала при закрытии
    var modalCount = 0;
    var modalScrollPos;
    var modalAnimating = false;
    $.fn.modal = function (options) {
        var defaultOptions = {
            beforeShow: function () {},
            beforeHide: function () {},
            afterShow: function () {},
            afterHide: function () {},
        };
        options = $.extend(defaultOptions, options);
        this.each(function () {
            var $modal = $(this);
            var modalName = $modal.attr('data-modal');
            var $modalTrigger = $('[data-modal-trigger="' + modalName + '"]');
            var $modalClose = $('[data-modal-close="' + modalName + '"]');
            var $currentTrigger;


            function _show() {
                if (modalAnimating) {
                    return;
                }
                modalCount++;
                if (modalCount === 1 && $.scrollify) {
                    $.scrollify.disable();
                }
                $modal.removeClass('u-hidden').css('overflow-y', 'scroll').redraw();
                setTimeout(function () {
                    // установка флага запущнной анимации, чтобы можно было игнорировать остальные действия с модалами
                    if (UIkit.support.transition) {
                        modalAnimating = true;
                        var timeOut = setTimeout(function () {
                            // иногда проявляется баг, с несрабатывающим transition.end событием
                            $modal.trigger(UIkit.support.transition.end);
                        }, 500);
                        $modal.one(UIkit.support.transition.end, function () {
                            clearTimeout(timeOut);
                            modalAnimating = false;
                            // калбэк
                            options.afterShow.apply($modal);
                            $modal.trigger('afterShow.modal');
                        });
                    }
                    // запуск анимации
                    $modal.addClass('is-active').focus().trigger('show.modal');
                    $modalTrigger.addClass('is-active');
                    // калбэк
                    options.beforeShow.apply($modal);
                    $modal.trigger('beforeShow.modal');
                    if (modalCount === 1) {
                        $doc.trigger('showFirstModal.modal');

                        // фиксация положения экрана
                        modalScrollPos = {x: window.pageXOffset, y: window.pageYOffset};
                        var scrollBarWidth =  window.innerWidth - $body.width();
                        $body.css({'width': window.innerWidth - scrollBarWidth, 'height': window.innerHeight, 'position': 'fixed'}).addClass('is-modal-opened');
                        $html.css('margin-top', modalScrollPos.y * -1);
                        // custom aquamarine code
                        $header.css('right', scrollBarWidth);
                    }
                }, 10);
            }

            /**
             * @param {boolean} [instant]
             * @param {boolean} [notScroll]
             * @private
             */
            function _hide(instant, notScroll) {
                if (modalAnimating) {
                    return;
                }
                modalCount--;
                if (UIkit.support.transition && !instant) {
                    modalAnimating = true;
                    var timeOut = setTimeout(function () {
                        // иногда проявляется баг, с несрабатывающим transition.end событием
                        $modal.trigger(UIkit.support.transition.end);
                    }, 500);
                    $modal.one(UIkit.support.transition.end, function(){
                        clearTimeout(timeOut);
                        afterHideAnimation();
                        modalAnimating = false;
                    }).removeClass('is-active');
                } else {
                    $modal.removeClass('is-active');
                    afterHideAnimation();
                }
                // калбэк
                options.beforeHide.apply($modal);
                $modal.trigger('beforeHide.modal');
                $modalTrigger.removeClass('is-active');
                if ($currentTrigger) {
                    $currentTrigger.focus();
                    $currentTrigger = false;
                }

                if (modalCount === 0) {
                    // возврат экрана в исходное положение
                    $modal.css('overflow-y', 'hidden');
                    $body.css({'width': '', 'height': '', 'position': ''}).removeClass('is-modal-opened');
                    $html.css('margin-top', '');
                    //@TODO при быстром открытии и закрытии обратный скролл срабатывает криво (при том, что уже в этом месте все размеры высчитываются правильно), таймаут тоже не помогает, похоже проблема в scrolify, т.к. только на таких страницах баг
                    if (!notScroll) {
                        window.scrollTo(modalScrollPos.x, modalScrollPos.y);
                    }
                    // custom aquamarine code
                    $header.css('right', '');
                    if ($.scrollify) {
                        $.scrollify.enable();
                    }
                }

                function afterHideAnimation() {
                    $modal.addClass('u-hidden').trigger('hide.modal');
                    // калбэк
                    options.afterHide.apply($modal);
                    $modal.trigger('afterHide.modal');
                    if (modalCount === 0) {
                        $doc.trigger('hideLastModal.modal');
                    }
                }
            }
            function _isActive() {
                return $modal.hasClass('is-active');
            }

            $modalTrigger.on('click', function (e) {
                e.preventDefault();
                if (!_isActive()) {
                    $currentTrigger = $(this);
                    _show();
                } else {
                    _hide();
                }
            });
            $modalClose.on('click', function (e) {
                e.preventDefault();
                if (_isActive()) {
                    _hide();
                }
            });
            $modal.on('keydown', function (e) {
                if (e.keyCode === 27 && _isActive()) {
                    e.preventDefault();
                    _hide();
                }
            });

            $modal.data('modal', {
                show: function ($triggerEl) {
                    if (!_isActive()) {
                        $currentTrigger = $triggerEl;
                        _show();
                    }
                },
                hide: function (notScroll) {
                    if (_isActive()) {
                        _hide(notScroll);
                    }
                },
            })
        })
    };


    /**
     * Full screen menu
     */
    var $nav = $('[data-modal="nav"]');
    var $navGrids = $nav.find('[data-uk-grid-margin]');
    $nav.modal({
        beforeShow: function () {
            $navGrids.trigger('display.uk.check');
        }
    });

    /**
     * Auth modal
     */
    var $auth = $('[data-modal="auth"]');
    var $authGrids = $auth.find('[data-uk-grid-margin]');
    $auth.modal({
        beforeShow: function () {
            $authGrids.trigger('display.uk.check');
        },
        afterShow: function () {
            $forget.data('modal').hide();
        }
    });

    /**
     * Forget modal
     */
    var $forget = $('[data-modal="forget"]');
    var $forgetGrids = $forget.find('[data-uk-grid-margin]');
    $forget.modal({
        beforeShow: function () {
            $forgetGrids.trigger('display.uk.check');
            if (location.pathname.indexOf('/personal/order/') === -1) {
                // на любой странице кроме ЛК
                $('[data-forget-show-auth]').removeClass('u-hidden');
                $('[data-forget-close-forget]').addClass('u-hidden');
            } else {
                // на странице ЛК
                $('[data-forget-show-auth]').addClass('u-hidden');
                $('[data-forget-close-forget]').removeClass('u-hidden');
            }
        },
        afterShow: function () {
            $auth.data('modal').hide();
        }
    });


    /**
     * jQuery actualSize v 2.1
     */
    $.fn.actual = function (dimension, params) {
        if (typeof dimension == 'string') {
            var options = {
                checkVisibility: true,
                removeClass: '',
                addClass: '',
                appendTo: false,
                css: {},
                beforeAppend: function() {}
            };
            if (typeof params == 'object') {
                $.extend(options, params);
            }

            if (options.checkVisibility && this.is(':visible') && this[dimension]() > 0) {
                return this[dimension]();
            }
            var $clone = this.clone()
                .css({
                    position: 'absolute',
                    top: '-9999px',
                    visibility: 'hidden',
                    transition: '0s'
                })
                .css(options.css)
                .removeClass(options.removeClass)
                .addClass(options.addClass);
            options.beforeAppend.apply(this, [$clone]);
            $clone.appendTo(options.appendTo ? options.appendTo : this.parent());
            var result = $clone[dimension]();
            $clone.remove();
            return result;
        }
        return undefined;
    };

    /**
     * Toggle in/out
     */
    $.fn.hToggleIn = function (options) {
        var defaults = {
            activeClass: 'is-active',
            css: {},
            onAfter: function () {}
        };
        options = $.extend({}, defaults, options);

        this.each(function () {
            var $toggle = $(this);
            if (UIkit.support.transition) {
                $toggle.addClass(options.activeClass).css('overflow', 'hidden');
                var actualHeight = $toggle.actual('outerHeight', {
                    checkVisibility: false,
                    addClass: options.activeClass,
                    css: $.extend({}, options.css, {'height': '', 'overflow': ''}),
                    beforeAppend: function($clone) {
                        $clone.css({'width': this.outerWidth() + 'px'});
                    }
                });
                options.css.height = actualHeight + 'px';
                $toggle.css(options.css);
                $toggle.one(UIkit.support.transition.end, function () {
                    if ($toggle.hasClass(options.activeClass)) {
                        // Установка height: auto, чтобы элемент мог нормально ресайзиться
                        $toggle.css({'height': '', 'transition': 'none', 'overflow': ''});
                        setTimeout(function() {
                            $toggle.css({'transition': ''});
                        }, 10);
                        options.onAfter();
                    }
                })
            } else {
                options.css.height = 'auto';
                $toggle.addClass(options.activeClass).css(options.css);
                options.onAfter();
            }
        });

        return this;
    };

    $.fn.hToggleOut = function (options) {
        var defaults = {
            activeClass: 'is-active',
            css: {},
            onAfter: function () {}
        };
        options = $.extend({}, defaults, options);

        this.each(function () {
            var $toggle = $(this);
            if (UIkit.support.transition) {
                $toggle.css({'height': $toggle.outerHeight() + 'px', 'transition': 'none'});
                setTimeout(function() {
                    $toggle.css($.extend({'transition': ''}, options.css, {'height': 0})).removeClass(options.activeClass);
                    $toggle.one(UIkit.support.transition.end, function () {
                        if (!$toggle.hasClass(options.activeClass)) {
                            options.onAfter.apply($toggle);
                        }
                    });
                }, 10)
            } else {
                $toggle.css($.extend({}. options.css, {'height': 0})).removeClass(options.activeClass);
                options.onAfter.apply($toggle);
            }
        });

        return this;
    };

  
    $.fn.hToggle = function (options) {
        var defaults = {
            beforeShow: function () {},
            beforeHide: function () {},
        };
        options = $.extend({}, defaults, options);

        this.each(function () {
            var $toggle = $(this);
            if (!$toggle.hasClass('is-active')) {
                $toggle.css('height', 0);
            }
            var toggleName = $toggle.attr('data-toggle');
            var $toggleHandle;
            if (toggleName) {
                $toggleHandle = $('[data-toggle-handle="' + toggleName + '"]');
            } else {
                $toggleHandle = $toggle.prev('[data-toggle-handle]');
            }

            // Обработка клика по data-toggle-handle
            $toggleHandle.on('click', function() {
                if (!$toggleHandle.hasClass('is-active')) {
                    _show();
                } else {
                    _hide();
                }
            });

            // Обработка клика по data-toggle-close
            $toggle.find('[data-toggle-close]').on('click', function() {
                _hide();
            });

            // вывод API через data
            $toggle.data('hToggle', {
                show: _show,
                hide: _hide,
            });

            function _show() {
                options.beforeShow.apply($toggle);
                $toggleHandle.addClass('is-active');
                $toggle.hToggleIn();
            }
            function _hide() {
                options.beforeHide.apply($toggle);
                $toggleHandle.removeClass('is-active');
                $toggle.hToggleOut();
            }
        });

        return this;
    };

    /**
     * Избавляемся от паразитного фокуса
     */
    $body.on('click', 'button', function (e) {
        if (e.screenX > 0) {
            e.target.blur();
        }
    });

 
    var $weatherIcon = $('[data-weather-icon]');
    var $weatherCell = $('[data-weather-cell]');
    var weatherIconPrefix = '/images/icon-weather-';
    var $weatherElem = $('.weather__temp');
    $.post('/include/get_weather.php', '', function(response){
        $weatherElem.text(response['temp']);
        var weatherPathName = weatherIconPrefix + response['text'];
        $weatherIcon.attr({
            'src': weatherPathName + '.png',
            'srcset': weatherPathName + "@2x.png 2x",
        });
        $weatherCell.removeClass('u-hidden');
    }).fail(function(){
        $weatherCell.addClass('u-hidden');
    });


    /**
     * Исполняется при первой загрузке страницы и при каждом обновлении старинцы СмуфСтейтом
     */
    $pageScriptsContainer = $('#page-scripts');
    var $langTile = $('[data-lang-tile]');
    function documentReadyHandle() {

        /**
         * Load page scripts
         */
        $pageScriptsContainer.empty();
        if (window.scriptsToLoad) {
            loadScript(window.scriptsToLoad);
            window.scriptsToLoad = undefined;
        }

        /**
         * Mark links to current page
         */
//        $('a').removeAttr('data-sm-link-current');
//        $('a[href="' + smState.href.replace(window.location.origin, '') + '"]').attr('data-sm-link-current', '');



        /**
         * Убираем контрст с переключателя языков на белых страницах
         */
//        if ($('#smoothState').find (' > section.contrast:first-of-type').length > 0) {
//            $langTile.addClass('contrast');
//        } else {
//            $langTile.removeClass('contrast');
//        }


        /**
         * hToggle
         */
//        $('[data-toggle]').hToggle();



        /**
         * Translate .card__content
         */
        var $cardsToTranslate = $('[data-card-content]');
        function translateCards() {
            $cardsToTranslate.each(function () {
                var $this = $(this);
                var titleH = $this.find('[data-card-title]').height();
                var shift = $this.outerHeight() / 2 - titleH / 2;
                $this.css({'transform': 'translateY(' + shift + 'px)', 'transition': '0s'});
                setTimeout(function () {
                    $this.css({'transition': ''});
                }, 1);
            })
        }
        translateCards();
        $win.on('load.smPage resize.smPage orientationchange.smPage', UIkit.Utils.debounce(translateCards, 100));


        /**
         * Room loading animation
         */
        /*$('[data-sm-room-link]').on('click', function () {
            var $this = $(this);
            var $roomBg = $this.find('.card__bg');
            var top = $roomBg.offset().top - $win.scrollTop;
            var left = $roomBg.offset().left;
            var $imgLayer = $('<div class="u-bg-cover bg-room-list--executive"></div>').css({position: 'absolute',})
        });*/


        /**
         * Nav links strikethrough
         */
        // анимация окружности
        $('.nav__menu-link').each(function () {
            var $this = $(this);
            // иногда не срабатывает transitionEnd, поэтому нужен запасной вариант
            var transitionTimeout;

            $this.on('mouseenter', function () {
                if (UIkit.support.transition && !$this.hasClass('is-hover-animate')) {
                    $this.find('.nav__menu-link-inner').one(UIkit.support.transition.end, function () {
                        clearTimeout(transitionTimeout);
                        $this.removeClass('is-hover-animate');
                    });
                    transitionTimeout = setTimeout(function () {
                        $this.removeClass('is-hover-animate');
                    }, 400);
                    $this.addClass('is-hover-animate');
                }
            });
        });

        /**
         * Fit images
         * reservation images, index map
         */
        $('[data-fit]').each(function () {
            var $this = $(this);
            var options = UIkit.Utils.options($this.attr('data-fit'));
            var ratio = options.w / options.h;
            var $parent = $this.parent();
            recalculate();

            $this.data('fit-api', {
                recalculate: recalculate
            });

            $win.on('resize.smPage', UIkit.Utils.debounce(recalculate));

            function recalculate() {
                var parentRatio = $parent.outerWidth() / $parent.outerHeight();
                if (parentRatio && ratio) {
                    if (parentRatio > ratio) {
                        $this.addClass('u-fit-width').removeClass('u-fit-height');
                    } else {
                        $this.removeClass('u-fit-width').addClass('u-fit-height');
                    }
                }
            }
        });


        /**
         * ScrollSpy
         */
        $('[data-scroll]').each(function () {
            var $this = $(this);
            var options = {
                initcls: 'is-showed',
                topoffset: -10
            };
            $.extend(options, UIkit.Utils.options($this.attr('data-scroll')));
            UIkit.scrollspy($this, options);
        });
    }
    documentReadyHandle();
    $doc.on('documentReady', documentReadyHandle);
});




/**
 * Загрузка скриптов
 * @param {string|array} src
 * @param {function} callback - исполняется после загрузки всех скриптов
 */
var scriptsVersion = 'v08-12-16';
function loadScript(src,callback){
    if ($.isArray(src) && src.length === 1) {
        src = src[0];
    }
    if ($.isArray(src)) {
        var srcStr = src.shift();
        loadScript(srcStr, function () {
            loadScript(src, callback)
        });
    } else {

        var script = document.createElement('script');
        script.type = 'text/javascript';
        if (callback) {
            script.onload=callback;
        }
        $pageScriptsContainer[0].appendChild(script);
        if (src.indexOf('?') === -1) {
            src += '?' + scriptsVersion
        }
        script.src = src;
    }
}
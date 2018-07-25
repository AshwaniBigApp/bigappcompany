
$.fn.numberInput = function(options) {
    var defaultOptions = {
        minValue: false,
        maxValue: false,
    };
    options = $.extend(defaultOptions, options);
    if (options.minValue !== false && options.maxValue !== false && options.minValue >= options.maxValue) {
        options.minValue = false;
        options.maxValue = false;
    }
    this.each(function () {
        var $container = $(this);
        var $input = $container.find('input');
        var value;

        function _setValueInRange(val) {
            if (options.maxValue !== false && val > options.maxValue) {
                val = options.maxValue
            }
            if (options.minValue !== false && val < options.minValue) {
                val = options.minValue
            }
            return val;
        }
        function _valueIncrement() {
            value = _setValueInRange(value + 1);
            $input.val(value);
        }
        function _valueDecrement() {
            value = _setValueInRange(value - 1);
            $input.val(value);
        }
        function _checkInput() {
            var inputVal = $input.val();
            inputVal = parseFloat(inputVal);
            if (!$.isNumeric(inputVal)) {
                inputVal = 0;
            }
            value = _setValueInRange(inputVal);
            $input.val(value);
        }

        function _init() {
            _checkInput();

            $container.on('click', '[data-number-input-control]', function () {
                if ($input.prop('disabled')) {
                    return;
                }
                switch ($(this).attr('data-number-input-control')) {
                    case 'minus':
                        _valueDecrement();
                        break;
                    case 'plus':
                        _valueIncrement();
                        break;
                }
            });
            $input.on('change', function () {
                _checkInput();
            });
            $input.on('keydown', function(e){
                switch (e.keyCode) {
                    case 38:
                        _valueIncrement();
                        break;
                    case 40:
                        _valueDecrement();
                        break;
                }
            });
        }

        _init();
    })
};


/**
 * dateRange initialization
 * @param $container элемент с атрибутом data-date-range
 */
function initDateRange($container) {
    var $this = $container;
    var $inputStartDate = $this.find('[name="date-arrival"]');
    var $inputEndDate = $this.find('[name="date-departure"]');
    var $inputDateRange = $this.find('[data-date-range-input]');
    var rangeOptions = {
        autoClose: true,
        format: 'DD.MM.YY',
        separator: ' — ',
        language: locale,
        startOfWeek: 'monday',
        singleMonth: $win.width() < 900,
        stickyMonths: true,
        showTopbar: false,
        startDate: moment().format('DD.MM.YY'),
        minDays: 2, //1 night
        // @TODO локализация
        hoveringTooltip: function (days, startTime, hoveringTime) {
            var nights = days - 1;
            if (nights === 0) {
                return '';
            }
            if (locale === 'ru') {
                var lastDigit = nights % 10;
                var secondDigit = Math.floor(nights % 100 / 10);
                // 11-19 ночей
                if (secondDigit === 1) {
                    return nights + ' ночей';
                }
                // 1 ночь, 21 ночь
                if (lastDigit === 1) {
                    return nights + ' ночь';
                }
                // 2-4 ночи, 22-24 ночи
                if (lastDigit >= 2 && lastDigit <= 4) {
                    return nights + ' ночи';
                } else {
                    return nights + ' ночей';
                }
            } else {
                if (nights === 1) {
                    return nights + ' night';
                } else {
                    return nights + ' nights';
                }
            }

        }
    };
    // initial dates
    var dateArr = $inputDateRange.val().split(rangeOptions.separator);
    $inputStartDate.val(dateArr[0]);
    $inputEndDate.val(dateArr[1]);
    // init dateRangePicker
    $inputDateRange.dateRangePicker(rangeOptions).on('change datepicker-change', function (event, obj) {
        if (obj) {
            // if 'datepicker-change'
            $inputStartDate.val(moment(obj.date1).format(rangeOptions.format));
            $inputEndDate.val(moment(obj.date2).format(rangeOptions.format));
        } else {
            // if 'change'
            var dateArr = $inputDateRange.val().split(rangeOptions.separator);
            $inputStartDate.val(dateArr[0]);
            $inputEndDate.val(dateArr[1]);
        }
    });
    // resize
    $this.data('date-range-container', {
        adaptDateRange: function () {
            if ($win.width() < 900) {
                if (!rangeOptions.singleMonth) {
                    rangeOptions.singleMonth = true;
                    $inputDateRange.data('dateRangePicker').destroy();
                    $inputDateRange.dateRangePicker(rangeOptions);
                }
            } else {
                if (rangeOptions.singleMonth) {
                    rangeOptions.singleMonth = false;
                    $inputDateRange.data('dateRangePicker').destroy();
                    $inputDateRange.dateRangePicker(rangeOptions);
                }
            }
        }
    });
}


/**
 * Заменяет переменные в шаблоне на их значения
 * https://github.com/Matt-Esch/string-template/
 * changed nargs to {{*}}
 */
function tplReplace(string) {
    var nargs = /\{\{([0-9a-zA-Z_]+)}}/g;
    var args;

    if (arguments.length === 2 && typeof arguments[1] === "object") {
        args = arguments[1]
    } else {
        args = new Array(arguments.length - 1);
        for (var i = 1; i < arguments.length; ++i) {
            args[i - 1] = arguments[i]
        }
    }

    if (!args || !args.hasOwnProperty) {
        args = {}
    }

    return string.replace(nargs, function replaceArg(match, i, index) {
        var result;

        if (string[index - 1] === "{" &&
            string[index + match.length] === "}") {
            return i
        } else {
            result = args.hasOwnProperty(i) ? args[i] : null
            if (result === null || result === undefined) {
                return ""
            }

            return result
        }
    })
}

/**
 * Извлечение GET параметров из location
 * @returns {{}}
 */
function getSearchParams() {
    var paramString = window.location.search.substr(1);
    if (paramString == null || paramString == "") {
        return {};
    }

    var params = {};
    var paramArr = paramString.split("&");
    for ( var i = 0; i < paramArr.length; i++) {
        var tmpArr = paramArr[i].split("=");
        params[tmpArr[0]] = decodeURIComponent(tmpArr[1]);
    }
    return params;
}

var $GET = getSearchParams();


var locale = $html.attr('lang') || 'ru';




smPage.clearBinding = function () {
};

$(function () {
    /**
     * dateRange resize
     */
    $win.on('resize.smPage', UIkit.Utils.debounce(function () {
        $('[data-date-range]').each(function () {
            $(this).data('date-range-container').adaptDateRange();
        });
    }, 100));

});


$(function () {
    //workaround to fix window go down after scrollify page
    if (smState.loadCount > 0) {
        $htmlBody.scrollTop(0);
    }
    /**
     * numberInput
     */
    $('[data-number-input]').each(function () {
        var $this = $(this);
        if ($this.find('input[name="adults"]').length > 0) {
            $this.numberInput({
                minValue: 1,
                maxValue: 3,
            });
        } else {
            $this.numberInput({
                minValue: 0,
                maxValue: 3,
            });
        }
    });


    /**
     * dateRange
     */
    initDateRange($('[data-date-range]'))
});
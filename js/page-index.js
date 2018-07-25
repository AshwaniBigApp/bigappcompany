$(function () {

    /**
     * Map switcher
     */
    var $maps = $('[data-index-map]');
    var $mapButtons = $('[data-index-map-button]');
    var $mapSwitcher = $('[data-index-map-switcher]');
    $mapButtons.on('click', function () {
        var $this = $(this);
        if (!$this.hasClass('is-active')) {
            $mapButtons.toggleClass('is-active');
            $mapSwitcher.toggleClass('is-active');
            var mapName = $this.attr('data-index-map-button');
            $maps.removeClass('is-active').filter('[data-index-map="' + mapName + '"]').addClass('is-active');
        }
        
    });
    $mapSwitcher.on('click', function () {
        $mapButtons.toggleClass('is-active');
        $mapSwitcher.toggleClass('is-active');
        var mapName = $mapButtons.filter('.is-active').attr('data-index-map-button');
        $maps.removeClass('is-active').filter('[data-index-map="' + mapName + '"]').addClass('is-active');
    });


    /**
     * Map attraction hover animation
     */
    var easeOutBack = new Ease(BezierEasing(0.17, 0.88, 0.6, 1.65));
    $('[data-modal-trigger^="place-"]').on('mouseenter', function () {
        TweenLite.to($(this).find('image'), 0.25, {scale: 1.2, transformOrigin: "50% 50%", ease: easeOutBack});
    }).on('mouseleave', function () {
        TweenLite.to($(this).find('image'), 0.25, {scale: 1, transformOrigin: "50% 50%", ease: easeOutBack});
    });


    /**
     * Map modal
     */
    var $placeModal = $('[data-modal^="place-"]');
    var $placeGrids = $placeModal.find('[data-uk-grid-margin]');
    $placeModal.modal({
        beforeShow: function () {
            $placeGrids.trigger('display.uk.check');
        }
    });

    $('[data-attraction-change]').on('click', function () {
        var $this = $(this);
        var newName = $this.attr('data-attraction-change');
        var $newPlace = $placeModal.filter('[data-modal="' + newName + '"]');
        $newPlace.filter('[data-modal="' + newName + '"]').data('modal').show();
        $newPlace.one('afterShow.modal', function () {
            $this.closest('[data-modal]').data('modal').hide();
        });
    })


});
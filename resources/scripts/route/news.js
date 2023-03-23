(function($) {

    // $url = window.location.origin;
    // jQuery.getScript( $url + '/wp-content/themes/acmx-nas/resources/scripts/ias.min.js', function() {
    //     var newsTab = jQuery.ias({
    //         container:  '.news-scroll-wrapper',
    //         item:       '.news-scroll-item',
    //         pagination: '.news-pagination',
    //         next:       '.news-next-more-link a',
    //         delay:      2000,
    //         history:   false,
    //     });

    //     var _loader = '';
    //         _loader += '<div class="news-page-load-status uk-width-1-1">';
    //         _loader += '<div class="infinite-scroll-request">';
    //         _loader += '<div class="uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-text-muted uk-margin-remove">';
    //         _loader += '<span class="uk-margin-small-right" uk-spinner="ratio: .7"></span> Loading, please wait...';
    //         _loader += '</div>';
    //         _loader += '</div>';
    //         _loader += '</div>';

    //     newsTab.extension(new IASSpinnerExtension({
    //         html: _loader,
    //     }));

    //     newsTab.extension(new IASTriggerExtension({ offset: 100, htmlPrev: '<div class="uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-text-small"> <a class="uk-text-muted"><span class="uk-margin-small-right" uk-icon="arrow-left"></span> Load Previous Contents</a> </div>' }));
    //     newsTab.extension(new IASPagingExtension());
    //     newsTab.extension(new IASHistoryExtension({ prev: '.news-prev-more-link a', }));
    // });

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            _prev = jQuery('.news-prev-more-link a');
            _next = jQuery('.news-next-more-link a');

            _prev.attr('aria-label', 'previous News articles').html( '<span uk-icon="icon: chevron-left"></span>' );
            _next.attr('aria-label', 'next News articles').html( '<span uk-icon="icon: chevron-right"></span>' );

        }    
    }, 100);

})(jQuery);
(function($) {

    jQuery.getScript('https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js', function() {
        // News
        jQuery('.news-scroll-wrapper').infiniteScroll({
            // options
            path: '.news-next-more-link a',
            append: '.news-scroll-item',
            history: false,
            hideNav: '.news-pagination',
            status: '.news-page-load-status'
        });
    });

})(jQuery);
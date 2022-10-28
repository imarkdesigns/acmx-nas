(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            jQuery('.about-commercial .uk-grid > div:last p:last:contains(*)').addClass('uk-text-meta');
            jQuery('.about-services').find('ul').addClass('uk-list uk-list-square uk-column-1-2@s');

        }    
    }, 100);

})(jQuery);
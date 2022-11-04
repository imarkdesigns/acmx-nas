(function($) {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);
            
            // Elfsight Search Input Accessibility Fix
            jQuery('.eapps-google-maps-bar-search-inner').prepend('<label for="google-search">Search Property</label>').find('input').attr('id','google-search').attr('placeholder','Search Property');
            jQuery('body.map .eapps-google-maps-bar-button-filter').find('div:first').text( 'Sort By Property Category' );

            // Alt Tag for Image
            jQuery('.eapps-google-maps-bar-list-item').each(function() {
                var _title = jQuery(this).find('.eapps-google-maps-bar-list-item-info-title').text();
                var _title = jQuery.trim(_title);
                jQuery(this).find('.eapps-google-maps-bar-list-item-additional-picture img').attr('alt', _title);
            });
        }    
    }, 100);

})(jQuery);
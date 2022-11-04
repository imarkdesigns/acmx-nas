(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            // Elfsight Search Input Accessibility Fix
            jQuery('.eapps-google-maps-bar-search-inner').prepend('<label for="google-search">Search Property</label>').find('input').attr('id','google-search').attr('placeholder','Search Property');

            // Alt Tag for Image
            jQuery('.eapps-google-maps-bar-list-item').each(function() {
                var _title = jQuery(this).find('.eapps-google-maps-bar-list-item-info-title').text();
                var _title = jQuery.trim(_title);
                jQuery(this).find('.eapps-google-maps-bar-list-item-additional-picture img').attr('alt', _title);
            });

            // Auto Scroll to Form when Contact Person is present
            var params = new URLSearchParams(document.location.search);
            var contact = params.get('cid');

            if ( contact != null ) {
                jQuery("html, body").animate({ scrollTop: jQuery('#contact-form').offset().top }, 1000);
            } else {
                return false;
            }

        }    
    }, 100);



})(jQuery);
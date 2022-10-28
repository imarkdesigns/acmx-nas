(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

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
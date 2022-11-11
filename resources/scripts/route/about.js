(function($) {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            // About NAS
            jQuery('.about-commercial .uk-grid > div:last p:last:contains(*)').addClass('uk-text-meta');
            jQuery('.about-services').find('ul').addClass('uk-list uk-list-square uk-column-1-2@s');

            // Profile
            jQuery('#bio .uk-article').find('p:first').addClass('uk-dropcap');

            $url = window.location.origin;
            jQuery.getScript('https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js', function() {
                jQuery.getScript($url + '/wp-content/themes/acmx-nas/resources/scripts/counterup.min.js', function() {
                    jQuery('.counter').counterUp({
                        delay: 50,
                        time: 1500,
                    });
                });
            });

        }    
    }, 100);

})(jQuery);




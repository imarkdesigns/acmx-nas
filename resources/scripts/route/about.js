(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            // About NAS
            jQuery('.about-commercial .uk-grid > div:last p:last:contains(*)').addClass('uk-text-meta');
            jQuery('.about-services').find('ul').addClass('uk-list uk-list-square uk-column-1-2@s');

            // Profile
            jQuery('#bio .uk-article').find('p:first').addClass('uk-dropcap');


        }    
    }, 100);

})(jQuery);
(function($) {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            // Profile
            jQuery('#bio .uk-article').find('p:first').addClass('uk-dropcap');

        }    
    }, 100);

})(jQuery);



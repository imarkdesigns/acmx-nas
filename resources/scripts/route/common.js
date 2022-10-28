(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            // Inject to Company Video & NAS Brochure Download
            var _cv = company_video.cvPath,
                _bd = brochure_download.pdfPath;
            jQuery('.uk-navbar-nav .uk-parent .uk-navbar-dropdown-nav').find('li.company-video a').attr({ 'href' : _cv, 'target': '_blank' });
            jQuery('.uk-navbar-nav .uk-parent .uk-navbar-dropdown-nav').find('li.nas-brochure a').attr({ 'href' : _bd, 'download': '' });

            // Remove Search input value when exiting search
            UIkit.util.on('.nav-overlay', 'beforeshow', function () {
                jQuery('.uk-search-input').val('');
            });

            // Change value of the Dashboard link in the Menu Navigation
            var $od_user = '<span uk-icon="icon: user; ratio: .8;"></span>';
            jQuery('.uk-navbar-nav').find('.od-user a:first').attr('aria-label','Go Back to Dashboard').html( $od_user );

            // Toggle Accordion of FAQ
            var util = UIkit.util;
            util.on('.faq-toggle', 'click', () => {
                var accordionEl = util.$('[uk-accordion]');
                var allItems = util.$$('[uk-accordion] > li');

                util.each(allItems, (el) => {
                    var openIndex = util.index(el);

                    if ( util.hasClass(allItems, 'uk-open') ) {
                        // toggle it
                        UIkit.accordion(accordionEl).toggle(openIndex);
                        console.log('Found.');
                    } else {
                        // toggle it
                        UIkit.accordion(accordionEl).toggle(openIndex);
                        console.log('Not Found.');
                    }
                });
            });

            // Home: Tooltip Hack
            jQuery('.home .uk-thumbnav li').find('a').removeAttr('aria-describedby');
            jQuery('.company-video').find('a').removeAttr('aria-describedby');

        }    
    }, 100);

})(jQuery);
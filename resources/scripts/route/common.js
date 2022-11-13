(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            // Inject to Company Video & NAS Brochure Download
            var _cv = company_video.cvPath,
                _bd = brochure_download.pdfPath;

            jQuery('.uk-navbar-nav .uk-parent .uk-navbar-dropdown-nav').find('li.company-video a').attr({ 'href' : _cv, 'target': '_blank' });
            jQuery('.uk-navbar-nav .uk-parent .uk-navbar-dropdown-nav').find('li.nas-brochure a').attr({ 'href' : _bd, 'download': '' });

            // Inject WP Profile Builder Pro Force Login
            var _wppb = '?wppb_force_wp_login=false';
            var _href = jQuery('.uk-navbar-nav #menu-item-220').children().attr('href');
            jQuery('.uk-navbar-nav #menu-item-220').children().attr('href', _href + _wppb);

            // Asset Management URL
            jQuery('#menu-item-231 .uk-navbar-dropdown-nav').children().each(function() {
                var $protocol = window.location.protocol;
                var $hostname = window.location.hostname;
                var $pathname = window.location.pathname;
                var _assetHost = $protocol +'//'+ $hostname;
                var _assetURL = '/asset-management';
                var _assetID = jQuery(this).children().attr('href').replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');

                if ( $pathname != _assetURL ) {
                    jQuery(this).children().attr({'href': _assetHost + _assetURL + '#nas-'+_assetID});    
                } else {
                    jQuery(this).children().attr({'href': _assetHost + _assetURL + '#'+_assetID}).attr('uk-scroll','');
                }
            });

            // Remove Search input value when exiting search
            UIkit.util.on('.nav-overlay', 'beforeshow', () => {
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

            // Fix WP Core Block Alignment / Gutenberg 
            jQuery('.did-you-know .uk-article figure').each(function() {
                var _this = jQuery(this);
                var _img = _this.find('img').width();

                // Apply the width
                _this.css('max-width', _img);

            });

            jQuery('.single .type-post .wp-block-image figure').each(function() {
                var _this = jQuery(this);
                var _img = _this.find('img').width();

                // Apply the width
                _this.css('max-width', _img);

            });

        }    
    }, 100);


})(jQuery);
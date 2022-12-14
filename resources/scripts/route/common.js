(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            // Inject to Company Video & NAS Brochure Download
            var _cv = company_video.cvPath,
                _bd = brochure_download.pdfPath;

            jQuery('.uk-navbar-nav .uk-parent .uk-navbar-dropdown-nav').find('li.company-video').attr({ 'uk-lightbox' : '' }).children().attr({ 'href' : _cv, 'data-attrs' : 'width: 1280; height: 720' });
            jQuery('.uk-navbar-nav .uk-parent .uk-navbar-dropdown-nav').find('li.nas-brochure a').attr({ 'href' : _bd, 'download': '' });

            // Inject WP Profile Builder Pro Force Login
            var _wppb = '?wppb_force_wp_login=false';
            var _href = jQuery('.uk-navbar-nav #menu-item-220').children().attr('href');
            jQuery('.uk-navbar-nav #menu-item-220').children().attr('href', _href + _wppb);

            // Asset Management URL
            jQuery('#menu-item-231 .uk-navbar-dropdown-nav, #menu-item-252 .uk-nav-sub').children().each(function() {
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

            // Setup the Cookie
            // jQuery.getScript('https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js', function(){
            //     // Session Cookie
            //     $kukie = Cookies.get('accept-cookies');
            //     if ( ! $kukie ) {
            //         jQuery('.accept-cookies').removeAttr('hidden').attr('uk-scrollspy', 'cls: uk-animation-fast uk-animation-slide-bottom; delay: 2500');
            //         jQuery('.accept-cookies').find('.uk-alert-accept').on('click', function() {
            //             Cookies.set('accept-cookies', 'true', { expires: 7 });
            //             UIkit.alert('.accept-cookies').close();
            //         });
            //     }
            // });

            // Remove Search input value when exiting search
            UIkit.util.on('.navbar-search-field', 'beforeshow', () => {
                jQuery('.uk-search-input').val('');
            });

            // Toggle the scroll-y hidden when mobile menu are active
            jQuery('html').on('click', '.mobile-menu', function() {
                var state = jQuery(this).data('state');
                switch(state){
                    case 1 :
                    case undefined : jQuery('html').css({ 'overflow-y':'hidden', 'touch-action':'none' }); jQuery(this).data('state', 2); break;
                    case 2 : jQuery('html').removeAttr('style'); jQuery(this).data('state', 1); break;
                }
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

            jQuery('.uk-modal figure').each(function() {
                var _this = jQuery(this);
                var _img = _this.find('img').width();

                // Apply the width
                _this.css('max-width', _img);
            });


            // Hack all search forms to not send/submit
            jQuery('form[role="search"]').on('submit', function (e) {
                // if (event.keyCode === 10 || event.keyCode === 13) {
                //     event.preventDefault();
                // }
                e.preventDefault();
            });

            var _niceName = getUrlParameter('nnid');
            if ( window.location.href.indexOf('?nnid=') > 0 ) {
                jQuery('.login-form #wppb-recover-password').find('#username_email').val(_niceName);
            } else {
                jQuery('.login-form #wppb-recover-password').find('#username_email').val();
            }
            

        }    
    }, 100);

})(jQuery);

// Get the Parameter
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
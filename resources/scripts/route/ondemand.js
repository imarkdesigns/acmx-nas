(($) => {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);
            
            // Inject autocomplete off to username - login page
            jQuery('#wppb-login-wrap').find('#user_login').attr('autocomplete','off');

            // Hack the grid height
            jQuery(window).on('resize',function(){
                var _navHeight = jQuery('div').data('ondemand','menu').height();
                var _ftrHeight = jQuery('footer').data('ondemand','footer').height();
                var _window    = jQuery(window).height() - ( _navHeight + _ftrHeight + 70 );
                var _window2    = jQuery(window).height();
                var _window3    = jQuery(window).width();
                var _topNews   = jQuery('.news-list').height();

                if ( _window3 < 960 ) {
                    jQuery('.my-properties').find('.property-list').css('height','auto');
                } else if ( _window < _topNews ) {
                    jQuery('.my-properties').find('.property-list').css('height',_topNews);
                } else if ( _window > _topNews ) {
                    jQuery('.my-properties').find('.property-list').css('height',_window);
                }
            }).resize();

            UIkit.util.on('#maintenance-dialog', 'click', function (e) {
                e.preventDefault();
                e.target.blur();
                UIkit.modal.dialog('<p class="uk-modal-body uk-text-center">Sorry, This property is under maintenance. Please checkback soon! <small class="uk-display-block uk-text-meta">(click anywhere to close this window)</small></p>');
            });


            var modalInterval = setInterval(function() {
                UIkit.modal('#equity-modal').show();
            }, 3000);

            UIkit.util.on('#equity-modal button.uk-modal-close-default', 'click', function (e) {
                e.preventDefault();
                UIkit.modal('#equity-modal').hide();
                clearInterval(modalInterval);
            });
            
        }
    }, 100);

})(jQuery);
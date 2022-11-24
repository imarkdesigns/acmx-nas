(function($) {

    var interval = setInterval(function() {
        if(document.readyState === 'complete') {
            clearInterval(interval);

            // About NAS
            jQuery('.about-commercial .uk-grid > div:last p:last:contains(*)').addClass('uk-text-meta');
            jQuery('.about-services').find('ul').addClass('uk-list uk-list-square uk-column-1-2@s');

            jQuery.getScript('https://unpkg.com/counterup2@2.0.2/dist/index.js', function() {
                const counterUp = window.counterUp.default
                const callback = entries => {
                    entries.forEach( entry => {
                        const el = entry.target
                        if ( entry.isIntersecting && ! el.classList.contains( 'is-visible' ) ) {
                            counterUp( el, {
                                duration: 2000,
                                delay: 16,
                            } )
                            el.classList.add( 'is-visible' )
                        }
                    } )
                }

                const IO = new IntersectionObserver( callback, { threshold: 1 } )
                const el = document.querySelector( '.counter' )
                IO.observe( el )
            });

        }    
    }, 100);

})(jQuery);



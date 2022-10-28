(function($) {

    // Toggle Excerpt
    UIkit.util.on('.excerpt', 'shown', () => {
        jQuery('.toggle-excerpt').text('Read Less');
    });

    UIkit.util.on('.excerpt', 'hidden', () => {
        jQuery('.toggle-excerpt').text('Read More');
    });


})(jQuery);
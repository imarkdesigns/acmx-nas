<main id="main" class="main" role="main">
    <div class="login-form | uk-container uk-container-expand uk-cover-container uk-flex uk-flex-middle uk-flex-center" uk-height-viewport>
        <img src="//placem.at/places?w=1920&h=1024&txt=0&random=1" alt="BG Reset Photos" uk-cover>
        <div class="uk-overlay-primary uk-position-cover"></div>
        <!-- Form -->
        <div class="uk-overlay uk-width-large uk-position-center uk-light">
            <figure class="uk-text-center">
                <img src="<?php echo _uri.'/resources/images/logo-nasassets_x1.png'; ?>" alt="<?php bloginfo(); ?>">
                <figcaption>
                    <h1>On<span>Demand</span></h1>
                    <h2>Information</h2>
                </figcaption>
            </figure>
            <?php echo do_shortcode('[wppb-recover-password redirect_url="/ondemand/dashboard"]'); ?>

            <div class="login-return uk-padding-small uk-text-center">
                <a href="<?php echo get_permalink( 43 ); ?>" class="uk-link-reset">Go back to Login</a>
            </div>
        </div>
        <!-- End Form -->


    </div>
</main>
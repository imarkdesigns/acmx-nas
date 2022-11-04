<main id="main" class="main" role="main">
    <div class="login-form | uk-container uk-container-expand uk-cover-container uk-flex uk-flex-middle uk-flex-center" uk-height-viewport>
        <?php /* <img src="//placem.at/places?w=1920&h=1024&txt=0&random=1" alt="BG Login Photos" uk-cover> */ ?>
        <img src="//unsplash.it/1920" alt="Photos Courtesy of Unsplash" uk-cover>
        <div class="uk-overlay-primary uk-position-cover"></div>
        <!-- Form -->
        <div class="uk-overlay uk-position-center uk-light">
            <figure class="uk-width-large uk-text-center">
                <img src="<?php echo _uri.'/resources/images/logo-nasassets_x1.png'; ?>" alt="<?php bloginfo(); ?>">
                <figcaption>
                    <h1>On<span>Demand</span></h1>
                    <h2>Information</h2>
                </figcaption>
            </figure>
            <?php echo do_shortcode('[wppb-login redirect_url="/dashboard" lostpassword_url="/ondemand/password-reset"]'); ?>
            <div class="uk-panel uk-padding-small uk-text-center">
                <a href="<?php echo esc_url( home_url() ); ?>" class="uk-link-reset">Go Back to Homepage</a>
            </div>
        </div>
        <!-- End Form -->

        <div class="uk-overlay uk-overlay-default uk-position-bottom uk-padding-small">
            <div class="uk-panel uk-text-small uk-text-center">
                <?php if ( wp_is_mobile() ) {
                    echo nl2br("<strong>Trouble Logging In?</strong>\nSwipe & hold down your thumb into your screen to reload the site ");
                } else {
                    echo nl2br("<strong>Trouble Logging In?</strong> Here's how to hard refresh your browser and clear your cache\n<strong>For Windows:</strong> Hold down Ctrl and click the Reload button. <strong>For MacOS:</strong> Hold down Shift and click the Reload button.");
                } ?>
            </div>
        </div>

    </div>
</main>
<?php get_header( 'ondemand' ); ?>
<main id="main" class="main" role="main">

    <div class="uk-grid-collapse" uk-grid>
        <div class="my-property | uk-width-expand@m">
            <?php do_action( 'myProperty', get_the_ID() ); ?>
        </div>
        <!-- End of My Property -->

        <div class="property-directory | uk-width-large@m">
            <hgroup id="property-documents"> <h2>Property Documents</h2> </hgroup>
            <?php do_action( 'documents', 4 ); ?>
            <!-- End of File Management -->

            <?php // Available Investments Settings
            $nasis_ai_link = get_field( 'ai_panel', 'option' ); ?>
            <div class="nasis-investments | uk-background-secondary uk-padding-small">
                <?php if ( $nasis_ai_link ) : ?>
                <div class="nasis-availabe-investments | uk-position-relative uk-background-cover uk-height-medium uk-margin-small-bottom" data-src="//placem.at/places?w=640&h=360&txt=0&random=1" uk-img>
                    <div class="uk-overlay uk-position-center uk-flex uk-flex-column uk-flex-center uk-flex-middle uk-position-z-index">
                        <img src="<?php echo _uri.'/resources/images/ondemand/nasis-logo.png'; ?>" class="uk-margin-small-bottom" width="200" height="50" alt="NAS Investment Solutions">
                        <a href="<?php echo $nasis_ai_link['nasis_url']; ?>" class="uk-button uk-button-primary" target="_blank"> <?php echo $nasis_ai_link['nasis_btn']; ?> </a>
                    </div>
                    <div class="uk-overlay-primary uk-position-cover"></div>
                </div>
                <?php endif;
                // Set the NASIS DST Property
                do_action( 'nasisProperty' );

                // Set the Download Guide Brochure
                do_action( 'nasisBrochure' ); ?>
            </div>
        </div>
    </div>

</main>
<?php get_footer( 'ondemand' );
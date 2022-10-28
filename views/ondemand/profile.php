<main id="main" class="main" role="main">
    <div class="dashboard | uk-grid-collapse uk-grid-match" uk-grid>

        <div class="uk-width-3-4@l uk-flex-stretch">
            <div class="uk-grid-collapse" uk-grid>
                <div class="my-profile | uk-width-expand@m">
                    <hgroup> <h1>OnDemand Profile</h1> </hgroup>
                    <div>
                        <?php echo do_shortcode( '[wppb-edit-profile form_name="investors-update-form"]' ); ?>
                    </div>
                </div>
                <div class="top-news | uk-width-large@m uk-background-light-muted">
                    <hgroup> <h2>NAS News</h2> </hgroup>
                    <div>
                        <?php do_action( 'rand_newsList' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Property|News -->

        <?php
        get_template_part( _opt.'ondemand-investments' ); ?>

    </div>
</main>
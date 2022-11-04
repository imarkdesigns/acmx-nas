<main id="main" class="main" role="main">
    <div class="dashboard | uk-grid-collapse uk-grid-match" uk-grid>

        <div class="uk-width-expand@l uk-flex-stretch">
            <div class="uk-grid-collapse" uk-grid>
                <div class="my-properties | uk-width-1-2@m uk-background-light">
                    <hgroup> <h1>My Properties</h1> </hgroup>
                    <div class="property-list" uk-overflow-auto>
                        <?php do_action( 'propertyList' ); ?>
                    </div>
                </div>
                <div class="top-news | uk-width-1-2@m uk-background-light-muted">
                    <hgroup> <h2>NAS Top News</h2> </hgroup>
                    <div class="news-list">
                        <?php do_action( 'sticky_newsList' ); ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- End of Property|News -->

        <?php
        get_template_part( _opt.'ondemand-investments' ); ?>

    </div>
</main>
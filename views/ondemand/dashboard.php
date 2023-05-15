<main id="main" class="main <?php echo ( wp_is_mobile() ) ? 'main-touch' :null; ?>" role="main">
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

    <div id="equity-modal" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-section-medium-dark uk-margin-auto-vertical uk-light">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-body">
                <p>New Investment Opportunity</p>
                <h1>NASIS Preferred Equity Fund II, LLC</h1>
                <h2>12.5% Projected Cumulative Return</h2>
                <ul>
                    <li>Minimum 8% Annual Return Paid to the Fund</li>
                    <li>1.5% added when money is allocated to an acquisition</li>
                    <li>3 Property Acquisitions Anticipated Yearly</li>
                    <li>Participation Minium: $250,000 for 2 Years</li>
                    <li>Reliable Cash Flow from Day One. Paid to Investors Monthly</li>
                </ul>
                <p>A Private Preferred Equity Fund Used Exclusively for NASIS Property Acquisitions</p>
            </div>
        </div>
    </div>    
</main>
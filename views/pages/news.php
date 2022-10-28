<main id="main" class="main" role="main">

    <nav class="localnav | uk-panel uk-padding-small">
        <div class="uk-container uk-container-expand" uk-overflow-auto>
            <div>
                <h1>NAS News</h1>
            </div>
            <div>
                <button type="button" class="uk-button uk-button-small">News Categories <span uk-icon="icon: chevron-down; ratio: .7"></span></button>
                <div class="uk-dropbar uk-dropbar-top" uk-drop="mode: click; stretch: x; target: !.localnav; animation: slide-top; animate-out: true; duration: 700; auto-update: false">
                    <div class="category-tray | uk-container uk-container-large">

                        <div class="uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-small uk-flex-center uk-flex-between" uk-grid uk-margin>
                        <?php $categories = get_categories();
                        foreach ( $categories as $category ) : ?>
                            <div>
                                <?php
                                printf( '<a href="%1$s">%2$s</a><br />',
                                        esc_url( get_category_link( $category->term_id ) ),
                                        esc_html( $category->name )
                                    );
                                ?>
                            </div>
                        <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="news-list | uk-section">
        <div class="uk-container">

            <div class="uk-headings">
                <h2>Latest News</h2>
            </div>

            <ul class="uk-grid-match uk-flex-center" uk-grid role="list">
                <!-- Highlights -->
                <li class="news-highlight | uk-width-1-1" role="listitem">
                    <div class="uk-card uk-card-default uk-flex-middle uk-grid-collapse" uk-grid>
                        <div class="uk-card-media-left uk-width-1-1@s uk-width-2-3@m">
                            <?php $slide = 1;
                            if ( $slide ) : ?>
                            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; animation: pull">
                                <ul class="uk-slideshow-items">
                                    <?php for ( $i = 0; $i < 5; $i++ ) : ?>
                                    <li> <img src="//placem.at/places?w=1280&h=720&txt=0&random=2<?=$i?>" alt="NAS Delivers Buyer for Houston Area Single Tenant Retail Location" uk-cover> </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                            <?php else : ?>
                            <img src="//placem.at/places?w=1280&h=720&txt=0&random=1" alt="NAS Delivers Buyer for Houston Area Single Tenant Retail Location">
                            <?php endif; ?>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-3@m">
                            <div class="uk-card-body">
                                <div class="title-category | uk-text-meta uk-margin-bottom"> Retail Property News </div>
                                <h3 class="title-headline">NAS Delivers Buyer for Houston Area Single Tenant Retail Location</h3>
                            </div>
                        </div>
                        <a href="#" class="uk-position-cover" aria-label="NAS Delivers Buyer for Houston Area Single Tenant Retail Location" role="link"></a>
                    </div>
                </li>
                <!-- End Highlights -->

                <!-- Medium News List -->
                <?php for ( $i = 0; $i < 6; $i++ ) : ?>
                <li class="listitem-medium | uk-width-1-2@s uk-width-1-3@m" role="listitem">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-media-top">
                            <img src="//placem.at/places?w=1280&h=720&txt=0&random=3<?=$i?>" alt="NAS Delivers Buyer for Houston Area Single Tenant Retail Location">
                        </div>
                        <div class="uk-card-body">
                            <div class="title-category | uk-text-meta uk-margin-bottom"> Retail Property News </div>
                            <h3 class="title-headline">NAS Delivers Buyer for Houston Area Single Tenant Retail Location</h3>
                        </div>
                        <a href="#" class="uk-position-cover" aria-label="NAS Delivers Buyer for Houston Area Single Tenant Retail Location" role="link"></a>
                    </div>
                </li>
                <?php endfor; ?>
                <!-- End of Medium News List -->

                <!-- Small News List -->
                <?php for ( $i = 0; $i < 8; $i++ ) : ?>
                <li class="listitem-small | uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l" role="listitem">
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-media-top">
                            <img src="//placem.at/places?w=1280&h=720&txt=0&random=3<?=$i?>" alt="NAS Delivers Buyer for Houston Area Single Tenant Retail Location">
                        </div>
                        <div class="uk-card-body">
                            <div class="title-category | uk-text-meta uk-margin-bottom"> Retail Property News </div>
                            <h3 class="title-headline">NAS Delivers Buyer for Houston Area Single Tenant Retail Location</h3>
                        </div>
                        <a href="#" class="uk-position-cover" aria-label="NAS Delivers Buyer for Houston Area Single Tenant Retail Location" role="link"></a>
                    </div>
                </li>
                <?php endfor; ?>
                <!-- End of Small News List -->
            </ul>

            <div class="uk-margin-large-top uk-text-center">
                <a href="#nas-archived-news" class="uk-button uk-button-default" uk-scroll="offset: 80"> View Archived News </a>
            </div>

        </div>
    </section>

    <section class="ondemand-banner | uk-section uk-position-relative uk-padding-remove" data-src="<?php echo _uri.'/resources/images/img-ondemand_bg.jpg' ?>" uk-img>
        <div class="uk-overlay uk-position-center-right uk-position-medium uk-width-2-3@s uk-width-1-2@m">
            <h2 class="ondemand-title">On<span>Demand</span> <span>information</span></h2>
            <h3>Anytime. Anywhere.</h3>
            <p>NAS is a commercial real estate management company dedicated to providing transparent information to clients. Property documents can be viewed at any time on any device. <a href="#">Learn More</a></p>
        </div>
    </section>

    <section class="more-news-lists uk-section">
        <div class="uk-container">

            <div id="nas-archived-news" class="uk-headings">
                <h2>NAS Archived News</h2>
            </div>

            <div class="uk-grid-match uk-grid-large" uk-grid>
                <?php for ( $i = 0; $i < 8; $i++ ) : ?>
                <div class="uk-width-1-2@s uk-width-1-2@m">
                    <div class="uk-card uk-card-small uk-grid-collapse uk-flex-middle" uk-grid>
                        <div class="uk-card-media-left uk-cover-container uk-width-auto">
                            <img src="//placem.at/places?w=150&h=150&txt=0&random=3<?=$i?>" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <div class="uk-card-body uk-padding-remove-vertical">
                                <div class="title-category | uk-text-meta">Category</div>
                                <h3 class="title-headline">Karen E. Kennedy Named a Woman of Influence</h3>
                            </div>
                        </div>
                        <a href="#" class="uk-position-cover" aria-label="NAS Delivers Buyer for Houston Area Single Tenant Retail Location" role="link"></a>
                    </div>
                </div>
                <?php endfor; ?>
            </div>

        </div>
    </section>


</main>
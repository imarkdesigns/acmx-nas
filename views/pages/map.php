<main id="main" class="main" role="main">

    <aside class="map-legend | uk-panel uk-padding-small">
        <div class="uk-container uk-container-expand" uk-overflow-auto>
            <ul class="uk-subnav">
                <li>Office</li>
                <li>Medical Office</li>
                <li>Industrial</li>
                <li>Multifamily</li>
                <li>Retail</li>
                <li>Senior Assisted Living</li>
                <li>Student Housing</li>
                <li>Championship Golf Course</li>
            </ul>
        </div>
    </aside>

    <section class="property-map | uk-section uk-padding-remove">
        <?php echo do_shortcode( '[elfsight_google_maps id="1"]' ); ?>
    </section>

    <section class="ondemand-banner | uk-section uk-position-relative uk-padding-remove" data-src="<?php echo _uri.'/resources/images/img-ondemand_bg.jpg' ?>" uk-img>
        <div class="uk-overlay uk-position-center-right uk-position-medium uk-width-2-3@s uk-width-1-2@m">
            <h2 class="ondemand-title">On<span>Demand</span> <span>information</span></h2>
            <h3>Anytime. Anywhere.</h3>
            <p>NAS is a commercial real estate management company dedicated to providing transparent information to clients. Property documents can be viewed at any time on any device. <a href="#">Learn More</a></p>
        </div>
    </section>

    <section class="news-module | uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-position-relative" tabindex="-1" uk-slider="finite: true" aria-labelledby="news-heading">
                <ul class="uk-slider-items uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-5@xl uk-grid"  role="list">

                    <!-- News Ads -->
                    <li class="news-intro" role="listitem">
                        <div id="news-heading" class="uk-panel">
                            <h2><small>National Asset Services</small> News</h2>
                            <p>Timely news articles about NAS and properties in the NAS portfolio.</p>
                            <a href="<?php echo get_permalink( 35 ); ?>" class="readmore">read more</a>
                        </div>
                    </li>

                    <?php for ( $i = 0; $i < 6; $i++ ) : ?>
                    <li role="listitem">
                        <figure class="uk-inline">
                            <img src="//placem.at/places?w=640&h=550&txt=0&random=20<?=$i?>" width="640" height="550" alt="">
                            <figcaption class="uk-overlay-primary uk-position-cover uk-padding">
                                <span class="news-category | uk-text-meta"><a href="#" class="uk-link-reset">Retail Property News</a></span>
                                <h3 class="news-title">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit ad quod
                                </h3>
                            </figcaption>
                            <a href="<?php echo esc_url( get_permalink(get_the_ID()) ); ?>" class="uk-position-cover" aria-label="News Title Here" role="link"></a>
                        </figure>
                    </li>
                    <?php endfor; ?>

                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" aria-label="Previous" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" aria-label="Next" uk-slidenav-next uk-slider-item="next"></a>                
            </div>

        </div>
    </section>

</main>
<header data-fragment="hero" class="team | uk-position-relative">
    <div class="uk-container uk-container-expand">

        <div class="uk-grid-collapse uk-grid-match uk-flex-middle" uk-grid>
            <div class="uk-width-1-2@m">
                <figure class="uk-cover-container">
                    <canvas width="960" height="950"></canvas>
                    <img src="<?php echo _uri.'/resources/images/bg-team-nas_hdr.png' ?>" alt="<?php bloginfo(); ?>" uk-cover>
                </figure>
            </div>
            <div class="uk-width-1-2@m uk-flex-first@m uk-flex-last">
                <div class="uk-panel uk-padding-large">
                    <h1><span>NAS</span> Team</h1>
                    <p>The National Asset Services commercial real estate management team is an experienced and proven group of professionals.  The executive team works with over 90 diversely structured ownership groups including; private investors and private investor groups, beneficiaries in Delaware Statutory Trusts (DST), and co-owners in tenant-in-common properties. The company’s portfolio consists of over 80 Properties in 25 States valued at over $2 billion.</p>
                    <p>The NAS team has been successful in delivering positive results for a wide range of diverse commercial real estate including; office, medical office, multifamily, retail, student housing, senior assisted living and industrial flex properties and offers.  The NAS executives have a wealth of experience in a wide-range of management and consulting services.</p>
                </div>
            </div>
        </div>

    </div>
</header>

<main id="main" class="main" role="main">

    <section class="team-lists | uk-section">
        <div class="uk-container">

            <div class="uk-child-width-1-2@s uk-child-width-1-3@l uk-grid-match" uk-grid>
                <?php for ( $i = 0; $i < 14; $i++ ) : ?>
                <div>
                    <div class="uk-card uk-padding-remove">
                        <a href="#">
                            <figure class="uk-inline uk-margin-remove">
                                <img src="//placem.at/people?w=514&h=635&txt=0&random=1<?=$i?>" alt="">
                            </figure>
                            <figcaption class="uk-overlay uk-overlay-primary uk-position-bottom uk-position-small uk-padding-small">
                                <h2>Karen E. Kennedy, <span class="uk-text-meta">CRX, CSM</span></h2>
                                <p>President & Founder</p>
                            </figcaption>
                        </a>
                    </div>
                </div>
                <?php endfor; ?>
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
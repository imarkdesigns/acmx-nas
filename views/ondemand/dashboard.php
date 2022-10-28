<main id="main" class="main" role="main">
    <div class="dashboard | uk-grid-collapse uk-grid-match" uk-grid>

        <div class="uk-width-expand@l uk-flex-stretch">
            <div class="uk-grid-collapse" uk-grid>
                <div class="my-properties | uk-width-1-2@m uk-background-light">
                    <hgroup> <h1>My Properties</h1> </hgroup>
                    <div>
                        <?php do_action( 'propertyList' ); ?>
                    </div>
                </div>
                <div class="top-news | uk-width-1-2@m uk-background-light-muted">
                    <hgroup> <h2>NAS Top News</h2> </hgroup>
                    <div>
                        <?php do_action( 'sticky_newsList' ); ?>
                        <ul class="tn-list" hidden>
                            <?php for ( $i = 0; $i < 2; $i++ ) : ?>
                            <li class="tn-item">
                                <div class="featured-news | uk-card uk-card-body uk-card-small uk-grid-collapse" uk-grid>
                                    <div class="uk-card-media-left uk-cover-container uk-width-auto">
                                        <img src="//placem.at/places?w=640&h=360&txt=0&random=2<?=$i?>" alt="" uk-cover>
                                        <canvas width="240" height="180"></canvas>
                                    </div>
                                    <div class="uk-width-expand">
                                        <div class="uk-panel">
                                            <h2 class="title">Lorem ipsum dolor, sit amet.</h2>
                                            <div class="description">2200 Bentonville is a newly constructed, two-story 30,829 square foot Class “A” office building. The property is located at 2200…</div>
                                            <a href="#" class="uk-text-meta">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endfor;
                            for ( $i = 0; $i < 6; $i++ ) : ?>
                            <li class="tn-item">
                                <div class="uk-card uk-card-body uk-card-small uk-grid-collapse" uk-grid>
                                    <div class="uk-card-media-left uk-cover-container uk-width-auto">
                                        <img src="//placem.at/places?w=640&h=360&txt=0&random=3<?=$i?>" alt="" uk-cover>
                                        <canvas width="150" height="150"></canvas>
                                    </div>
                                    <div class="uk-width-expand">
                                        <div class="uk-panel">
                                            <h2 class="title">Title</h2>
                                            <div class="description">2200 Bentonville is a newly constructed, two-story 30,829 square foot Class “A” office building. The property is located at 2200…</div>
                                            <a href="#" class="uk-text-meta">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endfor; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- End of Property|News -->

        <?php
        get_template_part( _opt.'ondemand-investments' ); ?>

    </div>
</main>
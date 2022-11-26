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
                    <?php the_field( 'hdr_content' ); ?>
                </div>
            </div>
        </div>

    </div>
</header>

<main id="main" class="main" role="main">

    <section class="team-lists | uk-section">
        <div class="uk-container">

            <div class="uk-child-width-1-2@s uk-child-width-1-3@l uk-grid-match" uk-grid>
                <?php do_action( 'teamList' ); ?>
            </div>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <?php 
    do_action( 'newsList', '', null ); ?>  

</main>
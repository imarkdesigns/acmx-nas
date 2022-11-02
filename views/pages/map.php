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

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <?php 
    do_action( 'newsList', '', 'rand' ); ?>

</main>
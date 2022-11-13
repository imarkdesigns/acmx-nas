<?php
// Map Header Settings
$map_hdr_content = get_field( 'hdr_content' );
?>
<main id="main" class="main" role="main">

    <aside class="map-legend | uk-panel uk-padding-small">
        <div class="uk-container uk-container-expand" uk-overflow-auto>
            <h1>NAS Map</h1>
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
        <div class="uk-panel uk-text-center">
            <?php echo strip_tags($map_hdr_content); ?>
        </div>
        <?php echo do_shortcode( '[elfsight_google_maps id="1"]' ); ?>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <?php 
    do_action( 'newsList', '', null ); ?>

</main>
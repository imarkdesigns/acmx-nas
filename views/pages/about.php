<?php
// About Lead
$specialization = get_field( 'aboutNAS_introduction' );
$spec_bg = get_field( 'aboutNAS_introduction_settings' );

if ( $spec_bg['settings_selections'] == 'Background Image' ) {
    $data_img = $spec_bg['background_photo'];
    $cls_attr = 'data-src=" '.$data_img['url'].'" uk-img';
    $cls_light = 'uk-light';
} else {
    $cls_attr = '';
    $cls_light = '';
}

// About Track Record
$nas_brand = get_field( 'aboutNAS_management' );
$hdr_track = get_field( 'track_record', 'options' );

// About Commercial
$nas_resources = get_field( 'aboutNAS_resources' );
$nas_property = get_field( 'aboutNAS_asset_property' );

// About Services
$nas_services_lead = get_field( 'aboutNAS_lead' );
$nas_services = get_field( 'aboutNAS_services' );

?>
<main id="main" class="main" role="main">

    <?php if ( $spec_bg['background_photo']['subtype'] == 'mp4' ) : ?>
    <div class="about-lead-video">
        <div class="uk-cover-container uk-light">
            <video src="<?php echo $spec_bg['background_photo']['url']; ?>" muted playsinline loop uk-cover uk-video="autoplay: true"></video>
            <canvas width="1920" uk-height-viewport="min-height: 667"></canvas>

            <div class="uk-overlay uk-position-cover uk-flex uk-flex-center uk-flex-middle">
                <div class="uk-text-center uk-width-2xlarge" uk-scrollspy="cls: uk-animation-slide-top-medium; delay: 300; repeat: true">
                    <?php echo $specialization; ?>
                </div>
            </div>
        </div>
    </div>
    <?php else : ?>
    <div hidden class="about-lead | uk-section uk-section-xlarge uk-flex uk-flex-center uk-flex-middle uk-text-center <?php echo $cls_light; ?>" uk-height-viewport <?php echo $cls_attr; ?>>
        <div class="uk-container uk-container-small">
            <?php echo $specialization; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="about-track-record | uk-section uk-section-secondary uk-section-large uk-flex uk-flex-center uk-flex-middle uk-text-center uk-position-z-index-negative" uk-sticky="position: bottom; overflow-flip: true; start: -100%; end: 0">
        <div class="uk-container uk-container-small">
            <article class="uk-article uk-margin-large-bottom">
                <?php echo $nas_brand; ?>
            </article>
            <div class="track-record-wrapper | uk-grid-collapse uk-grid-match uk-text-center" uk-grid>
                <div class="uk-width-1-1 uk-width-1-5@s">
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value counter"><?php echo $hdr_track['tr_clients_served']; ?></span>
                        <span class="track-caption">Client Served</span>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-1-5@s">
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value counter"><?php echo $hdr_track['tr_assets_refinanced']; ?></span>
                        <span class="track-caption">Assets Refinanced</span>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-1-5@s">
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value counter"><?php echo $hdr_track['tr_assets_sold']; ?></span>
                        <span class="track-caption">Assets Sold</span>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-1-5@s">
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value counter"><?php echo $hdr_track['tr_properties']; ?></span>
                        <span class="track-caption">Properties</span>                        
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-1-5@s">
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value counter"><?php echo $hdr_track['tr_states']; ?></span>
                        <span class="track-caption">States</span>
                    </div>
                </div>

                <div class="uk-width-1-1 uk-width-1-3@s">
                    <div class="uk-tile uk-tile-orange uk-padding-small">
                        <span class="track-value">$<span class="counter"><?php echo $hdr_track['tr_cash_distribution']; ?></span> <small>million</small></span>
                        <span class="track-caption">Total Cash Distribution <br> Delivered</span>
                    </div>
                </div>                
                <div class="uk-width-1-1 uk-width-1-3@s">
                    <div class="uk-tile uk-tile-light-orange uk-padding-small">
                        <span class="track-value">$<span class="counter"><?php echo $hdr_track['tr_portfolio_value']; ?></span> <small>billion</small></span>
                        <span class="track-caption">Managed Portfolio <br> Value</span>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-1-3@s">
                    <div class="uk-tile uk-tile-dark-orange uk-padding-small">
                        <span class="track-value"><span class="counter"><?php echo $hdr_track['tr_portfolio_sf']; ?></span> <small>million</small></span>
                        <span class="track-caption">Managed Portfolio <br> Square Footage</span>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <section class="about-commercial | uk-section">
        <div class="uk-container uk-container-small">
            <div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
                <div>
                    <article class="uk-article">
                        <?php echo remove_empty_p($nas_resources); ?>
                    </article>
                </div>
                <div>
                    <article class="uk-article">
                        <?php echo remove_empty_p($nas_property); ?>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); 

    if ( !empty( $nas_services_lead ) ) : ?>
    <section class="about-lead-services | uk-section uk-section-xlarge">
        <div class="uk-container uk-container-small uk-text-center">
            <div class="uk-text-lead"><?php echo remove_empty_p($nas_services_lead); ?></div>
        </div>
    </section>
    <?php endif; 

    if ( !empty( $nas_services ) ) : ?>
    <section class="about-services | uk-section uk-section-muted">
        <div class="uk-container uk-container-small">            
            <?php echo remove_empty_p($nas_services); ?>
        </div>
    </section>
    <?php endif; ?>

</main>
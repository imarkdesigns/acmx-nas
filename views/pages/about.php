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

    <div class="about-lead | uk-section uk-section-xlarge uk-flex uk-flex-center uk-flex-middle uk-text-center <?php echo $cls_light; ?>" uk-height-viewport <?php echo $cls_attr; ?>>
        <div class="uk-container uk-container-small">
            <?php echo $specialization; ?>
        </div>
    </div>

    <div class="about-track-record | uk-section uk-section-secondary uk-flex uk-flex-center uk-flex-middle uk-text-center uk-position-z-index-negative" uk-sticky="position: bottom; overflow-flip: true; start: -100%; end: 0">
        <div class="uk-container uk-container-small">
            <article class="uk-article uk-margin-large-bottom">
                <?php echo $nas_brand; ?>
            </article>
            <div class="track-record-wrapper | uk-child-width-1-2 uk-child-width-1-3@s uk-grid-collapse uk-grid-match uk-text-center" uk-grid>
                <div>
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value"><?php echo $hdr_track['tr_assets_refinanced']; ?></span>
                        <span class="track-caption">Assets Refinanced</span>
                    </div>
                </div>
                <div>
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value"><?php echo $hdr_track['tr_assets_sold']; ?></span>
                        <span class="track-caption">Assets Sold</span>
                    </div>
                </div>
                <div>
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value"><?php echo $hdr_track['tr_properties']; ?></span>
                        <span class="track-caption">Properties</span>                        
                    </div>
                </div>
                <div>
                    <div class="uk-tile uk-tile-blue uk-padding-small">
                        <span class="track-value"><?php echo $hdr_track['tr_states']; ?></span>
                        <span class="track-caption">States</span>
                    </div>
                </div>
                <div>
                    <div class="uk-tile uk-tile-dark-green uk-padding-small">
                        <span class="track-value"><?php echo '$'.$hdr_track['tr_portfolio_value']; ?> <small>billion</small></span>
                        <span class="track-caption">Managed Portfolio <br> Value</span>
                    </div>
                </div>
                <div>
                    <div class="uk-tile uk-tile-orange uk-padding-small">
                        <span class="track-value"><?php echo $hdr_track['tr_portfolio_sf']; ?> <small>million</small></span>
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
                        <?php echo $nas_resources; ?>
                    </article>
                </div>
                <div>
                    <article class="uk-article">
                        <?php echo $nas_property; ?>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <section class="about-lead-services | uk-section uk-section-xlarge">
        <div class="uk-container uk-container-small uk-text-center">
            <div class="uk-text-lead"><?php echo $nas_services_lead; ?></div>
        </div>
    </section>

    <section class="about-services | uk-section uk-section-muted">
        <div class="uk-container uk-container-small">            
            <?php echo $nas_services; ?>
        </div>
    </section>

</main>
<?php
// Loan Maturity Header Settings
$am_hdr_content = get_field( 'hdr_content' );
$am_hdr_bg = get_field( 'hdr_photo' );

$assets = get_field( 'am_list' );

?>
<header data-fragment="hero" class="asset-hdr | uk-flex uk-flex-middle uk-light" data-src="<?php echo ( $am_hdr_bg ) ? $am_hdr_bg['url'] : 'https://placem.at/places?w=1920&h=550&txt=0&random=1' ?>" uk-img>
    <div class="uk-width-1-1">
        <div class="uk-container uk-container-small">
            <?php echo $am_hdr_content; ?>
        </div>
    </div>

    <div class="uk-position-small uk-position-bottom-left uk-width-1-1 uk-light">
        <div class="hdr-caption | uk-container uk-container-small">
            <?php echo nl2br($am_hdr_bg['description']); ?>
        </div>
    </div>
</header>

<main id="main" class="main" role="main">

    <?php /*
    <aside class="assets-legend | uk-panel uk-padding-small" uk-sticky="start: 0; animation: uk-animation-slide-top; end: 1920" hidden>
        <div class="uk-container uk-container-expand" uk-overflow-auto>
            <ul class="uk-subnav">
                <li><a href="#office" uk-scroll="">Office</a></li>
                <li><a href="#retail" uk-scroll="">Retail</a></li>
                <li><a href="#multifamily" uk-scroll="">Multifamily</a></li>
                <li><a href="#industrial" uk-scroll="">Industrial</a></li>
                <li><a href="#student" uk-scroll="">Student Housing</a></li>
                <li><a href="#senior" uk-scroll="">Senior Assisted Living</a></li>
            </ul>
        </div>
    </aside>

    <picture class="uk-card-media-top uk-cover-container" hidden>
        echo wp_get_attachment_image( $fphoto['id'], 'full' );
        <div class="uk-overlay-primary uk-position-cover"></div>
        <div class="uk-overlay uk-position-bottom-center uk-light">
            echo $fphoto['caption']
        </div>
    </picture>    
    */

    foreach ( $assets as $asset ) :

    $category = strtolower($asset['category_type']);
    $category = str_replace( ' ', '', $category );
    $readmore = $asset['button_label'];
    $content  = $asset['aml_lead_content'];
    $excerpt  = $asset['asset_excerpt_content'];

    $fphotos  = $asset['aml_photo'];

    // echo '<pre>';
    // var_dump($fphoto);
    // echo '</pre>';

    ?>
    <section id="<?php echo $category; ?>" class="am-<?php echo $category; ?> | uk-section uk-section-xsmall">
        <div class="uk-container uk-container-small">

            <article class="uk-card">
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="clsActivated: uk-transition-active; center: true">
                    <ul class="uk-slider-items uk-grid">
                        <?php foreach ( $fphotos as $photos ) : ?>
                        <li class="uk-width-1-1">
                            <div class="uk-panel">
                                <?php echo wp_get_attachment_image( $photos['id'], 'full' );

                                if ( !empty($photos['caption']) ) : ?>
                                <div class="slideshow-caption | uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                                    <?php echo $photos['caption'] ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" aria-label="Previous" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" aria-label="Next" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>

                <div class="uk-card-body uk-text-center">
                    <?php echo $content; ?>
                    <div class="uk-text-center uk-margin-medium-top">
                        <button type="button" class="uk-button uk-button-primary" uk-toggle="target: #<?php echo $category; ?>Modal"><?php echo $readmore; ?></button>
                    </div>
                </div>
            </article>
            <div id="<?php echo $category; ?>Modal" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close aria-label="Close Modal"></button>
                    <?php echo $excerpt; ?>
                </div>
            </div>

        </div>
    </section>
    <?php endforeach; ?>

</main>
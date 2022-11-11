<?php get_header(); 

$title       = get_the_title();
$nominal     = get_field( 'profile_postnominal' );
$designation = get_field( 'profile_designation' ); 
$cabreID = get_field( 'profile_cabre' );
$email   = get_field( 'profile_email' );
$office  = get_field( 'profile_phone_office' );
$direct  = get_field( 'profile_phone_direct' );
$social  = get_field( 'profile_social' );
$vcard   = get_field( 'profile_vcard' );

$profile_bg = get_field( 'profile_bio_bg' );
$sidephoto = get_field( 'profile_sidephoto' );
$bio = get_field( 'profile_bio' );
// $journal = get_field( 'profile_journal' );
$journal = get_field( 'profile_journal_info' );
$trivia = get_field( 'profile_trivia' );

// Trigger for WPForms
$_GET['direct_mail'] = $email;

?>
<header data-fragment="hero" class="profile" data-src="<?php echo ( $profile_bg ) ? $profile_bg['url'] : _uri.'/resources/images/novanta-team.jpg'; ?>" uk-img>
    <div class="profile-heading | uk-container uk-container-expand">
        <div class="uk-panel">
            <a href="<?php echo get_permalink( 19 ) ?>" class="uk-link-reset" targe="_self"> <span uk-icon="arrow-left"></span> Back to Team </a>
            <h1><?php echo $title ?><?php echo !empty($nominal) ? ', <span class="uk-text-meta">'. $nominal .'</span>' : ''; ?></h1>
            <p><?php echo $designation; ?></p>
        </div>
    </div>
    <div class="profile-headline">
        <div class="headline-grid">
            <div class="hl-image">
                <figure>
                    <?php $featuredID = get_post_thumbnail_id();
                    echo wp_get_attachment_image( $featuredID, [ 450, 9999, true ] ); ?>
                    <ul>
                        <?php if ( $social ) : ?>
                        <li class="icon-linkedin">
                            <a href="<?php echo $social; ?>" target="_blank">
                                <img src="<?php echo _uri.'/resources/images/icon-linkedin.png'; ?>" alt="LinkedIn">
                            </a>
                        </li>
                        <?php endif;
                        if ( $email ) : ?>
                        <li class="icon-connections">
                            <a href="#wpforms-direct-contact" uk-toggle>
                                <img src="<?php echo _uri.'/resources/images/icon-email.png'; ?>" alt="Send Direct Message">
                            </a>
                            <?php if ( $vcard ) : ?>
                            <a href="<?php echo $vcard['url']; ?>" download>
                                <img src="<?php echo _uri.'/resources/images/icon-vcf_download.png'; ?>" alt="Download Contact Info">
                            </a>
                            <?php endif; ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </figure>
            </div>
            <div class="hl-details">
                <div class="uk-panel uk-padding uk-light">
                    <h2>Professional Profile</h2>
                    <?php if ( !empty( $office || $direct ) ) : ?>
                    <address>
                        <?php echo !empty($cabreID) ? 'CA BRE: '. $cabreID : ''; ?><br>
                        <?php echo !empty($office) ? 'Office: '.$office : ''; ?> <br>
                        <?php echo !empty($direct) ? 'Direct: '.$direct : ''; ?>
                    </address>
                    <hr class="uk-divider-small">
                    <?php endif; ?>
                    <?php the_field( 'profile_lead' ); ?>
                    <?php if ( $bio ) : ?>
                    <div class="uk-button-group uk-margin-medium-top uk-light">
                        <a href="#bio" class="uk-button uk-button-default" uk-scroll="offset: 70">Contnue Reading</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<main id="main" class="main" role="main">

    <section class="bio | uk-section uk-section-xlarge uk-section-medium-dark uk-light">
        <?php if ( $bio ) :  ?>
        <div class="uk-container uk-container-large">

            <article id="bio" class="uk-article uk-child-width-1-2@m uk-grid-large uk-flex-middle" uk-grid>
                <div>
                    <figure class="side-photo">
                        <?php if ( $sidephoto ) : ?>
                        <div class="uk-position-relative uk-light" tabindex="-1" uk-slider="clsActivated: uk-transition-active; center: true">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-flex-middle">
                                <?php foreach ( $sidephoto as $photo ) : ?>
                                <li> 
                                    <div class="uk-panel">
                                        <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>">
                                        <?php if ( !empty( $photo['caption'] ) ) : ?>
                                        <div class="slideshow-caption | uk-overlay uk-overlay-primary uk-position-bottom uk-padding-small uk-transition-slide-bottom">
                                            <?php echo $photo['caption']; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="uk-position-center-left uk-position-small" aria-label="Previous" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small" aria-label="Next" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>
                        <?php else : 
                            echo '<img src="'. _uri.'/resources/images/img-bio-featured-photo.jpg' .'" width="800" height="900" alt="'. $title .'">';
                        endif; ?>
                    </figure>
                </div>
                <div class="uk-flex-last uk-flex-first uk-flex-last@m">
                    <article class="uk-article">
                        <?php echo $bio; ?>
                    </article>
                </div>
            </article>

        </div>
        <?php endif; ?>
    </section>

    <?php if ( !empty($journal['featured_photo']) || !empty($journal['journal']) ) : ?>
    <section class="get-to-know | uk-section">
        <div class="uk-container uk-container-small">
            
            <article class="uk-article">
                <div class="uk-grid-large uk-flex-middle" uk-grid>
                    <div class="uk-width-1-2@m">
                        <div class="uk-panel">
                            <h2>Get to Know <br> <?php echo $title; ?></h2>
                            <?php echo $journal['journal']; ?>
                        </div>
                    </div>
                    <?php if ( !empty($journal['featured_photo']) ) : ?>
                    <div class="uk-width-1-2@m">
                        <div class="uk-panel">
                            <figure class="uk-inline">
                                <?php echo wp_get_attachment_image( $journal['featured_photo']['id'], 'full' ); ?>
                                <figcaption>
                                    <p><?php echo $journal['featured_photo']['caption']; ?></p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </article>

        </div>
    </section>
    <?php endif; 

    if ( $trivia ) : ?>
    <section class="did-you-know | uk-section uk-flex uk-flex-center">
        <article class="uk-article uk-background-muted uk-text-center uk-width-3xlarge uk-padding-large">
            <h2>Did You Know?</h2>
            <?php echo $trivia; ?>
        </article>
    </section>
    <?php endif; ?>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

</main>

<div id="wpforms-direct-contact" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close aria-label="Close Modal"></button>

        <h2>You're sending message to <?php echo $title; ?></h2>
        <?php echo do_shortcode( '[wpforms id="1906"]' ); ?>

    </div>
</div>

<?php get_footer();
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

$sidephoto = get_field( 'profile_sidephoto' );
$bio = get_field( 'profile_bio' );
$journal = get_field( 'profile_journal' );

?>
<header data-fragment="hero" class="profile" data-src="<?php echo _uri.'/resources/images/novanta-team.jpg'; ?>" uk-img>
    <div class="profile-heading | uk-container uk-container-expand">
        <div class="uk-panel">
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
                        <li class="icon-linkedin">
                            <a href="#" target="_blank">
                                <img src="<?php echo _uri.'/resources/images/icon-linkedin.png'; ?>" alt="LinkedIn">
                            </a>
                        </li>
                        <li class="icon-connections">
                            <a href="#" uk-toggle>
                                <img src="<?php echo _uri.'/resources/images/icon-email.png'; ?>" alt="Send Direct Message">
                            </a>
                            <a href="#" download>
                                <img src="<?php echo _uri.'/resources/images/icon-vcf_download.png'; ?>" alt="Download Contact Info">
                            </a>
                        </li>
                    </ul>
                </figure>
            </div>
            <div class="hl-details">
                <div class="uk-panel uk-padding uk-light">
                    <h2>Professional Profile</h2>
                    <address>
                        <?php echo !empty($cabreID) ? 'CA BRE: '. $cabreID : ''; ?><br>
                        Office: <?php echo $office; ?> <br>
                        Direct: <?php echo $direct; ?>
                    </address>
                    <hr class="uk-divider-small">
                    <?php the_field( 'profile_lead' ); ?>
                    <div class="uk-button-group uk-margin-medium-top uk-light">
                        <a href="#bio" class="uk-button uk-button-default" uk-scroll>Contnue Reading</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main id="main" class="main" role="main">

    <?php if ( $bio ) : ?>
    <section class="bio | uk-section uk-section-xlarge uk-section-medium-dark uk-light">
        <div class="uk-container uk-container-large">

            <article id="bio" class="uk-article uk-child-width-1-2@m uk-grid-large uk-flex-middle" uk-grid>
                <div>
                    <figure class="side-photo">
                        <?php if ( $sidephoto ) : ?>
                        <div class="uk-position-relative uk-light" tabindex="-1" uk-slider>
                            <ul class="uk-slider-items uk-child-width-1-1 uk-flex-middle">
                                <?php foreach ( $sidephoto as $photo ) : ?>
                                <li> <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>"> </li>
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
                    <article class="uk-article uk-dropcap">
                        <?php echo $bio; ?>
                    </article>
                </div>
            </article>

        </div>
    </section>
    <?php endif; 

    if ( $journal ) : ?>
    <section class="get-to-know | uk-section">
        <div class="uk-container uk-container-large">
            
            <h2>Getting to Know <?php echo $title; ?></h2>
            <article class="uk-article">
                <?php echo $journal; ?>
            </article>

        </div>
    </section>
    <?php endif; ?>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

</main>
<?php get_footer();
<?php
// Loan Maturity Header Settings
$pm_hdr_content = get_field( 'hdr_content' );
$pm_hdr_bg = get_field( 'hdr_photo' );

?>
<header data-fragment="hero" class="property-hdr | uk-flex uk-flex-middle uk-light" data-src="<?php echo ( $pm_hdr_bg ) ? $pm_hdr_bg['url'] : '//placem.at/places?w=1920&h=550&txt=0&random=1' ?>" uk-img>
    <div class="uk-width-1-1">
        <div class="uk-container uk-container-small">
            <?php echo $pm_hdr_content; ?>
        </div>
    </div>

    <div class="uk-position-small uk-position-bottom-left uk-width-1-1 uk-light">
        <div class="hdr-caption | uk-container uk-container-small">
            <?php echo nl2br($pm_hdr_bg['description']); ?>
        </div>
    </div>     
</header>

<main id="main" class="main" role="main">

    <section class="property-management-content | uk-section">
        <div class="uk-container uk-container-small">
            <?php the_content(); ?>
        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>
    
</main>
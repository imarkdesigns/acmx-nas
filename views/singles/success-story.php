<?php get_header(); ?>

<header data-fragment="hero" class="story-single | uk-flex uk-flex-center uk-flex-middle uk-text-center">
    <div class="stories-header | uk-padding-large">
        <h1 class="uk-margin-bottom"><?php the_title(); ?></h1>
        <address class="property-location"><?php the_field( 'ss_location' ); ?></address>
        <picture class="uk-box-shadow-medium">
        <?php if ( has_post_thumbnail( get_the_ID() ) ) {
            $featuredID = get_post_thumbnail_id( get_the_ID() );
            echo wp_get_attachment_image( $featuredID, 'full' );
        } else {
            echo '<picture class="story-item-image"> <img src="//placem.at/places?w=1280&h=720&txt=0&random='.get_the_ID().'" alt="'.get_the_title().'"> </picture>';
        } ?>
        </picture>   
    </div>
</header>

<main id="main" class="main" role="main">

    <section class="story-details | uk-section uk-section-muted">
        <div class="uk-container uk-container-small">
            
            <p class="uk-text-lead"> <?php the_field( 'ss_lead' ); ?> </p>
            <div class="uk-text-center"> <hr class="uk-divider-small uk-margin-medium"> </div>
            <?php the_field( 'ss_details' ); ?>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <?php 
    $pageID = get_the_ID();
    do_action( 'storiesList', $pageID ); ?>

</main>
<?php get_footer();
<main id="main" class="main" role="main">

    <section <?php post_class('uk-section |'); ?>>
        <article class="uk-article uk-container uk-container-small">
        <?php
            $post_id = get_the_ID();

            // Display Title
            the_title( '<h1 class="uk-text-center">', '</h1>' );

            // Display attached Photo
            if ( has_post_thumbnail( $post_id ) ) {
                $featuredID = get_post_thumbnail_id( $post_id );
                echo wp_get_attachment_image( $featuredID, 'full' );
            }
            
            // Display Content
            the_content();
        ?>
        </article>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <?php 
    do_action( 'newsList', get_the_ID(), 'rand' ); ?>

</main>
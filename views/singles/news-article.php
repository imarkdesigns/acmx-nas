<main id="main" class="main" role="main">

    <section <?php post_class('uk-section |'); ?>>
        <article class="uk-article uk-container uk-container-small">
        <?php
            $post_id = get_the_ID();
            $date_stamp = strtotime(get_the_date());
            $post_date = date('F j, Y', $date_stamp);

            // Display Title
            the_title( '<h1 class="uk-text-center">', '</h1>' );
            echo '<time class="uk-display-block uk-text-center uk-text-meta" datetime="'.get_the_date('c').'" itemprop="datePublished">'.$post_date.'</time>';

            // Display attached Photo
            echo '<figure>';
            if ( has_post_thumbnail( $post_id ) ) {
                $featuredID = get_post_thumbnail_id( $post_id );
                echo wp_get_attachment_image( $featuredID, 'full' );
            }
            echo '</figure>';
            
            // Display Content
            the_content();
        ?>
        </article>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

    <?php 
    do_action( 'newsList', get_the_ID(), null ); ?>

</main>
<?php
// Success Stories Header Settings
$ss_hdr_content = get_field( 'hdr_content' );

// Story Listing
$story_list = get_posts([
    'post_type' => [ 'nas-stories' ],
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'DESC',
]);
?>

<header data-fragment="hero" class="stories | uk-flex uk-flex-center uk-flex-middle uk-text-center">
    <div class="stories-banner | uk-padding-large">
        <?php echo $ss_hdr_content; ?>
    </div>
</header>

<main id="main" class="main uk-position-relative" role="main">

    <section class="stories-lists | uk-section uk-section-light-muted uk-light">
        <div class="uk-container">

            <div class="uk-child-width-1-2@s uk-grid-large" uk-grid uk-scrollspy="target: .uk-position-relative; cls: uk-animation-slide-bottom-small; delay: 500">
                <?php foreach ( $story_list as $story ) : 
                $post_id = $story->ID;
                $post_title = $story->post_title;
                
                $ss_location = get_field( 'ss_location', $post_id ); 
                ?>
                <div>
                    <figure id="story-id<?php echo $post_id; ?>" <?php post_class( 'uk-position-relative', $post_id ); ?>>
                        <div class="uk-cover-container">
                            <?php if ( has_post_thumbnail( $post_id ) ) {
                                $featuredID = get_post_thumbnail_id( $post_id );
                                echo wp_get_attachment_image( $featuredID, 'full' );
                            } else {
                                echo '<picture class="story-item-image"> <img src="//placem.at/places?w=1280&h=720&txt=0&random='.$post_id.'" alt="'.$post_title.'"> </picture>';
                            } ?>
                        </div>
                        <figcaption>
                            <span class="story-title"><?php echo $post_title.' <small>'.$ss_location.'</small></span>'; ?>
                        </figcaption>
                        <a href="<?php echo get_permalink( $post_id ); ?>" class="uk-position-cover" aria-describedby="story-id<?php echo $post_id; ?>" aria-label="read more" role="link"></a>
                    </figure>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

</main>
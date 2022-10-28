<?php 
// Client Comments Header Settings
$cc_hdr_content = get_field( 'hdr_content' );

// Client Comments Listing
$comment_list = get_posts([
    'post_type' => [ 'nas-comments' ],
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'ASC',
]);
?>

<header data-fragment="hero" class="comments | uk-flex uk-flex-center uk-flex-middle uk-text-center">
    <div class="comments-banner | uk-padding-large">
        <?php echo $cc_hdr_content; ?>
    </div>
</header>

<main id="main" class="main uk-position-relative" role="main">

    <section class="comments-lists | uk-section">
        <div class="uk-container uk-container-small">

            <div class="uk-child-width-1-2@m uk-grid-large" uk-grid>
                <?php foreach ( $comment_list as $comment ) :
                $post_id = $comment->ID;
                $post_title = $comment->post_title;
                
                $cc_content = get_field( 'cc_comments', $post_id );
                $cc_location = get_field( 'cc_location', $post_id );
                $cc_designation = get_field( 'cc_designation', $post_id );
                $cc_property = get_field( 'cc_property', $post_id );
                $cc_media = get_field( 'cc_media', $post_id );

                $featuredID = get_post_thumbnail_id( $post_id );
                ?>
                <div>
                    <figure class="uk-cover-container">
                        <?php if ( has_post_thumbnail( $post_id ) ) {
                            echo wp_get_attachment_image( $featuredID, 'full' );
                        } else {
                            echo '<img src="//placem.at/places?w=640&h=360&txt=0&random='.$post_id.'" alt="'.$post_title.'">';
                        } ?>

                        <figcaption class="uk-overlay uk-overlay-primary uk-position-bottom">
                            <h2 hidden>Holly Krupnick, Encino, CA <small>Investor | Town East</small></h2>
                            <h2><?php echo $post_title.', '.$cc_location.' <small>'.$cc_designation.' | '.$cc_property.'</small>'; ?></h2>
                            <button type="button" tabindex="0" uk-toggle="target: #modal-containerID<?php echo $post_id; ?>; animation: uk-animation-fade" aria-label="read comment"><span uk-icon="icon: plus; ratio: .8"></span></button>
                        </figcaption>
                    </figure>
                </div>
                <div id="modal-containerID<?php echo $post_id; ?>" class="comments-modal | uk-flex-top" uk-modal>
                    <div class="uk-modal-dialog uk-margin-auto-vertical">
                        <button class="uk-modal-close-default" type="button" uk-close aria-label="close modal"></button>
                        <div class="uk-modal-header">
                            <picture class="uk-cover-container">
                                <img src="<?php echo get_the_post_thumbnail_url( $post_id ); ?>" alt="<?php echo $post_title; ?>" uk-cover>
                                <canvas width="600" height="180"></canvas>
                            </picture>
                            <div class="uk-overlay uk-position-cover">
                                <h2><?php echo $post_title.', '.$cc_location.' <small>'.$cc_designation.' | '.$cc_property.'</small>'; ?></h2>
                            </div>
                        </div>
                        <div class="uk-modal-body uk-padding">
                            <?php echo $cc_content; 

                            if ( $cc_media ) : 
                            $url = explode( '=', $cc_media ); ?>
                            <hr class="uk-divider-small uk-margin">
                            <iframe src="https://www.youtube-nocookie.com/embed/<?php echo $url[1]; ?>?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="640" height="360" allowfullscreen uk-responsive uk-video="automute: true"></iframe>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <?php
    get_template_part( _opt.'ondemand-banner' ); ?>

</main>
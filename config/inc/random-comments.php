<?php
function randomComments() { 

$comments = get_posts([
    'post_type' => [ 'nas-comments' ],
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'has_password' => false,
    'orderby' => 'rand',
    'meta_key' => 'featured_comment',
    'meta_value' => '1'
]);

if ( $comments ) : ?>
<section class="comments | uk-section">
    <div class="uk-container uk-container-expand">

        <div class="uk-grid-large uk-flex-middle" uk-grid>
            <div class="uk-width-1-2@l">
                <div class="uk-position-relative">
                    <div uk-slideshow="animation: pull; autoplay: true; min-height: 360; max-height: 510">
                        <div class="uk-visible-toggle uk-light" tabindex="-1">
                            <ul class="uk-slideshow-items">
                                <?php for ( $i = 0; $i < 3; $i++ ) : ?>
                                <li>
                                    <img src="//placem.at/places?w=1280&h=720&txt=0&random=1<?=$i?>" alt="" uk-cover>
                                    <div class="slideshow-caption | uk-overlay uk-overlay-primary uk-position-bottom uk-transition-slide-bottom">
                                        Sample Caption Details
                                    </div>
                                </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        <div class="uk-flex uk-flex-right uk-margin-small-top">                         
                            <ul class="uk-slideshow-nav uk-dotnav">
                                <?php for ( $i = 0; $i < 3; $i++ ) : ?>
                                <li uk-slideshow-item="<?=$i?>"><a href="#" aria-label="Slide Item"></a></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-expand@l uk-flex-first uk-flex-last@l">
                <div class="featured-comments | uk-panel">
                    <div class="uk-headings">
                        <span uk-icon="icon: quote-right; ratio: 5"></span>
                        <h2><small>National Asset Services</small> Client Comments</h2>
                    </div>
                    <?php foreach ( $comments as $comment ) :
                    $post_id = $comment->ID;
                    $post_title = $comment->post_title;
                    $cc_content = get_field( 'cc_comments', $post_id );
                    $cc_location = get_field( 'cc_location', $post_id );
                    $cc_designation = get_field( 'cc_designation', $post_id );
                    $cc_property = get_field( 'cc_property', $post_id );
                    ?>
                    <blockquote class="uk-margin-large-bottom">
                        <?php echo $cc_content; ?>
                        <footer> <?php echo $post_title.', '.$cc_location.' <br> '.$cc_designation.' | '.$cc_property; ?> </footer>
                    </blockquote>
                    <?php endforeach; ?>
                    <div class="uk-text-center">
                        <a href="<?php echo get_permalink( 23 ); ?>" class="uk-button uk-button-primary">Read More Client Comments</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php endif;

}
add_action( 'randomComments', 'randomComments' );
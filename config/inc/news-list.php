<?php
function newsList( $postID, $orderby ) {

$sticky = get_option( 'sticky_posts' );
$news_list = get_posts([
    'post_type' => [ 'post' ],
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'has_password' => false,
    'orderby' => ( $orderby == null ) ? 'menu_order' : $orderby,
    'order' => 'ASC',
    'post__not_in' => [ $postID, $sticky ],
]); 

if ( $news_list ) : ?>
<section class="news-module | uk-section">
    <div class="uk-container uk-container-expand">

        <div class="uk-position-relative" tabindex="-1" uk-slider="finite: true" aria-labelledby="news-heading">
            <ul class="uk-slider-items uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-5@xl uk-grid"  role="list">
                <!-- News Ads -->
                <li class="news-intro" role="listitem">
                    <div id="news-heading" class="uk-panel">
                        <h2><small>National Asset Services</small> News</h2>
                        <p>Timely news articles about NAS and properties in the NAS portfolio.</p>
                        <a href="<?php echo get_permalink( 35 ); ?>" class="readmore">read more</a>
                    </div>
                </li>
                <?php foreach ( $news_list as $news ) :
                $post_id = $news->ID;
                $post_title = $news->post_title;
                $term_cat = get_the_terms( $post_id, 'category' );
                ?>
                <li role="listitem">
                    <figure class="uk-inline">
                        <?php if ( has_post_thumbnail( $post_id ) ) {
                            $featuredID = get_post_thumbnail_id( $post_id );
                            echo wp_get_attachment_image( $featuredID, 'news-module' );
                        } else {
                            echo '<img src="https://placem.at/places?w=640&h=550&txt=0&random='.$post_id.'" width="640" height="550" alt="'.$post_title.'">';
                        } ?>                        
                        <figcaption class="uk-overlay-primary uk-position-cover uk-padding">
                            <span class="news-category | uk-text-meta"><?php echo $term_cat[0]->name; ?></span>
                            <h3 class="news-title"><?php echo $post_title; ?></h3>
                        </figcaption>
                        <a href="<?php echo get_permalink( $post_id ); ?>" class="uk-position-cover" aria-label="<?php echo $post_title; ?>" role="link"></a>
                    </figure>
                </li>
                <?php endforeach; ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" aria-label="Previous" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" aria-label="Next" uk-slidenav-next uk-slider-item="next"></a>                
        </div>

    </div>
</section>
<?php endif;

}
add_action( 'newsList', 'newsList', 10, 2 );
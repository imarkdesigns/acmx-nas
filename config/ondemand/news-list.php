<?php
// Dashboard News
function sticky_newsList() {

$sticky = get_option( 'sticky_posts' );
$sticky = array_slice( $sticky, 0, 2 );
$sticky_list = get_posts([
    'post_type' => [ 'post' ],
    'posts_per_page' => 2,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'ignore_sticky_posts' => 1,
    'post__not_in' => $sticky
]);

if ( $sticky ) {
    $postPerPage = '4';
} else {
    $postPerPage = '7';
}

$not_sticky = get_option( 'sticky_posts' );
$news_list = get_posts([
    'post_type' => [ 'post' ],
    'posts_per_page' => $postPerPage,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post__not_in' => $not_sticky
]);

if ( $news_list ) : ?>
<ul class="tn-list">
    <?php 
    if ( $sticky ) :
    foreach ( $sticky_list as $sticky_post ) :
    $post_id = $sticky_post->ID;
    $post_title = $sticky_post->post_title;
    $post_date = $sticky_post->post_date;
    $post_content = $sticky_post->post_content;
    ?>
    <li class="tn-item">
        <div class="featured-news | uk-card uk-card-body uk-card-small uk-grid-collapse" uk-grid>
            <div class="uk-card-media-left uk-width-auto">
                <?php if ( has_post_thumbnail( $post_id ) ) {
                    $featuredID = get_post_thumbnail_id( $post_id );
                    echo wp_get_attachment_image( $featuredID, [ 200, 200, true ] );
                } else {
                    echo '<img src="//placem.at/places?w=240&h=180&txt=0&random='.$post_id.'" alt="'.$post_title.'" uk-cover>';
                } ?>                
            </div>
            <div class="uk-width-expand">
                <div class="uk-panel">
                    <h2 class="title"><?php echo $post_title; ?></h2>
                    <div class="description | uk-margin-top"><?php echo custom_field_excerpt( $post_content, 25 ); ?></div>
                    <a href="<?php echo get_permalink( $post_id ); ?>" class="uk-text-meta uk-link-reset">Read More</a>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach;
    endif;

    foreach ( $news_list as $news ) :
    $post_id = $news->ID;
    $post_title = $news->post_title;
    $post_date = $news->post_date;
    $post_content = $news->post_content;
    ?>
    <li <?php post_class('tn-item') ?>>
        <div class="uk-card uk-card-body uk-card-small uk-grid-collapse" uk-grid>
            <div class="uk-card-media-left uk-cover-container uk-width-auto">
                <?php if ( has_post_thumbnail( $post_id ) ) {
                    $featuredID = get_post_thumbnail_id( $post_id );
                    echo wp_get_attachment_image( $featuredID, 'thumbnail', '', [ 'uk-cover' => '' ] );
                } else {
                    echo '<img src="//placem.at/places?w=240&h=180&txt=0&random='.$post_id.'" alt="'.$post_title.'" uk-cover>';
                } ?>                  
                <canvas width="150" height="150"></canvas>
            </div>
            <div class="uk-width-expand">
                <div class="uk-panel">
                    <h2 class="title | uk-margin-small-bottom"><?php echo $post_title; ?></h2>
                    <div class="description"><?php echo custom_field_excerpt( $post_content, 25 ); ?></div>
                    <a href="<?php echo get_permalink( $post_id ); ?>" class="uk-text-meta uk-link-reset">Read More</a>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; 

}
add_action( 'sticky_newsList', 'sticky_newsList' );


// Profile New
function rand_newsList() {

$rand_news_list = get_posts([
    'post_type' => [ 'post' ],
    'posts_per_page' => 5,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'ASC',
    'orderby' => 'rand'
]);

if ( $rand_news_list ) : ?>
<ul class="tn-list">
    <?php
    foreach ( $rand_news_list as $news ) :
    $post_id = $news->ID;
    $post_title = $news->post_title;
    $post_date = $news->post_date;
    $post_content = $news->post_content;
    ?>
    <li class="tn-item">
        <div class="uk-card uk-card-body uk-card-small uk-grid-collapse" uk-grid>
            <div class="uk-card-media-left uk-cover-container uk-width-auto">
                <?php if ( has_post_thumbnail( $post_id ) ) {
                    $featuredID = get_post_thumbnail_id( $post_id );
                    echo wp_get_attachment_image( $featuredID, 'thumbnail', '', [ 'uk-cover' => '' ] );
                } else {
                    echo '<img src="//placem.at/places?w=240&h=180&txt=0&random='.$post_id.'" alt="'.$post_title.'" uk-cover>';
                } ?>
                <canvas width="150" height="150"></canvas>
            </div>
            <div class="uk-width-expand">
                <div class="uk-panel">
                    <h2 class="title | uk-margin-small-bottom"><?php echo $post_title; ?></h2>
                    <div class="description"><?php echo custom_field_excerpt( $post_content, 20 ); ?></div>
                    <a href="<?php echo get_permalink( $post_id ); ?>" class="uk-text-meta uk-link-reset">Read More</a>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif;

}
add_action( 'rand_newsList', 'rand_newsList' );

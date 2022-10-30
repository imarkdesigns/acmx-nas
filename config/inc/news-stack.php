<?php
function newsStack() {

// Solo News
$news_solo = get_posts([
    'post_type' => [ 'post' ],
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'DESC',
]); 

$newsOne = [];
foreach ( $news_solo as $news ) : 
$post_id = $news->ID;
$post_title = $news->post_title;
$newsOne[] = $post_id;

$term_cat = get_the_terms( $post_id, 'category' );
$slider = get_field( 'news_gallery', $post_id ); ?>
<!-- Highlights -->
<li class="news-highlight | uk-width-1-1" role="listitem">
    <div class="uk-card uk-card-default uk-flex-middle uk-grid-collapse" uk-grid>
        <div class="uk-card-media-left uk-width-1-1@s uk-width-2-3@m">
            <?php
            if ( $slider ) : ?>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay-interval: 5000; pause-on-hover: false; autoplay: true; animation: pull">
                    <ul class="uk-slideshow-items">
                        <?php if ( has_post_thumbnail( $post_id ) ) {
                            $featuredID = get_post_thumbnail_id( $post_id );
                            echo '<li><picture>'. wp_get_attachment_image( $featuredID, [ 720, 550 ], '', [ 'uk-cover' => '' ] ) .'</picture></li>';
                        } else {
                            echo '<li><img src="//placem.at/places?w=1280&h=720&txt=0&random='.$post_id.'" width="1280" height="720" alt="'.$post_title.'"></li>';
                        }

                        foreach ( $slider as $slide ) :
                            echo '<li><picture>'. wp_get_attachment_image( $slide['id'], 'full' ) .'</picture></li>';
                        endforeach; ?>
                    </ul>
                </div>
            <?php else :
                if ( has_post_thumbnail( $post_id ) ) {
                    $featuredID = get_post_thumbnail_id( $post_id );
                    echo '<picture class="uk-cover-container">'.wp_get_attachment_image( $featuredID, 'full', '', [ 'uk-cover' ] ).'</picture>';
                    echo '<canvas width="720" height="550"></canvas>';
                } else {
                    echo '<img src="//placem.at/places?w=1280&h=720&txt=0&random='.$post_id.'" width="1280" height="720" alt="'.$post_title.'">';
                } ?>
            <?php endif; ?>
        </div>
        <div class="uk-width-1-1@s uk-width-1-3@m uk-position-relative">
            <div class="uk-card-body">
                <div class="title-category | uk-text-meta uk-margin-bottom"> <?php echo $term_cat[0]->name; ?> </div>
                <h3 class="title-headline"><?php echo $post_title; ?></h3>
            </div>
            <a href="<?php echo get_permalink( $post_id  ); ?>" class="uk-position-cover" aria-label="<?php echo $post_title; ?>" role="link"></a>
        </div>
    </div>
</li>
<?php endforeach;

// Medium News List 
// 6 Continuous News
$news_six = get_posts([
    'post_type' => [ 'post' ],
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'DESC',
    'post__not_in' => $newsOne,
]);

$newsSix = [];
foreach ( $news_six as $news ) :
$post_id = $news->ID;
$post_title = $news->post_title;
$newsSix[] = $post_id;

$term_cat = get_the_terms( $post_id, 'category' ); ?>
<li class="listitem-medium | uk-width-1-2@s uk-width-1-3@m" role="listitem">
    <div class="uk-card uk-card-default uk-card-small">
        <div class="uk-card-media-top">
        <?php if ( has_post_thumbnail( $post_id ) ) {
            $featuredID = get_post_thumbnail_id( $post_id );
            echo wp_get_attachment_image( $featuredID, 'full' );
        } else {
            echo '<img src="//placem.at/places?w=640&h=360&txt=0&random='.$post_id.'" width="640" height="360" alt="'.$post_title.'">';
        } ?>
        </div>
        <div class="uk-card-body">
            <div class="title-category | uk-text-meta uk-margin-bottom"> <?php echo $term_cat[0]->name; ?> </div>
            <h3 class="title-headline"><?php echo $post_title; ?></h3>
        </div>
        <a href="<?php echo get_permalink( $post_id  ); ?>" class="uk-position-cover" aria-label="<?php echo $post_title; ?>" role="link"></a>
    </div>
</li>
<?php endforeach;

// Small News List  
$newsIDs = array_merge($newsOne, $newsSix);

// 8 Continuous News
$news_eight = get_posts([
    'post_type' => [ 'post' ],
    'posts_per_page' => 8,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'DESC',
    'post__not_in' => $newsIDs,
]); 

$newsEight = [];
foreach ( $news_eight as $news ) :
$post_id = $news->ID;
$post_title = $news->post_title;
$newsEight[] = $post_id;

$term_cat = get_the_terms( $post_id, 'category' ); ?>
<li class="listitem-small | uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l" role="listitem">
    <div class="uk-card uk-card-default uk-card-small">
        <div class="uk-card-media-top">
        <?php if ( has_post_thumbnail( $post_id ) ) {
            $featuredID = get_post_thumbnail_id( $post_id );
            echo wp_get_attachment_image( $featuredID, 'full' );
        } else {
            echo '<img src="//placem.at/places?w=640&h=360&txt=0&random='.$post_id.'" width="640" height="360" alt="'.$post_title.'">';
        } ?>
        </div>
        <div class="uk-card-body">
            <div class="title-category | uk-text-meta uk-margin-bottom"> <?php echo $term_cat[0]->name; ?> </div>
            <h3 class="title-headline"><?php echo $post_title; ?></h3>
        </div>
        <a href="<?php echo get_permalink( $post_id  ); ?>" class="uk-position-cover" aria-label="<?php echo $post_title; ?>" role="link"></a>
    </div>
</li>
<?php endforeach;

// Export ID's
$_POST['newsIDs'] = array_merge($newsOne, $newsSix, $newsEight);

}
add_action( 'newsStack', 'newsStack' );


function newsMore( $newsIDs ) {

// More News
$more_news = get_posts([
    'post_type' => [ 'post' ],
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'DESC',
    'post__not_in' => $newsIDs,
]); 

foreach ( $more_news as $news ) :
$post_id = $news->ID;
$post_title = $news->post_title;

$term_cat = get_the_terms( $post_id, 'category' ); ?>
<div class="uk-width-1-2@s uk-width-1-2@m">
    <div class="uk-card uk-card-small uk-grid-collapse uk-flex-middle" uk-grid>
        <div class="uk-card-media-left uk-cover-container uk-width-auto">
        <?php if ( has_post_thumbnail( $post_id ) ) {
            $featuredID = get_post_thumbnail_id( $post_id );
            echo wp_get_attachment_image( $featuredID, [ 150, 150, true ] );
        } else {
            echo '<img src="//placem.at/places?w=300&h=300&txt=0&random='.$post_id.'" width="150" height="150" alt="'.$post_title.'">';
        } ?>
        </div>
        <div class="uk-width-expand">
            <div class="uk-card-body uk-padding-remove-vertical">
                <div class="title-category | uk-text-meta"> <?php echo $term_cat[0]->name; ?> </div>
                <h3 class="title-headline"><?php echo $post_title; ?></h3>
            </div>
        </div>
        <a href="<?php echo get_permalink( $post_id  ); ?>" class="uk-position-cover" aria-label="<?php echo $post_title; ?>" role="link"></a>
    </div>
</div>
<?php endforeach;

}
add_action( 'newsMore', 'newsMore', 10, 1 );
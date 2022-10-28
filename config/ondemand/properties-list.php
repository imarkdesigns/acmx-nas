<?php
function propertyList() {

$userID = get_current_user_id();
$properties = get_field( 'client_properties', 'user_'.$userID );

if ( $properties ) : ?>
<ul class="mp-list">
    <?php foreach ( $properties as $post ) : setup_postdata( $post );
    $post_id = $post->ID;
    $post_title = $post->post_title;

    $description = get_field( 'property_description', $post_id );
    $term_cat = get_the_terms( $post_id, 'ondemand-categories' );

    ?>
    <li class="mp-item">
        <div class="uk-card uk-card-default uk-card-body uk-card-small uk-card-hover uk-grid-collapse" uk-grid>
            <div class="uk-card-media-left uk-cover-container uk-width-auto">
                <?php if ( has_post_thumbnail( $post_id ) ) {
                    $featuredID = get_post_thumbnail_id( $post_id );
                    echo wp_get_attachment_image( $featuredID, 'thumbnail' );
                } else {
                    echo '<img src="//placem.at/places?w=300&h=300&txt=0&random='.$post_id.'" alt="'.$post_title.'" uk-cover>';
                } ?>
                <canvas width="150" height="150"></canvas>
            </div>
            <div class="uk-width-expand">
                <div class="uk-panel">
                    <h2 class="title"><?php echo $post_title; ?></h2>
                    <div class="description"><?php echo custom_field_excerpt( $description, 20 ); ?></div>
                    <ul class="taxonomy | uk-text-small">
                        <li hidden>Category: <?php echo $term_cat[0]->name; ?></li>
                        <li><a href="<?php echo get_permalink( $post_id ); ?>">Click to see Documents</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; 
    wp_reset_postdata(); ?>

</ul>
<?php endif;

}
add_action( 'propertyList', 'propertyList' );
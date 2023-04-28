<?php
function propertyList() {

$userID = get_current_user_id();
$directories = get_field( 'directory_list', 'user_'.$userID );

if ( $directories ) :

foreach ( $directories as $unique_dir ) {
    $property_IDs[] = $unique_dir['property']->ID;
    $property_IDs = array_unique($property_IDs);
}

$myProperties = get_posts([
    'post_type' => [ 'nas-ondemand' ],
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'has_password' => false,
    'orderby' => 'post__in',
    'order' => 'ASC',
    'post__in' => $property_IDs
]);

$user = get_userdata( $userID );
$userRole = $user->roles;

?>
<ul class="mp-list">
    <?php foreach ( $myProperties as $dir ) :
    $post_id = $dir->ID;
    $post_title = $dir->post_title;

    $description = get_field( 'property_description', $post_id );
    $maintenance = get_field( 'property_maintenance', $post_id );
    $term_cat = get_the_terms( $post_id, 'ondemand-categories' ); ?>
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
                        <?php 
                        // Check if the property is under-maintenance
                        if ( $maintenance == '1' ) : 
                            // Disable all investors access if property is under-maintenance
                            // Exclude admin, moderators  to under-maintenance
                            if ( in_array( 'administrator', $userRole, true ) ) : ?>
                                <li><a href="<?php echo get_permalink( $post_id ); ?>">Click to see Documents</a></li>
                            <?php elseif ( in_array( 'moderator', $userRole, true ) ) : ?>
                                <li><a href="<?php echo get_permalink( $post_id ); ?>">Click to see Documents</a></li>
                            <?php else: ?>
                                <li><a href="#" id="maintenance-dialog">Click to see Documents</a></li>
                            <?php endif;
                        else : ?>
                            <li><a href="<?php echo get_permalink( $post_id ); ?>">Click to see Documents</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif;

}
add_action( 'propertyList', 'propertyList' );










































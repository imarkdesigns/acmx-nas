<?php
function teamList() {

$teams = get_posts([
    'post_type' => [ 'nas-team' ],
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'ASC',
]);

foreach ( $teams as $team ) :
$post_id = $team->ID;
$post_title = $team->post_title;

$name = get_field( 'profile_name', $post_id );
$nominal = get_field( 'profile_postnominal', $post_id );
$designation = get_field( 'profile_designation', $post_id ); ?>
<div>
    <div class="uk-card uk-padding-remove">
        <a href="<?php echo get_permalink( $post_id ); ?>">
        <figure class="uk-inline uk-margin-remove">
            <?php echo get_the_post_thumbnail( $post_id, 'full' ); ?>
        </figure>
        <figcaption class="uk-overlay uk-overlay-primary uk-position-bottom uk-position-small uk-padding-small">
            <h2><?php echo $name; ?><?php echo !empty($nominal) ? ', <span class="uk-text-meta">'. $nominal .'</span>' : ''; ?></h2>
            <p><?php echo $designation; ?></p>
        </figcaption>
        </a>
    </div>
</div>
<?php 
endforeach;

}
add_action( 'teamList', 'teamList' );
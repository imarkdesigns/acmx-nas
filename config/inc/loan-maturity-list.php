<?php
function loanList( $type ) {

$loan_list = get_posts([
    'post_type' => [ 'nas-loanmaturity' ],
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'ASC',
    'meta_query' => [
        'relation' => 'AND',
        [ 'key' => 'loan_type', 'value' => $type ],
    ],
]);

?>
<ul uk-accordion="active: 0">
    <?php foreach ( $loan_list as $loan ) : 
    $post_id = $loan->ID;
    $post_title = $loan->post_title;

    $category = get_field( 'lm_category', $post_id );
    $address = get_field( 'lm_address', $post_id );
    $state = get_field( 'lm_state', $post_id );
    $link = get_field( 'lm_link', $post_id );
    ?>
    <li>
        <a href="#" class="uk-accordion-title"><?php echo $state; ?></a>
        <div class="uk-accordion-content">
            <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-small" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-small">
                        <div class="uk-card-media-top uk-position-relative">
                            <?php if ( has_post_thumbnail( $post_id ) ) {
                                $featuredID = get_post_thumbnail_id( $post_id );
                                echo wp_get_attachment_image( $featuredID, 'loan-module' );
                            } else {
                                echo '<img src="//placem.at/places?w=640&h=450&txt=0&random='.$post_id.'" alt="'.$post_title.'">';
                            } ?>
                        </div>
                        <div class="uk-card-body">
                            <div class="uk-card-title"><?php echo $post_title; ?></div>
                            <small><?php echo $address; ?></small>
                        </div>
                        <div class="uk-card-footer">
                            <span><?php echo $category; ?></span>
                            <?php echo ( $link ) ? '<a href="'.$link.'" class="uk-link-reset"> Read More </a>' :null; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>

<?php }
add_action( 'loanList', 'loanList', 10, 1 );
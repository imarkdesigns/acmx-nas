<?php
function lm_sold( $type ) {
$terms = get_terms('state-categories'); 

if ( $terms ) : ?>
<ul uk-accordion="active: 0">
<?php foreach ( $terms as $term ) :

    $posts = get_posts([
        'post_type' => 'nas-loanmaturity',
        'taxonomy' => $term->taxonomy,
        'term' => $term->slug,
        'nopaging' => true,
        'meta_key' => 'loan_type',
        'meta_value' => $type
    ]);
    
    if ( $posts ) : ?>
    <li>
        <a href="#" class="uk-accordion-title"> <?php echo $term->name; ?> </a>
        <div class="uk-accordion-content">
            <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-small" uk-grid>
            <?php foreach ( $posts as $post ) : setup_postdata( $post ); 
                $post_id = $post->ID;
                $post_title = $post->post_title;

                $category = get_field( 'lm_category', $post_id );
                $address = get_field( 'lm_address', $post_id );
                $link = get_field( 'lm_link', $post_id ); ?>
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
                <?php
             endforeach; ?>
            </div>
        </div>
    </li>
<?php endif;

endforeach; ?>
</ul>
<?php endif;

}
add_action( 'lm_sold', 'lm_sold', 10, 1 );
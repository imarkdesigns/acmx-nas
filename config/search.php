<?php
// Ajax Fetch JS
function ajax_fetch() { ?>
<script>
function fetch() {

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: {
            action: 'data_fetch',
            keyword: jQuery('#navbar-search').val()
        },
        success: function(data) {
            jQuery('#datafetch').html(data);
            jQuery('#datafetch .search-result li:empty').remove();
        }
    });

}
</script>
<?php }
add_action( 'wp_footer', 'ajax_fetch' );

// Ajax Function
function data_fetch() {

    $search_query = [ 'post_type' => [ 'post', 'page', 'nas-stories', 'nast-team' ], 'nopaging' => true, 's' => esc_attr( $_POST['keyword'] ) ];
    query_posts( $search_query );

    if ( have_posts() ) {
        echo '<strong>Suggested Searches</strong>';
        echo '<ul class="search-result | uk-list">';
        while ( have_posts() ) : the_post();
            echo '<li>';

            $param = esc_attr( $_POST['keyword'] );
            $search = get_the_title();

            if ( stripos("/{$search}/", $param) != false ) {
                echo '<a href="'.esc_url( get_post_permalink() ).'">'.get_the_title().'</a>';
            }

            echo '</li>';
        endwhile; wp_reset_postdata();
        echo '</ul>';
    } else {
        echo '<strong>Suggested Searches</strong>';
        echo '<ul class="search-result | uk-list"><li><span class="uk-text-small">No search keyword found.</span></li></ul>';
    }

    die();
}
add_action( 'wp_ajax_data_fetch', 'data_fetch' );
add_action( 'wp_ajax_nopriv_data_fetch', 'data_fetch' );
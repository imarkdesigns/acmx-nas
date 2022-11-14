<?php
// Ajax Fetch JS
function ajax_fetch() { ?>
<script type="text/javascript" defer>
function fetchMenu() {

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
        
            var emptyField = jQuery('#navbar-search').filter(function(index, element) {
                return element.value == '';
            });
            if ( emptyField.length > 0 ) {
                jQuery('#datafetch').children().remove();
            }
        }
    });
}

function fetchMobile() {

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: {
            action: 'data_fetch',
            keyword: jQuery('#dropbar-search').val()
        },
        success: function(data) {
            jQuery('#datafetchMobile').html(data);
            jQuery('#datafetchMobile .search-result li:empty').remove();
            
            // jQuery('#dropbar-search').on('blur', function(e) {
            var emptyField = jQuery('#dropbar-search').filter(function(index, element) {
                return element.value == '';
            });
            if ( emptyField.length > 0 ) {
                jQuery('#datafetchMobile').children().remove();
            }
            // });
        }
    });
}
</script>
<?php }
add_action( 'wp_footer', 'ajax_fetch' );

// Ajax Function
function data_fetch() {

    $search_query = [ 'post_type' => [ 'post', 'page', 'nas-stories', 'nas-team', 'nas-comments' ], 'post_status' => 'publish', 'has_password' => false, 'nopaging' => true, 's' => esc_attr( $_POST['keyword'] ) ];
    query_posts( $search_query );

    if ( have_posts() ) {
        echo '<strong>Suggested Searches</strong>';
        echo '<ul class="search-result | uk-list">';
        while ( have_posts() ) : the_post();
            echo '<li>';

            $param = esc_attr( $_POST['keyword'] );
            $search = get_the_title();

            if ( stripos("/{$search}/", $param) != false ) {
                echo '<a href="'.esc_url( get_permalink( get_the_ID() ) ).'">'.get_the_title().'</a>';
            }

            echo '</li>';
        endwhile; wp_reset_postdata();
        echo '</ul>';
    } else {
        echo '<strong>Suggested Searches</strong>';
        echo '<ul class="search-result | uk-list"><li><span class="uk-text-small">No search keyword found</span></li></ul>';
    }

    die();
}
add_action( 'wp_ajax_data_fetch', 'data_fetch' );
add_action( 'wp_ajax_nopriv_data_fetch', 'data_fetch' );
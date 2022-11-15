<?php
// Ajax OnDemandSearch JS
function ajax_OD_fetch() { ?>
<script type="text/javascript" defer>
function OnDemandSearch() {

    jQuery('#search-property').on('keydown', function() {
        jQuery('.quick-links').removeAttr('hidden');
        jQuery('.uk-close').removeAttr('hidden');
    });

    jQuery.ajax({
        url  : '<?php echo admin_url('admin-ajax.php'); ?>',
        type : 'POST',
        data : {
            action : 'od_fetch',
            keyword : jQuery('#search-property').val()
        },
        success : function(data) {
            jQuery('#ondemandFetch').html(data);
            jQuery('#ondemandFetch .search-result li:empty').remove();
            
            // When press close search
            jQuery('.uk-close').on('click', function() {
                jQuery('#search-property').val('');
                jQuery('#ondemandFetch').children().remove();
                jQuery('.quick-links').attr('hidden','');
                jQuery(this).attr('hidden','');
            });

            // When search field is empty, hide everything
            var emptyField = jQuery('#search-property').filter(function(index, element) {
                return element.value == '';
            });
            if ( emptyField.length > 0 ) {
                jQuery('.uk-close').attr('hidden');
                jQuery('#ondemandFetch').children().remove();
                jQuery('.quick-links').attr('hidden','');
            }
        }
    });

}
</script>
<?php }
add_action( 'wp_footer', 'ajax_OD_fetch' );

// Display the Result
function od_fetch() {

    $userID = get_current_user_id();
    $directory = get_field( 'directory_list', 'user_'.$userID );

    if ( $directory ) {
        $post_id = [];
        foreach ( $directory as $dir ) {
            $property = $dir['property'];
            $post_id[] = $property->ID;
        }

        $search_properties = get_posts([
            'post_type' => [ 'nas-ondemand' ],
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'has_password' => false,
            'post__in' => $post_id
        ]);

        if ( $search_properties ) :
            echo '<strong>Property Search Result:</strong>';
            echo '<ul class="search-result | uk-list">';
            foreach ( $search_properties as $property ) {
                $param = esc_attr($_POST['keyword']);
                $search = $property->post_title;

                if ( stripos("/{$search}/", $param) !== false ) {
                    echo '<li><a href="'.esc_url( get_permalink( $property->ID ) ).'">'.$property->post_title.'</a></li>';
                }
            }

            if ( stripos("/{$search}/", $param) == false ) {
                echo '<li><span class="uk-text-small uk-text-muted">No search keyword found</span></li>';
            }

            echo '</ul>';
        endif;
    }

    die();

}
add_action( 'wp_ajax_od_fetch', 'od_fetch' );
add_action( 'wp_ajax_nopriv_od_fetch', 'od_fetch' );
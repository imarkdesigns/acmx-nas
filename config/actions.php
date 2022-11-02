<?php
//! ===
//! Do not edit anything in this file unless you know what you're doing
//! ===

//* Schema.Org
function schema() {
    if ( is_single() ) :
        $type = 'Article';

    elseif ( is_author() ) :
        $type = 'ProfilePage';

    elseif ( is_search() ) :
        $type = 'SearchResultsPage';

    else :
        $type = 'WebPage';
    endif;

    $schema = 'http://schema.org/';
    echo 'itemscope itemtype="'.$schema.$type.'"';
}

//* Remove Posts & Comments (WP Navigation)
add_action('admin_menu', function() {
    // remove_menu_page( 'edit.php' ); // Remove Posts
    remove_menu_page( 'edit-comments.php' ); // Remove Comments
});

add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );
function my_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

//* Remove Emoji & Admin-Bar
add_filter('emoji_svg_url', '__return_false');
// add_filter('show_admin_bar', '__return_false');

//* Bypass ssl for api
// add_filter('https_ssl_verify', '__return_false');

//* Removes or edits the 'Protected:' part from posts titles
function remove_protected_text() {
  return __('%s');
}
add_filter( 'protected_title_format', 'remove_protected_text' );

//* Allow Unfiltered Uploads & Edit themes/plugins
define('ALLOW_UNFILTERED_UPLOADS', true);
define('DISALLOW_FILE_EDIT', true);
// define('WP_DEBUG', false);

// add_action('admin_menu', function() {
//     add_options_page( 'Discussion Settings', 'Discussion', 'manage_options', 'options-discussion.php' );
// }, 1);

//* Replace <p> to <figure> wrapping image tag
function img_caption_shortcode_filter($val, $attr, $content = null) {
  extract(shortcode_atts(array(
    'id'      => '',
    'align'   => 'alignright',
    'width'   => '',
    'caption' => ''
  ), $attr));

  // No caption, no dice... But why width?
  if ( 1 > (int) $width || empty($caption) )
    return $val;

  if ( $id )
    $id = esc_attr( $id );

  // Add itemprop="contentURL" to image - Ugly hack
  $content = str_replace('<p> <img', '<p> <img itemprop="contentURL"', $content);
  return '<figure id="' . $id . '" aria-describedby="figcaption_' . $id . '" class="wp-caption ' . esc_attr($align) . '" itemscope itemtype="http://schema.org/ImageObject">' . do_shortcode( $content ) . '<figcaption id="figcaption_'. $id . '" class="wp-caption-text uk-text-small" itemprop="description">' . $caption . '</figcaption></figure>';
}
add_filter( 'img_caption_shortcode', 'img_caption_shortcode_filter', 10, 3 );

//* Format textarea for display
$filters = array('term_description');
foreach ( $filters as $filter ) {
  add_filter( $filter, 'wptexturize' );
  add_filter( $filter, 'convert_chars' );
  remove_filter( $filter, 'wpautop' );
}

//* Remove empty <p> tags
function remove_empty_p( $content ) {
  $content = force_balance_tags( $content );
  $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
  $content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
  return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);

//* Allow VCard Uploading
function vcard_upload($mimes) {
  $mimes['vcf'] = 'text/x-vcard';
  return $mimes;
}
add_filter( 'upload_mimes', 'vcard_upload' );

//* Allow SVG Uploading
function svg_upload($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'svg_upload', 99);

//* Create sub-navigation to main menu
class subMenuWrap extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"uk-navbar-dropdown\" uk-dropdown=\"mode: click; offset: 0\"><ul class=\"uk-nav uk-navbar-dropdown-nav\">\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

//* Create sub-navigation to mobile menu
class mobileMenuWrap extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"uk-nav-sub\">\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

//* Display Popular Post
function observePostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count=='') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}

function fetchPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count=='') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  return "0 View";
  }
  return $count.' Views';
}

// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt( $content, $length ) {
  global $post;
  $text = $content; //Replace 'your_field_name'
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = $length;
    $excerpt_more = apply_filters('excerpt_more', '' . '...');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}

/**
* Filter the excerpt length to 20 words.
*
* @param int $length Excerpt length.
* @return int (Maybe) modified excerpt length.
*/
function wpdocs_custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**
* Disable the Application Passwords
*
*/
function my_prefix_customize_app_password_availability( $available, $user) {
    if ( ! user_can( $user, 'manage_options' ) ) {
        $available = false;
    }
 
    return $available;
}
add_filter('wp_is_application_passwords_available_for_user', 'my_prefix_customize_app_password_availability', 10, 2);
add_filter( 'wp_is_application_passwords_available', '__return_false' ); // set __return_true to activate back


// Remove Author in Public URL
function disable_author_page() {
    global $wp_query;
    // If an author page is requested, redirects to the home page
    if ( $wp_query->is_author ) {
        wp_safe_redirect( get_bloginfo( 'url' ), 301 );
        exit;
    }
}
add_action( 'wp', 'disable_author_page' );

// 
function admin_body_class( $classes ) {
    $loggedIn = is_user_logged_in();
    $adminUser = wp_get_current_user();

    if ( $loggedIn && array_intersect( [ 'moderator' ], $adminUser->roles ) ) {
        $classes .= ' wp-admin-moderator ';
        return $classes;
    } else {
        $classes .= ' wp-admin-super ';
        return $classes;
    }
}
add_filter( 'admin_body_class', 'admin_body_class' );

// 
// function wpse28782_remove_menu_items() {
//     if( !current_user_can( 'administrator' ) ):
//         remove_menu_page( 'admin.php?page=theme-fragments' );
//         remove_menu_page( 'edit.php?post_type=nas-comments' );
//     endif;
// }
// add_action( 'admin_menu', 'wpse28782_remove_menu_items' );
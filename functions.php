<?php
//! ===
//! Do not edit anything in this file unless you know what you're doing.
//! ===

//* Load All Functions
$fn_config = [
    
    'config/acf.php',
    'config/actions.php',
    'config/assets.php',
    'config/theme.php',

    'config/inc/track-record.php',
    'config/inc/random-comments.php',
    'config/inc/stories-list.php',
    'config/inc/news-list.php',
    'config/inc/news-stack.php',
    'config/inc/team-list.php',
    // 'config/inc/loan-maturity-list.php',
    'config/inc/lm-refinanced.php',
    'config/inc/lm-refinanced-tic.php',
    'config/inc/lm-sold.php',

    'config/ondemand/properties-list.php',
    'config/ondemand/news-list.php',
    'config/ondemand/nasis-property.php',
    'config/ondemand/nasis-brochure.php',
    'config/ondemand/property.php',
    'config/ondemand/documents.php',
    // 'config/ondemand/documents-part.php',

];
foreach ( $fn_config as $config ) {
    
    if ( ! locate_template($config, true, true) ) {
        wp_die( 
            sprintf( __( 'Error location <code>%s</code> for inclusions.', 'acmx' ), $config ) 
        );
    }
    require_once $config;
    
}
unset($config);

//!
//! Global Definitions
//!

define ( '_uri', __( get_template_directory_uri() ) );
define ( '_css', _uri.'/resources/styles/' );
define ( '_js', _uri.'/resources/scripts/' );
define ( '_ui', _uri.'/resources/uikit/' );

define ( '_page', 'views/pages/' );
define ( '_single', 'views/singles/' );
define ( '_terms', 'views/taxonomies/' );

define ( '_nav', 'views/fragments/menu' );
define ( '_hdr', 'views/fragments/header' );
define ( '_ftr', 'views/fragments/footer' );
define ( '_mob', 'views/fragments/mobile' );
define ( '_opt', 'views/options/' );

define ( '_noie', 'views/attributes/edge' );
define ( '_nojs', 'views/attributes/noscript' );
define ( '_kuki', 'views/attributes/cookie' );

define ( '_ondemand', 'views/ondemand/' );

define ( '_od_menu', 'views/fragments/od-menu' );
define ( '_od_footer', 'views/fragments/od-footer' );
define ( '_od_config', 'config/ondemand/' );


/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
// function themeprefix_login_redirect( $redirect_to, $request, $user ){

//     $forceLogin = $_GET['wppb_force_wp_login'];
//     if ( isset( $user->roles ) && is_array( $user->roles ) ) {

//         //check for admins
//         if ( in_array( 'investor', $user->roles ) ) {
//             $redirect_to = '/ondemand/dashboard'; // Your redirect URL
//         }
//     }

//     return $redirect_to;
// }
// add_filter( 'login_redirect', 'themeprefix_login_redirect', 10, 3 );

// add_action( 'admin_menu', 'register_custom_menu_link' );
// /**
//  * @author    Brad Dalton
//  * @example   http://wpsites.net/wordpress-admin/add-top-level-custom-admin-menu-link-in-dashboard-to-any-url/
//  * @copyright 2014 WP Sites
//  */
// function register_custom_menu_link(){
//     add_menu_page( 'OnDemand Dash', 'OD Dashboard', 'manage_options', '../ondemand/dashboard', wpsites_custom_menu_link(), 'dashicons-admin-site', 5 ); 
// }

// function wpsites_custom_menu_link(){
//     site_url('ondemand/dashboard');
//     // exit;
// }

add_action('admin_bar_menu', 'add_toolbar_items', 100);
function add_toolbar_items($admin_bar){
    $admin_bar->add_menu( array(
        'id'    => 'od-dashboard',
        'title' => 'OnDemand Dashboard',
        'href'  => site_url( '/ondemand/dashboard' ),
        'meta'  => array(
            'class' => 'od-dashboard',
        ),
    ));
    // $admin_bar->add_menu( array(
    //     'id'    => 'my-sub-item',
    //     'parent' => 'my-item',
    //     'title' => 'My Sub Menu Item',
    //     'href'  => '#',
    //     'meta'  => array(
    //         'title' => __('My Sub Menu Item'),
    //         'target' => '_blank',
    //         'class' => 'my_menu_item_class'
    //     ),
    // ));
    // $admin_bar->add_menu( array(
    //     'id'    => 'my-second-sub-item',
    //     'parent' => 'my-item',
    //     'title' => 'My Second Sub Menu Item',
    //     'href'  => '#',
    //     'meta'  => array(
    //         'title' => __('My Second Sub Menu Item'),
    //         'target' => '_blank',
    //         'class' => 'my_menu_item_class'
    //     ),
    // ));
}
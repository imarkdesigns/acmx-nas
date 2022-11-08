<?php
// Bail out if user is not logged-in
if ( !is_user_logged_in() && is_page([ 45, 47 ]) || is_singular( 'nas-ondemand' ) ) {
    wp_redirect( get_permalink( 43 ) );
    exit;
}

// Display the login form
if ( !is_user_logged_in() && is_page( 43 ) ) {
    get_template_part( _ondemand.'login' );
}

// If user is logged-in, redirect to dashboard
if ( is_user_logged_in() && is_page( 43 ) ) {
    wp_redirect( get_permalink( 45 ) );
    exit;
}

$force_login = isset($_GET['wppb_force_wp_login']);
$user = wp_get_current_user();
$levelZero = [ 'investor' ];
$levelOne = [ 'moderator', 'administrator' ];

// Redirect user to respective pages
if ( is_user_logged_in() || array_intersect( $levelZero, $user->roles ) ) {

    if ( is_page( 45 ) ) {
        get_template_part( _ondemand.'dashboard' );
    } elseif ( is_page( 47 ) ) {
        get_template_part( _ondemand.'profile' );
    }
} elseif ( is_user_logged_in() || array_intersect( $levelOne, $user->roles ) ) {
    wp_redirect( site_url( '/wp-admin/?wppb_cpm_redirect=yes' ) );
    exit;
}

// Display the password reset form
if ( is_page( 242 ) ) {
    get_template_part( _ondemand.'reset' );
}
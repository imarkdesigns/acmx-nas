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
    'config/inc/loan-maturity-list.php',
    'config/inc/team-list.php',

    'config/ondemand/properties-list.php',
    'config/ondemand/news-list.php',
    'config/ondemand/nasis-property.php',
    'config/ondemand/nasis-brochure.php',
    'config/ondemand/property.php',
    'config/ondemand/documents.php',


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
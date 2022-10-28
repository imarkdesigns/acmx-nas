<?php
//! ===
//! Do not edit anything in this file unless you know what you're doing
//! ===

//* Assets Resources
add_action('wp_enqueue_scripts', function() {

    global $post;

    # UIkit version
    # 3.14.3
    wp_enqueue_style( 'uikit', _ui.'uikit.min.css' );
    wp_enqueue_script( 'uikit', _ui.'uikit.min.js', null, null, true );
    wp_enqueue_script( 'uikit-icon', _ui.'uikit-icons.min.js', null, null, true );

    wp_enqueue_style( 'fragments', _css.'fragments.css' );
    wp_enqueue_script( 'router', _js.'router.js', ['jquery'], null, true );
        
    # Localize Scripts
    $dirPath = [ 'dirPath' => get_template_directory_uri() ];
    wp_localize_script( 'router', 'directory_uri', $dirPath );

    # Push assets to Scripts
    ## Company Link
    $cvideo = get_field( 'company_video', 'option' );
    if ( is_null($cvideo) ) {
        $cvPath = [ 'cvPath' => $cvideo ];
        wp_localize_script( 'router', 'company_video', $cvPath );        
    }

    ## Brochure Download
    $pdf = get_field( 'pdf_brochure', 'option' );
    if ( is_null($pdf) ) {
        $pdfPath = [ 'pdfPath' => $pdf['brochure_download']['url'] ];
        wp_localize_script( 'router', 'brochure_download', $pdfPath );
    }

    # Reset PostName
    $postName = '';

    if ( is_page() ) {

        # Enqueue Styles for Page
        switch ( $post->ID ) {

            case '17': // About
            case '19': // Team
            case '21': // Success Stories
            case '23': // Client Comments
            case '25': // Loan Maturity Solutions
            case '27': // FAQs
            case '29': // Outreach
            case '31': // Asset Management
            case '33': // Property Management
            case '35': // News
            case '37': // Map
                $pageName = 'overview';
                break;

            case '2' : // Home
            case '39': // Contact
            case '41': // Sitemap
                $pageName = 'main';
                break;

            case '3' : 
                $pageName = 'legal'; 
                break;

            // OnDemand
            case '43': // OnDemand
            case '45': // Dashboard
            case '47': // Profile
            case '242': // Password Reset
                $pageName = 'ondemand';
                break;

        }
        wp_enqueue_style( 'page', _css.$pageName.'.css' );

    }

    elseif ( is_singular( 'nas-ondemand' ) ) {
        wp_enqueue_style( 'post', _css.'ondemand.css' );
        wp_enqueue_script( 'od-map', 'https://maps.googleapis.com/maps/api/js?key='.$_ENV['ACF_GOOGLEMAP'].'', null, null, true );
        wp_enqueue_script( 'od-js', _js.'acf-map.js', ['jquery'], null, true );
    }

    // elseif ( is_singular( 'nas-team' ) ) {
    //     wp_enqueue_style( 'post', _css.'overview.built.css' );
    // }

    elseif ( is_home() ) {
        wp_enqueue_style( 'post', _css.'overview.css' );
    }

}, 100);
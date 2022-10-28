<?php 
/**
 * Template Name: OnDemand
 * @package WordPress
 * @subpackage acmx
**/ 

get_header( 'ondemand' );

    // global $post;
    switch ( get_the_ID() ) {

        // Client Portal 
        case '43': // ondemand login
        case '45': // dashboard
        case '47': // profile
        // case '42': // property
        case '242': // password reset
            $pageName = 'ondemand'; 
            break;

    }

    get_template_part( _page.$pageName );

get_footer( 'ondemand' );
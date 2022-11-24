<?php
//! ===
//! Do not edit anything in this file unless you know what you're doing
//! ===

//* Setup ACMX Theme
add_action('after_setup_theme', function() {

    //* Soil
    //* @link https://roots.io/plugins/soil/
    add_theme_support('soil', [
        'clean-up',
        'disable-asset-versioning',
        'disable-trackbacks',
        'js-to-footer',
        'nav-walker',
        'nice-search',
        // 'relative-urls'
    ]);

    //* Theme
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', ['caption', 'search-form', 'style', 'script', 'navigation-widgets'] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'custom-line-height' );
    add_theme_support( 'experimental-link-color' );
    add_theme_support( 'custom-units' );
    
    //* Editor
    // add_theme_support('editor-styles');
    // $editor_stylesheet_path = _styles.'wp-editor.min.css';
    // add_editor_style( $editor_stylesheet_path );

    //* Additional Size
    add_image_size( 'homeSlide-img', 135, 135, [ 'center', 'center' ] ); // Homepage Slider Thumbnail
    add_image_size( 'storyList-img', 615, 720, [ 'center', 'center' ] ); // Success Stories Thumbnail
    add_image_size( 'newsList-img', 615, 550, [ 'center', 'center' ] ); // News Thumbnail
    // add_image_size( 'cp-thumb', 45, 45, [ 'center', 'center' ] ); // Contact Person Thumbnail

    //* Menu
    register_nav_menus([
        'Main Menu'     => __( 'Menu Navigation', 'acmx-nas' ),
        // 'Footer Menu'   => __( 'Footer Navigation', 'acmx-nas' ),
        'Mobile Menu'   => __( 'Mobile Navigation', 'acmx-nas' )
    ]);


});

//* Content Width
if ( ! isset( $content_width ) ) {
    $content_width = 1280;
}

// Add overrides to ACF Custom Fields
add_action( 'admin_enqueue_scripts', function() {
    wp_enqueue_script( 'handle', _uri . '/build/editor/wp-acf-script.js' );
} );

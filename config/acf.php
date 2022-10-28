<?php
//! ===
//! Do not edit anything in this file unless you know what you're doing
//! ===

//* ACF Hooks
add_action('acf/init', function() {
    // acf_update_setting('google_api_key', $_ENV['ACF_GOOGLEMAP']);
});

//* ACF Override UI
add_action('acf/input/admin_head', function() {

  echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
  echo '<link rel="stylesheet" href="'._uri.'/build/editor/wp-acf-editor.css">'."\n";

});

//* Speed up ACF backend loading time
add_filter('acf/settings/remove_wp_meta_box', '__return_true');
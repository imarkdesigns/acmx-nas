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
    'config/search.php',
    'config/od-search.php',

    'config/inc/track-record.php',
    'config/inc/random-comments.php',
    'config/inc/stories-list.php',
    'config/inc/news-list.php',
    'config/inc/news-stack.php',
    'config/inc/team-list.php',
    'config/inc/lm-refinanced.php',
    'config/inc/lm-refinanced-tic.php',
    'config/inc/lm-sold.php',

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
define ( '_od_config', 'config/ondemand/' );


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
}

add_filter('acf/validate_value/key=field_6371256e9e0c3', 'unique_repeater_sub_field', 20, 4);
function unique_repeater_sub_field($valid, $value, $field, $input) {
  if (!$valid) {
    return $valid;
  }
  
  // get list of array indexes from $input
  // [ <= this fixes my IDE, it has problems with unmatched brackets
  preg_match_all('/\[([^\]]+)\]/', $input, $matches);
  if (!count($matches[1])) {
    // this should actually never happen
    return $valid;
  }
  $matches = $matches[1];
  
  // walk the acf input to find the repeater and current row      
  $array = $_POST['acf'];
  
  $repeater_key = false;
  $repeater_value = false;
  $row_key = false;
  $row_value = false;
  $field_key = false;
  $field_value = false;
  
  for ($i=0; $i<count($matches); $i++) {
    if (isset($array[$matches[$i]])) {
      $repeater_key = $row_key;
      $repeater_value = $row_value;
      $row_key = $field_key;
      $row_value = $field_value;
      $field_key = $matches[$i];
      $field_value = $array[$matches[$i]];
      if ($field_key == $field['key']) {
        break;
      }
      $array = $array[$matches[$i]];
    }
  }
  
  if (!$repeater_key) {
    // this should not happen, but better safe than sorry
    return $valid;
  }
  
  // look for duplicate values in the repeater
  foreach ($repeater_value as $index => $row) {
    if ($index != $row_key && $row[$field_key] == $value) {
      // this is a different row with the same value
      // $valid = 'this value is not unique';
      $valid = 'Oopps! Found duplicate property. Please remove the others.';
      break;
    }
  }
  
  return $valid;
}
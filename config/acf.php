<?php
//! ===
//! Do not edit anything in this file unless you know what you're doing
//! ===

//* ACF Hooks
add_action('acf/init', function() {
    // acf_update_setting('google_api_key', $_ENV['ACF_GOOGLEMAP']);
});

//* ACF Override UI
add_action('admin_head', function() {

  echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
  echo '<link rel="stylesheet" href="'._uri.'/build/editor/wp-acf-editor.css">'."\n";

});

//* Speed up ACF backend loading time
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

// Find duplicate entry from OnDemand Property List Directory
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

// Shortcode for Gallery
function pm_gallery_func() {

$images = get_field( 'pmgmt_photos' );

if ( $images ) :
$gallery = '<div class="pm-gallery | uk-position-relative uk-visible-toggle uk-margin-medium-bottom uk-light" tabindex="-1" uk-slider="clsActivated: uk-transition-active; center: true">';
    $gallery .= '<ul class="uk-slider-items uk-grid uk-flex-middle">';
    foreach ( $images as $img ) :
    $gallery .= '<li class="uk-width-1-1">';
        $gallery .= '<div class="uk-panel">';
            $gallery .= wp_get_attachment_image( $img['id'], 'full' );
            $gallery .= '<div class="slideshow-caption | uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">';
                $gallery .= '<p class="uk-margin-remove">'.$img['caption'].'</p>';
            $gallery .= '</div>';
        $gallery .= '</div>';
    $gallery .= '</li>';
    endforeach;
    $gallery .= '</ul>';
    $gallery .= '<a class="uk-position-center-left uk-position-small uk-hidden-hover" aria-label="Previous" href="#" uk-slidenav-previous uk-slider-item="previous"></a>';
    $gallery .= '<a class="uk-position-center-right uk-position-small uk-hidden-hover" aria-label="Next" href="#" uk-slidenav-next uk-slider-item="next"></a>';
$gallery .= '</div>';
endif;

return $gallery;

}
add_shortcode( 'pm_gallery', 'pm_gallery_func' );
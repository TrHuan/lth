<?php
// Add custom Theme Functions here

define('GCO_UX_SHORTCODES_PATH', get_template_directory() . '/inc/shortcodes');
define('GCO_UX_BUILDER_PATH', get_template_directory() . '/inc/builder');
define('GCO_UX_ELEMENTS_PATH', get_template_directory() . '/inc/builder/shortcodes');
define('GCO_UX_ELEMENTS_URI', get_template_directory_uri() . '/inc/builder/shortcodes');
define('GCO_CHILD_PATH', get_theme_file_path());
define('GCO_CHILD_URI', get_theme_file_uri());

function gco_ux_builder_template( $path ) {
  ob_start();
  include get_theme_file_path() . '/inc/elements/templates/' . $path;
  return ob_get_clean();
}

function gco_ux_builder_thumbnail( $name ) {
  return get_theme_file_uri() . '/inc/elements/thumbnails/' . $name . '.svg';
}

function gco_ux_builder_template_thumb( $name ) {
  return get_theme_file_uri() . '/inc/elements/templates/thumbs/' . $name . '.jpg';
}


// Add Shortcodes
foreach (glob(__DIR__ . "/inc/shortcodes/*.php") as $filename) {
    require_once $filename;
}

// Add UX Builder Elements
add_action( 'ux_builder_setup', function () {

  foreach (glob(__DIR__ . "/inc/elements/*.php") as $filename) {
      require_once $filename;
  }

} );

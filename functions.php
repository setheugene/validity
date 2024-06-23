<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$roots_includes = array(
  'lib/init.php',             // Initial theme setup and constants
  'lib/roots/main.php',
  'lib/nav.php',              // Custom nav modifications
  'lib/scripts.php',          // Scripts and stylesheets
  'lib/tgm/required-plugins.php',   // Required plugins
  'lib/metabox/main.php',           // ACF Metabox Settings
  'lib/custom/main.php',            // Custom functions
  'lib/cpt/main.php',               // Custom post type module
  'lib/LL_Menu/main.php',  //Custom Nav Objects
  'lib/LL_Router/main.php',
  'lib/LL_Wysiwyg/LL_Wysiwyg.php',
  'lib/LL_Ajax/main.php'
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);

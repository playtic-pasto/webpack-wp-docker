<?php
/**
 * playtic_theme Enqueque and Register Scripts
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package palytic_theme
*/


if( ! function_exists( 'playtic_theme_scripts' ) ) : 
  function playtic_theme_scripts() {
    if( wp_get_environment_type() === 'development' ) {
      // load assets for (dev)
      wp_enqueue_script( 'jquery' );
      wp_enqueue_script('playtic_theme-scripts-dev', 'http://localhost:8080/site.js');
    } else {
      // load assets (prod) in dist
      wp_enqueue_script( 'jquery' );
      wp_enqueue_style('playtic_theme-style', get_template_directory_uri() . '/dist/site.min.css');
      wp_enqueue_script('playtic_theme-scripts', get_template_directory_uri() . '/dist/site.js');
      wp_enqueue_script('playtic_theme-admin-scripts', get_template_directory_uri() . '/dist/admin.js');
    }
  }
endif;

add_action( 'wp_enqueue_scripts', 'playtic_theme_scripts' );

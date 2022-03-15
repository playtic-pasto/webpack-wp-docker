<?php

  // ADD OPTION PAGE GLOBAL CONF IN THEME
  if( function_exists('acf_add_options_page') ) { 

    // ADD OPTION PAGE
    acf_add_options_page(array(
      'page_title' 	  => 'PlayTIC Configuración',
      'menu_title'	  => 'PlayTIC Configuración',
      'menu_slug' 	  => 'playtic-settings',
      'capability'	  => 'edit_posts',
      'icon_url'      => 'dashicons-superhero',
      'update_button' => __('Actualizar Tema', 'acf'),
      'position'      => 1,
      'autoload'      => true,
      'redirect'	    => false
    ));
    
    acf_add_options_sub_page(array(
      'page_title'    => 'Header Settings',
      'menu_title'	  => 'Header',
      'parent_slug'	  => 'playtic-settings',
    ));
    
    acf_add_options_sub_page(array(
      'page_title' 	  => 'Footer Settings',
      'menu_title'	  => 'Footer',
      'parent_slug'	  => 'playtic-settings',
    ));  

    acf_add_options_sub_page(array(
      'page_title' 	  => '404 Settings',
      'menu_title'	  => '404 Page',
      'parent_slug'	  => 'playtic-settings',
    ));  

  }
?>
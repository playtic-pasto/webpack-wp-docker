<?php

  // ADD OPTION PAGE GLOBAL CONF IN THEME
  if( function_exists('acf_add_options_page') ) { 

    // ADD OPTION PAGE
    acf_add_options_page(array(
      'page_title' 	  => 'General Settings',
      'menu_title'	  => 'Settings',
      'menu_slug' 	  => 'general-settings',
      'capability'	  => 'edit_posts',
      'icon_url'      => 'dashicons-superhero',
      'update_button' => __('Update  theme', 'acf'),
      'position'      => 50,
      'autoload'      => true,
      'redirect'	    => false
    ));
    
    acf_add_options_sub_page(array(
      'page_title'    => 'Header Settings',
      'menu_title'	  => 'Header',
      'parent_slug'	  => 'general-settings',
    ));
    
    acf_add_options_sub_page(array(
      'page_title' 	  => 'Footer Settings',
      'menu_title'	  => 'Footer',
      'parent_slug'	  => 'general-settings',
    ));  

    acf_add_options_sub_page(array(
      'page_title' 	  => '404 Page Settings',
      'menu_title'	  => '404 Page',
      'parent_slug'	  => 'general-settings',
    ));  

    acf_add_options_sub_page(array(
      'page_title' 	  => 'CPT Page Builder',
      'menu_title'	  => 'Page Builder CPT',
      'parent_slug'	  => 'edit.php?post_type=',
    )); 

  }
?>
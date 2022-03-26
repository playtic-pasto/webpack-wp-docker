<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package playtic_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content='width=device-width, initial-scale=1.0' name='viewport'>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content='#fff' name='theme-color'>
    <meta content='<?php bloginfo('description'); ?>' name='description'>
    <meta content='univa' name='keywords'>
    <meta content='website' property='og:type'>
    <meta content='<?php wp_title('|', true, 'right'); ?>' property='og:title'>
    <meta content='<?php bloginfo('description'); ?>' property='og:description'>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />

    <?php wp_head(); ?>
  </head>

<body <?php body_class(); ?> data-page-handle="<?php echo $_SERVER['REQUEST_URI']; ?>" >

  <header class="header-site">
    <?php  
      if( is_page_template( 'template-landing-page.php' ) ): 
        get_template_part( 'template-parts/landing-page-header', 'content' );
      else:
        get_template_part( 'template-parts/main-header', 'content' );
      endif;
    ?>
  </header>

  <div id="site-main-content" class="site-main-content show-menu-primary">
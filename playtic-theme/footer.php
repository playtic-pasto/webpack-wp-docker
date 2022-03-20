<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package playtic_theme
 */

?>


      <?php 
        if( is_page_template( 'template-landing-page.php' ) ) {
          get_template_part( 'template-parts/landing-page-footer', 'content' );
        } else {
          get_template_part( 'template-parts/main-footer', 'content' ); 
        }
      ?>
    </div>  <!-- end Site Main Content Div -->
    <?php  wp_footer(); ?>
  </body> <!-- end Body -->
</html> <!-- end  HTML -->
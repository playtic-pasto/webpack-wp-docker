<?php
/**
 * The Front Page  template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package starter_theme
 */
  get_header();
?>  
  <main id="front-page-playtic" class="front-page-playtic is-main-content">
    <div class="containaer-fluid">
      <div class="row">
        <div class="col-12 col-xl-8 order-2 order-xl-1">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione velit alias cupiditate suscipit, molestias impedit numquam ipsum perferendis itaque! Fugiat eligendi ipsum pariatur modi natus veniam libero blanditiis officia alias.</p>
        </div>
        <div class="col-12 col-xl-4 order-1 order-xl-2 d-flex align-items-start justify-content-center">
          <aside class="aside-tools-user w-100">
            <?php get_template_part( 'template-parts/components/aside-tools-user', 'content' ); ?>
          </aside>
        </div>
        <div class="col-12 bg-secondary order-3"> 
          
        </div>
      </div>
    </div>
  </main>
<?php
  get_footer();
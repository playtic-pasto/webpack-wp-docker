<?php

/**
 * The main template file
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
  <main>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1><?= the_title() ?></h1>
            <hr>
            <?= the_content() ?>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php
  get_footer();
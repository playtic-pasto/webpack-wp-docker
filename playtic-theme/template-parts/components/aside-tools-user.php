<?php
/*
  * Aside Tools User Render
  * @package starter_theme
*/
?>

<div class="content-aside">
  <!-- Header Aside Tools -->
  <div class="row row-head-aside-tools">
    <div class="col-10 col-title">
      <h1 class="title-primary mb-0">Hola!</h1>
      <p class="caption-aside mb-0">Micro Herramientas para mejorar tu experiencia.</p>
    </div>
    <div class="col-2 col-button d-flex justify-content-center align-items-center">
      <i class='bx bx-minus-circle btn-aside-tools-toogle' id="btn-aside-tools-toogle"></i>
    </div>
  </div>
  
  <div class="row row-body-aside-tools active animate__animated animate__fadeInRight">
    <div class="col-12 col-clock-aside">
      <?php get_template_part( 'template-parts/partials/clock-widget-aside', 'content' ); ?>
    </div>
  </div>
</div>
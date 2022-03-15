<?php
/**
 * Template part for displaying a message that posts cannot be found *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ *
 * @package PlayTIC
 */
  $s = get_search_query();
?>

<section class="no-results not-found">
  <h3>
    Resultados de búsqueda para:  <span class="title-h2"><?php echo $s; ?></span>
  </h3>
  <hr class="separator-text"> <br>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			printf(
				'<p>' . wp_kses(
					__( 'Listo para publicar su primer post? <a href="%1$s">Comience aquí</a>.', 'playtic' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ):  ?>

			<p>
        <?php 
          esc_html_e( 'Lo sentimos, pero nada coincide con los términos de búsqueda. Vuelva a intentarlo con algunas palabras clave diferentes.', 'univa' ); 
        ?>
      </p>
			<?php
			get_search_form();
		else : ?>

			<p>
        <?php esc_html_e( 'Parece que no podemos encontrar lo que estás buscando. Tal vez la búsqueda pueda ayudar.', 'univa' ); ?>
      </p>
			<?php
			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

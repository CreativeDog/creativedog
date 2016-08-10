<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package CreativeDog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<aside class="content-titulo-blog">
				<div class="wrapper_70">
					<h1 class="titulo_secciones white center"><?php _e( 'Oops! That page can&rsquo;t be found.', 'creativedog' ); ?></h1>
				</div>
			</aside>

			<div class="wrapper_70">
				<br/><br/><br/><br/>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn_contact_nosotros">Vuelve al home / Go to home</a>
				<h2 class="titulo_secciones center">Ó diviértete jugando...</h2>
				<h4 class="titulo_secciones_ingles center">- or have fun -</h4>
				<iframe id="juego-404" src="http://dev.creativedog.com.ar/games/touch-color"></iframe>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

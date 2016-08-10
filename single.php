<?php
/**
 * The template for displaying all single posts.
 *
 * @package CreativeDog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<aside class="content-titulo-blog">
				<div class="wrapper_70">
					<h1 class="titulo_secciones white center">Creative Blog</h1>
				</div>
			</aside>

			<div class="wrapper_70">
				<div class="grid grid-pad">
					<div class="content-blog col-9-12">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'single' ); ?>

							<!-- SHARE -->
							<h4>Compartir / Share:</h4>
							<?php echo do_shortcode( '[shareaholic app="share_buttons" id="18107722"]' ) ?>

							<!--<?php the_post_navigation(); ?>-->

							<aside id="content_comentarios">
								<?php
									// If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
							</aside>

						<?php endwhile; // end of the loop. ?>
					</div>

					<div class="content-sidebar col-3-12">
						<br/><br/>
						<?php get_sidebar(); ?>
					</div>

				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

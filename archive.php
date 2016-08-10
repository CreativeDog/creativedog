<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

						<?php if ( have_posts() ) : ?>

							<div class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
							</div><!-- .page-header -->

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );
								?>

							<?php endwhile; ?>

							<?php the_posts_navigation(); ?>

							<?php else : ?>

								<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>
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

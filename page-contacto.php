<?php
/**
 * Template Name: Contacto
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CreativeDog
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section id="content_contacto_page">
        		<div class="wrapper_contacto">
					<h1 class="titulo_secciones black title_contacto"><?php the_title(); ?></h1>
					<div class="content_the_content">
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<?php echo do_shortcode('[contact-form-7 id="4" title="Contacto"]'); ?>				
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer('contacto'); ?>

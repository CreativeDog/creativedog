<?php
/**
 * @package CreativeDog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-header">
		<?php the_title( '<h1 class="titulo_secciones black titulo_noticia">', '</h1>' ); ?>
		<h3 class="subtitulo_post"><?php the_field('subtitulo_post'); ?></h3>

		<!-- Fecha post -->
		<div class="entry-meta">
			<?php creativedog_posted_on(); ?>
		</div>

		<!-- Imagen post -->
		<?php if ( has_post_thumbnail( $_post->ID ) ) {
        		echo '<img class="img_post" src="' . get_the_post_thumbnail( $_post->ID, 'full' );
    		}
		?>
	</div>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'creativedog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php creativedog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

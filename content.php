<?php
/**
 * @package CreativeDog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php the_title( sprintf( '<h1 class="titulo_secciones black titulo_noticia"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<!-- Fecha post -->
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php creativedog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<!-- Imagen post -->
		<?php if ( has_post_thumbnail( $_post->ID ) ) {
        		echo '<img class="img_post" src="' . get_the_post_thumbnail( $_post->ID, 'full' );
    		}
		?>
	</div><!-- .entry-header -->

	<div class="entry-content">
		<p><?php the_excerpt(); ?></p>
		<a href="<?php the_permalink(); ?>" class="btn_small btn_black">Ver mas | View more</a>
	</div><!-- .entry-content -->
	<br/>
	<hr/>
</article><!-- #post-## -->
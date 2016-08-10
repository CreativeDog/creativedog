<?php
/**
 * Template Name: Proyectos
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
			
			<div class="wrapper_proyectos">
				<h1 class="titulo_secciones black center"><?php the_title(); ?></h1>
				<h4 class="titulo_secciones_ingles center">- <?php the_field('titulo_seccion_ingles'); ?> -</h4>
				
				<div id="filters">
				  <button data-filter="*">ALL / TODOS</button>
				  <?php 	  	
				  	$all_terms = get_terms( 'tipos'); 
				  	foreach ($all_terms as $term){ ?>
				 	<button data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button> 
				  <?php 		
				  	}
				  ?>
				</div>
				
				<div id="container">
				
					<?php 
	  					$args_proyectos = array(
	  						'post_type' => 'proyecto',
	  						'posts_per_page'   => -1
	  					);

	  				// the query
	          		$the_query = new WP_Query( $args_proyectos ); ?>
			
					<?php if ( $the_query->have_posts() ) : ?>
							<div class="item-sizer"></div>
							<div class="gutter-sizer"></div>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php  
								$terms = get_the_terms( get_the_ID(), 'tipos' );
								$i = 0;
								$terms_text = '';
								$terms_filter = '';
								foreach ($terms as $term) {
									if($i!= 0){
										$terms_text .= ' / ';
									} 
									$terms_text .= $term->name;
									$terms_filter .= ' '.$term->slug; 
									$i++;  
								}
							

							?>
							
							<div class="item masonry-brick<?php echo $terms_filter; ?>">
								<div class="content_img_destacada_proyecto">
									<a href="<?php the_permalink(); ?>">
										<?php 
		          							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		          							  the_post_thumbnail();
		          							} else { ?>
		          								<img src="<?php bloginfo('template_url'); ?>/img/default.jpg" alt="Proyecto">
		          							<?php }
		      							?>
									</a>
								</div>
								<aside class="content_info_proyecto">
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<h3><?php echo $terms_text; ?></h3>
								</aside>
							</div>
							
						<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>

			<div class="wrapper_90">
				<a href="javascript:void(0);" class="btn_contact btn_contact_nosotros">conocenos / meet us</a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<!-- Google Code for conversion-proyectos Conversion Page -->
	<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 1004398499;
		var google_conversion_language = "en";
		var google_conversion_format = "3";
		var google_conversion_color = "ffffff";
		var google_conversion_label = "kR93CPnXn2YQo8_33gM";
		var google_remarketing_only = false;
		/* ]]> */
		</script>
		<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1004398499/?label=kR93CPnXn2YQo8_33gM&amp;guid=ON&amp;script=0"/>
		</div>
	</noscript>


<?php get_footer(); ?>


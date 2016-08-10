<?php
/**
 * The template for displaying all pages.
 *
 * @package CreativeDog
 */

get_header('presupuesto'); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<?php 
				if(post_password_required()){
					echo get_the_password_form();
				}else{ 
					 if (have_posts()) : 
						while (have_posts()) : the_post(); ?>
						
						<h2 class="nombre_presupuesto"><strong>Proyecto:</strong> <?php the_title(); ?></h2>
						<h2 class="cliente_presupuesto"><strong>Cliente:</strong> <?php the_field('cliente'); ?></h2>
						<!-- Tipo -->
						<?php  
							$terms = get_the_terms( get_the_ID(), 'tipos' );
							$i = 0;
							$terms_tipo = '';
							foreach ($terms as $term) {
								if($i!= 0){
								  $terms_tipo .= ' / ';
								} 
								$terms_tipo .= $term->name;
								$i++;  
							}
	                    ?>
						<h2><strong>Tipo:</strong> <?php echo $terms_tipo; ?></h2>
						<?php  
							$terms_recursos = get_the_terms( get_the_ID(), 'recursos' );
							$i = 0;					
	                    ?>
	                    <h2><strong>Recursos:</strong></h2>
	                    <div class="content_recursos">
	                    	<?php foreach ($terms_recursos as $term_recursos) { ?>
	                    		<h4><?php echo $term_recursos->name; ?></h4>
	                    	<?php } ?>  
	                    	<div class="clearfix"></div>	
	                    </div>

						<hr>
						<?php the_content(); ?>
						<hr>

						<!-- Items -->
						<h1 class="subtitulo_presupuesto"><strong>Descripción:</strong></h1>
							<?php  
							if( have_rows('items') ):
							    ?>
								<div class="content_items">
							    <?php
							    while ( have_rows('items') ) : the_row();
								?>
									<div class="content_item">
										<a class="item_desc"><?php the_sub_field('item'); ?></a>
										<?php if(get_sub_field('importe')){ ?>
											<a class="item_precio"><span>$ </span><?php the_sub_field('importe'); ?></a>
										<?php } ?>
										<div class="clearfix"></div>
									</div>
									<hr>
								<?php            
							    endwhile;
							    ?>
								</div>
							    <?php
							endif; ?>

							<h2 class="importe_total"><strong>TOTAL:</strong> <span>$ </span><?php the_field('importe_total'); ?></h2>
							<hr>

							<p><strong>Forma de Pago: </strong><?php the_field('forma_de_pago'); ?></p>
						<?php            
					    endwhile;
					endif;
				}    
			    ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('presupuesto'); ?>

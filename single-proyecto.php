<?php
/**
 * The template for displaying all single proyectos.
 *
 * @package CreativeDog
 */

get_header(); ?>

	<section id="wrapper">
		<article class="content content_single">
			<div class="wrapper_90">
				<?php if (have_posts() ) : ?>	
					<?php while ( have_posts() ) : the_post(); ?>
													
						<!-- TITULO PROYECTO -->
						<h1 class="titulo_secciones black titulo_proyecto"><?php the_title(); ?></h1>
						
						<!-- TIPO -->
						<?php  
							$terms = get_the_terms( get_the_ID(), 'tipos' );
							$i = 0;
							$terms_tipo = '';
							if($terms){
								foreach ($terms as $term) {
									if($i!= 0){
									  $terms_tipo .= ' / ';
									} 
									$terms_tipo .= $term->name;
									$i++;  
								}
							}
							if($terms_tipo){
                        ?>
						<h2><strong>Category:</strong> <?php echo $terms_tipo; ?></h2>
						<?php } ?>

						<!-- CLIENTE -->
						<?php  
							$terms = get_the_terms( get_the_ID(), 'clientes' );
							$i = 0;
							$terms_clientes = '';
							if($terms){
								foreach ($terms as $term) {
									if($i!= 0){
									  $terms_clientes .= ' / ';
									} 
									$terms_clientes .= $term->name;
									$i++;  
								}
                        	}
                        	if($terms_clientes){
                        ?>
                        <h2><strong>Client:</strong> <?php echo $terms_clientes; ?></h2>
						<?php } ?>

                        <!-- CREDITOS -->
                         <?php if(get_field('creditos_proyecto')){ ?>
                        <h2><strong>Credits:</strong> <?php the_field('creditos_proyecto'); ?></h2>
						<?php } ?>

						 <!-- LINK EXTERNO -->
                        <?php if(get_field('link_externo')){ ?>
                        <a class= "btn_medium btn_black" target="_blank" href="<?php the_field('link_externo'); ?>">VISITAR PROYECTO</a>
						<?php } ?>
						
						<div class="content_info_proyecto_single grid grid-pad">
							
							<div class="col-1-2">
								
								<!-- DETALLE PROYECTO -->
								<div class="detail">

									<!-- DESCRIPCION -->							
									<p class="txt_descripcion"><?php the_field('descripcion_proyecto'); ?></p>
									<p class="txt_descripcion txt_ingles"><?php the_field('descripcion_proyecto_ingles'); ?></p>

									<!-- RECURSOS -->
									<?php  
										$terms_recursos = get_the_terms( get_the_ID(), 'recursos' );
										$i = 0;					
		                            ?>
		                            <div class="content_recursos">
		                            	<?php 
		                            	if($terms_recursos){
		                            		foreach ($terms_recursos as $term_recursos) { ?>
		                            			<h4><?php echo $term_recursos->name; ?></h4>
		                            	<?php 
		                            		}
		                            	} 
		                            	?>  
		                            	<div class="clearfix"></div>	
		                            </div>
								</div>
							</div>

							<div class="col-1-2">	
								<aside class="img_destacada_proyecto_single">
									<?php 
										$image = get_field('imagen_principal'); 
									?>
									<img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>">
								</aside>
	                        </div>
	                    </div>
	                    <div class="clearfix"></div>
					<?php endwhile; // end of the loop. ?>
				<?php endif; ?>		
			</div>
			
			<!-- Parallax -->
			<?php 
			$background_parallax = get_field('background_parallax'); 
			if($background_parallax){
			?>
			
			<div class="not-fullscreen background parallax parallax_nosotros" style="background-image:url('<?php echo $background_parallax['url']; ?>');" data-img-width="100%" data-img-height="500" data-diff="100">
			    <div class="content-a">
			        <div class="content-b">
			        	<?php 
			        	if(get_field('texto_parallax')){
			        	?>
			        	<h2 class="<?php the_field('color_texto_parallax'); ?>"><?php the_field('texto_parallax'); ?></h2>
			        	<?php 
			        	}
			        	$imagen = get_field('imagen_sobre_parallax');
			        	if($imagen){ 	
			        	?>
			        	<img src="<?php echo $imagen['url'];  ?>" alt="imagen_parallax">
			        	<?php 
			        	}
			        	?>
			            
			        </div>
			    </div>
			</div>
			<?php } ?>

			<!-- Content -->
			<div class="wrapper_90">
				<div class="content_images_proyecto">
					<p><?php the_content(); ?></p>
				</div>
				<div class="imagenes_proyecto grid grid-pad">
					<?php while ( have_posts() ) : the_post(); ?>
  					<?php if( have_rows('imagenes_del_proyecto') ): ?>
					<div class="col-1-2">
						<?php while( have_rows('imagenes_del_proyecto') ): the_row(); 					 
							// vars
							$image_izquierda = get_sub_field('imagen_columna_izquierda');
							$texto_imagen_izquierda = get_sub_field('texto_imagen_izquierda');
							if($image_izquierda){ ?>
						<img src="<?php echo $image_izquierda['url']; ?>" alt="<?php the_title(); ?>">
						<?php 
							}
							if($texto_imagen_izquierda){
						?>
						<p class="txt_descripcion"><?php echo $texto_imagen_izquierda; ?></p>
						<?php } ?>
						<?php endwhile; ?>
					</div>
					<div class="col-1-2">
						<?php while( have_rows('imagenes_del_proyecto') ): the_row(); 					 
							// vars
							$image_derecha = get_sub_field('imagen_columna_derecha');
							$texto_imagen_derecha = get_sub_field('texto_imagen_derecha');
							if($image_derecha){ ?>
						<img src="<?php echo $image_derecha['url']; ?>" alt="<?php the_title(); ?>">
						<?php 
							}
							if($texto_imagen_derecha){
						?>
						<p class="txt_descripcion"><?php echo $texto_imagen_derecha; ?></p>
						<?php } ?>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
					<?php endwhile; // end of the loop. ?>
				</div>

				<!-- SHARE -->
				<?php echo do_shortcode( '[shareaholic app="share_buttons" id="18107722"]' ) ?>
			</div>
			
		</article>
	</section>
	<!-- /CONTENT -->

<?php get_footer(); ?>

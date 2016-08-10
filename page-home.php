<?php
/**
 * Template Name: Home
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
		<main id="main" class="site-main">
    
			<!-- Video -->
      
      <section id="video_home">
        <div class="txt_video">
          <?php while( have_rows('tagline_home') ): the_row();                
            // vars
            $titulo = get_sub_field('titulo_tagline');
            $subtitulo = get_sub_field('subtitulo_tagline');
            $texto_boton = get_sub_field('text_button');
            $link_boton = get_sub_field('link_button');
            
            ?>
            <div class="content_tagline" style= "display: none;">
            <?php if($titulo): ?>
              <h2><?php echo $titulo; ?></h2>
            <?php endif; ?>
            <?php if($subtitulo): ?>
              <h4><?php echo $subtitulo; ?></h4>
            <?php endif; ?>
            <?php if($texto_boton): ?>
              <a href="<?php echo $link_boton; ?>" class="btn_large btn_white"><?php echo $texto_boton; ?></a>
            <?php endif; ?>
            </div>
          <?php endwhile; ?>
          
        </div>
        <?php while( have_rows('video_home') ): the_row(); 
          $mp4 = get_sub_field('video_mp4');
          $ogg = get_sub_field('video_ogg');
          $webm = get_sub_field('video_webm');
          $m4v = get_sub_field('video_m4v');
          $mov = get_sub_field('video_mov');
          $cover_image = get_sub_field('imagen_precarga');
        ?>
        <div class="cover_video"></div>
        <video loop autoplay preload muted poster="<?php $cover_image['url']; ?>">
          <?php if($mp4): ?><source src="<?php echo $mp4['url']; ?>" type="video/mp4"><?php endif; ?>
          <?php if($webm): ?><source src="<?php echo $webm['url']; ?>" type="video/webm"><?php endif; ?>
          <?php if($ogg): ?><source src="<?php echo $ogg['url']; ?>" type="video/ogg"><?php endif; ?>
          <?php if($m4v): ?><source src="<?php echo $m4v['url']; ?>" type="video/m4v"><?php endif; ?>
          <?php if($cover_image): ?><source src="<?php echo $mov['url']; ?>" type="video/mov"><?php endif; ?>
        </video>
        <?php endwhile; ?>

        <?php if('imagen_home'): ?>
          <section id="imagen_home">
            <img src="<?php the_field('imagen_home'); ?>" alt="CreativeDog">
          </section>
        <?php endif; ?>
      </section>

      <!-- Slider -->
	
      <section id="content_slider">
          <div class="wrapper_90">
              <!-- <h1 class="titulo_secciones black">Proyectos destacados</h1> -->
              <!-- <h5>Presentamos nuestros proyectos más recientes y destacados</h5> -->
  						<?php if( have_rows('slider_diapositiva') ): ?>
  					 	<article id="slider_home" class="slider">
  					 		<div class="flexslider">
  								<ul class="slides">
  							 
  								<?php while( have_rows('slider_diapositiva') ): the_row(); 
  							 
  									// vars
  									$image = get_sub_field('slider_imagen');
                    $related_post = get_sub_field('slider_link');
                    $link = get_permalink( $related_post->ID);
  									?>
  							 
  									<li>
  							 			<a href="<?php echo $link; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></a>
  									</li>
  							 
  								<?php endwhile; ?>
  							 
  								</ul>
  					 		</div>
  						</article>	
  						<?php endif; ?>
          </div>
        </section>

			
			<!-- Ultimos Proyectos -->

            <section id="ultimos_proyectos">
                <!-- <div class="wrapper_70"> -->
                    <h1 class="titulo_secciones black center">Últimos proyectos</h1>
                    <h4 class="titulo_secciones_ingles center">- Latest Work -</h4>
					
          					<?php 
          					$args_proyectos = array(
          						'post_type' => 'proyecto',
          						'meta_query' => array(
          							array(
          								'key' => 'destacado',
          								'value' => true
          							)
          						),
          						'posts_per_page'   => 8
          					);

          					// the query
          					$the_query = new WP_Query( $args_proyectos ); ?>

          					<?php if ( $the_query->have_posts() ) : ?>

                    <div id="container">
                  
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
                          
                          <div class="item masonry-brick">
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

                    <?php wp_reset_postdata(); ?>

          					<?php else:  ?>
          					  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          					<?php endif; ?>
                    <?php  
                      $page_proyecto = get_page_by_path('proyectos');
                      $proyectos_id = $page_proyecto->ID;
                    ?>
                    <a href="<?php echo get_permalink($proyectos_id); ?>" class="btn_large btn_black btn_full_width">ver todos</a>
                <!-- </div> -->
            </section>


            <!-- Skills -->

                <section id="skills">
                    <div class="wrapper_70">
                        <h1 class="titulo_secciones black center">Diseño y Desarrollo Web / Diseño Gráfico<br/>Diseño Editorial / Wordpress</h1>
                        <h4 class="titulo_secciones_ingles center">- Web Development / Graphic Design -</h4>

                        <div class="grid grid-pad">
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_web.png" alt="Desarrollo web"></a>
                                   <h3>Desarrollo Web / Web Development</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_html5.png" alt="HTML5"></a>
                                   <h3>HTML5</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_css3.png" alt="CSS3"></a>
                                   <h3>CSS3</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_jquery.png" alt="JQuery"></a>
                                   <h3>JQuery</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_e-commerce.png" alt="E-Commerce"></a>
                                   <h3>E-Commerce</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_wordpress.png" alt="Wordpress"></a>
                                   <h3>Wordpress</h3>
                               </div>
                            </div>
                        </div>

                        <div class="grid grid-pad">
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_grafico.png" alt="Diseño Gráfico"></a>
                                   <h3>Diseño Gráfico / Graphic Design</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_editorial.png" alt="Diseño Editorial"></a>
                                   <h3>Diseño Editorial / Editorial Design</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_ilust.png" alt="Ilustración"></a>
                                   <h3>Ilustración</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_branding.png" alt="Branding"></a>
                                   <h3>Branding</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_foto.png" alt="Fotografía"></a>
                                   <h3>Fotografía / Photography</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <a href="http://creativedog.com.ar/proyectos/"><img src="<?php bloginfo('template_url');?>/img/icon_pack.png" alt="Packaging"></a>
                                   <h3>Packaging</h3>
                               </div>
                            </div>
                          </div>
                        </div>
                </section>
            
		</main><!-- #main -->
	</div><!-- #primary -->


            

		

<?php get_footer(); ?>

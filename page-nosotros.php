<?php
/**
 * Template Name: Nosotros
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
			
			<div class="wrapper_70">
				<h1 class="titulo_secciones black center">Nosotros</h1>
				<h4 class="titulo_secciones_ingles center">- About Us -</h4>
				
				<section id="content_destacado_nosotros">
					<div class="grid grid-pad">
						<div class="item_nosotros col-1-3">
							<aside id="icon_pencil"></aside>
							<h3>Somos inquietos</h3>
							<p>Nos caracterizan audaces diseños, conceptos interesantes, interfaces simples e intuitivas y atención al detalle.</p>
						</div>
						<div class="item_nosotros col-1-3">
							<aside id="icon_coffee"></aside>
							<h3>Fieles</h3>
							<p>Nuestro compromiso con el cliente y su proyecto no duerme hasta lograr el objetivo.</p>
						</div>
						<div class="item_nosotros col-1-3">
							<aside id="icon_web"></aside>
							<h3>Y astutos</h3>
							<p>Contamos con el equipo y conocimiento necesario para afrontar todo tipo de desafíos.</p>
						</div>
					</div>
				</section>

				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>

			</div>

			<div class="not-fullscreen background parallax parallax_nosotros" style="background-image:url('<?php bloginfo('template_url');?>/img/bk_nosotros.jpg');" data-img-width="100%" data-img-height="500" data-diff="100">
			    <div class="content-a">
			        <div class="content-b">
			            <article id="txt_nosotros">
			            	<h1>Creative Dog</h1>
			            	<h3>Pixel & Code Studio</h3>
			            	<p>Nació con la idea de crear un estudio capaz de cubrir todas las facetas del diseño y su desarrollo técnico. Con amplia experiencia en Diseño y Desarrollo Web, Diseño Gráfico, Editorial y Publicidad.<br/><br/>
							El objetivo es aplicar nuestro conocimiento para proporcionar un enfoque de diseño coherente y completo para cada cliente, a través de una gran variedad de medios de comunicación.</p>
			            </article>
			        </div>
			    </div>
			</div>

			<div class="wrapper_90">
				<h1 class="titulo_secciones black center">Servicios y habilidades</h1>
				<h4 class="titulo_secciones_ingles center">- Skills and Services -</h4>
				<h2 class="servicios">
					<span>direccion de arte</span> <span>diseño y desarrollo web</span> <span>diseño grafico</span> <span>diseño editorial</span> <span>publicidad</span> <span>fotografia</span>
					<span>marketing digital</span> <span>branding</span> <span>Art Direction</span> <span>graphic design</span> <span>web development</span> <span>photography</span> 
					<span>advertising</span> <span>website design</span> <span>html5</span> <span>css3</span> <span>php</span> <span>jquery</span> <span>wordpress</span>
					<div class="clearfix"></div>
				</h2>
				<a href="javascript:void(0);" class="btn_contact btn_contact_nosotros">conocenos / meet us</a>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

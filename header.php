<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package CreativeDog
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="Estudio de diseño y desarrollo web. Nos caracterizan audaces diseños, conceptos interesantes, interfaces simples e intuitivas y atención al detalle.">
    <meta name="author" content="CreativeDog | Pixel & Code Studio">
    <meta name="keywords" content="estudio de diseño, paginas web, diseño web, diseño de paginas web, desarrollo web, desarrollo en php, wordpress, sitios cms, sitios en wordpress, diseño grafico, diseño de marca, diseño de logos, identidad corporativa, estudio web, diseño y desarrollo de sitios web">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="_L4MsYonyhgFIz4hIuLQSwq5uO2gaKeLmrLhyFAWt-s" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    
    <script type="text/javascript">
    setTimeout(function(){var a=document.createElement("script");
    var b=document.getElementsByTagName("script")[0];
    a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0044/7939.js?"+Math.floor(new Date().getTime()/3600000);
    a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
    </script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Pre-Loader -->
<div id="divLoading"></div>

<div id="page" class="hfeed site">
	
    <section id="content_contacto">
        <div class="wrapper_contacto">
            <a href="javascript:void(0);" class="btn_close_contacto"><i class="fa fa-times fa-4x"></i></a>
            <h1 class="titulo_secciones black center title_contacto">CONTACTO</h1>
            <h4 class="titulo_secciones_ingles center">- CONTACT -</h4>
            
            <p class="content_the_content">
                <?php 
                    $my_id = 41;
                    $post_id = get_post($my_id);
                    $content = $post_id->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]>', $content);
                    echo $content;
                ?>
            </p>            
            <?php echo do_shortcode('[contact-form-7 id="4" title="Contacto"]'); ?>             
        </div>
    </section>

    <section id="content_nav">
        <nav id="nav_main">
            <aside class="content_btn_close_menu">
                <a href="javascript:void(0);" class="btn_close_menu"><i class="fa fa-times fa-3x"></i></a>
            </aside>
            
            <?php 
                $defaults = array(
                    'theme_location'  => 'primary',
                    'menu'            => '',
                    'container'       => '',
                    'container_class' => 'nav',
                    'container_id'    => '',
                    'menu_class'      => 'nav',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul class="nav"> %3$s </ul>',
                    'depth'           => 0,
                    'walker'          => ''
                );

                wp_nav_menu( $defaults );
            ?>

            <hr class="separador_nav">
            <div class="soc">
                <ul>
                    <li class="soc2"><a href="<?php if (get_field('facebook','options')) {the_field('facebook','options');}?>" target="_blank"></a></li>
                    <li class="soc3"><a href="<?php if (get_field('twitter','options')) {the_field('twitter','options');}?>" target="_blank"></a></li>                           
                </ul>
            </div>
            <h1 class="slogan">Pixel & Code Studio</h1>
        </nav>
    </section>

    <div class="content_page">

        <header>
            <h1 class="logo_header"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url');?>/img/logo_creativedog.svg" alt="Creativedog"></a></h1>
            <a href="javascript:void(0);" class="btn_menu">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="clearfix"></div>
        </header>
        
        <div class="container">


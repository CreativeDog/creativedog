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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <!-- Pre-Loader -->
    <div id="divLoading"></div>
    
    <div id="page" class="hfeed site">
    
        <div class="wrapper_70 content_presupuesto">	
            <div class="grid grid-pad header_presupuesto">
                
                <!-- Print Icon -->
                <a href="javascript:window.print()" class="print-icon" title="Imprimir Presupuesto"><img src="<?php bloginfo('template_url');?>/img/print-icon.png" alt="Print"></a>
                <div class="clearfix"></div>
                
                <div class="col-1-2">
                    <!-- Logo -->
                    <h1 style="float: none; margin: 20px 0px 0px 0px; padding: 0px;" class="logo_header"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url');?>/img/logo_creativedog.svg" alt="Creativedog"></a></h1>
                    <h1 class="slogan">Pixel<br/>&<br/>Code<br/>Studio</h1>
                </div>
                <div class="col-1-2 datos_cd_presupuesto">
                    <h2 class="encabezado_presupuesto grey">Presupuesto</h2>
                    <p class="grey"><?php echo get_the_date(); ?></p>
                    <p class="datos">
                        <strong>CreativeDog</strong><br/>
                        <a href="mailto:hola@creativedog.com.ar">hola@creativedog.com.ar</a><br/>
                        <a href="http://www.creativedog.com.ar" target="_blank">creativedog.com.ar</a><br/>
                        Tel. [011] 5263.0163
                    </p>
                </div>
            </div>

            <hr>


<?php
/**
 * CreativeDog functions and definitions
 *
 * @package CreativeDog
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'creativedog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function creativedog_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CreativeDog, use a find and replace
	 * to change 'creativedog' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'creativedog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'creativedog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'creativedog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // creativedog_setup
add_action( 'after_setup_theme', 'creativedog_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function creativedog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'creativedog' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'creativedog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function creativedog_scripts() {
	// wp_enqueue_style( 'creativedog-style', get_stylesheet_uri() );

	/* CSS */
	wp_enqueue_style( 'normalize-css', get_template_directory_uri() . '/css/normalize.min.css', array(), '07022015' );
	wp_enqueue_style( 'font-awsome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '03062015' );
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array(), '07022015' );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array(), '07022015' );

	//wp_enqueue_script( 'creativedog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '07022015', true );

	wp_enqueue_script( 'creativedog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '07022015', true );

	/* JS */
	//wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery-1.11.2.min.js', array(), '07022015', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '07022015', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), '07022015', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '08062015', true );
	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', array(), '07022015', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '07022015', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creativedog_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

include 'ChromePhp.php';


function send_presupuesto( $ID, $post ) {
	if ( get_post_type( $post ) == 'presupuesto' ) {
		$password = $post->post_password;
		$email = get_field('mail_cliente',$ID);
		$headers[] = 'From: CreativeDog <presupuesto@creativedog.com.ar>';
		$headers[] = 'Content-type: text/html';	
		$cliente = get_field('cliente',$ID);
		$subject = 'Hola '.$cliente.', ya podés ver tu presupuesto!';
		$proyecto = get_post($ID)->post_title;
		$path = get_bloginfo("template_url");
		$message = '<br/><br/>';
		$message .= '<div style="width:525px; margin: 0px auto;"><img src="'.$path.'/img/logo_creativedog.png" alt="Creativedog" width="200" height="30"></div>';
		$message .= "<br/><br/>";
		$message .= "<div style='background-color:#ededed;padding: 15px 15px 25px 15px; border:1px solid #c9c9c9; width: 525px; margin:0px auto;'><p>Podés ingresar para ver tu presupuesto de <strong>".$proyecto."</strong> con la siguiente contraseña:<br/><br/><span style='font-size:16px;'>Contraseña:</span> <strong style='color:#5ac6bf; font-size:17px;'>".$password."</strong><br/><br/>Haciendo click en:</p><br/>";
		$link = get_permalink($ID); 
		$message .= '<a href="'.$link.'" style="color: #FFF; background-color: #000; padding: 10px 20px; font-size: 12px; text-decoration: none;">VER PRESUPUESTO</a>';
		$message .= "</div>";
		//sends email
		wp_mail($email, $subject, $message, $headers );
	}
}



add_action('publish_presupuesto', 'send_presupuesto',10,2);


// Include the Google Analytics Tracking Code (ga.js)
// @ https://developers.google.com/analytics/devguides/collection/gajs/
function google_analytics_tracking_code(){

	$propertyID = 'UA-55100652-1'; // GA Property ID

	if ($options['ga_enable']) { ?>

		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $propertyID; ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>

<?php }
}

// include GA tracking code before the closing head tag
add_action('wp_head', 'google_analytics_tracking_code');

// OR include GA tracking code before the closing body tag
// add_action('wp_footer', 'google_analytics_tracking_code');


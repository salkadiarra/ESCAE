<?php
/**
 * Bussiness agency functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bussiness_agency
 */

if ( ! function_exists( 'education_method_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function education_method_setup() {
		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Bussiness agency, use a find and replace
         * to change 'education_method' to the name of your theme in all the template files.
         */
		load_theme_textdomain( 'education-method' );

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
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'education-method' ),
			'social-link' => esc_html__('Social Link', 'education-method'),
			
		) );

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'education_method_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		/*for header image */

		$education_method_args = array(
			'flex-width'    => true,
			'width'         => 980,
			'flex-height'    => true,
			'height'        => 200,
			'default-image' => get_template_directory_uri() . '/assets/images/header.png',
		);
		add_theme_support( 'custom-header', $education_method_args );


		/**woo compatible*/
		add_theme_support( 'woocommerce' );

        /*add excert on page*/
        add_post_type_support( 'page', 'excerpt' );

		add_theme_support( 'align-wide' );


// woocommerce images popup code
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );

	}
endif;
add_action( 'after_setup_theme', 'education_method_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function education_method_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'education_method_content_width', 640 );
}
add_action( 'after_setup_theme', 'education_method_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function education_method_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Top-info', 'education-method' ),
		'id'            => 'top-info',
		'description'   => esc_html__( 'Add EM : Top info widgets here.', 'education-method' ),
		'before_widget' => '<section id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'education-method' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'education-method' ),
		'before_widget' => '<section id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name' => esc_html__('HomePage Widgets Area ', 'education-method'),
		'id' => 'homepage_widgets',
		'description' => esc_html__('Add widgets here.', 'education-method'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Info Section', 'education-method'),
		'id' => 'footerinfo',
		'description' => esc_html__('Add widgets here.', 'education-method'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer1 ', 'education-method'),
		'id' => 'footer1',
		'description' => esc_html__('Add widgets here.', 'education-method'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer2 ', 'education-method'),
		'id' => 'footer2',
		'description' => esc_html__('Add widgets here.', 'education-method'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer3 ', 'education-method'),
		'id' => 'footer3',
		'description' => esc_html__('Add widgets here.', 'education-method'),
		'before_widget' => '<section id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer4 ', 'education-method'),
		'id' => 'footer4',
		'description' => esc_html__('Add widgets here.', 'education-method'),
		'before_widget' => '<section id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
}
add_action( 'widgets_init', 'education_method_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function education_method_scripts() {

	
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri().'/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'owl.theme', get_template_directory_uri().'/assets/css/owl.theme.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome',get_template_directory_uri().'/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-animate', get_template_directory_uri().'/assets/css/animate.css' );
	
	wp_enqueue_style( 'education-method-style', get_stylesheet_uri() );
	wp_enqueue_style( 'education-method-media', get_template_directory_uri().'/assets/css/media.css' );
	

	wp_enqueue_script( 'carousel.min', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '4.5.0' );
	wp_enqueue_script( 'jquery.isotope', get_template_directory_uri().'/assets/js/jquery.isotope.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery.ticker', get_template_directory_uri().'/assets/js/jquery.ticker.min.js', array('jquery'), '20151215', false );

	wp_enqueue_script( 'jquery.touchSwipe', get_template_directory_uri().'/assets/js/jquery.touchSwipe.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'education-method-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'education_method_scripts' );


/**
 * define size of logo.
 */

if (!function_exists('education_method_custom_logo_setup')) :
	function education_method_custom_logo_setup()
	{
		add_theme_support('custom-logo', array(
			'height' => 90,
			'width' => 300,
			'flex-width' => true,
		));
	}

	add_action('after_setup_theme', 'education_method_custom_logo_setup');
endif;


if (!function_exists('education_method_widgets_backend_enqueue')) :
	function education_method_widgets_backend_enqueue($hook)
	{
		if ('widgets.php' != $hook) {
			return;
		}

		wp_register_script('education-method-custom-widgets', get_template_directory_uri() . '/assets/js/widgets.js', array('jquery'), true);
		wp_enqueue_media();
		wp_enqueue_script('education-method-custom-widgets');

        
        wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.css' );
        wp_enqueue_style( 'education-method-style-admin', get_template_directory_uri() . '/assets/css/repeater-admin.css');
	}

	add_action('admin_enqueue_scripts', 'education_method_widgets_backend_enqueue');
endif;




if (!function_exists('education_method_admin_css_enqueue_new_post')) :
	function education_method_admin_css_enqueue_new_post($hook)
	{
		if ('post-new.php' != $hook) {
			return;
		}
		wp_enqueue_style('education-method-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');
	}
	add_action('admin_enqueue_scripts', 'education_method_admin_css_enqueue_new_post');
endif;



if (!function_exists('education_method_admin_css_enqueue')) :
	function education_method_admin_css_enqueue($hook)
	{
		if ('post.php' != $hook) {
			return;
		}
		wp_enqueue_style('education-method-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');
		
		wp_enqueue_script('education_method-custom-widgets');

	}
	add_action('admin_enqueue_scripts', 'education_method_admin_css_enqueue');
endif;



/**
 * Admin Enqueue scripts
 */
if ( ! function_exists( 'education_method_admin_scripts' ) ) {
    function education_method_admin_scripts($hook) {

        wp_enqueue_script('education_method-media-repeater', get_template_directory_uri() . '/assets/js/repeater-admin.js', array( 'jquery', 'customize-controls' ) );

        wp_enqueue_style('at-ample-admin', get_template_directory_uri() . '/assets/css/at-admin-css.css', array(), '2.0.0');

    }
}
add_action('admin_enqueue_scripts', 'education_method_admin_scripts');





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/fileloader.php';

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/library/breadcrumbs/breadcrumbs.php';



/*add custom body class for sidebar section*/




/*for sidebar adding options**/

function education_method_names( $classes ) {
	// add 'class-name' to the $classes array
	$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'education_method_sidebar_layout', true) );
	if (is_singular() && $sidebardesignlayout != "default-sidebar")
	{
		$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'education_method_sidebar_layout', true) );

	} else
	{
		$sidebardesignlayout = esc_attr(education_method_get_option('education_method_sidebar_layout_option' ));
	}

	$classes[] = $sidebardesignlayout;
	return $classes;

}
add_filter( 'body_class', 'education_method_names' );

/**
 * Load Dynamic css.
 */
$education_method_dynamic_css_options = education_method_get_option('education_method_color_reset_option');

if ($education_method_dynamic_css_options== "do-not-reset" || $dynamic_css_options == "") {

	include get_template_directory() . '/inc/hook/dynamic-style-css.php';

} elseif ($education_method_dynamic_css_options == "reset-all") {
	do_action('education_method_colors_reset');
}




/**
 * Run ajax request.
 */
if ( ! function_exists('education_method_wp_pages_plucker') ) :

	/**
	 * Sending pages with ids
	 */
	function education_method_wp_pages_plucker()
	{
		$pages = get_pages(
			array (
				'parent'  => 0, // replaces 'depth' => 1,
			)
		);

		$ids = wp_list_pluck( $pages, 'post_title', 'ID' );

		return wp_send_json($ids);
	}

endif;
add_action( 'wp_ajax_education_method_wp_pages_plucker', 'education_method_wp_pages_plucker' );
add_action( 'wp_ajax_nopriv_education_method_wp_pages_plucker', 'education_method_wp_pages_plucker' );


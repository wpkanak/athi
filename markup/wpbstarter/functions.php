<?php
/**
 * wpbstarter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpbstarter
 */

if ( ! function_exists( 'wpbstarter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpbstarter_setup() {

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
		add_image_size( 'wpbstarter-blog', 750, 450, true );
		add_image_size( 'wpbstarter-logo', 300, 90, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'wpbstarter' ),
        'right_side_menu' => esc_html__( 'Right Side Menu', 'wpbstarter' ),
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

	function wpbstarter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wpbstarter_add_editor_styles' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wpbstarter_custom_background_args', array(
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
			'height'      => 90,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wpbstarter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpbstarter_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wpbstarter_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpbstarter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpbstarter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpbstarter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpbstarter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wpbstarter' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wpbstarter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'wpbstarter' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wpbstarter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'wpbstarter' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wpbstarter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wpbstarter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpbstarter_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', array(), '4.4.1', 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/fontawesome-all.css', array(), '5.13.0', 'all' );
	wp_enqueue_style( 'wpbstarter-defaultcss', get_template_directory_uri().'/assets/css/default.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'wpbstarter-customcss', get_template_directory_uri().'/assets/css/custom.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'sinanav', get_template_directory_uri().'/assets/css/sina-nav.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'wpbstarter-responsive', get_template_directory_uri().'/assets/css/responsive.css', array(), '2.1', 'all' );
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'wpbstarter-woocomerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	}

	wp_enqueue_style( 'wpbstarter-style', get_stylesheet_uri() );

	
    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'sinanavjs',get_template_directory_uri().'/assets/js/sina-nav.js', array('jquery'), '2.1.0', true );
	wp_enqueue_script( 'bootstrap-bundled-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '4.4.1', true );
	wp_enqueue_script( 'wpbstarter-navigationjs', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true );
	wp_enqueue_script( 'wpbstarter-themejs', get_template_directory_uri() . '/assets/js/theme-script.js', array(), '', true );
	wp_enqueue_script( 'wpbstarter-skip-link-focus-fix-js', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0', true );
	wp_enqueue_script( 'wpbstarter-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpbstarter_scripts' );


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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load woocommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

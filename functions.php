<?php
/**
 * RS Barber Shop Theme functions and definations.
 */

if ( ! function_exists( 'rsbs_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rsbs_theme_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Crafty Press, use a find and replace
		* to change 'rsbs_theme' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'rsbs_theme', get_template_directory() . '/languages' );

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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rsbs_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', [
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		] );

		/**
		 * Add Support for Custom Page Header
		 */
		add_theme_support( 'custom-header', array(
			'flex-width'	=> true,
			'width'			=> 1600,
			'flex-height'	=> true,
			'height'		=> 450,
			'default-image' => '',
		) );

		/**
		 * Add Post Type Support
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'rsbs_theme' ),
			'footer' => esc_html__( 'Footer Menu', 'rsbs_theme' ),
			'header_action' => esc_html__( 'Header Action', 'rsbs_theme' ),
		) );

		add_filter( 'show_admin_bar', '__return_false' );

		/**
		 * WooCommerce Support
		 */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
	}
}
add_action( 'after_setup_theme', 'rsbs_theme_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rsbs_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rsbs_theme_content_width', 1170 );
}
add_action( 'after_setup_theme', 'rsbs_theme_content_width', 0 );

/**
 * Enqueue public scripts and styles.
 */
function rsbs_theme_public_scripts() {
	$filename = get_template_directory() . '/dist/css/main.css';
	wp_register_style( 'rsbs-theme-main', get_template_directory_uri() . '/dist/css/main.css', [], filemtime( $filename ) , 'all' );

	$filename = get_template_directory() . '/dist/js/main.js';
	wp_register_script( 'rsbs-theme-main', get_template_directory_uri() . '/dist/js/main.js', [ 'jquery' ], filemtime( $filename ), true );

	wp_enqueue_style( 'rsbs-theme-main' );
	wp_enqueue_script( 'rsbs-theme-main' );
}
add_action( 'wp_enqueue_scripts', 'rsbs_theme_public_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function rsbs_theme_admin_scripts() {

}
add_action( 'admin_enqueue_scripts', 'rsbs_theme_admin_scripts' );

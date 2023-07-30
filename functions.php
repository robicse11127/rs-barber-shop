<?php
/**
 * RS barber shop functions and definations.
 */

if ( ! function_exists( 'rs_barber_shop_setup' ) ) {
    /**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
    function rs_barber_shop_setup() {
        /**
		 * Add Post Type Support
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

        // This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-left' => esc_html__( 'Header Left', 'rs-barber-shop' ),
			'header-right' => esc_html__( 'Header right', 'rs-barber-shop' ),
            'footer' => esc_html__( 'Footer Menu', 'rs-barber-shop' ),

		) );

		add_filter( 'show_admin_bar', '__return_false' );
    }
}
add_action( 'after_setup_theme', 'rs_barber_shop_setup' );

/**
 * Enqueue public scripts and styles.
 */
function rs_barber_shop_public_scripts() {
    // Styles.
    wp_enqueue_style( 'rs-barber-shop-main', get_template_directory_uri() . '/assets/css/main.css', [], wp_rand(), 'all' );

    // Scripts.
    wp_enqueue_script( 'rs-barber-shop-core', get_template_directory_uri() . '/assets/js/core.min.js', [ 'jquery' ], wp_rand(), true );
    wp_enqueue_script( 'rs-barber-shop-script', get_template_directory_uri() . '/assets/js/script.js', [ 'jquery', 'rs-barber-shop-core' ], wp_rand(), true );
}
add_action( 'wp_enqueue_scripts', 'rs_barber_shop_public_scripts' );

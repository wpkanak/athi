<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package wpbstarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wpbstarter_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wpbstarter_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wpbstarter_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'wpbstarter_pingback_header' );

/**
 * Add color styling from theme
 */
if ( is_user_logged_in() ) {
	function wpbstarter_custom_styles() {
	    wp_enqueue_style(
	        'custom-style',
	        get_template_directory_uri() . '/assets/css/custom.css'
	    );
	        
	        $custom_css = "
	                .search-box.searchmod{
	                        top: 94px;
	                }
	                @media only screen and (max-width: 782px) { 
	                .search-box.searchmod{
	                        top: 107px;
	                }
	                }
";
	        wp_add_inline_style( 'wpbstarter-customcss', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'wpbstarter_custom_styles' );
}
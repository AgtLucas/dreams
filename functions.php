<?php
/**
 * Dreams Functions and definitions
 * 
 * @package WordPress
 * @subpackage Dreams
 * @since Dreams 0.1
 */

/**
 * Enqueues scripts and styles
 * 
 * @since Dreams 0.1
 */
function dreams_scripts_styles() {
	global $wp_styles;

	/* jQuery from Google CDN */
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js", false, null );
		wp_enqueue_script( 'jquery' );
	}

	/* FitVidsJs adn main JS files */
	wp_enqueue_script( 'fitvids-js', get_template_directory_uri() . '/js/fitvids.min.js', array(), '1.0', true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0', true );

	/* Cutive Mono Font by Google Fonts */
	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = array(
		'family'	=> 'Cutive+Mono:400italic,700italic,400,700',
	);
	wp_enqueue_style( 'dreams-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );

	/* Main Stylesheet */
	wp_enqueue_style( 'dreams-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'dreams_scripts_styles' );










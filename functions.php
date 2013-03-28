<?php
/**
 * Dreams Functions and definitions
 * 
 * @package WordPress
 * @subpackage Dreams
 * @since Dreams 0.1
 */

/**
 * Define Constants
 * 
 * @since Dreams 0.1
 */
define( 'DREAMS', get_template_directory_uri() );
define( 'IMAGES', DREAMS . '/img' );

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
		wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false, null, true );
		wp_enqueue_script( 'jquery' );
	}

	/* JS files */
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', array(), '2.6.2' );
	wp_enqueue_script( 'fitvids-js', get_template_directory_uri() . '/js/fitvids.min.js', array(), '1.0', true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0', true );

	/* Source Sans Pro Font by Google Fonts */
	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = array(
		'family'	=> 'Source+Sans+Pro:400italic,700italic,400,700',
	);
	wp_enqueue_style( 'dreams-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );

	/* Main Stylesheet */
	if ( !is_admin( wp_enqueue_style( 'dreams-style', get_bloginfo( 'stylesheet_directory' ) . '/css/style.css' ) ) );
}
add_action( 'wp_enqueue_scripts', 'dreams_scripts_styles' );

/**
 * Custom Pagination 
 * 
 * @since Dreams 0.1
 */
function pagination( $pages = '', $range = 4 ) {
	$showitems = ( $range * 2 ) + 1;

	global $paged;
	if ( empty( $paged ) ) $paged = 1;

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( !$pages ) {
			$pages = 1;
		}
	}
	if ( 1 != $pages ) {
		echo "<section class=\"pagination cf\">";
		if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) echo "<a href='".get_pagenum_link( 1 )."'>&laquo; First</a>";
		if ( $paged > 1 && $showitems < $pages ) echo "<a href='".get_pagenum_link( $paged - 1 )."'>&lsaquo; Previous</a>";

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i )? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}

		if ( $paged < $pages && $showitems < $pages ) echo "<a href=\"".get_pagenum_link( $paged + 1 )."\">Next &rsaquo;</a>";
		if ( $paged < $pages - 1 && $paged+$range-1 < $pages && $showitems < $pages ) echo "<a href='".get_pagenum_link( $pages )."'>Last &raquo;</a>";

	}
}

/**
 * Register Menus
 * 
 * @since Dreams 0.1
 */
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) :
	register_nav_menus( array(
			'primary_nav' => 'Primary Navigation'
	));
endif;

/**
 * Register Footer Widgets
 * 
 * @since Dreams 0.1
 */
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar(array(
		'name'			=> __( 'Footer Widgets 1' ),
		'id'			=> 'footer-widgets-1',
		'before_widget'	=> '<li id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	));

	register_sidebar(array(
		'name'			=> __( 'Footer Widgets 2' ),
		'id'			=> 'footer-widgets-2',
		'before_widget'	=> '<li id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	));

	register_sidebar(array(
		'name'			=> __( 'Footer Widgets 3' ),
		'id'			=> 'footer-widgets-3',
		'before_widget'	=> '<li id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	));
}








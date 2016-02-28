<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'The Great Deluge' );
define( 'CHILD_THEME_URL', 'http://www.gingercult.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_scripts' );
/**
 * Enqueue scripts and fonts
 *
 * Loads full scripts in local development when WP_DEBUG is turned on.
 *
 * Run 'grunt uglify' to update minified scripts as well as create conditional page scripts.
 * Before pushing to server, run 'grunt uglify' to update uglified version
 *
 * @since 1.0.0
 */
function enqueue_child_theme_scripts() {

	if( WP_DEBUG ) {
		wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ) );
		wp_enqueue_script( 'countdown', get_stylesheet_directory_uri() . '/assets/js/home/TimeCircles.js', array( 'jquery' ) );
		wp_enqueue_script( 'home-scripts', get_stylesheet_directory_uri() . '/assets/js/home/home-scripts.js', array( 'jquery', 'countdown' ) );
	} else {
		if( is_front_page() ) {
			wp_enqueue_script( 'home-scripts', get_stylesheet_directory_uri() . '/js/plugins.home.min.js', array( 'jquery' ), CHILD_THEME_VERSION );
		} else {
			wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/plugins.min.js', array( 'jquery' ), CHILD_THEME_VERSION );
		}
	}

	wp_localize_script( 'home-scripts', 'THE_GREAT_DELUGE', array(
		'launch' 	=> strtotime( get_option( 'tgd_countdown' ) )
	) );
}

add_action( 'admin_enqueue_scripts', 'enqueue_needed_fonts' );
add_action( 'wp_enqueue_scripts', 'enqueue_needed_fonts' );
/**
 * Enqueue the needed fonts on the front-end as well as the back for editor style support
 */
function enqueue_needed_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Open+Sans:300,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for custom header
$header_args = array(
	'header-text' 		=> false,
	'header-selector' 	=> '.site-header .wrap'
);
add_theme_support( 'custom-header', $header_args );

//* Unregister secondary navigation menu
add_theme_support( 'genesis-menus', array() );

//* Remove the default widget areas
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );

// Unregister other site layouts
genesis_unregister_layout( 'content-sidebar' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

// Customizer Options
include_once( get_stylesheet_directory() . '/customizer/customizer.php' );

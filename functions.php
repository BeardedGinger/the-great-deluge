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
		}
			wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/plugins.min.js', array( 'jquery' ), CHILD_THEME_VERSION );

	}

	wp_localize_script( 'home-scripts', 'THE_GREAT_DELUGE_HOME', array(
		'launch' 	=> strtotime( get_option( 'tgd_countdown_timer' ) ),
		'day_color' 	=> get_option('tgd_day_color'),
		'hour_color' 	=> get_option('tgd_hour_color'),
		'minute_color' 	=> get_option('tgd_minute_color'),
		'second_color' 	=> get_option('tgd_second_color'),
	) );

	$posts_count = wp_count_posts()->publish;

	wp_localize_script( 'scripts', 'THE_GREAT_DELUGE_SCRIPTS', array(
		'posts' 	=> $posts_count
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

//* Remove sidebars from templates
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );

//* Remove the default widget areas
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );
unregister_sidebar( 'header-right' );

// Unregister other site layouts
genesis_unregister_layout( 'content-sidebar' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

// reposition entry meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 5 );

// filter entry-meta. extra filter added to home.php for update loop
add_filter( 'genesis_post_info', function() { return '[post_date] [post_author_posts_link] [post_comments] [post_edit]'; } );

// archive and post layout changes
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


//* Register after post widget area
genesis_register_sidebar( array(
	'id'            => 'home-cta',
	'name'          => __( 'Home Call to Action', 'the-great-deluge' ),
	'description'   => __( 'Widget area on the homepage below main banner', 'the-great-deluge' ),
) );

// Customizer Options
include_once( get_stylesheet_directory() . '/customizer/customizer.php' );

add_filter( 'genesis_footer_creds_text', 'tgd_footer_creds_text' );
/**
 * Filter the default credits to include LimeCuda branding and info.
 *
 * @since 1.0.0
 */
function tgd_footer_creds_text() {
	echo '<div class="creds">';
	echo '<p>Grown, Trimmed and Oiled in Macon, GA</p><br>';
	echo '<p>&copy; ';
	echo date('Y');
	echo ' <a href="http://gingercult.com">Cult of the Ginger Beard</a>  &middot; ';
	echo '<a href="http://gingercult.com">The Great Deluge Theme</a> by <a href="http://gingercult.com">Cult of the Ginger Beard</a>';
	echo '</p></div>';
}

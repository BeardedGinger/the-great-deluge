<?php
/**
 * Front page template
 */

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove navigation
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Remove page title
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

//* Remove site footer elements
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

add_action( 'genesis_after_header', 'tgd_hero_section' );
/**
 * Hero Text
 *
 * @since 1.0.0
 */
function tgd_hero_section() {
	if( get_option( 'tgd_hero' ) ) {
		echo '<h2>' . get_option( 'tgd_hero' ) . '</h2>';
	}
}

//* Run the Genesis loop
genesis();

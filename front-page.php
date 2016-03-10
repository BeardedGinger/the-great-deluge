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

add_action( 'genesis_after_header', 'tgd_hero_section' );
/**
 * Hero Text & Countdown
 *
 * @since 1.0.0
 */
function tgd_hero_section() {

	$hero_text = get_option( 'tgd_hero' );
	$countdown = get_option( 'tgd_countdown' );
	?>

	<section id="section-hero" class="hero">
		<div class="wrap">
			<?php
				if( isset( $hero_text ) ) {
					echo '<h2 class="hero-title">' . get_option( 'tgd_hero' ) . '</h2>';
				}
				if( isset( $countdown ) ) { ?>

					<h3 class="launch-heading"><?php _e( 'Launching In:', 'the-great-deluge' ); ?></h3>
					<div id="countdown"></div>

				<?php
				}
			?>
		</div>
	</section>

<?php
}

add_action( 'genesis_after_header', 'tgd_home_widget_area' );
/**
 * Home widget area. Used in demo for subscription form
 *
 * @since 1.0.0
 */
function tgd_home_widget_area() { ?>

	<section id="section-widget" class="home-widget-area">
		<div class="wrap">
			<?php
				genesis_widget_area( 'home-cta', array(
					'before' 	=> '<div class="home-widgets">',
					'after' 	=> '</div>'
				) );
			?>
		</div>
	</section>

<?php
}

//* Run the Genesis loop
genesis();

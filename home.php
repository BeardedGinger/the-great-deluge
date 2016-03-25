<?php
/**
 * Front page template
 */

add_filter( 'genesis_post_info', function() { return '[post_date]'; } );

add_action( 'genesis_after_header', 'tgd_hero_section' );
/**
 * Hero Text & Countdown
 *
 * @since 1.0.0
 */
function tgd_hero_section() {

	$hero_text = get_option( 'tgd_hero' );
	?>

	<section id="home-hero" class="hero">
		<?php
			if( isset( $hero_text ) ) {
				echo '<h2 class="hero-title">' . get_option( 'tgd_hero' ) . '</h2>';
			}
		?>
		<div class="hero-left">

		</div>

		<div class="hero-right">
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

add_action( 'genesis_after_header', 'tgd_home_countdown_area' );
/**
 * Home Countdown area below the hero section
 *
 * @since 1.0.0
 */
function tgd_home_countdown_area() { ?>

	<section id="section-countdown" class="home-countdown-area">
		<div class="wrap">
			<?php
				$countdown = get_option( 'tgd_countdown' );

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

//* Run the Genesis loop
genesis();

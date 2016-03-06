<?php

add_action( 'customize_register', 'gingerbeard_tgd_customizer_options', 20 );
function gingerbeard_tgd_customizer_options( $wp_customize ) {

	/**
	 * Remove unneeded elements from the customizer
	 *
	 * @since 1.0.0
	 */
	$wp_customize->remove_section( 'genesis_layout' );
	$wp_customize->remove_section( 'genesis_breadcrumbs' );

	/**
	 * General settings for The Great Deluge
	 *
	 * @since 1.0.0
	 */

	$wp_customize->add_panel( 'tgd_customizer', array(
		'title' 	=> __('The Great Deluge', 'the-great-deluge'),
		'priority' 	=> 1
	) );

		$wp_customize->add_section( 'tgd_general', array(
			'title' 	=> __('General Settings', 'the-great-deluge'),
			'panel' 	=> 'tgd_customizer'
		) );

			//* Hero Text
			$wp_customize->add_setting( 'tgd_hero', array(
				'capability' 			=> 'edit_theme_options',
				'type' 					=> 'option',
				'sanitize_callback' 	=> 'tgd_sanitize_text'
			) );

			$wp_customize->add_control( 'tgd_hero', array(
				'section' 		=> 'tgd_general',
				'label' 		=> __('Hero Text', 'the-great-deluge')
			) );

		$wp_customize->add_section( 'tgd_countdown', array(
			'title' 	=> __('Launch Countdown', 'the-great-deluge'),
			'panel' 	=> 'tgd_customizer'
		) );

			//* Launch Date
			$wp_customize->add_setting( 'tgd_countdown_timer', array(
				'type' 			=> 'option',
				'capability' 	=> 'edit_theme_options',
			) );

			$wp_customize->add_control( 'tgd_countdown_timer', array(
				'type' 			=> 'date',
				'section' 		=> 'tgd_countdown',
				'label' 		=> __('Launch Date', 'the-great-deluge'),
				'description' 	=> __('Set the launch date for controlling the countdown', 'the-great-deluge')
			) );

			//* Day Color
			$wp_customize->add_setting( 'tgd_day_color', array(
				'type' 			=> 'option',
				'capability' 	=> 'edit_theme_options',
				'default' 		=> '#ff0000'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tgd_day_color', array(
				'label' 		=> __('Day Countdown Color', 'the-great-deluge'),
				'section' 		=> 'tgd_countdown',
				'settings' 		=> 'tgd_day_color',
			) ) );

			//* Hour Color
			$wp_customize->add_setting( 'tgd_hour_color', array(
				'type' 			=> 'option',
				'capability' 	=> 'edit_theme_options',
				'default' 		=> '#ff0000'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tgd_hour_color', array(
				'label' 		=> __('Hour Countdown Color', 'the-great-deluge'),
				'section' 		=> 'tgd_countdown',
				'settings' 		=> 'tgd_hour_color'
			) ) );

			//* Minute Color
			$wp_customize->add_setting( 'tgd_minute_color', array(
				'type' 			=> 'option',
				'capability' 	=> 'edit_theme_options',
				'default' 		=> '#ff0000'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tgd_minute_color', array(
				'label' 		=> __('Minute Countdown Color', 'the-great-deluge'),
				'section' 		=> 'tgd_countdown',
				'settings' 		=> 'tgd_minute_color'
			) ) );

			//* Seconds Color
			$wp_customize->add_setting( 'tgd_second_color', array(
				'type' 			=> 'option',
				'capability' 	=> 'edit_theme_options',
				'default' 		=> '#ff0000'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tgd_second_color', array(
				'label' 		=> __('Seconds Countdown Color', 'the-great-deluge'),
				'section' 		=> 'tgd_countdown',
				'settings' 		=> 'tgd_second_color'
			) ) );

	/**
	 * Sanitize text input
	 */
	function tgd_sanitize_text( $input ) {
		return sanitize_text_field( $input );
	}


}
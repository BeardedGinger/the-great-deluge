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
	$wp_customize->add_section( 'tgd_settings', array(
		'title' 		=> 'The Great Deluge',
		'priority' 		=> 1
	) );

		//* Launch Date
		$wp_customize->add_setting( 'tgd_countdown', array(
			'capability' 	=> 'edit_theme_options',
		) );

		$wp_customize->add_control( 'tgd_countdown', array(
			'type' 			=> 'date',
			'section' 		=> 'tgd_settings',
			'label' 		=> 'Launch Date',
			'description' 	=> 'Set the launch date for controlling the countdown'
		) );

		//* Facebook
		$wp_customize->add_setting( 'tgd_facebook', array(
			'capability' 			=> 'edit_theme_options',
			'sanitize_callback' 	=> 'tgd_sanitize_text'
		) );

		$wp_customize->add_control( 'tgd_facebook', array(
			'section' 		=> 'tgd_settings',
			'label' 		=> 'Facebook Link',
		) );

		//* Twitter
		$wp_customize->add_setting( 'tgd_twitter', array(
			'capability' 			=> 'edit_theme_options',
			'sanitize_callback' 	=> 'tgd_sanitize_text'
		) );

		$wp_customize->add_control( 'tgd_twitter', array(
			'section' 		=> 'tgd_settings',
			'label' 		=> 'Twitter Link',
		) );

		//* Hero Text
		$wp_customize->add_setting( 'tgd_hero', array(
			'capability' 			=> 'edit_theme_options',
			'type' 					=> 'option',
			'sanitize_callback' 	=> 'tgd_sanitize_text'
		) );

		$wp_customize->add_control( 'tgd_hero', array(
			'section' 		=> 'tgd_settings',
			'label' 		=> 'Hero Text',
		) );

	/**
	 * Sanitize text input
	 */
	function tgd_sanitize_text( $input ) {
		return sanitize_text_field( $input );
	}


}
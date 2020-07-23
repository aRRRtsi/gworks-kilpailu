<?php
/**
 * gworksKilpailu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gworksKilpailu
 */

function wps_enqueue_styles() {
	$rand = rand( 1, 99999999999 );
	wp_enqueue_style( 'style', get_stylesheet_uri(), '', $rand ); 

	wp_register_style('font_vinkel_regular', '/wp-content/themes/gworkskilpailu-child/fonts/Vinkel-Regular.otf', array(), null, 'all');
	wp_register_style('font_vinkel_light', '/wp-content/themes/gworkskilpailu-child/fonts/Vinkel-Light.otf', array(), null, 'all');
	wp_register_style('font_vinkel_bold', '/wp-content/themes/gworkskilpailu-child/fonts/Vinkel-Bold.otf', array(), null, 'all');

	wp_enqueue_style('font_vinkel_regular');
	wp_enqueue_style('font_vinkel_light');
	wp_enqueue_style('font_vinkel_bold');
}
add_action('wp_enqueue_scripts', 'wps_enqueue_styles');

function font_awesome() {
	wp_register_script( 'FontAwesome', 'https://kit.fontawesome.com/31f5910b40.js', null, null, true );
	wp_enqueue_script('FontAwesome');
}
add_action('wp_enqueue_scripts', 'font_awesome');
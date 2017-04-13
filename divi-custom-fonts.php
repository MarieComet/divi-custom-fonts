<?php
/**
 * Plugin Name: Divi Custom Fonts
 * Description: Add custom fonts to Divi theme
 * Version: 1.0.0
 * Author: Marie Comet
 * License: MIT License
 * Text Domain: afd
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'admin_enqueue_scripts', 'afd_admin_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'afd_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'afd_enqueue_styles' );
 
function afd_admin_enqueue_scripts() {
  wp_enqueue_style('fonts-admin', plugin_dir_url( __FILE__ ) .'/fonts/fonts-admin.css');
}
function afd_enqueue_styles() {
    wp_enqueue_style( 'fonts', plugin_dir_url( __FILE__ )  . '/fonts/fonts.css');
}

function afd_custom_fonts($websafe_fonts) {

	$websafe_fonts['Platform'] = [
		'styles'    => '400,300,600,700,800',
		'character_set' => 'latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic',
		'type'      => 'sans-serif',
	];
	$websafe_fonts['PublicoTextMono'] = [
		'styles'    => '400,300,600,700,800',
		'character_set' => 'latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic',
		'type'      => 'sans-serif',
	];
  return $websafe_fonts;

}
add_filter('et_websafe_fonts', 'afd_custom_fonts');


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
// Enqueue admin scripts
add_action( 'admin_enqueue_scripts', 'afd_admin_enqueue_scripts' );
// Enqueue front scripts
add_action( 'wp_enqueue_scripts', 'afd_enqueue_styles' );
add_action( 'admin_enqueue_scripts', 'afd_enqueue_styles' );

// Charge le fichier CSS qui affiche les images correspondantes aux nvlles fonts (admin)
function afd_admin_enqueue_scripts() {
  wp_enqueue_style('fonts-admin', plugin_dir_url( __FILE__ ) .'/fonts/fonts-admin.css');
}
// Charge le fichier contenant les font-face pour les nvlles fonts (front)
function afd_enqueue_styles() {
  wp_enqueue_style( 'fonts', plugin_dir_url( __FILE__ )  . '/fonts/fonts.css');
}

// Ajoute nos nvlles fonts aux sélecteurs du customizer et des modules
// Note : le param 'standard' à 1 est important, sinon Divi va tenter de charger ces fonts via google fonts et provoquer une erreur JS dans le customizer
function afd_custom_fonts($fonts) {

	$websafe_fonts['Platform'] = [
		'styles'    => '300,400,600,700,800',
		'character_set' => 'latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic',
		'type'      => 'sans-serif',
		'standard'	=> 1,
		'prepend_standard_fonts' => true,
	];
	$websafe_fonts['PublicoTextMono'] = [
		'styles'    => '300,400,600,700,800',
		'character_set' => 'latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic',
		'type'      => 'sans-serif',
		'standard'	=> 1,
		'prepend_standard_fonts' => true,
	];
  return array_merge($websafe_fonts,$fonts);

}
// le filtre 'et_websafe_fonts' s'applique via la fonction 'et_builder_get_websafe_fonts' dans Divi/includes/builder/core.php l.2825
add_filter('et_websafe_fonts', 'afd_custom_fonts');
// ajout custom fonts au visual builder
add_filter('et_builder_google_fonts', 'afd_custom_fonts');


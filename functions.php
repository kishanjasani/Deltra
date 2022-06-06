<?php
/**
 * Deltra Theme file includes and definitions.
 *
 * @package Deltra
 */

use DELTRA\Inc\DeltraTheme;

if ( ! defined( 'DELTRA_THEME_VERSION' ) ) {
	define( 'DELTRA_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! defined( 'DELTRA_DIR_PATH' ) ) {
	define( 'DELTRA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'DELTRA_DIR_URI' ) ) {
	define( 'DELTRA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'DELTRA_BUILD_URI' ) ) {
	define( 'DELTRA_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'DELTRA_BUILD_PATH' ) ) {
	define( 'DELTRA_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

require_once DELTRA_DIR_PATH . '/vendor/autoload.php';

/**
 * Get deltra theme instance.
 *
 * @return object DELTRA\Inc\Deltra_Theme
 */
function deltra_get_theme_instance() {
	return DeltraTheme::get_instance();
}

deltra_get_theme_instance();

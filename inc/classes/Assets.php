<?php
/**
 * Enqueue theme assets.
 *
 * @package Deltra
 */

namespace DELTRA\Inc;

use DELTRA\Inc\Traits\Singleton;

/**
 * Class Assets
 */
class Assets {
	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {
		/**
		 * Actions
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );

	}

	/**
	 * Register scripts.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_scripts() {
		// Register Scripts.
		wp_register_script( 'main', DELTRA_BUILD_URI . '/js/main.js', [], filemtime( DELTRA_BUILD_PATH . '/js/main.js' ), true );
		wp_register_script( 'bootstrap', DELTRA_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], DELTRA_THEME_VERSION, true );

		// Enqueue Scripts.
		wp_enqueue_script( 'main' );
		wp_enqueue_script( 'bootstrap' );
	}

	/**
	 * Register styles.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_styles() {
		// Register Styles.
		wp_register_style( 'bootstrap', DELTRA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], DELTRA_THEME_VERSION, 'all' );
		wp_register_style( 'main-stylesheet', DELTRA_BUILD_URI . '/css/main.css', [ 'bootstrap' ], filemtime( DELTRA_BUILD_PATH . '/css/main.css' ), 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'main-stylesheet' );
		wp_enqueue_style( 'bootstrap' );
	}
}

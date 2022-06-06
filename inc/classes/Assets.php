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
		wp_register_script( 'main', DELTRA_DIR_URI . '/assets/src/js/main.js', [], filemtime( DELTRA_DIR_PATH . '/assets/src/js/main.js' ), true );
		wp_register_script( 'bootstrap', DELTRA_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

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
		wp_register_style( 'bootstrap', DELTRA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );
		wp_register_style( 'stylesheet', get_stylesheet_uri(), [ 'bootstrap' ], filemtime( DELTRA_DIR_PATH . '/style.css' ), 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'stylesheet' );
		wp_enqueue_style( 'bootstrap' );
	}
}

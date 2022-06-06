<?php
/**
 * Register theme menus.
 *
 * @package Deltra
 */

namespace DELTRA\Inc;

use DELTRA\Inc\Traits\Singleton;

/**
 * Class Menus
 */
class Menus {
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
		add_action( 'init', [ $this, 'register_menus' ] );

	}

	/**
	 * Register menus.
	 *
	 * @return void
	 */
	public function register_menus() {
		register_nav_menus(
			[
				'deltra-primary' => esc_html__( 'Primary Menu', 'deltra' ),
				'deltra-footer'  => esc_html__( 'Footer Menu', 'deltra' ),
			]
		);
	}
}

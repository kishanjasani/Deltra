<?php
/**
 * Bootstraps the theme.
 *
 * @package Deltra
 */

namespace DELTRA\Inc;

use DELTRA\Inc\Traits\Singleton;

/**
 * Main theme bootstrap file.
 */
class Deltra_Theme {
	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		// load classes.
		Assets::get_instance();

		$this->set_hooks();
	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function set_hooks() {
		// Add actions and filters.
	}
}

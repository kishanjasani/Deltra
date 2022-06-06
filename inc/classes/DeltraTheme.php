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
class DeltraTheme {
	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		// load classes.
		Assets::get_instance();
		Menus::get_instance();

		$this->set_hooks();
	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function set_hooks() {
		// Add actions and filters.
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
		add_action( 'after_setup_theme', [ $this, 'content_width' ], 0 );
	}

	/**
	 * Setup theme.
	 *
	 * @return void
	 */
	public function setup_theme() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			[
				'header-text'          => [ 'site-title', 'site-description' ],
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			]
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			[
				'default-color'  => '#fff',
				'default-image'  => '',
				'default-repeat' => 'no-repeat',
			]
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width Content width.
	 *
	 * @return void
	 */
	public function content_width() {
		// This variable is intended to be overruled from themes.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'deltra_content_width', 1240 );
	}

}

<?php
/**
 * Theme bootstrap.
 *
 * Until 1.1.0 this loaded the bundled Epsilon framework -- around 5,700 lines
 * across 125 files -- to provide a recommended-actions panel, a welcome screen,
 * a typography control and a couple of Customizer widgets. All of it is now core
 * WordPress, so the theme needs no bundled framework and no companion plugin to
 * configure.
 *
 * @package Bonkers
 */

defined( 'ABSPATH' ) || exit;

class Bonkers {

	/**
	 * @var string
	 */
	public $theme_slug = 'bonkers';

	public function __construct() {
		/*
		 * The recommended actions are translated, and this constructor runs while
		 * functions.php is still being included -- long before init. Building them
		 * here pulled the text domain in early enough that WordPress 6.7+ reported
		 * _load_textdomain_just_in_time was called incorrectly on every page load.
		 * Everything translated is therefore deferred to init.
		 */
		add_action( 'init', array( $this, 'init_recommended_actions' ), 5 );

		add_action( 'customize_register', array( $this, 'register_customizer_controls' ), 5 );
	}

	/**
	 * The Customizer set-up panel.
	 */
	public function init_recommended_actions() {
		require_once get_template_directory() . '/inc/libraries/class-bonkers-recommended-actions.php';

		new Bonkers_Recommended_Actions();
	}

	/**
	 * Load the theme's own Customizer controls.
	 *
	 * These replace Epsilon_Control_Typography, Epsilon_Control_Toggle and
	 * Epsilon_Control_Layouts; inc/customizer.php registers them.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer instance.
	 */
	public function register_customizer_controls( $wp_customize ) {
		require_once get_template_directory() . '/inc/customizer-controls/class-bonkers-customize-controls.php';
	}
}

new Bonkers();

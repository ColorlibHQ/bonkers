<?php
/**
 * Bonkers back compat functionality
 *
 * Prevents Bonkers from running on PHP versions prior to 5.4
 *
 * @package Bonkers
 * @since Bonkers 1.0.1
 */

/**
 * Prevent switching to Bonkers on old versions of PHP.
 *
 * Switches to the default theme.
 *
 * @since Bonkers 1.0.1
 */
function bonkers_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'bonkers_upgrade_notice' );
}
add_action( 'after_switch_theme', 'bonkers_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Bonkers on PHP versions prior to 5.4.
 *
 * @since Bonkers 1.0.1
 *
 * @global string $php_version PHP version.
 */
function bonkers_upgrade_notice() {
	$php_version = phpversion();
	$message = sprintf( __( 'Bonkers requires at least PHP version 5.4. You are running version %s. Please upgrade and try again.', 'bonkers' ), $php_version );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on PHP versions prior to 5.4.
 *
 * @since Bonkers 1.0.1
 *
 * @global string $php_version PHP version.
 */
function bonkers_customize() {
	$php_version = phpversion();
	wp_die( sprintf( __( 'Bonkers requires at least PHP version 5.4. You are running version %s. Please upgrade and try again.', 'bonkers' ), $php_version ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'bonkers_customize' );

/**
 * Prevents the Theme Preview from being loaded on PHP versions prior to 5.4.
 *
 * @since Bonkers 1.0.1
 *
 * @global string $php_version PHP version.
 */
function bonkers_preview() {
	if ( isset( $_GET['preview'] ) ) {
		$php_version = phpversion();
		wp_die( sprintf( __( 'Bonkers requires at least PHP version 5.4. You are running version %s. Please upgrade and try again.', 'bonkers' ), $php_version ) );
	}
}
add_action( 'template_redirect', 'bonkers_preview' );

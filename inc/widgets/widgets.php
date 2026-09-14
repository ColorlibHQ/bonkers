<?php
/**
 * The widgets the front page is built from.
 *
 * Bonkers' front page is ten widget areas, and until 1.1.0 the theme registered
 * no widgets at all -- every one of them lived in the Bonkers Addons plugin. So a
 * fresh install activated the theme, set the Front Page template and got a page
 * of empty sections, with nothing in the widget picker to put in them.
 *
 * They now ship with the theme. The plugin registers the same classes, so each
 * one is only declared if the plugin has not already declared it: with both
 * installed the plugin wins and nothing is registered twice, and existing
 * widgets keep working because the class names and their stored option keys are
 * unchanged.
 *
 * @package Bonkers
 */

defined( 'ABSPATH' ) || exit;

/**
 * class name => file
 */
function bonkers_widget_classes() {
	return array(
		'Bonkers_Service'       => 'class-bonkers-service.php',
		'Bonkers_Team_Member'   => 'class-bonkers-team-member.php',
		'Bonkers_Client_Logo'   => 'class-bonkers-client-logo.php',
		'Bonkers_Phone_Feature' => 'class-bonkers-phone-feature.php',
		'Bonkers_Contact_Info'  => 'class-bonkers-contact-info.php',
	);
}

add_action(
	'widgets_init',
	function () {
		foreach ( bonkers_widget_classes() as $class => $file ) {
			// The plugin loads on plugins_loaded, so by widgets_init it has already
			// declared its copies. Deferring to it keeps a site with both installed
			// from registering each widget twice.
			if ( class_exists( $class ) ) {
				continue;
			}

			require_once get_template_directory() . '/inc/widgets/' . $file;

			if ( class_exists( $class ) ) {
				register_widget( $class );
			}
		}
	},
	20
);

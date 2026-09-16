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
 * The theme's widget classes, and the plugin class each one supersedes.
 *
 * Bonkers Addons declares five widgets under exactly these id_base values and
 * exactly the class names the theme used to use, so the theme could not even
 * load its own files while the plugin was active -- PHP will not redeclare a
 * class. The theme's classes are therefore named apart, and the id_base of each
 * is unchanged, so a site's existing widget instances keep rendering.
 *
 * @return array class => array( file, legacy )
 */
function bonkers_widget_classes() {
	return array(
		'Bonkers_Service_Widget'       => array( 'class-bonkers-service.php',       'Bonkers_Service' ),
		'Bonkers_Team_Member_Widget'   => array( 'class-bonkers-team-member.php',   'Bonkers_Team_Member' ),
		'Bonkers_Client_Logo_Widget'   => array( 'class-bonkers-client-logo.php',   'Bonkers_Client_Logo' ),
		'Bonkers_Phone_Feature_Widget' => array( 'class-bonkers-phone-feature.php', 'Bonkers_Phone_Feature' ),
		'Bonkers_Contact_Info_Widget'  => array( 'class-bonkers-contact-info.php',  'Bonkers_Contact_Info' ),
		// New in 1.1.0, so the plugin has no copy of these.
		'Bonkers_Testimonial'          => array( 'class-bonkers-testimonial.php',   '' ),
		'Bonkers_Stat'                 => array( 'class-bonkers-stat.php',          '' ),
	);
}

add_action(
	'widgets_init',
	function () {
		foreach ( bonkers_widget_classes() as $class => $widget ) {
			list( $file, $legacy ) = $widget;

			require_once get_template_directory() . '/inc/widgets/' . $file;

			if ( ! class_exists( $class ) ) {
				continue;
			}

			/*
			 * The plugin registers its older copy on widgets_init at the default
			 * priority, so by the time this runs it holds the id_base. Its version
			 * reads the same stored instance but supports less of it -- the service
			 * and phone widgets have no icon field at all, so a site that updates
			 * the theme with the plugin still active loses every section icon.
			 * Ours replaces it.
			 */
			if ( '' !== $legacy && class_exists( $legacy ) ) {
				unregister_widget( $legacy );
			}

			register_widget( $class );
		}
	},
	20
);

<?php
/**
 * The template for Front Page
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bonkers
 */

get_header(); ?>


<?php
$bonkers_default_order = array(
	'bonkers_addons_welcome_section',
	'bonkers_addons_services_section',
	'bonkers_addons_image_section',
	'bonkers_addons_phone_section',
	'bonkers_addons_cta_section',
	'bonkers_addons_video_section',
	'bonkers_addons_team_section',
	'bonkers_addons_subscribe_section',
	'bonkers_addons_clients_section',
	'bonkers_addons_contact_section',
);
$sections_order        = get_option( 'bonkers_addons_sortable_items', $bonkers_default_order );

foreach ( $sections_order as $key => $value ) {
	$value = str_replace( 'bonkers_addons_', '', $value );
	$value = str_replace( '_section', '', $value );
	$value = str_replace( '_', '-', $value );
	get_template_part( 'template-parts/section-' . $value, 'front-page' );
}
?>


<?php

get_footer();

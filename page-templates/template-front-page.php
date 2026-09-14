<?php
/**
 * Template Name: Front Page
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
	'bonkers_addons_work_section',
	'bonkers_addons_image_section',
	'bonkers_addons_phone_section',
	'bonkers_addons_cta_section',
	'bonkers_addons_video_section',
	'bonkers_addons_stats_section',
	'bonkers_addons_team_section',
	'bonkers_addons_testimonials_section',
	'bonkers_addons_subscribe_section',
	'bonkers_addons_clients_section',
	'bonkers_addons_contact_section',
);
$sections_order = get_option( 'bonkers_addons_sortable_items', $bonkers_default_order );

/*
 * A site that has ever reordered its sections has the old ten-item list stored,
 * so sections added since would never appear for it. Anything in the defaults
 * that the stored order does not mention is appended in its default position
 * rather than silently dropped.
 */
if ( is_array( $sections_order ) && $sections_order !== $bonkers_default_order ) {
	$missing = array_diff( $bonkers_default_order, $sections_order );

	foreach ( $missing as $position => $section ) {
		array_splice( $sections_order, min( $position, count( $sections_order ) ), 0, array( $section ) );
	}
}

if ( ! is_array( $sections_order ) || ! $sections_order ) {
	$sections_order = $bonkers_default_order;
}

foreach ( $sections_order as $key => $value ) {
	$value = str_replace( 'bonkers_addons_', '', $value );
	$value = str_replace( '_section', '', $value );
	$value = str_replace( '_', '-', $value );
	get_template_part( 'template-parts/section-' . $value, 'front-page' );
}
?>


<?php

get_footer();

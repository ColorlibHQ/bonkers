<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Bonkers
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function bonkers_jetpack_setup() {

	add_theme_support( 'infinite-scroll', array(
		'container' => 'sub-content',
		'render'    => 'bonkers_infinite_scroll_render',
		'footer'    => false,
	) );

	if ( class_exists( 'Jetpack' ) ) {
		//Enable Custom CSS
		Jetpack::activate_module( 'custom-css', false, false );
		//Enable Contact Form
		Jetpack::activate_module( 'contact-form', false, false );
		//Enable Tiled Galleries
		Jetpack::activate_module( 'tiled-gallery', false, false );
	}

} // end function bonkers_jetpack_setup
add_action( 'after_setup_theme', 'bonkers_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bonkers_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function bonkers_infinite_scroll_render



/**
 * Remove sharing from content
 */
function bonkers_remove_share() {
	//remove_filter( 'the_content', 'sharing_display', 19 );
	//remove_filter( 'the_excerpt', 'sharing_display', 19 );
	if ( class_exists( 'Jetpack_Likes' ) ) {
		//remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}

add_action( 'loop_start', 'bonkers_remove_share' );

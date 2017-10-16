<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php if ( get_header_image() ) : ?>
 * <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
 * <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo
 * esc_attr( get_custom_header()->height ); ?>" alt="">
 * </a>
 * <?php endif; // End header image check. ?>
 *
 * @link    http://codex.wordpress.org/Custom_Headers
 *
 * @package Bonkers
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bonkers_header_style()
 */
function bonkers_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'bonkers_custom_header_args', array(
		'default-image' => '',
		'width'         => 1425,
		'height'        => 152,
		'flex-height'   => true,
		'flex-width'    => true,
		'header-text'   => false,
	) ) );
}

add_action( 'after_setup_theme', 'bonkers_custom_header_setup' );

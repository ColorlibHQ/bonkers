<?php
/**
 * Block editor support: pattern category and block styles.
 *
 * The patterns themselves live in /patterns and are registered by WordPress.
 *
 * @package Bonkers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'bonkers_register_pattern_category' ) ) :
	/**
	 * Gives the theme's own patterns a heading of their own in the inserter.
	 */
	function bonkers_register_pattern_category() {
		if ( ! function_exists( 'register_block_pattern_category' ) ) {
			return;
		}

		register_block_pattern_category(
			'bonkers',
			array(
				'label'       => esc_html__( 'Bonkers', 'bonkers' ),
				'description' => esc_html__( 'Sections built from core blocks, styled to match the theme.', 'bonkers' ),
			)
		);
	}
endif;
add_action( 'init', 'bonkers_register_pattern_category' );

if ( ! function_exists( 'bonkers_register_block_styles' ) ) :
	/**
	 * Registers the theme's block styles.
	 *
	 * These are the looks the theme already uses in its own sections, offered
	 * to core blocks so a page built in the editor matches the front page.
	 */
	function bonkers_register_block_styles() {
		if ( ! function_exists( 'register_block_style' ) ) {
			return;
		}

		$styles = array(
			array(
				'block' => 'core/button',
				'name'  => 'bonkers-outline',
				'label' => esc_html__( 'Outline', 'bonkers' ),
			),
			array(
				'block' => 'core/image',
				'name'  => 'bonkers-rounded',
				'label' => esc_html__( 'Rounded', 'bonkers' ),
			),
			array(
				'block' => 'core/image',
				'name'  => 'bonkers-framed',
				'label' => esc_html__( 'Framed', 'bonkers' ),
			),
			array(
				'block' => 'core/group',
				'name'  => 'bonkers-card',
				'label' => esc_html__( 'Card', 'bonkers' ),
			),
			array(
				'block' => 'core/columns',
				'name'  => 'bonkers-cards',
				'label' => esc_html__( 'Cards', 'bonkers' ),
			),
			array(
				'block' => 'core/quote',
				'name'  => 'bonkers-plain',
				'label' => esc_html__( 'Plain', 'bonkers' ),
			),
			array(
				'block' => 'core/separator',
				'name'  => 'bonkers-short',
				'label' => esc_html__( 'Short rule', 'bonkers' ),
			),
			array(
				'block' => 'core/list',
				'name'  => 'bonkers-checks',
				'label' => esc_html__( 'Checklist', 'bonkers' ),
			),
		);

		foreach ( $styles as $style ) {
			register_block_style(
				$style['block'],
				array(
					'name'  => $style['name'],
					'label' => $style['label'],
				)
			);
		}
	}
endif;
add_action( 'init', 'bonkers_register_block_styles' );

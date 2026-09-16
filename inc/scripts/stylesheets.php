<?php
	//Bootstrap =======================================================
	// The theme referenced .container, .row and the column classes and nothing
	// else from Bootstrap, so grid.css carries those -- with this build's own
	// custom gutters and breakpoints -- instead of the whole 164 KB stylesheet.
	$bonkers_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'bonkers-base', get_template_directory_uri() . '/assets/css/base.css', array(), $bonkers_version );
	wp_enqueue_style( 'bonkers-grid', get_template_directory_uri() . '/assets/css/grid.css', array( 'bonkers-base' ), $bonkers_version );
	//=================================================================

	//Flickity ======================================================
	wp_register_style( 'flickity', get_template_directory_uri() . '/assets/css/flickity.css', array(), '4.1.1', 'all' );
	wp_enqueue_style( 'flickity' );
	//=================================================================


	wp_enqueue_style( 'bonkers_style', get_stylesheet_uri(), array(), $bonkers_version );

	// Layered on top of the compiled stylesheet and the colour scheme, so it wins
	// on equal specificity without !important. See the file header for why the
	// refresh is not folded into the SASS source.
	wp_enqueue_style( 'bonkers-refresh', get_template_directory_uri() . '/assets/css/refresh.css', array( 'bonkers_style' ), $bonkers_version );

	// Block styles. Also handed to the editor in functions.php, so a block looks
	// the same while you are editing it as it does once published.
	wp_enqueue_style( 'bonkers-blocks', get_template_directory_uri() . '/assets/css/blocks.css', array( 'bonkers-refresh' ), $bonkers_version );

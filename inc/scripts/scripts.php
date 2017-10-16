<?php

//HTML5 Shiv ==============================================
wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/vendor/html5shiv.js', array(), '3.7.3', true );
//=================================================================

//hoverIntent Plugin ==============================================
wp_enqueue_script( 'hoverIntent' );
//=================================================================

//Modernizr Plugin ================================================
wp_enqueue_script( 'bonkers_modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.min.js', '2.8.3', true );
//=================================================================

//Pace  ===========================================================
wp_enqueue_script( 'pace', get_template_directory_uri() . '/assets/js/vendor/pace.min.js', array(), '1.0.2', true );
//=================================================================

//Imageloaded  ===========================================================
wp_enqueue_script( 'imagesloaded', true );
//=================================================================

//Flickity  ===========================================================
wp_enqueue_script( 'flickity', get_template_directory_uri() . '/assets/js/vendor/flickity.pkgd.min.js', array(), '2.0.5', true );
//=================================================================

//Google Maps  ===========================================================
$bonkers_contact_key = get_option( 'bonkers_addons_contact_key' );
if ( $bonkers_contact_key ) {

	wp_enqueue_script( 'google-maps', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $bonkers_contact_key ), array(), '1.0.0', true );

	$bonkers_contact_lat_long = bonkers_get_coordinates();

	if ( $bonkers_contact_lat_long ) {
		wp_enqueue_script( 'bonkers_google_maps_custom', get_template_directory_uri() . '/assets/js/google-maps.js', array(), '1.0.0', true );

		$bonkers_contact_zoom = absint( get_option( 'bonkers_addons_contact_zoom', '13' ) );
		$bonkers_g_maps       = array(
			'lat'  => trim( esc_attr( $bonkers_contact_lat_long[0] ) ),
			'lon' => trim( esc_attr( $bonkers_contact_lat_long[1] ) ),
			'zoom' => $bonkers_contact_zoom,
		);
		wp_localize_script( 'bonkers_google_maps_custom', 'bonkersGMaps', $bonkers_g_maps );
	}
}
//=================================================================

//Bootstrap JS ========================================
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array(), '3.3.7', true );
//=================================================================

//Comment Reply ===================================================
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
//=================================================================

//Navigation Menu ===================================================
wp_enqueue_script( 'bonkers-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '1.0', true );
$bonkers_l10n             = array(
	'quote' => bonkers_get_svg(
		array(
			'icon' => 'quote-right',
		)
	),
);
$bonkers_l10n['expand']   = __( 'Expand child menu', 'bonkers' );
$bonkers_l10n['collapse'] = __( 'Collapse child menu', 'bonkers' );
$bonkers_l10n['icon']     = bonkers_get_svg(
	array(
		'icon'     => 'angle-down',
		'fallback' => true,
	)
);
wp_localize_script( 'bonkers-navigation', 'bonkersScreenReaderText', $bonkers_l10n );
//=================================================================


//Customs Scripts =================================================
wp_enqueue_script( 'bonkers_theme-custom', get_template_directory_uri() . '/assets/js/script.js', array(
	'jquery',
	'bootstrap',
), '1.0', true );
$bonkers_custom_js = array(
	'admin_ajax' => admin_url( 'admin-ajax.php' ),
	'token'      => wp_create_nonce( 'colorlib-secret' ),
);
wp_localize_script( 'bonkers_theme-custom', 'bonkers', $bonkers_custom_js );
//=================================================================


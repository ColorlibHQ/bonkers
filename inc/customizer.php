<?php
/**
 * Bonkers Theme Customizer.
 *
 * @package Bonkers
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bonkers_customize_register( $wp_customize ) {

	require_once get_template_directory() . '/inc/customizer-controls/class-bonkers-multiple-checkbox-control.php';
	$wp_customize->register_control_type( 'Bonkers_Multiple_Checkbox_Control' );

	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/*
	Colors
	===================================================== */
	/*
	Featured
	------------------------------ */
	$wp_customize->add_setting( 'bonkers_hero_color', array(
		'default'           => '#2D80E2',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_hero_color', array(
		'label'   => esc_attr__( 'Featured Color', 'bonkers' ),
		'section' => 'colors',
	) ) );

	/*
	Logo
	------------------------------ */
	$wp_customize->add_setting( 'bonkers_logo_color', array(
		'default'           => '#222222',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_logo_color', array(
		'label'   => esc_attr__( 'Logo Color', 'bonkers' ),
		'section' => 'colors',
	) ) );

	/*
	Headings
	------------------------------ */
	$wp_customize->add_setting( 'bonkers_headings_color', array(
		'default'           => '#222222',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_headings_color', array(
		'label'   => esc_attr__( 'Headings Color', 'bonkers' ),
		'section' => 'colors',
	) ) );

	/*
	Text
	------------------------------ */
	$wp_customize->add_setting( 'bonkers_text_color', array(
		'default'           => '#808080',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_text_color', array(
		'label'   => esc_attr__( 'Text Color', 'bonkers' ),
		'section' => 'colors',
	) ) );

	/*
	Link
	------------------------------ */
	$wp_customize->add_setting( 'bonkers_link_color', array(
		'default'           => '#2D80E2',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_link_color', array(
		'label'   => esc_attr__( 'Link Color', 'bonkers' ),
		'section' => 'colors',
	) ) );

	/*
	Footer Background
	------------------------------ */
	$wp_customize->add_setting( 'bonkers_footer_background', array(
		'default'           => '#222222',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_footer_background', array(
		'label'   => esc_attr__( 'Footer Background Color', 'bonkers' ),
		'section' => 'colors',
	) ) );

	/*
	Header Background
	------------------------------ */
	$wp_customize->add_setting( 'bonkers_header_bck_color', array(
		'default'           => '#FFFFFF',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_header_bck_color', array(
		'label'   => esc_attr__( 'Header Background Color', 'bonkers' ),
		'section' => 'colors',
	) ) );

	/*
	Typography
	------------------------------ */
	$wp_customize->add_section( 'bonkers_typography_section', array(
		'title' => esc_attr__( 'Typography', 'bonkers' ),
	) );

	$wp_customize->add_setting( 'bonkers_typography_font_family', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new Epsilon_Control_Typography( $wp_customize, 'bonkers_typography_font_family', array(
		'section'       => 'bonkers_typography_section',
		'label'         => esc_html__( 'Body Text', 'bonkers' ),
		'stylesheet'    => 'bonkers_style',
		'choices'       => array(
			'font-family',
			'font-size',
		),
		'selectors'     => array(
			'body',
		),
		'font_defaults' => array(
			'font-size'   => '16',
			'font-family' => 'PT Sans',
		),
	) ) );

	$wp_customize->add_setting( 'bonkers_typography_font_family_headings', array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new Epsilon_Control_Typography( $wp_customize, 'bonkers_typography_font_family_headings', array(
		'section'       => 'bonkers_typography_section',
		'label'         => esc_html__( 'Headings', 'bonkers' ),
		'stylesheet'    => 'bonkers_style',
		'choices'       => array(
			'font-family',
		),
		'selectors'     => array(
			'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a',
		),
		'font_defaults' => array(
			'font-family' => 'PT Sans',
		),
	) ) );

	$wp_customize->add_setting( 'bonkers_typography_subsets', array(
		'sanitize_callback' => 'bonkers_saniteze_google_font_subsets',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new Bonkers_Multiple_Checkbox_Control( $wp_customize, 'bonkers_typography_subsets', array(
		'section'     => 'bonkers_typography_section',
		'label'       => esc_html__( 'Google-Font subsets', 'bonkers' ),
		'description' => esc_html__( 'The subsets used from Google\'s API.', 'bonkers' ),
		'choices'     => Bonkers_Helper::get_google_font_subsets(),
	) ) );

	// Footer Settings
	$wp_customize->add_section( 'bonkers_footer_options', array(
		'title'      => __( 'Footer Settings', 'bonkers' ),
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'bonkers_enable_footer_widgets', array(
		'sanitize_callback' => 'absint',
		'default'           => '1',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, 'bonkers_enable_footer_widgets', array(
		'type'    => 'epsilon-toggle',
		'label'   => __( 'Show Footer Widgets ?', 'bonkers' ),
		'section' => 'bonkers_footer_options',
	) ) );

	$wp_customize->add_setting( 'bonkers_footer_columns', array(
		'default'           => array(
			'columnsCount' => 4,
			'columns'      => array(
				1 => array(
					'index' => 1,
					'span'  => 3,
				),
				2 => array(
					'index' => 2,
					'span'  => 3,
				),
				3 => array(
					'index' => 3,
					'span'  => 3,
				),
				4 => array(
					'index' => 4,
					'span'  => 3,
				),
			),
		),
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Epsilon_Control_Layouts( $wp_customize, 'bonkers_footer_columns', array(
		'type'     => 'epsilon-layouts',
		'section'  => 'bonkers_footer_options',
		'layouts'  => array(
			1 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			2 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/two-column.png',
			3 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/three-column.png',
			4 => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/four-column.png',
		),
		'min_span' => 2,
		'label'    => esc_html__( 'Footer Columns', 'bonkers' ),
	) ) );

}

add_action( 'customize_register', 'bonkers_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bonkers_customize_preview_js() {

	wp_register_script( 'bonkers_customizer_preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151024', true );
	wp_localize_script( 'bonkers_customizer_preview', 'bonkersCustomizer', array(
		'ajaxURL'  => admin_url( 'admin-ajax.php' ),
		'themeURL' => get_template_directory_uri(),
		'siteName' => get_bloginfo( 'name' ),
	) );
	wp_enqueue_script( 'bonkers_customizer_preview' );

}

add_action( 'customize_preview_init', 'bonkers_customize_preview_js' );


/**
 * Load scripts on the Customizer not the Previewer (iframe)
 */
function bonkers_customize_js() {

	wp_enqueue_script( 'bonkers_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array(
		'customize-controls',
	), '20170815', true );
	wp_localize_script( 'bonkers_customizer', 'bonkersCustomizerAdmin', array(
		'ajaxURL'      => admin_url( 'admin-ajax.php' ),
		'themeURL'     => get_template_directory_uri(),
		'adminURL'     => get_admin_url(),
		'sortableText' => esc_html__( 'Drag & Drop the sections to change order', 'bonkers' ),
	) );

}

add_action( 'customize_controls_enqueue_scripts', 'bonkers_customize_js', 99 );


/*
Sanitize Callbacks
*/

/**
 * Sanitize for post's categories
 */
function bonkers_sanitize_categories( $value ) {
	if ( ! array_key_exists( $value, bonkers_categories_ar() ) ) {
		$value = '';
	}

	return $value;
}

/**
 * Sanitize return an non-negative Integer
 */
function bonkers_sanitize_integer( $value ) {
	return absint( $value );
}

/**
 * Sanitize return pro version text
 */
function bonkers_pro_version( $input ) {
	return $input;
}

/**
 * Sanitize Any
 */
function bonkers_sanitize_any( $input ) {
	return $input;
}

/**
 * Sanitize Text
 */
function bonkers_sanitize_text( $str ) {
	return sanitize_text_field( $str );
}

/**
 * Sanitize Textarea
 */
function bonkers_sanitize_textarea( $text ) {
	return esc_textarea( $text );
}

/**
 * Sanitize URL
 */
function bonkers_sanitize_url( $url ) {
	return esc_url( $url );
}

/**
 * Sanitize Boolean
 */
function bonkers_sanitize_bool( $string ) {
	return (bool) $string;
}

/**
 * Sanitize Text with html
 */
function bonkers_sanitize_text_html( $str ) {
	$args = array(
		'a'      => array(
			'href'  => array(),
			'title' => array(),
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'span'   => array(),
	);

	return wp_kses( $str, $args );
}

/**
 * Sanitize Google Font Subsets
 */
function bonkers_saniteze_google_font_subsets( $subsets ) {
	$all_subsets = array_keys( Bonkers_Helper::get_google_font_subsets() );
	if ( is_array( $subsets ) ) {
		foreach ( $subsets as $key => $subset ) {
			if ( ! in_array( $subset, $all_subsets ) ) {
				unset( $subsets[ $key ] );
			}
		}
	} else {
		if ( ! in_array( $subsets, $all_subsets ) ) {
			return false;
		}
	}

	return $subsets;

}

/**
 * Sanitize array for multicheck
 * http://stackoverflow.com/a/22007205
 */
function bonkers_sanitize_multicheck( $values ) {

	$multi_values = ( ! is_array( $values ) ) ? explode( ',', $values ) : $values;

	return ( ! empty( $multi_values ) ) ? array_map( 'sanitize_title', $multi_values ) : array();
}

/**
 * Sanitize GPS Latitude and Longitud
 * http://stackoverflow.com/a/22007205
 */
function bonkers_sanitize_lat_long( $coords ) {
	if ( preg_match( '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $coords ) ) {
		return $coords;
	} else {
		return 'error';
	}
}

/*
* AJAX call to retreive an image URI by its ID
*/
add_action( 'wp_ajax_nopriv_bonkers_get_image_src', 'bonkers_get_image_src' );
add_action( 'wp_ajax_bonkers_get_image_src', 'bonkers_get_image_src' );

function bonkers_get_image_src() {
	if ( isset( $_POST['image_id'] ) ) {
		$image_id = sanitize_text_field( wp_unslash( $_POST['image_id'] ) );
	}
	$image = wp_get_attachment_image_src( absint( $image_id ), 'full' );
	$image = $image[0];
	echo wp_kses_post( $image );
	die();
}
